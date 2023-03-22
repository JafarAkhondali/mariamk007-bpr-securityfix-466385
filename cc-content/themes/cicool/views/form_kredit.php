<?= get_header(); ?>


<link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
<script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>
<?php $this->load->view('core_template/fine_upload'); ?>

<body id="page-top">
    <?= get_navigation(); ?>

    <body>

        <h3 class="text-center pt-50 ">Formulir Pengajuan Kredit</h3>
        <hr class="hrcenter">

        <div id="snackbar">Pengajuan Berhasil Terkirim</div>

        <?= form_open('', [
            'name' => 'form_pengajuan_kredit',
            'class' => 'form-horizontal form-step',
            'id' => 'form_pengajuan_kredit',
            'enctype' => 'multipart/form-data',
            'method' => 'POST'
        ]); ?>

        <div class="form-group group-nama_lengkap ">
            <label for="nama_lengkap" class="col-sm-2 control-label">Nama Lengkap <i class="required">*</i>
            </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap"
                    value="<?= set_value('nama_lengkap'); ?>">
            </div>
        </div>

        <div class="form-group group-no_hp ">
            <label for="no_hp" class="col-sm-2 control-label">No Hp <i class="required">*</i>
            </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp"
                    value="<?= set_value('no_hp'); ?>">
            </div>
        </div>


        <div class="form-group group-jumlah_pinjaman ">
            <label for="jumlah_pinjaman" class="col-sm-2 control-label">Jumlah Pinjaman <i class="required">*</i>
            </label>
            <div class="col-sm-8">
                <input type="number" class="form-control" name="jumlah_pinjaman" id="jumlah_pinjaman"
                    placeholder="Jumlah Pinjaman" value="<?= set_value('jumlah_pinjaman'); ?>">
            </div>
        </div>


        <div class="form-group group-jangka_waktu ">
            <label for="jangka_waktu" class="col-sm-2 control-label">Jangka Waktu <i class="required">*</i>
            </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="jangka_waktu" id="jangka_waktu" placeholder="Jangka Waktu"
                    value="<?= set_value('jangka_waktu'); ?>">

            </div>
        </div>

        <!-- <div class="form-group group-jaminan ">
            <label for="jaminan" class="col-sm-2 control-label">Jaminan <i class="required">*</i>
            </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="jaminan" id="jaminan" placeholder="Jangka Waktu"
                    value="<?= set_value('jaminan'); ?>">

            </div>
        </div> -->




        <div class="form-group group-jenis_pinjaman ">
            <label for="jenis_pinjaman" class="col-sm-2 control-label">Jenis Pinjaman <i class="required">*</i>
            </label>
            <div class="col-sm-8">
                <select name="jenis_pinjaman" class="form-control">
                    <option value="modal">Modal</option>
                    <option value="investasi">Investasi</option>
                    <option value="konsumtif">Konsumtif</option>
                </select>
            </div>
        </div>

        <div class="form-group group-file_sku ">
            <label for="file_sku" class="col-sm-2 control-label">File Surat Keterangan Usaha (Bagi yang ada usaha)
            </label>
            <div class="col-sm-8">
                <div id="pengajuan_kredit_file_sku_galery"></div>
                <input class="data_file" name="pengajuan_kredit_file_sku_uuid" id="pengajuan_kredit_file_sku_uuid"
                    type="hidden" value="<?= set_value('pengajuan_kredit_file_sku_uuid'); ?>">
                <input class="data_file" name="pengajuan_kredit_file_sku_name" id="pengajuan_kredit_file_sku_name"
                    type="hidden" value="<?= set_value('pengajuan_kredit_file_sku_name'); ?>">
                <small class="info help-block">
                </small>
            </div>
        </div>

        <div class="form-group group-file_skp ">
            <label for="file_skp" class="col-sm-2 control-label">File Surat Keterangan Penghasilan (Karyawan)<i
                    class="required">*</i>
            </label>
            <div class="col-sm-8">
                <div id="pengajuan_kredit_file_skp_galery"></div>
                <input class="data_file" name="pengajuan_kredit_file_skp_uuid" id="pengajuan_kredit_file_skp_uuid"
                    type="hidden" value="<?= set_value('pengajuan_kredit_file_skp_uuid'); ?>">
                <input class="data_file" name="pengajuan_kredit_file_skp_name" id="pengajuan_kredit_file_skp_name"
                    type="hidden" value="<?= set_value('pengajuan_kredit_file_skp_name'); ?>">
                <small class="info help-block">
                </small>
            </div>
        </div>

        <div class="form-group group-file_photo ">
            <label for="file_photo" class="col-sm-2 control-label">Pas Photo 3 x 4 berwarna<i class="required">*</i>
            </label>
            <div class="col-sm-8">
                <div id="pengajuan_kredit_file_photo_galery"></div>
                <input class="data_file" name="pengajuan_kredit_file_photo_uuid" id="pengajuan_kredit_file_photo_uuid"
                    type="hidden" value="<?= set_value('pengajuan_kredit_file_photo_uuid'); ?>">
                <input class="data_file" name="pengajuan_kredit_file_photo_name" id="pengajuan_kredit_file_photo_name"
                    type="hidden" value="<?= set_value('pengajuan_kredit_file_photo_name'); ?>">
                <small class="info help-block">
                </small>
            </div>
        </div>

        <div class="form-group group-file_ktp ">
            <label for="file_ktp" class="col-sm-2 control-label">File Ktp<i class="required">*</i>
            </label>
            <div class="col-sm-8">
                <div id="pengajuan_kredit_file_ktp_galery"></div>
                <input class="data_file" name="pengajuan_kredit_file_ktp_uuid" id="pengajuan_kredit_file_ktp_uuid"
                    type="hidden" value="<?= set_value('pengajuan_kredit_file_ktp_uuid'); ?>">
                <input class="data_file" name="pengajuan_kredit_file_ktp_name" id="pengajuan_kredit_file_ktp_name"
                    type="hidden" value="<?= set_value('pengajuan_kredit_file_ktp_name'); ?>">
                <small class="info help-block">
                </small>
            </div>
        </div>

        <div class="form-group group-file_ktp_istri ">
            <label for="file_ktp_istri" class="col-sm-2 control-label">File Ktp Pasangan (Suami/Istri)
            </label>
            <div class="col-sm-8">
                <div id="pengajuan_kredit_file_ktp_istri_galery"></div>
                <input class="data_file" name="pengajuan_kredit_file_ktp_istri_uuid"
                    id="pengajuan_kredit_file_ktp_istri_uuid" type="hidden"
                    value="<?= set_value('pengajuan_kredit_file_ktp_istri_uuid'); ?>">
                <input class="data_file" name="pengajuan_kredit_file_ktp_istri_name"
                    id="pengajuan_kredit_file_ktp_istri_name" type="hidden"
                    value="<?= set_value('pengajuan_kredit_file_ktp_istri_name'); ?>">
                <small class="info help-block">
                </small>
            </div>
        </div>

        <div class="form-group group-file_kk ">
            <label for="file_kk" class="col-sm-2 control-label">File Kartu Keluarga<i class="required">*</i>
            </label>
            <div class="col-sm-8">
                <div id="pengajuan_kredit_file_kk_galery"></div>
                <input class="data_file" name="pengajuan_kredit_file_kk_uuid" id="pengajuan_kredit_file_kk_uuid"
                    type="hidden" value="<?= set_value('pengajuan_kredit_file_kk_uuid'); ?>">
                <input class="data_file" name="pengajuan_kredit_file_kk_name" id="pengajuan_kredit_file_kk_name"
                    type="hidden" value="<?= set_value('pengajuan_kredit_file_kk_name'); ?>">
                <small class="info help-block">
                </small>
            </div>
        </div>

        <div class="form-group group-file_surat_nikah ">
            <label for="file_surat_nikah" class="col-sm-2 control-label">File Surat Nikah
            </label>
            <div class="col-sm-8">
                <div id="pengajuan_kredit_file_surat_nikah_galery"></div>
                <input class="data_file" name="pengajuan_kredit_file_surat_nikah_uuid"
                    id="pengajuan_kredit_file_surat_nikah_uuid" type="hidden"
                    value="<?= set_value('pengajuan_kredit_file_surat_nikah_uuid'); ?>">
                <input class="data_file" name="pengajuan_kredit_file_surat_nikah_name"
                    id="pengajuan_kredit_file_surat_nikah_name" type="hidden"
                    value="<?= set_value('pengajuan_kredit_file_surat_nikah_name'); ?>">
                <small class="info help-block">
                </small>
            </div>
        </div>

        <div class="form-group group-file_jaminan ">
            <label for="file_jaminan" class="col-sm-2 control-label">File Jaminan (SHM/SHGB/SKGR/BPKB)<i
                    class="required">*</i>
            </label>
            <div class="col-sm-8">
                <div id="pengajuan_kredit_file_jaminan_galery"></div>
                <input class="data_file" name="pengajuan_kredit_file_jaminan_uuid"
                    id="pengajuan_kredit_file_jaminan_uuid" type="hidden"
                    value="<?= set_value('pengajuan_kredit_file_jaminan_uuid'); ?>">
                <input class="data_file" name="pengajuan_kredit_file_jaminan_name"
                    id="pengajuan_kredit_file_jaminan_name" type="hidden"
                    value="<?= set_value('pengajuan_kredit_file_jaminan_name'); ?>">
                <small class="info help-block">
                </small>
            </div>
        </div>

        <div class="form-group group-file_rekening_listrik ">
            <label for="file_rekening_listrik" class="col-sm-2 control-label">File Rekening Listrik Terbaru<i
                    class="required">*</i>
            </label>
            <div class="col-sm-8">
                <div id="pengajuan_kredit_file_rekening_listrik_galery"></div>
                <input class="data_file" name="pengajuan_kredit_file_rekening_listrik_uuid"
                    id="pengajuan_kredit_file_rekening_listrik_uuid" type="hidden"
                    value="<?= set_value('pengajuan_kredit_file_rekening_listrik_uuid'); ?>">
                <input class="data_file" name="pengajuan_kredit_file_rekening_listrik_name"
                    id="pengajuan_kredit_file_rekening_listrik_name" type="hidden"
                    value="<?= set_value('pengajuan_kredit_file_rekening_listrik_name'); ?>">
                <small class="info help-block">
                </small>
            </div>
        </div>

        <div class="form-group group-file_pbb_stnk ">
            <label for="file_pbb_stnk" class="col-sm-2 control-label">File PBB/STNK<i class="required">*</i>
            </label>
            <div class="col-sm-8">
                <div id="pengajuan_kredit_file_pbb_stnk_galery"></div>
                <input class="data_file" name="pengajuan_kredit_file_pbb_stnk_uuid"
                    id="pengajuan_kredit_file_pbb_stnk_uuid" type="hidden"
                    value="<?= set_value('pengajuan_kredit_file_pbb_stnk_uuid'); ?>">
                <input class="data_file" name="pengajuan_kredit_file_pbb_stnk_name"
                    id="pengajuan_kredit_file_pbb_stnk_name" type="hidden"
                    value="<?= set_value('pengajuan_kredit_file_pbb_stnk_name'); ?>">
                <small class="info help-block">
                </small>
            </div>
        </div>







        <div class="message"></div>

        <button class="btn btn-success btn_save btn_action center" id="btn_save" data-stype='stay'
            title="<?= cclang('save_button'); ?> (Ctrl+s)">
            Submit
        </button>
        <?= form_close(); ?>


        <!-- <script type="text/javascript">
            $(function () {
                $("#kreditForm").on('submit', function (e) {
                    e.preventDefault();
                    var form = $('#kreditForm')[0];
                    var formData = new FormData(form);

                    var kreditForm = $(this);

                    $.ajax({
                        url: kreditForm.attr('action'),
                        type: 'post',
                        // data: kreditForm.serialize(),
                        processData: false,
                        contentType: false,
                        data: formData,
                        success: function (response) {
                            var x = document.getElementById("snackbar");
                            x.className = "show";
                            setTimeout(function () { x.className = x.className.replace("show", ""); }, 9000);
                        }
                    });
                });
            });

        </script> -->

        <script>
            $(document).ready(function () {

                "use strict";

                window.event_submit_and_action = '';







                $('#btn_cancel').click(function () {
                    swal({
                        title: "<?= cclang('are_you_sure'); ?>",
                        text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes!",
                        cancelButtonText: "No!",
                        closeOnConfirm: true,
                        closeOnCancel: true
                    },
                        function (isConfirm) {
                            if (isConfirm) {
                                window.location.href = '<?= BASE_URL ?>' + '/administrator/pengajuan_kredit';
                            }
                        });

                    return false;
                }); /*end btn cancel*/

                $('.btn_save').click(function () {
                    $('.message').fadeOut();

                    var form_pengajuan_kredit = $('#form_pengajuan_kredit');
                    var data_post = form_pengajuan_kredit.serializeArray();
                    var save_type = $(this).attr('data-stype');

                    data_post.push({
                        name: 'save_type',
                        value: save_type
                    });

                    data_post.push({
                        name: 'event_submit_and_action',
                        value: window.event_submit_and_action
                    });



                    $('.loading').show();

                    $.ajax({
                        url: '<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/add_save',
                        type: 'POST',
                        dataType: 'json',
                        data: data_post,
                        success: function (response) {
                            // var x = document.getElementById("snackbar");
                            // x.className = "show";
                            // setTimeout(function () { x.className = x.className.replace("show", ""); }, 9000);
                        }
                    })


                        .done(function (res) {

                            $('form').find('.form-group').removeClass('has-error');
                            $('.steps li').removeClass('error');
                            $('form').find('.error-input').remove();
                            if (res.success) {
                                var x = document.getElementById("snackbar");
                                x.className = "show";
                                setTimeout(function () { x.className = x.className.replace("show", ""); }, 9000);
                                var id_file_ktp = $('#pengajuan_kredit_file_ktp_galery').find('li').attr('qq-file-id');

                                if (save_type == 'back') {
                                    window.location.href = res.redirect;
                                    return;
                                }

                                // $('.message').printMessage({
                                //     message: res.message
                                // });
                                $('.message').fadeIn();
                                resetForm();
                                if (typeof id_file_ktp !== 'undefined') {
                                    $('#pengajuan_kredit_file_ktp_galery').fineUploader('deleteFile', id_file_ktp);
                                }
                                $('.chosen option').prop('selected', false).trigger('chosen:updated');

                                // location.reload();
                            } else {
                                if (res.errors) {

                                    $.each(res.errors, function (index, val) {
                                        $('form #' + index).parents('.form-group').addClass('has-error');
                                        $('form #' + index).parents('.form-group').find('small').prepend(`
                      <div class="error-input">` + val + `</div>
                      `);
                                    });
                                    $('.steps li').removeClass('error');
                                    $('.content section').each(function (index, el) {
                                        if ($(this).find('.has-error').length) {
                                            $('.steps li:eq(' + index + ')').addClass('error').find('a').trigger('click');
                                        }
                                    });
                                }
                                // $('.message').printMessage({
                                //     message: res.message,
                                //     type: 'warning'
                                // });
                            }

                        })
                        .fail(function () {
                            // $('.message').printMessage({
                            //     message: 'Error save data',
                            //     type: 'warning'
                            // });
                        })
                        .always(function () {
                            $('.loading').hide();
                            $('html, body').animate({
                                scrollTop: $(document).height()
                            }, 2000);
                        });

                    return false;
                }); /*end btn save*/

                //     var params = {};
                // params[csrf] = token;

                $('#pengajuan_kredit_file_ktp_galery').fineUploader({
                    template: 'qq-template-gallery',
                    request: {
                        endpoint: '<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/upload_file_ktp_file',
                        // params: params
                    },
                    deleteFile: {
                        enabled: true,
                        endpoint: '<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/delete_file_ktp_file',
                    },
                    thumbnails: {
                        placeholders: {
                            waitingPath: '<?= BASE_URL ?>' + '/asset/fine-upload/placeholders/waiting-generic.png',
                            notAvailablePath: '<?= BASE_URL ?>' + '/asset/fine-upload/placeholders/not_available-generic.png'
                        }
                    },
                    multiple: false,
                    validation: {
                        allowedExtensions: ["*"],
                        sizeLimit: 0,
                    },
                    // showMessage: function (msg) {
                    //     toastr['error'](msg);
                    // },
                    callbacks: {
                        onComplete: function (id, name, xhr) {
                            if (xhr.success) {
                                var uuid = $('#pengajuan_kredit_file_ktp_galery').fineUploader('getUuid', id);
                                $('#pengajuan_kredit_file_ktp_uuid').val(uuid);
                                $('#pengajuan_kredit_file_ktp_name').val(xhr.uploadName);
                            } else {
                                // toastr['error'](xhr.error);
                            }
                        },
                        onSubmit: function (id, name) {
                            var uuid = $('#pengajuan_kredit_file_ktp_uuid').val();
                            $.get('<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/delete_file_ktp_file/' + uuid);
                        },
                        onDeleteComplete: function (id, xhr, isError) {
                            if (isError == false) {
                                $('#pengajuan_kredit_file_ktp_uuid').val('');
                                $('#pengajuan_kredit_file_ktp_name').val('');
                            }
                        }
                    }
                }); /*end file_ktp galery*/

                $('#pengajuan_kredit_file_ktp_istri_galery').fineUploader({
                    template: 'qq-template-gallery',
                    request: {
                        endpoint: '<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/upload_file_ktp_istri_file',
                        // params: params
                    },
                    deleteFile: {
                        enabled: true,
                        endpoint: '<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/delete_file_ktp_istri_file',
                    },
                    thumbnails: {
                        placeholders: {
                            waitingPath: '<?= BASE_URL ?>' + '/asset/fine-upload/placeholders/waiting-generic.png',
                            notAvailablePath: '<?= BASE_URL ?>' + '/asset/fine-upload/placeholders/not_available-generic.png'
                        }
                    },
                    multiple: false,
                    validation: {
                        allowedExtensions: ["*"],
                        sizeLimit: 0,
                    },
                    // showMessage: function (msg) {
                    //     toastr['error'](msg);
                    // },
                    callbacks: {
                        onComplete: function (id, name, xhr) {
                            if (xhr.success) {
                                var uuid = $('#pengajuan_kredit_file_ktp_istri_galery').fineUploader('getUuid', id);
                                $('#pengajuan_kredit_file_ktp_istri_uuid').val(uuid);
                                $('#pengajuan_kredit_file_ktp_istri_name').val(xhr.uploadName);
                            } else {
                                // toastr['error'](xhr.error);
                            }
                        },
                        onSubmit: function (id, name) {
                            var uuid = $('#pengajuan_kredit_file_ktp_istri_uuid').val();
                            $.get('<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/delete_file_ktp_istri_file/' + uuid);
                        },
                        onDeleteComplete: function (id, xhr, isError) {
                            if (isError == false) {
                                $('#pengajuan_kredit_file_ktp_istri_uuid').val('');
                                $('#pengajuan_kredit_file_ktp_istri_name').val('');
                            }
                        }
                    }
                }); /*end file_ktp istri galery*/

                $('#pengajuan_kredit_file_sku_galery').fineUploader({
                    template: 'qq-template-gallery',
                    request: {
                        endpoint: '<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/upload_file_sku_file',
                        // params: params
                    },
                    deleteFile: {
                        enabled: true,
                        endpoint: '<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/delete_file_sku_file',
                    },
                    thumbnails: {
                        placeholders: {
                            waitingPath: '<?= BASE_URL ?>' + '/asset/fine-upload/placeholders/waiting-generic.png',
                            notAvailablePath: '<?= BASE_URL ?>' + '/asset/fine-upload/placeholders/not_available-generic.png'
                        }
                    },
                    multiple: false,
                    validation: {
                        allowedExtensions: ["*"],
                        sizeLimit: 0,
                    },
                    // showMessage: function (msg) {
                    //     toastr['error'](msg);
                    // },
                    callbacks: {
                        onComplete: function (id, name, xhr) {
                            if (xhr.success) {
                                var uuid = $('#pengajuan_kredit_file_sku_galery').fineUploader('getUuid', id);
                                $('#pengajuan_kredit_file_sku_uuid').val(uuid);
                                $('#pengajuan_kredit_file_sku_name').val(xhr.uploadName);
                            } else {
                                // toastr['error'](xhr.error);
                            }
                        },
                        onSubmit: function (id, name) {
                            var uuid = $('#pengajuan_kredit_file_sku_uuid').val();
                            $.get('<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/delete_file_sku_file/' + uuid);
                        },
                        onDeleteComplete: function (id, xhr, isError) {
                            if (isError == false) {
                                $('#pengajuan_kredit_file_sku_uuid').val('');
                                $('#pengajuan_kredit_file_sku_name').val('');
                            }
                        }
                    }
                }); /*end file_sku galery*/

                $('#pengajuan_kredit_file_skp_galery').fineUploader({
                    template: 'qq-template-gallery',
                    request: {
                        endpoint: '<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/upload_file_skp_file',
                        // params: params
                    },
                    deleteFile: {
                        enabled: true,
                        endpoint: '<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/delete_file_skp_file',
                    },
                    thumbnails: {
                        placeholders: {
                            waitingPath: '<?= BASE_URL ?>' + '/asset/fine-upload/placeholders/waiting-generic.png',
                            notAvailablePath: '<?= BASE_URL ?>' + '/asset/fine-upload/placeholders/not_available-generic.png'
                        }
                    },
                    multiple: false,
                    validation: {
                        allowedExtensions: ["*"],
                        sizeLimit: 0,
                    },
                    // showMessage: function (msg) {
                    //     toastr['error'](msg);
                    // },
                    callbacks: {
                        onComplete: function (id, name, xhr) {
                            if (xhr.success) {
                                var uuid = $('#pengajuan_kredit_file_skp_galery').fineUploader('getUuid', id);
                                $('#pengajuan_kredit_file_skp_uuid').val(uuid);
                                $('#pengajuan_kredit_file_skp_name').val(xhr.uploadName);
                            } else {
                                // toastr['error'](xhr.error);
                            }
                        },
                        onSubmit: function (id, name) {
                            var uuid = $('#pengajuan_kredit_file_skp_uuid').val();
                            $.get('<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/delete_file_skp_file/' + uuid);
                        },
                        onDeleteComplete: function (id, xhr, isError) {
                            if (isError == false) {
                                $('#pengajuan_kredit_file_skp_uuid').val('');
                                $('#pengajuan_kredit_file_skp_name').val('');
                            }
                        }
                    }
                }); /*end file_skp galery*/

                $('#pengajuan_kredit_file_photo_galery').fineUploader({
                    template: 'qq-template-gallery',
                    request: {
                        endpoint: '<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/upload_file_photo_file',
                        // params: params
                    },
                    deleteFile: {
                        enabled: true,
                        endpoint: '<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/delete_file_photo_file',
                    },
                    thumbnails: {
                        placeholders: {
                            waitingPath: '<?= BASE_URL ?>' + '/asset/fine-upload/placeholders/waiting-generic.png',
                            notAvailablePath: '<?= BASE_URL ?>' + '/asset/fine-upload/placeholders/not_available-generic.png'
                        }
                    },
                    multiple: false,
                    validation: {
                        allowedExtensions: ["*"],
                        sizeLimit: 0,
                    },
                    // showMessage: function (msg) {
                    //     toastr['error'](msg);
                    // },
                    callbacks: {
                        onComplete: function (id, name, xhr) {
                            if (xhr.success) {
                                var uuid = $('#pengajuan_kredit_file_photo_galery').fineUploader('getUuid', id);
                                $('#pengajuan_kredit_file_photo_uuid').val(uuid);
                                $('#pengajuan_kredit_file_photo_name').val(xhr.uploadName);
                            } else {
                                // toastr['error'](xhr.error);
                            }
                        },
                        onSubmit: function (id, name) {
                            var uuid = $('#pengajuan_kredit_file_photo_uuid').val();
                            $.get('<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/delete_file_photo_file/' + uuid);
                        },
                        onDeleteComplete: function (id, xhr, isError) {
                            if (isError == false) {
                                $('#pengajuan_kredit_file_photo_uuid').val('');
                                $('#pengajuan_kredit_file_photo_name').val('');
                            }
                        }
                    }
                }); /*end file_photo galery*/

                $('#pengajuan_kredit_file_kk_galery').fineUploader({
                    template: 'qq-template-gallery',
                    request: {
                        endpoint: '<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/upload_file_kk_file',
                        // params: params
                    },
                    deleteFile: {
                        enabled: true,
                        endpoint: '<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/delete_file_kk_file',
                    },
                    thumbnails: {
                        placeholders: {
                            waitingPath: '<?= BASE_URL ?>' + '/asset/fine-upload/placeholders/waiting-generic.png',
                            notAvailablePath: '<?= BASE_URL ?>' + '/asset/fine-upload/placeholders/not_available-generic.png'
                        }
                    },
                    multiple: false,
                    validation: {
                        allowedExtensions: ["*"],
                        sizeLimit: 0,
                    },
                    // showMessage: function (msg) {
                    //     toastr['error'](msg);
                    // },
                    callbacks: {
                        onComplete: function (id, name, xhr) {
                            if (xhr.success) {
                                var uuid = $('#pengajuan_kredit_file_kk_galery').fineUploader('getUuid', id);
                                $('#pengajuan_kredit_file_kk_uuid').val(uuid);
                                $('#pengajuan_kredit_file_kk_name').val(xhr.uploadName);
                            } else {
                                // toastr['error'](xhr.error);
                            }
                        },
                        onSubmit: function (id, name) {
                            var uuid = $('#pengajuan_kredit_file_kk_uuid').val();
                            $.get('<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/delete_file_kk_file/' + uuid);
                        },
                        onDeleteComplete: function (id, xhr, isError) {
                            if (isError == false) {
                                $('#pengajuan_kredit_file_kk_uuid').val('');
                                $('#pengajuan_kredit_file_kk_name').val('');
                            }
                        }
                    }
                }); /*end file_kk galery*/

                $('#pengajuan_kredit_file_surat_nikah_galery').fineUploader({
                    template: 'qq-template-gallery',
                    request: {
                        endpoint: '<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/upload_file_surat_nikah_file',
                        // params: params
                    },
                    deleteFile: {
                        enabled: true,
                        endpoint: '<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/delete_file_surat_nikah_file',
                    },
                    thumbnails: {
                        placeholders: {
                            waitingPath: '<?= BASE_URL ?>' + '/asset/fine-upload/placeholders/waiting-generic.png',
                            notAvailablePath: '<?= BASE_URL ?>' + '/asset/fine-upload/placeholders/not_available-generic.png'
                        }
                    },
                    multiple: false,
                    validation: {
                        allowedExtensions: ["*"],
                        sizeLimit: 0,
                    },
                    // showMessage: function (msg) {
                    //     toastr['error'](msg);
                    // },
                    callbacks: {
                        onComplete: function (id, name, xhr) {
                            if (xhr.success) {
                                var uuid = $('#pengajuan_kredit_file_surat_nikah_galery').fineUploader('getUuid', id);
                                $('#pengajuan_kredit_file_surat_nikah_uuid').val(uuid);
                                $('#pengajuan_kredit_file_surat_nikah_name').val(xhr.uploadName);
                            } else {
                                // toastr['error'](xhr.error);
                            }
                        },
                        onSubmit: function (id, name) {
                            var uuid = $('#pengajuan_kredit_file_surat_nikah_uuid').val();
                            $.get('<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/delete_file_surat_nikah_file/' + uuid);
                        },
                        onDeleteComplete: function (id, xhr, isError) {
                            if (isError == false) {
                                $('#pengajuan_kredit_file_surat_nikah_uuid').val('');
                                $('#pengajuan_kredit_file_surat_nikah_name').val('');
                            }
                        }
                    }
                }); /*end file_surat_nikah galery*/

                $('#pengajuan_kredit_file_jaminan_galery').fineUploader({
                    template: 'qq-template-gallery',
                    request: {
                        endpoint: '<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/upload_file_jaminan_file',
                        // params: params
                    },
                    deleteFile: {
                        enabled: true,
                        endpoint: '<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/delete_file_jaminan_file',
                    },
                    thumbnails: {
                        placeholders: {
                            waitingPath: '<?= BASE_URL ?>' + '/asset/fine-upload/placeholders/waiting-generic.png',
                            notAvailablePath: '<?= BASE_URL ?>' + '/asset/fine-upload/placeholders/not_available-generic.png'
                        }
                    },
                    multiple: false,
                    validation: {
                        allowedExtensions: ["*"],
                        sizeLimit: 0,
                    },
                    // showMessage: function (msg) {
                    //     toastr['error'](msg);
                    // },
                    callbacks: {
                        onComplete: function (id, name, xhr) {
                            if (xhr.success) {
                                var uuid = $('#pengajuan_kredit_file_jaminan_galery').fineUploader('getUuid', id);
                                $('#pengajuan_kredit_file_jaminan_uuid').val(uuid);
                                $('#pengajuan_kredit_file_jaminan_name').val(xhr.uploadName);
                            } else {
                                // toastr['error'](xhr.error);
                            }
                        },
                        onSubmit: function (id, name) {
                            var uuid = $('#pengajuan_kredit_file_jaminan_uuid').val();
                            $.get('<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/delete_file_jaminan_file/' + uuid);
                        },
                        onDeleteComplete: function (id, xhr, isError) {
                            if (isError == false) {
                                $('#pengajuan_kredit_file_jaminan_uuid').val('');
                                $('#pengajuan_kredit_file_jaminan_name').val('');
                            }
                        }
                    }
                }); /*end file_jaminan galery*/


                $('#pengajuan_kredit_file_rekening_listrik_galery').fineUploader({
                    template: 'qq-template-gallery',
                    request: {
                        endpoint: '<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/upload_file_rekening_listrik_file',
                        // params: params
                    },
                    deleteFile: {
                        enabled: true,
                        endpoint: '<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/delete_file_rekening_listrik_file',
                    },
                    thumbnails: {
                        placeholders: {
                            waitingPath: '<?= BASE_URL ?>' + '/asset/fine-upload/placeholders/waiting-generic.png',
                            notAvailablePath: '<?= BASE_URL ?>' + '/asset/fine-upload/placeholders/not_available-generic.png'
                        }
                    },
                    multiple: false,
                    validation: {
                        allowedExtensions: ["*"],
                        sizeLimit: 0,
                    },
                    // showMessage: function (msg) {
                    //     toastr['error'](msg);
                    // },
                    callbacks: {
                        onComplete: function (id, name, xhr) {
                            if (xhr.success) {
                                var uuid = $('#pengajuan_kredit_file_rekening_listrik_galery').fineUploader('getUuid', id);
                                $('#pengajuan_kredit_file_rekening_listrik_uuid').val(uuid);
                                $('#pengajuan_kredit_file_rekening_listrik_name').val(xhr.uploadName);
                            } else {
                                // toastr['error'](xhr.error);
                            }
                        },
                        onSubmit: function (id, name) {
                            var uuid = $('#pengajuan_kredit_file_rekening_listrik_uuid').val();
                            $.get('<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/delete_file_rekening_listrik_file/' + uuid);
                        },
                        onDeleteComplete: function (id, xhr, isError) {
                            if (isError == false) {
                                $('#pengajuan_kredit_file_rekening_listrik_uuid').val('');
                                $('#pengajuan_kredit_file_rekening_listrik_name').val('');
                            }
                        }
                    }
                }); /*end file_rekening_listrik galery*/

                $('#pengajuan_kredit_file_pbb_stnk_galery').fineUploader({
                    template: 'qq-template-gallery',
                    request: {
                        endpoint: '<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/upload_file_pbb_stnk_file',
                        // params: params
                    },
                    deleteFile: {
                        enabled: true,
                        endpoint: '<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/delete_file_pbb_stnk_file',
                    },
                    thumbnails: {
                        placeholders: {
                            waitingPath: '<?= BASE_URL ?>' + '/asset/fine-upload/placeholders/waiting-generic.png',
                            notAvailablePath: '<?= BASE_URL ?>' + '/asset/fine-upload/placeholders/not_available-generic.png'
                        }
                    },
                    multiple: false,
                    validation: {
                        allowedExtensions: ["*"],
                        sizeLimit: 0,
                    },
                    // showMessage: function (msg) {
                    //     toastr['error'](msg);
                    // },
                    callbacks: {
                        onComplete: function (id, name, xhr) {
                            if (xhr.success) {
                                var uuid = $('#pengajuan_kredit_file_pbb_stnk_galery').fineUploader('getUuid', id);
                                $('#pengajuan_kredit_file_pbb_stnk_uuid').val(uuid);
                                $('#pengajuan_kredit_file_pbb_stnk_name').val(xhr.uploadName);
                            } else {
                                // toastr['error'](xhr.error);
                            }
                        },
                        onSubmit: function (id, name) {
                            var uuid = $('#pengajuan_kredit_file_pbb_stnk_uuid').val();
                            $.get('<?= BASE_URL ?>' + '/administrator/pengajuan_kredit/delete_file_pbb_stnk_file/' + uuid);
                        },
                        onDeleteComplete: function (id, xhr, isError) {
                            if (isError == false) {
                                $('#pengajuan_kredit_file_pbb_stnk_uuid').val('');
                                $('#pengajuan_kredit_file_pbb_stnk_name').val('');
                            }
                        }
                    }
                }); /*end file_pbb_stnk galery*/









            }); /*end doc ready*/
        </script>
        <?= get_footer(); ?>

    </body>