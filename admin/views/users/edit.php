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
</style>

<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Sửa tài khoản</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form method="POST" action="" id="form-edit-user" enctype="multipart/form-data">
        <div class="row form-group" align="center">
            <img src="<?php echo $user['avatar'];?>" class="avatar-edit">
            <input type="file" name="avatar" class="input-avatar-edit" >
        </div>

        <div class="row form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Tên tài khoản: </span>
                </div>
                <input readonly type="text" class="form-control email" name="username" value="<?php echo $user['username'];?>">
            </div>
        </div>

        <div class="row form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Email</span>
                </div>
                <input  type="text" class="form-control email" name="email" value="<?php echo $user['email'];?>">

            </div>
            <span class="help-block email-validate" />
        </div>

        <div class="row form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Số điện thoại</span>
                </div>
                <input  type="text" class="form-control phone" name="phone" value="<?php echo $user['phone'];?>">

            </div>
            <span class="help-block phone-validate" />
        </div>

        <div class="row form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Họ và tên</span>
                </div>
                <input  type="text" class="form-control fullname" name="fullname" value="<?php echo $user['name'];?>">

            </div>
            <span class="help-block fullname-validate" />
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
                if (isset($user['role'])) {
                    switch ($user['role']) {
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
                    <span class="input-group-text" id="basic-addon1">Ngày sinh</span>
                </div>
                <input  type="date" class="form-control date-of-birth" name="date_of_birth" value="<?php echo $user['date_of_birth'];?>">

            </div>
            <span class="help-block date-of-birth-validate" />
        </div>

        <div class="modal-footer">
            <input type="submit" class="btn btn-primary" name="submit"  value="Save"/>
            <div style="margin-bottom:5px;">
                <input onclick="history.go(-1);" type="button" value="Back" class="btn btn-danger">
            </div>
        </div>

    </form>
</div>

<script>
    function initImageFile(image, inputFile){
        image.click(function (){
            inputFile.trigger('click');
        });

        inputFile.change(function (){
            var reader= new FileReader();

            reader.onload= function (e){
                var img=image[0];
                img.src=e.target.result;
            };

            reader.readAsDataURL(inputFile[0].files[0]);
        });
    }
    function initEditUserForm(){
        var form = $('#form-edit-user');
        var imageAvatar = form.find('.avatar-edit').first();
        var imageInput  = form.find('.input-avatar-edit').first();
        initImageFile(imageAvatar, imageInput);
    }

    $(document).ready(function(){

        initEditUserForm();

    });


</script>

