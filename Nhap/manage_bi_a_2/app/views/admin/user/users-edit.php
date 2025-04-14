<div class="page-content">
    <div class="container-xxl">
        <div class="row">
            <div class="col-xl-12 col-lgVertices-12">
                <form class="card" method="post" action="<?= BASE_URL ?>/admin/user/edit" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <div class="card-header">
                        <h4 class="card-title">Sửa thông tin người dùng</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="mt-1 form-label" for="ten_user">Tên tài khoản</label>
                                    <input type="text" id="ten_user" class="form-control" name="ten_user" value="<?= htmlspecialchars($user['user_name']) ?>" required>

                                    <label class="mt-1 form-label" for="email">Email</label>
                                    <input type="email" id="email" class="form-control" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>

                                    <label class="mt-1 form-label" for="mat_khau">Mật khẩu (để trống nếu không thay đổi)</label>
                                    <input type="password" id="mat_khau" class="form-control" name="mat_khau" placeholder="Nhập mật khẩu mới">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 bg-light mb-3 rounded">
                        <div class="row justify-content-end g-2">
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-primary w-100">Sửa</button>
                            </div>
                            <div class="col-lg-2">
                                <a href="<?= BASE_URL ?>/admin/user/list" class="btn btn-outline-secondary w-100">Thoát</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>