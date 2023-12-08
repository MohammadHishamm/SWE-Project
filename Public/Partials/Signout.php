<?php


unset($_SESSION['user_data']);
session_start();
session_destroy();

//header("Location:/SWE-PROJECT/Public/signup-in.php");
header("Location:../../php/Home.php");
?>