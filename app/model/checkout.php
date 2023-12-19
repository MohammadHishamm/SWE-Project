<?php
  require_once(__ROOT__ . "model/model.php");
?>
<?php

class checkout extends Model
{

    public $checkout_id;
    public $Course_ID;
    public $User_ID;



	public function __construct()
	{
		$this->db = $this->connect();
	}

    public function addcheckout($courseId, $userId)
    {
        $this->Course_ID = $courseId;
        $this->User_ID = $userId;

        $chck_existing= "SELECT * FROM checkout WHERE playlist_id = '$courseId' AND User_ID = '$userId'";
        $stmt1 = $this->db->getConn()->prepare($chck_existing);
        $stmt1->execute();

        if ($stmt1->fetch()) {
            echo "Already added";
        } else {
       

        
         $query = "
         INSERT INTO checkout (playlist_id, User_ID)
         VALUES (?, ?)
         ";
        $stmt = $this->db->getConn()->prepare($query);
      
        
        if ($stmt->execute([
            $this->Course_ID,
            $this->User_ID])) 
        {
            echo "Added to Checkout successfully!";
        } else {
            echo "Error adding to Checkout: " . $stmt->error;
        }
    }
        
    }

    public function deletecheckout($courseId,$userId)
    {
        $this->Course_ID = $courseId;
        $this->User_ID = $userId;

        $chck_existing= "SELECT * FROM checkout  WHERE playlist_id='$courseId' AND User_ID='$userId' ";
        $stmt1 =$this->db->getConn()->prepare($chck_existing);
        $stmt1->execute();
       
   

         $query = "DELETE FROM checkout WHERE playlist_id='$courseId' AND User_ID='$userId'";
        
        $stmt = $this->db->getConn()->prepare($query);
        if ($stmt->execute()) {
            echo "deleted successfully!";
        } else {
            echo "Error deleting: " . $stmt->error;
        }
    
}
    public function get_All_checkout($User_ID)
    {
         $query = "SELECT * FROM `checkout` INNER JOIN `playlist` INNER JOIN `user` ON checkout.playlist_id = playlist.playlist_id and    checkout.User_ID = user.user_id  and checkout.User_ID = ? ";
         $statement = $this->db->getConn()->prepare($query);
         $statement->execute([$User_ID]);

        return $statement;

    }
    }
?>