<?php require_once "views/layouts/css.php"?>
<style>
    input{
        margin: 10px;
        padding: 5px;
    }
</style>

<div class="breadcrumb-area breadcrumb-height" data-bg-image="https://theme.hstatic.net/1000317997/1000499273/14/ms_banner_img1.jpg?v=198">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-12">
                <div class="breadcrumb-item">
                    <div class="main-breadcrum">
                        <h2 class="breadcrumb-heading">Đăng ký</h2>
                        <ul style="text-align:center">
                            <li>
                                <a href="/">Trang chủ <i class="pe-7s-angle-right"></i></a>
                            </li>
                            <li> Đăng ký</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="user-form-part">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
                <div class="user-form-card">
                    <div class="user-form-title">
                        <a href="/" class="header-logo-login">
                            <img src="assets/images/logo/vascra.png" alt="Header Logo">
                        </a>
                        <p style="padding-top:10px">Chào mừng bạn đã đến với VASCARA. Vui lòng nhập đúng thông tin để đăng kí</p>
                    </div>

                    <form class="user-form" action="" method="POST" style="text-align: center">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label for="username" class="input-group-text">Tên đăng nhập</label>
                                </div>
                                <input class="form-control text-box single-line username" data-val="true" id="username" style="height: 38px;margin-top: 0px;"
                                       name="username" type="text" value=""/>
                            </div>
                            <span class="help-block username-validate"/>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label for="password" class="input-group-text">Mật khẩu</label>
                                </div>
                                <input class="form-control text-box single-line password" data-val="true" id="password" style="height: 38px;margin-top: 0px;"
                                       name="password" type="password"/>
                            </div>
                            <span class="help-block password-validate"/>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label for=password" class="input-group-text">Gõ lại mật khẩu</label>
                                </div>
                                <input class="form-control text-box single-line password re-password" name="password_confirm" style="height: 38px; margin-top: 0px;"
                                       data-val="true" id="re-password" type="password"/>
                            </div>
                            <span class="help-block re-password-validate"/>
                        </div>

                        <div class="row form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label for="email" class="input-group-text">Email</label>
                                </div>
                                <input class="form-control text-box single-line email" data-val="true" id="email" style="height: 38px;margin-top: 0px;"
                                       name="email" type="email" value=""/>
                            </div>
                            <span class="help-block email-validate"/>
                        </div>

                        <div class="row form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label for="date_of_birth" class="input-group-text">Ngày sinh</label>
                                </div>
                                <input class="form-control text-box single-line date-of-birth" data-val="true" style="height: 38px; margin-top: 0px;"
                                       id="date-of-birth" name="date_of_birth"
                                       type="date" value=""/>
                            </div>
                            <span class="help-block date-of-birth-validate"/>
                        </div>

                        <div class="row form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label for="name" class="input-group-text">Họ và tên</label>
                                </div>
                                <input class="form-control text-box single-line name" data-val="true" id="name" style="height: 38px; margin-top: 0px;"
                                       name="name" type="text" value=""/>
                            </div>
                            <span class="help-block fullname-validate"/>
                        </div>

                        <input type="submit" name="submit" value="Đăng ký" class="btn btn-primary"
                               style="background: #F15B67;width: 290px;"/>
                        <br />
                    </form>
                        <div class="user-form-remind">
                            <p>Bạn đã có tài khoản?<a href="index.php?controller=auth&action=login" class="text-danger">Đăng nhập</a></p>
                        </div>
                </div>


                </div>
            </div>
        </div>
</section>

