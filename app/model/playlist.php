
<?php
  require_once(__ROOT__ . "model/model.php");
  ?>

<?php
    // include '../components/connect.php';

    class playlist extends Model
    {
        public $playlist_id;
        public $playlist_tutor;
        public $playlist_title;
        public $playlist_description;
        public $playlist_requirements;
        public $playlist_tag;
        public $playlist_status;
        public $playlist_price;
        public $playlist_image;
        public $playlist_approval;
        public $unique_id;
        public $connect;
       
       
	    public function __construct()
	    {
            $this->db = $this->connect();
            $this->unique_id = $this->db->unique_id();
            
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
        public function setPlaylistRequirements($playlist_requirements){$this->playlist_requirements = $playlist_requirements;}
        public function getPlaylistRequirements(){return $this->playlist_requirements;}
        public function setPlaylisttag($playlist_tag){$this->playlist_tag = $playlist_tag;}
        public function getPlaylisttag(){return $this->playlist_tag;}
        public function setPlaylistPrice($playlist_price){$this->playlist_price = $playlist_price;}
        public function getPlaylistPrice(){return $this->playlist_price;}
        public function setPlaylistStatus($playlist_status){$this->playlist_status = $playlist_status;}
        public function getPlaylistStatus(){return $this->playlist_status;}
        public function setPlaylistImage($playlist_image)
        {
            $image = filter_var($playlist_image, FILTER_SANITIZE_STRING);
            $ext = pathinfo($image, PATHINFO_EXTENSION);
            $rename = $this->unique_id.'.'.$ext;
            $image_size = $_FILES['image']['size'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_folder = '../Images/courses/'.$rename;  
            move_uploaded_file($image_tmp_name, $image_folder);       
            $this->playlist_image = $rename;           
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
    $add_playlist =  $this->db->getConn()->prepare("INSERT INTO `playlist`(playlist_id, tutor_id, title, description, requirements,Tags, price, thumb, status) VALUES(?,?,?,?,?,?,?,?,?)");
    if ($add_playlist->execute([$this->playlist_id, $this->playlist_tutor, $this->playlist_title, $this->playlist_description, $this->playlist_requirements, $this->playlist_tag, $this->playlist_price, $this->playlist_image, $this->playlist_status])) {
        // Insert successful
        return true;
    } else {
        // Insert failed, display error information
        var_dump($add_playlist->errorInfo());
        return false;
    }
}


        public function get_All_playlist($tutor_id)
        {
            $query = "SELECT * FROM `playlist` WHERE tutor_id = ? ORDER BY date DESC";
            $statement =  $this->db->getConn()->prepare($query);
            $statement->execute([$tutor_id]);
         
            return $statement;
        }

        public function get_playlist_table_row_5()
        {
            $query = "SELECT * FROM playlist  
            INNER JOIN tutors ON playlist.tutor_id = tutors.tutor_id 
            INNER JOIN user ON tutors.tutor_id = user.user_id
            ORDER BY RAND() LIMIT 4 ";

            $statement =  $this->db->getConn()->prepare($query);
            $statement->execute([]);
         
            return $statement;
        }

        
        public function get_playlist_table_row()
        {
            $query = "SELECT * FROM `playlist`";
            $statement =  $this->db->getConn()->prepare($query);
            $statement->execute([]);
         
            return $statement;
        }

        public function get_playlist_table_limit($this_page_first_result , $results_per_page)
        {

            $query = "SELECT * FROM playlist 
            INNER JOIN tutors ON playlist.tutor_id = tutors.tutor_id 
            INNER JOIN user ON tutors.tutor_id = user.user_id
             LIMIT $this_page_first_result,$results_per_page";
    
            $statement =  $this->db->getConn()->prepare($query);
    
            // byzawd ' fakro string 
            // fa bazwed PDO::PARAM_INT 3ashan 22olo eno int 
            // $statement->bindParam(':this_page_first_result', $this_page_first_result , PDO::PARAM_INT);
    
            // $statement->bindParam(':results_per_page', $results_per_page , PDO::PARAM_INT);

            $statement->execute([]);


            return $statement;
        }

        public function get_playlist_by_id($id)
        {
            $query = "SELECT * FROM playlist INNER JOIN tutors ON playlist.playlist_id = ? and  playlist.tutor_id = tutors.tutor_id INNER JOIN user on tutors.tutor_id = user.user_id   ";
            $statement =  $this->db->getConn()->prepare($query);
            $statement->execute([$id]);
         
            return $statement;
        }

        public function Delete_playlist($playlist_id, $tutor_id)
        {

            // data exist in playlist table
            $playlist=  $this->db->getConn()->prepare("SELECT * FROM `playlist` WHERE playlist_id = ? AND tutor_id = ? LIMIT 1");
            $playlist->execute([$playlist_id, $tutor_id]);

         
            if($playlist -> rowCount() > 0)
            {

                // thumb for playlist
                $delete_playlist_thumb = $this->db->getConn()->prepare("SELECT * FROM `playlist` WHERE playlist_id = ? LIMIT 1");
                $delete_playlist_thumb->execute([$playlist_id]);

                $fetch_thumb = $delete_playlist_thumb->fetch(PDO::FETCH_ASSOC);
                unlink('../Images/courses/'.$fetch_thumb['thumb']);


                // thumb for content
                $delete_playlist_thumb =  $this->db->getConn()->prepare("SELECT * FROM `content` WHERE playlist_id = ? LIMIT 1");
                $delete_playlist_thumb->execute([$playlist_id]);
                $fetch_thumb = $delete_playlist_thumb->fetch(PDO::FETCH_ASSOC);

                if(!empty($fetch_thumb))
                {
                    unlink('../Images/courses/'.$fetch_thumb['thumb']);
                }
                


                // video for contant
                $delete_video = $this->db->getConn()->prepare("SELECT * FROM `content` WHERE playlist_id = ? LIMIT 1");
                $delete_video->execute([$playlist_id]);
                $fetch_video = $delete_video->fetch(PDO::FETCH_ASSOC);

                if(!empty($fetch_video))
                {       
                    unlink('../Images/courses/'.$fetch_thumb['video']);
                }
                
               
                // delete playlist
                $delete_playlist = $this->db->getConn()->prepare("DELETE FROM `playlist` WHERE playlist_id = ?");
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
            $update_playlist =  $this->db->getConn()->prepare("UPDATE `playlist` SET title = ?, description = ? , thumb = ? , status = ? WHERE playlist_id = ? AND tutor_id = ?");
            $update_playlist->execute([$this->playlist_title , $this->playlist_description , $this->playlist_image , $this->playlist_status , $playlist_id , $tutor_id]);   
        }





        public function approve_playlist($playlist_id)
        {
            $query = "UPDATE playlist SET playlist_approval = 'True' WHERE playlist_id = :playlist_id;";
            $statement =  $this->db->getConn()->prepare($query);
        
            // Bind the playlist_id parameter
            $statement->bindParam(':playlist_id', $playlist_id);
        
            if ($statement->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function get_All_playlists()
        {
             $query = "SELECT * FROM `playlist` ORDER BY date DESC";
             $statement =  $this->db->getConn()->prepare($query);
             $statement->execute();

            return $statement;

      }


      public function get_videos_count($playlist_id)
      {
            $count_videos = $this->db->getConn()->prepare("SELECT * FROM `content` WHERE playlist_id = ?");
            $count_videos->execute([$playlist_id]);
            $total_videos = $count_videos->rowCount();

            return $total_videos;
      }

      public function search($name)
      {
        $query = "SELECT * FROM `playlist` WHERE title LIKE ? ORDER BY date DESC";
        $statement =  $this->db->getConn()->prepare($query);
        $statement->execute([$name]);

       return $statement;
      }
        
    }


    




?>