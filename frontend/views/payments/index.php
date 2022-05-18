<?php
require_once 'helpers/Helper.php';
?>
<div class="container" style="margin:30px auto; line-height:1.5; ">
    <h2>Thanh toán</h2>
    <form action="index.php?controller=payment&action=payment" method="POST">
        <div class="row">
            <div class="col-md-5 col-sm-4" style="line-height: 3;">
                <h5 class="center-align">Thông tin khách hàng</h5>
                <div class="form-group">
                    <label>Họ tên khách hàng</label>
                    <input type="text" name="fullname" value="" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="address" value="" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>SĐT</label>
                    <input type="text"  name="phone" value="" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Ghi chú thêm</label>
                    <textarea name="note" class="form-control"  placeholder="Vui lòng ghi lại số size của giày"></textarea>
                </div>
                <div class="form-group">
                    <label>Chọn phương thức thanh toán</label> <br />
                    <input type="radio"  checked value="1" /> Thanh toán khi nhận hàng <br />
                </div>
            </div>
            <div class="col-md-7 col-sm-8" style="line-height: 3;>
                <h5 class="center-align">Thông tin đơn hàng của bạn</h5>
              <?php
              //biến lưu tổng giá trị đơn hàng
              $total = 0;
              if (isset($_SESSION['cart'])):
                ?>
                  <table class="table table-bordered">
                      <tbody>
                      <tr>
                          <th width="40%">Tên sản phẩm</th>
                          <th width="12%">Số lượng</th>
                          <th>Giá</th>
                          <th>Thành tiền</th>
                      </tr>
                      <?php foreach ($_SESSION['cart'] AS $product_id => $cart):
                        $product_link = 'san-pham/' . Helper::getSlug($cart['name']) . "/$product_id";
                        ?>
                          <tr>
                              <td>
                                <?php if (!empty($cart['avatar'])): ?>
                                    <img class="product-avatar img-responsive"
                                         src="<?php echo $cart['avatar']; ?>" width="60"/>
                                <?php endif; ?>
                                  <div class="content-product">
                                      <a href="<?php echo $product_link; ?>" class="content-product-a">
                                        <?php echo $cart['name']; ?>
                                      </a>
                                  </div>
                              </td>
                              <td>
                              <span class="product-amount">
                                  <?php echo $cart['quantity']; ?>
                              </span>
                              </td>
                              <td>
                              <span class="product-price-payment">
                                 <?php echo number_format($cart['price'], 0, '.', '.') ?> vnđ
                              </span>
                              </td>
                              <td>
                              <span class="product-price-payment">
                                  <?php
                                  $price_total = $cart['price'] * $cart['quantity'];
                                  $total += $price_total;
                                  ?>
                                <?php echo number_format($price_total, 0, '.', '.') ?> vnđ
                              </span>
                              </td>
                          </tr>
                      <?php endforeach; ?>
                      <tr>
                          <td colspan="5">Phí ship toàn quốc: <span>25.000</span> VNĐ</td>
                      </tr>
                      <tr>
                          <td colspan="5" class="product-total">
                              Tổng giá trị đơn hàng:
                              <span class="product-price">
                                <?php echo number_format($total+25000, 0, '.', '.') ?> vnđ
                            </span>
                          </td>
                      </tr>
                      </tbody>
                  </table>
              <?php endif; ?>

            </div>
        </div>
        <input type="submit" name="submit" value="Thanh toán" class="btn btn-primary">
        <a href="gio-hang-cua-ban.html" class="btn btn-secondary" style="background: #F15B67;">Về trang giỏ hàng</a>
    </form>
</div>