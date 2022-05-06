<?php
require_once "controllers/Controller.php";
require_once "models/Feedback.php";

class FeedbackController extends Controller
{
    public function index(){


        //lấy danh sách category đang có trên hệ thống để phục vụ cho search
        $feedback_model = new Feedback();
        $feedbacks = $feedback_model->getAll();
        $this->title="Quản lý phản hồi";
        $this->content = $this->render('views/feedbacks/index.php', [
            'feedbacks' => $feedbacks,
        ]);
        require_once 'views/layouts/main.php';
    }

    public function detail(){
        $id = $_GET['id'];
        $feedback_model = new Feedback();
        $feedback = $feedback_model->getById($id);

        $this->title="Chi tiết phản hồi";
        $this->content = $this->render('views/feedbacks/detail.php',[
            'feedback' => $feedback,
        ]);
        require_once 'views/layouts/main.php';
    }

}