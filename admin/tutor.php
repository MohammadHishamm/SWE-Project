<?php


define('__ROOT__', "../app/");

require_once('../app/controller/admincontroller.php');
require_once('../app/model/admin.php');
// require_once('../app/view/viewuser.php');

$admin_model = new Admin();
$admin_controller = new AdminController($admin_model);
// $user_view = new ViewUser($user_controller, $user_model);



if(isset($_GET['action']) && $_GET['action'] != 'view')
{
    $admin_controller->admin_response();
    header('Location: tutor.php');
}

$Data = $admin_model->get_tutors_requests();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/framework.css" />
    <link rel="stylesheet" href="css/master.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="page d-flex">
        <div class="sidebar bg-white p-20 p-relative">
            <h3 class="p-relative txt-c mt-0">Arab Data Hub</h3>
            <ul>
                <li>
                    <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="index.php">
                        <i class="fa-regular fa-chart-bar fa-fw"></i>
                        <span> Admin Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="settings.php">
                        <i class="fa-solid fa-gear fa-fw"></i>
                        <span>Settings</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="profile.php">
                        <i class="fa-regular fa-user fa-fw"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="projects.php">
                        <i class="fa-solid fa-diagram-project fa-fw"></i>
                        <span>Projects</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="courses.php">
                        <i class="fa-solid fa-graduation-cap fa-fw"></i>
                        <span>Courses</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="users.php">
                        <i class="fa-regular fa-circle-user fa-fw"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="files.php">
                        <i class="fa-regular fa-file fa-fw"></i>
                        <span>Files</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="plans.php">
                        <i class="fa-regular fa-credit-card fa-fw"></i>
                        <span>Plans</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="content w-full">
            <!-- Start Head -->
            <div class="head bg-white p-15 between-flex">
                <div class="search p-relative">
                    <input class="p-10" type="search" placeholder="Type A Keyword" />
                </div>
                <div class="icons d-flex align-center">
                    <span class="notification p-relative">
                        <i class="fa-regular fa-bell fa-lg"></i>
                    </span>
                    <img src="imgs/avatar.png" alt="" />
                </div>
            </div>
            <!-- End Head -->
            <h1 class="p-relative">Tutors</h1>
            </script>
            <div class="wrapper">
                <div>


                    <?php
                                    if(!isset($_GET['action']) || $_GET['action'] == 'Enable' ||  $_GET['action'] == 'Disable')
                                    {
                                      if($Data->rowCount() > 0){
                                        while($fetch_playlist = $Data->fetch(PDO::FETCH_ASSOC)){
                               ?>
                    <!-- Start Projects Table -->
                    <div class="projects p-20 bg-white rad-10 m-20">
                        <h2 class="mt-0 mb-20">Requests</h2>
                        <div class="responsive-table">
                            <table class="fs-15 w-full">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Language</td>
                                        <td>About</td>
                                        <td>CV</td>
                                        <td>Tutor_Status</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= $fetch_playlist['user_name'] ?></td>
                                        <td><?= $fetch_playlist['language'] ?></td>
                                        <td><?= $fetch_playlist['About'] ?></td>
                                        <td>
                                            <?=$fetch_playlist['CV']?>
                                        </td>

                                        <td>
                                            <span
                                                class="label btn-shape bg-red c-white"><?=$fetch_playlist['User_status']?></span>
                                        </td>
                                        <td>
                                            <a href="tutor.php?action=Enable&user_id=<?= $fetch_playlist['user_id']?>"
                                                class="label btn-shape bg-green c-white"
                                                style="margin-right: 20px;">Accept</a>
                                            <a href="tutor.php?action=Disable&user_id=<?= $fetch_playlist['user_id']?>"
                                                class="label btn-shape bg-red c-white"
                                                style="margin-right: 20px;">Reject</a>
                                            <a href="tutor.php?action=view&user_id=<?= $fetch_playlist['user_id']?>"
                                                class="label btn-shape bg-blue c-white">View</a>
                                        </td>
                                    </tr>
                                    <?php
                                }


                                }
                                else
                                {
                                    echo '<p class="empty">No Tutors Yet!</p>';
                                }
                                }
                                else
                                {
                                    if($Data->rowCount() > 0 && $_GET['action'] == 'view'){
                                        while($fetch_playlist = $Data->fetch(PDO::FETCH_ASSOC)){
                                            if($fetch_playlist['user_id'] == $_GET['user_id']){
                                    ?>
                                    <div class="projects p-20 bg-white rad-10 m-20">
                                        <h2 class="mt-0 mb-20">Tutor request view</h2>
                                        <div class="profile-page m-20">
                                            <!-- Start Overview -->
                                            <div class="overview bg-white rad-10 d-flex align-center">
                                                <div class="avatar-box txt-c p-20">
                                                    <img class="rad-half mb-10" src="imgs/avatar.png" alt="" />
                                                    <h3 class="m-0"><?= $fetch_playlist['user_name'] ?></h3>
                                                    <div class="level rad-6 bg-eee p-relative">
                                                        <span style="width: 70%"></span>
                                                    </div>
                                                    <div class="rating mt-10 mb-10">
                                                        <i class="fa-solid fa-star c-orange fs-13"></i>
                                                        <i class="fa-solid fa-star c-orange fs-13"></i>
                                                        <i class="fa-solid fa-star c-orange fs-13"></i>
                                                        <i class="fa-solid fa-star c-orange fs-13"></i>
                                                        <i class="fa-solid fa-star c-orange fs-13"></i>
                                                    </div>
                                                    <p class="c-grey m-0 fs-13">550 Rating</p>
                                                </div>
                                                <div class="info-box w-full txt-c-mobile">
                                                    <!-- Start Information Row -->
                                                    <div class="box p-20 d-flex align-center">
                                                        <h4 class="c-grey fs-15 m-0 w-full">General Information</h4>
                                                        <div class="fs-14">
                                                            <span class="c-grey">Full Name</span>
                                                            <span><?= $fetch_playlist['user_name'] ?></span>
                                                        </div>
                                                        <div class="fs-14">
                                                            <span class="c-grey">Gender:</span>
                                                            <span>Male</span>
                                                        </div>
                                                        <div class="fs-14">
                                                            <span class="c-grey">Country:</span>
                                                            <span>Egypt</span>
                                                        </div>
                                                        <div class="fs-14">

                                                        </div>
                                                    </div>
                                                    <!-- End Information Row -->
                                                    <!-- Start Information Row -->
                                                    <div class="box p-20 d-flex align-center">
                                                        <h4 class="c-grey w-full fs-15 m-0">Personal Information</h4>
                                                        <div class="fs-14">
                                                            <span class="c-grey">Email:</span>
                                                            <span>o@nn.sa</span>
                                                        </div>
                                                        <div class="fs-14">
                                                            <span class="c-grey">Phone:</span>
                                                            <span>019123456789</span>
                                                        </div>
                                                        <div class="fs-14">
                                                            <span class="c-grey">Date Of Birth:</span>
                                                            <span>25/10/1982</span>
                                                        </div>
                                                        <div class="fs-14">

                                                        </div>
                                                    </div>
                                                    <!-- End Information Row -->
                                                    <!-- Start Information Row -->
                                                    <div class="box p-20 d-flex align-center">
                                                        <h4 class="c-grey w-full fs-15 m-0">Job Information</h4>
                                                        <div class="fs-14">
                                                            <span class="c-grey">Title:</span>
                                                            <span>Full Stack Developer</span>
                                                        </div>
                                                        <div class="fs-14">
                                                            <span class="c-grey">Programming Language:</span>
                                                            <span>Python</span>
                                                        </div>
                                                        <div class="fs-14">
                                                            <span class="c-grey">Years Of Experience:</span>
                                                            <span>15+</span>
                                                        </div>
                                                        <div class="fs-14">

                                                        </div>
                                                    </div>
                                                    <!-- End Information Row -->
                                                    <!-- Start Information Row -->
                                                    <div class="box p-20 d-flex align-center">
                                                        <h4 class="c-grey w-full fs-15 m-0">Billing Information</h4>
                                                        <div class="fs-14">
                                                            <span class="c-grey">Payment Method:</span>
                                                            <span>Paypal</span>
                                                        </div>
                                                        <div class="fs-14">
                                                            <span class="c-grey">Email:</span>
                                                            <span>email@website.com</span>
                                                        </div>
                                                        <div class="fs-14">
                                                            <span class="c-grey">Subscription:</span>
                                                            <span>Monthly</span>
                                                        </div>
                                                        <div class="fs-14">

                                                        </div>
                                                    </div>
                                                    <!-- End Information Row -->
                                                </div>
                                            </div>
                                            <!-- End Overview -->
                                            <span>CV</span>
                                            <embed src=" ../Public/pdf/<?=$fetch_playlist['CV']?>"
                                                type="application/pdf"
                                                style="width:100%; height:500px; overflow-y:hidden;" />
                                        </div>
                                    </div>

                                    <?php 
                                    }     
                                }
                                }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End Projects Table -->
                </div>
            </div>
</body>

</html>