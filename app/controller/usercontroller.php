<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once(__ROOT__ . "../php/Chat/vendor/autoload.php");
require_once(__ROOT__ . "controller/controller.php");
require_once(__ROOT__ . "model/user.php");


class UsersController extends Controller{
	
    public function signup() {
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
        
    }

    public function signin() {
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
    }


}
?>
