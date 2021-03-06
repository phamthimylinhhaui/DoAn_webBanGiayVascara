<!-- Page Header -->

<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Quản lý danh mục
            </h3>
        </div>
        <a type="button" class="btn btn-primary create-user" href="index.php?controller=category&action=create" >
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

<table class="table users-table table-hover" id="list-categories">
    <thead>
    <tr>
        <th>
            STT
        </th>

        <th>
            Tên danh mục
        </th>
        <th>
            Mô tả
        </th>
        <th>
            Trạng thái
        </th>
        <th>
            Ngày tạo
        </th>
        <th>
            Ngày chỉnh sửa
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
    foreach($categories as $category){

        ?>

        <tr id="user-row-<?php echo $category['id']; ?>">
            <td>
                <?php echo $category['id'];?>
            </td>


            <td>
                <?php echo $category['name'];?>
            </td>

            <td>
                <?php echo $category['description'];?>
            </td>

            <td>
                <?php
                $status='';
                if ( isset($category['status']) )
                {
                    switch ($category['status']) {
                        case 0:
                            $status = 'Không hoạt động';
                            break;
                        case 1:
                            $status = 'Hoạt động';
                            break;
                    }
                }
                echo $status;
                 ?>
            </td>

            <td>
                <?php if (isset($category['created_at'])) echo date('d-m-Y H:i:s', strtotime($category['created_at']));?>
            </td>

            <td>
                <?php if (isset($category['updated_at'])) echo date('d-m-Y H:i:s', strtotime($category['updated_at']));?>
            </td>

            <td >
                <!-- Button trigger modal for show-form-edit-user -->
                <a type="button" class="btn btn-info"  href="index.php?controller=category&action=edit&id=<?php echo $category['id']?>">
                    Sửa
                </a>

                <a type="button" class="btn btn-danger" href="index.php?controller=category&action=delete&id=<?php echo $category['id'] ?>" title="Xóa"
                   onclick="return confirm('Xóa danh mục này, sản phẩm của danh mục này cũng sẽ bị xóa.Bạn có chắc chắn muốn xóa không?')">
                    Xóa
                </a>

            </td>
        </tr>

    <?php }?>


    </tbody>
</table>
<!--datatable-->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script>
<?php include "views/categories/script.php"?>
<script>
    $(document).ready(function(){
        // alert("Thành công",'success');

        initDatatable($('#list-products'),true);
    });
</script>




