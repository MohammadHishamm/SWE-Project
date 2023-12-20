<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once(__ROOT__ . "../php/Chat/vendor/autoload.php");
require_once(__ROOT__ . "model/Notification.php");
// PHPMailerAdapter implementing the Notification interface
class PHPMailerAdapter implements Notification {
    private $phpMailer;

    public function __construct(PHPMailer $phpMailer) {
        $this->phpMailer = $phpMailer;
    }

    public function sendNotification($to, $subject, $message) {
        $this->phpMailer->addAddress($to);
        $this->phpMailer->Subject = $subject;
        $this->phpMailer->Body = $message;

        if (!$this->phpMailer->send()) {
            throw new Exception('Email could not be sent. Mailer Error: ' . $this->phpMailer->ErrorInfo);
        }
    }
}

?>