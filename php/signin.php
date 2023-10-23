<?php
          session_start();
         include "dbh.inc.php";
         // define variables and set to empty values
         $passErr = $emailErr = $genderErr = $websiteErr = "";
         $pass = $email = $gender = $comment = $website = "";
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["password"])) {
               $passErr = "Password is required";
            }else {
               $pass = test_input($_POST["password"]);
            }
            
            if (empty($_POST["email"])) {
               $emailErr = "Email is required";
            }else {
               $email = test_input($_POST["email"]);
               
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }
            }
         }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }

           //grab data from user and see if it exists in database

         if($_SERVER["REQUEST_METHOD"]=="POST"){

          $Email=$_POST["email"];
        $Password=$_POST["password"];
        $sql="Select * from users where Email ='$Email' and Password='$Password'";
        $result = mysqli_query($conn,$sql);
          if($row=mysqli_fetch_array($result))	{
          $_SESSION["ID"]=$row[0];
          $_SESSION["FName"]=$row["FirstName"];
          $_SESSION["LName"]=$row["LastName"];
          $_SESSION["Email"]=$row["Email"];
          $_SESSION["Phone"]=$row["Phonenumber"];
          $_SESSION["Password"]=$row["Password"];
          $_SESSION["Age"]=$row["Age"];
          header("Location:Home.php?login=success");
        }
        else	{
        //error popup
        }
         }





      ?>

<!DOCTYPE html>
<html lang="en">
<style>  
.error {color: #FF0001;}  
</style>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign in</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="../css/signin.css" />
  </head>
  <body>
    <section class="vh-100">
      <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-9 col-lg-6 col-xl-5">
            <img
              src="../Images/draw2.webp"
              class="img-fluid"
              alt="Sample image"
            />
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form method="post"action = "<?php 
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <div
                class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start"
              >
                <p class="titlesign">Arab Data Hub</p>
              </div>

              <div class="divider d-flex align-items-center my-4">
                <p class="text-center fw-bold mx-3 mb-0">Sign in</p>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input
                  type="email"
                  name="email"
                  id="form3Example3"
                  class="form-control form-control-lg"
                  placeholder="Enter a valid email address"
                />  
                <span class="error"><?php echo $emailErr; ?> </span>  
              </div>

              <!-- Password input -->
              <div class="form-outline mb-3">
                <input
                  type="password"
                  name="password"
                  id="form3Example4"
                  class="form-control form-control-lg"
                  placeholder="Enter password"
                />
                <span class="error"><?php echo $passErr; ?> </span> 
              </div>

              <div class="d-flex justify-content-between align-items-center">
                <!-- Checkbox -->
                <div class="form-check mb-0">
                  <input
                    class="form-check-input me-2"
                    type="checkbox"
                    value=""
                    id="form2Example3"
                  />
                  <label class="form-check-label" for="form2Example3">
                    Remember me
                  </label>
                </div>
                <a href="#!" class="text-body">Forgot password?</a>
              </div>

              <div class="text-center text-lg-start mt-4 pt-2">
                <input
                  type="submit"
                  name="submit"
                  value="submit"
                  class="btn btn-primary btn-lg"
                  style="padding-left: 2.5rem; padding-right: 2.5rem"
                  
                >
                  
        </input>
                <p class="small fw-bold mt-2 pt-1 mb-0">
                  Don't have an account?
                  <a href="signup.php" class="link-danger">Register</a>
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    
  </body>
</html>
