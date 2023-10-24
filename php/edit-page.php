<?php
          session_start();
         include "dbh.inc.php";
      
         if($_SERVER['REQUEST_METHOD']== "POST"){ //check if form was submitted
          $Name=$_POST["Name"];
          $Email=$_POST["Email"];
          $Password=$_POST["Password"];
         
        
          $sql="update  users set FullName='$Name', Email='$Email', Password='$Password'
          where ID =".$_SESSION['ID'];
        
          $result=mysqli_query($conn,$sql);
          if($result)	{
            $_SESSION["Name"]=$Name;
            $_SESSION["Email"]=$Email;
            $_SESSION["Password"]=$Password;
      
            header("Location:Home.php");
          }
          else {
        //error popup
          }

        }

      ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../css/edit-page.css" />
  </head>
  <body style="background-color: #ebeff4">
  <form action="" method="post">
    <div class="wrapper bg-white mt-sm-5">
      <h4 class="pb-4 border-bottom">Account settings</h4>
      <div class="d-flex align-items-start py-3 border-bottom">
        <img
          style="margin: 10px"
          src="https://images.pexels.com/photos/1037995/pexels-photo-1037995.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
          class="img"
          alt=""
        />
        <div class="pl-sm-4 pl-2" id="img-section">
          <b>Profile Photo</b>
          <p>Accepted file type .png. Less than 1MB</p>
          <button style="margin: 10px" class="btn button border">
            <b>Upload</b>
          </button>
        </div>
      </div>
      <div class="py-2">
        <div class="row py-2">
          <div class="col-md-6">
            <label for="firstname">Full Name</label>
            <input
              type="text"
              class="bg-light form-control"
              name="FName"
              placeholder="<?php echo $_SESSION["Name"] ; ?>"
            />
          </div>
          <div class="col-md-6 pt-md-0 pt-3">
          <label for="email">Email Address</label>
            <input
              type="text"
              class="bg-light form-control"
              name="Email"
              placeholder="<?php echo $_SESSION["Email"] ; ?>"
            />
          </div>
        </div>
   
        <div class="row py-2">
          <div class="col-md-6 pt-md-0 pt-3">
            <label for="newpassword">New Password</label>
            <input
              type="password"
              class="bg-light form-control"
              name="Password"
              placeholder="New Password"
            />
          </div>
          <div class="col-md-6 pt-md-0 pt-3">
            <label for="confirmpassword">Confirm Password</label>
            <input
              type="password"
              class="bg-light form-control"
              name="ConfirmPassword"
              placeholder="Confirm Password"
            />
          </div>
        </div>
        <div class="py-3 pb-4 border-bottom">
        
          <input type="submit" class="btn btn-primary mr-3:" value="Save Changes" name="Submit">
          <input type="reset" class="btn border button" value="Reset"></input>
        </div>
        <div class="d-sm-flex align-items-center pt-3" id="deactivate">
          <div>
            <b>Delete your account</b>
            <p>Details about your company account and password</p>
          </div>
          <div class="ml-auto">
            <a href="delete.php" style="margin: 10px" class="btn danger">Delete</a>
          </div>
        </div>      </div>
    </div>
  </form>
</body>
</html>
