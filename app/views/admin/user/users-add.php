
<div class="page-content">
     <!-- Start Container Fluid -->
     <div class="container-xxl">
          <div class="row">
               <div class="col-xl-12 col-lg-12 ">
                    <form class="card" method="post" enctype="multipart/form-data">
                         <div class="card-body">
                              <div class="row">
                                   <div class="col-lg-12">
                                        <div>
                                             <div class="mb-3">
                                                  <label class="mt-1" for="product-name" class="form-label">Tên tài khoản</label>
                                                  <input type="text" id="ten_user" class="form-control" placeholder="Mời nhập tên tài khoản*" name="ten_user" required>

                                                  <label class="mt-1" for="product-name" class="form-label">Email</label>
                                                  <input type="email" id="email" class="form-control" placeholder="Mời nhập email*" name="email">
                                                  
                                                  <label class="mt-1" for="product-name" class="form-label">Mật khẩu</label>
                                                  <input type="password" id="mat_khau" class="form-control" placeholder="Mời nhập mật khẩu*" name="mat_khau" required>
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
                                        <a href="<?=BASE_URL?>/admin/user/list" class="btn btn-outline-secondary w-100">Thoát</a>
                                   </div>

                              </div>
                         </div>
                    </form>
               </div>
          </div>
     </div>
     <!-- End Container Fluid -->