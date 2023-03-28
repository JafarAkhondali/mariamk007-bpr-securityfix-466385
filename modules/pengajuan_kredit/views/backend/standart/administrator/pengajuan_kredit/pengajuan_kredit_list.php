<script type="text/javascript">
function domo() {

    $('*').bind('keydown', 'Ctrl+a', function() {
        window.location.href = BASE_URL + '/administrator/Pengajuan_kredit/add';
        return false;
    });

    $('*').bind('keydown', 'Ctrl+f', function() {
        $('#sbtn').trigger('click');
        return false;
    });

    $('*').bind('keydown', 'Ctrl+x', function() {
        $('#reset').trigger('click');
        return false;
    });

    $('*').bind('keydown', 'Ctrl+b', function() {

        $('#reset').trigger('click');
        return false;
    });
}

jQuery(document).ready(domo);
</script>
<section class="content-header">
    <h1>
        <?= cclang('pengajuan_kredit') ?><small><?= cclang('list_all'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= cclang('pengajuan_kredit') ?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <div class="box box-widget widget-user-2">
                        <div class="widget-user-header ">
                            <div class="row pull-right">
                                <?php is_allowed('pengajuan_kredit_add', function(){?>
                                <!-- <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('pengajuan_kredit')]); ?>  (Ctrl+a)" href="<?=  site_url('administrator/pengajuan_kredit/add'); ?>"><i class="fa fa-plus-square-o" ></i> <?= cclang('add_new_button', [cclang('pengajuan_kredit')]); ?></a> -->
                                <?php }) ?>
                                <!-- <?php is_allowed('pengajuan_kredit_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('pengajuan_kredit') ?> " href="<?= site_url('administrator/pengajuan_kredit/export?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>"><i class="fa fa-file-excel-o" ></i> <?= cclang('export'); ?> XLS</a>
                        <?php }) ?> -->
                                <!-- <?php is_allowed('pengajuan_kredit_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> pdf <?= cclang('pengajuan_kredit') ?> " href="<?= site_url('administrator/pengajuan_kredit/export_pdf?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>"><i class="fa fa-file-pdf-o" ></i> <?= cclang('export'); ?> PDF</a>
                        <?php }) ?> -->
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username"><?= cclang('pengajuan_kredit') ?></h3>
                            <h5 class="widget-user-desc"><?= cclang('list_all', [cclang('pengajuan_kredit')]); ?> <i
                                    class="label bg-yellow"><?= $pengajuan_kredit_counts; ?> <?= cclang('items'); ?></i>
                            </h5>
                        </div>

                        <form name="form_pengajuan_kredit" id="form_pengajuan_kredit"
                            action="<?= base_url('administrator/pengajuan_kredit/index'); ?>">



                            <!-- /.widget-user -->
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="col-sm-2 padd-left-0 ">
                                        <select type="text" class="form-control chosen chosen-select" name="bulk"
                                            id="bulk" placeholder="Site Email">
                                            <option value="delete">Delete</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2 padd-left-0 ">
                                        <button type="button" class="btn btn-flat" name="apply" id="apply"
                                            title="<?= cclang('apply_bulk_action'); ?>"><?= cclang('apply_button'); ?></button>
                                    </div>
                                    <div class="col-sm-3 padd-left-0  ">
                                        <input type="text" class="form-control" name="q" id="filter"
                                            placeholder="<?= cclang('filter'); ?>"
                                            value="<?= $this->input->get('q'); ?>">
                                    </div>
                                    <div class="col-sm-3 padd-left-0 ">
                                        <select type="text" class="form-control chosen chosen-select" name="f"
                                            id="field">
                                            <option value=""><?= cclang('all'); ?></option>
                                            <option <?= $this->input->get('f') == 'nama_lengkap' ? 'selected' :''; ?>
                                                value="nama_lengkap">Nama Lengkap</option>
                                            <option <?= $this->input->get('f') == 'file_ktp' ? 'selected' :''; ?>
                                                value="file_ktp">File Ktp</option>
                                            <option <?= $this->input->get('f') == 'no_hp' ? 'selected' :''; ?>
                                                value="no_hp">No Hp</option>
                                            <option <?= $this->input->get('f') == 'jumlah_pinjaman' ? 'selected' :''; ?>
                                                value="jumlah_pinjaman">Jumlah Pinjaman</option>
                                            <option <?= $this->input->get('f') == 'jangka_waktu' ? 'selected' :''; ?>
                                                value="jangka_waktu">Jangka Waktu</option>
                                            <option <?= $this->input->get('f') == 'jenis_pinjaman' ? 'selected' :''; ?>
                                                value="jenis_pinjaman">Jenis Pinjaman</option>
                                            <option <?= $this->input->get('f') == 'jaminan' ? 'selected' :''; ?>
                                                value="jaminan">Jaminan</option>
                                            <option <?= $this->input->get('f') == 'created_at' ? 'selected' :''; ?>
                                                value="created_at">Created At</option>
                                            <option <?= $this->input->get('f') == 'updated_at' ? 'selected' :''; ?>
                                                value="updated_at">Updated At</option>
                                            <option <?= $this->input->get('f') == 'updated_by' ? 'selected' :''; ?>
                                                value="updated_by">Updated By</option>
                                            <option <?= $this->input->get('f') == 'status' ? 'selected' :''; ?>
                                                value="status">Status</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-1 padd-left-0 ">
                                        <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply"
                                            title="<?= cclang('filter_search'); ?>">
                                            Filter
                                        </button>
                                    </div>
                                    <div class="col-sm-1 padd-left-0 ">
                                        <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply"
                                            href="<?= base_url('administrator/pengajuan_kredit');?>"
                                            title="<?= cclang('reset_filter'); ?>">
                                            <i class="fa fa-undo"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="dataTables_paginate paging_simple_numbers pull-right"
                                        id="example2_paginate">
                                        <?= $pagination; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">

                                <br>
                                <table class="table table-bordered table-striped dataTable">
                                    <thead>
                                        <tr class="">
                                            <th>
                                                <input type="checkbox" class="flat-red toltip" id="check_all"
                                                    name="check_all" title="check all">
                                            </th>
                                            <th data-field="nama_lengkap" data-sort="1" data-primary-key="0">
                                                <?= cclang('nama_lengkap') ?></th>
                                            <!-- <th data-field="file_ktp"data-sort="0" data-primary-key="0"> <?= cclang('file_ktp') ?></th> -->
                                            <th data-field="no_hp" data-sort="1" data-primary-key="0">
                                                <?= cclang('no_hp') ?></th>
                                            <th data-field="jumlah_pinjaman" data-sort="1" data-primary-key="0">
                                                <?= cclang('jumlah_pinjaman') ?></th>
                                            <th data-field="jangka_waktu" data-sort="1" data-primary-key="0">
                                                <?= cclang('jangka_waktu') ?></th>
                                            <th data-field="jenis_pinjaman" data-sort="1" data-primary-key="0">
                                                <?= cclang('jenis_pinjaman') ?></th>
                                            <!-- <th data-field="jaminan"data-sort="1" data-primary-key="0"> <?= cclang('jaminan') ?></th> -->
                                            <th data-field="created_at" data-sort="1" data-primary-key="0">
                                                <?= cclang('created_at') ?></th>
                                            <th data-field="updated_at" data-sort="1" data-primary-key="0">
                                                <?= cclang('updated_at') ?></th>
                                            <th data-field="updated_by" data-sort="1" data-primary-key="0">
                                                <?= cclang('updated_by') ?></th>
                                            <th data-field="status" data-sort="1" data-primary-key="0">
                                                <?= cclang('status') ?></th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_pengajuan_kredit">
                                        <?php foreach($pengajuan_kredits as $pengajuan_kredit): ?>
                                        <tr>
                                            <td width="5">
                                                <input type="checkbox" class="flat-red check" name="id[]"
                                                    value="<?= $pengajuan_kredit->id; ?>">
                                            </td>

                                            <td><span
                                                    class="list_group-nama_lengkap"><?= _ent($pengajuan_kredit->nama_lengkap); ?></span>
                                            </td>
                                            <!-- <td>
                              <?php if (!empty($pengajuan_kredit->file_ktp)): ?>
                                <?php if (is_image($pengajuan_kredit->file_ktp)): ?>
                                <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_ktp; ?>">
                                  <img src="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_ktp; ?>" class="image-responsive" alt="image pengajuan_kredit" title="file_ktp pengajuan_kredit" width="40px">
                                </a>
                                <?php else: ?>
                                  <a href="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_ktp; ?>" target="blank">
                                   <img src="<?= get_icon_file($pengajuan_kredit->file_ktp); ?>" class="image-responsive image-icon" alt="image pengajuan_kredit" title="file_ktp <?= $pengajuan_kredit->file_ktp; ?>" width="40px"> 
                                 </a>
                                <?php endif; ?>
                              <?php endif; ?>
                           </td> -->

                                            <td><span
                                                    class="list_group-no_hp"><?= _ent($pengajuan_kredit->no_hp); ?></span>
                                            </td>
                                            <td><span
                                                    class="list_group-jumlah_pinjaman"><?= number_format($pengajuan_kredit->jumlah_pinjaman, 0, '.', '.') ?></span>
                                            </td>
                                            <td><span
                                                    class="list_group-jangka_waktu"><?= _ent($pengajuan_kredit->jangka_waktu); ?></span>
                                            </td>
                                            <td><span
                                                    class="list_group-jenis_pinjaman"><?= _ent($pengajuan_kredit->jenis_pinjaman); ?></span>
                                            </td>
                                            <!-- <td><span class="list_group-jaminan"><?= _ent($pengajuan_kredit->jaminan); ?></span></td>  -->
                                            <td><span
                                                    class="list_group-created_at"><?= _ent($pengajuan_kredit->created_at); ?></span>
                                            </td>
                                            <td><span
                                                    class="list_group-updated_at"><?= _ent($pengajuan_kredit->updated_at); ?></span>
                                            </td>
                                            <td><span
                                                    class="list_group-updated_by"><?= _ent($pengajuan_kredit->updated_by); ?></span>
                                            </td>
                                            <td><span
                                                    class="list_group-status"><?= _ent($pengajuan_kredit->status); ?></span>
                                            </td>
                                            <td width="200">

                                                <?php is_allowed('pengajuan_kredit_view', function() use ($pengajuan_kredit){?>
                                                <a href="<?= site_url('administrator/pengajuan_kredit/view/' . $pengajuan_kredit->id); ?>"
                                                    class="label-default"><i class="fa fa-newspaper-o"></i>
                                                    <?= cclang('view_button'); ?>
                                                    <?php }) ?>
                                                    <?php is_allowed('pengajuan_kredit_update', function() use ($pengajuan_kredit){?>
                                                    <a href="<?= site_url('administrator/pengajuan_kredit/edit/' . $pengajuan_kredit->id); ?>"
                                                        class="label-default"><i class="fa fa-edit "></i>
                                                        <?= cclang('update_button'); ?></a>
                                                    <?php }) ?>
                                                    <?php is_allowed('pengajuan_kredit_delete', function() use ($pengajuan_kredit){?>
                                                    <a href="javascript:void(0);"
                                                        data-href="<?= site_url('administrator/pengajuan_kredit/delete/' . $pengajuan_kredit->id); ?>"
                                                        class="label-default remove-data"><i class="fa fa-close"></i>
                                                        <?= cclang('remove_button'); ?></a>
                                                    <?php }) ?>

                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php if ($pengajuan_kredit_counts == 0) :?>
                                        <tr>
                                            <td colspan="100">
                                                Pengajuan Kredit data is not available
                                            </td>
                                        </tr>
                                        <?php endif; ?>

                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <hr>

                </div>
                </form>
            </div>
        </div>
    </div>
</section>


<script>
$(document).ready(function() {

    "use strict";



    $('.remove-data').click(function() {

        var url = $(this).attr('data-href');

        swal({
                title: "<?= cclang('are_you_sure'); ?>",
                text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
                cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    document.location.href = url;
                }
            });

        return false;
    });


    $('#apply').click(function() {

        var bulk = $('#bulk');
        var serialize_bulk = $('#form_pengajuan_kredit').serialize();

        if (bulk.val() == 'delete') {
            swal({
                    title: "<?= cclang('are_you_sure'); ?>",
                    text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
                    cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(isConfirm) {
                    if (isConfirm) {
                        document.location.href = BASE_URL +
                            '/administrator/pengajuan_kredit/delete?' + serialize_bulk;
                    }
                });

            return false;

        } else if (bulk.val() == '') {
            swal({
                title: "Upss",
                text: "<?= cclang('please_choose_bulk_action_first'); ?>",
                type: "warning",
                showCancelButton: false,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Okay!",
                closeOnConfirm: true,
                closeOnCancel: true
            });

            return false;
        }

        return false;

    }); /*end appliy click*/


    //check all
    var checkAll = $('#check_all');
    var checkboxes = $('input.check');

    checkAll.on('ifChecked ifUnchecked', function(event) {
        if (event.type == 'ifChecked') {
            checkboxes.iCheck('check');
        } else {
            checkboxes.iCheck('uncheck');
        }
    });

    checkboxes.on('ifChanged', function(event) {
        if (checkboxes.filter(':checked').length == checkboxes.length) {
            checkAll.prop('checked', 'checked');
        } else {
            checkAll.removeProp('checked');
        }
        checkAll.iCheck('update');
    });
    initSortable('pengajuan_kredit', $('table.dataTable'));
}); /*end doc ready*/
</script>