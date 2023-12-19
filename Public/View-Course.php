<?php


define('__ROOT__', "../app/");
require_once('../app/controller/usercontroller.php');
require_once('../app/controller/Playlistcontroller.php');
require_once('../app/controller/studentcontroller.php');
require_once('../app/model/tutor.php');
require_once('../app/model/student.php');
require_once('../app/view/viewtutor.php');
require_once('../app/model/notify.php');

if(isset($_SESSION['user_data']))
{
    foreach($_SESSION['user_data'] as $key => $value)
    {
      $User_ID = $value['id'];
    }  
}


$notify = new notify();
$tutor = new tutor();
$playlist  = $tutor->getplaylist();
$content = $tutor->getcontent();


$playlist = new playlist;
$playlist_data =$playlist->get_playlist_by_id($_GET['playlist_id']);


$content = new content;
$content_data =$content->get__playlist_by_id($_GET['playlist_id']);





if($playlist_data->rowCount() > 0){
    $fetch_playlist = $playlist_data->fetch(PDO::FETCH_ASSOC);
}
$student= new Student();
$student_controller = new Studentcontroller($student);
if (isset($_POST["enroll_course"])) { 
    if($student_controller->addcourse())
    {

   
     
        
    }
}

?>

<!DOCTYPE html>


<html lang="en">


<head>
    <link rel="stylesheet" href="../css/Sidenav.css">

    <link rel="stylesheet" href="../css/MDB css/mdb.min.css">
    <link rel="stylesheet" href="../css/All.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <script src="../js/Loaders.js"></script>
</head>

<body style="background-color: #EBEFF4;">

    <?php include "Partials/Top-Nav.php" ?>
    <?php include "Partials/Side-Nav.php" ?>
    <!-- Course Image section -->
    <div class="p-5 " style="background-color: #2d2f31; width: 100%; height: 330px;">
        <div class="row" style="margin-top: 130px;">
            <img src="../Images/courses/thumbs/<?= $fetch_playlist['thumb']; ?>" alt="" srcset=""
                style="width: 20%; height: 200px; position: absolute;">
            <div class="col-12 text-center">
                <span class="courses_content_name "><?= $fetch_playlist['title'] ?></span>
            </div>
            <div class="col-12 text-center" style="margin-top: 40px;">
                <span class="courses_content_teacher"><?= $fetch_playlist['user_name'] ?></span>
            </div>

        </div>

        <form action="" method="POST">
            <input type="hidden" name="course_id"
                value="<?= isset($_GET['playlist_id']) ? htmlspecialchars($_GET['playlist_id']) : '' ?>">
            <input type="hidden" name="student_id" value="<?= $User_ID ?>">

            <button style="margin-top: 20px; margin-left: 650px" class="btn btn-primary btn-lg" name="enroll_course"
                type="submit">Enroll</button>
        </form>

    </div>

    <!-- Course Introduction section -->
    <div class="container-fluid mb-11">

        <div class="row">
            <div class="col-9 ms-5 mt-5" style=" ">

                <div>
                    <span class="courses_content_title">
                        Introduction
                    </span>



                    <div class=" mt-5">
                        <p class="sidnav_courses_content ">
                            Course information
                        </p>
                        <p class="courses_content_information">
                            <?= $content_data->rowCount() ?> lectures
                        </p>
                    </div>
                    <div class=" mt-3">
                        <p class="sidnav_courses_content ">
                            Description
                        </p>
                        <p class="courses_content_information">
                            <?= $fetch_playlist['description'] ?>
                        </p>
                    </div>
                    <div class=" mt-3">
                        <p class="sidnav_courses_content ">
                            Requirments
                        </p>
                        <p class="courses_content_information">
                            <?= $fetch_playlist['requirements'] ?>
                        </p>
                    </div>
                    <div class=" mt-3">
                        <p class="sidnav_courses_content ">
                            course skills
                        </p>
                        <p class="courses_content_information">
                            <?= $fetch_playlist['Tags'] ?>
                        </p>
                    </div>
                </div>

                <div class="d-flex flex-wrap mt-5">
                    <?php


                    if($content_data->rowCount() > 0)
                    {
                        $i = 0;
                        while($fetch_content = $content_data->fetch(PDO::FETCH_ASSOC)  ){
                            if($i <= 1)
                            {

                            
                    ?>
                    
                        <p class="text-primary fs-1 ">Tutorial</p>
                        <div class="container-fluid">
                            <video src="../Images/courses/videos/<?= $fetch_content['video']; ?>" style="height: 500px;"
                                autoplay controls poster="../Images/courses/thumbs/<?= $fetch_content['thumb']; ?>"
                                class="w-100 "></video>
                            <div class="text-muted mb-4 "><i
                                    class="fas fa-calendar pe-4"></i><span><?= $fetch_content['date']; ?></span></div>
                            <h3 class="fs-1"><?= $fetch_content['title']; ?></h3>
                            <div class="fs-5"><?= $fetch_content['description']; ?></div>
                        </div>

                 
                    <?php 
                        }
                        }

                    }
                    ?>

                </div>
            </div>

            <div class="flex-shrink-0 p-3  mt-5 border shadow col-3 d-none d-xxl-block"
                style="width: 280px; height: 760px">

                <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                    <svg class="bi me-2" width="30" height="24">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                    <span class="fs-5 fw-semibold">Navigation</span>
                </a>
                <ul class="list-unstyled ps-0">
                    <li class="mb-3 mt-3">
                        <a class="align-items-center rounded collapsed sidnav_courses_content" data-bs-toggle="collapse"
                            data-bs-target="#home-collapse" aria-expanded="false">
                            Home
                        </a>

                    </li>
                    <li class="mb-3 mt-3">
                        <a class="align-items-center rounded collapsed sidnav_courses_content" data-bs-toggle="collapse"
                            data-bs-target="#dashboard-collapse" aria-expanded="false">
                            Site Pages
                        </a>
                    </li>
                    <li class="mb-3 mt-3">
                        <a class="align-items-center rounded collapsed sidnav_courses_content" data-bs-toggle="collapse"
                            data-bs-target="#orders-collapse" aria-expanded="false">
                            My Courses
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <?php include "Partials/Bottom-Nav.php" ?>
</body>

</html>