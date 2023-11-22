<!DOCTYPE html>
<html lang="en">
<?php include "Header.php" ?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>category</title>

    <link rel="stylesheet" href="../css/categories.css" />
    <link rel="stylesheet" href="../css/MDB css/mdb.min.css">
    <link rel="stylesheet" href="../css/Sidenav.css">

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

<body style="background-color: #ebeff4">
    <?php include "Topnav.php" ?>
    <?php include "Sidenav.php" ?>

    <div class="filter ">
        <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#mobile-filter"
            aria-expanded="true" aria-controls="mobile-filter">
            Filters<span class="fa fa-filter pl-1"></span>
        </button>
    </div>

    <!-- Sidebar filter section -->

    <section id="sidebar" class="ps-5 pt-5">
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
        <?php
            include "dbh.inc.php";
  
            $sql="Select * from categories ";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) > 0) {
              while($row=mysqli_fetch_array($result))	
              {
                echo "
                <div class='form-group'>
                <input type='checkbox' id='artisan' onclick='showUser($row[0])' />
                <label for='artisan'>$row[1]</label>
                </div>
                ";
              }
            }
      ?>
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
    <div class="container-fluid pt-4">
        <div class="p-5">
            <!-- Section name -->

            <!-- section products -->
            <div class="row">
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

              while($fetch_playlist = $limit_data->fetch(PDO::FETCH_ASSOC) )
              {   
                ?>
                <div class="col-xxl-4 col-lg-6 col-12  mb-3 ">
                    <div class="card" style="width: 19rem; height: 30rem;  ">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light"
                            style="width: 19rem; height: 30rem;  ">
                            <img src="teacher/uploaded_files/<?= $fetch_playlist['thumb'] ?>"
                                style="object-fit: cover ; height: 100%; width: 100%;" />
                            <a href="course.php?playlist_id=<?= $fetch_playlist['playlist_id'] ?>">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                </div>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="card-title">
                                <div class="row mb-3">
                                    <div class="col-7 d-flex justify-content-start align-items-center">
                                        <img src="../Images/avatar-2.webp" alt="Generic placeholder image"
                                            class="img-fluid rounded-circle border border-dark border-3"
                                            style="width: 40px;">
                                        <span class="ps-2" style="font-size: 13px;">@zayaty750</span>
                                    </div>
                                    <div class="col-5 d-flex justify-content-end align-items-center">
                                        <ul class="mb-0 list-unstyled d-flex flex-row  " style="color: yellow;">
                                            <li>
                                                <i class="fas fa-star fa-xs"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star fa-xs"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star fa-xs"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star fa-xs"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star fa-xs"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="card-text mb-3"><?= $fetch_playlist['title'] ?></p>
                                <div>
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <p class="small mb-0"><i class="far fa-clock me-2"></i>3 hrs</p>
                                        <p class="fw-bold mb-0">$90</p>
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
        </div>
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