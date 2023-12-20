<?php
 // Notification interface
interface Notification {
    public function sendNotification($to, $subject, $message);

}
?>
