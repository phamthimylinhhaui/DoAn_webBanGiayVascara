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
        <div style="display: none" id="delete" class="alert alert-danger text-center" role="alert"></div>
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
            Phân quyền
        </th>
        <th>
            Ngày sinh
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
                <?php echo $user['name'];?>
            </td>

            <td>
                <?php echo $user['username'];?>
            </td>

            <td>
                <?php
                $role='';
                if ( isset($user['role']) )
                {
                    switch ($user['role']) {
                        case 0:
                            $role = 'Khách hàng';
                            break;
                        case 1:
                            $role = 'Nhân viên';
                            break;
                        case 2:
                            $role = 'Admin';
                            break;
                    }
                }
                echo $role;
                ?>
            </td>

            <td>
                <?php if (isset($user['date_of_birth'])) echo $user['date_of_birth'];?>
            </td>

            <td >
                <!-- Button trigger modal for show-form-edit-user -->
                <a type="button" class="btn btn-info"   href="index.php?controller=user&action=edit&id=<?php echo $user['id'] ?>"
                >
                    Sửa
                </a>


                <a type="button" class="btn btn-danger" href="index.php?controller=user&action=delete&id=<?php echo $user['id'] ?>" title="Xóa"
                   onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này')">
                    Xóa
                </a>

            </td>
        </tr>

    <?php }?>
<!--    <tr>-->
<!--        <td colspan="7" >--><?php //echo $pages; ?><!--</td>-->
<!--    </tr>-->

    </tbody>
</table>
<!-- Modal for show-form-edit-user -->

<?php
require_once "views/users/script.php";
?>
<!--datatable-->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script>
<?php include "views/users/script.php"?>
<script>
    $(document).ready(function(){
        // alert("Thành công",'success');

        initDatatable($('#list-users'),true);
    });
</script>



