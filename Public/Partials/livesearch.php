<?php

define('__ROOT__', "../../app/");

require_once('../../app/model/playlist.php');
$playlist = new playlist;

// if(empty($_SESSION['user_data']))
// {
//   header('location:signup.php');
// }


$q = intval($_GET['q']);

    $result = $playlist->search($q);
     while($fetch_playlist = $result->fetch(PDO::FETCH_ASSOC) )
    {
        echo $result ['title'];
}




?>
