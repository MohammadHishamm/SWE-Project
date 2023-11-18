<?php


if(!empty($_SESSION['user_data']))
{
	header('location:index.php');
}


require_once('User/user.php');

$user_object = new User;
$user_object->setUserId($_GET['user_id']);



?>
<!DOCTYPE html>
<html lang="en">
<?php include "Header.php" ?>
<head>
        <link rel="stylesheet" href="../css/MDB css/mdb.min.css">
        <script src="../js/MDB java/mdb.min.js"></script>
</head>
<body style="background-color: #CED8E3;"> 

<?php include "Topnav.php" ?>
    <section>
        <div >
          <div class=" d-flex justify-content-center align-items-center ">
              <div class="col-12">
                <!-- Profile Image section -->
                <div class=" text-white d-flex flex-row" style="background-color: #000; height:200px;">
                  <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                    <img src="../Images/web_design back image.png"
                      alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                      style="width: 150px; z-index: 1">
                    </div>
                    <?php 
                     $Data = $user_object->get_user_by_id();
                      if($Data->rowCount() > 0){
                        while($fetch_user = $Data->fetch(PDO::FETCH_ASSOC)){
                    ?>
                  <div class="ms-3" style="margin-top: 130px;">
                    <h5><?= $fetch_user["user_name"]; ?></h5>
                    <p>New York</p>
                  </div>
                  <?php 
                        }
                      }
                ?>
            </div>

                <!-- Profile Information section -->
                <div class="card-body p-4 text-black" style="background-color: white;">
                  <div class="mb-5 pt-3">
                    <p class="lead fw-normal mb-1">About</p>
                    <div class="p-4">
                      <p class="font-italic mb-1">Web Developer</p>
                      <p class="font-italic mb-1">Lives in New York</p>
                      <p class="font-italic mb-0">Photographer</p>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mb-4">
                    <p class="lead fw-normal mb-0">Recent Courses</p>
                    <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
                  </div>

                  <div class="row d-flex justify-content-center align-items-center">
  
                        
                  <?php 
        require_once('teacher/components/playlist_control.php');
        require_once('User/course.php');

        $playlist = new playlist;
        $course_object = new Courses;
        $course_object->setStudentid($_GET["user_id"]);
                   
        $course_Data = $course_object->get_course_by_student_id();
                      
        if($course_Data->rowCount() > 0){
          while($fetch_courses = $course_Data->fetch(PDO::FETCH_ASSOC)){
           

            $playlist_data = $playlist->get_playlist_by_id($fetch_courses["Course_ID"]);
            while($fetch_playlist = $playlist_data->fetch(PDO::FETCH_ASSOC))
            {
             

             
        ?>

        <div class="col-3 mb-3">
          <div class="card" style="width: 300px;">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img src="teacher/uploaded_files/<?= $fetch_playlist['thumb'];?>" class="img-fluid" />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
            <div class="card-body">
              <div class="card-title">
                <div class="row mb-3">
                  <div class="col-7 d-flex justify-content-start align-items-center">
                    <img src="../Images/avatar-2.webp"
                      alt="Generic placeholder image" class="img-fluid rounded-circle border border-dark border-3"
                      style="width: 40px;">
                    <span class="ps-2" style="font-size: 13px;">@zayaty750</span>
                  </div>
                  <div class="col-5 d-flex justify-content-end align-items-center">
                    <ul class="mb-0 list-unstyled d-flex flex-row  " style="color: yellow;">
                      <li>
                        <i class="fas fa-star fa-xs"></i>
                      </li>
                      <li>
                        <i class="fas fa-star fa-xs"></i>
                      </li>
                      <li>
                        <i class="fas fa-star fa-xs"></i>
                      </li>
                      <li>
                        <i class="fas fa-star fa-xs"></i>
                      </li>
                      <li>
                        <i class="fas fa-star fa-xs"></i>
                      </li>
                    </ul>
                  </div>
                </div>
                <p class="card-text "><?= $fetch_playlist['title'];?></p>
                <p class="card-text mb-3"><?= $fetch_playlist['description'];?></p>
                <div>
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <p class="small mb-0"><i class="far fa-clock me-2"></i>3 hrs</p>
                    <p class="fw-bold mb-0">$90</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
             } 
            }
             
          }
        
        ?>
        
                  </div>
                  </div>
                </div>
              </div>
        </div>
    </section>
      <?php include "Bottomnav.php" ?>
</body>
</html>