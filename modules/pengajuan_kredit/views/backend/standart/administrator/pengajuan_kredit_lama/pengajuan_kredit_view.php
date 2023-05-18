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
        Pengajuan Kredit <small><?= cclang('detail', ['Pengajuan Kredit']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/pengajuan_kredit'); ?>">Pengajuan Kredit</a></li>
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
                            <h3 class="widget-user-username">Pengajuan Kredit</h3>
                            <h5 class="widget-user-desc">Detail Pengajuan Kredit</h5>
                            <hr>
                        </div>


                        <div class="form-horizontal form-step" name="form_pengajuan_kredit" id="form_pengajuan_kredit">

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Id </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-id"><?= _ent($pengajuan_kredit->id); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Nama Lengkap Debitur</label>

                                <div class="col-sm-8">
                                    <span
                                        class="detail_group-nama_lengkap"><?= _ent($pengajuan_kredit->nama_lengkap); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label"> File SKU </label>
                                <div class="col-sm-8">
                                    <?php if (is_image($pengajuan_kredit->file_sku)): ?>
                                    <a class="fancybox" rel="group"
                                        href="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_sku; ?>">
                                        <img src="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_sku; ?>"
                                            class="image-responsive" alt="image pengajuan_kredit"
                                            title="file_sku pengajuan_kredit" width="40px">
                                    </a>
                                    <?php else: ?>
                                    <label>
                                        <a
                                            href="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_sku; ?>">
                                            <img src="<?= get_icon_file($pengajuan_kredit->file_sku); ?>"
                                                class="image-responsive" alt="image pengajuan_kredit"
                                                title="file_sku <?= $pengajuan_kredit->file_sku; ?>" width="40px">
                                            <?= $pengajuan_kredit->file_sku ?>
                                        </a>
                                    </label>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label"> File Surat Keterangan Penghasilan
                                </label>
                                <div class="col-sm-8">
                                    <?php if (is_image($pengajuan_kredit->file_skp)): ?>
                                    <a class="fancybox" rel="group"
                                        href="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_skp; ?>">
                                        <img src="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_skp; ?>"
                                            class="image-responsive" alt="image pengajuan_kredit"
                                            title="file_skp pengajuan_kredit" width="40px">
                                    </a>
                                    <?php else: ?>
                                    <label>
                                        <a
                                            href="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_skp; ?>">
                                            <img src="<?= get_icon_file($pengajuan_kredit->file_skp); ?>"
                                                class="image-responsive" alt="image pengajuan_kredit"
                                                title="file_skp <?= $pengajuan_kredit->file_skp; ?>" width="40px">
                                            <?= $pengajuan_kredit->file_skp ?>
                                        </a>
                                    </label>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label"> File Photo </label>
                                <div class="col-sm-8">
                                    <?php if (is_image($pengajuan_kredit->file_photo)): ?>
                                    <a class="fancybox" rel="group"
                                        href="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_photo; ?>">
                                        <img src="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_photo; ?>"
                                            class="image-responsive" alt="image pengajuan_kredit"
                                            title="file_photo pengajuan_kredit" width="40px">
                                    </a>
                                    <?php else: ?>
                                    <label>
                                        <a
                                            href="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_photo; ?>">
                                            <img src="<?= get_icon_file($pengajuan_kredit->file_photo); ?>"
                                                class="image-responsive" alt="image pengajuan_kredit"
                                                title="file_photo <?= $pengajuan_kredit->file_photo; ?>" width="40px">
                                            <?= $pengajuan_kredit->file_photo ?>
                                        </a>
                                    </label>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label"> File Ktp </label>
                                <div class="col-sm-8">
                                    <?php if (is_image($pengajuan_kredit->file_ktp)): ?>
                                    <a class="fancybox" rel="group"
                                        href="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_ktp; ?>">
                                        <img src="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_ktp; ?>"
                                            class="image-responsive" alt="image pengajuan_kredit"
                                            title="file_ktp pengajuan_kredit" width="40px">
                                    </a>
                                    <?php else: ?>
                                    <label>
                                        <a
                                            href="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_ktp; ?>">
                                            <img src="<?= get_icon_file($pengajuan_kredit->file_ktp); ?>"
                                                class="image-responsive" alt="image pengajuan_kredit"
                                                title="file_ktp <?= $pengajuan_kredit->file_ktp; ?>" width="40px">
                                            <?= $pengajuan_kredit->file_ktp ?>
                                        </a>
                                    </label>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label"> File Ktp Pasangan</label>
                                <div class="col-sm-8">
                                    <?php if (is_image($pengajuan_kredit->file_ktp_istri)): ?>
                                    <a class="fancybox" rel="group"
                                        href="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_ktp_istri; ?>">
                                        <img src="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_ktp_istri; ?>"
                                            class="image-responsive" alt="image pengajuan_kredit"
                                            title="file_ktp_istri pengajuan_kredit" width="40px">
                                    </a>
                                    <?php else: ?>
                                    <label>
                                        <a
                                            href="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_ktp_istri; ?>">
                                            <img src="<?= get_icon_file($pengajuan_kredit->file_ktp_istri); ?>"
                                                class="image-responsive" alt="image pengajuan_kredit"
                                                title="file_ktp_istri <?= $pengajuan_kredit->file_ktp_istri; ?>"
                                                width="40px">
                                            <?= $pengajuan_kredit->file_ktp_istri ?>
                                        </a>
                                    </label>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label"> File KK </label>
                                <div class="col-sm-8">
                                    <?php if (is_image($pengajuan_kredit->file_kk)): ?>
                                    <a class="fancybox" rel="group"
                                        href="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_kk; ?>">
                                        <img src="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_kk; ?>"
                                            class="image-responsive" alt="image pengajuan_kredit"
                                            title="file_kk pengajuan_kredit" width="40px">
                                    </a>
                                    <?php else: ?>
                                    <label>
                                        <a
                                            href="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_kk; ?>">
                                            <img src="<?= get_icon_file($pengajuan_kredit->file_kk); ?>"
                                                class="image-responsive" alt="image pengajuan_kredit"
                                                title="file_kk <?= $pengajuan_kredit->file_kk; ?>" width="40px">
                                            <?= $pengajuan_kredit->file_kk ?>
                                        </a>
                                    </label>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label"> File Surat Nikah </label>
                                <div class="col-sm-8">
                                    <?php if (is_image($pengajuan_kredit->file_surat_nikah)): ?>
                                    <a class="fancybox" rel="group"
                                        href="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_surat_nikah; ?>">
                                        <img src="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_surat_nikah; ?>"
                                            class="image-responsive" alt="image pengajuan_kredit"
                                            title="file_surat_nikah pengajuan_kredit" width="40px">
                                    </a>
                                    <?php else: ?>
                                    <label>
                                        <a
                                            href="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_surat_nikah; ?>">
                                            <img src="<?= get_icon_file($pengajuan_kredit->file_surat_nikah); ?>"
                                                class="image-responsive" alt="image pengajuan_kredit"
                                                title="file_surat_nikah <?= $pengajuan_kredit->file_surat_nikah; ?>"
                                                width="40px">
                                            <?= $pengajuan_kredit->file_surat_nikah ?>
                                        </a>
                                    </label>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label"> File Jaminan </label>
                                <div class="col-sm-8">
                                    <?php if (is_image($pengajuan_kredit->file_jaminan)): ?>
                                    <a class="fancybox" rel="group"
                                        href="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_jaminan; ?>">
                                        <img src="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_jaminan; ?>"
                                            class="image-responsive" alt="image pengajuan_kredit"
                                            title="file_jaminan pengajuan_kredit" width="40px">
                                    </a>
                                    <?php else: ?>
                                    <label>
                                        <a
                                            href="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_jaminan; ?>">
                                            <img src="<?= get_icon_file($pengajuan_kredit->file_jaminan); ?>"
                                                class="image-responsive" alt="image pengajuan_kredit"
                                                title="file_jaminan <?= $pengajuan_kredit->file_jaminan; ?>"
                                                width="40px">
                                            <?= $pengajuan_kredit->file_jaminan ?>
                                        </a>
                                    </label>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label"> File Rekening Listrik </label>
                                <div class="col-sm-8">
                                    <?php if (is_image($pengajuan_kredit->file_rekening_listrik)): ?>
                                    <a class="fancybox" rel="group"
                                        href="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_rekening_listrik; ?>">
                                        <img src="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_rekening_listrik; ?>"
                                            class="image-responsive" alt="image pengajuan_kredit"
                                            title="file_rekening_listrik pengajuan_kredit" width="40px">
                                    </a>
                                    <?php else: ?>
                                    <label>
                                        <a
                                            href="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_rekening_listrik; ?>">
                                            <img src="<?= get_icon_file($pengajuan_kredit->file_rekening_listrik); ?>"
                                                class="image-responsive" alt="image pengajuan_kredit"
                                                title="file_rekening_listrik <?= $pengajuan_kredit->file_rekening_listrik; ?>"
                                                width="40px">
                                            <?= $pengajuan_kredit->file_rekening_listrik ?>
                                        </a>
                                    </label>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label"> File PBB/STNK </label>
                                <div class="col-sm-8">
                                    <?php if (is_image($pengajuan_kredit->file_pbb_stnk)): ?>
                                    <a class="fancybox" rel="group"
                                        href="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_pbb_stnk; ?>">
                                        <img src="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_pbb_stnk; ?>"
                                            class="image-responsive" alt="image pengajuan_kredit"
                                            title="file_pbb_stnk pengajuan_kredit" width="40px">
                                    </a>
                                    <?php else: ?>
                                    <label>
                                        <a
                                            href="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_pbb_stnk; ?>">
                                            <img src="<?= get_icon_file($pengajuan_kredit->file_pbb_stnk); ?>"
                                                class="image-responsive" alt="image pengajuan_kredit"
                                                title="file_pbb_stnk <?= $pengajuan_kredit->file_pbb_stnk; ?>"
                                                width="40px">
                                            <?= $pengajuan_kredit->file_pbb_stnk ?>
                                        </a>
                                    </label>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">No Hp </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-no_hp"><?= _ent($pengajuan_kredit->no_hp); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Jumlah Pinjaman </label>

                                <div class="col-sm-8">
                                    <span
                                        class="detail_group-jumlah_pinjaman"><?= _ent($pengajuan_kredit->jumlah_pinjaman); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Jangka Waktu </label>

                                <div class="col-sm-8">
                                    <span
                                        class="detail_group-jangka_waktu"><?= _ent($pengajuan_kredit->jangka_waktu); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Jenis Pinjaman </label>

                                <div class="col-sm-8">
                                    <span
                                        class="detail_group-jenis_pinjaman"><?= _ent($pengajuan_kredit->jenis_pinjaman); ?></span>
                                </div>
                            </div>

                            <!-- <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Jaminan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-jaminan"><?= _ent($pengajuan_kredit->jaminan); ?></span>
                        </div>
                    </div> -->

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Created At </label>

                                <div class="col-sm-8">
                                    <span
                                        class="detail_group-created_at"><?= _ent($pengajuan_kredit->created_at); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Updated At </label>

                                <div class="col-sm-8">
                                    <span
                                        class="detail_group-updated_at"><?= _ent($pengajuan_kredit->updated_at); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Updated By </label>

                                <div class="col-sm-8">
                                    <span
                                        class="detail_group-updated_by"><?= _ent($pengajuan_kredit->updated_by); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Status </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-status"><?= _ent($pengajuan_kredit->status); ?></span>
                                </div>
                            </div>

                            <br>
                            <br>




                            <div class="view-nav">
                                <?php is_allowed('pengajuan_kredit_update', function() use ($pengajuan_kredit){?>
                                <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back'
                                    title="edit pengajuan_kredit (Ctrl+e)"
                                    href="<?= site_url('administrator/pengajuan_kredit/edit/'.$pengajuan_kredit->id); ?>"><i
                                        class="fa fa-edit"></i> <?= cclang('update', ['Pengajuan Kredit']); ?> </a>
                                <?php }) ?>
                                <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)"
                                    href="<?= site_url('administrator/pengajuan_kredit/'); ?>"><i
                                        class="fa fa-undo"></i>
                                    <?= cclang('go_list_button', ['Pengajuan Kredit']); ?></a>
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