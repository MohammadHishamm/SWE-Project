<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once(__ROOT__ . "../php/Chat/vendor/autoload.php");
require_once(__ROOT__ . "controller/controller.php");


class AdminController extends Controller
{

    function admin_response()
    {
        $this->model->update_tutors_status($_REQUEST['user_id'], $_REQUEST['action']);
    }

}
