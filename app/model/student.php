<?php
  
require_once(__ROOT__ . "model/user.php");

class Student extends User
{
    private $student_id;
    private $course_id;
   

    function setCourseid($course_id)
    {
        $this->course_id = $course_id;
    }
    function getCourseId()
    {
        return $this->course_id;
    }
    
    function setStudentId($student_id)
    {
        $this->student_id = $student_id;
    }

    function getStudentId()
    {
        return $this->student_id;
    }
    
    public function add_course($course_id) {
        $query = "INSERT INTO course (Course_id, Student_id) VALUES (?, ?)";
        $statement =$this->db->getConn()->prepare($query);
        $statement->execute([$course_id, $this->student_id]);
    }


    public function get_course_by_student_id($student_id)
    {

        $query = "SELECT * FROM course  INNER JOIN  playlist INNER JOIN tutors INNER JOIN user ON  user.user_id = tutors.tutor_id and playlist.tutor_id = tutors.tutor_id  and  course.Course_id = playlist.playlist_id AND course.Student_id = ?  ";
        $statement =$this->db->getConn()->prepare($query);
        $statement->execute([$student_id]);
     
        return $statement;

      
    }

    public function delete_course_by_id($course_id)
    {
        
        $query = "DELETE FROM course WHERE Course_id = ? AND Student_id = ?";
        $statement = $this->connect->prepare($query);
        $statement->execute([$course_id, $this->student_id]);

       
    }

   
}

?>
