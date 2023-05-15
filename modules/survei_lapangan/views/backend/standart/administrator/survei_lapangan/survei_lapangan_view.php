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
        Survei Lapangan <small><?= cclang('detail', ['Survei Lapangan']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/survei_lapangan'); ?>">Survei Lapangan</a></li>
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
                            <h3 class="widget-user-username">Survei Lapangan</h3>
                            <h5 class="widget-user-desc">Detail Survei Lapangan</h5>
                            <hr>
                        </div>


                        <div class="form-horizontal form-step" name="form_survei_lapangan" id="form_survei_lapangan">

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Id </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-id"><?= _ent($survei_lapangan->id); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Jaminan Kredit </label>

                                <div class="col-sm-8">
                                    <span
                                        class="detail_group-jaminan_kredit"><?= _ent($survei_lapangan->jaminan_kredit); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Lokasi Jaminan </label>

                                <div class="col-sm-8">
                                    <span
                                        class="detail_group-lokasi_jaminan"><?= _ent($survei_lapangan->lokasi_jaminan); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Deskripsi Jaminan </label>

                                <div class="col-sm-8">
                                    <span
                                        class="detail_group-situasi_jaminan"><?= _ent($survei_lapangan->situasi_jaminan); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Username </label>

                                <div class="col-sm-8">
                                    <?= _ent($survei_lapangan->artikel_judul_artikel); ?>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Status Layak </label>

                                <div class="col-sm-8">
                                    <span
                                        class="detail_group-status_layak"><?= _ent($survei_lapangan->status_layak); ?></span>
                                </div>
                            </div>

                            <br>
                            <br>




                            <div class="view-nav">
                                <?php is_allowed('survei_lapangan_update', function() use ($survei_lapangan){?>
                                <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back'
                                    title="edit survei_lapangan (Ctrl+e)"
                                    href="<?= site_url('administrator/survei_lapangan/edit/'.$survei_lapangan->id); ?>"><i
                                        class="fa fa-edit"></i> <?= cclang('update', ['Survei Lapangan']); ?> </a>
                                <?php }) ?>
                                <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)"
                                    href="<?= site_url('administrator/survei_lapangan/'); ?>"><i class="fa fa-undo"></i>
                                    <?= cclang('go_list_button', ['Survei Lapangan']); ?></a>
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