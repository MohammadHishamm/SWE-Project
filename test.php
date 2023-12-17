<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>


<?php
define('__ROOT__', "../app/");
include_once "php/chat/vendor/autoload.php";

  $options = array(
    'cluster' => 'eu',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    'fcccde774b0f17925676',
    '196c609e9bdc44972327',
    '1723838',
    $options
  );

  $data['message'] = 'hello world';
  $pusher->trigger('my-channel', 'my-event', $data);
?>
<body>

</body>
</html>