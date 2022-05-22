<div class="container" style="margin: 100px auto">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title" style="margin: 10px;">Danh sách đơn hàng đã đặt của bạn
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

    <table class="table users-table table-hover" id="list-orders">
        <thead>
        <tr>
            <th>
                STT
            </th>

            <th>
                Tên khách hàng
            </th>
            <th>
                Số điện thoại
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
                    <?php
                    $status='';
                    if ( isset($order['status']) )
                    {
                        switch ($order['status']) {
                            case 0:
                                $status = 'chuẩn bị hàng';
                                break;
                            case 1:
                                $status = 'đang giao';
                                break;
                            case 2:
                                $status = 'đã giao';
                                break;
                            case 3:
                                $status = 'hủy đơn';
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
                    <a type="button" class="btn btn-primary" href="index.php?controller=payment&action=detail&id=<?php echo $order['id'];?>"  >
                        Chi tiết
                    </a>

                </td>
            </tr>

        <?php }?>


        </tbody>
    </table>


    <div style="height:100px; "></div>
    <!--datatable-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script>
    <?php// include "views/orders/script.php"?>
    <!--<script>-->
    <!--    $(document).ready(function(){-->
    <!--        // alert("Thành công",'success');-->
    <!---->
    <!--        initDatatable($('#list-orders'),true);-->
    <!--    });-->
    <!--</script>-->


</div>





