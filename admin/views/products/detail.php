<div class="content container-fluid">
    <div class="row">
        <div class="col-xl-8 offset-xl-2">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Sửa sản sản phẩm</h3>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="card">
                <div class="card-body">
                    <!-- Form -->
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>ID</label>
                            <input class="form-control text-box single-line"  id="product_name" name="name" type="text" value="<?php echo $product['id'];?>" readonly/>
                            <span class="field-validation-valid text-danger" data-valmsg-for="product_name" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input class="form-control text-box single-line"  id="product_name" name="name" type="text" value="<?php echo $product['name'];?>" readonly />
                            <span class="field-validation-valid text-danger" data-valmsg-for="product_name" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Ảnh đại diện</label>
                            <img id="output" class="img-rounded" width="100" height="100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6xzz1W1CI__132MzHFECHPDSvupa4j2K32szHkZpmLIO69CxsXfqkGZZeBW1aw-6gHvw&usqp=CAU" alt="Ảnh"  style="display:block; margin:0 auto"/>
                        </div>
                        <div class="form-group">
                            <label>Giá bán</label>
                            <input readonly class="form-control text-box single-line"  id="product_price" name="price" type="text" value="<?php echo number_format($product['price']);?>" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="product_price" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <label>Kiểu gót và độ cao gót:</label>
                            <input readonly class="form-control text-box single-line"  id="product_source" name="height" type="text" value="<?php echo $product['height'];?>" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="product_source" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <label>Loại mũi và chất liệu</label>
                            <input readonly class="form-control text-box single-line" id="type" name="type" type="text" value="<?php echo $product['type'];?>" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="product_weight" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <label>Số lượng trong kho</label>
                            <input readonly class="form-control text-box single-line"  id="amount" name="amount" type="number" value="<?php echo $product['amount'];?>" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="product_amount" data-valmsg-replace="true"></span>
                        </div>

                        <div class="form-group">
                            <label>Danh mục</label>
                            <input readonly class="form-control text-box single-line"  id="amount" name="amount" type="text" value="<?php echo $category['name'];?>" />
                        </div>

                        <div class="form-group">
                            <label for="">Phù hợp sử dụng</label>

                            <input readonly class="form-control text-box single-line" id="product_description" name="description" type="text" value="<?php echo $product['description'];?>" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="product_description" data-valmsg-replace="true"></span>
                        </div>

                    </form>
                    <!-- /Form -->
                </div>
            </div>
        </div>
    </div>
</div>

