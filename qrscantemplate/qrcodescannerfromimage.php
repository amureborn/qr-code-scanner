<section class="container py-5">
                    <div class="py-2">
                        <h2>Scan QR code from image</h2>
                        <p class="lead fw-normal text-muted2 mb-0">Simply upload an image or take a photo of a QR code to reveal its content</p>
                    </div>
    <div class="row  py-2">
        <!-- Left side: QR Image Upload -->
        <div class="col-lg-6 mb-3">
            <div class="card mb-4 rounded-3 shadow-sm h-100">
                <div class="card-header bg-white border-top border-5 border-warning border-bottom-0 py-3">
                    <h4 class="my-0 fw-normal text-center">
                        <i class="bi bi-check2-circle"></i> Select Your QR Image
                    </h4>
                </div>
                <div class="card-body">
                    <div class="image-upload text-center">
                        <input type="file" name id="file-selector" onchange="if (!window.__cfRLUnblockHandlers) return false; fileValue(this)" data-cf-modified-8edead432664d5ef9d3f929d->
                        <label for="file-selector" class="upload-field" id="file-label">
                            <div class="file-thumbnail">
                                <img id="image-preview" src="/images/upload.webp" alt="Upload placeholder" class="img-fluid" style="max-width: 100px;">
                                <h3 id="filename" class="mt-3">Drag &amp; Drop to upload a file or</h3>
                                <!-- Trigger file selector when this button is clicked -->
                                <button type="button" class="btn btn-primary btn-lg mt-2" onclick="document.getElementById('file-selector').click();">
                                    Browse File
                                </button>
                                <p class="card-text mt-3">
                                    <small class="text-muted">All image types allowed.</small>
                                </p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="card-footer border-0 bg-white text-muted">
    <small class="text-muted2"><i class="bi bi-file-earmark-lock2-fill"> Built with the most used and <a href="https://doi.org/10.3390/info11040217" class="text-muted2">secure Google's Zxing library.</a></i></small>
  </div>
            </div>
        </div>

        <!-- Right side: Scanned Data -->
        <div class="col-lg-6">
            <div class="card mb-4 rounded-3 shadow-sm h-100">
                <div class="card-header bg-white border-top border-5 border-success border-bottom-0 py-3">
                    <h4 class="my-0 fw-normal text-center">
                        <i class="bi bi-upc-scan"></i> Scanned Data
                    </h4>
                </div>
                <div class="card-body">
                    <textarea class="form-control bg-light border-0" id="file-qr-result" rows="7">Scan a QR code to view the results here.</textarea>
                </div>
                <div class="card-footer border-0 bg-white">
                    <button type="button" class="w-100 btn btn-lg btn-primary" onClick="if (!window.__cfRLUnblockHandlers) return false; copyReult()" data-cf-modified-8edead432664d5ef9d3f929d-><i class="bi bi-paperclip"></i> Copy Results</button>
                </div>
            </div>
        </div>
    </div>
</section>