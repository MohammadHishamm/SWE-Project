<?php
require_once(__ROOT__ . "../php/Chat/vendor/autoload.php");


?>
<?php
  
require_once(__ROOT__ . "model/model.php");

class Notify extends Model
{
    private $user_id;
    private $message;


    public function __construct()
	{
		
		$this->db = $this->connect();
	}
    function setuserid($user_id)
    {
        $this->user_id = $user_id;
    }

    function getmessage()
    {
        return $this->message;
    }

    function setmessage($message)
    {
        $this->message = $message;
    }

    function getuserid()
    {
        return $this->user_id;
    } 

    public function save_notify()
    {
        $sql = "
        INSERT INTO notification (user_id, msg) 
        VALUES (?, ?)
        ";
    
        $statement = $this->db->getConn()->prepare($sql);
    
        if ($statement->execute([$this->user_id, $this->message])) {
            return true;
        } else {
            return false;
        }
    }

    public function get_notify()
    {

        $options = array(
            'cluster' => 'eu',
            'useTLS' => true
          );
          $pusher = new Pusher\Pusher(
            'fcccde774b0f17925676',
            '196c609e9bdc44972327',
            '1723838',
            $options
          );

        $sql = "SELECT * FROM notification WHERE user_id = ? order by created_on DESC";
    
        $statement = $this->db->getConn()->prepare($sql);
    
        if ($statement->execute([$this->user_id]))
        {
            $_POST['statement'] = $statement->fetchAll();
            $_POST['count'] = $statement->rowCount();
            $data = [
                'message' =>  json_encode($statement->fetchAll()),
            ];
            $channelName = 'my-channel';
            $pusher->trigger($channelName, 'my-event', $_POST['statement']);
            return true;
        } 
        else {
            return false;
        }
    }
    

    public function delete_notify()
    {

    }


    
}


?>