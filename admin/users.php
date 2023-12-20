

<?php

define('__ROOT__', "../app/");


require_once('../app/controller/Playlistcontroller.php');
require_once('../app/controller/usercontroller.php');
require_once('../app/controller/admincontroller.php');
require_once('../app/model/user.php');
require_once('../app/model/tutor.php');
require_once('../app/model/admin.php');
require_once('../app/view/viewuser.php');
require_once('../app/model/notify.php');
require_once('../app/model/wishlist.php');



$notify = new notify();


$admin_model=new Admin();
$admincontroller=new AdminController($admin_model);




if (isset($_GET['get_users'])) {
  $usersData =  $admincontroller->getallusers();
  
}







?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Users</title>
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/framework.css" />
  <link rel="stylesheet" href="css/master.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
  
</head>

<body>
  <div class="page d-flex">
  <?php include "side-nav.php"; ?>
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
      <h1 class="p-relative">Users</h1>
      <div class="friends-page d-grid m-20 gap-20">
      <?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
        $userObject = new User();
        $userObject->setUserId($_POST['user_id']);
    
        if ($userObject->delete_user_by_id()) {
            header("Location: {$_SERVER['PHP_SELF']}");
            exit;
        } else {
            echo 'Failed to remove user.';
        }
    }
      
          ?>

        <?php foreach ($usersData as $userData): ?>
        <div class="friend bg-white rad-6 p-20 p-relative">
        <div class="contact">
          <i class="fa-solid fa-phone"></i>
          <i class="fa-regular fa-envelope"></i>
          </div>
          <div class="txt-c">
    
          <img class="rad-half mt-10 mb-10 w-100 h-100" src="imgs/friend-01.jpg" alt="" />
          <h4 class="m-0"><?= $userData['user_name'] ?></h4>
         <p class="c-grey fs-13 mt-5 mb-0"><?= $userData['user_email'] ?></p>
       </div>
        <div class="icons fs-14 p-relative">
   
        <div class="mb-10">
         <i class="fas fa-user-alt"></i>
         <span><?= $userData['user_type'] ?></span>
        </div>
        <div class="mb-10">
          <i class="fa-solid fa-code-commit fa-fw"></i>
          <span>15 Courses</span>
      </div>
    </div>
      <div class="info between-flex fs-13">
        <span class="c-grey">Joined <?= date('m/d/Y', strtotime($userData['user_created_on'])) ?></span>
        <div>
        <a class="bg-blue c-white btn-shape" href="profile.html">Profile</a>
        <form action="" method="post">
                    <input type="hidden" name="user_id" value="<?= $userData['user_id'] ?>">
                    <button  style="margin-top: 10px" type="submit" class="btn-shape bg-red c-white" onclick="return confirm('Are you sure you want to remove this user?')">Remove</button>
                </form>
      </div>
    </div>
  </div>
      <?php endforeach; 
      
    ?>

        
           
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>