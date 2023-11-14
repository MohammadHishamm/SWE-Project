<?php
   session_start();
   include "dbh.inc.php";
   


   $pass1Err =  $email1Err  = "";



   function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }


   if($_SERVER["REQUEST_METHOD"]=="POST"){

   $Email=$_POST["login-Email"];
   $Password=$_POST["login-Password"];

   if (empty($Email) || empty($Password)) {
   
   if (empty($Email)) {
      $email1Err = "Email is required";
   }else {
      $email1 = test_input($_POST["login-Email"]);
      
      // check if e-mail address is well-formed
      if (!filter_var($email1, FILTER_VALIDATE_EMAIL)) {
         $email1Err = "Invalid email format"; 
      }
   }
    if (empty($Password)) {
      $pass1Err = "Password is required";
   }else {
      $pass1 = test_input($_POST["login-Password"]);

   }
      
   }
   else{
    
   $sql="Select * from users where Email ='$Email' and Password='$Password'";
   $result = mysqli_query($conn,$sql);
   if($row=mysqli_fetch_array($result))	{
   $_SESSION["ID"]=$row[0];
   $_SESSION["Name"]=$row["FullName"];
   $_SESSION["Email"]=$row["Email"];
   $_SESSION["Password"]=$row["Password"];

   $sql2 = "update users set Status='active' where ID =".$_SESSION["ID"] ;
   $result = mysqli_query($conn,$sql2);
   
   header("Location:Home.php?login=success");
  
   }
   else	{
   //error popup
   header("Location: signup.php");
   }

   }

   


   }
   
   ?>