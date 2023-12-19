<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once(__ROOT__ . "../php/Chat/vendor/autoload.php");
require_once(__ROOT__ . "controller/controller.php");

class NotifyController extends Controller
{

    function notify()
    {
        // $options = array(
        //     'cluster' => 'eu',
        //     'useTLS' => true
        //   );
        //   $pusher = new Pusher\Pusher(
        //     'fcccde774b0f17925676',
        //     '196c609e9bdc44972327',
        //     '1723838',
        //     $options
        //   );
        
        //   $data['message'] = 'you are accepted , now you have access for adding , updtating and deleting courses';
        //   $pusher->trigger('my-channel', 'my-event', $data);
    }

}
?>

