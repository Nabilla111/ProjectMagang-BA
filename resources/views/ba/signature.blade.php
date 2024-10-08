<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.signature/1.1.4/jquery.signature.min.css">
</head>
<body>
    <div class="modal fade" id="ttdwali" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><b>Tanda Tangan Walidata Daerah</b><br>mohon tanda tangan berada di tengah</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="card-body">
                                @if (session('success'))
                                <div class="alert alert-success" id="successMessage">
                                    <span>{{ session('success') }}</span>
                                </div>
                                @endif
                                <form id="signatureForm" method="POST" action="{{ route('ba.signpad.save') }}"  enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="name" class="form-control" value="{{ auth()->user()->name }}">
                                    <input type="hidden" name="nip" class="form-control" value="{{ auth()->user()->nip }}">
                                    <input type="hidden" name="hp" class="form-control" value="{{ auth()->user()->telpon }}">
                                    <input type="hidden" name="ba_id" value="{{ $bas->id }}">
                                    <label><b>Signature: </b></label>
                                    <div class="kbw-signature" style="width: 100%; height: 200px; border: 1px solid #ccc; padding: 1px;">
                                        <canvas id="sigCanvas" width="600" height="200"></canvas>
                                    </div>
                                    <textarea id="signature" name="signed" style="display: none"></textarea>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="clear" class="btn btn-danger">Ulangi</button>
                    <button id="save" class="btn btn-primary" type="button">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var canvas = document.querySelector("#sigCanvas");
            var signaturePad = new SignaturePad(canvas);

            $('#clear').click(function (e) {
                e.preventDefault();
                signaturePad.clear();
            });

            $('#save').click(function (e) {
                e.preventDefault();
                setTimeout(function() {
                    console.log("Apakah tanda tangan kosong?", signaturePad.isEmpty());
                    if (!signaturePad.isEmpty()) {
                        // Menyimpan tanda tangan ke dalam textarea
                        $("#signature").val(signaturePad.toDataURL());
                        // Submit form
                        $("#signatureForm").submit();
                        // Menampilkan notifikasi berhasil
                        $("#successMessage").html('<span>Tanda tangan berhasil disimpan.</span>');
                    } else {
                        alert("Tanda tangan belum dibuat.");
                    }
                }, 500); // Periksa tanda tangan setelah jeda 500ms
            });
        });
    </script>    
</body>
</html>