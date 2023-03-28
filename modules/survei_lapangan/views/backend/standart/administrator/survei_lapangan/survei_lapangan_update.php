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
        Survei Lapangan <small>Edit Survei Lapangan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/survei_lapangan'); ?>">Survei Lapangan</a></li>
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
                            <h3 class="widget-user-username">Survei Lapangan</h3>
                            <h5 class="widget-user-desc">Edit Survei Lapangan</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/survei_lapangan/edit_save/'.$this->uri->segment(4)), [
                            'name' => 'form_survei_lapangan',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_survei_lapangan',
                            'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>



                        <div class="form-group group-jaminan_kredit  ">
                            <label for="jaminan_kredit" class="col-sm-2 control-label">Jaminan Kredit <i
                                    class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="jaminan_kredit" id="jaminan_kredit"
                                    placeholder=""
                                    value="<?= set_value('jaminan_kredit', $survei_lapangan->jaminan_kredit); ?>">
                                <small class="info help-block">
                                    <b>Input Jaminan Kredit</b> Max Length : 255.</small>
                            </div>
                        </div>




                        <div class="form-group group-lokasi_jaminan  ">
                            <label for="lokasi_jaminan" class="col-sm-2 control-label">Lokasi Jaminan <i
                                    class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="lokasi_jaminan" id="lokasi_jaminan"
                                    placeholder=""
                                    value="<?= set_value('lokasi_jaminan', $survei_lapangan->lokasi_jaminan); ?>">
                                <small class="info help-block">
                                    <b>Input Lokasi Jaminan</b> Max Length : 255.</small>
                            </div>
                        </div>




                        <div class="form-group group-situasi_jaminan  ">
                            <label for="situasi_jaminan" class="col-sm-2 control-label">Situasi Jaminan <i
                                    class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <textarea id="situasi_jaminan" name="situasi_jaminan" rows="10"
                                    cols="80"> <?= set_value('situasi_jaminan', $survei_lapangan->situasi_jaminan); ?></textarea>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>




                        <div class="form-group group-username">
                            <label for="username" class="col-sm-2 control-label">Username </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="username" id="username"
                                    data-placeholder="Select Username">
                                    <option value=""></option>
                                    <?php
                                        $conditions = [
                                            'is_featured' => 1
                                        ];
                                        ?>
                                    <?php foreach (db_get_all_data('aauth_users', $conditions) as $row): ?>
                                    <option <?= $row->username == $survei_lapangan->username ? 'selected' : ''; ?>
                                        value="<?= $row->username ?>"><?= $row->username; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>






                        <div class="form-group group-status_layak  ">
                            <label for="status_layak" class="col-sm-2 control-label">Status Layak </label>
                            <div class="col-sm-6">
                                <div class="col-md-2 padding-left-0">
                                    <label>
                                        <input type="radio" class="flat-red" name="status_layak" id="status_layak"
                                            value="yes"
                                            <?= $survei_lapangan->status_layak == "yes" ? "checked" : ""; ?>>
                                        Yes
                                    </label>
                                </div>
                                <div class="col-md-14">
                                    <label>
                                        <input type="radio" class="flat-red" name="status_layak" id="status_layak"
                                            value="no" <?= $survei_lapangan->status_layak == "no" ? "checked" : ""; ?>>
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

<script src="<?= BASE_ASSET; ?>ckeditor/ckeditor.js"></script>

<script>
$(document).ready(function() {

    "use strict";

    window.event_submit_and_action = '';







    CKEDITOR.replace('situasi_jaminan');
    var situasi_jaminan = CKEDITOR.instances.situasi_jaminan;

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
                    window.location.href = BASE_URL + 'administrator/survei_lapangan';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        $('#situasi_jaminan').val(situasi_jaminan.getData());

        var form_survei_lapangan = $('#form_survei_lapangan');
        var data_post = form_survei_lapangan.serializeArray();
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
                url: form_survei_lapangan.attr('action'),
                type: 'POST',
                dataType: 'json',
                data: data_post,
            })
            .done(function(res) {
                $('form').find('.form-group').removeClass('has-error');
                $('form').find('.error-input').remove();
                $('.steps li').removeClass('error');
                if (res.success) {
                    var id = $('#survei_lapangan_image_galery').find('li').attr('qq-file-id');
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