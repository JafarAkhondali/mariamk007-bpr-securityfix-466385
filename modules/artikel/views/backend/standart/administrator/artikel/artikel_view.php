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
      Artikel      <small><?= cclang('detail', ['Artikel']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/artikel'); ?>">Artikel</a></li>
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
                     <h3 class="widget-user-username">Artikel</h3>
                     <h5 class="widget-user-desc">Detail Artikel</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_artikel" id="form_artikel" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($artikel->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Judul Artikel </label>

                        <div class="col-sm-8">
                        <span class="detail_group-judul_artikel"><?= _ent($artikel->judul_artikel); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Deskripsi Artikel </label>

                        <div class="col-sm-8">
                        <span class="detail_group-deskripsi_artikel"><?= _ent($artikel->deskripsi_artikel); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Isi Artikel </label>

                        <div class="col-sm-8">
                        <span class="detail_group-isi_artikel"><?= _ent($artikel->isi_artikel); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Photo </label>
                        <div class="col-sm-8">
                             <?php if (is_image($artikel->photo)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/artikel/' . $artikel->photo; ?>">
                                <img src="<?= BASE_URL . 'uploads/artikel/' . $artikel->photo; ?>" class="image-responsive" alt="image artikel" title="photo artikel" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= BASE_URL . 'administrator/file/download/artikel/' . $artikel->photo; ?>">
                                 <img src="<?= get_icon_file($artikel->photo); ?>" class="image-responsive" alt="image artikel" title="photo <?= $artikel->photo; ?>" width="40px"> 
                               <?= $artikel->photo ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                                      
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('artikel_update', function() use ($artikel){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit artikel (Ctrl+e)" href="<?= site_url('administrator/artikel/edit/'.$artikel->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Artikel']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/artikel/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Artikel']); ?></a>
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