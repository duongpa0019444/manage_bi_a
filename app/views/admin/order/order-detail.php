<!-- Start right Content here -->
<!-- ==================================================== -->

<div class="page-content">

     <!-- Start Container -->
     <div class="container-xxl">

          <div class="row">
               <div class="col-xl-9 col-lg-8">
                    <div class="row">
                         <div class="col-lg-12">
                              <div class="card">
                                   <div class="card-body">
                                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                                             <div class="col-12">
                                                  <!-- <h4 class="fw-medium text-dark d-flex align-items-center gap-2">
                                                       #<?=$_GET['id_DH']?>
                                                  </h4> -->
                                                  <p class="mb-0">Đơn Hàng / Chi tiết Đơn Hàng / <?=$information['thoi_gian']?></p>
                                             </div>

                                             <form method="post" class="col-12 row align-items-end">
                                                  <div class="col-lg-6">
                                                       <div method="post">
                                                            <label class="form-label"><h5>Trạng Thái Đơn Hàng:</h5></label>
                                                            <select class="form-control" name="id_trang_thai" required>
                                                                 <?php foreach($trangthais as $trangthai):?>
                                                                      <option value="<?=$trangthai['id']?>" <?=$trangthai['id']==$information['trang_thai']?'selected':''?>><?=$trangthai['trang_thai']?></option>
                                                                 <?php endforeach ?>
                                                                 
                                                            </select>
                                                       </div>
                                                  </div>
                                                  <div class="col-6">
                                                       <a href="<?= BASE_URL ?>/admin/orders-list" class="btn btn-outline-secondary">Quay Lại</a>
                                                       <button class="btn btn-primary">Cập Nhật</button>
                                                  </div>
                                                  
                                             </form>
                                             
                                        </div>


                                   </div>

                              </div>
                              <div class="card">
                                   <div class="card-header">
                                        <h4 class="card-title">Sản Phẩm</h4>
                                   </div>
                                   <div class="card-body">
                                        <div class="table-responsive">
                                             <table class="table align-middle mb-0 table-hover table-centered">
                                                  <thead class="bg-light-subtle border-bottom">
                                                       <tr>
                                                            <th>Sản Phẩm</th>
                                                            <th>Số Lượng</th>
                                                            <th>Giá</th>
                                                            <th>Tổng</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       <?php foreach($products as $product): ?>
                                                            <tr>
                                                                 <td>
                                                                      <div class="d-flex align-items-center gap-2">
                                                                           <div class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                                                <img src="<?= BASE_URL ?>/admin/<?=$product['hinh_anh']?>" alt="" class="avatar-md">
                                                                           </div>
                                                                           <div>
                                                                                <a href="#!" class="text-dark fw-medium fs-15"><?=$product['ten_san_pham']?></a>
                                                                                <p class="text-muted mb-0 mt-1 fs-13"><span>Danh mục: </span><?=$product['ten_DM_small']?></p>
                                                                           </div>
                                                                      </div>

                                                                 </td>

                                                                 <td><?=$product['sl_san_pham']?></td>
                                                                 <td><?= number_format($product['gia_san_pham'], 0, ',', '.') ?> VNĐ</td>
                                                                 <td><?= number_format($product['tong'], 0, ',', '.') ?> VNĐ</td>

                                                            </tr>

                                                       <?php endforeach ?>



                                                  </tbody>
                                             </table>
                                        </div>
                                   </div>
                              </div>

                         </div>
                    </div>
               </div>
               <div class="col-xl-3 col-lg-4">
                    <div class="card">
                         <div class="card-header">
                              <h4 class="card-title">Đơn Hàng</h4>
                         </div>

                         <div class="card-footer d-flex align-items-center justify-content-between bg-light-subtle">
                              <div>
                                   <p class="fw-medium text-dark mb-0">Tổng Đơn Hàng</p>
                              </div>
                              <div>
                                   <h4 class="fw-medium text-dark mb-0"><?= number_format($information['tong_tien'], 0, ',', '.') ?> VNĐ</h4>
                              </div>

                         </div>
                    </div>

                    
               </div>
          </div>
     </div>

</div>
<!-- End Container Fluid -->