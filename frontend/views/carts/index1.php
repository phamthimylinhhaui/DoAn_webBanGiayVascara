

<main class="main-content">

    <div class="breadcrumb-area breadcrumb-height" data-bg-image="https://theme.hstatic.net/1000317997/1000499273/14/ms_banner_img1.jpg?v=198">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <div class="main-breadcrum">
                            <h2 class="breadcrumb-heading">Giỏ hàng</h2>
                            <ul style="text-align:center">
                                <li>
                                    <a href="/">Trang chủ <i class="pe-7s-angle-right"></i></a>
                                </li>
                                <li>Giỏ hàng</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="inner-section checkout-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 alert-info" style="border-top: 3px solid #f26974 !important;">
                    <div class="account-card">
                        <div class="account-title">
                            <h4>Đơn hàng của bạn</h4>
                            <a onclick="clearCart()" href="/Checkout" style="color: #f15b67 ; border: 2px solid #f15b67; background: transparent;">Xoá giỏ hàng</a>
                        </div>
                        <div class="account-content"  id="cart">
                            <div class="table-scroll">
                                <table class="table-list">
                                    <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Ảnh</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody id="list-product-cart">
                                    <tr>
                                        <td class="table-serial">
                                            <h6>1</h6>
                                        </td>
                                        <td class="table-image"><img src="" alt="product"></td>
                                        <td class="table-name">
                                            <h6>Sản phẩm số 1</h6>
                                        </td>
                                        <td class="table-price">
                                            <h6>70,500 vnđ</h6>
                                        </td>
                                        <td class="table-quantity">
                                            <div class="cart-action-group" style="justify-content: center">
                                                <div class="product-action">
                                                    <button class="action-minus" onclick="minus(20)" title="Giảm">
                                                        <i class="icofont-minus"></i>
                                                    </button>
                                                    <input class="action-input" style="text-align:right;" title="Số lượng" id="qty20" type="number" readonly="" name="quantity" value="1">
                                                    <button class="action-plus" onclick="plus(20)" title="Tăng">
                                                        <i class="icofont-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="table-action">
                                            <a class="view" href="index.php?controller=product&action=detail&id=10">
                                                <i class="pe-7s-look"></i></a>
                                            <a class="trash" href="/Checkout" onclick="deleteInCart(20,70500,1)"><i class="pe-7s-trash"></i></a></td>
                                    </tr>

                                    <tr>
                                        <td class="table-serial">
                                            <h6>1</h6>
                                        </td>
                                        <td class="table-image"><img src="" alt="product"></td>
                                        <td class="table-name">
                                            <h6>Sản phẩm số 1</h6>
                                        </td>
                                        <td class="table-price">
                                            <h6>70,500 vnđ</h6>
                                        </td>
                                        <td class="table-quantity">
                                            <div class="cart-action-group" style="justify-content: center">
                                                <div class="product-action">
                                                    <button class="action-minus" onclick="minus(20)" title="Giảm">
                                                        <i class="icofont-minus"></i>
                                                    </button>
                                                    <input class="action-input" style="text-align:right;" title="Số lượng" id="qty20" type="number" readonly="" name="quantity" value="1">
                                                    <button class="action-plus" onclick="plus(20)" title="Tăng">
                                                        <i class="icofont-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="table-action">
                                            <a class="view" href="index.php?controller=product&action=detail&id=10">
                                                <i class="pe-7s-look"></i></a>
                                            <a class="trash" href="/Checkout" onclick="deleteInCart(20,70500,1)"><i class="pe-7s-trash"></i></a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="checkout-charge mt-5 mb-3">
                                <ul>
                                    <li><span>Tổng tiền: </span><span id="hdk-total">0 vnđ</span></li>
                                </ul>
                            </div>
                            <form action="/Invoice/Index" method="post">
                                <input hidden id="ids" name="ids" />
                                <button type="submit" class="checkout-proced btn btn-inline dieuchinhbg">Thanh toán</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


</main>