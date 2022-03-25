<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $this->title; ?></title>
    <?php require_once "views/layouts/css.php"?>

</head>
<body>
    <div class="main-wrapper">
        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <a href="dashboard.html" class="logo logo-small">
                    <img src="assets/logo.png"
                         alt="Logo"
                         width="30"
                         height="30" />
                </a>
            </div>
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-align-left"></i>
            </a>
            <a class="mobile_btn" id="mobile_btn" href="javascript:void(0);">
                <i class="fas fa-align-left"></i>
            </a>
            <ul class="nav user-menu">
                <!-- User Menu -->
                <li class="nav-item dropdown">
                    <a href="javascript:void(0)"
                       class="dropdown-toggle user-link nav-link"
                       data-toggle="dropdown">
                            <span class="user-img">
                                <img class="rounded-circle"
                                     src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQdeeVu5CWReDBpxNGN9QHVsVT6l33OLK4mIfcy6L-obDRXBxgGiSu3w44JIfj-MU9eu3Y&usqp=CAU"
                                     width="40"
                                     alt="Admin" />
                            </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="index.html">Đăng xuất</a>
                    </div>
                </li>
                <!-- /User Menu -->
            </ul>
        </div>
        <!-- /Header -->

        <!-- Sidebar menu -->
        <?php require_once "views/layouts/menu.php"?>
        <!-- /Sidebar -->


        <div class="page-wrapper">
            <div class="content container-fluid">
                <?php echo $this->content; ?>
            </div>
        </div>
    </div>

    <?php require_once "views/layouts/script.php";?>
</body>
</html>
