<script>
    //gọi modal  hiện lên form create user
    function showFormCreate(){
        // call ajax
        $.ajax({
            url:"index.php?controller=user&action=showFormCreate",
            type:"POST",
            //dữ liệu gửi đi
            data:{
            },
            //dữ liệu trả về sau khi gọi
            success: function (data){
                if (data.message==undefined){
                    $('#create-user').find('.modal-content').html(data);
                }
            },
            error: function (){

            },
        });
    }

    //gọi modal hiện lên form edit user
    function showFormEdit(id){
        // call ajax
        $.ajax({
            url:"index.php?controller=user&action=showFormEdit",
            type:"POST",
            //dữ liệu gửi đi
            data:{
                user_id :id,
            },
            //dữ liệu trả về sau khi gọi
            success: function (data){
                if (data.message==undefined){
                    $('#edit-user').find('.edit-user').html(data);
                }
            },
            error: function (){

            },
        });
    }



    //merge img với input file để click vào ảnh <=> input file

</script>
