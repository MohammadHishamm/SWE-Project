<?php

class playlistval{
    
public  $fieldErr=" ";

public function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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

 public function testform()
 {
   
     if( $this->fieldval($_REQUEST['position']) ) 
     {
         return TRUE;
     }
     else{
         return FALSE;
     }
    
 
 }

 public function getfieldErr(){
    return $this->fieldErr;
}

}
 ?>