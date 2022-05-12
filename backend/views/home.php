<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col-12">
            <h3 class="page-title">Xin chào STAFF</h3>
        </div>
    </div>
</div>
<!-- /Page Header -->
<div class="row">
    <div class="col-xl-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                                        <span class="dash-widget-icon bg-primary">
                                            <i class="far fa-user"></i>
                                        </span>
                    <div class="dash-widget-info">
                        <h3><?php echo $amount_user;?></h3>
                        <h6 class="text-muted">Người dùng</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                                        <span class="dash-widget-icon bg-primary">
                                             <i class="fab fa-buffer"></i>
                                        </span>
                    <div class="dash-widget-info">
                        <h3><?php echo $amount_product;?></h3>
                        <h6 class="text-muted">Sản phẩm</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                                        <span class="dash-widget-icon bg-primary">
                                            <i class="far fa-credit-card"></i>
                                        </span>
                    <div class="dash-widget-info">
                        <h3><?php echo number_format($revenue);?> VNĐ</h3>
                        <h6 class="text-muted">Doanh thu tháng này</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

