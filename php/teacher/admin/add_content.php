<?php
require_once('../components/content_control.php');
$content = new content;

session_start();
foreach($_SESSION['user_data'] as $key => $value)
{
   $tutor_id = $value['id'];
}

if (isset($_POST['submit'])) {

   
   $status = $_POST['status'];
   $status = filter_var($status, FILTER_SANITIZE_STRING);
   $title = $_POST['title'];
   $title = filter_var($title, FILTER_SANITIZE_STRING);
   $description = $_POST['description'];
   $description = filter_var($description, FILTER_SANITIZE_STRING);
   $playlist = $_POST['playlist'];
   $playlist = filter_var($playlist, FILTER_SANITIZE_STRING);

   $thumb = $_FILES['thumb']['name'];
   $video = $_FILES['video']['name'];
   
   $content->setContentId();
   $content->setContentStatus($status);
   $content->setContentTitle($title);
   $content->setContentDescription($description);
   $content->setContentPlaylist($playlist);
   $content->setContentThumb($thumb);
   $content->setContentVideo($video);


   if($content->saveContent()){
      $message[] = 'new course uploaded!';
   }else{
      $message[] = 'failed to upload course!';
   }
}

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

   <section class="video-form">

      <h1 class="heading">upload content</h1>

      <form action="" method="post" enctype="multipart/form-data">
         <p>video status <span>*</span></p>
         <select name="status" class="box" required>
            <option value="" selected disabled>-- select status</option>
            <option value="active">active</option>
            <option value="deactive">deactive</option>
         </select>
         <p>video title <span>*</span></p>
         <input type="text" name="title" maxlength="100" required placeholder="enter video title" class="box">
         <p>video description <span>*</span></p>
         <textarea name="description" class="box" required placeholder="write description" maxlength="1000" cols="30" rows="10"></textarea>
         <p>video playlist <span>*</span></p>
         <select name="playlist" class="box" required>
            <option value="" disabled selected>--select playlist</option>
            <?php
            $select_playlists = $content->get_connect()->prepare("SELECT * FROM `playlist` WHERE tutor_id = ?");
            $select_playlists->execute([$tutor_id]);
            if ($select_playlists->rowCount() > 0) {
               while ($fetch_playlist = $select_playlists->fetch(PDO::FETCH_ASSOC)) {
                  
            ?>

                  <option value="<?= $fetch_playlist['playlist_id']; ?>"><?= $fetch_playlist['title']; ?></option>
               <?php
               }
               ?>
            <?php
            } else {
               echo '<option value="" disabled>no playlist created yet!</option>';
            }
            ?>
         </select>
         
         <p>select thumbnail <span>*</span></p>
         <input type="file" name="thumb" accept="image/*" required class="box">
         <p>select video <span>*</span></p>
         <input type="file" name="video" accept="video/*" required class="box">
         <input type="submit" value="upload video" name="submit" class="btn">
      </form>

   </section>
















   <script src="../js/admin_script.js"></script>

</body>

</html>