<?php

use models\Category;
?>


          <!-- ==================================================== -->
          <!-- Start right Content here -->
          <!-- ==================================================== -->
          <div class="page-content">

               <!-- Start Container Fluid -->
               <div class="container-xxl">

                    <div class="row">
                         

                         <div class="col-xl-12 col-lg-12 ">
                              <form class="card" method="post" enctype="multipart/form-data">
                                   <div class="card-header">
                                        <h4 class="card-title">Thêm hình ảnh</h4>
                                   </div>
                                   <div class="card-body">
                                        <!-- File Upload -->
                                        <div action="" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                                             <div class="fallback">
                                                  <input name="hinh_anh" type="file" multiple />
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
                              
                                 
                                   <div class="card-body">
                                        <div class="row">
                                             <div class="col-lg-12">
                                                  <div>
                                                       <div class="mb-3">
                                                            <label for="product-name" class="form-label">Tên danh mục</label>
                                                            <input type="text" id="ten_danh_muc" class="form-control" value="<?= $categories['ten_danh_muc']?>"  name="ten_danh_muc">
                                                       </div>
                                                  </div>
                                             </div>

                                             
                                             
                                        </div>
                                        
                                   </div>
                              
                                   
                                   
                                   <div class="p-3 bg-light mb-3 rounded">
                                   <div class="row justify-content-end g-2">
                                        <div class="col-lg-2">
                                             <button type="submit" class="btn btn-primary w-100">Sửa</button>
                                             <!-- <a href="#!" class="btn btn-primary w-100">Sửa</a> -->
                                        </div>
                                        <div class="col-lg-2">
                                             <button type="reset" class="btn btn-primary w-100">Reset</button>

                                        </div>
                                        
                                   </div>
                                   </div>
                              </form>
                              
                         </div>
                    </div>
               </div>
               <!-- End Container Fluid -->
