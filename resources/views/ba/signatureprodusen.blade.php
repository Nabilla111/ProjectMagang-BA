<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.signature/1.1.4/jquery.signature.min.css">
</head>
<body>
    <div class="modal fade" id="ttdprod" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><b>Tanda Tangan Produsen Data</b></h1>
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
                                <form id="signatureFormProd" method="POST" action="{{ route('ba.signpadprod.save') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Nama</th>
                                                </tr>
                                                <td>
                                                    <input type="text" name="nameprodusen" class="form-control" placeholder="masukan nama lengkap beserta title" value="">
                                                </td>
                                                <tr>
                                                    <th>NIP</th>
                                                </tr>
                                                <td>
                                                    <input type="text" name="nipprodusen" class="form-control" placeholder="masukan NIP" value="">
                                                </td>
                                                <tr>
                                                    <th>No. HP</th>
                                                </tr>
                                                <td>
                                                    <input type="text" name="hpprodusen" class="form-control" placeholder="masukan No. HP" value="">
                                                </td>
                                                <td>
                                                    <input type="hidden" name="ba_id" value="{{ $bas->id }}">
                                                </td>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <label><b>Signature: </b></label>
                                            <div class="kbw-signature" style="width: 100%; height: 200px; border: 1px solid #ccc; padding: 1px;">
                                                <canvas id="sigCanvasprod"></canvas>
                                            </div>
                                            <textarea id="signatureprod" name="signatureprod" style="display: none"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="clearFooter" class="btn btn-danger">Ulangi</button>
                    <button id="saveprod" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script type="text/javascript">
        var canvas = document.querySelector("#sigCanvasprod");
        var signaturePad = new SignaturePad(canvas);
        
        $('#clearFooter').click(function (e) {
            e.preventDefault();
            signaturePad.clear();
            $("#signatureprod").val(''); // Menghapus nilai dari textarea yang menyimpan tanda tangan
        });
    
        $('#saveprod').click(function (e) {
            e.preventDefault();
            if (!signaturePad.isEmpty()) {
                // Menyimpan tanda tangan ke dalam textarea
                $("#signatureprod").val(signaturePad.toDataURL());
                // Submit form
                $("#signatureFormProd").submit();
            } else {
                alert("Tanda tangan belum dibuat.");
            }
        });
    </script>
</body>
</html>
