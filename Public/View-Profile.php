<?php

define('__ROOT__', "../app/");

require_once('../app/controller/usercontroller.php');
require_once('../app/model/user.php');
require_once('../app/view/viewuser.php');
require_once('../app/model/notify.php');
require_once('../app/controller/Playlistcontroller.php');
require_once('../app/controller/studentcontroller.php');
require_once('../app/model/tutor.php');
require_once('../app/model/student.php');
require_once('../app/view/viewtutor.php');
require_once('../app/model/student.php');

$notify = new notify();
$user_model = new User();
$user_controller = new UsersController($user_model);
$user_view = new ViewUser($user_controller, $user_model);

$tutor = new tutor();
$playlist  = $tutor->getplaylist();
$student= new Student();

if(!isset($_SESSION['user_data']))
{
  header('location:signup-in.php');
}
else
{
  foreach($_SESSION['user_data'] as $key => $value)
  {
    $user_id = $value['id'];
  }

  if(isset($_GET['user_id']))
  {
    
    $user_model->setUserId($_GET['user_id']);
  
    $Data = $user_model->get_user_by_id();
    if($Data->rowCount() > 0)
    {
      $fetch_user =  $Data->fetch(PDO::FETCH_ASSOC);
    }
    else
    {
      header('location:index.php');
    }
  }
  else
  {
    header('location:index.php');
  }

}







?>
<!DOCTYPE html>
<html lang="en">
<?php include "Partials/Header.php" ?>

<head>
    <link rel="stylesheet" href="../css/Sidenav.css">
    <link rel="stylesheet" href="../css/MDB css/mdb.min.css">
    <link rel="stylesheet" href="../css/All.css">
    <script src="../js/MDB java/mdb.min.js"></script>
</head>

<style>
.high-quality-image {
    max-width: 100%;
    /* Ensure the image doesn't exceed its container */
    height: auto;
    /* Maintain the image's aspect ratio */
    image-rendering: auto;
    /* Use the default image rendering algorithm */
}
</style>

<body style="background-color: #CED8E3; overflow: hidden;">

    <!-- Loaders -->
    <div class="text-center transition transition-1 is-active" id="preloading">

        <div style="margin-top: 100px">

            <img src="../images/loader.gif">

        </div>
        <p style="margin-top: 20px;   
        color: #0f141a;
        font-size: 3.0rem;
        font-weight: bolder;">Arab Data Hub</p>
    </div>

    <?php include "Partials/Top-Nav.php" ?>
    <?php include "Partials/Side-Nav.php" ?>
    <section>
        <div>
            <div class=" d-flex justify-content-center align-items-center ">
                <div class="col-12">
                    <!-- Profile Image section -->
                    <div class=" text-white d-flex flex-xxl-row flex-column   align-items-start  justify-content-start align-items-xxl-center"
                        style="background-color: #000; height:min-content; padding-top: 50px; padding-bottom: 20px;">
                        <div class="col-xxl-1 col-4 ms-5 me-5 ms-xxl-3 ">


                            <img src="../images/users/<?php echo $fetch_user['user_img'] ?>"
                                alt="<?php echo $fetch_user['user_img'] ?>" class="rounded rounded-5 high-quality-image"
                                style="width: 400px; height: auto;">




                        </div>
                        <div class="col-xxl-2 col-5 ms-5 ">
                            <p class="fs-2 "><?php echo $fetch_user['user_name'] ?><?php if($fetch_user['user_login_status'] == "Login")
                            {
                              echo ' <span class="fs-6 text-success"> (Online) </span>';
                            }
                            else
                            {
                              echo ' <span class="fs-6 text-danger"> (Offline) </span>';
                            }
                            ?></span> </p>
                            <p class="text-muted"><?php echo $fetch_user['user_type'] ?> </p>
                            <p class="text-muted">User joined on <?=  $fetch_user['user_created_on'] ?> </p>
                            <p class="text-muted"></p>
                        </div>
                        <?php if($user_model->getUserId() == $user_id){ ?>
                        <div class="col-xxl-2 col-6  offset-1 offset-xxl-6 ">
                            <a href="Edit-Profile.php" class="btn btn-light">Edit Profile</a>
                        </div>
                        <?php }?>
                    </div>

                    <!-- Profile Information section -->
                    <div class="card-body p-4 text-black " style="background-color: white;">


                        <div class=" pt-3 mt-2">
                            <p class="lead fw-normal mb-1">Bio</p>
                            <div class="p-4">
                                <p class="font-italic mb-1"><?= $fetch_user["user_bio"]; ?></p>
                            </div>
                        </div>
                        <div class=" mb-5">
                            <p class="lead fw-normal  mb-3">User Social Links</p>
                            <i class="fa-brands fa-linkedin ms-3 fs-6"></i>
                            <a href="<?= $fetch_user['user_social1'] ?>" target="_blank"
                                class="text-muted ms-2 mb-2"><?= $fetch_user['user_social1'] ?></a>
                            <br>
                            <i class="fa-brands fa-github ms-3 fs-6"></i>
                            <a href="<?= $fetch_user['user_social2'] ?>" target="_blank"
                                class="text-muted ms-2 mb-2"><?= $fetch_user['user_social2'] ?></a>
                            <br>
                            <i class="fa-brands fa-facebook ms-3 fs-6"></i>
                            <a href="<?= $fetch_user['user_social3'] ?>" target="_blank"
                                class="text-muted ms-2 mb-2"><?= $fetch_user['user_social3'] ?></a>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <p class="lead fw-normal mb-0">Recent Courses</p>
                            <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
                        </div>

                        <div class="row d-flex justify-content-start align-items-center">


                            <?php 

                   
        $course_Data = $student->get_course_by_student_id($_GET["user_id"]);
                      
        if($course_Data->rowCount() > 0){
          while($fetch_courses = $course_Data->fetch(PDO::FETCH_ASSOC)){
           

            $playlist_data = $playlist->get_playlist_by_id($fetch_courses["Course_id"]);
            while($fetch_playlist = $playlist_data->fetch(PDO::FETCH_ASSOC))
            {
             

             
        ?>

                            <div class="col-3 mb-3">
                                <div class="card" style="width: 300px;">
                                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                        <img src="../Images/courses/thumbs/<?= $fetch_playlist['thumb'];?>"
                                            class="img-fluid" />
                                        <a href="View-Course.php?playlist_id=<?= $fetch_playlist['playlist_id']; ?>">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <div class="row mb-3">
                                                <div class="col-7 d-flex justify-content-start align-items-center">
                                                    <img src="../Images/users/<?= $fetch_playlist['user_img']; ?>" alt="Generic placeholder image"
                                                        class="img-fluid rounded-circle border border-dark border-3"
                                                        style="width: 40px;">
                                                    <span class="ps-2" style="font-size: 13px;"><?= $fetch_playlist['user_name']; ?></span>
                                                </div>
                                                <div class="col-5 d-flex justify-content-end align-items-center">
                                                    <ul class="mb-0 list-unstyled d-flex flex-row  "
                                                        style="color: yellow;">
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
                                            <p class="card-text mb-3 text-truncate"><?= $fetch_playlist['description'];?></p>
                                            <div>
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <p class="small mb-0"><i class="far fa-clock me-2"></i><?= $fetch_playlist['date'];?></p>
                                                    <p class="fw-bold mb-0"><?= $fetch_playlist['Price'];?></p>
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
    <?php include "Partials/Bottom-Nav.php" ?>
    <script src="../js/Loaders.js"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js">
    </script>
</body>

</html>