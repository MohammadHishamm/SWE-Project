<?php
include "dbh.inc.php";
session_start();
$sql2 = "update users set Status='offline' where ID =".$_SESSION["ID"] ;
mysqli_query($conn,$sql2);
session_destroy();
header("Location:Home.php");
?>