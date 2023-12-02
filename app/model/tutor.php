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

        public function Save()
        {
            $add_teacher = $this->db->getConn()->prepare("INSERT INTO `tutors`(tutor_id, User_status, CV, Language, About) VALUES(?,?,?,?,?)");
            $add_teacher->execute([$this->tutor_id  , $this->User_status ,$this->cv,$this->Subjects, $this->comment]);
        }


    }
?>