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
 *      url phân trang sẽ có định dạng sau, theo mô hình mvc: index.php?controller=user&action=index&page=3
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

    // tạo ra phương thức lấy ra link HTML của trang web trc đó
    // link Prev
    public function getPrevPage(){
        // cần phân tích cấu trúc html nào sẽ dùng để xây dựng phân trang
        // do hệ thông admin hiện tại đang sử dụng bootstrap => sẽ sd cấu trúc ul li để dựng phân trang
        $pre_page='';
        // lấy ra trang hiện tại
        $current_page=$this->getCurrentPage();
        // link prev chỉ hiện ra khi TRANG HIỆN TẠI >=2
        if ($current_page>=2){
            //lấy ra các giá trị của controller và action từ thuộc tính param
            $controller=$this->params['controller'];
            $action=$this->params['action'];
            $page=$current_page-1;
            $pre_url="index.php?controller=$controller&action=$action&page=$page";
            // tạo cấu trúc li cho biến pre_page
            $pre_page="<li><a  href='$pre_url'>Prev</a></li>";
        }

        return $pre_page;
    }

    // xây dựng phương thức tạo ra link next cho phân trang
    public function getNextPage(){
        $next_page='';
        //lấy ra số trang hiện tại, và tổng số trang
        // để check việc hiển thị link next vì chỉ hiện thị link next khi trang hiện tại < tổng số trang
        $current_page=$this->getCurrentPage();
        $total_page= $this->getTotalPage();
        if ($current_page<$total_page){
            $controller= $this->params['controller'];
            $action= $this->params['action'];
            $page=$current_page+1;
            $next_url="index.php?controller=$controller&action=$action&page=$page";
            //tạo cấu trúc li cho biến next_page
            $next_page="<li><a href='$next_page'>Next</a></li>";
        }
        return $next_page;
    }

    //xây dựng phương thức hiển thị ra 1 cấu trúc phân trang hoàn chỉnh
    public function getPagination(){
        $data='';
        //nếu tổng số trang hiện tại là 1, thì k cần hiển thị cấu trúc phân trang
        $total_page=$this->getTotalPage();
        if ($total_page==1){
            return '';
        }

        $data .="<ul class='pagination'>";
        //gắn link đầu tiên vào
        $prev_link= $this->getPrevPage();
        $data .= $prev_link;

        //tạo các biến controller và action lấy từ thuộc tính params
        $controller=$this->params['controller'];
        $action=$this->params['action'];

        //nếu hiển thị phân trang theo kiểu =>full_mode =false
        $full_mode=$this->params['full_mode'];
        if ($this->params['full_mode']==FALSE ){
            for($page=1;$page<=$total_page;$page++){
                $current_page=$this->getCurrentPage();
                //hiển thị trang 1, trang trước đó, trang tiếp theo, trang cuối
                if ($page==1 || $page == $current_page-1 || $page==$current_page+1 || $page==$total_page){
                    $page_url="index.php?controller=$controller&action=$action&page=$page";
                    $data .="<li><a href='$page_url'>$page</a></li>";
                }
                // nếu là trang hiện tại thì sẽ không có link
                elseif ($page==$current_page){
                    $data .="<li class='active'><a href=''>$page</a></li>";
                }
                // còn nếu hoặc là trang 2, trang 3 hoặc trang tổng - 1, trang tổng -2 thì hiển thị dấu ...
                elseif (in_array($page,[$current_page-2, $current_page-3, $current_page+2, $current_page+3])){
                    $data .="<li><a href=''>...</a></li>";
                }
            }
        }

        // ngược lại là chế độ full_page
        // hiển thị chế độ full_page
        else{
            //chạy vòng lặp từ 1 đến tổng số trang => để hiển thị ra các trang
            for ($page=1;$page<=$total_page;$page++){
                $current_page=$this->getCurrentPage();
                //nếu trang hiện tại trùng với số lần lặp hiện tại thì sẽ thêm class='active' và không gắn link cho trang hiện tại
                if ($page==$current_page){
                    $data .="<li class='active'><a href=''>$page</a></li>";
                }else{
                    $page_url="index.php?controller=$controller&action=$action&page=$page";
                    $data .="<li><a href='$page_url'></a></li>";
                }
            }
        }

        //gắn link next vào cuối của cấu trúc phân trang
        $next_link=$this->getNextPage();
        $data .=$next_link;
        $data .="</ul>";
        return $data;
    }

}