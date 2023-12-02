<?php require_once('model.php');?>
<?php

    class tutor extends model
    {
        public $tutor_id;
        public $Qualification;
        public $Subjects;
        public $User_status;
        public $cv;
        public $comment;
        public $connect;
       
       
	    public function __construct()
	    {
            $this->db = $this->connect();
	    }

        public function settutorid($tutor_id)
        {
            $this->tutor_id = $tutor_id;
        }
        public function gettutorid()
        {
            return $this->tutor_id;
        }
        public function setQualification($Qualification)
        {
            $this->Qualification = $Qualification;
        }
        public function getQualification()
        {
            return $this->Qualification;
        }
        public function setSubjects($Subjects)
        {
            $this->Subjects = $Subjects;
        }
        public function getSubjects()
        {
            return $this->Subjects;
        }
        public function setUser_status($User_status)
        {
            $this->User_status = $User_status;
        }
        public function getUser_status()
        {
            return $this->User_status;
        }
        public function setcv($cv)
        {
            $this->cv = $cv;       
        }
        public function getcv()
        {
            return $this->cv;
        }
        public function setcomment($comment)
        {
            $this->comment = $comment;
        }
        public function getcomment()
        {
            return $this->comment;
        }

        function get_email_by_id()
        {
            $query = "SELECT user.user_email FROM `tutors` INNER JOIN `user` ON user.user_id = :tutor_id";
            $statement = $this->db->getConn()->prepare($query);

            $statement->execute([':tutor_id' => $this->tutor_id]);

            return $statement;
        }
        public function Save()
        {
            $add_teacher = $this->db->getConn()->prepare("INSERT INTO `tutors`(tutor_id, User_status, CV, Language, About) VALUES(?,?,?,?,?)");
            $add_teacher->execute([$this->tutor_id  , $this->User_status ,$this->cv,$this->Subjects, $this->comment]);

            return true;
        }

        public function Check_Tutor()
        {
            $query = "SELECT * FROM `tutors` WHERE tutor_id  = :tutor_id";
            $statement = $this->db->getConn()->prepare($query);

            if($statement->execute([':tutor_id' => $this->tutor_id]))
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