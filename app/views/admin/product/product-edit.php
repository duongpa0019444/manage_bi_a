<!-- ==================================================== -->
<!-- Start right Content here -->
<!-- ==================================================== -->
<?php
    $errors =  $_SESSION['error']??"";
    
    unset( $_SESSION['error']);
?>
<div class="page-content">

     <!-- Start Container Fluid -->
     <div class="container-xxl">

          <div class="row">


               <div class="col-xl-12 col-lg-12 ">
                    <form class="card" action="<?= BASE_URL ?>/admin/product/update/<?= $product['id'] ?>" method="post" enctype="multipart/form-data">
                         <div class="card-header">
                              <h4 class="card-title">Thêm hình ảnh</h4>
                         </div>
                         <div class="card-body">
                              <!-- File Upload -->
                              <div class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                                   <div class="fallback">
                                        <input name="image[]" type="file" multiple/>
                                        <input type="hidden" name="image" value="<?= $product['image'] ?>">
                                   </div>
                                   <div class="dz-message needsclick">
                                        <i class="bx bx-cloud-upload fs-48 text-primary"></i>
                                        <h3 class="mt-4">Thả hình ảnh của bạn ở đây hoặc <span class="text-primary">nhấp để duyệt</span></h3>
                                        <span class="text-muted fs-13">
                                             Khuyến nghị (4:3). Các tệp PNG, JPG và GIF được phép
                                        </span>
                                   </div>
                              </div>
                         </div>

                         <div class="card-header">
                              <h4 class="card-title">Thông Tin Sản Phẩm</h4>
                         </div>
                         <div class="card-body">
                              <div class="row">
                                   

                                   <div class="col-lg-6">
                                        <div>
                                             <div class="mb-3">
                                                  <label for="product-name" class="form-label">Tên sản phẩm</label>
                                                  <input type="text" id="product-name" class="form-control" name="name" value="<?= $product['name'] ?>" required>
                                             </div>
                                        </div>
                                   </div>

                              </div>
                              <div class="row">
                              <div class="col-lg-6">
                                <div>
                                    <label class="form-label">Danh mục</label>
                                    <!-- <pre><?php print_r($categories); ?></pre> -->

                                    <select class="form-control" name="category_id">
                                        
                                        <?php foreach ($categories as $category): ?>
                                             
                                                 <option value="<?= $category['id'] ?>" <?=$category['id']==$product['category_id']?'selected':'' ?>> <?= $category['name'] ?></option>
                                                 
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>



                                   <div class="col-lg-6">
                                        <div>
                                             <div class="mb-3">
                                                  <label for="product-weight" class="form-label">Số lượng sản phẩm</label>
                                                  <input type="number" id="product-weight" class="form-control" name="quantity" value="<?=$product['quantity']?>" required>
                                             </div>
                                        </div>
                                   </div>

                              </div>

                              

                         </div>

                         <div class="card-header">
                              <h4 class="card-title">Chi tiết giá cả</h4>
                         </div>
                         <div class="card-body">
                              <div class="row">
                                   <div class="col-lg-6">
                                        <div>
                                             <label for="product-price" class="form-label">Giá sản phẩm</label>
                                             <div class="input-group mb-3">
                                                  <span class="input-group-text fs-20">VND</span>
                                                  <input type="number" id="product-price" class="form-control" value="<?=$product['price']?>" name="price" required>
                                             </div>
                                        </div>
                                   </div>
                                  

                              </div>
                         </div>

                         <div class="p-3 bg-light mb-3 rounded">
                         <?php if(!empty($errors)): foreach($errors['required'] as $error):?>
                                    
                                    <div class="alert alert-danger">
                                        <?=$error??""?>
                                    </div>
                                    
                                <?php endforeach; endif?>
                              <div class="row justify-content-end g-2">
                                   <div class="col-lg-2">
                                        <button class="btn btn-primary w-100">Cập Nhật</button>
                                   </div>
                                   <div class="col-lg-2">
                                        <a href="<?=BASE_URL?>/admin/product/list" class="btn btn-outline-secondary w-100">Thoát</a>
                                   </div>

                              </div>
                         </div>
                    </form>

               </div>
          </div>
     </div>
     <!-- End Container Fluid -->