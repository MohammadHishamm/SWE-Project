<?php
include "dbh.inc.php";
session_start();

session_destroy();
header("Location:Home.php");
?>