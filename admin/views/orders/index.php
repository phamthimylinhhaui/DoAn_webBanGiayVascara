<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Quản lý đơn hàng
            </h3>
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

<table class="table users-table table-hover" id="list-users">
    <thead>
    <tr>
        <th>
            ID
        </th>

        <th>
            Tên người dùng
        </th>
        <th>
            Số điện thoại
        </th>
        <th>
            Tổng
        </th>
        <th>
            Trạng thái
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
    foreach($orders as $order){

        ?>

        <tr id="user-row-<?php echo $order['id']; ?>">
            <td>
                <?php echo $order['id'];?>
            </td>

            <td>
                <?php echo $order['full_name'];?>
            </td>

            <td>
                <?php echo $order['phone'];?>
            </td>

            <td>
                <?php echo $order['price_total'];?>
            </td>

            <td>
            <?php
            $status='';
            if ( isset($order['payment_status']) )
            {
                switch ($order['payment_status']) {
                    case 0:
                        $status = 'chưa thanh toán';
                        break;
                    case 1:
                        $status = 'đã thanh toán';
                        break;
                }
            }
            echo $status;
            ?>
            </td>

            <td>
                <?php if (isset($order['created_at'])) echo $order['created_at'];?>
            </td>

            <td >
                <!-- Button trigger modal for show-form-edit-user -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-user"  onclick="showFormEdit(<?php echo $user['id']; ?>)">
                    Chi tiết
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





