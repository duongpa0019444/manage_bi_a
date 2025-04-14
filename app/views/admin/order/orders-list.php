<!-- views/order/orders-list.php -->
<div class="page-content">
     <!-- Start Container Fluid -->
     <div class="container-xxl">
          <div class="row">
               <div class="col-xl-12">
                    <div class="card">
                         <div class="d-flex card-header justify-content-between align-items-center">
                              <div>
                                   <h4 class="card-title">Tất cả đơn hàng</h4>
                              </div>
                         </div>
                         <div class="card-body p-0">
                              <div class="table-responsive">
                                   <table class="table align-middle mb-0 table-hover table-centered">
                                        <thead class="bg-light-subtle">
                                             <tr>
                                                  <th>Mã</th>
                                                  <th>Bắt đầu</th>
                                                  <th>Kết thúc</th>
                                                  <th>Sản phẩm</th>
                                                  <th>Tổng tiền</th>
                                                  <!-- <th>Bàn</th> -->
                                                  <!-- <th>Người dùng</th> -->
                                                  <th>Thao tác</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php if (empty($orders)): ?>
                                                  <tr>
                                                       <td colspan="8" class="text-center">Không có đơn hàng nào.</td>
                                                  </tr>
                                             <?php else: ?>
                                                  <?php foreach ($orders as $index => $order): ?>
                                                       <tr>
                                                            <td>#<?php echo ($currentPage - 1) * $itemsPerPage + $index + 1; ?></td>
                                                            <td><?php echo date('H:i d/m/Y', strtotime($order['time_start'])); ?></td>
                                                            <td><?php echo date('H:i d/m/Y', strtotime($order['time_end'])); ?></td>
                                                            <td><?php echo $order['product_count']; ?></td>
                                                            <td><?php echo number_format($order['total_amount'], 0, ',', '.') . 'đ'; ?></td>
                                                            <!-- <td><?php echo htmlspecialchars($order['table_id'] ?? 'N/A'); ?></td> -->
                                                            <!-- <td><?php echo htmlspecialchars($order['user_id'] ?? 'N/A'); ?></td> -->
                                                            <td>
                                                                 <div class="d-flex gap-2">
                                                                      <a href="<?= BASE_URL ?>/admin/order/<?php echo $order['id']; ?>/detail" class="btn btn-light btn-sm">
                                                                           <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                                                                      </a>
                                                                      <a href="<?= BASE_URL ?>/admin/order/<?php echo $order['id']; ?>/delete" class="btn btn-soft-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này?')">
                                                                           <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon>
                                                                      </a>
                                                                 </div>
                                                            </td>
                                                       </tr>
                                                  <?php endforeach; ?>
                                             <?php endif; ?>
                                        </tbody>
                                   </table>
                              </div>
                              <!-- end table-responsive -->
                         </div>
                         <div class="card-footer border-top">
                              <nav aria-label="Page navigation example">
                                   <ul class="pagination justify-content-end mb-0">
                                        <?php if ($currentPage > 1): ?>
                                             <li class="page-item">
                                                  <a class="page-link" href="?page=<?php echo $currentPage - 1; ?>">Previous</a>
                                             </li>
                                        <?php endif; ?>

                                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                             <li class="page-item <?php echo $i == $currentPage ? 'active' : ''; ?>">
                                                  <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                             </li>
                                        <?php endfor; ?>

                                        
                                   </ul>
                              </nav>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <!-- End Container Fluid -->
</div>
