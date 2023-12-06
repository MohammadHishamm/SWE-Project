<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once(__ROOT__ . "../php/Chat/vendor/autoload.php");
require_once(__ROOT__ . "controller/controller.php");


class TutorsController extends Controller{
	
    public function Add_Tutor($user_id) 
    {
        if (isset($_FILES['pdf_file']['name'])) 
        { 
            $this->model->setTutor_id($user_id);
            
            if (isset($_REQUEST['gender_male']))
            {
              $this->model->setGender("Male");
            }
            else if(isset($_REQUEST['gender_female']))
            {
              $this->model->setGender("Female");
            }
            $this->model->setComment($_REQUEST['comment']);
            $this->model->setPosition($_REQUEST['position']);
            $this->model->setUser_status("Disabled");
            $this->model->setCountry($_REQUEST['country']);
            $this->model->setLanguage($_REQUEST['language-picker-select']);
            $file_name = $_FILES['pdf_file']['name'];
            $file_tmp = $_FILES['pdf_file']['tmp_name'];
            move_uploaded_file($file_tmp,"./pdf/".$file_name);
            $this->model->setcv($file_name);
        }
        
          
                if($this->model->Save())
                {
                  
                  
                  $Email =  $this->model->get_email_by_id();
                  $Fetch_Email = $Email->fetch(PDO::FETCH_ASSOC);

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
                    $mail->addAddress($Fetch_Email['user_email']);
                    $mail->Subject = "PHPMailer GMail SMTP test";
                      $mail->Body = '
                      <p>Thank you for registering with Arab Data Hub.

                      Your data has been sent.
                      
                      We will send you a reply within 24 hours.
                      
                      Thank you...
                      </p>
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
                      echo 
                      '
                      
                      ';
                    }
                  } catch (Exception $e) {
                      echo 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
                  }
                         
                  
                  }
        
        
        
    }

    public function Check_Tutor($user_id)
    {
        $this->model->setTutor_id($user_id);
        if($this->model->Check_Tutor())
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    }



?>