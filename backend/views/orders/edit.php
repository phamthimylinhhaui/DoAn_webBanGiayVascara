<div class="content container-fluid">
    <div class="row">
        <div class="col-xl-8 offset-xl-2">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Sửa trạng thái đơn hàng</h3>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="card">
                <div class="card-body">
                    <!-- Form -->
                    <form method="post" action="" enctype="multipart/form-data" id="form-edit-user">
                        <div class="form-group">
                            <label>Mã đơn hàng</label>
                            <input readonly class="form-control text-box single-line"  id="product_name" name="name" type="text" value="<?php echo $order['id'];?>" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="product_name" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <label>Tên khách hàng</label>
                            <input readonly class="form-control text-box single-line"  id="product_name" name="name" type="text" value="<?php echo $order['full_name'];?>" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="product_name" data-valmsg-replace="true"></span>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Trạng thái</label>
                            <select name="status" class="form-control" id="category_id">

                                    <option value="0">đang giao </option>
                                    <option value="1">đã giao </option>
                                    <option value="2">hủy đơn </option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" name="submit"  value="Lưu"/>
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
    function initCreateUserForm(){
        var form = $('#form-edit-user');
        var imageAvatar = form.find('.avatar-create').first();
        var imageInput  = form.find('.input-avatar-create').first();
        initImageFile(imageAvatar, imageInput);
    }
    $(document).ready(function(){

        initCreateUserForm();

    });
</script>
