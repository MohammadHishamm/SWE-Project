<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once(__ROOT__ . "../php/Chat/vendor/autoload.php");
require_once(__ROOT__ . "controller/controller.php");


class AdminController extends Controller
{

    function admin_response($notify)
    {
        if($this->model->update_tutors_status($_REQUEST['user_id'], $_REQUEST['action']))
        {
            if($_REQUEST['action'] == 'Enable')
            {
                $notify->setuserid($_REQUEST['user_id']);
                $notify->setmessage("you are accepted , now you have access for adding , updtating and deleting courses.");
                $notify->save_notify();
            }
            else
            {
                $notify->setuserid($_REQUEST['user_id']);
                $notify->setmessage("you are not accepted , try another time.");
                $notify->save_notify();
            }
        }


    }

}
