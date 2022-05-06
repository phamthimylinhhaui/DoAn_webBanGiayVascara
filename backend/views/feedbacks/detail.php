<div class="content container-fluid">
    <div class="row">
        <div class="col-xl-8 offset-xl-2">
            <!-- Page Header -->
            <?php if (empty($feedback)): ?>
                <h2>Không tồn tại phản hồi này</h2>
            <?php else: ?>

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Chi tiết phản hồi # <?php echo $feedback['id'] ?> </h3>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="card">
                <div class="card-body">
                    <!-- Form -->
                    <form method="post" action="" enctype="multipart/form-data" id="edit-category">
                        <div class="form-group">
                            <label>Tên người phản hồi</label>
                            <input readonly class="form-control text-box single-line"  id="category_name" name="name" type="text" value="<?php echo isset($_POST['name']) ? $_POST['name'] : $feedback['name']; ?>" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="category_name" data-valmsg-replace="true"></span>
                        </div>

                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input readonly class="form-control text-box single-line"  id="category_name" name="description" type="text" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : $feedback['phone']; ?>" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="category_name" data-valmsg-replace="true"></span>
                        </div>

                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea readonly class="form-control text-box single-line"  id="content" name="content" ><?php echo $feedback['content']?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Ngày tạo</label>
                            <input readonly class="form-control text-box single-line"  id="category_name" name="description" type="text" value="<?php echo isset($_POST['created_at']) ? $_POST['created_at'] : $feedback['created_at']; ?>" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="category_name" data-valmsg-replace="true"></span>
                        </div>
                        <div class="modal-footer">
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
<?php endif; ?>