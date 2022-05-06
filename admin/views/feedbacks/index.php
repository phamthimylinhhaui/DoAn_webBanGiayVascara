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

<table class="table users-table table-hover" id="list-users">
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
<!-- Modal for show-form-edit-user -->
<div class="modal fade" id="edit-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content edit-user">

        </div>
    </div>
</div>





