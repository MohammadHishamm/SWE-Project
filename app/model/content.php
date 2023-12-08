<?php
  require_once(__ROOT__ . "model/playlist.php");
  ?>

<?php

class content extends playlist 
{

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


    public function __construct()
    {
        $this->db = $this->connect();
        $this->unique_id =  $this->db->unique_id();
        
    }
    
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
   $rename_video = $this->unique_id.'.'.$video_ext;
   $video_tmp_name = $_FILES['video']['tmp_name'];

   $video_folder = '../uploaded_files/'.$rename_video;
   move_uploaded_file($video_tmp_name, $video_folder);
  
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
    $thumb_folder = '../uploaded_files/'.$rename_thumb;
    move_uploaded_file($thumb_tmp_name, $thumb_folder);
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
    


        public function saveContent()
        {
            $add_content = $this->db->getConn()->prepare("INSERT INTO `content`(content_id, playlist_id, title, description, video, thumb, status) VALUES(?,?,?,?,?,?,?)");
            $add_content->execute([$this->content_id, $this->content_playlist_id, $this->content_title, $this->content_description,  $this->content_video ,$this->content_thumb, $this->content_status]);



        }



        public function get_All_content($tutor_id)
        {
            $query =
            "SELECT  content.*
             FROM content 
             INNER JOIN playlist
             ON  content.playlist_id = playlist.playlist_id and playlist.tutor_id = ?";

            $statement =  $this->db->getConn()->prepare($query);
            $statement->execute([$tutor_id]);
         
            return $statement;
        }

        public function get__playlist_by_id($id)
        {
            $query = "SELECT  content.*
            FROM content 
            INNER JOIN playlist
            ON  content.playlist_id = ? and playlist.playlist_id = content.playlist_id";

            $statement =  $this->db->getConn()->prepare($query);
            $statement->execute([$id]);
         
            return $statement;
        }

        public function get_content_by_id($id)
        {
            $query = "SELECT * FROM `content` where content_id = ? ";

            $statement =  $this->db->getConn()->prepare($query);
            $statement->execute([$id]);
         
            return $statement;
        }

        public function remove_content($video_id)
        {
            $verify_video =  $this->db->getConn()->prepare("SELECT * FROM `content` WHERE content_id = ? LIMIT 1");
            $verify_video->execute([$video_id]);

            if($verify_video->rowCount() > 0){
               
               $delete_video_thumb =  $this->db->getConn()->prepare("SELECT * FROM `content` WHERE content_id = ? LIMIT 1");
               $delete_video_thumb->execute([$video_id]);
               $fetch_thumb = $delete_video_thumb->fetch(PDO::FETCH_ASSOC);
               unlink('../uploaded_files/'.$fetch_thumb['thumb']);
         
               $delete_video = $this->db->getConn()->prepare("SELECT * FROM `content` WHERE content_id = ? LIMIT 1");
               $delete_video->execute([$video_id]);
               $fetch_video = $delete_video->fetch(PDO::FETCH_ASSOC);
               unlink('../uploaded_files/'.$fetch_video['video']);
                
               $delete_playlist = $this->db->getConn()->prepare("DELETE FROM `content` WHERE content_id = ?");
               $delete_playlist->execute([$video_id]);

                return true;
            }
            else
            {
                return false;
            }
        }

        public function Update_content($playlist_id , $tutor_id )
        {
            
        }


 }

?>