

    <link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
    <script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>
    <?php $this->load->view('core_template/fine_upload'); ?>
<script type="text/javascript">
    function domo() {

        $('*').bind('keydown', 'Ctrl+s', function() {
            $('#btn_save').trigger('click');
            return false;
        });

        $('*').bind('keydown', 'Ctrl+x', function() {
            $('#btn_cancel').trigger('click');
            return false;
        });

        $('*').bind('keydown', 'Ctrl+d', function() {
            $('.btn_save_back').trigger('click');
            return false;
        });

    }

    jQuery(document).ready(domo);
</script>
<section class="content-header">
    <h1>
        Pengajuan Kredit        <small>Edit Pengajuan Kredit</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/pengajuan_kredit'); ?>">Pengajuan Kredit</a></li>
        <li class="active">Edit</li>
    </ol>
</section>

<style>

</style>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <div class="box box-widget widget-user-2">
                        <div class="widget-user-header ">
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <h3 class="widget-user-username">Pengajuan Kredit</h3>
                            <h5 class="widget-user-desc">Edit Pengajuan Kredit</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/pengajuan_kredit/edit_save/'.$this->uri->segment(4)), [
                            'name' => 'form_pengajuan_kredit',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_pengajuan_kredit',
                            'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

<div class="form-group group-username  ">
                                <label for="username" class="col-sm-2 control-label">Username                                   </label>
                                <div class="col-sm-6">
                                    <div class="input-group date col-sm-8">
                                        <input readonly type="text" class="form-control pull-right" name="username" placeholder="" id="username" value="<?= set_value('username', $pengajuan_kredit->username); ?>">
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>

                                                    
                        
                        <!-- <div class="form-group group-nama_lengkap  ">
                                <label for="nama_lengkap" class="col-sm-2 control-label">Nama Lengkap                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input readonly type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="" value="<?= set_value('nama_lengkap', $pengajuan_kredit->nama_lengkap); ?>">
                                    <small class="info help-block">
                                        <b>Input Nama Lengkap</b> Max Length : 250.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-file_ktp  ">
                                <label for="file_ktp" class="col-sm-2 control-label">File Ktp                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div style="display: none;">
                                    <div id="pengajuan_kredit_file_ktp_galery"></div>
                                    <input  class="data_file data_file_uuid" name="pengajuan_kredit_file_ktp_uuid" id="pengajuan_kredit_file_ktp_uuid" type="hidden" value="<?= set_value('pengajuan_kredit_file_ktp_uuid'); ?>">
                                    <input class="data_file" name="pengajuan_kredit_file_ktp_name" id="pengajuan_kredit_file_ktp_name" type="hidden" value="<?= set_value('pengajuan_kredit_file_ktp_name', $pengajuan_kredit->file_ktp); ?>">
                                    <small class="info help-block">
                                        </small>
                                    </div>
                                   
                                        <img src="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_ktp; ?>" class="image-responsive"
                     alt="image pengajuan_kredit" title="photo pengajuan_kredit">
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-no_hp  ">
                                <label for="no_hp" class="col-sm-2 control-label">No Hp                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input readonly type="text" class="form-control" name="no_hp" id="no_hp" placeholder="" value="<?= set_value('no_hp', $pengajuan_kredit->no_hp); ?>">
                                    <small class="info help-block">
                                        <b>Input No Hp</b> Max Length : 12.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-jumlah_pinjaman  ">
                                <label for="jumlah_pinjaman" class="col-sm-2 control-label">Jumlah Pinjaman                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input readonly type="number" class="form-control" name="jumlah_pinjaman" id="jumlah_pinjaman" placeholder="" value="<?= set_value('jumlah_pinjaman', $pengajuan_kredit->jumlah_pinjaman); ?>">
                                    <small class="info help-block">
                                        <b>Input Jumlah Pinjaman</b> Max Length : 15.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-jangka_waktu  ">
                                <label for="jangka_waktu" class="col-sm-2 control-label">Jangka Waktu                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input readonly type="text" class="form-control" name="jangka_waktu" id="jangka_waktu" placeholder="" value="<?= set_value('jangka_waktu', $pengajuan_kredit->jangka_waktu); ?>">
                                    <small class="info help-block">
                                        <b>Input Jangka Waktu</b> Max Length : 50.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-jenis_pinjaman  ">
                                <label readonly for="jenis_pinjaman" class="col-sm-2 control-label">Jenis Pinjaman                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input readonly type="text" class="form-control" name="jenis_pinjaman" id="jenis_pinjaman" placeholder="" value="<?= set_value('jenis_pinjaman', $pengajuan_kredit->jenis_pinjaman); ?>">
                                    <small class="info help-block">
                                        <b>Input Jenis Pinjaman</b> Max Length : 50.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-jaminan  ">
                                <label for="jaminan" class="col-sm-2 control-label">Jaminan                                    </label>
                                <div class="col-sm-8">
                                    <input readonly type="text" class="form-control" name="jaminan" id="jaminan" placeholder="" value="<?= set_value('jaminan', $pengajuan_kredit->jaminan); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>

                                 <div class="form-group group-username  ">
                                <label for="username" class="col-sm-2 control-label">Username                                   </label>
                                <div class="col-sm-6">
                                    <div class="input-group date col-sm-8">
                                        <input readonly type="text" class="form-control pull-right" name="username" placeholder="" id="username" value="<?= set_value('username', $pengajuan_kredit->username); ?>">
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                         -->
                        
                                                    
                        
                        <!-- <div class="form-group group-updated_at  ">
                                <label for="updated_at" class="col-sm-2 control-label">Updated At                                    </label>
                                <div class="col-sm-6">
                                    <div class="input-group date col-sm-8">
                                        <input type="text" class="form-control pull-right datetimepicker" name="updated_at" placeholder="" id="updated_at" value="<?= set_value('updated_at', $pengajuan_kredit->updated_at); ?>">
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div> -->
                        
                        
                                                    
                        
                        <!-- <div class="form-group group-updated_by  ">
                                <label for="updated_by" class="col-sm-2 control-label">Updated By                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="updated_by" id="updated_by" placeholder="" value="<?= set_value('updated_by', $pengajuan_kredit->updated_by); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                         -->
                                                    
                        
                        <div class="form-group ">
                                <label for="status" class="col-sm-2 control-label">Status                                    </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select" name="status" id="status" data-placeholder="Select Status">
                                        <option value=""></option>
                                        <option <?= $pengajuan_kredit->status == "ditolak" ? 'selected' :''; ?> value="ditolak">Ditolak</option>
                                        <option <?= $pengajuan_kredit->status == "diterima" ? 'selected' :''; ?> value="diterima">Diterima</option>
                                                                            </select>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                        
                                                    <div class="message"></div>
                                                <div class="row-fluid col-md-7 container-button-bottom">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                                <i class="fa fa-save"></i> <?= cclang('save_button'); ?>
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                                <i class="ion ion-ios-list-outline"></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a>

                            <div class="custom-button-wrapper">

                                                        </div>
                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                                <i class="fa fa-undo"></i> <?= cclang('cancel_button'); ?>
                            </a>
                            <span class="loading loading-hide">
                                <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg">
                                <i><?= cclang('loading_saving_data'); ?></i>
                            </span>
                        </div>
                                                <?= form_close(); ?>
                        </div>
                </div>
                <!--/box body -->
            </div>
            <!--/box -->
        </div>
    </div>
</section>


<script>
    $(document).ready(function() {

        "use strict";
        
    window.event_submit_and_action = '';
            
    
      
      
      
        
        
    
    $('#btn_cancel').click(function() {
        swal({
                title: "Are you sure?",
                text: "the data that you have created will be in the exhaust!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes!",
                cancelButtonText: "No!",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    window.location.href = BASE_URL + 'administrator/pengajuan_kredit';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
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
            url: form_pengajuan_kredit.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#pengajuan_kredit_image_galery').find('li').attr('qq-file-id');
                if (save_type == 'back') {
                    window.location.href = res.redirect;
                    return;
                }

                $('.message').printMessage({
                    message: res.message
                });
                $('.message').fadeIn();
                $('.data_file_uuid').val('');

            } else {
                if (res.errors) {
                    parseErrorField(res.errors);
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

    return false;
    }); /*end btn save*/

                        var params = {};
            params[csrf] = token;

            $('#pengajuan_kredit_file_ktp_galery').fineUploader({
                template: 'qq-template-gallery',
                request: {
                    endpoint: BASE_URL + '/administrator/pengajuan_kredit/upload_file_ktp_file',
                    params: params
                },
                deleteFile: {
                    enabled: true, // defaults to false
                    endpoint: BASE_URL + '/administrator/pengajuan_kredit/delete_file_ktp_file'
                },
                thumbnails: {
                    placeholders: {
                        waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                        notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
                    }
                },
                session: {
                    endpoint: BASE_URL + 'administrator/pengajuan_kredit/get_file_ktp_file/<?= $pengajuan_kredit->id; ?>',
                    refreshOnRequest: true
                },
                multiple: false,
                validation: {
                    allowedExtensions: ["*"],
                    sizeLimit: 0,
                                    },
                showMessage: function(msg) {
                    toastr['error'](msg);
                },
                callbacks: {
                    onComplete: function(id, name, xhr) {
                        if (xhr.success) {
                            var uuid = $('#pengajuan_kredit_file_ktp_galery').fineUploader('getUuid', id);
                            $('#pengajuan_kredit_file_ktp_uuid').val(uuid);
                            $('#pengajuan_kredit_file_ktp_name').val(xhr.uploadName);
                        } else {
                            toastr['error'](xhr.error);
                        }
                    },
                    onSubmit: function(id, name) {
                        var uuid = $('#pengajuan_kredit_file_ktp_uuid').val();
                        $.get(BASE_URL + '/administrator/pengajuan_kredit/delete_file_ktp_file/' + uuid);
                    },
                    onDeleteComplete: function(id, xhr, isError) {
                        if (isError == false) {
                            $('#pengajuan_kredit_file_ktp_uuid').val('');
                            $('#pengajuan_kredit_file_ktp_name').val('');
                        }
                    }
                }
            }); /*end file_ktp galey*/
            

    

    async function chain() {
            }

    chain();




    }); /*end doc ready*/
</script>