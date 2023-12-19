<?php
  require_once(__ROOT__ . "model/model.php");
?>
<?php

class wishlist extends Model
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
            $_SESSION['error_message'] = "Already added";
        } else {
       

        
         $query = "
         INSERT INTO wishlist (playlist_id, User_ID)
         VALUES (?, ?)
         ";
        $stmt = $this->db->getConn()->prepare($query);
      
        
        if ($stmt->execute([
            $this->Course_ID,
            $this->User_ID])) 
        {
            $_SESSION['error_message'] = "Added to wishlist successfully!";
        } else {
            $_SESSION['error_message'] = "Error adding to wishlist: " . $stmt->error;
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
            $_SESSION['error_message'] = "deleted successfully!";
        } else {
            $_SESSION['error_message'] = "Error deleting: " . $stmt->error;
        }
    
}
    

    public function get_All_wishlist($User_ID)
    {
         $query = "SELECT * FROM `wishlist` INNER JOIN `playlist` INNER JOIN `user` ON wishlist.playlist_id = playlist.playlist_id and    wishlist.User_ID = user.user_id  and wishlist.User_ID = ? ";
         $statement = $this->db->getConn()->prepare($query);
         $statement->execute([$User_ID]);

        return $statement;

    }
       







    }


 
?>