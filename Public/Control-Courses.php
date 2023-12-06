<?php
require_once('../php/teacher/components/playlist_control.php');

$playlist = new playlist;
// include "../../dbh.inc.php";
session_start();
foreach($_SESSION['user_data'] as $key => $value)
{
   $tutor_id = $value['id'];
}


if(isset($_POST['delete']))
{
   $delete_id = $_POST['playlist_id'];
   $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

   if(  $playlist->Delete_playlist($delete_id,$tutor_id))
   {
      $message[] = 'playlist deleted!';
   }
   else
   {
      $message[] = 'playlist already deleted!';
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

        <link rel="stylesheet" href="../php/teacher/css/admin_style.css">
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


                                    <img src="teacher/uploaded_files/<?php ?>" alt="<?php  ?>" size="48" height="120"
                                        width="120" class="rounded rounded-5">

                                </div>
                                <div class="col-lg-3  col-5 ">
                                    <p class="fs-1 "><?php?></p>
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
                                                    <a href="Profile_account.php" class="btn btn-light mb-0 ps-3 "
                                                        style="width: 100%;"><i
                                                            class="fa-solid fa-gear pe-3"></i>Account</a>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-start align-items-center pt-3 ps-3 pe-3 ">
                                                    <a href="Profile_courses.php" class="btn btn-light mb-0 ps-3 "
                                                        style="width: 100%;"><i class="fa-solid fa-book pe-3"></i></i>My
                                                        Courses</a>

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
                                                    <p class="mb-0" style="font-size: 1.5rem;"> Your Course</p>
                                                </div>
                                            </div>
                                            <hr>

                                            <section class="playlists">

                                                <div class="box-container">

                                                    <div class="box" style="text-align: center;">
                                                        <h3 class="title" style="margin-bottom: .5rem;">create new
                                                            playlist</h3>
                                                        <a href="add_playlist.php" class="btn">add playlist</a>
                                                    </div>

                                                    <?php
         
         $select_playlist = $playlist->get_All_playlist($tutor_id);
         if($select_playlist->rowCount() > 0){
         while($fetch_playlist = $select_playlist->fetch(PDO::FETCH_ASSOC)){
            $playlist_id = $fetch_playlist['playlist_id'];
            $count_videos = $playlist->get_connect()->prepare("SELECT * FROM `content` WHERE playlist_id = ?");
            $count_videos->execute([$playlist_id]);
            $total_videos = $count_videos->rowCount();
      ?>
                                                    <div class="box">
                                                        <div class="flex">
                                                            <div><i class="fas fa-circle-dot"
                                                                    style="<?php if($fetch_playlist['status'] == 'active'){echo 'color:limegreen'; }else{echo 'color:red';} ?>"></i><span
                                                                    style="<?php if($fetch_playlist['status'] == 'active'){echo 'color:limegreen'; }else{echo 'color:red';} ?>"><?= $fetch_playlist['status']; ?></span>
                                                            </div>
                                                            <div><i
                                                                    class="fas fa-calendar"></i><span><?= $fetch_playlist['date']; ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="thumb">
                                                            <span><?= $total_videos; ?></span>
                                                            <img src="../php/teacher/uploaded_files/<?= $fetch_playlist['thumb']; ?>"
                                                                alt="">
                                                        </div>
                                                        <h3 class="title"><?= $fetch_playlist['title']; ?></h3>
                                                        <p class="description"><?= $fetch_playlist['description']; ?>
                                                        </p>
                                                        <form action="" method="post" class="flex-btn">
                                                            <input type="hidden" name="playlist_id"
                                                                value="<?= $playlist_id; ?>">
                                                            <a href="update_playlist.php?get_id=<?=$playlist_id;?>"
                                                                class="btn btn-warning w-100">update</a>
                                                            <input type="submit" value="delete" class="btn btn-danger w-100"
                                                                onclick="return confirm('delete this playlist?');"
                                                                name="delete">
                                                        </form>
                                                        <a href="view_playlist.php?get_id=<?=$playlist_id;?>"
                                                            class="btn btn-primary w-100 mt-3">view playlist</a>
                                                    </div>
                                                    <?php
         } 
      }else{
         echo '<p class="empty">no playlist added yet!</p>';
      }
      ?>

                                                </div>

                                            </section>

                                        </div>
                                    </div>
                                </div>
        </section>



        <?php include "Partials/Bottom-Nav.php" ?>

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