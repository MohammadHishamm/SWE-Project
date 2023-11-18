<?php
     
     class wishlist{
       public $course_id;
      
       


       public function setCourseid($course_id)
       {
           $this->course_id = $course_id;
       }

       public function getCourseid()
       {
           return $this->course_id;
       }

      

       function adddesire($course_id) {
        $course = $course_id;
    
        
                $course = ["course_id" => $course_id];
                $desire[] = json_decode($_COOKIE['desire']);
                array_push($desire, $course);
                setcookie('desire', json_encode($desire), time() + 604800);
            
            return ("course  added!");
        }


        function deletedesire($course_id) {
            $desire = json_decode($_COOKIE['desire']);
            foreach ($desire as $key => $course) {
                if ($key == $course_id) {
                    array_pop($desire[$key]);
                    setcookie('desire', json_encode($desire), time() + 604800);
                }
            }



    
     }

     }


?>