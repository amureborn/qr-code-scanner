<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="color-scheme" content="only light">
<title>QR Code Scanner - From Image & Webcam</title>
<meta name="description" content="QR Code Scanner is the fastest and most user-friendly web application accessible through a web browser to scan QR codes from images and webcam." />
<link rel="canonical" href="https://educatefarm.in/qr-code-scanner" />
<meta http-equiv="content-language" content="en-us">
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="QR Code Scanner - From Image & Webcam" />
<meta property="og:description" content="QR Code Scanner is the fastest and most user-friendly web application accessible through a web browser to scan QR codes from images and webcam." />
<meta property="og:url" content="https://educatefarm.in/qr-code-scanner" />
<meta property="og:site_name" content="QR Code Scanner" />
<meta name="keywords" content="QR code scanner, scan QR code, QR code from image, online QR code scanner, QR scanner, read QR online, scan QR on laptop">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "QR Code Scanner",
  "alternateName": "Scan QR Code Online",
  "description": "Online QR Code Scanner that allows users to scan QR codes from images or webcams directly in their browser.",
  "url": "https://educatefarm.in/qr-code-scanner",
  "inLanguage": "en-US"
}
</script>
<link rel="icon" type="image/x-icon" href="/images/favicon.svg" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
<link href="/css/video-style.css" rel="stylesheet">
<link href="/css/bootstrap.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="/css/file-upload-styles.css">
<style type="text/css">@font-face {font-family:Roboto;font-style:normal;font-weight:400;src:url(/fonts/roboto-latin-ext-400-normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}@font-face {font-family:Roboto;font-style:normal;font-weight:400;src:url(/fonts/roboto-latin-ext-400-normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}@font-face {font-family:Roboto;font-style:normal;font-weight:400;src:url(/fonts/roboto-greek-ext-400-normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}@font-face {font-family:Roboto;font-style:normal;font-weight:400;src:url(/fonts/roboto-vietnamese-400-normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}@font-face {font-family:Roboto;font-style:normal;font-weight:400;src:url(/fonts/roboto-latin-400-normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Roboto;font-style:normal;font-weight:400;src:url(/fonts/roboto-latin-ext-400-normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Roboto;font-style:normal;font-weight:400;src:url(/fonts/roboto-cyrillic-400-normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}</style>
<style type="text/css">
    body {
        background-color: #f8f9fa;
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
        color: #202124 !important; /* Black text for better contrast */
    }
    
    .text-muted2 {
    color: #5f6368;
    }

    .py-5 {
        padding-top: 0rem !important;
        padding-bottom: 0rem !important;
    }

    .file-container .file-wrapper {
        background-color: #ffffff;
    }

    /* Hide the AddToAny vertical share bar when the screen is less than 981 pixels wide. */
    @media screen and (max-width: 980px) {
        .a2a_floating_style.a2a_vertical_style {
            display: none;
        }
    }

    /* Hide the AddToAny horizontal share bar when the screen is greater than 980 pixels wide. */
    @media screen and (min-width: 981px) {
        .a2a_floating_style.a2a_default_style {
            display: none;
        }
    }

    #file-selector {
        cursor: pointer;
    }
</style>
</head>
<body class="d-flex flex-column">
<main class="flex-shrink-0">
        <?php
        if (file_exists(dirname(__FILE__).'/'.$relative.'qrscantemplate/navbar.php')) {
            include dirname(__FILE__).'/'.$relative.'qrscantemplate/navbar.php';
        }
        if (file_exists(dirname(__FILE__).'/'.$relative.'qrscantemplate/header.php')) {
            include dirname(__FILE__).'/'.$relative.'qrscantemplate/header.php';
        }
        if (file_exists(dirname(__FILE__).'/'.$relative.'qrscantemplate/qrcodescannerfromimage.php')) {
            include dirname(__FILE__).'/'.$relative.'qrscantemplate/qrcodescannerfromimage.php';
        }
        if (file_exists(dirname(__FILE__).'/'.$relative.'qrscantemplate/WebcamQRcodescanner.php')) {
            include dirname(__FILE__).'/'.$relative.'qrscantemplate/WebcamQRcodescanner.php';
        }
        if (file_exists(dirname(__FILE__).'/'.$relative.'qrscantemplate/main-content.php')) {
            include dirname(__FILE__).'/'.$relative.'qrscantemplate/main-content.php';
        }
        if (file_exists(dirname(__FILE__).'/'.$relative.'qrscantemplate/faq.php')) {
            include dirname(__FILE__).'/'.$relative.'qrscantemplate/faq.php';
        }
        if (file_exists(dirname(__FILE__).'/'.$relative.'qrscantemplate/footer.php')) {
            include dirname(__FILE__).'/'.$relative.'qrscantemplate/footer.php';
        }
        ?>
        </main>

<script src="/qrscanjs/bootstrap.bundle.min.js" type="8edead432664d5ef9d3f929d-text/javascript"></script>
<video style="display:none;" id="qr-video"></video>
<span style="display:none;" id="cam-qr-result-timestamp"></span>
<script type="8edead432664d5ef9d3f929d-module">
    import QrScanner from "./QRCodeScanner/qr-scanner-main/qr-scanner.min.js";
    QrScanner.WORKER_PATH = './QRCodeScanner/qr-scanner-main/qr-scanner-worker.min.js';

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
</script>

        <script src="/qrscanjs/jquery-3.5.1.min.js" type="8edead432664d5ef9d3f929d-text/javascript"></script>
        <script async src="/qrscanjs/bootstrap.min.js" type="8edead432664d5ef9d3f929d-text/javascript"></script>
        <script defer type="8edead432664d5ef9d3f929d-text/javascript" src="QRCodeScanner/js/input/script.js"></script>
        <script defer src="QRCodeScanner/js/webcam.min.js" type="8edead432664d5ef9d3f929d-text/javascript"></script>
        <script defer src="QRCodeScanner/js/effect.js" type="8edead432664d5ef9d3f929d-text/javascript"></script>
        <script type="8edead432664d5ef9d3f929d-text/javascript" src="QRCodeScanner/js/qr/gf256poly.js"></script>
        <script defer type="8edead432664d5ef9d3f929d-text/javascript" src="QRCodeScanner/js/qr/all1.js"></script>
        <script defer type="8edead432664d5ef9d3f929d-text/javascript" src="QRCodeScanner/js/qr/all2.js"></script>
        <script defer type="8edead432664d5ef9d3f929d-text/javascript" src="QRCodeScanner/js/qr/all3.js"></script>
        <script src="/qrscanjs/copyscripts.js" type="8edead432664d5ef9d3f929d-text/javascript"></script>
        <script src="/qrscanjs/scripts.js" type="8edead432664d5ef9d3f929d-text/javascript"></script>
        <script src="/qrscanjs/fileValue.js" type="8edead432664d5ef9d3f929d-text/javascript"></script>
        <script src="/qrscanjs/rocket-loader.min.js" data-cf-settings="8edead432664d5ef9d3f929d-|49" defer></script>
    </body>
</html>































