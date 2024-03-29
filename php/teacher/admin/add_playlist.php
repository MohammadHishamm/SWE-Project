<?php

require_once('../components/playlist_control.php');

$playlist = new playlist;

session_start();
foreach($_SESSION['user_data'] as $key => $value)
{
   $tutor_id = $value['id'];
}

if(isset($_POST['submit']))
{

   $title = $_POST['title'];
   $title = filter_var($title, FILTER_SANITIZE_STRING);
   $description = $_POST['description'];
   $description = filter_var($description, FILTER_SANITIZE_STRING);
   $status = $_POST['status'];
   $status = filter_var($status, FILTER_SANITIZE_STRING);
   $image = $_FILES['image']['name'];
   $price= $_POST['price'];

   $playlist->setPlaylistId();
   $playlist->setPlaylistTitle($title);
   $playlist->setPlaylistDescription($description);
   $playlist->setPlaylistRequirements($description);
   $playlist->setPlaylistMap($description);
   $playlist->setPlaylistPrice($price);
   $playlist->setPlaylistImage($image);
   $playlist->setPlaylistTutor($tutor_id);
   $playlist->setPlaylistStatus($status);
 
   if($playlist->Save())
   {
      $message[] = 'playlist created successfully!';
   }
   else
   {
      $message[] = 'error creating playlist!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Playlist</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/admin_style.css">



    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <?php include '../components/admin_header.php';
 ?>

    <section class="playlist-form">

        <h1 class="heading">create playlist</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <p>playlist status <span>*</span></p>
            <select name="status" class="box" required>
                <option value="" selected disabled>-- select status</option>
                <option value="active">active</option>
                <option value="deactive">deactive</option>
            </select>
            <p>playlist title <span>*</span></p>
            <input type="text" name="title" maxlength="100" required placeholder="enter playlist title" class="box">
            <p>playlist description <span>*</span></p>
            <textarea name="description" class="box" required placeholder="write description" maxlength="1000" cols="30"
                rows="10"></textarea>
            <p>playlist requirements <span>*</span></p>
            <textarea name="description" class="box" required placeholder="write requirements" maxlength="1000"
                cols="30" rows="10"></textarea>

            <p>what the student will learn from these course <span>*</span></p>
            <input name='tags' type='text' value='html,css' class="box" required  maxlength="10" size="10">
        
            <p>playlist Price <span>*</span></p>
            <input type="text" name="price" maxlength="100" required placeholder="enter playlist Price" class="box">
            <p>playlist thumbnail <span>*</span></p>
            <input type="file" name="image" accept="image/*" required class="box">
            <input type="submit" value="create playlist" name="submit" class="btn">
        </form>

    </section>



    <script src="../js/admin_script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify@3.1.0/dist/tagify.polyfills.min.js"></script>
    <script>
    // The DOM element you wish to replace with Tagify
    var input = document.querySelector('input[name=tags]');

    // initialize Tagify on the above input node reference
    new Tagify(input)


    console.log(input);
    </script>
</body>

</html>