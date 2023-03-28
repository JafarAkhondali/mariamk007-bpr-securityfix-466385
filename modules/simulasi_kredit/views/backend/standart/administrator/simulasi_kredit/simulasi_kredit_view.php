<script type="text/javascript">
function domo() {
    $('*').bind('keydown', 'Ctrl+e', function() {
        $('#btn_edit').trigger('click');
        return false;
    });

    $('*').bind('keydown', 'Ctrl+x', function() {
        $('#btn_back').trigger('click');
        return false;
    });
}

jQuery(document).ready(domo);
</script>
<section class="content-header">
    <h1>
        Simulasi Kredit <small><?= cclang('detail', ['Simulasi Kredit']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/simulasi_kredit'); ?>">Simulasi Kredit</a></li>
        <li class="active"><?= cclang('detail'); ?></li>
    </ol>
</section>
<section class="content">
    <div class="row">

        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">

                    <div class="box box-widget widget-user-2">
                        <div class="widget-user-header ">
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
                            </div>
                            <h3 class="widget-user-username">Simulasi Kredit</h3>
                            <h5 class="widget-user-desc">Detail Simulasi Kredit</h5>
                            <hr>
                        </div>


                        <div class="form-horizontal form-step" name="form_simulasi_kredit" id="form_simulasi_kredit">

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Id </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-id"><?= _ent($simulasi_kredit->id); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Plafond </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-plafond"><?= _ent($simulasi_kredit->plafond); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Jangkawaktu 12 </label>

                                <div class="col-sm-8">
                                    <span
                                        class="detail_group-jangkawaktu_12"><?= _ent($simulasi_kredit->jangkawaktu_12); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Jangkawaktu 18 </label>

                                <div class="col-sm-8">
                                    <span
                                        class="detail_group-jangkawaktu_18"><?= _ent($simulasi_kredit->jangkawaktu_18); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Jangkawaktu 24 </label>

                                <div class="col-sm-8">
                                    <span
                                        class="detail_group-jangkawaktu_24"><?= _ent($simulasi_kredit->jangkawaktu_24); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Jangkawaktu 30 </label>

                                <div class="col-sm-8">
                                    <span
                                        class="detail_group-jangkawaktu_30"><?= _ent($simulasi_kredit->jangkawaktu_30); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Jangkawaktu 36 </label>

                                <div class="col-sm-8">
                                    <span
                                        class="detail_group-jangkawaktu_36"><?= _ent($simulasi_kredit->jangkawaktu_36); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Jangkawaktu 48 </label>

                                <div class="col-sm-8">
                                    <span
                                        class="detail_group-jangkawaktu_48"><?= _ent($simulasi_kredit->jangkawaktu_48); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Jangkawaktu 60 </label>

                                <div class="col-sm-8">
                                    <span
                                        class="detail_group-jangkawaktu_60"><?= _ent($simulasi_kredit->jangkawaktu_60); ?></span>
                                </div>
                            </div>

                            <br>
                            <br>




                            <div class="view-nav">
                                <?php is_allowed('simulasi_kredit_update', function () use ($simulasi_kredit) { ?>
                                <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back'
                                    title="edit simulasi_kredit (Ctrl+e)"
                                    href="<?= site_url('administrator/simulasi_kredit/edit/' . $simulasi_kredit->id); ?>"><i
                                        class="fa fa-edit"></i> <?= cclang('update', ['Simulasi Kredit']); ?> </a>
                                <?php }) ?>
                                <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)"
                                    href="<?= site_url('administrator/simulasi_kredit/'); ?>"><i class="fa fa-undo"></i>
                                    <?= cclang('go_list_button', ['Simulasi Kredit']); ?></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function() {

    "use strict";


});
</script>