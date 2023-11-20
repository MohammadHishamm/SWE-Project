<?php


// include "../../dbh.inc.php";
session_start();
foreach($_SESSION['user_data'] as $key => $value)
{
   $tutor_id = $value['id'];
}

require_once('../../User/user.php');
require_once('../components/playlist_control.php');
require_once('../components/content_control.php');

$User = new User();
$playlist = new playlist();
$content = new content();

$User->setUserId($tutor_id);


$total_playlists = $playlist->get_All_playlist($tutor_id)->rowCount();

$total_contents = $content-> get_All_content($tutor_id)->rowCount();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>
   
<section class="dashboard">

   <h1 class="heading">Teacher DashBoard</h1>

   <div class="box-container">

      <div class="box">
         <h3>welcome!</h3>

         <?php           
           $Data = $User->get_user_by_id();
           if($Data->rowCount() > 0){
             while($fetch_user = $Data->fetch(PDO::FETCH_ASSOC)){
               ?>
            <p><?= $fetch_user['user_name']; ?></p>
            <a href="profile.php" class="btn">view profile</a>
            </div>
         <?php 
             }
         }
         ?>


      <div class="box">
         <h3><?= $total_playlists; ?></h3>
         <p>Courses</p>
         <a href="add_playlist.php" class="btn">add new playlist</a>
      </div>

      <div class="box">
         <h3></h3>
         <p>Students</p>
      </div>

   </div>

</section>

















<script src="../js/admin_script.js"></script>

</body>
</html>