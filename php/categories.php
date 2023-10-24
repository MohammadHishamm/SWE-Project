<!DOCTYPE html>
<html lang="en">
<?php include "Header.php" ?>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>category</title>
   
    <link rel="stylesheet" href="../css/categories.css" />
    <link rel="stylesheet" href="../css/MDB css/mdb.min.css">
    
   
  </head>

  <body style="background-color: #ebeff4">
  <?php include "Topnav.php" ?>
    <div class="filter">
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

    <section id="sidebar">
      <h2>Courses</h2>
      <div class="border-bottom pb-2 ml-2">
        <h4 id="burgundy">Filters</h4>
      </div>
      <div class="py-2 border-bottom ml-3">
        <h6 class="font-weight-bold">Categories</h6>
        <div id="orange"><span class="fa fa-minus"></span></div>
        <form>
          <div class="form-group">
            <input type="checkbox" id="artisan" />
            <label for="artisan">Web Design</label>
          </div>
          <div class="form-group">
            <input type="checkbox" id="breakfast" />
            <label for="breakfast">Devolopment</label>
          </div>
          <div class="form-group">
            <input type="checkbox" id="healthy" />
            <label for="healthy">Marketing</label>
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
    <div class="container-fluid">
    <div class="p-5">
      <!-- Section name -->
   
      <!-- section products -->
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col mb-3">
          <div class="card" style="width: 300px;">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img src="../Images/img.jpg" class="img-fluid" style="width:300px; height: 200px" />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
            <div class="card-body">
              <div class="card-title">
                <div class="row mb-3">
                  
              
                </div>
                <p class="card-text mb-3">Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p>
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
        

        <div class="col mb-3">
          <div class="card" style="width: 300px;">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img src="../Images/img.jpg" class="img-fluid"  style="width:300px; height: 200px" />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
            <div class="card-body">
              <div class="card-title">
                <div class="row mb-3">
                  
              
                </div>
                <p class="card-text mb-3">Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p>
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

     
        <div class="col mb-3">
          <div class="card" style="width: 300px;">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img src="../Images/img.jpg" class="img-fluid"  style="width:300px; height: 200px" />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
            <div class="card-body">
              <div class="card-title">
                <div class="row mb-3">
                  
              
                </div>
                <p class="card-text mb-3">Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p>
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
        <div class="col mb-3">
          <div class="card" style="width: 300px;">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img src="../Images/img.jpg" class="img-fluid"   style="width:300px; height: 200px"/>
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
            <div class="card-body">
              <div class="card-title">
                <div class="row mb-3">
                  
              
                </div>
                <p class="card-text mb-3">Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p>
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
        <div class="col mb-3">
          <div class="card" style="width: 300px;">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img src="../Images/img.jpg" class="img-fluid"  style="width:300px; height: 200px" />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
            <div class="card-body">
              <div class="card-title">
                <div class="row mb-3">
                  
              
                </div>
                <p class="card-text mb-3">Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p>
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
        <div class="col mb-3">
          <div class="card" style="width: 300px;">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img src="../Images/img.jpg" class="img-fluid"  style="width:300px; height: 200px" />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
            <div class="card-body">
              <div class="card-title">
                <div class="row mb-3">
                  
              
                </div>
                <p class="card-text mb-3">Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p>
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
        
      </div>
    </div>
  </div>

  
  </body>
</html>
