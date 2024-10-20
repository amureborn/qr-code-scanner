<section class="container py-5">
                        <div class="py-2">
                        <h2>Webcam QR code scanner</h2>
                        <p class="lead fw-normal text-muted2 mb-0">Click "Open camera" & point the QR toward it</p>
                    </div>
    <div class="row py-2">
        <!-- Left side: QR Image Upload or Webcam -->
        <div class="col-lg-6 mb-3">
            <div class="card mb-4 rounded-3 shadow-sm h-100">
                <div class="card-header bg-white border-top border-5 border-warning border-bottom-0 py-3">
                    <h4 class="my-0 fw-normal text-center">
                        <i class="bi bi-camera-fill"></i> Scan QR Code Using Webcam
                    </h4>
                </div>
                <div class="card-body text-center">
                    <div id="example" class="img-thumbnail bg-light d-flex justify-content-center align-items-center" style="height: 300px;">
                        <p class="card-text small">
                            <mark><i class="bi bi-info-circle"></i> Make sure to allow camera access!</mark>
                        </p>
                    </div>
                </div>
                <div class="card-footer border-0 bg-white text-center">
                    <button type="button" class="w-100 btn btn-lg btn-secondary" onclick="callCamera()">
                        <i class="bi bi-camera-fill"></i> Open Camera
                    </button>
                </div>
            </div>
        </div>

        <!-- Right side: Scanned QR Code Results -->
        <div class="col-lg-6">
            <div class="card mb-4 rounded-3 shadow-sm h-100">
                <div class="card-header bg-white border-top border-5 border-success border-bottom-0 py-3">
                    <h4 class="my-0 fw-normal text-center">
                        <i class="bi bi-upc-scan"></i> Scanned Data
                    </h4>
                </div>
                <div class="card-body">
                    <textarea class="form-control bg-light border-0" id="qrContent" rows="10">Scan a QR code to view the results here.</textarea>
                </div>
                <div class="card-footer bg-white border-0">
            <button type="button" class="w-100 btn btn-lg btn-primary" onclick="if (!window.__cfRLUnblockHandlers) return false; copyReultCamera()"><i class="bi bi-paperclip"></i> Copy Results</button>
          </div>
            </div>
        </div>
    </div>
</section>
