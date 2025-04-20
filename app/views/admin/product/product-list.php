

          <!-- ==================================================== -->
          <!-- Start right Content here -->
          <!-- ==================================================== -->
          <div class="page-content">

               <!-- Start Container Fluid -->
               <div class="container-fluid">

                    <div class="row">
                         <div class="col-xl-12">
                              <div class="card">
                                   <div class="card-header d-flex justify-content-between align-items-center gap-1">
                                        <h4 class="card-title flex-grow-1">Danh sách sản phẩm</h4>

                                        <a href="<?=BASE_URL?>/admin/product/create" class="btn btn-sm btn-primary">
                                             Thêm sản phẩm
                                        </a>
                                        <?=$mess??""?>
                                       
                                   </div>
                                   <div>
                                        <div class="table-responsive">
                                             <table class="table align-middle mb-0 table-hover table-centered">
                                                  <thead class="bg-light-subtle">
                                                       <tr>
                                                            <th style="width: 20px;">
                                                                 <div class="form-check ms-1">
                                                                      <input type="checkbox" class="form-check-input" id="customCheck1">
                                                                      <label class="form-check-label" for="customCheck1"></label>
                                                                 </div>
                                                            </th>
                                                            <th>Sản phẩm(Name/Image/QR)</th>
                                                            <th>Giá</th>
                                                            <th>Số lượng</th>
                                                            <th>Thao tác</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>   
                                                  <?php foreach ($Products as $Product): ?>
                                                  <tr>
                                                       <td>
                                                            <div class="form-check ms-1">
                                                                 <input type="checkbox" class="form-check-input" id="customCheck<?= htmlspecialchars($Product['id']) ?>">
                                                                 <label class="form-check-label" for="customCheck<?= htmlspecialchars($Product['id']) ?>"> </label>
                                                            </div>
                                                       </td>
                                                       <td>
                                                            <div class="d-flex align-items-center gap-2">
                                                                 <div class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                                      <!-- Kiểm tra nếu có hình ảnh và hiển thị -->
                                                                      <?php if (!empty($Product['image'])): ?>
                                                                           <img src="<?= BASE_URL.'/admin/'.$Product['image'] ?>" alt="Hình ảnh" class="img-thumbnail" style="width: 95px; height: 50px;">
                                                                      <?php else: ?>
                                                                           <span>Không có hình</span>
                                                                      <?php endif; ?>
                                                                 </div>

                                                                 <div>
                                                                      <a href="#!" class="text-dark fw-medium fs-15"><?= htmlspecialchars($Product['name']) ?></a>
                                                                      <p class="text-muted mb-0 mt-1 fs-13"><span>Mã: </span><?= htmlspecialchars($Product['product_code']) ?></p>
                                                                      <p class="text-muted mb-0 mt-1 fs-13"><span>Danh mục: </span><?= htmlspecialchars($Product['category_id']) ?></p>
                                                                 </div>
                                                            </div>
                                                       </td>

                                                       <td><?= number_format($Product['price']) ?>đ</td>
                                                       <td><?= number_format($Product['quantity']) ?></td>
                                                       <td>
                                                            <div class="d-flex gap-2">
                                                                 <a href="<?= BASE_URL ?>/admin/product/edit/<?= htmlspecialchars($Product['id']) ?>" class="btn btn-soft-primary btn-sm">
                                                                      <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                                                 </a>
                                                                 <a href="<?= BASE_URL ?>/admin/product/delete/<?= htmlspecialchars($Product['id']) ?>" class="btn btn-soft-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                                                                      <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon>
                                                                 </a>
                                                            </div>
                                                       </td>
                                                  </tr>
                                                  <?php endforeach; ?>
                                                  </tbody>

                                             </table>
                                        </div>
                                        <!-- end table-responsive -->
                                   </div>
                                  
                              </div>
                         </div>

                    </div>

               </div>
               <!-- End Container Fluid -->

    

          </div>
          <!-- ==================================================== -->
          <!-- End Page Content -->
          <!-- ==================================================== -->

  
