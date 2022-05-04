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

                    <form class="user-form" action="/Profile/Register" method="post" style="text-align: center">
                        <input name="__RequestVerificationToken" type="hidden" value="eMvLpvasMxMUfPYL1EzKI2ueN8FRxx81F5prsG3CWSYLA1r0buVor1VrheHgIgykmfqM3S3YVOYdDrFZFgeWMp7soxC5Vqn_Ys1IWAG6lhU1" />

                        <div class="form-group">
                            <input class="form-control text-box single-line" data-val="true" data-val-length="The field full_name must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Tên không được để trống!" id="full_name" name="full_name" placeholder="Nhập họ tên" type="text" value="" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="full_name" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <input class="form-control text-box single-line" data-val="true" data-val-length="The field email must be a string with a maximum length of 100." data-val-length-max="100" data-val-required="Email không được để trống!" id="email" name="email" placeholder="Nhập địa chỉ mail" type="email" value="" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="email" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <input class="form-control text-box single-line password" data-val="true" data-val-length="The field password must be a string with a maximum length of 200." data-val-length-max="200" data-val-minlength="Mật khẩu tối thiểu 6 ký tự." data-val-minlength-min="6" data-val-required="Mật khẩu không được để trống!" id="password" name="password" placeholder="Nhập mật khẩu" type="password" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="password" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <input class="form-control text-box single-line password" data-val="true" data-val-equalto="Mật khẩu không khớp." data-val-equalto-other="*.password" data-val-minlength="Mật khẩu tối thiểu 6 ký tự." data-val-minlength-min="6" data-val-required="Mật khẩu nhập lại không được để trống!" id="confirm_password" name="confirm_password" placeholder="Nhập lại mật khẩu" type="password" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="confirm_password" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <input class="form-control text-box single-line" data-val="true" data-val-length="Số điện thoại không đúng định dạng" data-val-length-max="11" data-val-maxlength="Số điện thoại không đúng định dạng" data-val-maxlength-max="11" data-val-required="Số điện thoại không được để trống!" id="phone_number" name="phone_number" placeholder="Nhập số điện thoại" type="text" value="" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="phone_number" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <input class="form-control text-box single-line" data-val="true" data-val-length="The field address must be a string with a maximum length of 100." data-val-length-max="100" data-val-required="Địa chỉ không được để trống!" id="address" name="address" placeholder="Nhập địa chỉ" type="text" value="" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="address" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-button">
                            <button type="submit" style="border-color: #f15b67; font-size: 18px; ">Đăng ký</button>
                        </div>
                    </form>
                    <div class="user-form-remind">
                        <p>Bạn đã có tài khoản?<a href="index.php?controller=auth&action=login" class="text-danger">Đăng nhập</a></p>
                    </div>

                </div>
            </div>
        </div>
</section>

