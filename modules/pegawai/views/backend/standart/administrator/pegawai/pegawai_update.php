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
        Pegawai <small>Edit Pegawai</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/pegawai'); ?>">Pegawai</a></li>
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
                            <h3 class="widget-user-username">Pegawai</h3>
                            <h5 class="widget-user-desc">Edit Pegawai</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/pegawai/edit_save/'.$this->uri->segment(4)), [
                            'name' => 'form_pegawai',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_pegawai',
                            'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>



                        <div class="form-group group-nama  ">
                            <label for="nama" class="col-sm-2 control-label">Nama <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama" id="nama" placeholder=""
                                    value="<?= set_value('nama', $pegawai->nama); ?>">
                                <small class="info help-block">
                                    <b>Input Nama</b> Max Length : 255.</small>
                            </div>
                        </div>




                        <div class="form-group group-jabatan  ">
                            <label for="jabatan" class="col-sm-2 control-label">Jabatan <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder=""
                                    value="<?= set_value('jabatan', $pegawai->jabatan); ?>">
                                <small class="info help-block">
                                    <b>Input Jabatan</b> Max Length : 255.</small>
                            </div>
                        </div>




                        <div class="form-group group-is_featured  ">
                            <label for="is_featured" class="col-sm-2 control-label">Is Featured </label>
                            <div class="col-sm-6">
                                <div class="col-md-2 padding-left-0">
                                    <label>
                                        <input type="radio" class="flat-red" name="is_featured" id="is_featured"
                                            value="yes" <?= $pegawai->is_featured == "yes" ? "checked" : ""; ?>>
                                        Yes
                                    </label>
                                </div>
                                <div class="col-md-14">
                                    <label>
                                        <input type="radio" class="flat-red" name="is_featured" id="is_featured"
                                            value="no" <?= $pegawai->is_featured == "no" ? "checked" : ""; ?>>
                                        No
                                    </label>
                                </div>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>



                        <div class="message"></div>
                        <div class="row-fluid col-md-7 container-button-bottom">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay'
                                title="<?= cclang('save_button'); ?> (Ctrl+s)">
                                <i class="fa fa-save"></i> <?= cclang('save_button'); ?>
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save"
                                data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                                <i class="ion ion-ios-list-outline"></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a>

                            <div class="custom-button-wrapper">

                            </div>
                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel"
                                title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
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
                    window.location.href = BASE_URL + 'administrator/pegawai';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();

        var form_pegawai = $('#form_pegawai');
        var data_post = form_pegawai.serializeArray();
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
                url: form_pegawai.attr('action'),
                type: 'POST',
                dataType: 'json',
                data: data_post,
            })
            .done(function(res) {
                $('form').find('.form-group').removeClass('has-error');
                $('form').find('.error-input').remove();
                $('.steps li').removeClass('error');
                if (res.success) {
                    var id = $('#pegawai_image_galery').find('li').attr('qq-file-id');
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





    async function chain() {}

    chain();




}); /*end doc ready*/
</script>