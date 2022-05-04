<div class="content container-fluid">
    <div class="row">
        <div class="col-xl-8 offset-xl-2">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Thêm sản sản phẩm</h3>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="card">
                <div class="card-body">
                    <!-- Form -->
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input class="form-control text-box single-line" data-val="true" data-val-length="The field product_name must be a string with a maximum length of 100." data-val-length-max="100" data-val-required="Tên sản phẩm không được để trống" id="product_name" name="name" type="text" value="" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="product_name" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Ảnh đại diện</label>
                            <img id="output" class="img-rounded" width="100" height="100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6xzz1W1CI__132MzHFECHPDSvupa4j2K32szHkZpmLIO69CxsXfqkGZZeBW1aw-6gHvw&usqp=CAU" alt="Ảnh"  style="display:block; margin:0 auto"/>
                            <p class="text-center"><label for="ufile" style="cursor:pointer;"><i class="fas fa-upload"></i> Chọn file ảnh</label></p>
                            <input name="avatar" id="ufile" type="file" style="display:none;" onchange="loadFile(event)" />
                        </div>
                        <div class="form-group">
                            <label>Giá bán</label>
                            <input class="form-control text-box single-line" data-val="true" data-val-number="The field product_price must be a number." data-val-required="Giá không được để trống" id="product_price" name="price" type="text" value="" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="product_price" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <label>Kiểu gót và độ cao gót:</label>
                            <input class="form-control text-box single-line" data-val="true" data-val-length="The field product_source must be a string with a maximum length of 100." data-val-length-max="100" id="product_source" name="height" type="text" value="" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="product_source" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <label>Loại mũi và chất liệu</label>
                            <input class="form-control text-box single-line" data-val="true" data-val-length="The field product_weight must be a string with a maximum length of 100." data-val-length-max="100" id="type" name="type" type="text" value="" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="product_weight" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <label>Số lượng trong kho</label>
                            <input class="form-control text-box single-line" data-val="true" data-val-number="The field product_amount must be a number." data-val-required="Số lượng sản phẩm không được để trống" id="amount" name="amount" type="number" value="" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="product_amount" data-valmsg-replace="true"></span>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Chọn danh mục</label>
                            <select name="category_id" class="form-control" id="category_id">
                                <?php foreach ($categories as $category):
                                    $selected = '';
                                    if (isset($_POST['category_id']) && $category['id'] == $_POST['category_id']) {
                                        $selected = 'selected';
                                    }
                                    ?>
                                    <option value="<?php echo $category['id'] ?>" <?php echo $selected; ?>>
                                        <?php echo $category['name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Phù hợp sử dụng</label>

                            <input class="form-control text-box single-line" data-val="true" data-val-required="Mô tả không được để trống" id="product_description" name="description" type="text" value="" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="product_description" data-valmsg-replace="true"></span>
                        </div>

                        <div class="mt-4">
                            <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
                            <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
                        </div>
                    </form>
                    <!-- /Form -->
                </div>
            </div>
        </div>
    </div>
</div>

