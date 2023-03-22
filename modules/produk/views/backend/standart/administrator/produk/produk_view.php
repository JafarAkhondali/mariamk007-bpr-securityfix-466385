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
      Produk      <small><?= cclang('detail', ['Produk']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/produk'); ?>">Produk</a></li>
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
                     <h3 class="widget-user-username">Produk</h3>
                     <h5 class="widget-user-desc">Detail Produk</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_produk" id="form_produk" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($produk->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Nama Produk </label>

                        <div class="col-sm-8">
                        <span class="detail_group-nama_produk"><?= _ent($produk->nama_produk); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Deskripsi Produk </label>

                        <div class="col-sm-8">
                        <span class="detail_group-deskripsi_produk"><?= _ent($produk->deskripsi_produk); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Photo </label>
                        <div class="col-sm-8">
                             <?php if (is_image($produk->photo)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/produk/' . $produk->photo; ?>">
                                <img src="<?= BASE_URL . 'uploads/produk/' . $produk->photo; ?>" class="image-responsive" alt="image produk" title="photo produk" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= BASE_URL . 'administrator/file/download/produk/' . $produk->photo; ?>">
                                 <img src="<?= get_icon_file($produk->photo); ?>" class="image-responsive" alt="image produk" title="photo <?= $produk->photo; ?>" width="40px"> 
                               <?= $produk->photo ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                         
                    <div class="view-nav">
                        <?php is_allowed('produk_update', function() use ($produk){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit produk (Ctrl+e)" href="<?= site_url('administrator/produk/edit/'.$produk->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Produk']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/produk/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Produk']); ?></a>
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