<?php
//b29 2h09
$username = '';
$avatar = '';
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']['username'];
    $avatar = $_SESSION['user']['avatar'];
}

?>

<div class="header-top border-bottom d-none d-md-block" style="padding: 8px 0px;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-8">
                <div class="header-top-left">
                    <ul class="dropdown-wrap text-matterhorn">
                        <li style="margin-right: 50px;">
                            <i class="pe-7s-map-marker" style="color: #F15B67;"></i>
                            Số 298 Đ. Cầu Diễn, Minh Khai, Bắc Từ Liêm, Hà Nội
                        </li>
                        <li>
                            <i class="pe-7s-piggy"  style="color: #F15B67;"></i>
                            <a> Freeship cho đơn hàng từ 500.000đ </a>
                        </li>


                    </ul>
                </div>
            </div>
            <div class="col-4">
                <div class="header-top-right text-matterhorn">
                    <p class="shipping mb-0">
                        <i class="pe-7s-alarm"  style="color: #F15B67;"></i>

                        Mở cửa và phục vụ khách hàng 24/24h
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="header-middle py-5  header-sticky">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="header-middle-wrap">
                    <a href="index.php?controller=home&action=index" class="header-logo">
                        <img src="assets/images/logo/vascra.png" alt="Header Logo">
                    </a>

                    <div class="header-search-area d-none d-lg-block" style="width:450px!important;">
                    <!--index.php?controller=product&action=findByName-->
                        <form class="header-searchbox" action="index.php?controller=product&action=findByName" method="POST">
                            <input class="input-field" type="text" placeholder="Nhập sản phầm tìm kiếm"
                                   id="keyword" name="keyword">
                            <input type="submit" value="Tìm Kiếm"  class="btn btn-primary btn-outline-whisper" style="background-color:#F15B67; color: white; font-size: 18px; ">

                            </input>
                        </form>
                    </div>

                    <div class="header-right" style="width: 20%">
                        <ul>
                            <li class="dropdown d-none d-md-block">
                                <div class="dropup" ">
                                    <button class="dropbtn" style="background: #F5F6F7;!important ;color: black;; border-radius: 5px;">
                                        <?php if (isset($_SESSION['user'])): ?>
                                        <img src="<?php echo $avatar; ?>" class="user-image" alt="User Image"
                                             style="width: 40px;height: 40px; border-radius: 50%;">
                                        <span style="color: black;"  class="hidden-xs"><?php echo $username; ?></span>

                                        <?php else: ?>
                                          <a href="index.php?controller=auth&action=login" ><i style="color: black;" class="pe-7s-users"></i> Đăng nhập</a>
                                        <?php endif; ?>
                                    </button>

                                    <?php if (isset($_SESSION['user'])): ?>
                                        <div class="dropup-content" style="width: 170px;">
                                            <a href="index.php?controller=user&action=profile">Quản Lý tài khoản</a>
                                            <a href="index.php?controller=payment&action=list_order">Đơn hàng</a>
                                            <a href="index.php?controller=auth&action=logout">Đăng xuất</a>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </li>

<!--                            <li class="d-block d-lg-none" style="padding-top:6px">-->
<!--                                <a href="#searchBar" class="search-btn toolbar-btn">-->
<!--                                    <i class="pe-7s-search"></i>-->
<!--                                </a>-->
<!--                            </li>-->
<!---->
<!--                            <li class="minicart-wrap me-3 me-lg-0">-->
<!---->
<!--                                <a title="Cartlist" href="index.php?controller=cart&action=index" class="minicart-btn ">-->
<!--                                    <i class="pe-7s-shopbag"></i>-->
<!--                                    <span-->
<!--                                        style="position: absolute; color: #e87474; left: 46px; font-weight: 600; top: -5px; font-size: 14px; ">Tổng:</span>-->
<!--                                    <sup id="hdk-count" class="quantity"> 0 vnđ</sup>-->
<!--                                </a>-->
<!--                                <p class="dieuchinhcsscart">-->
<!--                                    <small id="total-amount" style="font-weight:600">0</small>-->
<!--                                </p>-->
<!--                            </li>-->
<!---->
<!--                            <li class="mobile-menu_wrap d-block d-lg-none">-->
<!--                                <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn pl-0">-->
<!--                                    <i class="pe-7s-menu"></i>-->
<!--                                </a>-->
<!--                            </li>-->

                            <li>
<!--                                --><?php
//                                    $gio='';
//                                    if (isset($_SESSION['cart'])){
//                                        $gio="gio-hang-cua-ban.html";
//                                    }else
//                                        $gio='#';
//                                 ?>

                                <a href="gio-hang-cua-ban.html" class="cart-link">
                                    <i class="fa fa-cart-plus"></i>
                                    <?php
                                    $cart_total = 0;
                                    if (isset($_SESSION['cart'])) {
                                        foreach ($_SESSION['cart'] AS $cart) {
                                            $cart_total += $cart['quantity'];
                                        }
                                    }
                                    ?>
                                    <span class="cart-amount">
                                        <?php echo $cart_total; ?>
                                    </span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <span class="ajax-message"></span>
    </div>
</div>

<script>
    const onSearch = () => {
        const keyword = document.getElementById("keyword").value;

        window.location = `/Product/Search?keyword=${keyword}`;
    }
</script>
