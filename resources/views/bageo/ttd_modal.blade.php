<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Pilih Tanda Tangan</title>
</head>
<body>
    <div class="modal fade" id="ttdChoiceModal" tabindex="-1" aria-labelledby="ttdChoiceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ttdChoiceModalLabel">Pilih Tanda Tangan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="signatureDropdown">Pilih Nama untuk Tanda Tangan:</label>
                        <select class="form-control" id="signatureDropdown">
                            <option value="">-- Pilih Nama --</option>
                            @foreach($ttd_kabids as $nama)
                                <option data-nama="{{ $nama->nama }}" data-ttd="{{ asset('storage/' . $nama->ttd) }}">
                                    {{ $nama->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div id="imageContainer" style="display: none;" class="mt-4">
                        <p id="selectedSignatureName"></p>
                        <img id="selectedSignature" src="" alt="Tanda Tangan" width="140" height="140">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="confirmSignature">Pilih</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdown = document.getElementById('signatureDropdown');
            const imageContainer = document.getElementById('imageContainer');
            const confirmButton = document.getElementById('confirmSignature');
    
            dropdown.addEventListener('change', function() {
                const selectedSignature = dropdown.value;
                const selectedNama = dropdown.options[dropdown.selectedIndex].getAttribute('data-nama');
    
                if (selectedSignature) {
                    imageContainer.style.display = 'block';
                    imageContainer.innerHTML = `
                        <center>
                            <p><strong>${selectedNama}</strong></p>
                            <img src="${selectedSignature}" alt="Tanda Tangan" width="140" height="140" style="max-width: 100%; height: auto;">
                        </center>`;
                } else {
                    imageContainer.style.display = 'none';
                }
            });
    
            confirmButton.addEventListener('click', function() {
                const selectedSignature = dropdown.value;
                if (selectedSignature) {
                    // Kirim data kembali ke show.blade.php
                    window.parent.document.getElementById('selectedSignature').src = selectedSignature;
                    window.parent.document.getElementById('selectedSignatureName').innerText = dropdown.options[dropdown.selectedIndex].getAttribute('data-nama');
                    $('#ttdChoiceModal').modal('hide'); // Tutup modal
                }
            });
        });
    </script>

</body>
</html>