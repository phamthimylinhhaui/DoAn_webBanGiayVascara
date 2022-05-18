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

<table class="table users-table table-hover" id="list-news">
    <thead>
    <tr>
        <th>
            STT
        </th>
        <th>
            Tiêu đề
        </th>

        <th>
            Hình ảnh
        </th>

        <th>
            Mô tả
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
                <img id="" style="width: 150px;height: 150px; border-radius: 50%" src="<?php
                if (isset($news['image']))
                    echo $news['image'];?>" class="avatar">
            </td>

            <td>
                <?php echo $news['description'];?>
            </td>




            <td>
                <?php echo $news['username'];?>
            </td>

            <td>
                <?php if (isset($news['created_at'])) echo $news['created_at'];?>
            </td>

            <td >
                <a type="button" class="btn btn-info"  href="index.php?controller=new&action=detail&id=<?php echo $news['id']?>">
                    Xem
                </a>

                <a type="button" class="btn btn-info"  href="index.php?controller=new&action=edit&id=<?php echo $news['id']?>">
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
<!--datatable-->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script>
<?php include "views/news/script.php"?>
<script>
    $(document).ready(function(){
        // alert("Thành công",'success');

        initDatatable($('#list-news'),true);
    });
</script>





