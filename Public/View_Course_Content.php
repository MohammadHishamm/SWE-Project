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

if(!isset($_SESSION['user_data']))
{
  header('location:signup-in.php');
}

$notify = new notify();
$tutor = new tutor();
$playlist  = $tutor->getplaylist();
$content = $tutor->getcontent();

$content = new content;
$content_data =$content->get_content_by_id($_GET['content_id']);
if($content_data->rowCount() > 0)
{
   $fetch_content = $content_data->fetch(PDO::FETCH_ASSOC);
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
    <!-- Course Introduction section -->
    <div class="container-fluid mb-11">
        <div class="row">
            <div class="col-9 ms-5 mt-5" style=" ">
            <div class="container-fluid">
            <video src="../Images/Courses/videos/<?= $fetch_content['video']; ?>" style="height: 500px;" autoplay controls poster="../Images/courses/thumbs/<?= $fetch_content['thumb']; ?>" class="w-100 "></video>
            <div class="text-muted mb-4 "><i class="fas fa-calendar pe-4"></i><span><?= $fetch_content['date']; ?></span></div>
            <h3 class="fs-1"><?= $fetch_content['title']; ?></h3>
            <div class="fs-5"><?= $fetch_content['description']; ?></div>
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