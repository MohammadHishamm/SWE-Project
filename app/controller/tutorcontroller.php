<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once(__ROOT__ . "../php/Chat/vendor/autoload.php");
require_once(__ROOT__ . "controller/controller.php");


class TutorsController extends Controller{
	
    public function Add_Tutor() 
    {

        foreach($_SESSION['user_data'] as $key => $value)
        {
          $user_id = $value['id'];
        }
      
        $this->model->settutorid($user_id);
        $this->model->setQualification($_REQUEST['Qualification']);
        $this->model->setSubjects($_REQUEST['field']);
        $this->model->setUser_status("Disabled");
        $this->model->setcomment($_REQUEST['Qualification']);
        if (isset($_FILES['pdf_file']['name'])) 
        { 
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
                      echo '
                     ';
                    }
                  } catch (Exception $e) {
                      echo 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
                  }
                         
                  
                  }
        
        
        
    }



    }



?>