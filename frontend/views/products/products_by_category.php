<main class="main-content">


    <div class="breadcrumb-area breadcrumb-height" data-bg-image="https://theme.hstatic.net/1000317997/1000499273/14/ms_banner_img1.jpg?v=198">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <div class="main-breadcrum">
                            <h2 class="breadcrumb-heading">Danh mục <?php echo $category['name'];?></h2>
                            <ul style="text-align:center">
                                <li>
                                    <a href="index.php">Trang chủ <i class="pe-7s-angle-right"></i></a>
                                </li>
                                <li> Danh mục <?php echo $category['name'];?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .widgets-searchbox .input-field {
            margin-bottom: 30px;
            height: 45px;
            padding-right: 0px;
        }
        .nice-select.form-select.filter-select.wide.rounded-0 {
            border: 1px solid #201d1d1f;
        }
        .nice-select:after{
            display:none;
        }
        .product-item {
            box-shadow: 0px 0px 2px 1px rgb(244 122 132 / 56%);
            border-radius: 10px;
        }


        button.shop-widget-btn {
            background: #ffff;
            border: 1px solid;
            padding: 5px 20px;
            border-radius: 10px;
            color: #bac34e;
        }
    </style>
    <div class="shop-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="title mb-0  main-color-vascara mb-6">Danh mục sản phẩm <?php echo $category['name'];?></h2>
                    <p style="padding: 0px 250px">Mỗi ngành nghề sẽ có những đặc trưng riêng, và thời trang cũng vậy. Sự khác biệt đó nếu được thể hiện qua yếu tố truyền tải mạnh mẽ nhất – giày – sẽ giúp người đối diện ấn tượng đến bạn nhiều hơn. Ngoài ra,
                        do đặc thù của lĩnh vực này nên thương hiệu giày cần được đặc biệt chăm chút hơn.</p>

                </div>


                <div class="col-lg-12 order-lg-2 order-1">

                    <div class="tab-content text-charcoal pt-8">
                        <div class="tab-pane fade show active" id="list-view" role="tabpanel"
                             aria-labelledby="list-view-tab">
                            <div class="product-grid-view row">
                                <?php
                                foreach ($products AS $product){
                                    ?>
                                    <div class="col-xl-3 col-lg-4 col-sm-6 pt-6">
                                        <div class="product-item">
                                            <div class="product-img img-zoom-effect">
                                                <a href="index.php?controller=product&action=detail&id=<?php echo $product['id'] ?>">
                                                    <img class="img-full"
                                                         src="<?php echo $product['avatar'] ?>"
                                                         alt="Sản phẩm 1 ">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
<!--                                                        <li>-->
<!--                                                            <a type="button" href="index.php?controller=cart&action=index" onclick="addToCart(40, 10)" title="Thêm vào giỏ" class="product-add">-->
<!--                                                                <i class="pe-7s-cart"></i>-->
<!--                                                            </a>-->
<!--                                                        </li>-->
                                                        <li class="add-to-cart" data-id="<?php echo $product['id']; ?>"  >
                                                            <a type="button" href="#"  title="Thêm vào giỏ" class="product-add"><i class="pe-7s-cart"></i></a>                                   </a>
                                                        </li>

                                                        <li>
                                                            <a href="index.php?controller=product&action=detail&id=<?php echo $product['id'] ?>">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name dieuchinhcss main-color-vascara" href="index.php?controller=product&action=detail&id=<?php echo $product['id'] ?>"><?php echo $product['name']?></a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">Giá: <?php echo number_format($product['price'])?> vnđ</span>
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
<!--                    <div class="pagination-area pt-10">-->
<!--                        <nav aria-label="Page navigation example">-->
<!--                            <ul class="pagination justify-content-center">-->
<!--                                <div class="pagination-container"><ul class="pagination"><li class="page-link page-item active"><a>1</a></li><li class="page-link page-item"><a href="/Category/Detail/1?page=2">2</a></li><li class="page-link page-item PagedList-skipToNext"><a href="/Category/Detail/1?page=2" rel="next">»</a></li></ul></div>-->
<!--                            </ul>-->
<!--                        </nav>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </div>
</main>
