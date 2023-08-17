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
                                            <input type="number" class="form-control" name="nohp" id="nohp"
                                                placeholder="No Hp" value="<?= set_value('nohp'); ?>" required>
                                        </div>
                                        <div class="form-group group-usia ">
                                            <label for="usia">Usia<i class="required">*</i>
                                            </label>
                                            <input type="number" class="form-control" name="usia" id="usia"
                                                placeholder="Usia" value="<?= set_value('usia'); ?>" required>
                                        </div>

                                        <div class="form-group group-jumlahpinjaman ">
                                        <label for="jumlahpinjaman">Pilih Jumlah Pinjaman <i class="required">*</i>
                                            </label>
                                            <select class="form-control chosen chosen-select-deselect" 
                                                name="jumlah_pinjaman" id="plafond"
                                                data-placeholder="Select Jumlah Pinjaman" onchange="calculate()">
                                                <option value="">Pilih Jumlah Pinjaman</option>
                                                <?php foreach (db_get_all_data('simulasi_kredit') as $row): ?>
                                                <option value="<?= $row->plafond ?>">
                                                    <?= number_format($row->plafond, 0, '.', '.') ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="form-group group-jangka_waktu ">
                                            <label for="jangkawaktu">Jangka Waktu <i class="required">*</i>
                                            </label>
                                            <select name="jangka_waktu" class="form-control" id="duration" >
                                                <option value="">Pilih Jangka Waktu</option>
                                            </select>
                                        </div>
                                   
                                        <div class="form-group group-bunga">
                                            <label for="bunga">Bunga <i class="required">*<i>
                                            </label>
                                            <select name="bunga" class="form-control" id="bunga">
                                                <option value="">Pilih Bunga</option>
                                            </select>
                                        </div>
                                        <!-- <input type="button" name="next" class="next action-button" value="Next" /> -->
                                        <button class="btn btn btn-success pull-right"
                                            type="submit" onclick="calculate()">Selanjutnya</button>
                                        <!-- <label for="plafond">Plafond Kredit (Rp)</label>
                                        <input type="number" id="plafond"> -->

                                        <!-- <label for="duration">Jangka Waktu (bulan)</label>
                                        <input type="number" id="duration"> -->

                                        <input name="jumlah_angsuran" value="" id="input_jumlah_angsuran" type="hidden">
                                        <input name="jangka_waktu" value="" id="input_jangka_waktu" type="hidden">
                                        <input name="bunga" value="" id="input_bunga" type="hidden">

                                        <!-- <button onclick="calculate()">Hitung</button> -->

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
            console.log(bunga, 'bunga')

            //plafond = jumlah pinjaman
            //duration = lama pinjaman
            //interest rate = bunga
            if (plafond >= 2000000 && plafond <= 10000000) {
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
                if (duration >= 1 && duration <= 12) {
                    interestRate = 0.20; // 20%
                } else if (duration > 12 && duration <= 24) {
                    interestRate = 0.19; // 19%
                } else if (duration > 24 && duration <= 36) {
                    interestRate = 0.18; // 18%
                }
            } else if (plafond >= 26000000 && plafond <= 50000000) {
                if (duration >= 1 && duration <= 12) {
                    interestRate = 0.19; // 19%
                } else if (duration > 12 && duration <= 24) {
                    interestRate = 0.18; // 18%
                } else if (duration > 24 && duration <= 36) {
                    interestRate = 0.17; // 17%
                } else if (duration > 36 && duration <= 48) {
                    interestRate = 0.16; // 16%
                }
            } else if (plafond >= 51000000 && plafond <= 100000000) {
                if (duration >= 1 && duration <= 12) {
                    interestRate = 0.18; // 18%
                } else if (duration > 12 && duration <= 24) {
                    interestRate = 0.17; // 17%
                } else if (duration > 24 && duration <= 36) {
                    interestRate = 0.16; // 16%
                } else if (duration > 36 && duration <= 48) {
                    interestRate = 0.15; // 15%
                }
            } else if (plafond > 100000000) {
                if (duration >= 1 && duration <= 12) {
                    interestRate = 0.18; // 18%
                } else if (duration > 12 && duration <= 24) {
                    interestRate = 0.17; // 17%
                } else if (duration > 24 && duration <= 36) {
                    interestRate = 0.16; // 16%
                } else if (duration > 36 && duration <= 48) {
                    interestRate = 0.15; // 15%
                } else if (duration > 48 && duration <= 60) {
                    interestRate = 0.14; // 14%
                } else if (duration > 60 && duration <= 72) {
                    interestRate = 0.13; // 13%
                }
            } else if (plafond >= 2000000) {
                if (duration >= 1 && duration <= 12) {
                    interestRate = 0.19; //19%
                } else if (duration > 12 && duration <= 36) {
                    interestRate = 0.18; //18%
                } else if (duration > 36 && duration <= 48) {
                    interestRate = 0.17; //17%
                }
                // } else if (plafond >= 2000000) {
                //     if (duration >= 1 && duration <= 72) {
                //         interestRate = 0.40 * plafond;
                //     }
            }
            if (plafond > 0) {
                const interest = (plafond * interestRate) + (plafond * duration);
                const totalPayment = plafond + interest;
                document.getElementById("result").innerText = `Total Angsuran /Bulan: Rp. ${interest.toLocaleString()}`;
                document.getElementById('input_jumlah_angsuran').value = interest
                document.getElementById('input_jangka_waktu').value = duration
                document.getElementById('input_bunga').value = interestRate
            } else {
                document.getElementById("result").innerText = "Plafon atau jangka waktu tidak valid.";
            }

            const interest = (plafond * interestRate) + (plafond * duration);

            $.ajax({
                    url: BASE_URL + '/administrator/pengajuan_kredit/add_save',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                    jangka_waktu: duration,
					bunga: interestRate,
					jumlah_angsuran: interest,
                    },
                })
                .done(function(res) {
                    $('form').find('.form-group').removeClass('has-error');
                    $('.steps li').removeClass('error');
                    $('form').find('.error-input').remove();
                    if (res.success) {
                        var id_file_ktp = $('#pengajuan_kredit_file_ktp_galery').find('li').attr('qq-file-id');

                        if (save_type == 'back') {
                            window.location.href = res.redirect;
                            return;
                        }

                        $('.message').printMessage({
                            message: res.message
                        });
                        $('.message').fadeIn();
                        resetForm();
                        if (typeof id_file_ktp !== 'undefined') {
                            $('#pengajuan_kredit_file_ktp_galery').fineUploader('deleteFile', id_file_ktp);
                        }
                        $('.chosen option').prop('selected', false).trigger('chosen:updated');

                    } else {
                        if (res.errors) {

                            $.each(res.errors, function(index, val) {
                                $('form #' + index).parents('.form-group').addClass('has-error');
                                $('form #' + index).parents('.form-group').find('small').prepend(`
                      <div class="error-input">` + val + `</div>
                      `);
                            });
                            $('.steps li').removeClass('error');
                            $('.content section').each(function(index, el) {
                                if ($(this).find('.has-error').length) {
                                    $('.steps li:eq(' + index + ')').addClass('error').find('a').trigger('click');
                                }
                            });
                        }
                        $('.message').printMessage({
                            message: res.message,
                            type: 'warning'
                        });
                    }

                })
                .fail(function() {
                    $('.message').printMessage({
                        message: 'Error save data',
                        type: 'warning'
                    });
                })
                .always(function() {
                    $('.loading').hide();
                    $('html, body').animate({
                        scrollTop: $(document).height()
                    }, 2000);
                });

        }
        </script>
    </body>