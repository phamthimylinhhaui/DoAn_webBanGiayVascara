<div class="breadcrumb-area breadcrumb-height" data-bg-image="https://theme.hstatic.net/1000317997/1000499273/14/ms_banner_img1.jpg?v=198">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-12">
                <div class="breadcrumb-item">
                    <div class="main-breadcrum">
                        <h2 class="breadcrumb-heading">Tin Tức</h2>
                        <ul style="text-align:center">
                            <li>
                                <a href="index.php">Trang chủ <i class="pe-7s-angle-right"></i></a>
                            </li>
                            <li> Tin tức</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .container {
        width: 90%;
        margin: auto;
        position: relative;
    }
    .header {
        padding: 10px;
    }
    .row {
        display: flex;
        align-items: center;
    }
    .col5 {
        margin: 5px;
        line-height: 3;
        padding: 10px;
        width: 32%;
        padding-right: 33px;
        line-height: 1.5;
    }
    .dieuchinhcss {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box !important;
        -webkit-line-clamp: 1; /* number of lines to show */
        -webkit-box-orient: vertical;
    }
</style>
<div class=" container main">
    <div class="col-lg-12 order-lg-2 order-1">

        <div class="tab-content text-charcoal pt-8">
            <div class="tab-pane fade show active" id="list-view" role="tabpanel"
                 aria-labelledby="list-view-tab">
                <div class="product-grid-view row">
                    <?php
                    foreach ($news AS $new){
                        ?>
                        <div class="col-xl-4 col-lg-4 col-sm-6 pt-6">
                            <div class="product-item">
                                <div class="product-img img-zoom-effect">
                                    <a href="index.php?controller=new&action=detail&id=<?php echo $new['id'] ?>">
                                        <img class="img-full"
                                             src="<?php echo $new['image'] ?>"
                                             alt="Tin tức 1 ">
                                    </a>
                                    <div class="product-add-action">
                                        <ul>
                                            <li>
                                                <a href="index.php?controller=new&action=detail&id=<?php echo $new['id'] ?>">
                                                    <i class="pe-7s-look"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <a class="product-name dieuchinhcss main-color-vascara" href="index.php?controller=new&action=detail&id=<?php echo $new['id'] ?>"><?php echo $new['title']?></a>
                                    <div class="price-box pb-1 product-name dieuchinhcss main-color-vascara">
                                        <span class="new-price"><?php echo $new['description']?></span>
                                    </div>

                                </div>


                            </div>
                        </div>
                        <?php
                    }
                    ?>


                </div>
            </div>
        </div>

    </div>

  
</div>
