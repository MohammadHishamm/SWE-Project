
<?php
include "dbh.inc.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){ 
  
	$Name=htmlspecialchars($_POST["Name"]);
  $Email=htmlspecialchars($_POST["Email"]);
	$Password=htmlspecialchars($_POST["Password"]);

  
	$sql="insert into users(FullName,Email,Password) 
	values('$Name','$Email','$Password')";
	$result=mysqli_query($conn,$sql);

  
	if($result)	{
		//done popup
    header("Location: Home.php");
	}
  else{
   //error popup 
   
  }
}
