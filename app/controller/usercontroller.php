<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once(__ROOT__ . "../php/Chat/vendor/autoload.php");
require_once(__ROOT__ . "controller/controller.php");


class UsersController extends Controller{
	
    public function signup() {
        $error = '';

        $success_message = '';

        
            if(isset($_SESSION['user_data']))
            {
                header('location:home.php');
            }
        
            
        
           
            $this->model->setUserName($_POST['user_name']);

            $this->model->setUserEmail($_POST['user_email']);
        
            $this->model->setUserPassword($_POST['user_password']);
        
            $this->model->setUserStatus('Disabled');
        
            $this->model->setUserCreatedOn(date('Y-m-d H:i:s'));
        
            $this->model->setUserVerificationCode(md5(uniqid()));
        
          
                if($this->model->save_data())
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
                    $mail->addAddress($this->model->getUserEmail());
                    $mail->Subject = "PHPMailer GMail SMTP test";
                      $mail->Body = '
                      <p>Thank you for registering for Arab Data Hub.</p>
                          <p>This is a verification email, please click the link to verify your email address.</p>
                          <p><a href="http://localhost/SWE-Project/php/verify.php?code='.$this->model->getUserVerificationCode().'">Click to Verify</a></p>
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

    public function signin() {

      
    $this->model->setUserEmail($_POST['user_email']);

    $user_data = $this->model->get_user_data_by_email();

    if(is_array($user_data) && count($user_data) > 0)
    {
      
        if($user_data['user_status'] == 'Enable')
        {
            if($user_data['user_password'] == $_POST['user_password'])
            {
                $this->model->setUserId($user_data['user_id']);

                $this->model->setUserLoginStatus('Login');

                $user_token = md5(uniqid());

                $this->model->setUserToken($user_token);


                if($this->model->update_user_login_data())
                {
                    $_SESSION['user_data'][$user_data['user_id']] = [
                        'id'    =>  $user_data['user_id'],
                        'name'  =>  $user_data['user_name'],
                        'token' =>  $user_token
                    ];

                   header("Location:index.php?login=success");

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

public function updateUserData()
{
    $this->model->setUserName($_REQUEST['user_name']);
    $this->model->setUserBio($_REQUEST['user_bio']);
    $this->model->setUserSocial1($_REQUEST['user_social1']);
    $this->model->setUserSocial2($_REQUEST['user_social2']);
    $this->model->setUserSocial3($_REQUEST['user_social3']);
    
    $old_image = $_REQUEST['old_image'];
    $old_image = filter_var($old_image, FILTER_SANITIZE_STRING);

    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $image_size = $_FILES['image']['size'];

    if (!empty($image)) 
    {
       if($image_size > 200000000)
       {
        $_SESSION["error_message"]  = 'image size is too large!';
       }
       else
       {
          if($old_image != '')
          {
             unlink('../images/users/'.$old_image);
             $this->model->setUserimg($image);
          }
       }
    }
    else
    {
        $this->model->setoldimg($old_image);
    }
 
    return $this->model->update_user_data();
}

public function updatepersonaldata($postData)
{
    $this->model->setUserEmail($postData['user_email']);
    $this->model->setUserPassword($postData['user_password']);

    
    return $this->model->update_personal_data();
}

public function deleteuser()
{
    return $this->model->delete_user_by_id();
}



}



?>