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
            <img src="http://localhost/DoAn/publish/avatar/no-avatar.png" class="avatar-edit">
            <input type="file" name="avatar" class="input-avatar-edit" style="display: none;" >
        </div>

        <div class="row form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Tên tài khoản: </span>
                </div>
            </div>
        </div>

        <div class="row form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Email</span>
                </div>
                <input type="text" class="form-control email" name="email" value="">

            </div>
            <span class="help-block email-validate" />
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
                <input type="text" class="form-control fullname" name="fullname" value="">

            </div>
            <span class="help-block fullname-validate" />
        </div>

        <div class="row form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Ngày sinh</span>
                </div>
                <input type="text" class="form-control date-of-birth1" name="date_of_birth1" value="">

            </div>
            <span class="help-block date-of-birth-validate" />
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="button" class="btn btn-primary">Lưu thay đổi</button>
        </div>

    </form>
</div>

<script>
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

