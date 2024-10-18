<section class="container py-5">
  <div class="mb-5">
    <div class="row gx-5 align-items-center">
      <div class="col-12 mb-3" style="height: 1080px;"> <!-- Inline style for height -->
        <div class="card mb-4 rounded-3 shadow-sm h-100"> <!-- Card that fills the container height -->
          <div class="card-header bg-white border-top border-5 border-warning border-bottom-0 py-3">
            <h4 class="my-0 fw-normal text-center">Scan QR Code Using Webcam</h4>
          </div>
          <div class="card-body border-0">
            <div id="example" class="img-thumbnail bg-light">
              <p class="card-text small">
                <mark><i class="bi bi-info-circle"></i> Make sure to allow camera access!</mark>
              </p>
            </div>
          </div>
          <div class="card-footer bg-white border-0">
            <button type="button" class="w-100 btn btn-lg btn-secondary" onClick="callCamera()">
              <i class="bi bi-camera-fill"></i> Open Camera
            </button>
          </div>
          <div class="card-body">
            <textarea class="form-control border-0 bg-light" id="qrContent" rows="12">Scan a QR code to view the results here.</textarea>
          </div>
          <div class="card-footer bg-white border-0">
            <button type="button" class="w-100 btn btn-lg btn-primary" onclick="if (!window.__cfRLUnblockHandlers) return false; copyReultCamera()"><i class="bi bi-paperclip"></i> Copy Results</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>