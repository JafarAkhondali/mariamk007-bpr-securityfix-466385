<?= get_header(); ?>


<link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
<script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>
<?php $this->load->view('core_template/fine_upload'); ?>
<style>
#heading {
    text-transform: uppercase;
    color: #3AB759;
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
    border: 1px solid #3AB759;
    outline-width: 0
}

#msform .action-button {
    width: 100px;
    background: #3AB759;
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
    color: #3AB759;
    margin-bottom: 15px;
    font-weight: normal;
    text-align: left
}

.purple-text {
    color: #3AB759;
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
    color: #3AB759
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
    background: #3AB759
}

.progress {
    height: 20px
}

.progress-bar {
    background-color: #3AB759
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
                                            <label for="nama_lengkap">Nama Lengkap <i class="required">*</i>
                                            </label>
                                            <input type="text" class="form-control" name="nama_lengkap"
                                                placeholder="Nama Lengkap" value="<?= get_user_data('username') ?>">
                                            <?php echo form_error('nama', '<span class="text-danger">', '</span>'); ?>

                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat <i class="required">*</i>
                                            </label>
                                            <textarea class="form-control" name="alamat" placeholder="Alamat" rows="3"
                                                required></textarea>
                                        </div>
                                        <div class="form-group group-no_hp ">
                                            <label for="no_hp">No Hp <i class="required">*</i>
                                            </label>
                                            <input type="number" class="form-control" name="no_hp" placeholder="No Hp"
                                                value="" required>
                                        </div>
                                        <div class="form-group group-usia ">
                                            <label for="usia">Usia<i class="required">*</i>
                                            </label>
                                            <input type="number" class="form-control" name="usia" placeholder="Usia"
                                                value="" required>
                                        </div>

                                        <div class="form-group group-jumlahpinjaman ">
                                            <label for="jumlahpinjaman">Pilih Jumlah Pinjaman <i class="required">*</i>
                                            </label>
                                            <select class="form-control chosen chosen-select-deselect"
                                                name="jumlah_pinjaman" id="plafond"
                                                data-placeholder="Select Jumlah Pinjaman" required
                                                onchange="calculate()">
                                                <option value="">Pilih Jumlah Pinjaman</option>
                                                <?php foreach (db_get_all_data('plafond') as $row): ?>
                                                <option value="<?= $row->value ?>">
                                                    <?= number_format($row->value, 0, '.', '.') ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="form-group group-jangka_waktu ">
                                            <label for="jangkawaktu">Jangka Waktu <i class="required">*</i>
                                            </label>
                                            <select name="jangka_waktu" class="form-control" id="duration" required
                                                onchange="calculateBunga()">
                                                <option value="">Pilih Jangka Waktu</option>
                                            </select>
                                        </div>

                                        <div class="form-group group-bunga">
                                            <label for="bunga">Bunga <i class="required">*</i>
                                            </label>
                                            <select name="bunga" class="form-control" id="bunga" required
                                                onchange="calculateTotal()">
                                                <option value="">Pilih Bunga</option>
                                            </select>
                                        </div>
                                        <!-- <input type="button" name="next" class="next action-button" value="Next" /> -->
                                        <button class="btn btn btn-success pull-right"
                                            type="submit">Selanjutnya</button>
                                        <!-- <label for="plafond">Plafond Kredit (Rp)</label>
                                        <input type="number" id="plafond"> -->

                                        <!-- <label for="duration">Jangka Waktu (bulan)</label>
                                        <input type="number" id="duration"> -->

                                        <input name="jumlah_angsuran" value="" id="input_jumlah_angsuran" type="hidden">
                                        <!-- <input name="jangka_waktu" value="" id="input_jangka_waktu" type="hidden"> -->
                                        <!-- <input name="bunga" value="" id="input_bunga" type="hidden"> -->

                                        <!-- <button>Hitung</button> -->

                                        <!-- <p>Hasil Perhitungan:</p> -->
                                        <p id="result"></p>
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
        <script>
        function calculate() {
            const plafond = parseInt(document.getElementById("plafond").value);
            var select = document.getElementById('plafond');
            const option = select.options[select.selectedIndex];
            const duration = parseInt(document.getElementById("duration").value);
            const bunga = parseInt(document.getElementById("bunga").value);
            let interestRate = 0;
            // console.log(plafond, 'plafond')

            //plafond = jumlah pinjaman
            //duration = lama pinjaman
            //interest rate = bunga
            if (plafond >= 2000000 && plafond <= 10000000) {
                // $('#plafond').html(
                //     `<option value=''>Pilih Plafond</option>
                //     <option value='5000000'>Rp. 5.000.000</option>
                //     <option value='10000000'>Rp. 10.000.000</option>`
                // );
                $('#duration').html(
                    `<option value=''>Pilih Jangka Waktu</option>
                    <option value='1'>Jangka Waktu 1 Bulan</option>
                    <option value='2'>Jangka Waktu 2 Bulan</option>
                    <option value='3'>Jangka Waktu 3 Bulan</option>
                    <option value='4'>Jangka Waktu 4 Bulan</option>
                    <option value='5'>Jangka Waktu 5 Bulan</option>
                    <option value='6'>Jangka Waktu 6 Bulan</option>
                    <option value='7'>Jangka Waktu 7 Bulan</option>
                    <option value='8'>Jangka Waktu 8 Bulan</option>
                    <option value='9'>Jangka Waktu 9 Bulan</option>
                    <option value='10'>Jangka Waktu 10 Bulan</option>
                    <option value='11'>Jangka Waktu 11 Bulan</option>
                    <option value='12'>Jangka Waktu 12 Bulan</option>
                    <option value='13'>Jangka Waktu 13 Bulan</option>
                    <option value='14'>Jangka Waktu 14 Bulan</option>
                    <option value='15'>Jangka Waktu 15 Bulan</option>
                    <option value='16'>Jangka Waktu 16 Bulan</option>
                    <option value='17'>Jangka Waktu 17 Bulan</option>
                    <option value='18'>Jangka Waktu 18 Bulan</option>`
                );

                $('#bunga').html(
                    `<option value=''>Pilih Bunga</option>
                    <option value='21'>21%</option>`
                );
                // if (duration >= 1 && duration <= 18) {
                interestRate = 0.21; // 21%
                // }
            } else if (plafond >= 11000000 && plafond <= 25000000) {
                // $('#plafond').html(
                //     `<option value=''>Pilih Plafond</option>
                //         <option value='15000000'>Rp.15.000.000</option>
                //         <option value='20000000'>Rp.20.000.000</option>
                //         <option value='25000000'>Rp.25.000.000</option>`
                // );
                $('#duration').html(
                    `<option value=''>Pilih Jangka Waktu</option>
                    <option value='1'>Jangka Waktu 1 Bulan</option>
                    <option value='2'>Jangka Waktu 2 Bulan</option>
                    <option value='3'>Jangka Waktu 3 Bulan</option>
                    <option value='4'>Jangka Waktu 4 Bulan</option>
                    <option value='5'>Jangka Waktu 5 Bulan</option>
                    <option value='6'>Jangka Waktu 6 Bulan</option>
                    <option value='7'>Jangka Waktu 7 Bulan</option>
                    <option value='8'>Jangka Waktu 8 Bulan</option>
                    <option value='9'>Jangka Waktu 9 Bulan</option>
                    <option value='10'>Jangka Waktu 10 Bulan</option>
                    <option value='11'>Jangka Waktu 11 Bulan</option>
                    <option value='12'>Jangka Waktu 12 Bulan</option>
                    <option value='13'>Jangka Waktu 13 Bulan</option>
                    <option value='14'>Jangka Waktu 14 Bulan</option>
                    <option value='15'>Jangka Waktu 15 Bulan</option>
                    <option value='16'>Jangka Waktu 16 Bulan</option>
                    <option value='17'>Jangka Waktu 17 Bulan</option>
                    <option value='18'>Jangka Waktu 18 Bulan</option>
                    <option value='19'>Jangka Waktu 19 Bulan</option>
                    <option value='20'>Jangka Waktu 20 Bulan</option>
                    <option value='21'>Jangka Waktu 21 Bulan</option>
                    <option value='22'>Jangka Waktu 22 Bulan</option>
                    <option value='23'>Jangka Waktu 23 Bulan</option>
                    <option value='24'>Jangka Waktu 24 Bulan</option>
                    <option value='25'>Jangka Waktu 25 Bulan</option>
                    <option value='26'>Jangka Waktu 26 Bulan</option>
                    <option value='27'>Jangka Waktu 27 Bulan</option>
                    <option value='28'>Jangka Waktu 28 Bulan</option>
                    <option value='29'>Jangka Waktu 29 Bulan</option>
                    <option value='30'>Jangka Waktu 30 Bulan</option>
                    <option value='31'>Jangka Waktu 31 Bulan</option>
                    <option value='32'>Jangka Waktu 32 Bulan</option>
                    <option value='33'>Jangka Waktu 33 Bulan</option>
                    <option value='34'>Jangka Waktu 34 Bulan</option>
                    <option value='35'>Jangka Waktu 35 Bulan</option>
                    <option value='36'>Jangka Waktu 36 Bulan</option>
                    `
                );
                // $('#bunga').html(
                //     `<option value=''>Pilih Bunga</option>
                //         <option value='20'>20%</option>`
                // );
                if (duration >= 1 && duration <= 12) {
                    // $('#duration').html(
                    //     `<option value=''>Pilih Jangka Waktu</option>
                    //     <option value='1'>Jangka Waktu 1 Bulan</option>
                    //     <option value='2'>Jangka Waktu 2 Bulan</option>
                    //     <option value='3'>Jangka Waktu 3 Bulan</option>
                    //     <option value='4'>Jangka waktu 4 Bulan</option>
                    //     <option value='5'>Jangka waktu 5 Bulan</option>
                    //     <option value='6'>Jangka waktu 6 Bulan</option>
                    //     <option value='7'>Jangka waktu 7 Bulan</option>
                    //     <option value='8'>Jangka waktu 8 Bulan</option>
                    //     <option value='9'>Jangka waktu 9 Bulan</option>
                    //     <option value='10'>Jangka waktu 10 Bulan</option>
                    //     <option value='11'>Jangka waktu 11 Bulan</option>
                    //     <option value='12'>Jangka waktu 12 Bulan</option>`
                    // );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='20'>20%</option>`
                    );
                    interestRate = 0.20; // 20%
                } else if (duration > 12 && duration <= 24) {
                    // $('#duration').html(
                    //     `<option value=''>Pilih Jangka Waktu</option>
                    //     <option value='12'>Jangka Waktu 12 Bulan</option>
                    //     <option value='13'>Jangka Waktu 13 Bulan</option>
                    //     <option value='14'>Jangka Waktu 14 Bulan</option>
                    //     <option value='15'>Jangka waktu 15 Bulan</option>
                    //     <option value='16'>Jangka waktu 16 Bulan</option>
                    //     <option value='17'>Jangka waktu 17 Bulan</option>
                    //     <option value='18'>Jangka waktu 18 Bulan</option>
                    //     <option value='19'>Jangka waktu 19 Bulan</option>
                    //     <option value='20'>Jangka waktu 20 Bulan</option>
                    //     <option value='21'>Jangka waktu 21 Bulan</option>
                    //     <option value='22'>Jangka waktu 22 Bulan</option>
                    //     <option value='23'>Jangka waktu 23 Bulan</option>
                    //     <option value='24'>Jangka waktu 24 Bulan</option>`
                    // );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='19'>19%</option>`
                    );
                    interestRate = 0.19; // 19%
                } else if (duration > 24 && duration <= 36) {
                    // $('#duration').html(
                    //     `<option value=''>Pilih Jangka Waktu</option>
                    //     <option value='24'>Jangka Waktu 24 Bulan</option>
                    //     <option value='25'>Jangka Waktu 25 Bulan</option>
                    //     <option value='26'>Jangka Waktu 26 Bulan</option>
                    //     <option value='27'>Jangka waktu 27 Bulan</option>
                    //     <option value='28'>Jangka waktu 28 Bulan</option>
                    //     <option value='29'>Jangka waktu 29 Bulan</option>
                    //     <option value='30'>Jangka waktu 30 Bulan</option>
                    //     <option value='31'>Jangka waktu 31 Bulan</option>
                    //     <option value='32'>Jangka waktu 32 Bulan</option>
                    //     <option value='33'>Jangka waktu 33 Bulan</option>
                    //     <option value='34'>Jangka waktu 34 Bulan</option>
                    //     <option value='35'>Jangka waktu 35 Bulan</option>
                    //     <option value='36'>Jangka waktu 36 Bulan</option>`
                    // );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='18'>18%</option>`
                    );
                    interestRate = 0.18; // 18%
                }
            } else if (plafond >= 26000000 && plafond <= 50000000) {
                // $('#plafond').html(
                //     `<option value=''>Pilih Plafond</option>
                //         <option value='30000000'>Rp.30.000.000</option>
                //         <option value='35000000'>Rp.35.000.000</option>
                //         <option value='40000000'>Rp.40.000.000</option>
                //         <option value='45000000'>Rp.45.000.000</option>
                //         <optioin value='50000000'>Rp.50.000.000</option>`
                // );
                $('#duration').html(
                    `<option value=''>Pilih Jangka Waktu</option>
                        <option value='1'>Jangka Waktu 1 Bulan</option>
                        <option value='2'>Jangka Waktu 2 Bulan</option>
                        <option value='3'>Jangka Waktu 3 Bulan</option>
                        <option value='4'>Jangka waktu 4 Bulan</option>
                        <option value='5'>Jangka waktu 5 Bulan</option>
                        <option value='6'>Jangka waktu 6 Bulan</option>
                        <option value='7'>Jangka waktu 7 Bulan</option>
                        <option value='8'>Jangka waktu 8 Bulan</option>
                        <option value='9'>Jangka waktu 9 Bulan</option>
                        <option value='10'>Jangka waktu 10 Bulan</option>
                        <option value='11'>Jangka waktu 11 Bulan</option>
                        <option value='12'>Jangka waktu 12 Bulan</option>
                        <option value='13'>Jangka Waktu 13 Bulan</option>
                        <option value='14'>Jangka Waktu 14 Bulan</option>
                        <option value='15'>Jangka waktu 15 Bulan</option>
                        <option value='16'>Jangka waktu 16 Bulan</option>
                        <option value='17'>Jangka waktu 17 Bulan</option>
                        <option value='18'>Jangka waktu 18 Bulan</option>
                        <option value='19'>Jangka waktu 19 Bulan</option>
                        <option value='20'>Jangka waktu 20 Bulan</option>
                        <option value='21'>Jangka waktu 21 Bulan</option>
                        <option value='22'>Jangka waktu 22 Bulan</option>
                        <option value='23'>Jangka waktu 23 Bulan</option>
                        <option value='24'>Jangka waktu 24 Bulan</option>
                        <option value='25'>Jangka Waktu 25 Bulan</option>
                        <option value='26'>Jangka Waktu 26 Bulan</option>
                        <option value='27'>Jangka waktu 27 Bulan</option>
                        <option value='28'>Jangka waktu 28 Bulan</option>
                        <option value='29'>Jangka waktu 29 Bulan</option>
                        <option value='30'>Jangka waktu 30 Bulan</option>
                        <option value='31'>Jangka waktu 31 Bulan</option>
                        <option value='32'>Jangka waktu 32 Bulan</option>
                        <option value='33'>Jangka waktu 33 Bulan</option>
                        <option value='34'>Jangka waktu 34 Bulan</option>
                        <option value='35'>Jangka waktu 35 Bulan</option>
                        <option value='36'>Jangka waktu 36 Bulan</option>
                        <option value='37'>Jangka Waktu 37 Bulan</option>
                        <option value='38'>Jangka Waktu 38 Bulan</option>
                        <option value='39'>Jangka waktu 39 Bulan</option>
                        <option value='40'>Jangka waktu 40 Bulan</option>
                        <option value='41'>Jangka waktu 41 Bulan</option>
                        <option value='42'>Jangka waktu 42 Bulan</option>
                        <option value='43'>Jangka waktu 43 Bulan</option>
                        <option value='44'>Jangka waktu 44 Bulan</option>
                        <option value='45'>Jangka waktu 45 Bulan</option>
                        <option value='46'>Jangka waktu 46 Bulan</option>
                        <option value='47'>Jangka waktu 47 Bulan</option>
                        <option value='48'>Jangka waktu 48 Bulan</option>`
                );
                $('#bunga').html(
                    `<option value=''>Pilih Bunga</option>
                        <option value='19'>19%</option>`
                );
                interestRate = 0.19; // 19%

                if (duration >= 1 && duration <= 12) {
                    $('#duration').html(
                        `<option value=''>Pilih Jangka Waktu</option>
                        <option value='1'>Jangka Waktu 1 Bulan</option>
                        <option value='2'>Jangka Waktu 2 Bulan</option>
                        <option value='3'>Jangka Waktu 3 Bulan</option>
                        <option value='4'>Jangka waktu 4 Bulan</option>
                        <option value='5'>Jangka waktu 5 Bulan</option>
                        <option value='6'>Jangka waktu 6 Bulan</option>
                        <option value='7'>Jangka waktu 7 Bulan</option>
                        <option value='8'>Jangka waktu 8 Bulan</option>
                        <option value='9'>Jangka waktu 9 Bulan</option>
                        <option value='10'>Jangka waktu 10 Bulan</option>
                        <option value='11'>Jangka waktu 11 Bulan</option>
                        <option value='12'>Jangka waktu 12 Bulan</option>
                        `
                    );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='19'>19%</option>`
                    );
                    interestRate = 0.19; // 19%
                } else if (duration > 12 && duration <= 24) {
                    $('#duration').html(
                        `<option value=''>Pilih Jangka Waktu</option>
                        <option value='12'>Jangka Waktu 12 Bulan</option>
                        <option value='13'>Jangka Waktu 13 Bulan</option>
                        <option value='14'>Jangka Waktu 14 Bulan</option>
                        <option value='15'>Jangka waktu 15 Bulan</option>
                        <option value='16'>Jangka waktu 16 Bulan</option>
                        <option value='17'>Jangka waktu 17 Bulan</option>
                        <option value='18'>Jangka waktu 18 Bulan</option>
                        <option value='19'>Jangka waktu 19 Bulan</option>
                        <option value='20'>Jangka waktu 20 Bulan</option>
                        <option value='21'>Jangka waktu 21 Bulan</option>
                        <option value='22'>Jangka waktu 22 Bulan</option>
                        <option value='23'>Jangka waktu 23 Bulan</option>
                        <option value='24'>Jangka waktu 24 Bulan</option>`
                    );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='18'>18%</option>`
                    );
                    interestRate = 0.18; // 18%
                } else if (duration > 24 && duration <= 36) {
                    $('#duration').html(
                        `<option value=''>Pilih Jangka Waktu</option>
                        <option value='24'>Jangka Waktu 24 Bulan</option>
                        <option value='25'>Jangka Waktu 25 Bulan</option>
                        <option value='26'>Jangka Waktu 26 Bulan</option>
                        <option value='27'>Jangka waktu 27 Bulan</option>
                        <option value='28'>Jangka waktu 28 Bulan</option>
                        <option value='29'>Jangka waktu 29 Bulan</option>
                        <option value='30'>Jangka waktu 30 Bulan</option>
                        <option value='31'>Jangka waktu 31 Bulan</option>
                        <option value='32'>Jangka waktu 32 Bulan</option>
                        <option value='33'>Jangka waktu 33 Bulan</option>
                        <option value='34'>Jangka waktu 34 Bulan</option>
                        <option value='35'>Jangka waktu 35 Bulan</option>
                        <option value='36'>Jangka waktu 36 Bulan</option>`
                    );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='17'>17%</option>`
                    );
                    interestRate = 0.17; // 17%
                } else if (duration > 36 && duration <= 48) {
                    $('#duration').html(
                        `<option value=''>Pilih Jangka Waktu</option>
                        <option value='36'>Jangka Waktu 36 Bulan</option>
                        <option value='37'>Jangka Waktu 37 Bulan</option>
                        <option value='38'>Jangka Waktu 38 Bulan</option>
                        <option value='39'>Jangka waktu 39 Bulan</option>
                        <option value='40'>Jangka waktu 40 Bulan</option>
                        <option value='41'>Jangka waktu 41 Bulan</option>
                        <option value='42'>Jangka waktu 42 Bulan</option>
                        <option value='43'>Jangka waktu 43 Bulan</option>
                        <option value='44'>Jangka waktu 44 Bulan</option>
                        <option value='45'>Jangka waktu 45 Bulan</option>
                        <option value='46'>Jangka waktu 46 Bulan</option>
                        <option value='47'>Jangka waktu 47 Bulan</option>
                        <option value='48'>Jangka waktu 48 Bulan</option>`
                    );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='16'>16%</option>`
                    );
                    interestRate = 0.16; // 16%
                }
            } else if (plafond >= 51000000 && plafond <= 100000000) {
                // $('#plafond').html(
                //     `<option value=''>Pilih Plafond</option>
                //         <option value='55000000'>Rp.55.000.000</option>
                //         <option value='60000000'>Rp.60.000.000</option>
                //         <option value='65000000'>Rp.65.000.000</option>
                //         <option value='70000000'>Rp.70.000.000</option>
                //         <optioin value='75000000'>Rp.75.000.000</option>
                //         <option value='80000000'>Rp.80.000.000</option>
                //         <option value='85000000'>Rp.85.000.000</option>
                //         <option value='90000000'>Rp.90.000.000</option>
                //         <option value='95000000'>Rp.95.000.000</option>
                //         <optioin value='100000000'>Rp.100.000.000</option>`
                // );
                $('#duration').html(
                    `<option value=''>Pilih Jangka Waktu</option>
                        <option value='1'>Jangka Waktu 1 Bulan</option>
                        <option value='2'>Jangka Waktu 2 Bulan</option>
                        <option value='3'>Jangka Waktu 3 Bulan</option>
                        <option value='4'>Jangka waktu 4 Bulan</option>
                        <option value='5'>Jangka waktu 5 Bulan</option>
                        <option value='6'>Jangka waktu 6 Bulan</option>
                        <option value='7'>Jangka waktu 7 Bulan</option>
                        <option value='8'>Jangka waktu 8 Bulan</option>
                        <option value='9'>Jangka waktu 9 Bulan</option>
                        <option value='10'>Jangka waktu 10 Bulan</option>
                        <option value='11'>Jangka waktu 11 Bulan</option>
                        <option value='12'>Jangka waktu 12 Bulan</option>
                        <option value='13'>Jangka Waktu 13 Bulan</option>
                        <option value='14'>Jangka Waktu 14 Bulan</option>
                        <option value='15'>Jangka waktu 15 Bulan</option>
                        <option value='16'>Jangka waktu 16 Bulan</option>
                        <option value='17'>Jangka waktu 17 Bulan</option>
                        <option value='18'>Jangka waktu 18 Bulan</option>
                        <option value='19'>Jangka waktu 19 Bulan</option>
                        <option value='20'>Jangka waktu 20 Bulan</option>
                        <option value='21'>Jangka waktu 21 Bulan</option>
                        <option value='22'>Jangka waktu 22 Bulan</option>
                        <option value='23'>Jangka waktu 23 Bulan</option>
                        <option value='24'>Jangka waktu 24 Bulan</option>
                        <option value='25'>Jangka Waktu 25 Bulan</option>
                        <option value='26'>Jangka Waktu 26 Bulan</option>
                        <option value='27'>Jangka waktu 27 Bulan</option>
                        <option value='28'>Jangka waktu 28 Bulan</option>
                        <option value='29'>Jangka waktu 29 Bulan</option>
                        <option value='30'>Jangka waktu 30 Bulan</option>
                        <option value='31'>Jangka waktu 31 Bulan</option>
                        <option value='32'>Jangka waktu 32 Bulan</option>
                        <option value='33'>Jangka waktu 33 Bulan</option>
                        <option value='34'>Jangka waktu 34 Bulan</option>
                        <option value='35'>Jangka waktu 35 Bulan</option>
                        <option value='36'>Jangka waktu 36 Bulan</option>
                        <option value='37'>Jangka Waktu 37 Bulan</option>
                        <option value='38'>Jangka Waktu 38 Bulan</option>
                        <option value='39'>Jangka waktu 39 Bulan</option>
                        <option value='40'>Jangka waktu 40 Bulan</option>
                        <option value='41'>Jangka waktu 41 Bulan</option>
                        <option value='42'>Jangka waktu 42 Bulan</option>
                        <option value='43'>Jangka waktu 43 Bulan</option>
                        <option value='44'>Jangka waktu 44 Bulan</option>
                        <option value='45'>Jangka waktu 45 Bulan</option>
                        <option value='46'>Jangka waktu 46 Bulan</option>
                        <option value='47'>Jangka waktu 47 Bulan</option>
                        <option value='48'>Jangka waktu 48 Bulan</option>`
                );
                $('#bunga').html(
                    `<option value=''>Pilih Bunga</option>
                        <option value='18'>18%</option>`
                );
                interestRate = 0.18; // 18%

                if (duration >= 1 && duration <= 12) {
                    $('#duration').html(
                        `<option value=''>Pilih Jangka Waktu</option>
                        <option value='1'>Jangka Waktu 1 Bulan</option>
                        <option value='2'>Jangka Waktu 2 Bulan</option>
                        <option value='3'>Jangka Waktu 3 Bulan</option>
                        <option value='4'>Jangka waktu 4 Bulan</option>
                        <option value='5'>Jangka waktu 5 Bulan</option>
                        <option value='6'>Jangka waktu 6 Bulan</option>
                        <option value='7'>Jangka waktu 7 Bulan</option>
                        <option value='8'>Jangka waktu 8 Bulan</option>
                        <option value='9'>Jangka waktu 9 Bulan</option>
                        <option value='10'>Jangka waktu 10 Bulan</option>
                        <option value='11'>Jangka waktu 11 Bulan</option>
                        <option value='12'>Jangka waktu 12 Bulan</option>`
                    );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='18'>18%</option>`
                    );
                    interestRate = 0.18; // 18%
                } else if (duration > 12 && duration <= 24) {
                    $('#duration').html(
                        `<option value=''>Pilih Jangka Waktu</option>
                        <option value='12'>Jangka Waktu 12 Bulan</option>
                        <option value='13'>Jangka Waktu 13 Bulan</option>
                        <option value='14'>Jangka Waktu 14 Bulan</option>
                        <option value='15'>Jangka waktu 15 Bulan</option>
                        <option value='16'>Jangka waktu 16 Bulan</option>
                        <option value='17'>Jangka waktu 17 Bulan</option>
                        <option value='18'>Jangka waktu 18 Bulan</option>
                        <option value='19'>Jangka waktu 19 Bulan</option>
                        <option value='20'>Jangka waktu 20 Bulan</option>
                        <option value='21'>Jangka waktu 21 Bulan</option>
                        <option value='22'>Jangka waktu 22 Bulan</option>
                        <option value='23'>Jangka waktu 23 Bulan</option>
                        <option value='24'>Jangka waktu 24 Bulan</option>`
                    );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='17'>17%</option>`
                    );
                    interestRate = 0.17; // 17%
                } else if (duration > 24 && duration <= 36) {
                    $('#duration').html(
                        `<option value=''>Pilih Jangka Waktu</option>
                        <option value='24'>Jangka Waktu 24 Bulan</option>
                        <option value='25'>Jangka Waktu 25 Bulan</option>
                        <option value='26'>Jangka Waktu 26 Bulan</option>
                        <option value='27'>Jangka waktu 27 Bulan</option>
                        <option value='28'>Jangka waktu 28 Bulan</option>
                        <option value='29'>Jangka waktu 29 Bulan</option>
                        <option value='30'>Jangka waktu 30 Bulan</option>
                        <option value='31'>Jangka waktu 31 Bulan</option>
                        <option value='32'>Jangka waktu 32 Bulan</option>
                        <option value='33'>Jangka waktu 33 Bulan</option>
                        <option value='34'>Jangka waktu 34 Bulan</option>
                        <option value='35'>Jangka waktu 35 Bulan</option>
                        <option value='36'>Jangka waktu 36 Bulan</option>`
                    );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='16'>16%</option>`
                    );
                    interestRate = 0.16; // 16%
                } else if (duration > 36 && duration <= 48) {
                    $('#duration').html(
                        `<option value=''>Pilih Jangka Waktu</option>
                        <option value='36'>Jangka Waktu 36 Bulan</option>
                        <option value='37'>Jangka Waktu 37 Bulan</option>
                        <option value='38'>Jangka Waktu 38 Bulan</option>
                        <option value='39'>Jangka waktu 39 Bulan</option>
                        <option value='40'>Jangka waktu 40 Bulan</option>
                        <option value='41'>Jangka waktu 41 Bulan</option>
                        <option value='42'>Jangka waktu 42 Bulan</option>
                        <option value='43'>Jangka waktu 43 Bulan</option>
                        <option value='44'>Jangka waktu 44 Bulan</option>
                        <option value='45'>Jangka waktu 45 Bulan</option>
                        <option value='46'>Jangka waktu 46 Bulan</option>
                        <option value='47'>Jangka waktu 47 Bulan</option>
                        <option value='48'>Jangka waktu 48 Bulan</option>`
                    );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='15'>15%</option>`
                    );
                    interestRate = 0.15; // 15%
                }
            } else if (plafond > 100000000) {
                // $('#plafond').html(
                //     `<option value=''>Pilih Plafond</option>
                //         <option value='100000000'>Rp.100.000.000</option>
                //         <option value='200000000'>Rp.200.000.000</option>
                //         <option value='300000000'>Rp.300.000.000</option>
                //         <option value='400000000'>Rp.400.000.000</option>
                //         <option value='500000000'>Rp.500.000.000</option>`
                // );
                $('#duration').html(
                    `<option value=''>Pilih Jangka Waktu</option>
                        <option value='1'>Jangka Waktu 1 Bulan</option>
                        <option value='2'>Jangka Waktu 2 Bulan</option>
                        <option value='3'>Jangka Waktu 3 Bulan</option>
                        <option value='4'>Jangka waktu 4 Bulan</option>
                        <option value='5'>Jangka waktu 5 Bulan</option>
                        <option value='6'>Jangka waktu 6 Bulan</option>
                        <option value='7'>Jangka waktu 7 Bulan</option>
                        <option value='8'>Jangka waktu 8 Bulan</option>
                        <option value='9'>Jangka waktu 9 Bulan</option>
                        <option value='10'>Jangka waktu 10 Bulan</option>
                        <option value='11'>Jangka waktu 11 Bulan</option>
                        <option value='12'>Jangka waktu 12 Bulan</option>
                        <option value='13'>Jangka Waktu 13 Bulan</option>
                        <option value='14'>Jangka Waktu 14 Bulan</option>
                        <option value='15'>Jangka waktu 15 Bulan</option>
                        <option value='16'>Jangka waktu 16 Bulan</option>
                        <option value='17'>Jangka waktu 17 Bulan</option>
                        <option value='18'>Jangka waktu 18 Bulan</option>
                        <option value='19'>Jangka waktu 19 Bulan</option>
                        <option value='20'>Jangka waktu 20 Bulan</option>
                        <option value='21'>Jangka waktu 21 Bulan</option>
                        <option value='22'>Jangka waktu 22 Bulan</option>
                        <option value='23'>Jangka waktu 23 Bulan</option>
                        <option value='24'>Jangka waktu 24 Bulan</option>
                        <option value='25'>Jangka Waktu 25 Bulan</option>
                        <option value='26'>Jangka Waktu 26 Bulan</option>
                        <option value='27'>Jangka waktu 27 Bulan</option>
                        <option value='28'>Jangka waktu 28 Bulan</option>
                        <option value='29'>Jangka waktu 29 Bulan</option>
                        <option value='30'>Jangka waktu 30 Bulan</option>
                        <option value='31'>Jangka waktu 31 Bulan</option>
                        <option value='32'>Jangka waktu 32 Bulan</option>
                        <option value='33'>Jangka waktu 33 Bulan</option>
                        <option value='34'>Jangka waktu 34 Bulan</option>
                        <option value='35'>Jangka waktu 35 Bulan</option>
                        <option value='36'>Jangka waktu 36 Bulan</option>
                        <option value='37'>Jangka Waktu 37 Bulan</option>
                        <option value='38'>Jangka Waktu 38 Bulan</option>
                        <option value='39'>Jangka waktu 39 Bulan</option>
                        <option value='40'>Jangka waktu 40 Bulan</option>
                        <option value='41'>Jangka waktu 41 Bulan</option>
                        <option value='42'>Jangka waktu 42 Bulan</option>
                        <option value='43'>Jangka waktu 43 Bulan</option>
                        <option value='44'>Jangka waktu 44 Bulan</option>
                        <option value='45'>Jangka waktu 45 Bulan</option>
                        <option value='46'>Jangka waktu 46 Bulan</option>
                        <option value='47'>Jangka waktu 47 Bulan</option>
                        <option value='48'>Jangka waktu 48 Bulan</option>
                        <option value='49'>Jangka waktu 49 Bulan</option>
                        <option value='50'>Jangka waktu 50 Bulan</option>
                        <option value='51'>Jangka waktu 51 Bulan</option>
                        <option value='52'>Jangka waktu 52 Bulan</option>
                        <option value='53'>Jangka waktu 53 Bulan</option>
                        <option value='54'>Jangka waktu 54 Bulan</option>
                        <option value='55'>Jangka waktu 55 Bulan</option>
                        <option value='56'>Jangka waktu 56 Bulan</option>
                        <option value='57'>Jangka waktu 57 Bulan</option>
                        <option value='58'>Jangka waktu 58 Bulan</option>
                        <option value='59'>Jangka waktu 59 Bulan</option>
                        <option value='60'>Jangka waktu 60 Bulan</option>
                        <option value='61'>Jangka Waktu 61 Bulan</option>
                        <option value='62'>Jangka Waktu 62 Bulan</option>
                        <option value='63'>Jangka waktu 63 Bulan</option>
                        <option value='64'>Jangka waktu 64 Bulan</option>
                        <option value='65'>Jangka waktu 65 Bulan</option>
                        <option value='66'>Jangka waktu 66 Bulan</option>
                        <option value='67'>Jangka waktu 67 Bulan</option>
                        <option value='68'>Jangka waktu 68 Bulan</option>
                        <option value='69'>Jangka waktu 69 Bulan</option>
                        <option value='70'>Jangka waktu 70 Bulan</option>
                        <option value='71'>Jangka waktu 71 Bulan</option>
                        <option value='72'>Jangka waktu 72 Bulan</option>
                        `
                );
                $('#bunga').html(
                    `<option value=''>Pilih Bunga</option>
                        <option value='18'>18%</option>`
                );
                interestRate = 0.18; // 18%

                if (duration >= 1 && duration <= 12) {
                    $('#duration').html(
                        `<option value=''>Pilih Jangka Waktu</option>
                        <option value='1'>Jangka Waktu 1 Bulan</option>
                        <option value='2'>Jangka Waktu 2 Bulan</option>
                        <option value='3'>Jangka Waktu 3 Bulan</option>
                        <option value='4'>Jangka waktu 4 Bulan</option>
                        <option value='5'>Jangka waktu 5 Bulan</option>
                        <option value='6'>Jangka waktu 6 Bulan</option>
                        <option value='7'>Jangka waktu 7 Bulan</option>
                        <option value='8'>Jangka waktu 8 Bulan</option>
                        <option value='9'>Jangka waktu 9 Bulan</option>
                        <option value='10'>Jangka waktu 10 Bulan</option>
                        <option value='11'>Jangka waktu 11 Bulan</option>
                        <option value='12'>Jangka waktu 12 Bulan</option>`
                    );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='18'>18%</option>`
                    );
                    interestRate = 0.18; // 18%
                } else if (duration > 12 && duration <= 24) {
                    $('#duration').html(
                        `<option value=''>Pilih Jangka Waktu</option>
                        <option value='12'>Jangka Waktu 12 Bulan</option>
                        <option value='13'>Jangka Waktu 13 Bulan</option>
                        <option value='14'>Jangka Waktu 14 Bulan</option>
                        <option value='15'>Jangka waktu 15 Bulan</option>
                        <option value='16'>Jangka waktu 16 Bulan</option>
                        <option value='17'>Jangka waktu 17 Bulan</option>
                        <option value='18'>Jangka waktu 18 Bulan</option>
                        <option value='19'>Jangka waktu 19 Bulan</option>
                        <option value='20'>Jangka waktu 20 Bulan</option>
                        <option value='21'>Jangka waktu 21 Bulan</option>
                        <option value='22'>Jangka waktu 22 Bulan</option>
                        <option value='23'>Jangka waktu 23 Bulan</option>
                        <option value='24'>Jangka waktu 24 Bulan</option>`
                    );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='17'>17%</option>`
                    );
                    interestRate = 0.17; // 17%
                } else if (duration > 24 && duration <= 36) {
                    $('#duration').html(
                        `<option value=''>Pilih Jangka Waktu</option>
                        <option value='24'>Jangka Waktu 24 Bulan</option>
                        <option value='25'>Jangka Waktu 25 Bulan</option>
                        <option value='26'>Jangka Waktu 26 Bulan</option>
                        <option value='27'>Jangka waktu 27 Bulan</option>
                        <option value='28'>Jangka waktu 28 Bulan</option>
                        <option value='29'>Jangka waktu 29 Bulan</option>
                        <option value='30'>Jangka waktu 30 Bulan</option>
                        <option value='31'>Jangka waktu 31 Bulan</option>
                        <option value='32'>Jangka waktu 32 Bulan</option>
                        <option value='33'>Jangka waktu 33 Bulan</option>
                        <option value='34'>Jangka waktu 34 Bulan</option>
                        <option value='35'>Jangka waktu 35 Bulan</option>
                        <option value='36'>Jangka waktu 36 Bulan</option>`
                    );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='16'>16%</option>`
                    );
                    interestRate = 0.16; // 16%
                } else if (duration > 36 && duration <= 48) {
                    $('#duration').html(
                        `<option value=''>Pilih Jangka Waktu</option>
                        <option value='36'>Jangka Waktu 36 Bulan</option>
                        <option value='37'>Jangka Waktu 37 Bulan</option>
                        <option value='38'>Jangka Waktu 38 Bulan</option>
                        <option value='39'>Jangka waktu 39 Bulan</option>
                        <option value='40'>Jangka waktu 40 Bulan</option>
                        <option value='41'>Jangka waktu 41 Bulan</option>
                        <option value='42'>Jangka waktu 42 Bulan</option>
                        <option value='43'>Jangka waktu 43 Bulan</option>
                        <option value='44'>Jangka waktu 44 Bulan</option>
                        <option value='45'>Jangka waktu 45 Bulan</option>
                        <option value='46'>Jangka waktu 46 Bulan</option>
                        <option value='47'>Jangka waktu 47 Bulan</option>
                        <option value='48'>Jangka waktu 48 Bulan</option>`
                    );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='15'>15%</option>`
                    );
                    interestRate = 0.15; // 15%
                } else if (duration > 48 && duration <= 60) {
                    $('#duration').html(
                        `<option value=''>Pilih Jangka Waktu</option>
                        <option value='48'>Jangka Waktu 48 Bulan</option>
                        <option value='49'>Jangka Waktu 49 Bulan</option>
                        <option value='50'>Jangka Waktu 50 Bulan</option>
                        <option value='51'>Jangka waktu 51 Bulan</option>
                        <option value='52'>Jangka waktu 52 Bulan</option>
                        <option value='53'>Jangka waktu 53 Bulan</option>
                        <option value='54'>Jangka waktu 54 Bulan</option>
                        <option value='55'>Jangka waktu 55 Bulan</option>
                        <option value='56'>Jangka waktu 56 Bulan</option>
                        <option value='57'>Jangka waktu 57 Bulan</option>
                        <option value='58'>Jangka waktu 58 Bulan</option>
                        <option value='59'>Jangka waktu 59 Bulan</option>
                        <option value='60'>Jangka waktu 60 Bulan</option>`
                    );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='14'>14%</option>`
                    );
                    interestRate = 0.14; // 14%
                } else if (duration > 60 && duration <= 72) {
                    $('#duration').html(
                        `<option value=''>Pilih Jangka Waktu</option>
                        <option value='60'>Jangka Waktu 60 Bulan</option>
                        <option value='61'>Jangka Waktu 61 Bulan</option>
                        <option value='62'>Jangka Waktu 62 Bulan</option>
                        <option value='63'>Jangka waktu 63 Bulan</option>
                        <option value='64'>Jangka waktu 64 Bulan</option>
                        <option value='65'>Jangka waktu 65 Bulan</option>
                        <option value='66'>Jangka waktu 66 Bulan</option>
                        <option value='67'>Jangka waktu 67 Bulan</option>
                        <option value='68'>Jangka waktu 68 Bulan</option>
                        <option value='69'>Jangka waktu 69 Bulan</option>
                        <option value='70'>Jangka waktu 70 Bulan</option>
                        <option value='71'>Jangka waktu 71 Bulan</option>
                        <option value='72'>Jangka waktu 72 Bulan</option>`
                    );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='13'>13%</option>`
                    );
                    interestRate = 0.13; // 13%
                }
            } else if (plafond >= 2000000) {
                $('#duration').html(
                    `<option value=''>Pilih Jangka Waktu</option>
                        <option value='1'>Jangka Waktu 1 Bulan</option>
                        <option value='2'>Jangka Waktu 2 Bulan</option>
                        <option value='3'>Jangka Waktu 3 Bulan</option>
                        <option value='4'>Jangka waktu 4 Bulan</option>
                        <option value='5'>Jangka waktu 5 Bulan</option>
                        <option value='6'>Jangka waktu 6 Bulan</option>
                        <option value='7'>Jangka waktu 7 Bulan</option>
                        <option value='8'>Jangka waktu 8 Bulan</option>
                        <option value='9'>Jangka waktu 9 Bulan</option>
                        <option value='10'>Jangka waktu 10 Bulan</option>
                        <option value='11'>Jangka waktu 11 Bulan</option>
                        <option value='12'>Jangka waktu 12 Bulan</option>`
                );
                $('#bunga').html(
                    `<option value=''>Pilih Bunga</option>
                        <option value='19'>19%</option>`
                );
                interestRate = 0.19; // 19%

                if (duration >= 1 && duration <= 12) {
                    $('#duration').html(
                        `<option value=''>Pilih Jangka Waktu</option>
                        <option value='1'>Jangka Waktu 1 Bulan</option>
                        <option value='2'>Jangka Waktu 2 Bulan</option>
                        <option value='3'>Jangka Waktu 3 Bulan</option>
                        <option value='4'>Jangka waktu 4 Bulan</option>
                        <option value='5'>Jangka waktu 5 Bulan</option>
                        <option value='6'>Jangka waktu 6 Bulan</option>
                        <option value='7'>Jangka waktu 7 Bulan</option>
                        <option value='8'>Jangka waktu 8 Bulan</option>
                        <option value='9'>Jangka waktu 9 Bulan</option>
                        <option value='10'>Jangka waktu 10 Bulan</option>
                        <option value='11'>Jangka waktu 11 Bulan</option>
                        <option value='12'>Jangka waktu 12 Bulan</option>`
                    );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='19'>19%</option>`
                    );
                    interestRate = 0.19; //19%
                } else if (duration > 12 && duration <= 36) {
                    $('#duration').html(
                        `<option value=''>Pilih Jangka Waktu</option>
                        <option value='12'>Jangka Waktu 12 Bulan</option>
                        <option value='13'>Jangka Waktu 13 Bulan</option>
                        <option value='14'>Jangka Waktu 14 Bulan</option>
                        <option value='15'>Jangka waktu 15 Bulan</option>
                        <option value='16'>Jangka waktu 16 Bulan</option>
                        <option value='17'>Jangka waktu 17 Bulan</option>
                        <option value='18'>Jangka waktu 18 Bulan</option>
                        <option value='19'>Jangka waktu 19 Bulan</option>
                        <option value='20'>Jangka waktu 20 Bulan</option>
                        <option value='21'>Jangka waktu 21 Bulan</option>
                        <option value='22'>Jangka waktu 22 Bulan</option>
                        <option value='23'>Jangka waktu 23 Bulan</option>
                        <option value='24'>Jangka waktu 24 Bulan</option>`
                    );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='18'>18%</option>`
                    );
                    interestRate = 0.18; //18%
                } else if (duration > 36 && duration <= 48) {
                    $('#duration').html(
                        `<option value=''>Pilih Jangka Waktu</option>
                        <option value='36'>Jangka Waktu 36 Bulan</option>
                        <option value='37'>Jangka Waktu 37 Bulan</option>
                        <option value='38'>Jangka Waktu 38 Bulan</option>
                        <option value='39'>Jangka waktu 39 Bulan</option>
                        <option value='40'>Jangka waktu 40 Bulan</option>
                        <option value='41'>Jangka waktu 41 Bulan</option>
                        <option value='42'>Jangka waktu 42 Bulan</option>
                        <option value='43'>Jangka waktu 43 Bulan</option>
                        <option value='44'>Jangka waktu 44 Bulan</option>
                        <option value='45'>Jangka waktu 45 Bulan</option>
                        <option value='46'>Jangka waktu 46 Bulan</option>
                        <option value='47'>Jangka waktu 47 Bulan</option>
                        <option value='48'>Jangka waktu 48 Bulan</option>`
                    );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='17'>17%</option>`
                    );
                    interestRate = 0.17; //17%
                }
                // } else if (plafond >= 2000000) {
                //     if (duration >= 1 && duration <= 72) {
                //         interestRate = 0.40 * plafond;
                //     }
            }
            // if (plafond > 0) {
            //     const interest = (plafond * bunga) + (plafond / duration);
            //     const totalPayment = plafond + interest;
            //     document.getElementById("result").innerText = `Total Angsuran /Bulan: Rp. ${interest.toLocaleString()}`;
            //     document.getElementById('input_jumlah_angsuran').value = interest
            //     // document.getElementById('input_jangka_waktu').value = duration
            //     // document.getElementById('input_bunga').value = (interestRate * 100) + '%'
            // } else {
            //     // document.getElementById("result").innerText = "Plafon atau jangka waktu tidak valid.";
            // }
        }

        function calculateBunga() {
            const plafond = parseInt(document.getElementById("plafond").value);
            var select = document.getElementById('plafond');
            const option = select.options[select.selectedIndex];
            const duration = parseInt(document.getElementById("duration").value);
            const bunga = parseInt(document.getElementById("bunga").value);
            let interestRate = 0;
            // console.log(plafond, 'plafond')

            //plafond = jumlah pinjaman
            //duration = lama pinjaman
            //interest rate = bunga
            if (plafond >= 2000000 && plafond <= 10000000) {
                // $('#plafond').html(
                //     `<option value=''>Pilih Plafond</option>
                //     <option value='5000000'>Rp. 5.000.000</option>
                //     <option value='10000000'>Rp. 10.000.000</option>`
                // );
                // $('#duration').html(
                //     `<option value=''>Pilih Jangka Waktu</option>
                //     <option value='1'>Jangka Waktu 1 Bulan</option>
                //     <option value='2'>Jangka Waktu 2 Bulan</option>
                //     <option value='3'>Jangka Waktu 3 Bulan</option>
                //     <option value='4'>Jangka Waktu 4 Bulan</option>
                //     <option value='5'>Jangka Waktu 5 Bulan</option>
                //     <option value='6'>Jangka Waktu 6 Bulan</option>
                //     <option value='7'>Jangka Waktu 7 Bulan</option>
                //     <option value='8'>Jangka Waktu 8 Bulan</option>
                //     <option value='9'>Jangka Waktu 9 Bulan</option>
                //     <option value='10'>Jangka Waktu 10 Bulan</option>
                //     <option value='11'>Jangka Waktu 11 Bulan</option>
                //     <option value='12'>Jangka Waktu 12 Bulan</option>
                //     <option value='13'>Jangka Waktu 13 Bulan</option>
                //     <option value='14'>Jangka Waktu 14 Bulan</option>
                //     <option value='15'>Jangka Waktu 15 Bulan</option>
                //     <option value='16'>Jangka Waktu 16 Bulan</option>
                //     <option value='17'>Jangka Waktu 17 Bulan</option>
                //     <option value='18'>Jangka Waktu 18 Bulan</option>`
                // );

                $('#bunga').html(
                    `<option value=''>Pilih Bunga</option>
                    <option value='21'>21%</option>`
                );
                // if (duration >= 1 && duration <= 18) {
                interestRate = 0.21; // 21%
                // }
            } else if (plafond >= 11000000 && plafond <= 25000000) {
                // $('#plafond').html(
                //     `<option value=''>Pilih Plafond</option>
                //         <option value='15000000'>Rp.15.000.000</option>
                //         <option value='20000000'>Rp.20.000.000</option>
                //         <option value='25000000'>Rp.25.000.000</option>`
                // );
                // $('#duration').html(
                //     `<option value=''>Pilih Jangka Waktu</option>
                //     <option value='1'>Jangka Waktu 1 Bulan</option>
                //     <option value='2'>Jangka Waktu 2 Bulan</option>
                //     <option value='3'>Jangka Waktu 3 Bulan</option>
                //     <option value='4'>Jangka Waktu 4 Bulan</option>
                //     <option value='5'>Jangka Waktu 5 Bulan</option>
                //     <option value='6'>Jangka Waktu 6 Bulan</option>
                //     <option value='7'>Jangka Waktu 7 Bulan</option>
                //     <option value='8'>Jangka Waktu 8 Bulan</option>
                //     <option value='9'>Jangka Waktu 9 Bulan</option>
                //     <option value='10'>Jangka Waktu 10 Bulan</option>
                //     <option value='11'>Jangka Waktu 11 Bulan</option>
                //     <option value='12'>Jangka Waktu 12 Bulan</option>
                //     <option value='13'>Jangka Waktu 13 Bulan</option>
                //     <option value='14'>Jangka Waktu 14 Bulan</option>
                //     <option value='15'>Jangka Waktu 15 Bulan</option>
                //     <option value='16'>Jangka Waktu 16 Bulan</option>
                //     <option value='17'>Jangka Waktu 17 Bulan</option>
                //     <option value='18'>Jangka Waktu 18 Bulan</option>
                //     <option value='19'>Jangka Waktu 19 Bulan</option>
                //     <option value='20'>Jangka Waktu 20 Bulan</option>
                //     <option value='21'>Jangka Waktu 21 Bulan</option>
                //     <option value='22'>Jangka Waktu 22 Bulan</option>
                //     <option value='23'>Jangka Waktu 23 Bulan</option>
                //     <option value='24'>Jangka Waktu 24 Bulan</option>
                //     <option value='25'>Jangka Waktu 25 Bulan</option>
                //     <option value='26'>Jangka Waktu 26 Bulan</option>
                //     <option value='27'>Jangka Waktu 27 Bulan</option>
                //     <option value='28'>Jangka Waktu 28 Bulan</option>
                //     <option value='29'>Jangka Waktu 29 Bulan</option>
                //     <option value='30'>Jangka Waktu 30 Bulan</option>
                //     <option value='31'>Jangka Waktu 31 Bulan</option>
                //     <option value='32'>Jangka Waktu 32 Bulan</option>
                //     <option value='33'>Jangka Waktu 33 Bulan</option>
                //     <option value='34'>Jangka Waktu 34 Bulan</option>
                //     <option value='35'>Jangka Waktu 35 Bulan</option>
                //     <option value='36'>Jangka Waktu 36 Bulan</option>
                //     `
                // );
                // $('#bunga').html(
                //     `<option value=''>Pilih Bunga</option>
                //         <option value='20'>20%</option>`
                // );
                if (duration >= 1 && duration <= 12) {
                    // $('#duration').html(
                    //     `<option value=''>Pilih Jangka Waktu</option>
                    //     <option value='1'>Jangka Waktu 1 Bulan</option>
                    //     <option value='2'>Jangka Waktu 2 Bulan</option>
                    //     <option value='3'>Jangka Waktu 3 Bulan</option>
                    //     <option value='4'>Jangka waktu 4 Bulan</option>
                    //     <option value='5'>Jangka waktu 5 Bulan</option>
                    //     <option value='6'>Jangka waktu 6 Bulan</option>
                    //     <option value='7'>Jangka waktu 7 Bulan</option>
                    //     <option value='8'>Jangka waktu 8 Bulan</option>
                    //     <option value='9'>Jangka waktu 9 Bulan</option>
                    //     <option value='10'>Jangka waktu 10 Bulan</option>
                    //     <option value='11'>Jangka waktu 11 Bulan</option>
                    //     <option value='12'>Jangka waktu 12 Bulan</option>`
                    // );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='20'>20%</option>`
                    );
                    interestRate = 0.20; // 20%
                } else if (duration > 12 && duration <= 24) {
                    // $('#duration').html(
                    //     `<option value=''>Pilih Jangka Waktu</option>
                    //     <option value='12'>Jangka Waktu 12 Bulan</option>
                    //     <option value='13'>Jangka Waktu 13 Bulan</option>
                    //     <option value='14'>Jangka Waktu 14 Bulan</option>
                    //     <option value='15'>Jangka waktu 15 Bulan</option>
                    //     <option value='16'>Jangka waktu 16 Bulan</option>
                    //     <option value='17'>Jangka waktu 17 Bulan</option>
                    //     <option value='18'>Jangka waktu 18 Bulan</option>
                    //     <option value='19'>Jangka waktu 19 Bulan</option>
                    //     <option value='20'>Jangka waktu 20 Bulan</option>
                    //     <option value='21'>Jangka waktu 21 Bulan</option>
                    //     <option value='22'>Jangka waktu 22 Bulan</option>
                    //     <option value='23'>Jangka waktu 23 Bulan</option>
                    //     <option value='24'>Jangka waktu 24 Bulan</option>`
                    // );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='19'>19%</option>`
                    );
                    interestRate = 0.19; // 19%
                } else if (duration > 24 && duration <= 36) {
                    // $('#duration').html(
                    //     `<option value=''>Pilih Jangka Waktu</option>
                    //     <option value='24'>Jangka Waktu 24 Bulan</option>
                    //     <option value='25'>Jangka Waktu 25 Bulan</option>
                    //     <option value='26'>Jangka Waktu 26 Bulan</option>
                    //     <option value='27'>Jangka waktu 27 Bulan</option>
                    //     <option value='28'>Jangka waktu 28 Bulan</option>
                    //     <option value='29'>Jangka waktu 29 Bulan</option>
                    //     <option value='30'>Jangka waktu 30 Bulan</option>
                    //     <option value='31'>Jangka waktu 31 Bulan</option>
                    //     <option value='32'>Jangka waktu 32 Bulan</option>
                    //     <option value='33'>Jangka waktu 33 Bulan</option>
                    //     <option value='34'>Jangka waktu 34 Bulan</option>
                    //     <option value='35'>Jangka waktu 35 Bulan</option>
                    //     <option value='36'>Jangka waktu 36 Bulan</option>`
                    // );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='18'>18%</option>`
                    );
                    interestRate = 0.18; // 18%
                }
            } else if (plafond >= 26000000 && plafond <= 50000000) {
                // $('#plafond').html(
                //     `<option value=''>Pilih Plafond</option>
                //         <option value='30000000'>Rp.30.000.000</option>
                //         <option value='35000000'>Rp.35.000.000</option>
                //         <option value='40000000'>Rp.40.000.000</option>
                //         <option value='45000000'>Rp.45.000.000</option>
                //         <optioin value='50000000'>Rp.50.000.000</option>`
                // );
                // $('#duration').html(
                //     `<option value=''>Pilih Jangka Waktu</option>
                //         <option value='1'>Jangka Waktu 1 Bulan</option>
                //         <option value='2'>Jangka Waktu 2 Bulan</option>
                //         <option value='3'>Jangka Waktu 3 Bulan</option>
                //         <option value='4'>Jangka waktu 4 Bulan</option>
                //         <option value='5'>Jangka waktu 5 Bulan</option>
                //         <option value='6'>Jangka waktu 6 Bulan</option>
                //         <option value='7'>Jangka waktu 7 Bulan</option>
                //         <option value='8'>Jangka waktu 8 Bulan</option>
                //         <option value='9'>Jangka waktu 9 Bulan</option>
                //         <option value='10'>Jangka waktu 10 Bulan</option>
                //         <option value='11'>Jangka waktu 11 Bulan</option>
                //         <option value='12'>Jangka waktu 12 Bulan</option>`
                // );
                $('#bunga').html(
                    `<option value=''>Pilih Bunga</option>
                        <option value='19'>19%</option>`
                );
                interestRate = 0.19; // 19%

                if (duration >= 1 && duration <= 12) {
                    // $('#duration').html(
                    //     `<option value=''>Pilih Jangka Waktu</option>
                    //     <option value='1'>Jangka Waktu 1 Bulan</option>
                    //     <option value='2'>Jangka Waktu 2 Bulan</option>
                    //     <option value='3'>Jangka Waktu 3 Bulan</option>
                    //     <option value='4'>Jangka waktu 4 Bulan</option>
                    //     <option value='5'>Jangka waktu 5 Bulan</option>
                    //     <option value='6'>Jangka waktu 6 Bulan</option>
                    //     <option value='7'>Jangka waktu 7 Bulan</option>
                    //     <option value='8'>Jangka waktu 8 Bulan</option>
                    //     <option value='9'>Jangka waktu 9 Bulan</option>
                    //     <option value='10'>Jangka waktu 10 Bulan</option>
                    //     <option value='11'>Jangka waktu 11 Bulan</option>
                    //     <option value='12'>Jangka waktu 12 Bulan</option>`
                    // );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='19'>19%</option>`
                    );
                    interestRate = 0.19; // 19%
                } else if (duration > 12 && duration <= 24) {
                    // $('#duration').html(
                    //     `<option value=''>Pilih Jangka Waktu</option>
                    //     <option value='12'>Jangka Waktu 12 Bulan</option>
                    //     <option value='13'>Jangka Waktu 13 Bulan</option>
                    //     <option value='14'>Jangka Waktu 14 Bulan</option>
                    //     <option value='15'>Jangka waktu 15 Bulan</option>
                    //     <option value='16'>Jangka waktu 16 Bulan</option>
                    //     <option value='17'>Jangka waktu 17 Bulan</option>
                    //     <option value='18'>Jangka waktu 18 Bulan</option>
                    //     <option value='19'>Jangka waktu 19 Bulan</option>
                    //     <option value='20'>Jangka waktu 20 Bulan</option>
                    //     <option value='21'>Jangka waktu 21 Bulan</option>
                    //     <option value='22'>Jangka waktu 22 Bulan</option>
                    //     <option value='23'>Jangka waktu 23 Bulan</option>
                    //     <option value='24'>Jangka waktu 24 Bulan</option>`
                    // );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='18'>18%</option>`
                    );
                    interestRate = 0.18; // 18%
                } else if (duration > 24 && duration <= 36) {
                    // $('#duration').html(
                    //     `<option value=''>Pilih Jangka Waktu</option>
                    //     <option value='24'>Jangka Waktu 24 Bulan</option>
                    //     <option value='25'>Jangka Waktu 25 Bulan</option>
                    //     <option value='26'>Jangka Waktu 26 Bulan</option>
                    //     <option value='27'>Jangka waktu 27 Bulan</option>
                    //     <option value='28'>Jangka waktu 28 Bulan</option>
                    //     <option value='29'>Jangka waktu 29 Bulan</option>
                    //     <option value='30'>Jangka waktu 30 Bulan</option>
                    //     <option value='31'>Jangka waktu 31 Bulan</option>
                    //     <option value='32'>Jangka waktu 32 Bulan</option>
                    //     <option value='33'>Jangka waktu 33 Bulan</option>
                    //     <option value='34'>Jangka waktu 34 Bulan</option>
                    //     <option value='35'>Jangka waktu 35 Bulan</option>
                    //     <option value='36'>Jangka waktu 36 Bulan</option>`
                    // );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='17'>17%</option>`
                    );
                    interestRate = 0.17; // 17%
                } else if (duration > 36 && duration <= 48) {
                    // $('#duration').html(
                    //     `<option value=''>Pilih Jangka Waktu</option>
                    //     <option value='36'>Jangka Waktu 36 Bulan</option>
                    //     <option value='37'>Jangka Waktu 37 Bulan</option>
                    //     <option value='38'>Jangka Waktu 38 Bulan</option>
                    //     <option value='39'>Jangka waktu 39 Bulan</option>
                    //     <option value='40'>Jangka waktu 40 Bulan</option>
                    //     <option value='41'>Jangka waktu 41 Bulan</option>
                    //     <option value='42'>Jangka waktu 42 Bulan</option>
                    //     <option value='43'>Jangka waktu 43 Bulan</option>
                    //     <option value='44'>Jangka waktu 44 Bulan</option>
                    //     <option value='45'>Jangka waktu 45 Bulan</option>
                    //     <option value='46'>Jangka waktu 46 Bulan</option>
                    //     <option value='47'>Jangka waktu 47 Bulan</option>
                    //     <option value='48'>Jangka waktu 48 Bulan</option>`
                    // );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='16'>16%</option>`
                    );
                    interestRate = 0.16; // 16%
                }
            } else if (plafond >= 51000000 && plafond <= 100000000) {
                // $('#plafond').html(
                //     `<option value=''>Pilih Plafond</option>
                //         <option value='55000000'>Rp.55.000.000</option>
                //         <option value='60000000'>Rp.60.000.000</option>
                //         <option value='65000000'>Rp.65.000.000</option>
                //         <option value='70000000'>Rp.70.000.000</option>
                //         <optioin value='75000000'>Rp.75.000.000</option>
                //         <option value='80000000'>Rp.80.000.000</option>
                //         <option value='85000000'>Rp.85.000.000</option>
                //         <option value='90000000'>Rp.90.000.000</option>
                //         <option value='95000000'>Rp.95.000.000</option>
                //         <optioin value='100000000'>Rp.100.000.000</option>`
                // );
                // $('#duration').html(
                //     `<option value=''>Pilih Jangka Waktu</option>
                //         <option value='1'>Jangka Waktu 1 Bulan</option>
                //         <option value='2'>Jangka Waktu 2 Bulan</option>
                //         <option value='3'>Jangka Waktu 3 Bulan</option>
                //         <option value='4'>Jangka waktu 4 Bulan</option>
                //         <option value='5'>Jangka waktu 5 Bulan</option>
                //         <option value='6'>Jangka waktu 6 Bulan</option>
                //         <option value='7'>Jangka waktu 7 Bulan</option>
                //         <option value='8'>Jangka waktu 8 Bulan</option>
                //         <option value='9'>Jangka waktu 9 Bulan</option>
                //         <option value='10'>Jangka waktu 10 Bulan</option>
                //         <option value='11'>Jangka waktu 11 Bulan</option>
                //         <option value='12'>Jangka waktu 12 Bulan</option>`
                // );
                $('#bunga').html(
                    `<option value=''>Pilih Bunga</option>
                        <option value='18'>18%</option>`
                );
                interestRate = 0.18; // 18%

                if (duration >= 1 && duration <= 12) {
                    // $('#duration').html(
                    //     `<option value=''>Pilih Jangka Waktu</option>
                    //     <option value='1'>Jangka Waktu 1 Bulan</option>
                    //     <option value='2'>Jangka Waktu 2 Bulan</option>
                    //     <option value='3'>Jangka Waktu 3 Bulan</option>
                    //     <option value='4'>Jangka waktu 4 Bulan</option>
                    //     <option value='5'>Jangka waktu 5 Bulan</option>
                    //     <option value='6'>Jangka waktu 6 Bulan</option>
                    //     <option value='7'>Jangka waktu 7 Bulan</option>
                    //     <option value='8'>Jangka waktu 8 Bulan</option>
                    //     <option value='9'>Jangka waktu 9 Bulan</option>
                    //     <option value='10'>Jangka waktu 10 Bulan</option>
                    //     <option value='11'>Jangka waktu 11 Bulan</option>
                    //     <option value='12'>Jangka waktu 12 Bulan</option>`
                    // );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='18'>18%</option>`
                    );
                    interestRate = 0.18; // 18%
                } else if (duration > 12 && duration <= 24) {
                    // $('#duration').html(
                    //     `<option value=''>Pilih Jangka Waktu</option>
                    //     <option value='12'>Jangka Waktu 12 Bulan</option>
                    //     <option value='13'>Jangka Waktu 13 Bulan</option>
                    //     <option value='14'>Jangka Waktu 14 Bulan</option>
                    //     <option value='15'>Jangka waktu 15 Bulan</option>
                    //     <option value='16'>Jangka waktu 16 Bulan</option>
                    //     <option value='17'>Jangka waktu 17 Bulan</option>
                    //     <option value='18'>Jangka waktu 18 Bulan</option>
                    //     <option value='19'>Jangka waktu 19 Bulan</option>
                    //     <option value='20'>Jangka waktu 20 Bulan</option>
                    //     <option value='21'>Jangka waktu 21 Bulan</option>
                    //     <option value='22'>Jangka waktu 22 Bulan</option>
                    //     <option value='23'>Jangka waktu 23 Bulan</option>
                    //     <option value='24'>Jangka waktu 24 Bulan</option>`
                    // );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='17'>17%</option>`
                    );
                    interestRate = 0.17; // 17%
                } else if (duration > 24 && duration <= 36) {
                    // $('#duration').html(
                    //     `<option value=''>Pilih Jangka Waktu</option>
                    //     <option value='24'>Jangka Waktu 24 Bulan</option>
                    //     <option value='25'>Jangka Waktu 25 Bulan</option>
                    //     <option value='26'>Jangka Waktu 26 Bulan</option>
                    //     <option value='27'>Jangka waktu 27 Bulan</option>
                    //     <option value='28'>Jangka waktu 28 Bulan</option>
                    //     <option value='29'>Jangka waktu 29 Bulan</option>
                    //     <option value='30'>Jangka waktu 30 Bulan</option>
                    //     <option value='31'>Jangka waktu 31 Bulan</option>
                    //     <option value='32'>Jangka waktu 32 Bulan</option>
                    //     <option value='33'>Jangka waktu 33 Bulan</option>
                    //     <option value='34'>Jangka waktu 34 Bulan</option>
                    //     <option value='35'>Jangka waktu 35 Bulan</option>
                    //     <option value='36'>Jangka waktu 36 Bulan</option>`
                    // );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='16'>16%</option>`
                    );
                    interestRate = 0.16; // 16%
                } else if (duration > 36 && duration <= 48) {
                    // $('#duration').html(
                    //     `<option value=''>Pilih Jangka Waktu</option>
                    //     <option value='36'>Jangka Waktu 36 Bulan</option>
                    //     <option value='37'>Jangka Waktu 37 Bulan</option>
                    //     <option value='38'>Jangka Waktu 38 Bulan</option>
                    //     <option value='39'>Jangka waktu 39 Bulan</option>
                    //     <option value='40'>Jangka waktu 40 Bulan</option>
                    //     <option value='41'>Jangka waktu 41 Bulan</option>
                    //     <option value='42'>Jangka waktu 42 Bulan</option>
                    //     <option value='43'>Jangka waktu 43 Bulan</option>
                    //     <option value='44'>Jangka waktu 44 Bulan</option>
                    //     <option value='45'>Jangka waktu 45 Bulan</option>
                    //     <option value='46'>Jangka waktu 46 Bulan</option>
                    //     <option value='47'>Jangka waktu 47 Bulan</option>
                    //     <option value='48'>Jangka waktu 48 Bulan</option>`
                    // );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='15'>15%</option>`
                    );
                    interestRate = 0.15; // 15%
                }
            } else if (plafond > 100000000) {
                // $('#plafond').html(
                //     `<option value=''>Pilih Plafond</option>
                //         <option value='100000000'>Rp.100.000.000</option>
                //         <option value='200000000'>Rp.200.000.000</option>
                //         <option value='300000000'>Rp.300.000.000</option>
                //         <option value='400000000'>Rp.400.000.000</option>
                //         <option value='500000000'>Rp.500.000.000</option>`
                // );
                // $('#duration').html(
                //     `<option value=''>Pilih Jangka Waktu</option>
                //         <option value='1'>Jangka Waktu 1 Bulan</option>
                //         <option value='2'>Jangka Waktu 2 Bulan</option>
                //         <option value='3'>Jangka Waktu 3 Bulan</option>
                //         <option value='4'>Jangka waktu 4 Bulan</option>
                //         <option value='5'>Jangka waktu 5 Bulan</option>
                //         <option value='6'>Jangka waktu 6 Bulan</option>
                //         <option value='7'>Jangka waktu 7 Bulan</option>
                //         <option value='8'>Jangka waktu 8 Bulan</option>
                //         <option value='9'>Jangka waktu 9 Bulan</option>
                //         <option value='10'>Jangka waktu 10 Bulan</option>
                //         <option value='11'>Jangka waktu 11 Bulan</option>
                //         <option value='12'>Jangka waktu 12 Bulan</option>`
                // );
                $('#bunga').html(
                    `<option value=''>Pilih Bunga</option>
                        <option value='18'>18%</option>`
                );
                interestRate = 0.18; // 18%

                if (duration >= 1 && duration <= 12) {
                    // $('#duration').html(
                    //     `<option value=''>Pilih Jangka Waktu</option>
                    //     <option value='1'>Jangka Waktu 1 Bulan</option>
                    //     <option value='2'>Jangka Waktu 2 Bulan</option>
                    //     <option value='3'>Jangka Waktu 3 Bulan</option>
                    //     <option value='4'>Jangka waktu 4 Bulan</option>
                    //     <option value='5'>Jangka waktu 5 Bulan</option>
                    //     <option value='6'>Jangka waktu 6 Bulan</option>
                    //     <option value='7'>Jangka waktu 7 Bulan</option>
                    //     <option value='8'>Jangka waktu 8 Bulan</option>
                    //     <option value='9'>Jangka waktu 9 Bulan</option>
                    //     <option value='10'>Jangka waktu 10 Bulan</option>
                    //     <option value='11'>Jangka waktu 11 Bulan</option>
                    //     <option value='12'>Jangka waktu 12 Bulan</option>`
                    // );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='18'>18%</option>`
                    );
                    interestRate = 0.18; // 18%
                } else if (duration > 12 && duration <= 24) {
                    // $('#duration').html(
                    //     `<option value=''>Pilih Jangka Waktu</option>
                    //     <option value='12'>Jangka Waktu 12 Bulan</option>
                    //     <option value='13'>Jangka Waktu 13 Bulan</option>
                    //     <option value='14'>Jangka Waktu 14 Bulan</option>
                    //     <option value='15'>Jangka waktu 15 Bulan</option>
                    //     <option value='16'>Jangka waktu 16 Bulan</option>
                    //     <option value='17'>Jangka waktu 17 Bulan</option>
                    //     <option value='18'>Jangka waktu 18 Bulan</option>
                    //     <option value='19'>Jangka waktu 19 Bulan</option>
                    //     <option value='20'>Jangka waktu 20 Bulan</option>
                    //     <option value='21'>Jangka waktu 21 Bulan</option>
                    //     <option value='22'>Jangka waktu 22 Bulan</option>
                    //     <option value='23'>Jangka waktu 23 Bulan</option>
                    //     <option value='24'>Jangka waktu 24 Bulan</option>`
                    // );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='17'>17%</option>`
                    );
                    interestRate = 0.17; // 17%
                } else if (duration > 24 && duration <= 36) {
                    // $('#duration').html(
                    //     `<option value=''>Pilih Jangka Waktu</option>
                    //     <option value='24'>Jangka Waktu 24 Bulan</option>
                    //     <option value='25'>Jangka Waktu 25 Bulan</option>
                    //     <option value='26'>Jangka Waktu 26 Bulan</option>
                    //     <option value='27'>Jangka waktu 27 Bulan</option>
                    //     <option value='28'>Jangka waktu 28 Bulan</option>
                    //     <option value='29'>Jangka waktu 29 Bulan</option>
                    //     <option value='30'>Jangka waktu 30 Bulan</option>
                    //     <option value='31'>Jangka waktu 31 Bulan</option>
                    //     <option value='32'>Jangka waktu 32 Bulan</option>
                    //     <option value='33'>Jangka waktu 33 Bulan</option>
                    //     <option value='34'>Jangka waktu 34 Bulan</option>
                    //     <option value='35'>Jangka waktu 35 Bulan</option>
                    //     <option value='36'>Jangka waktu 36 Bulan</option>`
                    // );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='16'>16%</option>`
                    );
                    interestRate = 0.16; // 16%
                } else if (duration > 36 && duration <= 48) {
                    // $('#duration').html(
                    //     `<option value=''>Pilih Jangka Waktu</option>
                    //     <option value='36'>Jangka Waktu 36 Bulan</option>
                    //     <option value='37'>Jangka Waktu 37 Bulan</option>
                    //     <option value='38'>Jangka Waktu 38 Bulan</option>
                    //     <option value='39'>Jangka waktu 39 Bulan</option>
                    //     <option value='40'>Jangka waktu 40 Bulan</option>
                    //     <option value='41'>Jangka waktu 41 Bulan</option>
                    //     <option value='42'>Jangka waktu 42 Bulan</option>
                    //     <option value='43'>Jangka waktu 43 Bulan</option>
                    //     <option value='44'>Jangka waktu 44 Bulan</option>
                    //     <option value='45'>Jangka waktu 45 Bulan</option>
                    //     <option value='46'>Jangka waktu 46 Bulan</option>
                    //     <option value='47'>Jangka waktu 47 Bulan</option>
                    //     <option value='48'>Jangka waktu 48 Bulan</option>`
                    // );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='15'>15%</option>`
                    );
                    interestRate = 0.15; // 15%
                } else if (duration > 48 && duration <= 60) {
                    // $('#duration').html(
                    //     `<option value=''>Pilih Jangka Waktu</option>
                    //     <option value='48'>Jangka Waktu 48 Bulan</option>
                    //     <option value='49'>Jangka Waktu 49 Bulan</option>
                    //     <option value='50'>Jangka Waktu 50 Bulan</option>
                    //     <option value='51'>Jangka waktu 51 Bulan</option>
                    //     <option value='52'>Jangka waktu 52 Bulan</option>
                    //     <option value='53'>Jangka waktu 53 Bulan</option>
                    //     <option value='54'>Jangka waktu 54 Bulan</option>
                    //     <option value='55'>Jangka waktu 55 Bulan</option>
                    //     <option value='56'>Jangka waktu 56 Bulan</option>
                    //     <option value='57'>Jangka waktu 57 Bulan</option>
                    //     <option value='58'>Jangka waktu 58 Bulan</option>
                    //     <option value='59'>Jangka waktu 59 Bulan</option>
                    //     <option value='60'>Jangka waktu 60 Bulan</option>`
                    // );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='14'>14%</option>`
                    );
                    interestRate = 0.14; // 14%
                } else if (duration > 60 && duration <= 72) {
                    // $('#duration').html(
                    //     `<option value=''>Pilih Jangka Waktu</option>
                    //     <option value='60'>Jangka Waktu 60 Bulan</option>
                    //     <option value='61'>Jangka Waktu 61 Bulan</option>
                    //     <option value='62'>Jangka Waktu 62 Bulan</option>
                    //     <option value='63'>Jangka waktu 63 Bulan</option>
                    //     <option value='64'>Jangka waktu 64 Bulan</option>
                    //     <option value='65'>Jangka waktu 65 Bulan</option>
                    //     <option value='66'>Jangka waktu 66 Bulan</option>
                    //     <option value='67'>Jangka waktu 67 Bulan</option>
                    //     <option value='68'>Jangka waktu 68 Bulan</option>
                    //     <option value='69'>Jangka waktu 69 Bulan</option>
                    //     <option value='70'>Jangka waktu 70 Bulan</option>
                    //     <option value='71'>Jangka waktu 71 Bulan</option>
                    //     <option value='72'>Jangka waktu 72 Bulan</option>`
                    // );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='13'>13%</option>`
                    );
                    interestRate = 0.13; // 13%
                }
            } else if (plafond >= 2000000) {
                // $('#duration').html(
                //     `<option value=''>Pilih Jangka Waktu</option>
                //         <option value='1'>Jangka Waktu 1 Bulan</option>
                //         <option value='2'>Jangka Waktu 2 Bulan</option>
                //         <option value='3'>Jangka Waktu 3 Bulan</option>
                //         <option value='4'>Jangka waktu 4 Bulan</option>
                //         <option value='5'>Jangka waktu 5 Bulan</option>
                //         <option value='6'>Jangka waktu 6 Bulan</option>
                //         <option value='7'>Jangka waktu 7 Bulan</option>
                //         <option value='8'>Jangka waktu 8 Bulan</option>
                //         <option value='9'>Jangka waktu 9 Bulan</option>
                //         <option value='10'>Jangka waktu 10 Bulan</option>
                //         <option value='11'>Jangka waktu 11 Bulan</option>
                //         <option value='12'>Jangka waktu 12 Bulan</option>`
                // );
                $('#bunga').html(
                    `<option value=''>Pilih Bunga</option>
                        <option value='19'>19%</option>`
                );
                interestRate = 0.19; // 19%

                if (duration >= 1 && duration <= 12) {
                    // $('#duration').html(
                    //     `<option value=''>Pilih Jangka Waktu</option>
                    //     <option value='1'>Jangka Waktu 1 Bulan</option>
                    //     <option value='2'>Jangka Waktu 2 Bulan</option>
                    //     <option value='3'>Jangka Waktu 3 Bulan</option>
                    //     <option value='4'>Jangka waktu 4 Bulan</option>
                    //     <option value='5'>Jangka waktu 5 Bulan</option>
                    //     <option value='6'>Jangka waktu 6 Bulan</option>
                    //     <option value='7'>Jangka waktu 7 Bulan</option>
                    //     <option value='8'>Jangka waktu 8 Bulan</option>
                    //     <option value='9'>Jangka waktu 9 Bulan</option>
                    //     <option value='10'>Jangka waktu 10 Bulan</option>
                    //     <option value='11'>Jangka waktu 11 Bulan</option>
                    //     <option value='12'>Jangka waktu 12 Bulan</option>`
                    // );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='19'>19%</option>`
                    );
                    interestRate = 0.19; //19%
                } else if (duration > 12 && duration <= 36) {
                    // $('#duration').html(
                    //     `<option value=''>Pilih Jangka Waktu</option>
                    //     <option value='12'>Jangka Waktu 12 Bulan</option>
                    //     <option value='13'>Jangka Waktu 13 Bulan</option>
                    //     <option value='14'>Jangka Waktu 14 Bulan</option>
                    //     <option value='15'>Jangka waktu 15 Bulan</option>
                    //     <option value='16'>Jangka waktu 16 Bulan</option>
                    //     <option value='17'>Jangka waktu 17 Bulan</option>
                    //     <option value='18'>Jangka waktu 18 Bulan</option>
                    //     <option value='19'>Jangka waktu 19 Bulan</option>
                    //     <option value='20'>Jangka waktu 20 Bulan</option>
                    //     <option value='21'>Jangka waktu 21 Bulan</option>
                    //     <option value='22'>Jangka waktu 22 Bulan</option>
                    //     <option value='23'>Jangka waktu 23 Bulan</option>
                    //     <option value='24'>Jangka waktu 24 Bulan</option>`
                    // );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='18'>18%</option>`
                    );
                    interestRate = 0.18; //18%
                } else if (duration > 36 && duration <= 48) {
                    // $('#duration').html(
                    //     `<option value=''>Pilih Jangka Waktu</option>
                    //     <option value='36'>Jangka Waktu 36 Bulan</option>
                    //     <option value='37'>Jangka Waktu 37 Bulan</option>
                    //     <option value='38'>Jangka Waktu 38 Bulan</option>
                    //     <option value='39'>Jangka waktu 39 Bulan</option>
                    //     <option value='40'>Jangka waktu 40 Bulan</option>
                    //     <option value='41'>Jangka waktu 41 Bulan</option>
                    //     <option value='42'>Jangka waktu 42 Bulan</option>
                    //     <option value='43'>Jangka waktu 43 Bulan</option>
                    //     <option value='44'>Jangka waktu 44 Bulan</option>
                    //     <option value='45'>Jangka waktu 45 Bulan</option>
                    //     <option value='46'>Jangka waktu 46 Bulan</option>
                    //     <option value='47'>Jangka waktu 47 Bulan</option>
                    //     <option value='48'>Jangka waktu 48 Bulan</option>`
                    // );
                    $('#bunga').html(
                        `<option value=''>Pilih Bunga</option>
                        <option value='17'>17%</option>`
                    );
                    interestRate = 0.17; //17%
                }
                // } else if (plafond >= 2000000) {
                //     if (duration >= 1 && duration <= 72) {
                //         interestRate = 0.40 * plafond;
                //     }
            }
            // if (plafond > 0) {
            //     const interest = (plafond * bunga) + (plafond / duration);
            //     const totalPayment = plafond + interest;
            //     document.getElementById("result").innerText = `Total Angsuran /Bulan: Rp. ${interest.toLocaleString()}`;
            //     document.getElementById('input_jumlah_angsuran').value = interest
            //     // document.getElementById('input_jangka_waktu').value = duration
            //     // document.getElementById('input_bunga').value = (interestRate * 100) + '%'
            // } else {
            //     // document.getElementById("result").innerText = "Plafon atau jangka waktu tidak valid.";
            // }
        }

        function calculateTotal() {
            const plafond = parseInt(document.getElementById("plafond").value);
            var select = document.getElementById('plafond');
            const option = select.options[select.selectedIndex];
            const duration = parseInt(document.getElementById("duration").value);
            const bunga = parseInt(document.getElementById("bunga").value);
            let interestRate = 0;
            // console.log(plafond, 'plafond')

            if (plafond > 0) {
                const interest = (plafond * (bunga / 100)) + (plafond / duration);
                console.log(duration, 'duration')
                const totalPayment = plafond + interest;
                document.getElementById("result").innerText = `Total Angsuran /Bulan: Rp. ${interest.toLocaleString()}`;
                document.getElementById('input_jumlah_angsuran').value = interest
                // document.getElementById('input_jangka_waktu').value = duration
                // document.getElementById('input_bunga').value = (interestRate * 100) + '%'
            } else {
                // document.getElementById("result").innerText = "Plafon atau jangka waktu tidak valid.";
            }
        }
        </script>
    </body>