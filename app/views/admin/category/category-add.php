

          <!-- ==================================================== -->
          <!-- Start right Content here -->
          <!-- ==================================================== -->
          <div class="page-content">

               <!-- Start Container Fluid -->
               <div class="container-xxl">

                    <div class="row">
                         

                         <div class="col-xl-12 col-lg-12 ">
                              <form class="card" action="<?= BASE_URL ?>/admin/category/store"  method="post" enctype="multipart/form-data">
                                 
                                   <div class="card-body">  
                                        <div class="row">
                                             <div class="col-lg-12">
                                                  <div>
                                                       <div class="mb-3">
                                                            <label for="product-name" class="form-label">Tên danh mục</label>
                                                            <input type="text" id="name" class="form-control" placeholder="Mời nhập tên danh mục*" name="name">
                                                       </div>
                                                  </div>
                                             </div>

                                             
                                             
                                        </div>
                                        
                                   </div>
                              
                                   
                                   
                                   <div class="p-3 bg-light mb-3 rounded">
                                   <div class="row justify-content-end g-2">
                                        <div class="col-lg-2">
                                             <button type="submit" class="btn btn-primary w-100">Thêm</button>
                                        </div>
                                        <div class="col-lg-2">
                                             <a href="<?= BASE_URL ?>/admin/category/list" class="btn btn-outline-secondary w-100">Thoát</a>
                                        </div>
                                        
                                   </div>
                                   </div>
                              </form>
                              
                         </div>
                    </div>
               </div>
               <!-- End Container Fluid -->
