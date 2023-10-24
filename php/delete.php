<?php

session_start();
include "dbh.inc.php";

$sql="delete from users where ID =".$_SESSION['ID'];
$result=mysqli_query($conn,$sql);
if($result) {
    session_destroy();
    header("Location:Home.php");
}
else {
   //error popup
}
        
?>

