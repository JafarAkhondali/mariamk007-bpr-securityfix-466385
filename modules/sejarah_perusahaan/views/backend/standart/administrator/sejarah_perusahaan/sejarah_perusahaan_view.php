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
      Sejarah Perusahaan      <small><?= cclang('detail', ['Sejarah Perusahaan']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/sejarah_perusahaan'); ?>">Sejarah Perusahaan</a></li>
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
                     <h3 class="widget-user-username">Sejarah Perusahaan</h3>
                     <h5 class="widget-user-desc">Detail Sejarah Perusahaan</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_sejarah_perusahaan" id="form_sejarah_perusahaan" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($sejarah_perusahaan->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Date </label>

                        <div class="col-sm-8">
                        <span class="detail_group-date"><?= _ent($sejarah_perusahaan->date); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Judul Sejarah </label>

                        <div class="col-sm-8">
                        <span class="detail_group-judul_sejarah"><?= _ent($sejarah_perusahaan->judul_sejarah); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Deskripsi Sejarah </label>

                        <div class="col-sm-8">
                        <span class="detail_group-deskripsi_sejarah"><?= _ent($sejarah_perusahaan->deskripsi_sejarah); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('sejarah_perusahaan_update', function() use ($sejarah_perusahaan){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit sejarah_perusahaan (Ctrl+e)" href="<?= site_url('administrator/sejarah_perusahaan/edit/'.$sejarah_perusahaan->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Sejarah Perusahaan']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/sejarah_perusahaan/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Sejarah Perusahaan']); ?></a>
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