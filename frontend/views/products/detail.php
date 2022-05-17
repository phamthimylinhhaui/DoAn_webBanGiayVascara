<main class="main-content">

    <div class="breadcrumb-area breadcrumb-height" data-bg-image="https://theme.hstatic.net/1000317997/1000499273/14/ms_banner_img1.jpg?v=198">
        <div class="container h-100" >
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <div class="main-breadcrum">
                            <h2 class="breadcrumb-heading">Sản phẩm của danh mục <?php echo $product['category_name'];?></h2>
                            <ul style="text-align:center">
                                <li>
                                    <a href="#">Trang chủ <i class="pe-7s-angle-right"></i></a>
                                </li>
                                <li>
                                    <a href="#"><?php echo $product['category_name'];?> <i class="pe-7s-angle-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area section-space-top-100" style="margin-bottom:50px">
        <div class="container">
            <div class="row">

                <div class="col-lg-6">
                    <div class="single-product-img h-100">
                        <div class="swiper-container single-product-slider">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide">

                                        <img class="img-full img-"
                                             src="<?php echo $product['avatar'];?>"
                                             alt="Product Image" style="width: 100%; max-height: 450px; margin: 0 auto; display: block; ">


                                </div>

                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="product-thumb-with-content row">
                        <div class="col-12 order-lg-1 order-2 pt-10 pt-lg-0">
                            <div class="single-product-content">
                                <h2 class="title pb-2"><?php echo $product['name'];?></h2>





                                <div class="price-box pb-1">
                                    Giá:<span class="new-price text-danger" style=" color: #f26570 !important;"> <?php echo number_format($product['price']);?> VNĐ</span>
                                </div>

                                <div class="product-category product-tags text-matterhorn pb-1">
                                    <span class="title"><b>Số lượng:</b></span>
                                    <ul>

                                        <li style="background: #f15b67; padding: 0px 10px; border-radius: 5px; color: #fff;">
                                            <a><?php echo $product['amount'];?></a>
                                        </li>


                                    </ul>
                                </div>


                                <div class="product-category text-matterhorn pb-2 pt-2">
                                    <span class="title"><b>Loại mũi và chất liệu:</b></span>
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <?php echo $product['type'];?>
                                            </a>
                                        </li>

                                    </ul>
                                </div>

                                <div class="product-category text-matterhorn pb-2 pt-2">
                                    <span class="title"><b>Kiểu gót và độ cao gót:</b></span>
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <?php echo $product['height'];?>
                                            </a>
                                        </li>

                                    </ul>
                                </div>

                                <div class="product-category text-matterhorn pb-2 pt-2">
                                    <span class="title"><b>Phù hợp sử dụng:</b></span>
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <?php echo $product['description'];?>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="product-category product-tags text-matterhorn pb-4">
                                    <ul>
                                        <span class="title"><b>Danh mục:</b></span>
                                        <li style="color: #f15e6a; padding: 0px 10px; background: #fff; border: 1px solid; border-radius: 5px; font-weight: 600;">
                                            <a><?php echo $product['category_name'];?></a>
                                        </li>

                                    </ul>
                                </div>



                                <ul class="quantity-with-btn pb-7 add-to-cart" data-id="<?php echo $product['id']; ?>">


                                    <a type="button" href="" class="product-add btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0"
                                       style="background: #f15b67; border-radius: 10px !important; border: 2px solid #fff;" onclick="addToCart(20, 98)" title="Add to Cart" >
                                        <i class="pe-7s-shopbag" style="padding-right:10px"></i><span>Thêm vào giỏ hàng</span>
                                    </a>

<!--                                    <li class="add-to-cart" data-id="--><?php //echo $product['id']; ?><!--"  >-->
<!--                                        <a type="button" href="#"  title="Thêm vào giỏ" class="product-add"><i class="pe-7s-cart"></i></a>                                   </a>-->
<!--                                    </li>-->
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
