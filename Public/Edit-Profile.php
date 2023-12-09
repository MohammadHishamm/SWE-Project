<?php
define('__ROOT__', "../app/");

require_once('../app/controller/userController.php');
require_once('../app/model/user.php');
require_once('../app/view/viewtutor.php');

$model = new User();
$controller = new UsersController($model);
$view = new ViewTutor($controller, $model);

if(empty($_SESSION['user_data']))
{
  header('location:signup-in.php');
}
else
{
  foreach($_SESSION['user_data'] as $key => $value)
  {
    $user_id = $value['id'];
  }

  $model->setUserId($user_id);


$Data = $model->get_user_by_id();


if ($Data->rowCount() > 0) {
    $fetch_user = $Data->fetch(PDO::FETCH_ASSOC);
} 

if (isset($_POST["update_user"])) { 
    if($controller->updateUserData())
    {
        $Data = $model->get_user_by_id();


        if ($Data->rowCount() > 0) {
            $fetch_user = $Data->fetch(PDO::FETCH_ASSOC);
        } 
    }
}

  
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Your profile</title>
</head>

<body>
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
        <script src="../js/MDB java/mdb.min.js"></script>
    </head>

    <style>
    .tags-container {
        width: 100%
    }

    .tags-container .tag {
        display: inline-block;
        padding: 3px 12px;
        font-size: 13px;
        background: #eee;
        margin: 3px;
        border-radius: 5px;
        text-transform: lowercase;
        cursor: default;
    }

    .tags-container .tag .tag-close {
        cursor: pointer;
        margin-left: 5px;
        font-size: 10px;
    }
    </style>

    <body style="background-color: #ebeff4">


        <?php include "Partials/Top-Nav.php" ?>
        <?php include "Partials/Side-Nav.php" ?>
        <section class="bg-white ">

            <div>

                <div class=" d-flex justify-content-center align-items-center ">
                    <div class="col-12 ">

                        <div class="mt-5 p-4 py-5 ">
                            <div class="row" style="margin-left: 35px; ">
                                <div class="col-lg-1 col-4 me-5">

                                 
                                    <img src="../images/users/<?php echo $fetch_user['user_img'] ?>"
                                        alt="<?php echo $fetch_user['user_img'] ?>" size="48" height="120" width="120"
                                        class="rounded rounded-5">

                                </div>
                                <div class="col-lg-3  col-5 ">
                                    <p class="fs-1 "><?php echo $fetch_user['user_name'] ?></p>
                                    <p class="text-muted">Your personal account</p>
                                </div>
                            </div>

                            <div class="row mt-4">
                                    <!-- side nav -->
                                    <?=
                                    $view->side_nav();
                                    ?>
                                <div class="col-lg-8 ">
                                    <div class=" mb-4">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0" style="font-size: 1.5rem;">Public profile</p>
                                                </div>
                                            </div>
                                            <hr>

                                            <form  method="post" enctype="multipart/form-data">
                                            <div class="row mb-4">
                                                <div class="col-sm-3">
                                                <input type="text" hidden name="old_image" value="<?=$fetch_user['user_img']?>">
                                                    <img src="../images/users/<?php echo $fetch_user['user_img'] ?>"
                                                        alt="<?php echo $fetch_user['user_img'] ?>" size="48"
                                                        height="160" width="160" class="rounded rounded-5 mb-4">
                                                    <input type="file" name="image" accept="image/*" >
                                                
                                                </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <p class="mb-0" style="font-size: 1.3rem; text-weight: bold">
                                                            Name
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <input class="text-muted mb-0" name="user_name"
                                                                value="<?= $fetch_user['user_name'] ?>"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <p class="mb-0" style="font-size: 1.3rem; text-weight: bold">Bio
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <textarea class="text-muted mb-0" maxlength=" 1000"  name="user_bio"
                                                                cols="30"
                                                                rows="10"><?= $fetch_user['user_bio'] ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" row">
                                                    <div class="col-sm-3">
                                                        <p class="mb-0" style="font-size: 1.3rem; text-weight: bold">
                                                            Social
                                                            accounts</p>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <i class="fa-brands fa-linkedin fs-6 mb-2"></i>
                                                            <br>
                                                            <input class="text-muted mb-2" name="user_social1"
                                                                value="<?= $fetch_user['user_social1'] ?>"></input>
                                                           
                                                            <i class="fa-brands fa-github fs-6 mb-2"></i>
                                                            <br>
                                                            <input class="text-muted mb-2" name="user_social2"
                                                                value="<?= $fetch_user['user_social2'] ?>"></input>
                                                           
                                                            <i class="fa-brands fa-facebook fs-6 mb-2"></i>
                                                            <br>
                                                            <input class="text-muted mb-2" name="user_social3"
                                                                value="<?= $fetch_user['user_social3'] ?>"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-12 offset-sm-9">
                                                        <button type="submit" name="update_user"
                                                            class="mb-0 btn btn-success">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
        </section>



        <?php include "Partials/Bottom-Nav.php" ?>

    </body>

    </html>

</body>

</html>