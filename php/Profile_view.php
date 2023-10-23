<!DOCTYPE html>
<html lang="en">
<?php include "Header.php" ?>
<head>
        <link rel="stylesheet" href="../css/MDB css/mdb.min.css">
        <script src="../js/MDB java/mdb.min.js"></script>
</head>
<body style="background-color: #CED8E3;"> 

<?php include "Topnav.php" ?>
    <section >
        <div class=" container-fluid  h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
              <div>
                <!-- Profile Image section -->
                <div class=" text-white d-flex flex-row" style="background-color: #000; height:200px;">
                  <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                      alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                      style="width: 150px; z-index: 1">
                  </div>
                  <div class="ms-3" style="margin-top: 130px;">
                    <h5>Andy Horwitz</h5>
                    <p>New York</p>
                  </div>
                </div>
                <!-- Profile Information section -->
                <div class="card-body p-4 text-black" style="background-color: white;">
                  <div class="mb-5 pt-3">
                    <p class="lead fw-normal mb-1">About</p>
                    <div class="p-4">
                      <p class="font-italic mb-1">Web Developer</p>
                      <p class="font-italic mb-1">Lives in New York</p>
                      <p class="font-italic mb-0">Photographer</p>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mb-4">
                    <p class="lead fw-normal mb-0">Recent Courses</p>
                    <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
                  </div>
                  <div class="row g-2">
                    <div class="col mb-2">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp"
                        alt="image 1" class="w-100 rounded-3">
                    </div>
                    <div class="col mb-2">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(107).webp"
                        alt="image 1" class="w-100 rounded-3">
                    </div>
                  </div>
                  <div class="row g-2">
                    <div class="col">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(108).webp"
                        alt="image 1" class="w-100 rounded-3">
                    </div>
                    <div class="col">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(114).webp"
                        alt="image 1" class="w-100 rounded-3">
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </section>
      <?php include "Bottomnav.php" ?>
</body>
</html>