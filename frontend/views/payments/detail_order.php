<div class="container" style="margin: 100px;">
    <!-- load file layout chung -->
    <?php $this->fileLayout = "Layout.php"; ?>
    <div class="col-md-12" style="margin: auto;">

        <div class="panel panel-primary">
            <h2 class="panel-heading">Chi tiết hóa đơn</h2>
            <div class="panel-body">
                <!-- thong tin don hang -->
                <?php
                $price_total=0;
                foreach ($orderdetails AS $orderdetail){
                    $price_total=$price_total+ $orderdetail['product_price'] * $orderdetail['quantity'];
                }
                ?>
                <div class="row" style="width: 100%;margin: 10px;">
                    <div style="margin: 20px;width: 40%">
                        <table class="table">
                            <tr>
                                <th style="width: 100px;">Mã hóa đơn</th>
                                <td><?php echo $order['id'];?> </td>
                            </tr>
                            <tr>
                                <th style="width: 100px;">Họ tên</th>
                                <td> <?php echo $order['full_name']?> </td>
                            </tr>
                            <tr>
                                <th style="width: 100px;">Địa chỉ</th>
                                <td><?php echo $order['address'];?></td>
                            </tr>
                            <tr>
                                <th style="width: 100px;">Điện thoại</th>
                                <td><?php echo $order['phone'];?></td>
                            </tr>

                            <tr>
                                <th style="width: 100px;">Ngày đặt</th>
                                <td><?php echo $order['created_at'];?></td>
                            </tr>

                        </table>
                    </div>

                    <div style="margin: 20px;margin-left: 30px;width: 50%;">
                        <table class="table">
                            <tr>
                                <th style="width: 150px;">Tên tài khoản</th>
                                <td><?php echo $order['username'];?></td>
                            </tr>
                            <tr>
                                <th style="width: 100px;">Ghi chú</th>
                                <td><?php echo $order['note'];?></td>
                            </tr>
                            <tr>
                                <th style="width: 100px;">Tổng giá</th>
                                <td><?php echo number_format($price_total+25000);?> VNĐ</td>
                            </tr>
                            <tr>
                                <th style="width: 100px;">Trạng thái</th>
                                <td>
                                    <?php
                                    if (isset($order['status'])) {
                                        switch ($order['status']) {
                                            case 0:
                                                echo 'chuẩn bị hàng';
                                                break;
                                            case 1:
                                                echo 'đang giao';
                                                break;
                                            case 2:
                                                echo 'đã giao';
                                                break;
                                            case 3:
                                                echo 'hủy đơn';
                                                break;
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>

                            <?php if ($order['status']==2): ?>
                                <tr>
                                    <th style="width: 100px;">Ngày giao hàng</th>
                                    <td><?php echo $order['updated_at'];?></td>
                                </tr>
                            <?php endif; ?>

                            <?php if ($order['status']==3): ?>
                                <tr>
                                    <th style="width: 100px;">Ngày hủy đơn</th>
                                    <td><?php echo $order['updated_at'];?></td>
                                </tr>
                            <?php endif; ?>



                        </table>
                    </div>
                </div>



                <!-- /thong tin -->
                <table class="table table-bordered table-hover">
                    <tr>
                        <th style="width: 100px;">Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                    </tr>
                    <?php
                    foreach ($orderdetails AS $orderdetail){
                        ?>
                        <tr>
                            <td style="text-align: center;">
                                <img src="<?php echo $orderdetail['product_image']?>" style="width:100px;">
                            </td>
                            <td><?php echo $orderdetail['product_name']?></td>
                            <td style="text-align: center;"><?php echo number_format($orderdetail['product_price'])?></td>
                            <td style="text-align: center;"><?php echo $orderdetail['quantity']?></td>
                        </tr>
                        <?php
                    }?>
                </table>
            </div>
        </div>

        <div style="margin-bottom:5px;">
            <input onclick="history.go(-1);" type="button" value="Quay lại" class="btn btn-danger">
        </div>
    </div>
</div>