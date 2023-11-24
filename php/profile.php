<?php
session_start();

if(empty($_SESSION['user_data']))
{
  header('location:signup.php');
}
else
{
  foreach($_SESSION['user_data'] as $key => $value)
  {
    $user_id = $value['id'];
  }


  require_once('User/user.php');

  $user_object = new User;
  $user_object->setUserId( $user_id);


  if(isset($_POST['update_user']))
  {
    $user_object->setUserName($_POST['user_name']);
    $user_object->setUserBio($_POST['user_bio']);
    $user_object->setUserSocial1($_POST['user_social1']);
    $user_object->setUserSocial2($_POST['user_social2']);
    $user_object->setUserSocial3($_POST['user_social3']);
    $user_object->setUserSocial3($_POST['user_social3']);
    if($user_object->update_user_data())
    {
        echo '<div class="alert alert-success" role="alert"> Updated successfully </div>';
    }
    else
    {
        echo '<div class="alert alert-danger" role="alert"> Error </div>';
    }
  }

  $Data = $user_object->get_user_by_id();
  if($Data->rowCount() > 0)
  {
    $fetch_user = $Data->fetch(PDO::FETCH_ASSOC);
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

        <?php include "Topnav.php" ?>
        <?php include "Sidenav.php" ?>


        <section class="bg-white ">

            <div>

                <div class=" d-flex justify-content-center align-items-center ">
                    <div class="col-12 ">

                        <div class="mt-5 p-4 py-5 ">
                            <div class="row" style="margin-left: 35px; ">
                                <div class="col-lg-1 col-4 me-5">


                                    <img src="teacher/uploaded_files/<?php echo $fetch_user['user_img'] ?>"
                                        alt="<?php echo $fetch_user['user_img'] ?>" size="48" height="120" width="120"
                                        class="rounded rounded-5">

                                </div>
                                <div class="col-lg-3  col-5 ">
                                    <p class="fs-1 "><?php echo $fetch_user['user_name'] ?></p>
                                    <p class="text-muted">Your personal account</p>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-3">
                                    <div class=" mb-4 mb-lg-0">
                                        <div class=" p-0">
                                            <ul class=" ">

                                                <li
                                                    class="list-group-item d-flex justify-content-start align-items-center pt-3 ps-3 pe-3 ">
                                                    <a href="profile.php" class="btn btn-light mb-0 ps-3 active "
                                                        style="width: 100%;"> <i
                                                            class="fa-regular fa-user pe-3"></i>Profile</a>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-start align-items-center  pt-3 ps-3 pe-3 ">
                                                    <a href="Profile_account.php"
                                                        class="btn btn-light mb-0 ps-3 " style="width: 100%;"><i
                                                            class="fa-solid fa-gear pe-3"></i>Account</a>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-start align-items-center pt-3 ps-3 pe-3 ">
                                                    <a href="Profile_courses.php"
                                                        class="btn btn-light mb-0 ps-3 " style="width: 100%;"><i
                                                            class="fa-solid fa-book pe-3"></i></i>My Courses</a>

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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
                                                    <img src="teacher/uploaded_files/<?php echo $fetch_user['user_img'] ?>"
                                                        alt="<?php echo $fetch_user['user_img'] ?>" size="48"
                                                        height="120" width="120" class="rounded rounded-5">
                                                    <button class="btn btn-primary mt-3">Change profile picture</button>
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
                                                            <i class="fa-brands fa-linkedin fs-6"></i>
                                                            <input class="text-muted mb-2" name="user_social1"
                                                                value="<?= $fetch_user['user_social1'] ?>"></input>
                                                            <br>
                                                            <i class="fa-brands fa-github fs-6"></i>
                                                            <input class="text-muted mb-2" name="user_social2"
                                                                value="<?= $fetch_user['user_social2'] ?>"></input>
                                                            <br>
                                                            <i class="fa-brands fa-facebook fs-6"></i>
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



        <?php include "Bottomnav.php" ?>

        <script>
        const colors = [{
                font: '#990f0f',
                background: '#ffbfbf'
            },
            {
                font: '#99630f',
                background: '#d6ffbf'
            },
            {
                font: '#6f7d4e',
                background: '#fff3bf'
            },
            {
                font: '#4e7d74',
                background: '#bff0ff'
            },
            {
                font: '#594e7d',
                background: '#c8bfff'
            },
            {
                font: '#7d4e76',
                background: '#ffbff0'
            }
        ]

        const getRandomColor = () => {
            const randomIndex = Math.floor(Math.random() * colors.length);
            return colors[randomIndex];
        }

        count = 0;

        const removeTag = (event) => {
            if (event.target.classList.contains('tag-close')) {
                event.target.parentElement.remove();
                count = count - 1;
            }
        }




        const addTag = (event) => {
            if (event.keyCode === 13) {
                const input = document.getElementById('input')
                if (input.value.length != 0 && count != 10) {
                    const tagsContainer = document.querySelector('.tags-container');
                    const color = getRandomColor();
                    const value = event.target.value;
                    const spanElement = document.createElement('span');

                    spanElement.innerHTML = `
                    <input type="hidden" value="${value}">
                    <span class="tag-text">${value}</span>
                    <span class="tag-close"> ⌫ </span>
                    `

                    count++;
                    spanElement.classList.add('tag');
                    spanElement.style.backgroundColor = color.background;
                    spanElement.style.color = color.font;

                    tagsContainer.appendChild(spanElement);
                    input.value = '';
                } else {
                    alert("Tag length should be less than 10");
                }

            }
        }



        window.onload = () => {
            const tagsContainer = document.querySelector('.tags-container');
            tagsContainer.addEventListener('click', removeTag);
        }
        </script>
    </body>

    </html>

</body>

</html>