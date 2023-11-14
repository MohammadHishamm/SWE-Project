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
    xmlhttp.open("GET","Search_card.php?q="+str,true);
    xmlhttp.send();
  
}
</script>
  </head>

  <body style="background-color: #ebeff4">
  <?php include "Topnav.php" ?>
  <?php include "Sidenav.php" ?>

    <div class="filter ">
      <button
        class="btn btn-default"
        type="button"
        data-toggle="collapse"
        data-target="#mobile-filter"
        aria-expanded="true"
        aria-controls="mobile-filter"
      >
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
      <div class="row d-flex justify-content-center align-items-center"  id="txtHint">
      <?php include "Search_card.php" ?>

      </div>
    </div>
    </div>

  
  </body>
</html>
