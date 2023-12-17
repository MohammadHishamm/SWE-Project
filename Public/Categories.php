<?php


define('__ROOT__', "../app/");

require_once('../app/model/playlist.php');
$playlist = new playlist;

// if(empty($_SESSION['user_data']))
// {
//   header('location:signup.php');
// }



?>
<!DOCTYPE html>
<html lang="en">
<?php include "Partials/Header.php" ?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>category</title>


    <link rel="stylesheet" href="../css/MDB css/mdb.min.css">
    <link rel="stylesheet" href="../css/Sidenav.css">
    <link rel="stylesheet" href="../css/All.css">

</head>
<style>
@media (max-width: 767.98px) {
    .border-sm-start-none {
        border-left: none !important;
    }
}
</style>
<script>
  function showResult(str) {
  
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","Partials/livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>


<body style="background-color: #ebeff4">
<div id ="livesearch"></div>
    <?php include "Partials/Top-Nav.php" ?>
    <?php include "Partials/Side-Nav.php" ?>

    <!-- Sidebar filter section -->
    <div class="row mb-7  ms-3">
    <section id="sidebar" class="col-9 col-md-3 me-0 me-md-5 ps-5 pt-5 pb-3 bg-light shadow h-100 mt-5 rounded rounded-3">
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
    <section class="col-8" >
        <div class="container py-5">
            
            <?php
                
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
                                        <img src="../Images/courses/<?= $fetch_playlist['thumb'] ?>"
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
                                        <span>300</span>
                                    </div>
                                    <a class="text-dark" href="profile_view.php?user_id=<?= $fetch_playlist['user_id'] ?>" style="font-size: 13px;"><?= $fetch_playlist['user_name'] ?></a>

                                    <p class="text-truncate mb-4 mt-3 mb-md-0">
                                        <?= $fetch_playlist['description'] ?>
                                    </p>
                                </div>
                                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                    <div class="d-flex flex-row align-items-center mb-1">
                                        <h4 class="mb-1 me-1">$<?= $fetch_playlist['Price'] ?></h4>
                                        <span class="text-danger"><s>$20.99</s></span>
                                    </div>
                                    <div class="d-flex flex-column mt-4">
                                        <a href="course.php?playlist_id=<?= $fetch_playlist['playlist_id'] ?>"
                                            class="btn btn-primary btn-sm mt-2">
                                            Add to wishlist
                                        </a>
                                        <a class="btn btn-secondary btn-sm mt-2" href="View-Course.php?playlist_id=<?= $fetch_playlist['playlist_id'] ?>" >
                                            View Courses  
                                        </a>
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
            <li class="page-item ">
                <?php


                        if($page > 1 )
                        {

                        
                  
                ?>
               
                <a class="page-link" href="categories.php?page=<?=$page-1?>"  tabindex="-1" name="Previous">Previous</a>
                        <?php
                        } 
                        ?>
            </li>
            <?php
                // display the links to the pages
                for ($page_copy = 1;$page_copy<=$number_of_pages;$page_copy++) 
                {   
                  echo '<li class="page-item"><a class="page-link btn " href="categories.php?page=' . $page_copy . '">'. $page_copy .'</a></li> ';
                }
            
                if($page < $number_of_pages)
                {

                ?>
                <a class="page-link"  href="categories.php?page=<?=$page+1?>" >Next</a>
                <?php 
                }
                ?>
            </li>
        </ul>
    </nav>


</body>

</html>