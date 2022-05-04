<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Quản lý sản phẩm
            </h3>
        </div>
        <a type="button" class="btn btn-primary create-user" href="index.php?controller=product&action=create">
            Thêm mới
        </a>
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

<table class="table users-table table-hover" id="list-users">
    <thead>
    <tr>
        <th>
            ID
        </th>
        <th>
           Mã danh mục sản phẩm
        </th>
        <th>
            Tên sản phẩm
        </th>
        <th>
            Ảnh
        </th>
        <th>
            Giá
        </th>
        <th>
            Mô tả
        </th>
        <th>
            Ngày tạo
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
    foreach($products as $product){

        ?>

        <tr id="user-row-<?php echo $product['id']; ?>">
            <td>
                <?php echo $product['id'];?>
            </td>

            <td>
                <?php echo $product['category_id'];?>
            </td>

            <td>
                <?php echo $product['name'];?>
            </td>

            <td>
                <img id="image" src="<?php
                if (isset($product['avatar']))
                    echo $product['avatar'];?>" class="avatar">
            </td>


            <td>
                <?php echo $product['price'];?>
            </td>

            <td>
                <?php echo $product['description'];?>
            </td>

            <td>
                <?php if (isset($product['created_at'])) echo $product['created_at'];?>
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


    </tbody>
</table>
<!-- Modal for show-form-edit-user -->
<div class="modal fade" id="edit-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content edit-user">

        </div>
    </div>
</div>





