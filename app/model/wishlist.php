<?php

class wishlist extends 
{

    public $wishlist_id;
    public $Course_ID;
    public $User_ID;



	public function __construct()
	{
		$this->db = $this->connect();
	}

    public function addwishlist($courseId, $userId)
    {
        $this->Course_ID = $courseId;
        $this->User_ID = $userId;

        $chck_existing= "SELECT * FROM wishlist WHERE playlist_id = '$courseId' AND User_ID = '$userId'";
        $stmt1 = $this->db->getConn()->prepare($chck_existing);
        $stmt1->execute();

        if ($stmt1->fetch()) {
            echo "Already added";
        } else {
       
         $query = "INSERT INTO wishlist (playlist_id ,User_ID) VALUES ('$courseId', '$userId' )";
        
        $stmt = $this->db->getConn()->prepare($query);
      
        
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

        $chck_existing= "SELECT * FROM wishlist  WHERE playlist_id='$courseId' AND User_ID='$userId' ";
        $stmt1 =$this->db->getConn()->prepare($chck_existing);
        $stmt1->execute();
       
   

         $query = "DELETE FROM wishlist WHERE playlist_id='$courseId' AND User_ID='$userId'";
        
        $stmt = $this->db->getConn()->prepare($query);
        if ($stmt->execute()) {
            echo "deleted successfully!";
        } else {
            echo "Error deleting: " . $stmt->error;
        }
    
}
    

    public function get_All_wishlist($User_ID)
    {
         $query = "SELECT * FROM `wishlist` INNER JOIN `playlist` ON wishlist.playlist_id = playlist.playlist_id  WHERE User_ID = '$User_ID' ";
         $statement = $this->db->getConn()->prepare($query);
         $statement->execute();

        return $statement;

    }
       







    }


 
?>