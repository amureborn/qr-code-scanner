//If service worker is installed, show offline usage notification
if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    navigator.serviceWorker
      .register('/service-worker.js')
      .then((reg) => {
        // console.log('SW registered: ', reg);
        if (!localStorage.getItem('offline')) {
          localStorage.setItem('offline', true);
          snackbar.show('App is ready for offline usage.', 5000);
        }
      })
      .catch((regError) => {
        console.log('SW registration failed: ', regError);
      });
  });
}

window.addEventListener('DOMContentLoaded', () => {
  //To check the device and add iOS support
  window.iOS = ['iPad', 'iPhone', 'iPod'].indexOf(navigator.platform) >= 0;
  window.isMediaStreamAPISupported = navigator && navigator.mediaDevices && 'enumerateDevices' in navigator.mediaDevices;
  window.noCameraPermission = false;

  var copiedText = null;
  var frame = null;
  var selectPhotoBtn = document.querySelector('.app__select-photos');
  var dialogElement = document.querySelector('.app__dialog');
  var dialogOverlayElement = document.querySelector('.app__dialog-overlay');
  var dialogOpenBtnElement = document.querySelector('.app__dialog-open');
  var dialogCloseBtnElement = document.querySelector('.app__dialog-close');
  var scanningEle = document.querySelector('.custom-scanner');
  var appScanningEle = document.querySelector('.app__scanner-img');
  var textBoxEle = document.querySelector('#result');

  var helpTextEle = document.querySelector('.app__help-text');
  var infoSvg = document.querySelector('.app__header-icon svg');
  var videoElement = document.querySelector('video');

  var headerIcon = document.querySelector('.app__header-icon');
  var infoDialogElement = document.querySelector('.app__infodialog');
  var infoDialogCloseBtnElement = document.querySelector('.app__infodialog-close');
  var infoDialogOverlayElement = document.querySelector('.app__infodialog-overlay');

  window.appOverlay = document.querySelector('.app__overlay');

  //Initializing qr scanner
  window.addEventListener('load', (event) => {
    QRReader.init(); //To initialize QR Scanner
    // Set camera overlay size
    setTimeout(() => {
      setCameraOverlay();
      if (window.isMediaStreamAPISupported) {
        scan();
      }
    }, 1000);

    // To support other browsers who dont have mediaStreamAPI
    selectFromPhoto();
  });

  function setCameraOverlay() {
    window.appOverlay.style.borderStyle = 'solid';
  }

  function createFrame() {
    frame = document.createElement('img');
    frame.src = '';
    frame.id = 'frame';
  }

  //Dialog close btn event
  dialogCloseBtnElement.addEventListener('click', hideDialog, false);
  infoDialogCloseBtnElement.addEventListener('click', closeInfoDialog, false);
  dialogOpenBtnElement.addEventListener('click', openInBrowser, false);
  headerIcon.addEventListener('click', showInfo, false);

  //To open result in browser
  function openInBrowser() {
    // console.log('Result: ', copiedText);

    if (!hasProtocolInUrl(copiedText)) {
      copiedText = `//${copiedText}`;
    }

    window.open(copiedText, '_blank', 'toolbar=0,location=0,menubar=0');
    copiedText = null;
    hideDialog();
  }

  //Scan
  function scan(forSelectedPhotos = false) {
    if (window.isMediaStreamAPISupported && !window.noCameraPermission) {
      scanningEle.style.display = 'block';
      appScanningEle.style.display = 'block';
    }

    if (forSelectedPhotos) {
      scanningEle.style.display = 'block';
      appScanningEle.style.display = 'block';
    }

    QRReader.scan((result) => {
      copiedText = result;
      textBoxEle.value = result;
      textBoxEle.select();
      scanningEle.style.display = 'none';
      appScanningEle.style.display = 'none';
      if (isURL(result)) {
        dialogOpenBtnElement.style.display = 'inline-block';
      }
      dialogElement.classList.remove('app__dialog--hide');
      dialogOverlayElement.classList.remove('app__dialog--hide');
    }, forSelectedPhotos);
  }

  //Hide dialog
  function hideDialog() {
    copiedText = null;
    textBoxEle.value = '';

    if (!window.isMediaStreamAPISupported) {
      frame.src = '';
      frame.className = '';
    }

    dialogElement.classList.add('app__dialog--hide');
    dialogOverlayElement.classList.add('app__dialog--hide');
    scan();
  }

  function selectFromPhoto() {
    //Creating the camera element
    var camera = document.createElement('input');
    camera.setAttribute('type', 'file');
    camera.setAttribute('capture', 'camera');
    camera.id = 'camera';
    window.appOverlay.style.borderStyle = '';
    selectPhotoBtn.style.display = 'flex';
    createFrame();

    //Add the camera and img element to DOM
    var pageContentElement = document.querySelector('.app__layout-content');
    pageContentElement.appendChild(camera);
    pageContentElement.appendChild(frame);

    //Click of camera fab icon
    selectPhotoBtn.addEventListener('click', () => {
      scanningEle.style.display = 'none';
      appScanningEle.style.display = 'none';
      document.querySelector('#camera').click();
    });

    //On camera change
    camera.addEventListener('change', (event) => {
      if (event.target && event.target.files.length > 0) {
        frame.className = 'app__overlay';
        frame.src = URL.createObjectURL(event.target.files[0]);
        if (!window.noCameraPermission) {
          scanningEle.style.display = 'block';
          appScanningEle.style.display = 'block';
        }
        window.appOverlay.style.borderColor = 'rgb(62, 78, 184)';
        scan(true);
      }
    });
  }

  function showInfo() {
    infoDialogElement.classList.remove('app__infodialog--hide');
    infoDialogOverlayElement.classList.remove('app__infodialog--hide');
  }

  function closeInfoDialog() {
    infoDialogElement.classList.add('app__infodialog--hide');
    infoDialogOverlayElement.classList.add('app__infodialog--hide');
  }
});

var QRReader = {};

QRReader.active = false;
QRReader.webcam = null;
QRReader.canvas = null;
QRReader.ctx = null;
QRReader.decoder = null;

QRReader.setCanvas = () => {
  QRReader.canvas = document.createElement('canvas');
  QRReader.ctx = QRReader.canvas.getContext('2d');
};

function setPhotoSourceToScan(forSelectedPhotos) {
  if (!forSelectedPhotos && window.isMediaStreamAPISupported) {
    QRReader.webcam = document.querySelector('video');
  } else {
    QRReader.webcam = document.querySelector('img');
  }
}

QRReader.init = () => {
  var baseurl = '';
  var streaming = false;

  // Init Webcam + Canvas
  setPhotoSourceToScan();

  QRReader.setCanvas();
  QRReader.decoder = new Worker(baseurl + 'decoder.js');

  if (window.isMediaStreamAPISupported) {
    // Resize webcam according to input
    QRReader.webcam.addEventListener(
      'play',
      function(ev) {
        if (!streaming) {
          setCanvasProperties();
          streaming = true;
        }
      },
      false
    );
  } else {
    setCanvasProperties();
  }

  function setCanvasProperties() {
    QRReader.canvas.width = window.innerWidth;
    QRReader.canvas.height = window.innerHeight;
  }

  function startCapture(constraints) {
    navigator.mediaDevices
      .getUserMedia(constraints)
      .then(function(stream) {
        QRReader.webcam.srcObject = stream;
        QRReader.webcam.setAttribute('playsinline', true);
        QRReader.webcam.setAttribute('controls', true);
        setTimeout(() => {
          document.querySelector('video').removeAttribute('controls');
        });
      })
      .catch(function(err) {
        console.log('Error occurred ', err);
        showErrorMsg();
      });
  }

  if (window.isMediaStreamAPISupported) {
    navigator.mediaDevices
      .enumerateDevices()
      .then(function(devices) {
        var device = devices.filter(function(device) {
          var deviceLabel = device.label.split(',')[1];
          if (device.kind == 'videoinput') {
            return device;
          }
        });

        var constraints;
        if (device.length > 1) {
          constraints = {
            video: {
              mandatory: {
                sourceId: device[device.length - 1].deviceId ? device[device.length - 1].deviceId : null
              }
            },
            audio: false
          };

          if (window.iOS) {
            constraints.video.facingMode = 'environment';
          }
          startCapture(constraints);
        } else if (device.length) {
          constraints = {
            video: {
              mandatory: {
                sourceId: device[0].deviceId ? device[0].deviceId : null
              }
            },
            audio: false
          };

          if (window.iOS) {
            constraints.video.facingMode = 'environment';
          }

          if (!constraints.video.mandatory.sourceId && !window.iOS) {
            startCapture({ video: true });
          } else {
            startCapture(constraints);
          }
        } else {
          startCapture({ video: true });
        }
      })
      .catch(function(error) {
        showErrorMsg();
        console.error('Error occurred : ', error);
      });
  }

  function showErrorMsg() {
    window.noCameraPermission = true;
    document.querySelector('.custom-scanner').style.display = 'none';
    snackbar.show('Unable to access the camera', 10000);
  }
};

/**
 * \brief QRReader Scan Action
 * Call this to start scanning for QR codes.
 *
 * \param A function(scan_result)
 */
QRReader.scan = function(callback, forSelectedPhotos) {
  QRReader.active = true;
  QRReader.setCanvas();
  function onDecoderMessage(event) {
    if (event.data.length > 0) {
      var qrid = event.data[0][2];
      QRReader.active = false;
      callback(qrid);
    }
    setTimeout(newDecoderFrame, 0);
  }

  QRReader.decoder.onmessage = onDecoderMessage;

  setTimeout(() => {
    setPhotoSourceToScan(forSelectedPhotos);
  });

  // Start QR-decoder
  function newDecoderFrame() {
    if (!QRReader.active) return;
    try {
      QRReader.ctx.drawImage(QRReader.webcam, 0, 0, QRReader.canvas.width, QRReader.canvas.height);
      var imgData = QRReader.ctx.getImageData(0, 0, QRReader.canvas.width, QRReader.canvas.height);

      if (imgData.data) {
        QRReader.decoder.postMessage(imgData);
      }
    } catch (e) {
      // Try-Catch to circumvent Firefox Bug #879717
      if (e.name == 'NS_ERROR_NOT_AVAILABLE') setTimeout(newDecoderFrame, 0);
    }
  }
  newDecoderFrame();
};

var snackbar = {};
var snackBarElement = document.querySelector('.app__snackbar');
var snackbarMsg = null;

//To show notification
snackbar.show = (msg, options = 4000) => {
  if (!msg) return;

  if (snackbarMsg) {
    snackbarMsg.remove();
  }

  snackbarMsg = document.createElement('div');
  snackbarMsg.className = 'app__snackbar-msg';
  snackbarMsg.textContent = msg;
  snackBarElement.appendChild(snackbarMsg);

  //Show toast for 3secs and hide it
  setTimeout(() => {
    snackbarMsg.remove();
  }, options);
};

export const isURL = (url = '') => {
  if (!url || typeof url !== 'string') {
    return false;
  }

  const protocol = '^(https?:\\/\\/)?';
  const domain = '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|';
  const ip = '((\\d{1,3}\\.){3}\\d{1,3}))';
  const port = '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*';
  const queryString = '(\\?[;&a-z\\d%_.~+=-]*)?';
  const fragmentLocater = '(\\#[-a-z\\d_]*)?$';

  const regex = new RegExp(`${protocol + domain + ip + port + queryString + fragmentLocater}`, 'i');

  return regex.test(url);
};

export const hasProtocolInUrl = (url = '') => {
  const protocol = '^(https?:\\/\\/)';
  const regex = new RegExp(protocol, 'i');
  return regex.test(url);
};