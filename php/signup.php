<?php
session_start();
$error = '';

$success_message = '';
//signup
if(isset($_POST["register"]))
{
    session_start();

    if(isset($_SESSION['user_data']))
    {
        header('location:home.php');
    }

    require_once('User/user.php');

    $user_object = new User;

    $user_object->setUserName($_POST['user_name']);

    $user_object->setUserEmail($_POST['user_email']);

    $user_object->setUserPassword($_POST['user_password']);

   

    $user_object->setUserStatus('Disabled');

    $user_object->setUserCreatedOn(date('Y-m-d H:i:s'));

    $user_object->setUserVerificationCode(md5(uniqid()));

  
        if($user_object->save_data())
        {
          header("Location: Home.php");

        }
        else
        {
            $error = 'Something went wrong try again';
        }
    

}

//signin 
if(isset($_POST['login']))
{
    require_once('User/user.php');

    $user_object = new User;

    $user_object->setUserEmail($_POST['user_email']);

    $user_data = $user_object->get_user_data_by_email();

    if(is_array($user_data) && count($user_data) > 0)
    {
        if($user_data['user_status'] == 'Enable')
        {
            if($user_data['user_password'] == $_POST['user_password'])
            {
                $user_object->setUserId($user_data['user_id']);

                $user_object->setUserLoginStatus('Login');

                $user_token = md5(uniqid());

                $user_object->setUserToken($user_token);
                $_SESSION["ID"]=$user_data['user_id'];

                if($user_object->update_user_login_data())
                {
                    $_SESSION['user_data'][$user_data['user_id']] = [
                        'id'    =>  $user_data['user_id'],
                        'name'  =>  $user_data['user_name'],
                      
                        'token' =>  $user_token
                    ];

                   header("Location:Home.php?login=success");

                }
            }
            else
            {
                $error = 'Wrong Password';
            }
        }
        else
        {
            $error = 'Please Verify Your Email Address';
        }
    }
    else
    {
        $error = 'Wrong Email Address';
    }
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../css/signuppage.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form  method="post" class="sign-in-form" id="login_form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Email" id="email"  name="user_email"/>
</br>
              

            </div>
</br>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" id="password"  name="user_password" />
</br>
               
            </div>
</br> 
      <input type="submit" name="login" id="login" class="btn btn-primary" value="signin" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
          <form  method="post" class="sign-up-form" id="register_form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Full name" id="name1" name="user_name" />
</br>
              <span class="alert" id="alert3"></span>
     
            </div>
            </br>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" placeholder="Email" id="email1" name="user_email" />
              </br>
              

            </div>
            </br>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" id="password1" name="user_password"  />
              </br>
             

            </div>
            </br>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Confirm password" id="password2" name="Confirmpass"/>
              </br>
              <span class="alert" id="alert6"></span>

            </div>
            </br>
            <input type="submit" name="register" class="btn btn-success" value="sign up" />
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="../js/sign-up.js"></script>
  
    
  </body>
</html>