<div class="page-content">

    <!-- Start Container Fluid -->
    <div class="container-xxl">

        <div class="row align-items-start">

            <div class="col-lg-9">
                <div class="card bg-light-subtle">
                    <div class="card-header border-0">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-lg-6">
                                <form action="" method="post" id="formSearchCate">
                                    <label for="category" class="form-label">Danh mục sản phẩm</label>
                                    <select class="form-control" id="category" name="category_id" data-choices data-choices-groups data-placeholder="Select Gender" onchange="this.form.submit()">
                                        <option value="" disabled selected hidden>-Chọn Danh mục-</option>
                                        <?php foreach ($categorys as $category): ?>
                                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <div class="text-md-end mt-3 mt-md-0">
                                    <?php if (empty($sessions) || $sessions['status'] !== 'Đang chơi'): ?>
                                        <a href="<?= BASE_URL ?>/admin/order/<?= $orderDetail['id'] ?>/setSession" class="btn btn-success me-1"><i class="bx bx-plus"></i> Bắt đầu tính giờ</a>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($products as $product): ?>
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <img src="<?= BASE_URL.'/admin/'.$product['image'] ?>" alt="" class="img-fluid ">
                                <div class="card-body bg-light-subtle rounded-bottom text-center">
                                    <a href="product-details.html" class="text-dark fw-medium fs-18"><?= $product['name'] ?></a>

                                    <h4 class="fw-semibold text-dark mt-2 d-flex align-items-center gap-2 justify-content-center">
                                        <span class="text-decoration-line-through"></span> <?= number_format($product['price'], 0, ',', '.') ?> đ <small class="text-muted"></small>
                                    </h4>
                                    <div class="mt-1">
                                        <div class="d-flex gap-2 justify-content-center">
                                            <button class="btn-add-product btn-outline-dark btn btn-dark" data-product="<?= $product['id'] ?>" data-session="<?= $sessions['id'] ?? "" ?>"><i class='bx bx-cart align-middle'></i>Thêm</button>
                                        </div>
                                    </div>
                                </div>
                                <span class="position-absolute top-0 end-0 p-1">
                                    <button type="button" class="btn btn-soft-danger avatar-sm d-inline-flex align-items-center justify-content-center fs-20 rounded-circle"><iconify-icon icon="solar:heart-broken"></iconify-icon></button>
                                </span>
                            </div>
                        </div>
                    <?php endforeach ?>

                </div>

                <div class="py-3 border-top">
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

            <div class="card col-lg-3">
                <div class="card-header p-1 pt-3 d-flex justify-content-between">
                    <h4><?= $orderDetail['table_name'] ?></h4>
                    <p class="form-label">Giá : <?= number_format($orderDetail['table_price'], 0, ',', '.') ?> đ </p>

                </div>
                <div class="card-body p-1">
                    <div class="table-responsive">
                        <div class="bg-success-subtle p-1">
                            <h5 class="border-bottom">Thời gian <iconify-icon icon="material-symbols-light:nest-clock-farsight-analog-rounded"></iconify-icon></h5>
                            <table class="table mb-0">

                                <tbody>
                                    <tr>
                                        <td class="px-0">
                                            <p class="d-flex mb-0 align-items-center gap-1 ">Bắt đầu: </p>
                                        </td>
                                        <!-- <td class="text-end text-dark fw-medium px-0" id="time_status"><?= !empty($sessions['time_start']) ? date('d/m/Y H:i:s', strtotime($sessions['time_start'])) : "" ?></td> -->
                                        <td class="text-end text-dark fw-medium px-0" id="time_status">
                                            <?php
                                            if (!empty($sessions['time_start'])) {
                                                // Đảm bảo múi giờ đúng khi hiển thị
                                                $dateTime = new DateTime($sessions['time_start'], new DateTimeZone('Asia/Ho_Chi_Minh'));
                                                echo $dateTime->format('d/m/Y H:i:s');
                                            } else {
                                                echo "";
                                            }
                                            ?>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        <div class="mt-2" id="productOrrderphp">

                            <h5>sản phẩm</h5>

                            <?php foreach ($productOrders as $productOrder): ?>
                                <div class="d-flex align-items-start gap-3 border-bottom py-1">
                                    <div>
                                        <a href="#!" class="text-dark fw-medium fs-16"><?= $productOrder['name'] ?> :</a>
                                        <p class="text-muted mb-0 mt-1 fs-13"><span>Số lượng : </span><?= $productOrder['quantity'] ?> </p>
                                    </div>
                                    <div class="ms-auto text-end">
                                        <p class="text-dark fw-medium mb-1"><?= number_format($productOrder['total'], 0, ',', '.') ?> đ </p>
                                        <button class="btn btn-soft-danger btn-sm delete_product" data-productOrder="<?= $productOrder['id'] ?>" data-session="<?= $sessions['id'] ?? "" ?>"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></button>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <div class="mt-2" id="productOrrders">


                        </div>


                    </div>
                </div>

                <div class="main-btn my-4 text-end d-lg-flex justify-content-between">
                    <button id="deleteOrder" data-session="<?= $sessions['id'] ?>" data-table="<?= $sessions['table_id'] ?>" class="btn btn-dark">Hủy</button>
                    <a href="<?= BASE_URL ?>/admin" class="btn btn-danger">Quay lại</a>
                    <a href="#!" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#checkoutModal">Tính Tiền</a>
                </div>
            </div>


        </div>

    </div>
    <!-- End Container Fluid -->

    <!-- Modal Hóa Đơn -->
    <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow-lg rounded-3">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title fw-bold" id="checkoutModalLabel">Hóa Đơn Thanh Toán</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <!-- Thông tin hóa đơn -->
                    <div id="billDetails">
                        <h6 class="fw-semibold mb-3">Danh sách sản phẩm:</h6>
                        <ul id="orderItemsList" class="list-group mb-4 list-group-flush">
                            <!-- Danh sách sản phẩm sẽ được thêm bằng AJAX -->
                        </ul>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <strong>Thời gian:</strong>
                            <span id="orderTime" class="badge bg-secondary"></span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2" id="tablePriceDetail">
                            <span>Giá bàn:</span>
                            <span id="tablePriceValue" class="text-primary fw-bold">0 đ</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <strong>Tổng tiền:</strong>
                            <span id="totalPrice" class="fw-bold text-success fs-5">0 đ</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary px-4" id="confirmPayment">
                        <i class="bi bi-check-circle me-2"></i>Xác Nhận Thanh Toán
                    </button>
                </div>
            </div>
        </div>
    </div>



</div>


<script>
    $('.btn-add-product').click(function() {

        let id = $(this).data('product');
        let session_id = $(this).data('session');
        console.log(session_id, id);
        $.ajax({
            url: "<?= BASE_URL ?>/admin/order/addproduct",
            method: 'POST',
            data: {
                id: id,
                session_id: session_id
            },
            success: function(response) {
                console.log(response);

                // Ẩn danh sách PHP render
                $("#productOrrderphp").hide();
                // Xóa mảng ajax cũ để tránh trùng lặp
                $('#productOrrders').html('<h5>sản phẩm</h5>');

                // Lặp và hiển thị lại toàn bộ sản phẩm mới
                response.forEach(product => {

                    $('#productOrrders').append(`
                        <div class="d-flex align-items-start gap-3 border-bottom py-1">
                            <div>
                                <a href="#!" class="text-dark fw-medium fs-16">${product.name}:</a>
                                <p class="text-muted mb-0 mt-1 fs-13"><span>Số lượng : </span> ${product.quantity}</p>
                            </div>
                            <div class="ms-auto text-end">
                                <p class="text-dark fw-medium mb-1">${(product.price*product.quantity).toLocaleString('vi-VN')} đ</p>
                                <button class="btn btn-soft-danger btn-sm delete_product" data-productOrder="${product.product_id}" data-session="${product.session_id}"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></button>

                            </div>
                        </div>
                    `);
                });

            },
            error: function(xhr, status, error) {
                console.error('Lỗi:', error);
                alert('Có lỗi xảy ra khi thêm sản phẩm!');
            }
        });
    });


    $(document).on('click', '.delete_product', function() {

        let productId = $(this).data("productorder");
        let session_id = $(this).data('session');

        $.ajax({
            url: '<?= BASE_URL ?>/admin/order/deleteProduct',
            type: 'POST',
            data: {
                session_id: session_id,
                product_id: productId,

            },
            success: function(response) {
                console.log(response);
                // Ẩn danh sách PHP render
                $("#productOrrderphp").hide();
                // Xóa mảng ajax cũ để tránh trùng lặp
                $('#productOrrders').html('<h5>sản phẩm</h5>');

                // Lặp và hiển thị lại toàn bộ sản phẩm mới
                response.forEach(product => {

                    $('#productOrrders').append(`
                        <div class="d-flex align-items-start gap-3 border-bottom py-1">
                            <div>
                                <a href="#!" class="text-dark fw-medium fs-16">${product.name}:</a>
                                <p class="text-muted mb-0 mt-1 fs-13"><span>Số lượng : </span> ${product.quantity}</p>
                            </div>
                            <div class="ms-auto text-end">
                                <p class="text-dark fw-medium mb-1">${(product.price*product.quantity).toLocaleString('vi-VN')} đ</p>
                                <button class="btn btn-soft-danger btn-sm delete_product" data-productOrder="${product.product_id}" data-session="${product.session_id}"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></button>
                            </div>
                        </div>
                    `);
                });
            },
            error: function(xhr, status, error) {
                console.error("Lỗi AJAX:", error);
            }
        });
    });


    //Xử lý khi ấn hủy đơn
    $('#deleteOrder').on('click', function() {
        let table_id = $(this).data("table");
        let session_id = $(this).data('session');
        // console.log(session_id, table_id);
        Swal.fire({
            title: 'Bạn có chắc không?',
            text: 'Bạn có muốn hủy đơn hàng này không?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef5f5f',
            cancelButtonColor: '#22c55e',
            confirmButtonText: 'Xác nhận hủy!',
            cancelButtonText: 'Không, giữ lại'
        }).then((result) => {
            if (result.isConfirmed) {
                // Gửi yêu cầu Ajax khi người dùng xác nhận
                $.ajax({
                    url: '<?= BASE_URL ?>/admin/order/delete', // Thay bằng URL route của bạn
                    type: 'POST', // Hoặc DELETE tùy route
                    data: {
                        session_id: session_id,
                        table_id: table_id
                    },
                    success: function(response) {
                        console.log(response);
                        Swal.fire(
                            'Đã hủy!',
                            'Đơn hàng của bạn đã được hủy.',
                            'success'
                        ).then(() => {
                            location.href = '<?= BASE_URL ?>/admin/';

                        });
                    },
                    error: function(xhr) {
                        Swal.fire(
                            'Lỗi!',
                            'Có lỗi xảy ra khi hủy đơn hàng.',
                            'error'
                        );
                    }
                });
            }
        });
    });



    // Thanh toán
    // Lấy các phần tử trong modal
    const orderItemsList = document.getElementById("orderItemsList");
    const totalPriceElement = document.getElementById("totalPrice");
    const orderTimeElement = document.getElementById("orderTime");
    const tablePriceValueElement = document.getElementById("tablePriceValue");
    const confirmPaymentBtn = document.getElementById("confirmPayment");

    // Lấy session_id và table_id từ nút "Tính Tiền"
    const checkoutBtn = document.querySelector('a[data-bs-target="#checkoutModal"]');
    const sessionId = checkoutBtn.closest('.main-btn').querySelector('#deleteOrder').getAttribute('data-session');
    const tableId = checkoutBtn.closest('.main-btn').querySelector('#deleteOrder').getAttribute('data-table');

    // Khi modal được mở, lấy danh sách sản phẩm và thông tin thời gian
    document.getElementById("checkoutModal").addEventListener("show.bs.modal", function () {
    fetch("<?= BASE_URL ?>/admin/get-order-items", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ session_id: sessionId })
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.text();
        })
        .then(text => {
            try {
                const data = JSON.parse(text);
                if (data.success) {
                    // Xóa nội dung cũ
                    orderItemsList.innerHTML = "";
                    let totalFoodPrice = 0;

                    // Hiển thị danh sách sản phẩm
                    data.items.forEach(item => {
                        const li = document.createElement("li");
                        li.className = "list-group-item d-flex justify-content-between align-items-center";
                        li.innerHTML = `
                            <span>${item.name} <span class="text-muted fw-normal">(${item.price.toLocaleString("vi-VN")} đ)</span></span>
                            <span>Số lượng: <span class="badge bg-info text-dark">${item.quantity}</span> - Tổng: <span class="text-primary fw-bold">${(item.price * item.quantity).toLocaleString("vi-VN")} đ</span></span>
                        `;
                        orderItemsList.appendChild(li);
                        totalFoodPrice += item.price * item.quantity;
                    });

                    // Thêm dòng tổng tiền sản phẩm
                    const totalFoodLi = document.createElement("li");
                    totalFoodLi.className = "list-group-item d-flex justify-content-between align-items-center bg-light fw-bold";
                    totalFoodLi.innerHTML = `
                        <span>Tổng tiền sản phẩm:</span>
                        <span class="text-success fs-5">${totalFoodPrice.toLocaleString("vi-VN")} đ</span>
                    `;
                    orderItemsList.appendChild(totalFoodLi);

                    // Tính thời gian chơi
                    const startTime = new Date(data.start_time);
                    const currentTime = new Date();
                    if (isNaN(startTime.getTime())) {
                        throw new Error("Invalid start_time format: " + data.start_time);
                    }
                    const playTimeSeconds = Math.floor((currentTime - startTime) / 1000);
                    if (playTimeSeconds < 0) {
                        console.error("playTimeSeconds is negative: " + playTimeSeconds);
                        orderTimeElement.textContent = "0 giờ";
                    } else {
                        const playTimeHours = (playTimeSeconds / 3600).toFixed(2);
                        orderTimeElement.textContent = `${playTimeHours} giờ`;
                    }

                    // Giả sử table_price được gửi từ server
                    const tablePrice = parseFloat(data.price_per_hour || <?= $orderDetail['table_price'] ?>);
                    const playTimeHours = playTimeSeconds < 0 ? 0 : (playTimeSeconds / 3600).toFixed(2);
                    const playTimePrice = playTimeHours * tablePrice;

                    // Cập nhật giá bàn và tiền thời gian chơi
                    tablePriceValueElement.textContent = `${playTimePrice.toLocaleString("vi-VN")} đ`;
                    tablePriceValueElement.previousElementSibling.textContent = `Giá bàn (${tablePrice.toLocaleString("vi-VN")} đ/giờ) x ${playTimeHours} giờ`;

                    // Tính tổng tiền cuối cùng
                    const totalPrice = totalFoodPrice + playTimePrice;
                    totalPriceElement.textContent = `${totalPrice.toLocaleString("vi-VN")} đ`;

                    // Lưu các giá trị để sử dụng khi xác nhận thanh toán
                    window.orderTotalFoodPrice = totalFoodPrice;
                    window.orderPlayTimeSeconds = playTimeSeconds < 0 ? 0 : playTimeSeconds;
                    window.orderPlayTimePrice = playTimePrice;
                    window.orderTotalPrice = totalPrice;
                } else {
                    alert("Không thể lấy danh sách sản phẩm: " + data.message);
                }
            } catch (e) {
                console.error("Invalid JSON response:", text);
                throw new Error("Phản hồi từ server không phải JSON hợp lệ: " + text);
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("Có lỗi xảy ra khi lấy danh sách sản phẩm: " + error.message);
        });
});

    // Khi nhấn "Xác Nhận Thanh Toán", lưu hóa đơn
    confirmPaymentBtn.addEventListener("click", () => {
        // Kiểm tra dữ liệu trước khi gửi
        const paymentData = {
            session_id: sessionId,
            table_id: tableId,
            total_food_price: window.orderTotalFoodPrice,
            total_play_time: window.orderPlayTimeSeconds,
            total_amount: window.orderTotalPrice
        };

        // Kiểm tra các giá trị trong paymentData
        if (!sessionId || !tableId ||
            typeof window.orderTotalFoodPrice === 'undefined' ||
            typeof window.orderPlayTimeSeconds === 'undefined' ||
            typeof window.orderTotalPrice === 'undefined') {
            console.error("Dữ liệu không hợp lệ:", paymentData);
            alert("Dữ liệu thanh toán không hợp lệ. Vui lòng kiểm tra lại.");
            return;
        }

        // Đảm bảo các giá trị là số hợp lệ
        paymentData.total_food_price = parseFloat(paymentData.total_food_price);
        paymentData.total_play_time = parseInt(paymentData.total_play_time);
        paymentData.total_amount = parseFloat(paymentData.total_amount);

        console.log("Payment data sent:", paymentData); // In dữ liệu gửi đi để kiểm tra

        fetch("<?= BASE_URL ?>/admin/save-payment", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(paymentData)
            })
            .then(response => {
                // In ra trạng thái và header để kiểm tra
                console.log("Response status:", response.status);
                console.log("Response headers:", response.headers.get("Content-Type"));
                return response.text(); // Lấy phản hồi dưới dạng text để kiểm tra
            })
            .then(text => {
                console.log("Raw response:", text); // In phản hồi thô
                try {
                    const data = JSON.parse(text); // Thử phân tích JSON
                    if (data.success) {
                        alert("Thanh toán thành công! Đã lưu vào hệ thống.");
                        const modal = bootstrap.Modal.getInstance(document.getElementById("checkoutModal"));
                        modal.hide();
                        window.location.href = "<?= BASE_URL ?>/admin";
                    } else {
                        alert("Có lỗi xảy ra khi lưu hóa đơn: " + (data.message || "Không có thông tin lỗi"));
                    }
                } catch (e) {
                    console.error("JSON parse error:", e);
                    console.error("Raw response causing the error:", text);
                    alert("Có lỗi xảy ra khi lưu hóa đơn: Phản hồi từ server không hợp lệ. Vui lòng kiểm tra console để biết thêm chi tiết.");
                }
            })
            .catch(error => {
                console.error("Fetch error:", error);
                alert("Có lỗi xảy ra khi gửi yêu cầu: " + error.message);
            });
    });
</script>