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
      Slider      <small><?= cclang('detail', ['Slider']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/slider'); ?>">Slider</a></li>
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
                     <h3 class="widget-user-username">Slider</h3>
                     <h5 class="widget-user-desc">Detail Slider</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_slider" id="form_slider" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($slider->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Slideshow </label>
                        <div class="col-sm-8">
                             <?php if (is_image($slider->slideshow)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/slider/' . $slider->slideshow; ?>">
                                <img src="<?= BASE_URL . 'uploads/slider/' . $slider->slideshow; ?>" class="image-responsive" alt="image slider" title="slideshow slider" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= BASE_URL . 'administrator/file/download/slider/' . $slider->slideshow; ?>">
                                 <img src="<?= get_icon_file($slider->slideshow); ?>" class="image-responsive" alt="image slider" title="slideshow <?= $slider->slideshow; ?>" width="40px"> 
                               <?= $slider->slideshow ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                                      
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Text </label>

                        <div class="col-sm-8">
                        <span class="detail_group-text"><?= _ent($slider->text); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('slider_update', function() use ($slider){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit slider (Ctrl+e)" href="<?= site_url('administrator/slider/edit/'.$slider->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Slider']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/slider/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Slider']); ?></a>
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