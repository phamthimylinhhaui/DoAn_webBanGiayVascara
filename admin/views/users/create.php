<style>
    #form-create-user{
        width: 90%;
        color: black;
        font-size: 14px;
        margin: auto;
    }
    .avatar-create {
        object-fit: cover;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        display: block;
        margin: auto;
    }
</style>

<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Thêm mới người dùng</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="index.php?controller=user&action=create" method="POST" id="form-create-user" enctype="multipart/form-data">
        <div class="row form-group" align="center">
            <img src="http://localhost/DoAn/publish/avatar_user/no-avatar.png" class="avatar-create">
            <input type="file" name="avatar" class="input-avatar-create" style="display: none" >
        </div>

        <div class="row form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Tên tài khoản:</span>
                </div>
                <input type="text" class="form-control username" name="username" >
            </div>
            <span class="help-block username-validate" />
        </div>

        <div class="row form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Mật khẩu:</span>
                </div>
                <input type="password" class="form-control password" name="password" >
            </div>
            <span class="help-block password-validate" />
        </div>

        <div class="row form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nhập lại mật khẩu:</span>
                </div>
                <input type="password" class="form-control re_password" name="re_password" >
            </div>
            <span class="help-block re-password-validate" />
        </div>

        <div class="row form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Email</span>
                </div>
                <input type="text" class="form-control email" name="email">

            </div>
            <span class="help-block email-validate" />
        </div>


        <div class="row form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Phân quyền</span>
                </div>
                <?php
                $selected0 = '';
                $selected1 = '';
                $selected2 = '';
                if (isset($_POST['role'])) {
                    switch ($_POST['role']) {
                        case 0:
                            $selected0 = 'selected';
                            break;
                        case 1:
                            $selected1 = 'selected';
                            break;
                        case 2:
                            $selected2 = 'selected';
                            break;
                    }
                }
                ?>
                <select name="role" class="form-control">
                    <option value="0" <?php echo $selected0 ?> >Khách hàng</option>
                    <option value="1" <?php echo $selected1 ?> >Nhân viên</option>
                    <option value="2" <?php echo $selected2 ?> >Admin</option>
                </select>

            </div>
            <span class="help-block phone-validate" />
        </div>

        <div class="row form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Số điện thoại</span>
                </div>
                <input type="text" class="form-control phone" name="phone">

            </div>
            <span class="help-block phone-validate" />
        </div>

        <div class="row form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Họ và tên</span>
                </div>
                <input type="text" class="form-control fullname" name="fullname">

            </div>
            <span class="help-block fullname-validate" />
        </div>

        <div class="row form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Ngày sinh</span>
                </div>
                <input type="date" class="form-control date-of-birth2" name="date_of_birth" >
            </div>
            <span class="help-block date-of-birth-validate" />
        </div>

        <div class="mt-4">
            <input type="submit" class="btn btn-primary" name="submit"  value="Save"/>
            <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
        </div>
    </form>
</div>

<script>
    function initCreateUserForm(){
        var form = $('#form-create-user');
        var imageAvatar = form.find('.avatar-create').first();
        var imageInput  = form.find('.input-avatar-create').first();
        initImageFile(imageAvatar, imageInput);
        createUser();
    }
    function alert(message, type='info', detail ){
        Swal.fire(
            message,
            detail,
            type
        )
    }



    $(document).ready(function(){

        initCreateUserForm();

    });


</script>

