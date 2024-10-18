<section class="container py-5">
    <div class="mb-5">
        <div class="col-lg-12 mb-3" style="height: 970px;">
            <div class="card mb-4 rounded-3 shadow-sm h-100">
                <div class="card-header bg-white border-top border-5 border-warning border-bottom-0 py-3">
                    <h4 class="my-0 fw-normal text-center">Select Your QR Image</h4>
                </div>
                <div class="card-body">
                    <div class="image-upload">
                        <input type="file" name id="file-selector" onchange="if (!window.__cfRLUnblockHandlers) return false; fileValue(this)" data-cf-modified-8edead432664d5ef9d3f929d->
                        <label for="file-selector" class="upload-field" id="file-label">
                            <div class="file-thumbnail">
                                <img id="image-preview" src="https://qrcodescanner.me/assets/upload.webp" alt="Upload placeholder">
                                <br><br>
                                <h3 id="filename">Drag &amp; Drop To upload a File or</h3>
                                <!-- Trigger file selector when this button is clicked -->
                                <button type="button" class="btn btn-primary btn-lg" onclick="document.getElementById('file-selector').click();" style="margin-top: 5px; margin-bottom: 5px;">
                                    Browse File
                                </button>
                                <p class="card-text"><small class="text-muted2">All image types allowed.</small></p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="card-body">
                    <textarea class="form-control bg-light border-0" id="file-qr-result" style="margin-bottom: 10px;" rows="7">Scan a QR code to view the results here.</textarea>
                </div>
                <div class="card-footer border-0 bg-white">
                    <button type="button" class="w-100 btn btn-lg btn-primary" onClick="if (!window.__cfRLUnblockHandlers) return false; copyReult()" data-cf-modified-8edead432664d5ef9d3f929d-><i class="bi bi-paperclip"></i> Copy Results</button>
                </div>
                <div class="card-footer border-0 bg-white text-muted">
                    <small class="text-muted2"><i class="bi bi-file-earmark-lock2-fill"></i> Built with the most used and secure Google's Zxing library.</small>
                </div>
            </div>
        </div>
    </div>
</section>