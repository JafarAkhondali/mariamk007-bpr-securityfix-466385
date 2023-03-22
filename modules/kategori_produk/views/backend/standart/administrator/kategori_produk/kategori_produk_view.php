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
      Kategori Produk      <small><?= cclang('detail', ['Kategori Produk']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/kategori_produk'); ?>">Kategori Produk</a></li>
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
                     <h3 class="widget-user-username">Kategori Produk</h3>
                     <h5 class="widget-user-desc">Detail Kategori Produk</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_kategori_produk" id="form_kategori_produk" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($kategori_produk->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Nama Kategori </label>

                        <div class="col-sm-8">
                        <span class="detail_group-nama_kategori"><?= _ent($kategori_produk->nama_kategori); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Photo </label>
                        <div class="col-sm-8">
                             <?php if (is_image($kategori_produk->photo)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/kategori_produk/' . $kategori_produk->photo; ?>">
                                <img src="<?= BASE_URL . 'uploads/kategori_produk/' . $kategori_produk->photo; ?>" class="image-responsive" alt="image kategori_produk" title="photo kategori_produk" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= BASE_URL . 'administrator/file/download/kategori_produk/' . $kategori_produk->photo; ?>">
                                 <img src="<?= get_icon_file($kategori_produk->photo); ?>" class="image-responsive" alt="image kategori_produk" title="photo <?= $kategori_produk->photo; ?>" width="40px"> 
                               <?= $kategori_produk->photo ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                                      
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('kategori_produk_update', function() use ($kategori_produk){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit kategori_produk (Ctrl+e)" href="<?= site_url('administrator/kategori_produk/edit/'.$kategori_produk->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Kategori Produk']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/kategori_produk/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Kategori Produk']); ?></a>
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