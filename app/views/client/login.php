<?php
    $errors =  $_SESSION['error'];
    
    unset( $_SESSION['error']);
?>
    <!-- background -->
    <div class="ls-bg">
        <video playsinline autoplay muted loop class="ls-bg-inner">
            <source src="inc/images/y2mate.com - POOL TABLE B ROLL  Inspired by Peter Lindgren_v720P.mp4">
        </video>
    </div>

    <main class="overflow-hidden">
        <div class="wrapper">
            <div class="main-inner">

                <!-- logo -->
                <div class="logo">
                    <div class="logo-icon">
                        <img src="inc/images/logo.png" alt="BeRifma">
                    </div>
                    <div class="logo-text">
                        BI-A CLUB
                    </div>
                </div>
                <div class="row h-100 align-content-center">
                    <div class="col-md-6 tab-100 order_2">

                        <!-- side text -->
                        <div class="side-text">
                            <article>
                                
                                <h1 class="main-heading w-100">BI-A CLUB</h1>
                                
                            </article>

                           
                        </div>
                    </div>
                    <div class="col-md-6 tab-100">

                        <!-- form -->
                        <div class="form">
                                <h2 class="login-form form-title">
                                    Đăng Nhập
                                </h2>
                                <h2 class="signup-form form-title">
                                    Create your Account!
                                </h2>

                                <!-- login form -->
                            <form action="<?=BASE_URL?>/signIn" id="step1" class="login-form" method="post">
                                <div class="input-field">
                                    <input type="text" id="username" name="user_name" required>
                                    <label>
                                        Tên đăng nhập
                                    </label>
                                </div>
                                <div class="input-field delay-100ms">
                                    <input type="password" id="password" name="password" required>
                                    <label>
                                        Mật khẩu
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between flex-wrap">
                                    <div class="rememberme">
                                        <input type="checkbox">
                                        <label>Lưu đăng nhập?</label>
                                    </div>
                                    <a href="#" class="forget">Quên mật khẩu?</a>
                                </div>
                                <?php if(!empty($errors)): foreach($errors['loginError'] as $error):?>
                                    
                                    <div class="alert alert-danger">
                                        <?=$error??""?>
                                    </div>
                                    
                                <?php endforeach; endif?>
                                <div class="login-btn">
                                    <button type="submit" class="login">Đăng Nhập</button>
                                </div>
                            </form>

                            

                            <!-- social sign in -->
                            <div class="login-form signup_social">
                                <div class="divide-heading">
                                    <span>Đăng nhập với tài khoản mạng xã hội!</span>
                                </div>
                                <div class="social-signup">
                                    <a class="facebook" href="#"><i class="fa-brands fa-square-facebook"></i></a>
                                    <a class="twitter" href="#"><i class="fa-brands fa-twitter"></i></a>
                                    <a class="twitch" href="#"><i class="fa-brands fa-twitch"></i></a>
                                    <a class="youtube" href="#"><i class="fa-brands fa-youtube"></i></a>
                                </div>
                            </div>

                            
                            <div class="signup-form register-text">
                                You'll receive a confirmation email in your inbox with a link to activate your account. If you have any problems, <a href="#">contact us!</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    

    <div id="error">

    </div>
