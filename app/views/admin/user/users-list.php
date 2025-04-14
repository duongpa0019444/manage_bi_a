<div class="page-content">
    <!-- Start Container Fluid -->
    <div class="container-xxl">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="d-flex card-header justify-content-between align-items-center">
                        <div>
                            <h4 class="card-title">Danh sách Users</h4>
                        </div>
                        <a href="<?= BASE_URL ?>/admin/user/create" class="btn btn-sm btn-primary">
                            Thêm Users
                        </a>
                    </div>
                    <div>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-hover table-centered">
                                <thead class="bg-light-subtle">
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customCheck1">
                                                <label class="form-check-label" for="customCheck1"></label>
                                            </div>
                                        </th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($users)): ?>
                                    <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                                    <label class="form-check-label" for="customCheck2"> </label>
                                                </div>
                                            </td>
                                            <td><?= htmlspecialchars($user['user_name']) ?></td>
                                            <td><?= htmlspecialchars($user['email']) ?></td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="<?= BASE_URL ?>/admin/user/edit?id=<?= $user['id'] ?>" class="btn btn-soft-primary btn-sm">
                                                        <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                                    </a>
                                                    <a href="<?= BASE_URL ?>/admin/user/delete?id=<?= $user['id'] ?>" class="btn btn-soft-danger btn-sm"  onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                                        <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center">Không có người dùng nào trong hệ thống.</td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                    <div class="card-footer border-top">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container Fluid -->
</div>