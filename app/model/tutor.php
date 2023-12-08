<?php   
require_once(__ROOT__ . "model/user.php");
require_once(__ROOT__ . "model/playlist.php");
require_once(__ROOT__ . "model/content.php");
?>
<?php

    class tutor extends User
    {
        
        protected $Tutor_id;
        public $playlist;
        public $content;
        public $Gender;
        public $Position;
        public $User_status;
        public $cv;
        public $Language;
        public $Country;
        public $Comment;
        public $connect;
       

        public function __construct()
        {
            $this->playlist = new playlist();
            $this->content = new content();
        }

        public function setplaylist($playlist)
        {
            return $this->playlist = $playlist ;
        }

        public function setcontent($content)
        {
            return $this->content = $content;
        }

        public function getplaylist()
        {
            return $this->playlist;
        }

        public function getcontent()
        {
            return $this->content;
        }

        public function setTutor_id($Tutor_id)
        {
            $this->Tutor_id = $Tutor_id;
        }

        public function getTutor_id()
        {
            return $this->Tutor_id;
        }

        public function setGender($Gender)
        {
            $this->Gender = $Gender;
        }

        public function getGender()
        {
            return $this->Gender;
        }

        public function setPosition($Position)
        {
            $this->Position = $Position;
        }

        public function getPosition()
        {
            return $this->Position;
        }

        public function setUser_status($User_status)
        {
            $this->User_status = $User_status;
        }

        public function getUser_status()
        {
            return $this->User_status;
        }

        public function setLanguage($Language)
        {
            $this->Language = $Language;
        }

        public function getLanguage()
        {
            return $this->Language;
        }

        public function setCountry($Country)
        {
            $this->Country = $Country;
        }

        public function getCountry()
        {
            return $this->Country;
        }

        public function setCV($cv)
        {
            $this->cv = $cv;
        }

        public function getCV()
        {
            return $this->cv;
        }

        public function setComment($Comment)
        {
            $this->Comment = $Comment;
        }

        public function getComment()
        {
            return $this->Comment;
        }

        function get_email_by_id()
        {
            $query = "SELECT user.user_email FROM `tutors` INNER JOIN `user` ON user.user_id = :tutor_id";
            $statement = $this->db->getConn()->prepare($query);

            $statement->execute([':tutor_id' => $this->Tutor_id]);

            return $statement;
        }
        public function Save()
        {
            $add_teacher = $this->db->getConn()->prepare("INSERT INTO `tutors`(tutor_id, User_status, CV, language , position, country ,gender ,comment) VALUES(?,?,?,?,?,?,?,?)");
            $add_teacher->execute([$this->Tutor_id  , $this->User_status ,$this->cv,$this->Language,$this->Position, $this->Country,$this->Gender,$this->Comment]);

            return true;
        }

        public function Check_Tutor()
        {
            $query = "SELECT * FROM `tutors` WHERE tutor_id  = :tutor_id";
            $statement = $this->db->getConn()->prepare($query);

            if($statement->execute([':tutor_id' => $this->Tutor_id]))
            {
                if($statement->rowCount() > 0)
                {
                    return true;
                }
                else
                {
                    return false;
                }
               
            }
            else
            {
                return false;
            }
        }
    }
?>