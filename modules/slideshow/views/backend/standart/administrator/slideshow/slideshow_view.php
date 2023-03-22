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
      Slideshow      <small><?= cclang('detail', ['Slideshow']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/slideshow'); ?>">Slideshow</a></li>
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
                     <h3 class="widget-user-username">Slideshow</h3>
                     <h5 class="widget-user-desc">Detail Slideshow</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_slideshow" id="form_slideshow" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($slideshow->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Photo </label>
                        <div class="col-sm-8">
                             <?php if (is_image($slideshow->photo)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/slideshow/' . $slideshow->photo; ?>">
                                <img src="<?= BASE_URL . 'uploads/slideshow/' . $slideshow->photo; ?>" class="image-responsive" alt="image slideshow" title="photo slideshow" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= BASE_URL . 'administrator/file/download/slideshow/' . $slideshow->photo; ?>">
                                 <img src="<?= get_icon_file($slideshow->photo); ?>" class="image-responsive" alt="image slideshow" title="photo <?= $slideshow->photo; ?>" width="40px"> 
                               <?= $slideshow->photo ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                                      
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('slideshow_update', function() use ($slideshow){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit slideshow (Ctrl+e)" href="<?= site_url('administrator/slideshow/edit/'.$slideshow->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Slideshow']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/slideshow/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Slideshow']); ?></a>
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