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
        <?php
    function rupiah($angka)
    {
      if ($angka != "") {
        $angkafix = $angka;
      } else {
        $angkafix = 0;
      }
      $hasilrupiah = "Rp " . number_format($angkafix, 2, ',', '.');
      return $hasilrupiah;
    }
    ?>
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
                            <div class="card"
                                style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);padding-top:15px;padding-bottom:15px">
                                <div class="card-body" style="margin:15px">
                                    <h4 style="margin-bottom: 15px;">Biodata</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td width="20%">Id</td>
                                                    <td><?= _ent($pengajuan_kredit->id); ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Nama</td>
                                                    <td><?= $pengajuan_kredit->nama_lengkap; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Alamat</td>
                                                    <td><?= $pengajuan_kredit->alamat; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">No. HP</td>
                                                    <td><?= $pengajuan_kredit->no_hp; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Usia</td>
                                                    <td><?= $pengajuan_kredit->usia; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Jangka Waktu</td>
                                                    <td><?= $pengajuan_kredit->jangka_waktu; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Jumlah Pinjaman</td>
                                                    <td><?= rupiah($pengajuan_kredit->jumlah_pinjaman); ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Jenis Pinjaman</td>
                                                    <td><?= $pengajuan_kredit->jenis_pinjaman; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Created At</td>
                                                    <td><?= $pengajuan_kredit->created_at; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Updated By</td>
                                                    <td><?= $pengajuan_kredit->updated_at; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Status</td>
                                                    <td><?= $pengajuan_kredit->status; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="card"
                                style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);padding-top:15px;padding-bottom:15px">
                                <div class="card-body" style="margin:15px">
                                    <h4 style="margin-bottom: 15px;">Berkas Persyaratan</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <?php
                      if ($pengajuan_kredit->jenis_pinjaman == "Kredit Modal Kerja") { ?>
                                            <tbody>
                                                <tr>
                                                    <td width="40%">Pas Foto 3x4 (PNG/JPG/JPEG)</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_photo) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">Foto KTP (PNG/JPG/JPEG)</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_ktp) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">Foto Keluarga (PNG/JPG/JPEG)</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_kk) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">Foto Surat Nikah/Cerai/Kematian PDF</td>
                                                    <td>
                                                        <?php
                            if ($pengajuan_kredit->file_surat_nikah != "") { ?>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_surat_nikah) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <!-- <tr>
                                                    <td width="40%">Foto Surat nikah/cerai/kematian PDF</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_surat_nikah) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr> -->
                                                <tr>
                                                    <td width="40%">Foto Jaminan/Agunan (PNG/JPG/JPEG)</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->jaminan) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">File Jaminan/Agunan (SHM/SHGB/SKGR/BPKB)</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_jaminan) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <?php } ?>
                                            <?php
                      if ($pengajuan_kredit->jenis_pinjaman == "Kredit Investasi") { ?>
                                            <tbody>
                                                <tr>
                                                    <td width="40%">Pas Foto 3x4 (PNG/JPG/JPEG)</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_photo) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">Foto KTP (PNG/JPG/JPEG)</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_ktp) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">Foto Keluarga (PNG/JPG/JPEG)</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_kk) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">Foto Surat Nikah/Cerai/Kematian PDF</td>
                                                    <td>
                                                        <?php
                            if ($pengajuan_kredit->file_surat_nikah != "") { ?>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_surat_nikah) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <!-- <tr>
                                                    <td width="40%">Foto Surat nikah/cerai/kematian PDF</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_surat_nikah) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr> -->
                                                <tr>
                                                    <td width="40%">Foto Jaminan/Agunan (PNG/JPG/JPEG)</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->jaminan) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">File Jaminan/Agunan (SHM/SHGB/SKGR/BPKB)</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_jaminan) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">File Surat Keterangan Usaha (Bagi yang ada usaha)
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_sku) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">File Surat Keterangan Penghasilan (Karyawan) (pdf)
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_skp) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <?php } ?>
                                            <?php
                      if ($pengajuan_kredit->jenis_pinjaman == "Kredit Konsumtif") { ?>
                                            <tbody>
                                                <tr>
                                                    <td width="40%">Pas Foto 3x4 (PNG/JPG/JPEG)</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_photo) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">Foto KTP (PNG/JPG/JPEG)</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_ktp) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">Foto Keluarga (PNG/JPG/JPEG)</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_kk) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">Foto Surat Nikah/Cerai/Kematian PDF</td>
                                                    <td>
                                                        <?php
                            if ($pengajuan_kredit->file_surat_nikah != "") { ?>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_surat_nikah) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <!-- <tr>
                                                    <td width="40%">Foto Surat nikah/cerai/kematian PDF</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_surat_nikah) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr> -->
                                                <tr>
                                                    <td width="40%">Foto Jaminan/Agunan (PNG/JPG/JPEG)</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->jaminan) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">File Jaminan/Agunan (SHM/SHGB/SKGR/BPKB)</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_jaminan) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">File Bukti Penghasilan (pdf)</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_buktipenghasilan) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <?php } ?>
                                            <?php
                      if ($pengajuan_kredit->jenis_pinjaman == "Kredit Kartama") { ?>
                                            <tbody>
                                                <tr>
                                                    <td width="40%">Pas Foto 3x4 (PNG/JPG/JPEG)</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_photo) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">Foto KTP (PNG/JPG/JPEG)</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_ktp) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">Foto Keluarga (PNG/JPG/JPEG)</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_kk) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">Foto Surat Nikah/Cerai/Kematian PDF</td>
                                                    <td>
                                                        <?php
                            if ($pengajuan_kredit->file_surat_nikah != "") { ?>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_surat_nikah) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <!-- <tr>
                                                    <td width="40%">Foto Surat nikah/cerai/kematian PDF</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_surat_nikah) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr> -->
                                                <tr>
                                                    <td width="40%">Foto Jaminan/Agunan (PNG/JPG/JPEG)</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->jaminan) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">File Jaminan/Agunan (SHM/SHGB/SKGR/BPKB)</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_jaminan) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">File Bukti Penghasilan (pdf)</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_buktipenghasilan) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">File Slip Gaji 3 Bulan Terakhir (pdf)</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_slipgaji) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="card"
                                style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);padding-top:15px;padding-bottom:15px">
                                <div class="card-body" style="margin:15px">
                                    <h4 style="margin-bottom: 15px;">Berkas Dokumen Pelengkap</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td width="40%">File Rekening Listrik (Pdf)</td>
                                                    <td>
                                                        <?php
                            if ($pengajuan_kredit->file_rekening_listrik != "") { ?>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_rekening_listrik) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">File PBB / STNK (Pdf)</td>
                                                    <td>
                                                        <?php
                            if ($pengajuan_kredit->file_pbb_stnk != "") { ?>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_pbb_stnk) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">File Laporan Keuangan PT/CV 6 Bulan Terakhir Bagi
                                                        yang punya PT/CV (Pdf)</td>
                                                    <td>
                                                        <?php
                            if ($pengajuan_kredit->file_laporankeuangan != "") { ?>
                                                        <a class="btn btn-primary"
                                                            href="<?= base_url('uploads/pengajuan_kredit/' . $pengajuan_kredit->file_laporankeuangan) ?>"
                                                            target="_blank"><i class="fa fa-download"></i> Buka File</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>




                            <div class="view-nav">
                                <?php is_allowed('pengajuan_kredit_update', function () use ($pengajuan_kredit) { ?>
                                <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back'
                                    title="edit pengajuan_kredit (Ctrl+e)"
                                    href="<?= site_url('administrator/pengajuan_kredit/edit/' . $pengajuan_kredit->id); ?>"><i
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