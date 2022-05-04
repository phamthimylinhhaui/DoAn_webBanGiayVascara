<div class="content container-fluid">
    <div class="row">
        <div class="col-xl-8 offset-xl-2">
            <!-- Page Header -->
            <?php if (empty($category)): ?>
                <h2>Không tồn tại category</h2>
            <?php else: ?>

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Chỉnh sửa danh mục # <?php echo $category['id'] ?> </h3>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="card">
                <div class="card-body">
                    <!-- Form -->
                    <form method="post" action="" enctype="multipart/form-data" id="edit-category">
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input class="form-control text-box single-line"  id="category_name" name="name" type="text" value="<?php echo isset($_POST['name']) ? $_POST['name'] : $category['name']; ?>" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="category_name" data-valmsg-replace="true"></span>
                        </div>


                        <div class="form-group">
                            <label>Mô tả</label>
                            <input class="form-control text-box single-line"  id="category_name" name="description" type="text" value="<?php echo isset($_POST['description']) ? $_POST['description'] : $category['description']; ?>" />
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
                                <option value="1" <?php echo $selected_active  ?> >Hoạt động</option>
                                <option value="0" <?php echo $selected_disabled ?> >Không hoạt động</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
                            <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
                        </div>
                    </form>
                    <!-- Form -->
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>