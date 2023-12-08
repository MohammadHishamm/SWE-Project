<?php

require_once(__ROOT__ . "controller/controller.php");


class Studentcontroller extends Controller
{

    #addcourse function 
    public function addcourse() {


        $this->model->setCourseid($_POST['course_id']);
        $this->model->setStudentid($_POST['student_id']);

        return $this->model->add_course();
    }

}
