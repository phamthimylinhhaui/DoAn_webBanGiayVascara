<script>
    function initDatatable(tableElement, showAll=false, config={}){ // table jquery element

        var datatableConfig = {
            bSort: false,
            responsive: !0,
            language  : {
                'sProcessing'  : 'Đang xử lý',
                'sLengthMenu'  : 'Xem _MENU_bản ghi',
                'sZeroRecords' : 'Không tìm thấy dòng nào phù hợp',
                'sInfo'        : 'Đang xem _START_ đến _END_ trong tổng số _TOTAL_ bản ghi',
                'sInfoEmpty'   : 'Đang xem 0 đến 0 trong tổng số 0 bản ghi',
                'sInfoFiltered': '(được lọc từ _MAX_ bản ghi)',
                'sInfoPostFix' : '',
                'sSearch'      : 'Tìm kiếm',
                'sUrl'         : '',
                'oPaginate'    : {
                    'sFirst'       : 'Đầu',
                    'sPrevious': 'Trước',
                    'sNext'    : 'Tiếp',
                    'sLast'    : 'Cuối',

                },
                'select': {
                    rows: {
                        _: 'Đã chọn %d bản ghi',
                        1: 'Đã chọn 1 bản ghi',
                    },
                },
            },

            aLengthMenu: [
                [5, 25, 50, 200, -1],
                [5, 25, 50, 200, 'All'],
            ],

            iDisplayLength: 5,
        };

        Object.assign(datatableConfig,config);
        var table = $('#list-users').DataTable(datatableConfig);


        // init mark index for rows
        table.on('order.dt search.dt', function () {
            table.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        // init search in column table
        table.columns().every(function () {
            var that = this;

            $('input', this.header()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that.search(this.value).draw();
                }
            });
        });

        showAll=false;
        if(showAll){
            showAllRowsDatatable(table)
        }

        return table;
    }

    function showAllRowsDatatable(table){ // datatable element
        var setting                    = table.settings();
        setting[0]._iDisplayLength = setting[0].fnRecordsTotal();
        table.draw();
    }

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
