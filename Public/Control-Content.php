<?php
define('__ROOT__', "../app/");
require_once('../app/controller/contentcontroller.php');
require_once('../app/model/tutor.php');
require_once('../app/view/viewcontent.php');


$tutor = new tutor();
$content  = $tutor->getcontent();

$contentcontroller = new ContentController($content);
$view = new ViewContent($contentcontroller, $tutor);

foreach($_SESSION['user_data'] as $key => $value)
{
   $tutor_id = $value['id'];
}

if(isset($_POST['delete_video']))
{
    $contentcontroller->delete_playlist();
}

if (isset($_POST['submit'])) 
{
    $contentcontroller->add_content();
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

    <script>
    function showToast() {

        x = document.getElementById("Audio");

        x.play();

        document.getElementById('toast').classList.add('show');


        setTimeout(function() {
            document.getElementById('toast').classList.remove('show');
        }, 5000);

    }
    </script>

    <body style="background-color: #ebeff4">

        <audio id="Audio">
            <source src="../images/alert.wav">
        </audio>

        <?php if(isset($_SESSION['error_message'])){  ?>
        <div class="toast fade fixed-bottom shadow border border-3 me-5 mb-5 ms-auto" id="toast">
            <div class="toast-header ">
                <strong class="me-auto">Arab Data Hub</strong>
                <small>Notfication</small>
            </div>
            <div class="toast-body text-danger"><?= $_SESSION['error_message'] ?></div>
        </div>
        <script>
        showToast();
        </script>
        <?php unset($_SESSION['error_message']); } ?>
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
                                <?php include "Partials/Profile-Side-Nav.php" ?>

                                <?php
                                if (isset($_GET['action']) && !empty($_GET['action'])) {
                                switch($_GET['action']){
                                    case 'view':
                                        $view->show_content();
                                        break;
                                        case 'add':
                                        $view->add_content();
                                        break;
                                    case 'view_playlist':
                                        echo $view->view_course_content();
                                        break;
                                    case 'update':
                                        echo $view->update_course();
                                }
                                }
                                ?>

                                

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