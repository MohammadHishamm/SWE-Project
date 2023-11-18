<?php
    class Courses
    {
        public $course_id ;
        public $student_id ;
        public $connect;

        public function __construct()
        {
            require_once 'Database_connection.php';
    
            $database_object = new Database_connection1;
    
            $this->connect = $database_object->connect();
        }
        
        public function setCourseid($course_id)
        {
            $this->course_id = $course_id;
        }

        public function getCourseid()
        {
            return $this->course_id;
        }

        public function setStudentid($student_id)
        {
            $this->student_id = $student_id;
        }

        public function getStudentid()
        {
            return $this->student_id;
        }

        public function get_course_by_student_id()
        {

            $query = "SELECT * FROM `course` WHERE Student_ID = ? ";
            $statement = $this->connect->prepare($query);
            $statement->execute([$this->student_id]);
         
            return $statement;

          
        }
    }

?>