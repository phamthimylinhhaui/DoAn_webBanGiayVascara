<div class="content container-fluid">
    <div class="row">
        <div class="col-xl-8 offset-xl-2">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Thêm danh mục</h3>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="card">
                <div class="card-body">
                    <!-- Form -->
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input class="form-control text-box single-line" data-val="true" data-val-length="The field category_name must be a string with a maximum length of 100." data-val-length-max="100" data-val-required="Tên danh mục không được để trống" id="category_name" name="name" type="text" value="" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="category_name" data-valmsg-replace="true"></span>
                        </div>



                        <div class="form-group">
                            <label>Mô tả</label>
                            <input class="form-control text-box single-line" data-val="true" data-val-length="The field category_name must be a string with a maximum length of 100." data-val-length-max="100" data-val-required="Tên danh mục không được để trống" id="category_name" name="description" type="text" value="" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="category_name" data-valmsg-replace="true"></span>
                        </div>

                        <div class="form-group">
                            <?php
                            $selected_active = '';
                            $selected_disabled = '';
                            if (isset($_POST['status'])) {
                                switch ($_POST['status']) {
                                    case 0:
                                        $selected_disabled = 'selected';
                                        break;
                                    case 1:
                                        $selected_active = 'selected';
                                        break;
                                }
                            }
                            ?>
                            <label>Trạng thái</label>
                            <select name="status" class="form-control">
                                <option value="0" <?php echo $selected_disabled ?> >Không hoạt động</option>
                                <option value="1" <?php echo $selected_active ?> >Hoạt động</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" name="submit"  value="Lưu"/>
                            <div style="margin-bottom:5px;">
                                <input onclick="history.go(-1);" type="button" value="Quay lại" class="btn btn-danger">
                            </div>
                        </div>
                    </form>
                    <!-- Form -->
                </div>
            </div>
        </div>
    </div>