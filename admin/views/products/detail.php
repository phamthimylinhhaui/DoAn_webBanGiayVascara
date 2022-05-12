<div class="content container-fluid">
    <div class="row">
        <div class="col-xl-8 offset-xl-2">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Chi tiết sản sản phẩm</h3>
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
                            <label class="col-md-4">Ảnh</label>
                            <img id="output" class="img-rounded " width="200" height="200" src="<?php echo $product['avatar'];?>" alt="Ảnh" />
                            <p class="text-center"><label for="ufile" style="cursor:pointer;">Chọn file ảnh</label></p>
                            <input name="avatar" id="ufile" type="file" style="display:none;" onchange="loadFile(event)" />
                            <input data-val="true" data-val-length="The field product_image must be a string with a maximum length of 50." data-val-length-max="50" id="avatar" name="avatar" type="hidden" value="4850402bi-do-giong-nhat.jpg" />
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

                            <input readonly class="form-control text-box single-line" id="product_description" name="description1" type="text" value="<?php echo $product['description'];?>" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="product_description" data-valmsg-replace="true"></span>
                        </div>
                        <div class="modal-footer">
                            <div style="margin-bottom:5px;">
                                <input onclick="history.go(-1);" type="button" value="Quay lại" class="btn btn-danger">
                            </div>
                        </div>
                    </form>
                    <!-- /Form -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var loadFile = function (event) {
        var image = document.getElementById("output");
        image.src = URL.createObjectURL(event.target.files[0])
    }
</script>