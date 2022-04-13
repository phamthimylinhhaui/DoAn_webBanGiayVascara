<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Quản lý tài khoản

            </h3>
        </div>
        <div class="col-auto text-right">
            <a href="index.php?controller=home&action=index"
               class="btn btn-primary ml-3">
                <i class="fas fa-plus"></i> Thêm tài khoản
            </a>
        </div>
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

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary create-user" data-toggle="modal" data-target="#create-user" onclick="showFormCreateUser();">
    Thêm mới
</button>
<!-- Modal -->
<div class="modal fade" id="create-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content create-user">

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
            <input type="text" class="form-control" placeholder="Tên người dùng">
        </th>
        <th>
            <input type="text" class="form-control" placeholder="Tên tài khoản">
        </th>
        <th>
            <input type="text" class="form-control" placeholder="Ngày sinh">
        </th>
        <th>
            <input type="text" class="form-control" placeholder="Liên hệ">
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
                <img src="<?php
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
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#edit-user"
                        onclick="showFormEdit(<?php echo $user->id; ?>)">
                    Sửa
                </button>

                <button type="button" class="btn btn-danger" onclick="deleteUser(<?php echo $user->id; ?>)">
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

<!-- Modal -->
<div class="modal fade" id="edit-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

        </div>
    </div>
</div>



