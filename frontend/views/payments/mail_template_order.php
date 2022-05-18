<div class="wrap container" style="margin: 50px 330px; line-height: 2;">
    <h2>Cảm ơn <b><?php echo $_SESSION['user']['name']?></b> đã đặt hàng, </h2>
    <p>
        Mã đơn hàng của bạn: <b><?php echo $_SESSION['order_id']?></b>
    </p>
    <p>
        Số tiền cần thanh toán: <b><?php echo number_format($_SESSION['price_total']+25000) ?> VNĐ</b>
    </p>
    <div>
            Thông tin liên hệ trực tiếp với chúng tôi qua số điện thoại:
            <a href="tel:0879123123">0987599921</a>
        </p>
    </div>
</div>