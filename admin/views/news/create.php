<div class="content container-fluid">
    <div class="row">
        <div class="col-xl-8 offset-xl-2">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Thêm tin tức</h3>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="card">
                <div class="card-body">
                    <!-- Form -->
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Tiêu đề tin tức</label>
                            <input class="form-control text-box single-line" data-val="true" data-val-length="The field category_name must be a string with a maximum length of 100." data-val-length-max="100" data-val-required="Tên danh mục không được để trống" id="category_name" name="title" type="text" value="" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="category_name" data-valmsg-replace="true"></span>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Ảnh </label>
                            <img id="output" class="img-rounded" width="400" height="400" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6xzz1W1CI__132MzHFECHPDSvupa4j2K32szHkZpmLIO69CxsXfqkGZZeBW1aw-6gHvw&usqp=CAU" alt="Ảnh"  style="display:block; margin:0 auto"/>
                            <p class="text-center"><label for="ufile" style="cursor:pointer;"><i class="fas fa-upload"></i> Chọn file ảnh</label></p>
                            <input name="image" id="ufile" type="file" style="display:none;" onchange="loadFile(event)" />
                        </div>

                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control text-box single-line" data-val="true" id="new_description" name="description" ></textarea>
                            <span class="field-validation-valid text-danger" data-valmsg-for="category_name" data-valmsg-replace="true"></span>
                        </div>

                        <div class="form-group">
                            <label>Người tạo tin</label>
                            <input class="form-control text-box single-line" data-val="true" data-val-length="The field category_name must be a string with a maximum length of 100." data-val-length-max="100" data-val-required="Tên danh mục không được để trống" id="category_name" name="username" type="text" value="" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="category_name" data-valmsg-replace="true"></span>
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
    <script>
        var loadFile = function (event) {
            var image = document.getElementById("output");
            image.src = URL.createObjectURL(event.target.files[0])
        }
    </script>