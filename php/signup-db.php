<?php
   
   include "dbh.inc.php";


   $pass2Err =  $email2Err  = "";



   function test_input1($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }


   if($_SERVER["REQUEST_METHOD"]=="POST"){

	$Name=htmlspecialchars($_POST["Name"]);
	$Email=htmlspecialchars($_POST["Email"]);
	  $Password=htmlspecialchars($_POST["Password"]);

   if (empty($Email) || empty($Password) || empty($Name) ) {
   
   if (empty($Email)) {
      $email2Err = "Email is required";
   }else {
      $email2 = test_input1($_POST["login-Email"]);
      
      // check if e-mail address is well-formed
      if (!filter_var($email2, FILTER_VALIDATE_EMAIL)) {
         $email2Err = "Invalid email format"; 
      }
   }
    if (empty($Password)) {
      $pass2Err = "Password is required";
   }else {
      $pass2 = test_input1($_POST["login-Password"]);

   }
      
   }
   else{
    
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

   


   }
   
   ?>