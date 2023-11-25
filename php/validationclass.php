<?php

class validation{
public $emailErr=" ";
public $genderErr=" ";
public $imageErr=" ";
public $fieldErr=" ";
public $cvErr=" ";
public $agreeErr=" ";
public $passwordErr=" ";
public $cpasswordErr=" ";



public function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }


public function emailval()
{
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

public function genderval()
{
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
     }else {
        $gender = test_input($_POST["gender"]);
     }
}

public function imageval()
{
    if (empty($_POST["image"])) {
        $imageErr = "Image is required";
      }else {
        $image = test_input($_POST["image"]);
      }

}

public function fieldval()
{
    if (empty($_POST["field"])) {
        $fieldErr = "Required";
      }else {
        $field = test_input($_POST["field"]);
      }
}

public function cvval()
{
    if (empty($_POST["cv"])) {
        $cvErr = "Required";
      }else {
        $cv = test_input($_POST["cv"]);
      }

}

public function termsagree()
{
    if (empty($_POST["agree"])) {
        $agreeErr = "Required";
      }else {
        $agree = test_input($_POST["agree"]);
      }
}




public function passval()
{
    if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["cpassword"])) {
        $password = test_input($_POST["password"]);
        $cpassword = test_input($_POST["cpassword"]);
        if (strlen($_POST["password"]) <= '8') {
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
        } else {
            $cpasswordErr = "Please Check You've Entered Or Confirmed Your Password!";
        }
    }


}
}
?>