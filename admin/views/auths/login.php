
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from truelysell-admin.dreamguystech.com/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Jun 2021 14:22:17 GMT -->
<head>
    <?php require_once "views/layouts/css.php"?>

</head>

<body>
<div class="main-wrapper">

    <div class="login-page">
        <div class="login-body container">
            <div class="loginbox">
                <div class="login-right-wrap">
                    <div class="account-header">
                        <div class="account-logo text-center mb-4">
                            <a href="index.html">
                                <img src="Asset/vascra.png" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <div class="login-header">

                        <h3 style="text-align: center; margin:30px 20px">Hệ thống quản trị <span class="text-vascara">VASCARA</span></h3>
                    </div>
                    <form  action="index.php?controller=home&action=index">

                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input name="email" class="form-control" type="text" placeholder="Nhập địa chỉ email">
                        </div>
                        <div class="form-group mb-4">
                            <label class="control-label">Mật khẩu</label>
                            <input name="password" class="form-control" type="password" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="text-center">
                            <button class="btn bg-vascara btn-block account-btn" >Đăng nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="Asset/js/jquery-3.5.0.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="Asset/js/popper.min.js"></script>
<script src="Asset/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Custom JS -->
<script src="Asset/js/admin.js"></script>

</body>


</html>