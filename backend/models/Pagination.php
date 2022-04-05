<?php
// class phân trang

/**
 * Class Pagination
 * ý tưởng của phân trang
 *      giả sử trong bảng sp có 35 bản ghi và yêu cầu hiển thị là mỗi trang 10 bản ghi
 *      =>tổng số trang cần tạo là ceil(35/10)=4 trang
 *  như vậy cần xác định các tham số sau
 *  - tổng số bản ghi: total
 *  - số bản ghi trên 1 trang: limit
 *  url phân trang sẽ có định dạng sau, theo mô hình mvc: index.php?controller=user&action=index&page=3
 *  - controller xử lý phân trang: controller
 *  - action xử lý phân trang: action
 *  - chế độ hiển thị phân trang: full_mode
 */

class Pagination
{
    // khai báo 1 thuộc tính chứa all các tham số vừa liệt kê
    public $params=[
        'total'=>0,// tổng số bản ghi trên trang
        'limit'=>0,//giới hạn bản ghi trên 1 trang
        'controller'=>'',//controller xử lý phân trang
        'action'=>'',//action xử lý phân trang
        'full_mode'=>FALSE// chế độ hiển thị phân trang (show ra tất cả page hay không)
    ];

    // lợi dụng hàm khởi tạo của class để gán giá trị mặc định cho params
    public function __construct($params)
    {
        $this->params=$params;
    }

    // tạo phương thức lấy tổng số trang hiện tại
    public function getTotalPage(){
        $total=$this->params['total'] / $this->params['limit'];
        // làm tròn lên phép chia để biến total có giá trị số trang đúng
        $total=ceil($total);
        return $total;
    }

    //lấy ra số  trang hiện tại (trang truyền vào)
    public function getCurrentPage(){
        //url phân trang theo mvc có dạng index.php?controller=&action=&page=3
        //khởi tạo page mặc định là 1
        $page=1;
        if (isset($_GET['page']) && is_numeric($_GET['page'])){
            $page=$_GET['page'];
            // check : nếu user nhập số trang hiện tại >= tổng số trang đang có => trả về tổng số trang
            //          < tổng số trang thì tve số trang dc nhập (dòng 49)
            $total_page=$this->getTotalPage();
            if ($page>=$total_page){
                $page=$total_page;
            }

        }
        return $page;
    }


}