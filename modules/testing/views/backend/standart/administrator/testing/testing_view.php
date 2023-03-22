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
      Testing      <small><?= cclang('detail', ['Testing']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/testing'); ?>">Testing</a></li>
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
                     <h3 class="widget-user-username">Testing</h3>
                     <h5 class="widget-user-desc">Detail Testing</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_testing" id="form_testing" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($testing->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Photo 1 </label>
                        <div class="col-sm-8">
                             <?php if (is_image($testing->photo_1)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/testing/' . $testing->photo_1; ?>">
                                <img src="<?= BASE_URL . 'uploads/testing/' . $testing->photo_1; ?>" class="image-responsive" alt="image testing" title="photo_1 testing" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= BASE_URL . 'administrator/file/download/testing/' . $testing->photo_1; ?>">
                                 <img src="<?= get_icon_file($testing->photo_1); ?>" class="image-responsive" alt="image testing" title="photo_1 <?= $testing->photo_1; ?>" width="40px"> 
                               <?= $testing->photo_1 ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                                      
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Photo 2 </label>
                        <div class="col-sm-8">
                             <?php if (is_image($testing->photo_2)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/testing/' . $testing->photo_2; ?>">
                                <img src="<?= BASE_URL . 'uploads/testing/' . $testing->photo_2; ?>" class="image-responsive" alt="image testing" title="photo_2 testing" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= BASE_URL . 'administrator/file/download/testing/' . $testing->photo_2; ?>">
                                 <img src="<?= get_icon_file($testing->photo_2); ?>" class="image-responsive" alt="image testing" title="photo_2 <?= $testing->photo_2; ?>" width="40px"> 
                               <?= $testing->photo_2 ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                                      
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('testing_update', function() use ($testing){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit testing (Ctrl+e)" href="<?= site_url('administrator/testing/edit/'.$testing->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Testing']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/testing/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Testing']); ?></a>
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