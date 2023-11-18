<?php
require_once('../User/user.php');



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
    <div class="sidebar bg-white p-20 p-relative">
      <h3 class="p-relative txt-c mt-0">Arab Data Hub</h3>
      <ul>
        <li>
          <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="index.php">
            <i class="fa-regular fa-chart-bar fa-fw"></i>
            <span>Dashboard</span>
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
          <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="users.php">
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
        $userObject= new User();
            $usersData = $userObject->get_all_users_data();
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