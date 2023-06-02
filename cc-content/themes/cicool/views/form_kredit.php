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
    text-align: center;
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
                <div class="col-md-8 text-center p-0 mt-3 mb-2">
                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                        <h2 id="heading">Ajukan Kredit</h2>
                        <!-- progressbar -->
                        <div id="msform">
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Mengisi Formulir</strong></li>
                                <li id="personal"><strong>Pilihan Kredit</strong></li>
                                <li id="payment"><strong>Dokumen Persyaratan</strong></li>
                                <li id="confirm"><strong>Dokumen Pelengkap</strong></li>
                            </ul>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div> <br> <!-- fieldsets -->
                            <fieldset>
                                <form method="post" action="<?= base_url('web/ajukan_kredit') ?>">
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Mengisi Formulir</h2>
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 1 - 4</h2>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap <i class="required">*</i>
                                            </label>
                                            <input type="text" class="form-control" name="nama" id="nama"
                                                placeholder="Nama Lengkap" value="<?= get_user_data('username') ?>"
                                                required>
                                            <?php echo form_error('nama', '<span class="text-danger">', '</span>'); ?>

                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat <i class="required">*</i>
                                            </label>
                                            <textarea class="form-control" name="alamat" id="nama_lengkap"
                                                placeholder="Alamat" rows="3" required></textarea>
                                        </div>
                                        <div class="form-group group-no_hp ">
                                            <label for="no_hp">No Hp <i class="required">*</i>
                                            </label>
                                            <input type="text" class="form-control" name="nohp" id="nohp"
                                                placeholder="No Hp" value="<?= set_value('nohp'); ?>" required>
                                        </div>
                                        <div class="form-group group-no_hp ">
                                            <label for="usia">Usia<i class="required">*</i>
                                            </label>
                                            <input type="number" class="form-control" name="usia" id="usia"
                                                placeholder="Usia" value="<?= set_value('usia'); ?>" required>
                                        </div>
                                        <div class="form-group group-jangka_waktu ">
                                            <label for="jangkawaktu">Jangka Waktu <i class="required">*</i>
                                            </label>
                                            <select name="jangka_waktu" class="form-control" required>
                                                <option value="">Pilih Jangka Waktu</option>
                                                <option value="12">Jangka Waktu 12 Bulan</option>
                                                <option value="18">Jangka Waktu 18 Bulan</option>
                                                <option value="24">Jangka Waktu 24 Bulan</option>
                                                <option value="30">Jangka Waktu 30 Bulan</option>
                                                <option value="36">Jangka Waktu 36 Bulan</option>
                                                <option value="48">Jangka Waktu 48 Bulan</option>
                                                <option value="60">Jangka Waktu 60 Bulan</option>
                                            </select>
                                        </div>
                                        <div class="form-group group-jumlahpinjaman ">
                                            <label for="jumlahpinjaman">Jumlah Pinjaman <i class="required">*</i>
                                            </label>
                                            <select class="form-control chosen chosen-select-deselect" required
                                                name="jumlah_pinjaman" id="jumlah_pinjaman"
                                                data-placeholder="Select Jumlah Pinjaman">
                                                <option value="">Pilih Jumlah Pinjaman</option>
                                                <?php foreach (db_get_all_data('simulasi_kredit') as $row): ?>
                                                <option value="<?= $row->plafond ?>">
                                                    <?= number_format($row->plafond, 0, '.', '.') ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <input type="button" name="next" class="next action-button" value="Next" /> -->
                                    <button class="btn btn btn-success pull-right" type="submit">Selanjutnya</button>
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
            var current = 1;
            var steps = 4;
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