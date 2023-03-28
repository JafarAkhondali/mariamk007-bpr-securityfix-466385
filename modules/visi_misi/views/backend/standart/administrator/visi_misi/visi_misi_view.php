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
        Visi Misi <small><?= cclang('detail', ['Visi Misi']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class=""><a href="<?= site_url('administrator/visi_misi'); ?>">Visi Misi</a></li>
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
                            <h3 class="widget-user-username">Visi Misi</h3>
                            <h5 class="widget-user-desc">Detail Visi Misi</h5>
                            <hr>
                        </div>


                        <div class="form-horizontal form-step" name="form_visi_misi" id="form_visi_misi">

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Id </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-id"><?= _ent($visi_misi->id); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Icon </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-icon"><?= _ent($visi_misi->icon); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Judul </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-title"><?= _ent($visi_misi->title); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Deskripsi</label>

                                <div class="col-sm-8">
                                    <span class="detail_group-deskripsi"><?= _ent($visi_misi->deskripsi); ?></span>
                                </div>
                            </div>

                            <br>
                            <br>




                            <div class="view-nav">
                                <?php is_allowed('sejarah_perusahaan_update', function() use ($visi_misi){?>
                                <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back'
                                    title="edit visi_misi (Ctrl+e)"
                                    href="<?= site_url('administrator/visi_misi/edit/'.$visi_misi->id); ?>"><i
                                        class="fa fa-edit"></i> <?= cclang('update', ['Visi Misi']); ?> </a>
                                <?php }) ?>
                                <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)"
                                    href="<?= site_url('administrator/visi_misi/'); ?>"><i class="fa fa-undo"></i>
                                    <?= cclang('go_list_button', ['Visi Misi']); ?></a>
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