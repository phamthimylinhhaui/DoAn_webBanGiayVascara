<style>
    #form-edit-user{
        width: 90%;
        color: black;
        font-size: 14px;
        margin: auto;
    }
    .avatar-edit {
        object-fit: cover;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        display: block;
        margin: auto;
    }
    .container1{
        width: 60%;
        margin: 10px auto;
    }
</style>
<div class="container1">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sửa thông tin tài khoản</h5>
    </div>
    <div class="modal-body">
    <form method="POST" action="" id="form-edit-user" enctype="multipart/form-data">
        <div class="form-group">
            <img id="output" class="img-rounded avatar-edit "  src="<?php echo $_SESSION['user']['avatar'];?>" alt="Ảnh" />
            <p class="text-center"><label for="ufile" style="cursor:pointer;">Chọn ảnh đại diện</label></p>
            <input name="avatar" id="ufile" type="file" style="display:none;" onchange="loadFile(event)" />
            <input data-val="true" data-val-length="The field product_image must be a string with a maximum length of 50." data-val-length-max="50" id="avatar" name="avatar" type="hidden" value="4850402bi-do-giong-nhat.jpg" />
        </div>



        <div class="row form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Tên tài khoản: </span>
                </div>
                <input readonly type="text" class="form-control email" name="username" style=" height: 38px;"
                       value="<?php echo $_SESSION['user']['username'];?>">
            </div>
        </div>

<!--        <div class="row form-group">-->
<!--            <div class="input-group mb-3">-->
<!--                <div class="input-group-prepend">-->
<!--                    <span class="input-group-text" id="basic-addon1">Mật khẩu cũ</span>-->
<!--                </div>-->
<!--                <input  type="password" class="form-control email" name="password_old" style=" height: 38px;">-->
<!--            </div>-->
<!--            <span class="help-block email-validate" />-->
<!--        </div>-->
<!---->
<!--        <div class="row form-group">-->
<!--            <div class="input-group mb-3">-->
<!--                <div class="input-group-prepend">-->
<!--                    <span class="input-group-text" id="basic-addon1">Mật khẩu mới</span>-->
<!--                </div>-->
<!--                <input  type="password" class="form-control email" name="password_new" style=" height: 38px;">-->
<!--            </div>-->
<!--            <span class="help-block email-validate" />-->
<!--        </div>-->




        <div class="row form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Email</span>
                </div>
                <input  type="email" class="form-control email" name="email" style=" height: 38px;"
                        value="<?php echo $_SESSION['user']['email'];?>">
            </div>
            <span class="help-block email-validate" />
        </div>


        <div class="row form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Số điện thoại</span>
                </div>
                <input  type="text" class="form-control phone" name="phone" style=" height: 38px;"
                        value="<?php echo $_SESSION['user']['phone'];?>">

            </div>
            <span class="help-block phone-validate" />
        </div>

        <div class="row form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Họ và tên</span>
                </div>
                <input  type="text" class="form-control fullname" name="name" style=" height: 38px;"
                        value="<?php echo $_SESSION['user']['name'];?>">
            </div>
            <span class="help-block fullname-validate" />
        </div>

        <div class="row form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Ngày sinh</span>
                </div>
                <input  type="date" class="form-control date-of-birth" name="date_of_birth" style=" height: 38px;"
                        value="<?php echo $_SESSION['user']['date_of_birth'];?>">

            </div>
            <span class="help-block date-of-birth-validate" />
        </div>


        <div class="modal-footer">
            <input type="submit" class="btn btn-primary" name="submit"  value="Lưu"/>
            <div style="margin-bottom:5px;">
                <input onclick="history.go(-1);" type="button" value="Quay lại" class="btn btn-danger">
            </div>
        </div>

    </form>
</div>
</div>

<script>
    var loadFile = function (event) {
        var image = document.getElementById("output");
        image.src = URL.createObjectURL(event.target.files[0])
    }
</script>

