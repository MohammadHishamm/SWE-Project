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

    public function addwishlist($courseId, $userId)
    {
        $this->Course_ID = $courseId;
        $this->User_ID = $userId;

        $chck_existing= "SELECT * FROM wishlist WHERE Course_ID = '$courseId' AND User_ID = '$userId'";
        $stmt1 = $this->connect->prepare($chck_existing);
        $stmt1->execute();

        if ($stmt1->fetch()) {
            echo "Already added";
        } else {
       
         $query = "INSERT INTO wishlist (Course_ID ,User_ID) VALUES ('$courseId', '$userId' )";
        
        $stmt = $this->connect->prepare($query);
      
        
        if ($stmt->execute()) {
            echo "Added to wishlist successfully!";
        } else {
            echo "Error adding to wishlist: " . $stmt->error;
        }
    }
        
    }

    public function deletewishlist($courseId,$userId)
    {
        $this->Course_ID = $courseId;
        $this->User_ID = $userId;

        $chck_existing= "SELECT * FROM wishlist  WHERE Course_ID='$course_Id' AND User_ID='$user_Id' ";
        $chck_existing_run= mysqli_query($conn,$chck_existing);
       
        if(mysqli_num_rows( $chck_existing_run) > 0 )
{
    $query = "DELETE FROM wishlist (Course_ID ,User_ID) VALUES ('$courseId', '$userId' )";
        
        $stmt = $this->connect->prepare($query);
}
    }

    public function get_All_wishlist($User_ID)
    {
         $query = "SELECT * FROM `wishlist` WHERE User_ID = '$User_ID' ";
         $statement = $this->connect->prepare($query);
         $statement->execute();

        return $statement;

    }
       







    }


 
?>