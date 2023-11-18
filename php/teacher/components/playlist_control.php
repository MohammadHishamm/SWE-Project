<?php
    // include '../components/connect.php';

    class playlist{

        public $playlist_id;
        public $playlist_tutor;
        public $playlist_title;
        public $playlist_description;
        public $playlist_status;
        public $playlist_image;
        public $unique_id;
        public $connect;
       
       
	    public function __construct()
	    {

            require_once('connect.php');

            $database_object = new Database_connection;


            $this->connect = $database_object->connect();
          
            $this->unique_id = $database_object->unique_id();
            
	    }



        public function setPlaylistId(){
            $this->playlist_id  =  $this->unique_id;
        }
        public function getPlaylistId(){return $this->playlist_id;}
        public function setPlaylistTutor($playlist_tutor){$this->playlist_tutor = $playlist_tutor;}
        public function getPlaylistTutor(){return $this->playlist_tutor;}
        public function setPlaylistTitle($playlist_title){$this->playlist_title = $playlist_title;}
        public function getPlaylistTitle(){return $this->playlist_title;}
        public function setPlaylistDescription($playlist_description){$this->playlist_description = $playlist_description;}
        public function getPlaylistDescription(){return $this->playlist_description;}
        public function setPlaylistStatus($playlist_status){$this->playlist_status = $playlist_status;}
        public function getPlaylistStatus(){return $this->playlist_status;}
        public function setPlaylistImage($playlist_image)
        {
            $image = filter_var($playlist_image, FILTER_SANITIZE_STRING);
            $ext = pathinfo($image, PATHINFO_EXTENSION);
            $rename = $this->unique_id.'.'.$ext;
            $image_size = $_FILES['image']['size'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_folder = '../uploaded_files/'.$rename;         
            $this->playlist_image = $rename;

            move_uploaded_file($image_tmp_name, $image_folder);
        }
        public function getPlaylistImage(){return $this->playlist_image;}
        
        public function setPlaylistoldimg($playlist_old_img){return 
             $this->playlist_image = $playlist_old_img;}
        public function getPlaylistoldimg(){return $this->playlist_image;}


        public function get_connect()
        {
            return $this->connect;
        }
        public function Save()
        {
            $add_playlist = $this->connect->prepare("INSERT INTO `playlist`(id, tutor_id, title, description, thumb, status) VALUES(?,?,?,?,?,?)");
            $add_playlist->execute([$this->playlist_id,$this->playlist_tutor ,$this->playlist_title, $this->playlist_description, $this->playlist_image, $this->playlist_status]);
        }

        public function get_All_playlist($tutor_id)
        {
            $query = "SELECT * FROM `playlist` WHERE tutor_id = ? ORDER BY date DESC";
            $statement = $this->connect->prepare($query);
            $statement->execute([$tutor_id]);
         
            return $statement;
        }

        public function get__playlist_by_id($id)
        {
            $query = "SELECT * FROM `playlist` WHERE id = ? ORDER BY date DESC";
            $statement = $this->connect->prepare($query);
            $statement->execute([$id]);
         
            return $statement;
        }

        public function Delete_playlist($playlist_id, $tutor_id)
        {

            $playlist= $this->connect->prepare("SELECT * FROM `playlist` WHERE id = ? AND tutor_id = ? LIMIT 1");
            $playlist->execute([$playlist_id, $tutor_id]);

         
            if($playlist -> rowCount() > 0)
            {

                $delete_playlist_thumb = $this->connect->prepare("SELECT * FROM `playlist` WHERE id = ? LIMIT 1");
                $delete_playlist_thumb->execute([$playlist_id]);

                $fetch_thumb = $delete_playlist_thumb->fetch(PDO::FETCH_ASSOC);
                unlink('../uploaded_files/'.$fetch_thumb['thumb']);

                // $delete_bookmark = $connect->prepare("DELETE FROM `bookmark` WHERE playlist_id = ?");
                // $delete_bookmark->execute([$delete_id]);

                $delete_playlist =$this->connect->prepare("DELETE FROM `playlist` WHERE id = ?");
                $delete_playlist->execute([$playlist_id]);

                return true;
            }
            else
            {
                return false;
            }

        }

        public function Update_playlist($playlist_id , $tutor_id )
        {
            $update_playlist = $this->connect->prepare("UPDATE `playlist` SET title = ?, description = ? , thumb = ? , status = ? WHERE id = ? AND tutor_id = ?");
            $update_playlist->execute([$this->playlist_title , $this->playlist_description , $this->playlist_image , $this->playlist_status , $playlist_id , $tutor_id]);   
        }

    }
?>