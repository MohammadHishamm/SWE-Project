<?php

class signinval{
    
public $emailErr=" ";

public $passwordErr=" ";




public function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
        $passwordErr = "Please enter your password!";
    }
        if (strlen($password) <= '8') {
            $passwordErr = "Your Password Must Contain At Least 8 Characters!";
        }
        elseif(!preg_match("#[0-9]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Number!";
        }
        elseif(!preg_match("#[A-Z]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
        }
        elseif(!preg_match("#[a-z]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
        } 
}

public function testlogin()
{

    if($this->emailval($_REQUEST['user_email'])&&$this->passval($_REQUEST['user_password']))
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
}
?>