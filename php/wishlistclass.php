<?php

class wishlist{

    public $Course_ID;
    public $User_ID;
    public $unique_id;


    public function __construct()
    {

        require_once('connect.php');

        $database_object = new Database_connection;


        $this->connect = $database_object->connect();
      
        $this->unique_id = $database_object->unique_id();
        
    }

    public function addwishlist($Course_ID,$User_ID)
    {
        
           
            $insert_query=" INSERT INTO wishlist (User_ID, Course_ID) VALUES ('$User_ID','$Course_ID')";
            $insert_query_run= mysqli_query($conn,$insert_query);

         }
  }  
?>