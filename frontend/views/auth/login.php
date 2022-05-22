<?php require_once "views/layouts/css.php"?>
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="https://theme.hstatic.net/1000317997/1000499273/14/ms_banner_img1.jpg?v=198">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <div class="main-breadcrum">
                            <h2 class="breadcrumb-heading">Đăng Nhập</h2>
                            <ul style="text-align:center">
                                <li>
                                    <a href="/">Trang chủ <i class="pe-7s-angle-right"></i></a>
                                </li>
                                <li> Đăng Nhập</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="user-form-part">
        <div class="container" style="margin: auto">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
                    <div class="user-form-card" style="padding: 10px;">
                        <div class="user-form-title">
                            <a href="/" class="header-logo-login">
                                <img align="center" src="assets/images/logo/vascra.png" alt="Header Logo">
                            </a>
                            <p style="padding-top:10px;margin: 5px; text-align: center">Chào mừng bạn đã đến với VASCARA. Vui lòng nhập đúng thông tin để đăng nhập</p>
                        </div>

                        <form class="user-form" method="POST" id="login-form" action="">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label for="username" class="input-group-text">Tên đăng nhập</label>
                                    </div>
                                    <input class="form-control text-box single-line username" data-val="true" id="username" style="height: 38px;"
                                           name="username" type="text" value=""/>
                                </div>
                                <span class="help-block login-username-validate"/>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label for="password" class="input-group-text">Mật khẩu</label>
                                    </div>
                                    <input class="form-control text-box single-line password" data-val="true" id="password" style="height: 38px;"
                                           name="password" type="password"/>
                                </div>
                                <span class="help-block login-password-validate"/>
                            </div>

                            <input type="submit" name="submit" value="Đăng nhập" class="btn btn-primary"
                                   style="background: #F15B67;width: 435px;"/>
                            <br />

                        </form>

                        <div class="user-form-remind">
                            <p>
                                Bạn chưa có tài khoản?<a href="index.php?controller=auth&action=register" style="color: #f15b67;">Đăng ký</a>tại đây
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

