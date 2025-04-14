 <div class="page-content">

     <!-- Start Container Fluid -->
     <div class="container-fluid">

            <!-- Start here.... -->
            <div class="row">
                <div class="col-xxl-12">
                    <div class="row">
                        <?php foreach ($tables as $table): ?>
                            <div class="col-md-3">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="avatar-md rounded <?=$table['status']=='Còn trống'?'bg-success':'bg-primary'?> ">
                                                    <iconify-icon icon="tabler:brand-airtable" class="avatar-title fs-32 text-light"></iconify-icon>

                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-9 text-end">
                                                <p class="text-muted mb-0 text-truncate"><?=$table['status']?></p>
                                                <h3 class="text-dark mt-1 mb-0"><?=$table['table_name']?></h3>
                                            </div> <!-- end col -->
                                        </div> <!-- end rotable_w-->
                                    </div> <!-- end card body -->
                                    <div class="card-footer py-2 bg-light bg-opacity-50">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <?php if($table['status']=='Còn trống'): ?>
                                                <a href="<?= BASE_URL ?>/admin/order/<?=$table['id']?>/setup" class="text-reset fw-semibold fs-12"><button class="btn btn-success">Đặt Bàn</button></a>
                                            <?php else: ?>
                                                <a href="<?= BASE_URL ?>/admin/order/<?=$table['id']?>/setup" class="text-reset fw-semibold fs-12"><button class="btn btn-primary">Chi Tiết</button></a>
                                            <?php endif ?>
                                            <p class="text-muted mb-0 text-truncate">Giá: <?= number_format($table['table_price'], 0, ',', '.') ?> đ</p>

                                        </div>
                                    </div> <!-- end card body -->
                                </div> <!-- end card -->
                            </div> <!-- end col -->
                        <?php endforeach ?>
                    </div> <!-- end row -->
                </div> <!-- end col -->


         </div> <!-- end row -->

     </div>
     <!-- End Container Fluid -->

     <!-- ========== Footer Start ========== -->
     <footer class="footer">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-12 text-center">
                     <script>
                         document.write(new Date().getFullYear())
                     </script> &copy; Nhóm 3 <iconify-icon icon="iconamoon:heart-duotone" class="fs-18 align-middle text-danger"></iconify-icon> <a
                         href="#" class="fw-bold footer-text" target="_blank">BI A CLUB</a>
                 </div>
             </div>
         </div>
     </footer>
     <!-- ========== Footer End ========== -->

 </div>