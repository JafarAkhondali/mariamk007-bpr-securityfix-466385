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
        Simulasi Kredit <small>Edit Simulasi Kredit</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class=""><a href="<?= site_url('administrator/simulasi_kredit'); ?>">Simulasi Kredit</a></li>
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
                            <h3 class="widget-user-username">Simulasi Kredit</h3>
                            <h5 class="widget-user-desc">Edit Simulasi Kredit</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/simulasi_kredit/edit_save/'.$this->uri->segment(4)), [
                            'name' => 'form_simulasi_kredit',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_simulasi_kredit',
                            'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>



                        <div class="form-group group-plafond  ">
                            <label for="plafond" class="col-sm-2 control-label">Plafond <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="plafond" id="plafond" placeholder=""
                                    value="<?= set_value('plafond', $simulasi_kredit->plafond); ?>">
                                <small class="info help-block">
                                    <b>Input Plafond</b> Max Length : 100.</small>
                            </div>
                        </div>




                        <div class="form-group group-jangkawaktu_12  ">
                            <label for="jangkawaktu_12" class="col-sm-2 control-label">Jangkawaktu 12 <i
                                    class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="jangkawaktu_12" id="jangkawaktu_12"
                                    placeholder=""
                                    value="<?= set_value('jangkawaktu_12', $simulasi_kredit->jangkawaktu_12); ?>">
                                <small class="info help-block">
                                    <b>Input Jangkawaktu 12</b> Max Length : 100.</small>
                            </div>
                        </div>




                        <div class="form-group group-jangkawaktu_18  ">
                            <label for="jangkawaktu_18" class="col-sm-2 control-label">Jangkawaktu 18 <i
                                    class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="jangkawaktu_18" id="jangkawaktu_18"
                                    placeholder=""
                                    value="<?= set_value('jangkawaktu_18', $simulasi_kredit->jangkawaktu_18); ?>">
                                <small class="info help-block">
                                    <b>Input Jangkawaktu 18</b> Max Length : 100.</small>
                            </div>
                        </div>




                        <div class="form-group group-jangkawaktu_24  ">
                            <label for="jangkawaktu_24" class="col-sm-2 control-label">Jangkawaktu 24 <i
                                    class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="jangkawaktu_24" id="jangkawaktu_24"
                                    placeholder=""
                                    value="<?= set_value('jangkawaktu_24', $simulasi_kredit->jangkawaktu_24); ?>">
                                <small class="info help-block">
                                    <b>Input Jangkawaktu 24</b> Max Length : 100.</small>
                            </div>
                        </div>




                        <div class="form-group group-jangkawaktu_30  ">
                            <label for="jangkawaktu_30" class="col-sm-2 control-label">Jangkawaktu 30 <i
                                    class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="jangkawaktu_30" id="jangkawaktu_30"
                                    placeholder=""
                                    value="<?= set_value('jangkawaktu_30', $simulasi_kredit->jangkawaktu_30); ?>">
                                <small class="info help-block">
                                    <b>Input Jangkawaktu 30</b> Max Length : 100.</small>
                            </div>
                        </div>




                        <div class="form-group group-jangkawaktu_36  ">
                            <label for="jangkawaktu_36" class="col-sm-2 control-label">Jangkawaktu 36 <i
                                    class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="jangkawaktu_36" id="jangkawaktu_36"
                                    placeholder=""
                                    value="<?= set_value('jangkawaktu_36', $simulasi_kredit->jangkawaktu_36); ?>">
                                <small class="info help-block">
                                    <b>Input Jangkawaktu 36</b> Max Length : 100.</small>
                            </div>
                        </div>




                        <div class="form-group group-jangkawaktu_48  ">
                            <label for="jangkawaktu_48" class="col-sm-2 control-label">Jangkawaktu 48 <i
                                    class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="jangkawaktu_48" id="jangkawaktu_48"
                                    placeholder=""
                                    value="<?= set_value('jangkawaktu_48', $simulasi_kredit->jangkawaktu_48); ?>">
                                <small class="info help-block">
                                    <b>Input Jangkawaktu 48</b> Max Length : 100.</small>
                            </div>
                        </div>




                        <div class="form-group group-jangkawaktu_60  ">
                            <label for="jangkawaktu_60" class="col-sm-2 control-label">Jangkawaktu 60 <i
                                    class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="jangkawaktu_60" id="jangkawaktu_60"
                                    placeholder=""
                                    value="<?= set_value('jangkawaktu_60', $simulasi_kredit->jangkawaktu_60); ?>">
                                <small class="info help-block">
                                    <b>Input Jangkawaktu 60</b> Max Length : 100.</small>
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
                    window.location.href = BASE_URL + 'administrator/simulasi_kredit';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();

        var form_simulasi_kredit = $('#form_simulasi_kredit');
        var data_post = form_simulasi_kredit.serializeArray();
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
                url: form_simulasi_kredit.attr('action'),
                type: 'POST',
                dataType: 'json',
                data: data_post,
            })
            .done(function(res) {
                $('form').find('.form-group').removeClass('has-error');
                $('form').find('.error-input').remove();
                $('.steps li').removeClass('error');
                if (res.success) {
                    var id = $('#simulasi_kredit_image_galery').find('li').attr('qq-file-id');
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