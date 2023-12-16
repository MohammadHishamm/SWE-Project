<?php

session_start();

unset($_SESSION['user_data']);

session_destroy();

//header("Location:/SWE-PROJECT/Public/signup-in.php");
header("Location:../index.php");
?>