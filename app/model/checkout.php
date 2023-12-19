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

    }


 
?>