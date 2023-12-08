<?php

class signupval{
    
public $emailErr=" ";
public $fieldErr=" ";
public $passwordErr=" ";
public  $cpasswordErr=" ";



public function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

 public function fieldval($field)
 {
     $field1 = $this->test_input($field);
     if (empty($field1)) {
         $this->fieldErr = "Required";
         return false;
       }else {
        return true;
       }
 }
 
public function emailval($email)
{
    if (empty($email)) {
        $this->emailErr = "Email is required";
        return false;
     }else {
        $email1 = $this->test_input($email);
        
        // check if e-mail address is well-formed
        if (!filter_var($email1, FILTER_VALIDATE_EMAIL)) {
           $this->emailErr = "Invalid email format"; 
           return false;
        }
        return true;
     }
    
}

public function passval($password)
{
    $password = $this->test_input($password);
    if(empty($password)) {
        $this->passwordErr = "Please enter your password!";
        return false;
    }
        if (strlen($password) < 8) {
            $this->passwordErr = "Your Password Must Contain At Least 8 Characters!";
            return false;
        }
        elseif(!preg_match("#[0-9]+#",$password)) {
            $this->passwordErr = "Your Password Must Contain At Least 1 Number!";
            return false;
        }
        elseif(!preg_match("#[A-Z]+#",$password)) {
            $this->passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
            return false;
        }
        elseif(!preg_match("#[a-z]+#",$password)) {
            $this->passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
            return false;
        } 

        return true;
}

public function cpassval($cpass)
{
    $pass=$_REQUEST['user_password'];
    $cpassword = $this->test_input($cpass);
    if( $cpass != $pass || empty($cpass)) {
        
        $this->cpasswordErr = "Not the same password entered";
        
    }
else {
    return true;
}


}






public function testlogin()
{

    if($this->emailval($_REQUEST['user_email']) && $this->passval($_REQUEST['user_password']) && $this->fieldval($_REQUEST['user_name']) && $this->cpassval($_REQUEST['Confirmpass']))
    {
        return TRUE;
    }
    else{
        return FALSE;
    }
   

}
public function getemailErr(){
    return $this->emailErr;
}
public function getpassErr(){
    return $this->passwordErr;
}
public function getfieldErr(){
    return $this->fieldErr;
}
public function getcpassErr(){
    return $this->cpasswordErr;
}
}
?>