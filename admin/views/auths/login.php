
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from truelysell-admin.dreamguystech.com/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Jun 2021 14:22:17 GMT -->
<head>
    <?php require_once "views/layouts/css.php"?>
    <title>Admin</title>
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

                    <section class="content-header">
                        <?php if (isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger">
                                <?php
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                                ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($this->error)): ?>
                            <div class="alert alert-danger">
                                <?php
                                echo $this->error;
                                ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['success'])): ?>
                            <div class="alert alert-success">
                                <?php
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                                ?>
                            </div>
                        <?php endif; ?>
                        <!--        <div class="alert alert-danger">Lỗi validate</div>-->
                        <!--        <p class="alert alert-success">Thành công</p>-->
                    </section>

                    <div class="login-header">

                        <h3 style="text-align: center; margin:30px 20px">Hệ thống quản trị <span class="text-vascara">VASCARA</span></h3>
                    </div>
                    <form  action="" method="POST">

                        <div class="form-group">
                            <label class="control-label">Tên đăng nhập</label>
                            <input name="username" class="form-control" type="text" placeholder="Nhập tên tài khoản">
                        </div>
                        <div class="form-group mb-4">
                            <label class="control-label">Mật khẩu</label>
                            <input name="password" class="form-control" type="password" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="text-center">
                            <input type="submit" name="submit" value="Đăng nhập" class="btn btn-primary"
                                   style="background: #F15B67;width: 435px;"/>                        </div>
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