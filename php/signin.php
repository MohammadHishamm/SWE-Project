<?php
session_start();
include "dbh.inc.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){

$Email=$_POST["login-Email"];
$Password=$_POST["login-Password"];
$sql="Select * from users where Email ='$Email' and Password='$Password'";
$result = mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result))	{
$_SESSION["ID"]=$row[0];
$_SESSION["Name"]=$row["FullName"];
$_SESSION["Email"]=$row["Email"];
$_SESSION["Password"]=$row["Password"];

header("Location:Home.php?login=success");
}
else	{
//error popup
header("Location: signup.php");
}
}

