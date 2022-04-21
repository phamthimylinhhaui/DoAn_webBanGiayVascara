<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Quản lý tài khoản

            </h3>
        </div>

        <!-- Button trigger modal
        data-target="#create-user" của button phải merge với id của modal content
        -->
        <button type="button" class="btn btn-primary create-user" data-toggle="modal" data-target="#create-user" onclick="showFormCreate()">
            Thêm mới
        </button>
    </div>
</div>
<!-- /Page Header -->
<!-- Start alert -->
<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <div style="display: none" id="deletee" class="alert alert-danger text-center" role="alert"></div>
    </div>
    <div class="col-4"></div>
</div>
<!-- End alert -->

<!-- Modal show form create user-->
<div class="modal fade" id="create-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">

        </div>
    </div>
</div>

<table class="table users-table table-hover" id="list-users">
    <thead>
    <tr>
        <th>
            ID
        </th>
        <th>
            Ảnh đại diện
        </th>
        <th>
            Tên người dùng
        </th>
        <th>
            Tên tài khoản
        </th>
        <th>
            Ngày sinh
        </th>
        <th>
            Liên hệ
        </th>
        <th>
            Tùy chọn
        </th>
    </tr>
    </thead>

    <tbody>
    <?php
//    echo "<pre>";
//    print_r($users);
//    echo "</pre>";
    foreach($users as $user){

        ?>

        <tr id="user-row-<?php echo $user['id']; ?>">
            <td>
                <?php echo $user['id'];?>
            </td>

            <td>
                <img id="image" src="<?php
                if (isset($user['avatar']))
                echo $user['avatar'];?>" class="avatar">
            </td>

            <td>
                <?php echo $user['last_name'];?>
            </td>

            <td>
                <?php echo $user['username'];?>
            </td>

            <td>
                <?php if (isset($user['date_of_birth'])) echo $user['date_of_birth'];?>
            </td>

            <td>
                <?php if (isset($user['phone'])) echo $user['phone'];?>
            </td>

            <td >
                <!-- Button trigger modal for show-form-edit-user -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-user"  onclick="showFormEdit(<?php echo $user['id']; ?>)">
                    Sửa
                </button>


                <button type="button" class="btn btn-danger" onclick="deleteUser(<?php echo $user['id']; ?>)">
                    Xóa
                </button>

            </td>
        </tr>

    <?php }?>
    <tr>
        <td colspan="7" ><?php echo $pages; ?></td>
    </tr>

    </tbody>
</table>
<!-- Modal for show-form-edit-user -->
<div class="modal fade" id="edit-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content edit-user">

        </div>
    </div>
</div>

<?php
require_once "views/users/script.php";
?>



