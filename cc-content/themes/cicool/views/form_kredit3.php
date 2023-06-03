<?= get_header(); ?>


<link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
<script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>
<?php $this->load->view('core_template/fine_upload'); ?>
<style>
#heading {
    text-transform: uppercase;
    color: #673AB7;
    font-weight: normal
}

#msform {
    position: relative;
    margin-top: 20px
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative
}

.form-card {
    text-align: left
}

#msform fieldset:not(:first-of-type) {
    display: none
}

#msform input,
#msform textarea {
    padding: 8px 15px 8px 15px;
    border: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    background-color: #ECEFF1;
    font-size: 16px;
    letter-spacing: 1px
}

#msform input:focus,
#msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #673AB7;
    outline-width: 0
}

#msform .action-button {
    width: 100px;
    background: #673AB7;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 0px 10px 5px;
    float: right
}

#msform .action-button:hover,
#msform .action-button:focus {
    background-color: #311B92
}

#msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px 10px 0px;
    float: right
}

#msform .action-button-previous:hover,
#msform .action-button-previous:focus {
    background-color: #000000
}

.card {
    z-index: 0;
    border: none;
    position: relative
}

.fs-title {
    font-size: 25px;
    color: #673AB7;
    margin-bottom: 15px;
    font-weight: normal;
    text-align: left
}

.purple-text {
    color: #673AB7;
    font-weight: normal
}

.steps {
    font-size: 25px;
    color: gray;
    margin-bottom: 10px;
    font-weight: normal;
    text-align: right
}

.fieldlabels {
    color: gray;
    text-align: left
}

#progressbar {
    text-align: center;
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
}

#progressbar .active {
    color: #673AB7
}

#progressbar li {
    list-style-type: none;
    font-size: 15px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar #account:before {
    font-family: FontAwesome;
    content: "\f13e"
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007"
}

#progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f030"
}

#progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c"
}

#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #673AB7
}

.progress {
    height: 20px
}

.progress-bar {
    background-color: #673AB7
}

.fit-image {
    width: 100%;
    object-fit: cover
}
</style>

<body id="page-top">
    <?= get_navigation(); ?>

    <body>

        <div class="container-fluid">
            <div class="row justify-content-center" style="padding-top:100px;display: flex;
  justify-content: center;">
                <div class="col-md-8 p-0 mt-3 mb-2">
                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                        <h2 id="heading" class="text-center">Ajukan Kredit</h2>
                        <!-- progressbar -->
                        <div id="msform">
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Mengisi Formulir</strong></li>
                                <li class="active" id="personal"><strong>Pilihan Kredit</strong></li>
                                <li class="active" id="payment"><strong>Dokumen Persyaratan</strong></li>
                                <li id="confirm"><strong>Dokumen Pelengkap</strong></li>
                            </ul>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div> <br> <!-- fieldsets -->
                            <fieldset>
                                <form method="post" action="<?= base_url('web/ajukan_kredit3') ?>"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="idkredit"
                                        value="<?= $this->session->userdata('idkredit') ?>">
                                    <?php
                                    if ($this->session->userdata('idkredit') == 1) { ?>
                                    <!-- kreditmodal -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>
                                                    Pas Foto 3x4 (PNG/JPG/JPEG) Max 1 mb <span class="text-danger">*
                                                        Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="file_photo" class="form-control"
                                                    id="file_photo" required>
                                                <span id="file_photo_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Foto KTP (PNG/JPG/JPEG) Max 1 mb <span class="text-danger">* Wajib
                                                        Diisi</span>
                                                </label>
                                                <input type="file" name="file_ktp" id="file_ktp" class="form-control"
                                                    required>
                                                <span id="file_ktp_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Foto Keluarga (PNG/JPG/JPEG) Max 1 mb <span class="text-danger">*
                                                        Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="file_kk" id="file_kk" class="form-control"
                                                    required>
                                                <span id="file_kk_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Foto Surat nikah/cerai/kematian PDF Max 30 mb <span
                                                        class="text-secondary">* Tidak Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="file_surat_nikah" id="file_surat_nikah"
                                                    class="form-control">
                                                <span id="file_surat_nikah_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Foto Jaminan/Agunan (PNG/JPG/JPEG) Max 1 mb<span
                                                        class="text-danger">* Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="jaminan" id="jaminan" class="form-control"
                                                    required>
                                                <span id="jaminan_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    File Jaminan/Agunan (SHM/SHGB/SKGR/BPKB) (pdf) Max 30 MB<span
                                                        class="text-danger">* Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="file_jaminan" id="file_jaminan"
                                                    class="form-control" required>
                                                <span id="file_jaminan_error" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="script">
                                        <script>
                                        document.getElementById('file_photo').addEventListener('change', function() {
                                            var fileInput = this;
                                            var file = fileInput.files[0];
                                            var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                                            var maxSize = 500 * 1024 * 1024; // 500 MB

                                            // Clear previous error message
                                            document.getElementById('file_photo_error').textContent = '';

                                            // Check file size
                                            if (file.size > maxSize) {
                                                document.getElementById('file_photo_error').textContent =
                                                    'Ukuran file melebihi batas maksimum (500 MB).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }

                                            // Check file type
                                            if (!allowedTypes.includes(file.type)) {
                                                document.getElementById('file_photo_error').textContent =
                                                    'Format file tidak valid (Harus PNG/JPG/JPEG).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }
                                        });
                                        </script>
                                        <script>
                                        document.getElementById('file_ktp').addEventListener('change', function() {
                                            var fileInput = this;
                                            var file = fileInput.files[0];
                                            var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                                            var maxSize = 500 * 1024 * 1024; // 500 MB

                                            // Clear previous error message
                                            document.getElementById('file_ktp_error').textContent = '';

                                            // Check file size
                                            if (file.size > maxSize) {
                                                document.getElementById('file_ktp_error').textContent =
                                                    'Ukuran file melebihi batas maksimum (500 MB).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }

                                            // Check file type
                                            if (!allowedTypes.includes(file.type)) {
                                                document.getElementById('file_ktp_error').textContent =
                                                    'Format file tidak valid (Harus PNG/JPG/JPEG).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }
                                        });
                                        </script>
                                        <script>
                                        document.getElementById('file_kk').addEventListener('change', function() {
                                            var fileInput = this;
                                            var file = fileInput.files[0];
                                            var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                                            var maxSize = 500 * 1024 * 1024; // 500 MB

                                            // Clear previous error message
                                            document.getElementById('file_kk_error').textContent = '';

                                            // Check file size
                                            if (file.size > maxSize) {
                                                document.getElementById('file_kk_error').textContent =
                                                    'Ukuran file melebihi batas maksimum (500 MB).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }

                                            // Check file type
                                            if (!allowedTypes.includes(file.type)) {
                                                document.getElementById('file_kk_error').textContent =
                                                    'Format file tidak valid (Harus PNG/JPG/JPEG).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }
                                        });
                                        </script>
                                        <script>
                                        document.getElementById('file_surat_nikah').addEventListener('change',
                                            function() {
                                                var fileInput = this;
                                                var file = fileInput.files[0];
                                                var allowedTypes = ['application/pdf'];
                                                var maxSize = 500 * 1024 * 1024; // 500 MB

                                                // Clear previous error message
                                                document.getElementById('file_surat_nikah_error').textContent = '';

                                                // Check file size
                                                if (file.size > maxSize) {
                                                    document.getElementById('file_surat_nikah_error').textContent =
                                                        'Ukuran file melebihi batas maksimum (500 MB).';
                                                    fileInput.value = ''; // Clear the file input
                                                    return;
                                                }

                                                // Check file type
                                                if (!allowedTypes.includes(file.type)) {
                                                    document.getElementById('file_surat_nikah_error').textContent =
                                                        'Format file tidak valid (Harus PDF).';
                                                    fileInput.value = ''; // Clear the file input
                                                    return;
                                                }
                                            });
                                        </script>
                                        <script>
                                        document.getElementById('jaminan').addEventListener('change', function() {
                                            var fileInput = this;
                                            var file = fileInput.files[0];
                                            var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                                            var maxSize = 500 * 1024 * 1024; // 500 MB

                                            // Clear previous error message
                                            document.getElementById('jaminan_error').textContent = '';

                                            // Check file size
                                            if (file.size > maxSize) {
                                                document.getElementById('jaminan_error').textContent =
                                                    'Ukuran file melebihi batas maksimum (500 MB).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }

                                            // Check file type
                                            if (!allowedTypes.includes(file.type)) {
                                                document.getElementById('jaminan_error').textContent =
                                                    'Format file tidak valid (Harus PNG/JPG/JPEG).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }
                                        });
                                        </script>
                                        <script>
                                        document.getElementById('file_jaminan').addEventListener('change', function() {
                                            var fileInput = this;
                                            var file = fileInput.files[0];
                                            var allowedTypes = ['application/pdf'];
                                            var maxSize = 700 * 1024 * 1024; // 500 MB

                                            // Clear previous error message
                                            document.getElementById('file_jaminan_error').textContent = '';

                                            // Check file size
                                            if (file.size > maxSize) {
                                                document.getElementById('file_jaminan_error').textContent =
                                                    'Ukuran file melebihi batas maksimum (500 MB).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }

                                            // Check file type
                                            if (!allowedTypes.includes(file.type)) {
                                                document.getElementById('file_jaminan_error').textContent =
                                                    'Format file tidak valid (Harus PDF).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }
                                        });
                                        </script>
                                    </div>
                                    <!-- batas kredit modal -->
                                    <?php } ?>
                                    <?php
                                    if ($this->session->userdata('idkredit') == 2) { ?>
                                    <!-- kreditinvestasi -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>
                                                    Pas Foto 3x4 (PNG/JPG/JPEG) Max 1 mb <span class="text-danger">*
                                                        Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="file_photo" class="form-control"
                                                    id="file_photo" required>
                                                <span id="file_photo_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Foto KTP (PNG/JPG/JPEG) Max 1 mb <span class="text-danger">* Wajib
                                                        Diisi</span>
                                                </label>
                                                <input type="file" name="file_ktp" id="file_ktp" class="form-control"
                                                    required>
                                                <span id="file_ktp_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Foto Keluarga (PNG/JPG/JPEG) Max 1 mb <span class="text-danger">*
                                                        Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="file_kk" id="file_kk" class="form-control"
                                                    required>
                                                <span id="file_kk_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Foto Surat nikah/cerai/kematian PDF Max 30 mb <span
                                                        class="text-secondary">* Tidak Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="file_surat_nikah" id="file_surat_nikah"
                                                    class="form-control">
                                                <span id="file_surat_nikah_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Foto Jaminan/Agunan (PNG/JPG/JPEG) Max 1 mb<span
                                                        class="text-danger">* Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="jaminan" id="jaminan" class="form-control"
                                                    required>
                                                <span id="jaminan_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    File Jaminan/Agunan (SHM/SHGB/SKGR/BPKB) (pdf) Max 30 MB<span
                                                        class="text-danger">* Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="file_jaminan" id="file_jaminan"
                                                    class="form-control" required>
                                                <span id="file_jaminan_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    File Surat Keterangan Usaha (Bagi yang ada usaha) (pdf) Max 30
                                                    MB<span class="text-danger">* Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="file_sku" id="file_sku" class="form-control"
                                                    required>
                                                <span id="file_sku_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    File Surat Keterangan Penghasilan (Karyawan) (pdf) Max 30 MB<span
                                                        class="text-danger">* Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="file_skp" id="file_skp" class="form-control"
                                                    required>
                                                <span id="file_skp_error" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="script">
                                        <script>
                                        document.getElementById('file_photo').addEventListener('change', function() {
                                            var fileInput = this;
                                            var file = fileInput.files[0];
                                            var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                                            var maxSize = 500 * 1024 * 1024; // 500 MB

                                            // Clear previous error message
                                            document.getElementById('file_photo_error').textContent = '';

                                            // Check file size
                                            if (file.size > maxSize) {
                                                document.getElementById('file_photo_error').textContent =
                                                    'Ukuran file melebihi batas maksimum (500 MB).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }

                                            // Check file type
                                            if (!allowedTypes.includes(file.type)) {
                                                document.getElementById('file_photo_error').textContent =
                                                    'Format file tidak valid (Harus PNG/JPG/JPEG).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }
                                        });
                                        </script>
                                        <script>
                                        document.getElementById('file_ktp').addEventListener('change', function() {
                                            var fileInput = this;
                                            var file = fileInput.files[0];
                                            var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                                            var maxSize = 500 * 1024 * 1024; // 500 MB

                                            // Clear previous error message
                                            document.getElementById('file_ktp_error').textContent = '';

                                            // Check file size
                                            if (file.size > maxSize) {
                                                document.getElementById('file_ktp_error').textContent =
                                                    'Ukuran file melebihi batas maksimum (500 MB).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }

                                            // Check file type
                                            if (!allowedTypes.includes(file.type)) {
                                                document.getElementById('file_ktp_error').textContent =
                                                    'Format file tidak valid (Harus PNG/JPG/JPEG).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }
                                        });
                                        </script>
                                        <script>
                                        document.getElementById('file_kk').addEventListener('change', function() {
                                            var fileInput = this;
                                            var file = fileInput.files[0];
                                            var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                                            var maxSize = 500 * 1024 * 1024; // 500 MB

                                            // Clear previous error message
                                            document.getElementById('file_kk_error').textContent = '';

                                            // Check file size
                                            if (file.size > maxSize) {
                                                document.getElementById('file_kk_error').textContent =
                                                    'Ukuran file melebihi batas maksimum (500 MB).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }

                                            // Check file type
                                            if (!allowedTypes.includes(file.type)) {
                                                document.getElementById('file_kk_error').textContent =
                                                    'Format file tidak valid (Harus PNG/JPG/JPEG).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }
                                        });
                                        </script>
                                        <script>
                                        document.getElementById('file_surat_nikah').addEventListener('change',
                                            function() {
                                                var fileInput = this;
                                                var file = fileInput.files[0];
                                                var allowedTypes = ['application/pdf'];
                                                var maxSize = 500 * 1024 * 1024; // 500 MB

                                                // Clear previous error message
                                                document.getElementById('file_surat_nikah_error').textContent = '';

                                                // Check file size
                                                if (file.size > maxSize) {
                                                    document.getElementById('file_surat_nikah_error').textContent =
                                                        'Ukuran file melebihi batas maksimum (500 MB).';
                                                    fileInput.value = ''; // Clear the file input
                                                    return;
                                                }

                                                // Check file type
                                                if (!allowedTypes.includes(file.type)) {
                                                    document.getElementById('file_surat_nikah_error').textContent =
                                                        'Format file tidak valid (Harus PDF).';
                                                    fileInput.value = ''; // Clear the file input
                                                    return;
                                                }
                                            });
                                        </script>
                                        <script>
                                        document.getElementById('jaminan').addEventListener('change', function() {
                                            var fileInput = this;
                                            var file = fileInput.files[0];
                                            var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                                            var maxSize = 500 * 1024 * 1024; // 500 MB

                                            // Clear previous error message
                                            document.getElementById('jaminan_error').textContent = '';

                                            // Check file size
                                            if (file.size > maxSize) {
                                                document.getElementById('jaminan_error').textContent =
                                                    'Ukuran file melebihi batas maksimum (500 MB).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }

                                            // Check file type
                                            if (!allowedTypes.includes(file.type)) {
                                                document.getElementById('jaminan_error').textContent =
                                                    'Format file tidak valid (Harus PNG/JPG/JPEG).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }
                                        });
                                        </script>
                                        <script>
                                        document.getElementById('file_jaminan').addEventListener('change', function() {
                                            var fileInput = this;
                                            var file = fileInput.files[0];
                                            var allowedTypes = ['application/pdf'];
                                            var maxSize = 700 * 1024 * 1024; // 500 MB

                                            // Clear previous error message
                                            document.getElementById('file_jaminan_error').textContent = '';

                                            // Check file size
                                            if (file.size > maxSize) {
                                                document.getElementById('file_jaminan_error').textContent =
                                                    'Ukuran file melebihi batas maksimum (500 MB).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }

                                            // Check file type
                                            if (!allowedTypes.includes(file.type)) {
                                                document.getElementById('file_jaminan_error').textContent =
                                                    'Format file tidak valid (Harus PDF).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }
                                        });
                                        </script>
                                        <script>
                                        document.getElementById('file_sku').addEventListener('change', function() {
                                            var fileInput = this;
                                            var file = fileInput.files[0];
                                            var allowedTypes = ['application/pdf'];
                                            var maxSize = 700 * 1024 * 1024; // 500 MB

                                            // Clear previous error message
                                            document.getElementById('file_sku_error').textContent = '';

                                            // Check file size
                                            if (file.size > maxSize) {
                                                document.getElementById('file_sku_error').textContent =
                                                    'Ukuran file melebihi batas maksimum (500 MB).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }

                                            // Check file type
                                            if (!allowedTypes.includes(file.type)) {
                                                document.getElementById('file_sku_error').textContent =
                                                    'Format file tidak valid (Harus PDF).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }
                                        });
                                        </script>
                                        <script>
                                        document.getElementById('file_skp').addEventListener('change', function() {
                                            var fileInput = this;
                                            var file = fileInput.files[0];
                                            var allowedTypes = ['application/pdf'];
                                            var maxSize = 700 * 1024 * 1024; // 500 MB

                                            // Clear previous error message
                                            document.getElementById('file_skp_error').textContent = '';

                                            // Check file size
                                            if (file.size > maxSize) {
                                                document.getElementById('file_skp_error').textContent =
                                                    'Ukuran file melebihi batas maksimum (500 MB).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }

                                            // Check file type
                                            if (!allowedTypes.includes(file.type)) {
                                                document.getElementById('file_skp_error').textContent =
                                                    'Format file tidak valid (Harus PDF).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }
                                        });
                                        </script>
                                    </div>
                                    <!-- batas kredit modal -->
                                    <?php } ?>
                                    <?php
                                    if ($this->session->userdata('idkredit') == 3) { ?>
                                    <!-- kredit konsumtif -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>
                                                    Pas Foto 3x4 (PNG/JPG/JPEG) Max 1 mb <span class="text-danger">*
                                                        Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="file_photo" class="form-control"
                                                    id="file_photo" required>
                                                <span id="file_photo_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Foto KTP (PNG/JPG/JPEG) Max 1 mb <span class="text-danger">* Wajib
                                                        Diisi</span>
                                                </label>
                                                <input type="file" name="file_ktp" id="file_ktp" class="form-control"
                                                    required>
                                                <span id="file_ktp_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Foto Keluarga (PNG/JPG/JPEG) Max 1 mb <span class="text-danger">*
                                                        Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="file_kk" id="file_kk" class="form-control"
                                                    required>
                                                <span id="file_kk_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Foto Surat nikah/cerai/kematian PDF Max 30 mb <span
                                                        class="text-secondary">* Tidak Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="file_surat_nikah" id="file_surat_nikah"
                                                    class="form-control">
                                                <span id="file_surat_nikah_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Foto Jaminan/Agunan (PNG/JPG/JPEG) Max 1 mb<span
                                                        class="text-danger">* Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="jaminan" id="jaminan" class="form-control"
                                                    required>
                                                <span id="jaminan_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    File Jaminan/Agunan (SHM/SHGB/SKGR/BPKB) (pdf) Max 30 MB<span
                                                        class="text-danger">* Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="file_jaminan" id="file_jaminan"
                                                    class="form-control" required>
                                                <span id="file_jaminan_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    File Bukti Penghasilan (pdf) Max 30 MB<span class="text-danger">*
                                                        Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="file_buktipenghasilan"
                                                    id="file_buktipenghasilan" class="form-control" required>
                                                <span id="file_buktipenghasilan_error" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="script">
                                        <script>
                                        document.getElementById('file_photo').addEventListener('change', function() {
                                            var fileInput = this;
                                            var file = fileInput.files[0];
                                            var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                                            var maxSize = 500 * 1024 * 1024; // 500 MB

                                            // Clear previous error message
                                            document.getElementById('file_photo_error').textContent = '';

                                            // Check file size
                                            if (file.size > maxSize) {
                                                document.getElementById('file_photo_error').textContent =
                                                    'Ukuran file melebihi batas maksimum (500 MB).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }

                                            // Check file type
                                            if (!allowedTypes.includes(file.type)) {
                                                document.getElementById('file_photo_error').textContent =
                                                    'Format file tidak valid (Harus PNG/JPG/JPEG).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }
                                        });
                                        </script>
                                        <script>
                                        document.getElementById('file_ktp').addEventListener('change', function() {
                                            var fileInput = this;
                                            var file = fileInput.files[0];
                                            var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                                            var maxSize = 500 * 1024 * 1024; // 500 MB

                                            // Clear previous error message
                                            document.getElementById('file_ktp_error').textContent = '';

                                            // Check file size
                                            if (file.size > maxSize) {
                                                document.getElementById('file_ktp_error').textContent =
                                                    'Ukuran file melebihi batas maksimum (500 MB).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }

                                            // Check file type
                                            if (!allowedTypes.includes(file.type)) {
                                                document.getElementById('file_ktp_error').textContent =
                                                    'Format file tidak valid (Harus PNG/JPG/JPEG).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }
                                        });
                                        </script>
                                        <script>
                                        document.getElementById('file_kk').addEventListener('change', function() {
                                            var fileInput = this;
                                            var file = fileInput.files[0];
                                            var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                                            var maxSize = 500 * 1024 * 1024; // 500 MB

                                            // Clear previous error message
                                            document.getElementById('file_kk_error').textContent = '';

                                            // Check file size
                                            if (file.size > maxSize) {
                                                document.getElementById('file_kk_error').textContent =
                                                    'Ukuran file melebihi batas maksimum (500 MB).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }

                                            // Check file type
                                            if (!allowedTypes.includes(file.type)) {
                                                document.getElementById('file_kk_error').textContent =
                                                    'Format file tidak valid (Harus PNG/JPG/JPEG).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }
                                        });
                                        </script>
                                        <script>
                                        document.getElementById('file_surat_nikah').addEventListener('change',
                                            function() {
                                                var fileInput = this;
                                                var file = fileInput.files[0];
                                                var allowedTypes = ['application/pdf'];
                                                var maxSize = 500 * 1024 * 1024; // 500 MB

                                                // Clear previous error message
                                                document.getElementById('file_surat_nikah_error').textContent = '';

                                                // Check file size
                                                if (file.size > maxSize) {
                                                    document.getElementById('file_surat_nikah_error').textContent =
                                                        'Ukuran file melebihi batas maksimum (500 MB).';
                                                    fileInput.value = ''; // Clear the file input
                                                    return;
                                                }

                                                // Check file type
                                                if (!allowedTypes.includes(file.type)) {
                                                    document.getElementById('file_surat_nikah_error').textContent =
                                                        'Format file tidak valid (Harus PDF).';
                                                    fileInput.value = ''; // Clear the file input
                                                    return;
                                                }
                                            });
                                        </script>
                                        <script>
                                        document.getElementById('jaminan').addEventListener('change', function() {
                                            var fileInput = this;
                                            var file = fileInput.files[0];
                                            var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                                            var maxSize = 500 * 1024 * 1024; // 500 MB

                                            // Clear previous error message
                                            document.getElementById('jaminan_error').textContent = '';

                                            // Check file size
                                            if (file.size > maxSize) {
                                                document.getElementById('jaminan_error').textContent =
                                                    'Ukuran file melebihi batas maksimum (500 MB).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }

                                            // Check file type
                                            if (!allowedTypes.includes(file.type)) {
                                                document.getElementById('jaminan_error').textContent =
                                                    'Format file tidak valid (Harus PNG/JPG/JPEG).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }
                                        });
                                        </script>
                                        <script>
                                        document.getElementById('file_jaminan').addEventListener('change', function() {
                                            var fileInput = this;
                                            var file = fileInput.files[0];
                                            var allowedTypes = ['application/pdf'];
                                            var maxSize = 700 * 1024 * 1024; // 500 MB

                                            // Clear previous error message
                                            document.getElementById('file_jaminan_error').textContent = '';

                                            // Check file size
                                            if (file.size > maxSize) {
                                                document.getElementById('file_jaminan_error').textContent =
                                                    'Ukuran file melebihi batas maksimum (500 MB).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }

                                            // Check file type
                                            if (!allowedTypes.includes(file.type)) {
                                                document.getElementById('file_jaminan_error').textContent =
                                                    'Format file tidak valid (Harus PDF).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }
                                        });
                                        </script>
                                        <script>
                                        document.getElementById('file_buktipenghasilan').addEventListener('change',
                                            function() {
                                                var fileInput = this;
                                                var file = fileInput.files[0];
                                                var allowedTypes = ['application/pdf'];
                                                var maxSize = 700 * 1024 * 1024; // 500 MB

                                                // Clear previous error message
                                                document.getElementById('file_buktipenghasilan_error').textContent =
                                                    '';

                                                // Check file size
                                                if (file.size > maxSize) {
                                                    document.getElementById('file_buktipenghasilan_error')
                                                        .textContent =
                                                        'Ukuran file melebihi batas maksimum (500 MB).';
                                                    fileInput.value = ''; // Clear the file input
                                                    return;
                                                }

                                                // Check file type
                                                if (!allowedTypes.includes(file.type)) {
                                                    document.getElementById('file_buktipenghasilan_error')
                                                        .textContent = 'Format file tidak valid (Harus PDF).';
                                                    fileInput.value = ''; // Clear the file input
                                                    return;
                                                }
                                            });
                                        </script>
                                    </div>
                                    <!-- batas kredit modal -->
                                    <?php } ?>
                                    <?php
                                    if ($this->session->userdata('idkredit') == 4) { ?>
                                    <!-- kredit kartama -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>
                                                    Pas Foto 3x4 (PNG/JPG/JPEG) Max 1 Mb <span class="text-danger">*
                                                        Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="file_photo" class="form-control"
                                                    id="file_photo" required>
                                                <span id="file_photo_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Foto KTP (PNG/JPG/JPEG) Max 1 Mb <span class="text-danger">* Wajib
                                                        Diisi</span>
                                                </label>
                                                <input type="file" name="file_ktp" id="file_ktp" class="form-control"
                                                    required>
                                                <span id="file_ktp_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Foto Keluarga (PNG/JPG/JPEG) Max 1 Mb <span class="text-danger">*
                                                        Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="file_kk" id="file_kk" class="form-control"
                                                    required>
                                                <span id="file_kk_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Foto Surat nikah/cerai/kematian PDF Max 30 mb <span
                                                        class="text-secondary">* Tidak Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="file_surat_nikah" id="file_surat_nikah"
                                                    class="form-control">
                                                <span id="file_surat_nikah_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Foto Jaminan/Agunan (PNG/JPG/JPEG) Max 1 mb<span
                                                        class="text-danger">* Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="jaminan" id="jaminan" class="form-control"
                                                    required>
                                                <span id="jaminan_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    File Jaminan/Agunan (SHM/SHGB/SKGR/BPKB) (pdf) Max 30 MB<span
                                                        class="text-danger">* Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="file_jaminan" id="file_jaminan"
                                                    class="form-control" required>
                                                <span id="file_jaminan_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    File Bukti Penghasilan (pdf) Max 30 MB<span class="text-danger">*
                                                        Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="file_buktipenghasilan"
                                                    id="file_buktipenghasilan" class="form-control" required>
                                                <span id="file_buktipenghasilan_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    File Slip Gaji 3 Bulan Terakhir (pdf) Max 30 MB<span
                                                        class="text-danger">* Wajib Diisi</span>
                                                </label>
                                                <input type="file" name="file_slipgaji" id="file_slipgaji"
                                                    class="form-control" required>
                                                <span id="file_slipgaji_error" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="script">
                                        <script>
                                        document.getElementById('file_photo').addEventListener('change', function() {
                                            var fileInput = this;
                                            var file = fileInput.files[0];
                                            var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                                            var maxSize = 500 * 1024 * 1024; // 500 MB

                                            // Clear previous error message
                                            document.getElementById('file_photo_error').textContent = '';

                                            // Check file size
                                            if (file.size > maxSize) {
                                                document.getElementById('file_photo_error').textContent =
                                                    'Ukuran file melebihi batas maksimum (500 MB).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }

                                            // Check file type
                                            if (!allowedTypes.includes(file.type)) {
                                                document.getElementById('file_photo_error').textContent =
                                                    'Format file tidak valid (Harus PNG/JPG/JPEG).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }
                                        });
                                        </script>
                                        <script>
                                        document.getElementById('file_ktp').addEventListener('change', function() {
                                            var fileInput = this;
                                            var file = fileInput.files[0];
                                            var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                                            var maxSize = 500 * 1024 * 1024; // 500 MB

                                            // Clear previous error message
                                            document.getElementById('file_ktp_error').textContent = '';

                                            // Check file size
                                            if (file.size > maxSize) {
                                                document.getElementById('file_ktp_error').textContent =
                                                    'Ukuran file melebihi batas maksimum (500 MB).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }

                                            // Check file type
                                            if (!allowedTypes.includes(file.type)) {
                                                document.getElementById('file_ktp_error').textContent =
                                                    'Format file tidak valid (Harus PNG/JPG/JPEG).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }
                                        });
                                        </script>
                                        <script>
                                        document.getElementById('file_kk').addEventListener('change', function() {
                                            var fileInput = this;
                                            var file = fileInput.files[0];
                                            var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                                            var maxSize = 500 * 1024 * 1024; // 500 MB

                                            // Clear previous error message
                                            document.getElementById('file_kk_error').textContent = '';

                                            // Check file size
                                            if (file.size > maxSize) {
                                                document.getElementById('file_kk_error').textContent =
                                                    'Ukuran file melebihi batas maksimum (500 MB).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }

                                            // Check file type
                                            if (!allowedTypes.includes(file.type)) {
                                                document.getElementById('file_kk_error').textContent =
                                                    'Format file tidak valid (Harus PNG/JPG/JPEG).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }
                                        });
                                        </script>
                                        <script>
                                        document.getElementById('file_surat_nikah').addEventListener('change',
                                            function() {
                                                var fileInput = this;
                                                var file = fileInput.files[0];
                                                var allowedTypes = ['application/pdf'];
                                                var maxSize = 500 * 1024 * 1024; // 500 MB

                                                // Clear previous error message
                                                document.getElementById('file_surat_nikah_error').textContent = '';

                                                // Check file size
                                                if (file.size > maxSize) {
                                                    document.getElementById('file_surat_nikah_error').textContent =
                                                        'Ukuran file melebihi batas maksimum (500 MB).';
                                                    fileInput.value = ''; // Clear the file input
                                                    return;
                                                }

                                                // Check file type
                                                if (!allowedTypes.includes(file.type)) {
                                                    document.getElementById('file_surat_nikah_error').textContent =
                                                        'Format file tidak valid (Harus PDF).';
                                                    fileInput.value = ''; // Clear the file input
                                                    return;
                                                }
                                            });
                                        </script>
                                        <script>
                                        document.getElementById('jaminan').addEventListener('change', function() {
                                            var fileInput = this;
                                            var file = fileInput.files[0];
                                            var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                                            var maxSize = 500 * 1024 * 1024; // 500 MB

                                            // Clear previous error message
                                            document.getElementById('jaminan_error').textContent = '';

                                            // Check file size
                                            if (file.size > maxSize) {
                                                document.getElementById('jaminan_error').textContent =
                                                    'Ukuran file melebihi batas maksimum (500 MB).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }

                                            // Check file type
                                            if (!allowedTypes.includes(file.type)) {
                                                document.getElementById('jaminan_error').textContent =
                                                    'Format file tidak valid (Harus PNG/JPG/JPEG).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }
                                        });
                                        </script>
                                        <script>
                                        document.getElementById('file_jaminan').addEventListener('change', function() {
                                            var fileInput = this;
                                            var file = fileInput.files[0];
                                            var allowedTypes = ['application/pdf'];
                                            var maxSize = 700 * 1024 * 1024; // 500 MB

                                            // Clear previous error message
                                            document.getElementById('file_jaminan_error').textContent = '';

                                            // Check file size
                                            if (file.size > maxSize) {
                                                document.getElementById('file_jaminan_error').textContent =
                                                    'Ukuran file melebihi batas maksimum (500 MB).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }

                                            // Check file type
                                            if (!allowedTypes.includes(file.type)) {
                                                document.getElementById('file_jaminan_error').textContent =
                                                    'Format file tidak valid (Harus PDF).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }
                                        });
                                        </script>
                                        <script>
                                        document.getElementById('file_buktipenghasilan').addEventListener('change',
                                            function() {
                                                var fileInput = this;
                                                var file = fileInput.files[0];
                                                var allowedTypes = ['application/pdf'];
                                                var maxSize = 700 * 1024 * 1024; // 500 MB

                                                // Clear previous error message
                                                document.getElementById('file_buktipenghasilan_error').textContent =
                                                    '';

                                                // Check file size
                                                if (file.size > maxSize) {
                                                    document.getElementById('file_buktipenghasilan_error')
                                                        .textContent =
                                                        'Ukuran file melebihi batas maksimum (500 MB).';
                                                    fileInput.value = ''; // Clear the file input
                                                    return;
                                                }

                                                // Check file type
                                                if (!allowedTypes.includes(file.type)) {
                                                    document.getElementById('file_buktipenghasilan_error')
                                                        .textContent = 'Format file tidak valid (Harus PDF).';
                                                    fileInput.value = ''; // Clear the file input
                                                    return;
                                                }
                                            });
                                        </script>
                                        <script>
                                        document.getElementById('file_slipgaji').addEventListener('change', function() {
                                            var fileInput = this;
                                            var file = fileInput.files[0];
                                            var allowedTypes = ['application/pdf'];
                                            var maxSize = 700 * 1024 * 1024; // 500 MB

                                            // Clear previous error message
                                            document.getElementById('file_slipgaji_error').textContent = '';

                                            // Check file size
                                            if (file.size > maxSize) {
                                                document.getElementById('file_slipgaji_error').textContent =
                                                    'Ukuran file melebihi batas maksimum (500 MB).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }

                                            // Check file type
                                            if (!allowedTypes.includes(file.type)) {
                                                document.getElementById('file_slipgaji_error').textContent =
                                                    'Format file tidak valid (Harus PDF).';
                                                fileInput.value = ''; // Clear the file input
                                                return;
                                            }
                                        });
                                        </script>
                                    </div>
                                    <!-- batas kredit kartama -->
                                    <?php } ?>
                                    <div class="pull-left">
                                        <a href="<?= base_url('web/ajukan_kredit2') ?>"
                                            class="btn btn-danger">Sebelumnya</a>
                                    </div>
                                    <div class="pull-right">
                                        <button class="btn btn-success" type="submit">Selanjutnya</button>
                                    </div>
                                </form>
                            </fieldset>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= get_footer(); ?>
        <script>
        $(document).ready(function() {
            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 2;
            var steps = 3;
            setProgressBar(current);
            $(".next").click(function() {
                current_fs = $(this).parent();
                next_fs = $(this).parent().next();
                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;
                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(++current);
            });
            $(".previous").click(function() {
                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();
                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
                //show the previous fieldset
                previous_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;
                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(--current);
            });

            function setProgressBar(curStep) {
                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                    .css("width", percent + "%")
            }
            $(".submit").click(function() {
                return false;
            })
        });
        </script>
    </body>