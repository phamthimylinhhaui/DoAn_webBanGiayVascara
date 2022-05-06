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
                    <div class="header-search-area d-none d-lg-block" style="width:630px">


                        <div class="header-searchbox">

                            <input class="input-field" type="text" placeholder="Nhập sản phầm tìm kiếm"
                                   id="keyword">
                            <button class="btn btn-outline-whisper btn-primary-hover" type="submit"
                                    onclick="onSearch()">
                                <i class="pe-7s-search"></i>
                            </button>
                        </div>




                    </div>
                    <div class="header-right">
                        <ul>
                            <li class="dropdown d-none d-md-block">

                                <a href="index.php?controller=auth&action=login" class="btn btn-link dropdown-toggle ht-btn p-0">
                                    <i class="pe-7s-users"> </i>
                                    <span
                                        style=" color: #797676; padding-left: 7px; font-size: 16px; padding-top: 3px;">Đăng
                                                nhập </span>
                                </a>



                            </li>

                            <li class="d-block d-lg-none" style="padding-top:6px">
                                <a href="#searchBar" class="search-btn toolbar-btn">
                                    <i class="pe-7s-search"></i>
                                </a>
                            </li>
                            <li class="minicart-wrap me-3 me-lg-0">

                                <a title="Cartlist" href="index.php?controller=cart&action=index" class="minicart-btn ">
                                    <i class="pe-7s-shopbag"></i>
                                    <span
                                        style="position: absolute; color: #e87474; left: 46px; font-weight: 600; top: -5px; font-size: 14px; ">Tổng:</span>
                                    <sup id="hdk-count" class="quantity"> 0 vnđ</sup>

                                </a>
                                <p class="dieuchinhcsscart">
                                    <small id="total-amount" style="font-weight:600">0</small>
                                </p>



                            </li>
                            <li class="mobile-menu_wrap d-block d-lg-none">
                                <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn pl-0">
                                    <i class="pe-7s-menu"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const onSearch = () => {
        const keyword = document.getElementById("keyword").value;

        window.location = `/Product/Search?keyword=${keyword}`;
    }
</script>