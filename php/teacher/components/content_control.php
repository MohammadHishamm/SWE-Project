<?php

class content {

     
    public $tutor_id;
    public $content_id;
    public $content_title;
    public $content_description;
    public $content_status;
    public $content_video;
    public $content_thumb;
    public $content_playlist_id;
    public $unique_id;
    public $connect;

    public function setContentId(){
        $this->content_id  =  $this->unique_id;
    }
    public function getContentId(){
        return $this->content_id;
    }

    public function setContentTitle($content_title){
        $this->content_title  =  $content_title;
    }
    public function getContentTitle(){
        return $this->content_title;
    }

    public function setContentDescription($content_description){
        $this->content_description  =  $content_description;
    }
    public function getContentDescription(){
        return $this->content_description;
    }

    public function setContentStatus($content_status){
        $this->content_status  =  $content_status;
    }
    public function getContentStatus(){
        return $this->content_status;
    }

    public function setContentVideo($content_video){
    $video = filter_var($content_video, FILTER_SANITIZE_STRING);
   $video_ext = pathinfo($video, PATHINFO_EXTENSION);
   $rename_video = $this->unique_id . '.' . $video_ext;
   $video_tmp_name = $_FILES['video']['tmp_name'];
   $video_folder = '../uploaded_files/' . $rename_video;

        $this->content_video  =  $rename_video;
    }
    public function getContentVideo(){
        return $this->content_video;
    }

    public function setContentThumb($content_thumb){
    $thumb = filter_var($content_thumb, FILTER_SANITIZE_STRING);
    $thumb_ext = pathinfo($thumb, PATHINFO_EXTENSION);
    $rename_thumb = $this-> unique_id . '.' . $thumb_ext;
    $thumb_size = $_FILES['thumb']['size'];
    $thumb_tmp_name = $_FILES['thumb']['tmp_name'];
    $thumb_folder = '../uploaded_files/' . $rename_thumb;
        $this->content_thumb  =  $rename_thumb;
    }
    public function getContentThumb(){
        return $this->content_thumb;
    }

    public function setContentPlaylist($content_playlist_id){
        $this->content_playlist_id  =  $content_playlist_id;
    }
    public function getContentPlaylist(){
        return $this->content_playlist_id;
    }
    public function setTutorId($tutor_id){
        $this->tutor_id  =  $tutor_id;
    }
    public function getTutorId(){
        return $this->tutor_id;
    }
    



    


    public function __construct()
	    {

            require_once('connect.php');

            $database_object = new Database_connection;


            $this->connect = $database_object->connect();
          
            $this->unique_id = $database_object->unique_id();
            
	    }

        public function get_connect()
        {
            return $this->connect;
        }

        public function saveContent()
        {

            $add_playlist = $this->connect->prepare("INSERT INTO `content`(id, tutor_id, playlist_id, title, description, video, thumb, status) VALUES(?,?,?,?,?,?)");
            $add_playlist->execute([$this->content_id, $this->tutor_id, $this->content_playlist_id, $this->content_title, $this->content_description, $this->content_video, $this->content_thumb, $this->content_status]);



            
            if($add_playlist){
                return true;
            }else{
                return false;
            }
        }



        public function get_All_playlist($tutor_id)
        {
            $query = "SELECT * FROM `content` WHERE tutor_id = ? ORDER BY date DESC";
            $statement = $this->connect->prepare($query);
            $statement->execute([$tutor_id]);
         
            return $statement;
        }

        public function get__playlist_by_id($id)
        {
            $query = "SELECT * FROM `content` WHERE id = ? LIMIT 1";
            $statement = $this->connect->prepare($query);
            $statement->execute([$id]);
         
            return $statement;
        }

        public function Delete_playlist($playlist_id, $tutor_id)
        {

        }

        public function Update_playlist($playlist_id , $tutor_id )
        {
            
        }


 }

?>

