<!-- Start menu pc -->
<div class="main-header " style="border-top: 1px solid #f15c68; border-bottom: 1px solid #f15c68;">
    <div class="container">
        <div class="main-header_nav position-relative">
            <div class="row align-items-center">
                <div class="col-lg-12 d-none d-lg-block">
                    <div class="main-menu">
                        <nav class="main-nav">
                            <ul style="justify-content:left">
                                <li class="drop-holder">
                                    <a href="index.php?controller=home&action=index">
                                        <i class="pe-7s-home" style="font-size:20px"></i>

                                    </a>

                                </li>

                                <?php foreach ($categories as $category){?>
                                <li>
                                    <a href="index.php?controller=product&action=get_products_by_category&id=<?php echo $category['id']?>"><?php echo $category['name']?></a>
                                </li>

                                <?php }?>


                                <li>
                                    <a href="index.php?controller=new&action=index">Tin tức</a>
                                </li>
                            </ul>

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End menu pc -->

<!-- Start menu mobile -->
<style>
    .header-right {
        min-width: 0px;
    }

    .header-right>ul {
        justify-content: space-between;
    }

    ul.dropdown-wrap.justify-content-center.text-silver {
        background: #2b2828;
        padding: 20px;
    }

    .dropdown-wrap li .ht-btn:after {
        display: none;
    }

    .offcanvas-search_wrapper .harmic-offcanvas-body .offcanvas-search {
        justify-content: flex-start;
    }

    .main-header.header-sticky.sticky {
        top: 94px;
    }
</style>