<?php

class teacherval{
    
public $genderErr=" ";
public $imageErr=" ";
public $cvErr=" ";
public  $fieldErr=" ";
public  $agreeErr=" ";


public function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

 public function genderval($gender)
{
    $gender1 = $this->test_input($gender);
    if (empty($gender1)) {
        $this->genderErr = "Gender is required";
        return false;
     }else {
        return true;
     }
}


 
public function fieldval($field)
 {
     $field1= $this->test_input($field);
     if (empty($field1)) {
         $this->fieldErr = "Required";
         return false;
       }else {
        return true;
       }
 }

// public function cvval($cv)
// {
//     $cv1 = $this->test_input($cv);
//     if (empty($cv1)) {
//         $this->cvErr = "Required";
//         return false;
//       }else {
//         return true;
//       }

// }

public function termsval($agree)
{
    $agree1 = $this->test_input($agree);
    if (empty($agree1)) {
        $this->agreeErr = "Required";
        return false;
      }else {
        return true;
      }
}






public function testform()
{
    $gen=" ";
if(isset($_REQUEST['gender_male']) )
{
$gen=$_REQUEST['gender_male'];
}else if(isset($_REQUEST['gender_female'])){
    $gen=$_REQUEST['gender_female'];
}
    if($this->genderval($gen) && $this->fieldval($_REQUEST['position']) && $this->termsval($_REQUEST['agree']) )
    {
        return TRUE;
    }
    else{
        return FALSE;
    }
   

}
public function getgenderErr(){
    return $this->genderErr;
}
public function getfieldErr(){
    return $this->fieldErr;
}
public function getcvErr(){
    return $this->cvErr;
}
public function getagreeErr(){
    return $this->agreeErr;
}
}
?>