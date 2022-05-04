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
            Ảnh
        </th>
        <th>
           Mã danh mục
        </th>
        <th>
            Tên sản phẩm
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
                <img id="image" src="<?php
                if (isset($product['avatar']))
                    echo $product['avatar'];?>" class="avatar">
            </td>

            <td>
                <?php echo $product['category_id'];?>
            </td>

            <td>
                <?php echo $product['name'];?>
            </td>




            <td>
                <?php echo number_format($product['price']);?>
            </td>

            <td>
                <?php echo $product['description'];?>
            </td>

            <td>
                <?php if (isset($product['created_at'])) echo date('d-m-Y H:i:s', strtotime($product['created_at']));?>

            </td>

            <td class="row" >
                <a type="button" class="btn btn-info" href="index.php?controller=product&action=detail&id=<?php echo $product['id']?>">
                    Chi tiết
                </a>

                <a type="button" class="btn btn-info"  href="index.php?controller=product&action=edit&id=<?php echo $product['id']?>">
                    Sửa
                </a>

                <a type="button" class="btn btn-danger" href="index.php?controller=product&action=delete&id=<?php echo $product['id'] ?>" title="Xóa"
                   onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này')">
                    Xóa
                </a>

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





