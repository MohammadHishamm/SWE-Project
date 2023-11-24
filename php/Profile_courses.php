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
    <title>Courses</title>
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
                                <div class="col-lg-2 col-5 ">
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
                                                    <a href="/SWE-PROJECT/php/profile.php"
                                                        class="btn btn-light mb-0 ps-3  " style="width: 100%;"> <i
                                                            class="fa-regular fa-user pe-3"></i>Profile</a>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-start align-items-center  pt-3 ps-3 pe-3 ">
                                                    <a href="/SWE-PROJECT/php/Profile_account.php"
                                                        class="btn btn-light mb-0 ps-3 " style="width: 100%;"><i
                                                            class="fa-solid fa-gear pe-3"></i>Account</a>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-start align-items-center pt-3 ps-3 pe-3 ">
                                                    <a href="/SWE-PROJECT/php/Profile_courses.php"
                                                        class="btn btn-light mb-0 ps-3 active " style="width: 100%;"><i
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
                                                    <p class="mb-0" style="font-size: 1.5rem;">Your Courses</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <?php
                
                require_once('User/course.php');
                $course = new Courses;
                $course->setStudentid($user_id);
                $course_data =$course->get_course_by_student_id();
                
                // define how many results you want per page
                $results_per_page = 10;

                // find out the number of results stored in database
                $number_of_results = $course_data->rowCount();

                // determine number of total pages available
                $number_of_pages = ceil($number_of_results/$results_per_page);

                // determine which page number visitor is currently on
                if (!isset($_GET['page'])) {
                $page = 1;
                } else {
                $page = $_GET['page'];
                }
              // determine the sql LIMIT starting number for the results on the displaying page
              $this_page_first_result = ($page-1)*$results_per_page;

              // retrieve selected results from database and display them on page
            //   $limit_data = $playlist->get_playlist_table_limit($this_page_first_result , $results_per_page);
              ?>
            <p class="fs-4  ">Number of Results -<?=$number_of_results?>- </p>
            <?php
              while($fetch_course = $course_data->fetch(PDO::FETCH_ASSOC) )
              {   
            ?>


                                            <div class="row justify-content-center mb-3">
                                                <div class="col-md-12 col-xl-10">
                                                    <div class="card shadow-0 border rounded-3">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                                                    <div
                                                                        class="bg-image hover-zoom ripple rounded ripple-surface">
                                                                        <img src="teacher/uploaded_files/<?= $fetch_course['thumb'] ?>"
                                                                            class="w-100" />
                                                                        <a
                                                                            href="course.php?playlist_id=<?= $fetch_course['playlist_id'] ?>">
                                                                            <div class="hover-overlay">
                                                                                <div class="mask"
                                                                                    style="background-color: rgba(253, 253, 253, 0.15);">
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-6 col-xl-6">
                                                                    <h5><?= $fetch_course['title'] ?></h5>
                                                                    <div class="d-flex flex-row">
                                                                        <div class="text-danger mb-1 me-2">
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                        </div>
                                                                        <span>310</span>
                                                                    </div>
                                                                    <a class="text-dark"
                                                                        href="profile_view.php?user_id="
                                                                        style="font-size: 13px;"><?= $fetch_course['user_name'] ?></a>

                                                                    <p class="text-truncate mb-4 mt-3 mb-md-0">
                                                                        <?= $fetch_course['description'] ?>
                                                                    </p>
                                                                </div>
                                                                <div
                                                                    class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                                                    <div
                                                                        class="d-flex flex-row align-items-center mb-1">
                                                                        <h4 class="mb-1 me-1">$13.99</h4>
                                                                        <span class="text-danger"><s>$20.99</s></span>
                                                                    </div>
                                                                    <h6 class="text-success">Free shipping</h6>
                                                                    <div class="d-flex flex-column mt-4">
                                                                        <a href="course.php?playlist_id=<?= $fetch_course['playlist_id'] ?>"
                                                                            class="btn btn-outline-primary btn-sm mt-2">
                                                                            View
                                                                        </a>
                                                                        <button
                                                                            class="btn btn-outline-primary btn-sm mt-2"
                                                                            type="button">
                                                                            Add to wishlist
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <?php
                }
                ?>
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-center">
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                                    </li>
                                                    <?php
                // display the links to the pages
                for ($page=1;$page<=$number_of_pages;$page++) 
                {
                  echo '<li class="page-item"><a class="page-link" href="profile_courses.php?page=' . $page . '"> '. $page .'</a></li> ';
                }
            ?>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">Next</a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>

        </section>
        </div>







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