<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Quản lý phản hồi
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

<table class="table users-table table-hover" id="list-feedbacks">
    <thead>
    <tr>
        <th>
            ID
        </th>
        <th>
            Tên người phản hồi
        </th>
        <th>
            Số điện thoại
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
    foreach($feedbacks as $feedback){

        ?>

        <tr id="user-row-<?php echo $feedback['id']; ?>">
            <td>
                <?php echo $feedback['id'];?>
            </td>

            <td>
                <?php echo $feedback['name'];?>
            </td>

            <td>
                <?php echo $feedback['phone'];?>
            </td>

            <td>
                <?php if (isset($feedback['created_at'])) echo $feedback['created_at'];?>
            </td>

            <td >
                <!-- Button trigger modal for show-form-edit-user -->
                <a type="button" class="btn btn-primary" href="index.php?controller=feedback&action=detail&id=<?php echo $feedback['id']; ?>" >
                    xem chi tiết
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
<?php include "views/feedbacks/script.php"?>
<script>
    $(document).ready(function(){
        // alert("Thành công",'success');

        initDatatable($('#list-feedbacks'),true);
    });
</script>




