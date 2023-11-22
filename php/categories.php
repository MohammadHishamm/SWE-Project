<?php
session_start();

if(empty($_SESSION['user_data']))
{
  header('location:signup.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include "Header.php" ?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>category</title>


    <link rel="stylesheet" href="../css/MDB css/mdb.min.css">
    <link rel="stylesheet" href="../css/Sidenav.css">
    <link rel="stylesheet" href="../css/All.css">
    <script>
    function showUser(str) {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "Search_card.php?q=" + str, true);
        xmlhttp.send();

    }
    </script>
</head>
<style>
@media (max-width: 767.98px) {
    .border-sm-start-none {
        border-left: none !important;
    }
}
</style>

<body style="background-color: #ebeff4">
    <?php include "Topnav.php" ?>
    <?php include "Sidenav.php" ?>

    <!-- Sidebar filter section -->
    <div class="row">
    <section id="sidebar" class="col-3 ps-5 pt-5">
                <h2>Courses</h2>
                <div class="border-bottom pb-2 ml-2">
                    <h4 id="burgundy">Filters</h4>
                </div>
                <div class="py-2 border-bottom ml-3">
                    <h6 class="font-weight-bold">Categories</h6>
                    <div id="orange"><span class="fa fa-minus"></span></div>
                    <form>
                        <div class='form-group'>
                            <input type='checkbox' id='artisan' onclick='showUser("-1")' />
                            <label for='artisan'>ALL</label>
                        </div>
                    </form>
                </div>
                <div class="py-2 border-bottom ml-3">
                    <h6 class="font-weight-bold">Instructors</h6>
                    <div id="orange"><span class="fa fa-minus"></span></div>
                    <form>
                        <div class="form-group">
                            <input type="checkbox" id="tea" />
                            <label for="tea">Alden Fabian</label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="cookies" />
                            <label for="cookies">Ricky Jimmie</label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="pastries" />
                            <label for="pastries">Alden Fabian</label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="dough" />
                            <label for="dough">Ricky Jimmie</label>
                        </div>
                    </form>
                </div>
                <div class="py-2 ml-3">
                    <h6 class="font-weight-bold">Offers</h6>
                    <div id="orange"><span class="fa fa-minus"></span></div>
                    <form>
                        <div class="form-group">
                            <input type="checkbox" id="25off" />
                            <label for="25">25% off</label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="25off" />
                            <label for="25">10% off</label>
                        </div>
                    </form>
                </div>
            </section>
    <!-- products section -->
    <section class="col-9" style="background-color: #eee;">
        <div class="container py-5">
            
            <?php
                
                require_once('teacher/components/playlist_control.php');
                $playlist = new playlist;
                $playlist_data =$playlist->get_playlist_table_row();
                
                // define how many results you want per page
                $results_per_page = 10;

                // find out the number of results stored in database
                $number_of_results = $playlist_data->rowCount();

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
              $limit_data = $playlist->get_playlist_table_limit($this_page_first_result , $results_per_page);
              ?>
            <p class="fs-4  ">Number of Results -<?=$number_of_results?>- </p>
            <?php
              while($fetch_playlist = $limit_data->fetch(PDO::FETCH_ASSOC) )
              {   
                ?>


            <div class="row justify-content-center mb-3">
                <div class="col-md-12 col-xl-10">
                    <div class="card shadow-0 border rounded-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                    <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                        <img src="teacher/uploaded_files/<?= $fetch_playlist['thumb'] ?>"
                                            class="w-100" />
                                        <a  href="course.php?playlist_id=<?= $fetch_playlist['playlist_id'] ?>">
                                            <div class="hover-overlay">
                                                <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <h5><?= $fetch_playlist['title'] ?></h5>
                                    <div class="d-flex flex-row">
                                        <div class="text-danger mb-1 me-2">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <span>310</span>
                                    </div>
                                    <a class="text-dark" href="profile_view.php?user_id=<?= $fetch_playlist['user_id'] ?>" style="font-size: 13px;"><?= $fetch_playlist['user_name'] ?></a>

                                    <p class="text-truncate mb-4 mt-3 mb-md-0">
                                        <?= $fetch_playlist['description'] ?>
                                    </p>
                                </div>
                                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                    <div class="d-flex flex-row align-items-center mb-1">
                                        <h4 class="mb-1 me-1">$13.99</h4>
                                        <span class="text-danger"><s>$20.99</s></span>
                                    </div>
                                    <h6 class="text-success">Free shipping</h6>
                                    <div class="d-flex flex-column mt-4">
                                        <a href="course.php?playlist_id=<?= $fetch_playlist['playlist_id'] ?>"
                                            class="btn btn-outline-primary btn-sm mt-2">
                                            View
                                        </a>
                                        <button class="btn btn-outline-primary btn-sm mt-2" type="button">
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
        </div>
    </section>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <?php
                // display the links to the pages
                for ($page=1;$page<=$number_of_pages;$page++) 
                {
                  echo '<li class="page-item"><a class="page-link" href="categories.php?page=' . $page . '"> '. $page .'</a></li> ';
                }
            ?>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>


</body>

</html>