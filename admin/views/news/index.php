<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Quản lý tin tức
        </div>
        <a type="button" class="btn btn-primary create-user" href="index.php?controller=new&action=create" >
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
            Tiêu đề
        </th>
        <th>
            Mô tả
        </th>
        <th>
            Hình ảnh
        </th>
        <th>
            Người tạo
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
    foreach($news as $news){

        ?>

        <tr id="user-row-<?php echo $news['id']; ?>">
            <td>
                <?php echo $news['id'];?>
            </td>

            <td>
                <?php echo $news['title'];?>
            </td>

            <td>
                <?php echo $news['description'];?>
            </td>

            <td>
                <img id="image" src="<?php
                if (isset($user['image']))
                    echo $user['image'];?>" class="avatar">
            </td>


            <td>
                <?php echo $news['username'];?>
            </td>

            <td>
                <?php if (isset($news['created_at'])) echo $news['created_at'];?>
            </td>

            <td >
                <a type="button" class="btn btn-primary"  href="index.php?controller=new&action=edit&id=<?php echo $news['id']?>">
                    Sửa
                </a>


                <a type="button" class="btn btn-danger" href="index.php?controller=new&action=delete&id=<?php echo $news['id'] ?>" title="Xóa"
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





