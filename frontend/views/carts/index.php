<!--Timeline items start -->
<div class="timeline-items container" style="margin:30px auto; ">
    <h2>Giỏ hàng của bạn</h2>
    <form action="index.php?controller=cart&action=update" method="post">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th width="40%">Tên sản phẩm</th>
                <th width="12%">Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền</th>
                <th></th>
            </tr>

            <?php
            // Khai báo tổng giá trị đơn hàng
            $total_cart = 0;
            foreach ($_SESSION['cart']
                     AS $product_id => $cart): ?>
                <tr>
                    <td>
                        <img class="product-avatar img-responsive"
                             src="<?php echo $cart['avatar'] ?>"
                             width="80">
                        <div class="content-product">
                            <a href="index.php?controller=product&action=detail&id=<?php echo $product_id?>"
                               class="content-product-a">
                              <?php echo $cart['name']; ?>
                            </a>
                        </div>
                    </td>
                    <td>
                        <!--  cần khéo léo đặt name cho input số lượng, để khi xử lý submit form update lại giỏ hànTin nổi bậtg sẽ đơn giản hơn    -->
                        <input type="number" min="0"
                               name="product_<?php echo $product_id;?> "
                               class="product-amount form-control"
                               value="<?php echo $cart['quantity']; ?>">
                    </td>
                    <td>
                      <?php echo number_format($cart['price']) ?>
                    </td>
                    <td>
                      <?php
                      $total_item = $cart['price'] * $cart['quantity'];
                      // Cộng dồn để lấy ra tổng giá trị đơn hàng
                      $total_cart += $total_item;
                      echo number_format($total_item);
                      ?>
                    </td>
                    <td>
                        <a class="content-product-a"
                           href="index.php?controller=cart&action=delete&id=<?php echo $product_id; ?>">
                            Xóa
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

            <tr>
                <td colspan="5" style="text-align: center">
                    Tổng giá trị đơn hàng:
                    <span class="product-price">
             <?php echo number_format($total_cart); ?> vnđ
            </span>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="product-payment">
                    <input type="submit" name="submit" value="Cập nhật lại giá" class="btn btn-primary">
                    <a href="thanh-toan.html" class="btn btn-success" onclick= return alert("xóa người dùng thành công", "success"); style="background: #F15B67;">Đến trang thanh toán</a>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
<!--Timeline items end -->
<script>
    function alert(message, type='info', detail ){
        Swal.fire(
            message,
            detail,
            type
        )
    }
</script>