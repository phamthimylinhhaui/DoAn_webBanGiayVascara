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

                        <form class="user-form" action="/Profile/Login" method="post" >
                            <input name="__RequestVerificationToken" type="hidden" value="d241dueAWhoCRsiW_n_4ie97WZmU8hTFd8UJxPFTBRJYinpgg5qIcy4861Sebs3iCD3ubNgpLsR6TBIinOlXi1S7BZL6Mi4-QhRp-uRmQDA1" />
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Nhập địa chỉ email" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" />
                            </div>
                            <div class="form-button">
                                <button type="submit" style="border-color: #f15b67; font-size: 18px; ">Đăng nhập</button>
                            </div>
                        </form>

                        <div class="user-form-remind">
                            <p>
                                Bạn chưa có tài khoản?<a href="index.php?controller=auth&action=register" style="color: #f15b67;">Đăng ký</a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

