<?php
  require_once(__ROOT__ . "model/model.php");
?>
<?php


	
class User extends Model
{
	private $user_id;
	private $user_name;
	private $user_email;
	private $user_password;
	private $user_status;
	private $user_img;
	private $user_bio;
	private $user_social1;
	private $user_social2;
	private $user_social3;
	private $user_created_on;
	private $user_verification_code;
	private $user_login_status;
	private $user_token;
	private $user_connection_id;
	private $user_google_img;
	private $user_type;
	public $connect;


	public function __construct()
	{
		
		$this->db = $this->connect();
	}

	function setUserId($user_id)
	{
		$this->user_id = $user_id;
	}

	function getUserId()
	{
		return $this->user_id;
	}

	function setUserimg($user_img)
	{
		$image = filter_var($user_img, FILTER_SANITIZE_STRING);
		$ext = pathinfo($image, PATHINFO_EXTENSION);
		$rename = $this->user_id.'.'.$ext;
		$image_size = $_FILES['image']['size'];
		$image_tmp_name = $_FILES['image']['tmp_name'];
		$image_folder = '../Images/users/'.$rename;  
		move_uploaded_file($image_tmp_name, $image_folder);       
		$this->user_img = $rename; 
	}

	function getUserimg()
	{
		return $this->user_img;
	}
	function setoldimg($user_img)
	{
		$this->user_img = $user_img;
	}

	function getoldimg()
	{
		return $this->user_img;
	}


	function setUserName($user_name)
	{
		$this->user_name = $user_name;
	}

	function getUserName()
	{
		return $this->user_name;
	}

	function setUserEmail($user_email)
	{
		$this->user_email = $user_email;
	}

	function getUserEmail()
	{
		return $this->user_email;
	}

	function setUserPassword($user_password)
	{
		$this->user_password = $user_password;
	}

	function getUserPassword()
	{
		return $this->user_password;
	}

	function setUserStatus($user_status)
	{
		$this->user_status = $user_status;
	}

	function getUserStatus()
	{
		return $this->user_status;
	}
	function setUserBio($user_bio)
	{
		$this->user_bio = $user_bio;
	}
	function getUserBio()
	{
		return $this->user_bio;
	}
	function setUserSocial1($user_social1)
	{
		$this->user_social1 = $user_social1;
	}
	function getUserSocial1()
	{
		return $this->user_social1;
	}
	function setUserSocial2($user_social2)
	{
		$this->user_social2 = $user_social2;
	}
	function getUserSocial2()
	{
		return $this->user_social2;
	}
	function setUserSocial3($user_social3)
	{
		$this->user_social3 = $user_social3;
	}
	function getUserSocial3()
	{
		return $this->user_social3;
	}
	function setUserCreatedOn($user_created_on)
	{
		$this->user_created_on = $user_created_on;
	}

	function getUserCreatedOn()
	{
		return $this->user_created_on;
	}

	function setUserVerificationCode($user_verification_code)
	{
		$this->user_verification_code = $user_verification_code;
	}

	function getUserVerificationCode()
	{
		return $this->user_verification_code;
	}

	function setUserLoginStatus($user_login_status)
	{
		$this->user_login_status = $user_login_status;
	}

	function getUserLoginStatus()
	{
		return $this->user_login_status;
	}

	function setUserToken($user_token)
	{
		$this->user_token = $user_token;
	}

	function getUserToken()
	{
		return $this->user_token;
	}

	function setUserConnectionId($user_connection_id)
	{
		$this->user_connection_id = $user_connection_id;
	}

	function getUserConnectionId()
	{
		return $this->user_connection_id;
	}

	function user_google_img($user_google_img)
	{
		$this->user_google_img = $user_google_img;
	}
	#setters and getters for user_type
	 function getUserType()
	{
		return $this->user_type;
	}
	function setUserType($user_type)
	{
		$this->user_type = $user_type;
	}

	function save_data()
{
    $sql = "
    INSERT INTO user (user_name, user_email,user_img, user_password, user_status, user_created_on, user_verification_code, user_type) 
    VALUES (?, ?, ?, ?, ?, ?,?,?)
    ";

    $statement = $this->db->getConn()->prepare($sql);
	$this->user_img = "default.jpg";
	$this->user_type='Student';

    if ($statement->execute([$this->user_name, $this->user_email,$this->user_img ,$this->user_password, $this->user_status, $this->user_created_on, $this->user_verification_code,$this->user_type])) {
        return true;
    } else {
        return false;
    }
}

function save_google_data()
{
	$this->user_type='Student';
	$sql = "
    INSERT INTO user (user_name, user_email,user_img, user_status, user_created_on, user_type) 
    VALUES (?, ?, ?, ?, ?,?)
    ";
	

    $statement = $this->db->getConn()->prepare($sql);

    if ($statement->execute([$this->user_name, $this->user_email,$this->user_google_img , $this->user_status, $this->user_created_on,$this->user_type])) {
        return true;
    } else {
        return false;
    }
}



public function get_user_data_by_email()
{
    $sql = "
    SELECT * FROM user
    WHERE user_email = :user_email
    ";

    $statement = $this->db->getConn()->prepare($sql);

    if ( $statement->execute([':user_email' => $this->user_email])) {
        $user_data = $statement->fetch(PDO::FETCH_ASSOC);
        return $user_data;
    } else {
        return false;
    }
}


	
public function update_user_login_data()
{
    $sql = "
    UPDATE user 
    SET user_login_status = :user_login_status, user_token = :user_token  
    WHERE user_id = :user_id
    ";

    $statement = $this->db->getConn()->prepare($sql);


    if ($statement->execute([':user_login_status' => $this->user_login_status , ':user_token' => $this->user_token , ':user_id' => $this->user_id])) {
        return true;
    } else {
        return false;
    }
}





function get_user_by_id()
{
    $query = "SELECT * FROM `user` WHERE user_id = :user_id";
    $statement = $this->db->getConn()->prepare($query);

    $statement->execute([':user_id' => $this->user_id]);

    return $statement;
}
function get_user_all_data_with_status_count()
{
    $query = "
    SELECT user_id, user_name, user_login_status,user_img, (SELECT COUNT(*) FROM chat_message WHERE to_user_id = :user_id AND from_user_id = user.user_id AND status = 'No') AS count_status FROM user
    ";

	$statement = $this->db->getConn()->prepare($query);

    $statement->execute([':user_id' => $this->user_id]);

    return $statement;
}

function update_user_connection_id()
{
    $query = "
    UPDATE user 
    SET user_connection_id = ? 
    WHERE user_token = ?
    ";

    $statement = $this->db->getConn()->prepare($query);

    $statement->execute([ $this->user_connection_id, $this->user_token]);

  
}

function get_user_id_from_token()
{
    $query = "
    SELECT user_id FROM user
    WHERE user_token = ?
    ";

    $statement = $this->db->getConn()->prepare($query);


    $statement->execute([$this->user_token]);

    // $result = $statement->get_result();
    // $user_id = $result->fetch_assoc();

    return $statement;
}

function get_user_data_by_id()
{
    $query = "SELECT * FROM user WHERE user_id = ?";
    $statement = $this->db->getConn()->prepare($query);

    try {
        if ($statement->execute([ $this->user_id])) {
            $user_data = $statement->fetch(PDO::FETCH_ASSOC);
        } else {
            $user_data = array();
        }
    } catch (Exception $error) {
        echo $error->getMessage();
    }

    return $user_data;
}


function is_valid_email_verification_code()
{
    $query = "SELECT * FROM user WHERE user_verification_code = ?";
    $statement = $this->db->getConn()->prepare($query);

    $statement->bind_param('s', $this->user_verification_code);

    $statement->execute();

    $result = $statement->get_result();

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}


function enable_user_account()
{
    $query = "UPDATE user SET user_status = ? WHERE user_verification_code = ?";
    $statement = $this->db->getConn()->prepare($query);

    $statement->bind_param('ss', $this->user_status, $this->user_verification_code);

    if ($statement->execute()) {
        return true;
    } else {
        return false;
    }
}

function get_all_users_data()
{
    $query = "SELECT * FROM user";
    $statement = $this->db->getConn()->prepare($query);
    $statement->execute();

    // Fetch the results as an associative array
    $users_data = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $users_data;
}


function delete_user_by_id()
{
    $query = "DELETE FROM user WHERE user_id = :user_id";
    $statement = $this->db->getConn()->prepare($query);

    $statement->bindValue(':user_id', $this->user_id, PDO::PARAM_INT);

    try {
        if ($statement->execute()) {
            header("Location: ../public/partials/signout.php");
            exit(); 
        
        } else {
            return false;
        }
    } catch (Exception $error) {
        echo $error->getMessage();
        return false;
    }
}

function update_user_data()
{
    $query = "UPDATE user SET user_name = :user_name ,user_img = :user_img, user_bio = :user_bio, user_social1 = :user_social1, user_social2 = :user_social2, user_social3 = :user_social3 WHERE user_id = :user_id";
    $statement = $this->db->getConn()->prepare($query);

    if ($statement->execute([":user_name" => $this->user_name, ":user_img" => $this->user_img, ":user_bio" => $this->user_bio, ":user_social1" => $this->user_social1, ":user_social2" => $this->user_social2, ":user_social3" => $this->user_social3 ,":user_id" => $this->user_id])) {
        return true;
    } else {
        return false;
    }
}

function update_personal_data()
{
    $query = "UPDATE user SET user_email = :user_email, user_password = :user_password WHERE user_id = :user_id";
    $statement = $this->db->getConn()->prepare($query);

    $statement->bindParam(':user_email', $this->user_email);
    $statement->bindParam(':user_password', $this->user_password);
    $statement->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);

    if ($statement->execute()) {
        return true;
    } else {
        return false;
    }
}


	
}




	?>