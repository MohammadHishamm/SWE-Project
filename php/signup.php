<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'Chat/vendor/autoload.php';
session_start();
require_once('User/user.php');

$error = '';

$success_message = '';
//signup
if(isset($_POST["register"]))
{
   

    if(isset($_SESSION['user_data']))
    {
        header('location:home.php');
    }

    

    $user_object = new User;

    $user_object->setUserName($_POST['user_name']);

    $user_object->setUserEmail($_POST['user_email']);

    $user_object->setUserPassword($_POST['user_password']);

    $user_object->setUserStatus('Disabled');

    $user_object->setUserCreatedOn(date('Y-m-d H:i:s'));

    $user_object->setUserVerificationCode(md5(uniqid()));

  
        if($user_object->save_data())
        {
          
          

          $mail = new PHPMailer();
          try {
              $mail->IsSMTP(); // enable SMTP
            // $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
            $mail->Debugoutput = 'html';
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; //Set the SMTP port number - likely to be 25, 465 or 587
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465; //Set the encryption system to use - ssl (deprecated) or tls
            $mail->Username = "mohammad2109652@miuegypt.edu.eg";
            $mail->Password = "18962283";
            $mail->setFrom('mohammad2109652@miuegypt.edu.eg', 'Arab Data Hub');
            $mail->addAddress($user_object->getUserEmail());
            $mail->Subject = "PHPMailer GMail SMTP test";
              $mail->Body = '
              <p>Thank you for registering for Arab Data Hub.</p>
                  <p>This is a verification email, please click the link to verify your email address.</p>
                  <p><a href="http://localhost/SWE%20project/SWE-Project/php/verify.php?code='.$user_object->getUserVerificationCode().'">Click to Verify</a></p>
                  <p>Thank you...</p>
              ';
            $mail->IsHTML(true);
            $mail->SMTPOptions = array(
              'ssl' => array(
              'verify_peer' => false,
              'verify_peer_name' => false,
              'allow_self_signed' => true
              )
            );
                
            if(!$mail->Send()) {
              echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
              echo "Email has been sent";
            }
          } catch (Exception $e) {
              echo 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
          }
                 
          
          }

}

//signin 
if(isset($_POST['login']))
{


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
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/signuppage.css" />
    <title>Sign in & Sign up Form</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form method="post" class="sign-in-form" id="login_form">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Email" id="email" name="user_email" />
                        </br>


                    </div>
                    </br>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" id="password" name="user_password" />
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
                <form method="post" class="sign-up-form" id="register_form">
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
                        <input type="password" placeholder="Password" id="password1" name="user_password" />
                        </br>


                    </div>
                    </br>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Confirm password" id="password2" name="Confirmpass" />
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