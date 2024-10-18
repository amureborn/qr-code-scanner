import QrScanner from "QRCodeScanner/qr-scanner-main/qr-scanner.min.js";
QrScanner.WORKER_PATH = 'QRCodeScanner/qr-scanner-main/qr-scanner-worker.min.js';

const camQrResultTimestamp = document.getElementById('cam-qr-result-timestamp');
const fileSelector = document.getElementById('file-selector');
const fileQrResult = document.getElementById('file-qr-result');

function setResult(label, result) {
    label.textContent = result;
    camQrResultTimestamp.textContent = new Date().toString();
    label.style.color = 'teal';
    clearTimeout(label.highlightTimeout);
    label.highlightTimeout = setTimeout(() => label.style.color = 'inherit', 100);
}

fileSelector.addEventListener('change', event => {
    const file = fileSelector.files[0];
    if (!file) {
        return;
    }
    QrScanner.scanImage(file)
        .then(result => setResult(fileQrResult, result))
        .catch(e => setResult(fileQrResult, e || 'No QR code found.'));
});