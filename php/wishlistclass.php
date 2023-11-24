<?php

class wishlist{

    public $wishlist_id;
    public $Course_ID;
    public $User_ID;



    public function __construct()
    {

        require_once('teacher/components/connect.php');

        $database_object = new Database_connection;


        $this->connect = $database_object->connect();
      
      
        
    }

    public function addToWishlist($courseId, $userId)
    {
        $this->Course_ID = $courseId;
        $this->User_ID = $userId;

       
        $query = "INSERT INTO wishlist (Course_ID ,User_ID) VALUES ('$courseId', '$userId' )";
        
        $stmt = $this->connect->prepare($query);
      
        
        if ($stmt->execute()) {
            echo "Added to wishlist successfully!";
        } else {
            echo "Error adding to wishlist: " . $stmt->error;
        }

      
    }
}

 
?>