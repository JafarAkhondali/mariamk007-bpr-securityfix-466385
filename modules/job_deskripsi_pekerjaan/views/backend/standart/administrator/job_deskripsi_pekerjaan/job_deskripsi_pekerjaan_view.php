<script type="text/javascript">
function domo(){
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
      Job Deskripsi Pekerjaan      <small><?= cclang('detail', ['Job Deskripsi Pekerjaan']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/job_deskripsi_pekerjaan'); ?>">Job Deskripsi Pekerjaan</a></li>
      <li class="active"><?= cclang('detail'); ?></li>
   </ol>
</section>
<section class="content">
   <div class="row" >
     
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">

               <div class="box box-widget widget-user-2">
                  <div class="widget-user-header ">
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
                     </div>
                     <h3 class="widget-user-username">Job Deskripsi Pekerjaan</h3>
                     <h5 class="widget-user-desc">Detail Job Deskripsi Pekerjaan</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_job_deskripsi_pekerjaan" id="form_job_deskripsi_pekerjaan" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($job_deskripsi_pekerjaan->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Nama Department </label>

                        <div class="col-sm-8">
                        <span class="detail_group-nama_department"><?= _ent($job_deskripsi_pekerjaan->nama_department); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Deskripsi Pekerjaan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-deskripsi_pekerjaan"><?= _ent($job_deskripsi_pekerjaan->deskripsi_pekerjaan); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('job_deskripsi_pekerjaan_update', function() use ($job_deskripsi_pekerjaan){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit job_deskripsi_pekerjaan (Ctrl+e)" href="<?= site_url('administrator/job_deskripsi_pekerjaan/edit/'.$job_deskripsi_pekerjaan->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Job Deskripsi Pekerjaan']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/job_deskripsi_pekerjaan/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Job Deskripsi Pekerjaan']); ?></a>
                     </div>
                    
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<script>
$(document).ready(function(){

    "use strict";
    
   
   });
</script>