<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from techzaa.in/larkon/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 28 Oct 2024 06:27:43 GMT -->

<head>
    <!-- Title Meta -->
    <meta charset="utf-8" />
    <title><?=$title??""?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully responsive premium admin dashboard template" />
    <meta name="author" content="Techzaa" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Vendor css (Require in all Page) -->
    <link href="<?= BASE_URL ?>/assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

    <!-- Icons css (Require in all Page) -->
    <link href="<?= BASE_URL ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- App css (Require in all Page) -->
    <link href="<?= BASE_URL ?>/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <!-- Theme Config js (Require in all Page) -->
    <script src="<?= BASE_URL ?>/assets/js/config.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Thư viện SweetAlert2 -->
    
</head>

<body>

    <!-- START Wrapper -->
    <div class="wrapper">

        <!-- ========== Topbar Start ========== -->
        <header class="topbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <div class="d-flex align-items-center">
                        <!-- Menu Toggle Button -->
                        <div class="topbar-item">
                            <button type="button" class="button-toggle-menu me-2">
                                <iconify-icon icon="solar:hamburger-menu-broken" class="fs-24 align-middle"></iconify-icon>
                            </button>
                        </div>

                        <!-- Menu Toggle Button -->
                        <div class="topbar-item">
                            <h4 class="fw-bold topbar-button pe-none text-uppercase mb-0">Chào mừng ADMIN <?=$_SESSION['user_name']?>!</h4>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-1">

                        <!-- Theme Color (Light/Dark) -->
                        <div class="topbar-item">
                            <button type="button" class="topbar-button" id="light-dark-mode">
                                <iconify-icon icon="solar:moon-bold-duotone" class="fs-24 align-middle"></iconify-icon>
                            </button>
                        </div>



                        <!-- Theme Setting -->
                        <div class="topbar-item d-none d-md-flex">
                            <button type="button" class="topbar-button" id="theme-settings-btn" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                                <iconify-icon icon="solar:settings-bold-duotone" class="fs-24 align-middle"></iconify-icon>
                            </button>
                        </div>


                        <!-- App Search-->
                        <form class="app-search d-none d-md-block ms-2">
                            <div class="position-relative">
                                <input type="search" class="form-control" placeholder="Search..." autocomplete="off" value="">
                                <iconify-icon icon="solar:magnifer-linear" class="search-widget-icon"></iconify-icon>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </header>



        <!-- Right Sidebar (Theme Settings) -->
        <div>
            <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
                <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
                    <h5 class="text-white m-0">Theme Settings</h5>
                    <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body p-0">
                    <div data-simplebar class="h-100">
                        <div class="p-3 settings-bar">

                            <div>
                                <h5 class="mb-3 font-16 fw-semibold">Color Scheme</h5>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-light" value="light">
                                    <label class="form-check-label" for="layout-color-light">Light</label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-dark" value="dark">
                                    <label class="form-check-label" for="layout-color-dark">Dark</label>
                                </div>
                            </div>

                            <div>
                                <h5 class="my-3 font-16 fw-semibold">Topbar Color</h5>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-light" value="light">
                                    <label class="form-check-label" for="topbar-color-light">Light</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-dark" value="dark">
                                    <label class="form-check-label" for="topbar-color-dark">Dark</label>
                                </div>
                            </div>


                            <div>
                                <h5 class="my-3 font-16 fw-semibold">Menu Color</h5>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-color" id="leftbar-color-light" value="light">
                                    <label class="form-check-label" for="leftbar-color-light">
                                        Light
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-color" id="leftbar-color-dark" value="dark">
                                    <label class="form-check-label" for="leftbar-color-dark">
                                        Dark
                                    </label>
                                </div>
                            </div>

                            <div>
                                <h5 class="my-3 font-16 fw-semibold">Sidebar Size</h5>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-size" id="leftbar-size-default" value="default">
                                    <label class="form-check-label" for="leftbar-size-default">
                                        Default
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-size" id="leftbar-size-small" value="condensed">
                                    <label class="form-check-label" for="leftbar-size-small">
                                        Condensed
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-size" id="leftbar-hidden" value="hidden">
                                    <label class="form-check-label" for="leftbar-hidden">
                                        Hidden
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-size" id="leftbar-size-small-hover-active" value="sm-hover-active">
                                    <label class="form-check-label" for="leftbar-size-small-hover-active">
                                        Small Hover Active
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-size" id="leftbar-size-small-hover" value="sm-hover">
                                    <label class="form-check-label" for="leftbar-size-small-hover">
                                        Small Hover
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="offcanvas-footer border-top p-3 text-center">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-danger w-100" id="reset-layout">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========== Topbar End ========== -->




        <!-- ========== App Menu Start ========== -->
        <div class="main-nav">
            <!-- Sidebar Logo -->
            <div class="logo-box">
                <a href="<?=BASE_URL?>/admin" class="logo-dark">
                    <img src="<?= BASE_URL ?>/assets/images/logo-sm.png" class="logo-sm" alt="logo sm">
                    <img src="<?= BASE_URL ?>/assets/images/logo-dark.png" class="logo-lg" alt="logo dark">
                </a>

                <a href="<?=BASE_URL?>/admin" class="logo-light">
                    <img src="<?= BASE_URL ?>/assets/images/logo-sm.png" class="logo-sm" alt="logo sm">
                    <img src="<?= BASE_URL ?>/assets/images/logo-light.png" class="logo-lg" alt="logo light">
                </a>
            </div>

            <!-- Menu Toggle Button (sm-hover) -->
            <button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
                <iconify-icon icon="solar:double-alt-arrow-right-bold-duotone" class="button-sm-hover-icon"></iconify-icon>
            </button>

            <div class="scrollbar" data-simplebar>
                <ul class="navbar-nav" id="navbar-nav">

                    <li class="menu-title">Quản lý</li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>/admin">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:widget-5-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text"> Dashboard </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-arrow" href="#sidebarProducts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProducts">
                            <span class="nav-icon">
                                <iconify-icon icon="line-md:beer-alt-twotone-loop"></iconify-icon>
                            </span>
                            <span class="nav-text"> Quản lý sản phẩm </span>
                        </a>
                        <div class="collapse" id="sidebarProducts">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="<?=BASE_URL?>/admin/product/list">Danh sách</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="<?=BASE_URL?>/admin/product/create">Thêm sản phẩm</a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-arrow" href="#sidebarCategory" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCategory">
                            <span class="nav-icon">
                                <iconify-icon icon="line-md:calendar"></iconify-icon>
                            </span>
                            <span class="nav-text"> Quản lý danh mục </span>
                        </a>
                        <div class="collapse" id="sidebarCategory">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="<?=BASE_URL?>/admin/category/list">Dánh sách</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="<?=BASE_URL?>/admin/category/create">Thêm danh mục</a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-arrow" href="#order" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="order">
                            <span class="nav-icon">
                                <iconify-icon icon="line-md:clipboard-list"></iconify-icon>
                            </span>
                            <span class="nav-text"> Đơn hàng </span>
                        </a>
                        <div class="collapse" id="order">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="<?=BASE_URL?>/admin/order/list">Lịch sử đơn hàng</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-arrow" href="#user" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="user">
                            <span class="nav-icon">
                                <iconify-icon icon="line-md:account-small"></iconify-icon>
                            </span>
                            <span class="nav-text"> Người quản trị </span>
                        </a>
                        <div class="collapse" id="user">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="<?=BASE_URL?>/admin/user/list">Danh sách</a>
                                </li>

                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="<?=BASE_URL?>/admin/user/create">Thêm người quản trị</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>/admin/statistical">
                            <span class="nav-icon">
                                <iconify-icon icon="line-md:document-report"></iconify-icon>
                            </span>
                            <span class="nav-text"> Thống kê </span>
                        </a>
                        
                    </li>

                    <li class="nav-item mt-3">
                        <a class="nav-link" href="<?=BASE_URL?>/admin/logout">
                            <span class="nav-icon">
                                <iconify-icon icon="line-md:log-out"></iconify-icon>
                            </span>
                            <span class="nav-text"> Đăng xuất </span>
                        </a>
                        
                    </li>



                </ul>
            </div>
        </div>
        <!-- ========== App Menu End ========== -->


        <?php
        require_once __DIR__ . $view . ".php";
           
        ?>


    </div>
    <!-- END Wrapper -->

    <!-- Vendor Javascript (Require in all Page) -->
    <script src="<?= BASE_URL ?>/assets/js/vendor.js"></script>

    <!-- App Javascript (Require in all Page) -->
    <script src="<?= BASE_URL ?>/assets/js/app.js"></script>

    <!-- Vector Map Js -->
    <script src="<?= BASE_URL ?>/assets/vendor/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="<?= BASE_URL ?>/assets/vendor/jsvectormap/maps/world-merc.js"></script>
    <script src="<?= BASE_URL ?>/assets/vendor/jsvectormap/maps/world.js"></script>

    <!-- Dashboard Js -->
    <script src="<?= BASE_URL ?>/assets/js/pages/dashboard.js"></script>

        <!-- Following Apex Area Chart Demo Dummy Data Link -->
        <script src="../../../apexcharts.com/samples/assets/stock-prices.js"></script>
    <script src="../../../apexcharts.com/samples/assets/series1000.js"></script>
    <script src="../../../apexcharts.com/samples/assets/github-data.js"></script>
    <script src="../../../apexcharts.com/samples/assets/irregular-data-series.js"></script>

    <!-- Apex Chart Area Demo js -->
    <!-- <script src="<?= BASE_URL ?>assets/js/components/apexchart-area.js"></script> -->



</body>
</html>