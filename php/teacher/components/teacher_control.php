<?php

    class teacher
    {
        public $tutor_id;
        public $Qualification;
        public $Subjects;
        public $cv;
        public $comment;
        public $connect;
       
       
	    public function __construct()
	    {

            require_once('connect.php');

            $database_object = new Database_connection;


            $this->connect = $database_object->connect();
          
            $this->unique_id = $database_object->unique_id();
            
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
        public function setcv($cv)
        {

            $this->cv = $file_name;       
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
        public function getconnectI()
        {
            return $this->connect;
        }

        public function Save()
        {
            $add_teacher = $this->connect->prepare("INSERT INTO `tutors`(id, User_status, CV, Language, About) VALUES(?,?,?,?,?)");
            $add_teacher->execute([$this->tutor_id,$this->Qualification ,$this->Subjects, $this->cv, $this->comment]);
        }


    }
?>