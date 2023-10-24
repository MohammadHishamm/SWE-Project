  <!-- TopNav -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container-fluid">
      <button class="btn btn-link ms-lg-5  mb-lg-0 mb-3" data-mdb-toggle="offcanvas" href="#offcanvasExample" role="button"
      aria-controls="offcanvasExample">
        <i class="fa-solid fa-bars-staggered fa-2xl btn-open"  style="color: #0f141a; "></i>
      </button>
      <a class="text navbar-brand mx-auto mb-lg-0 mb-3" href="Home.php" style=" font-size: 30px; font-weight: bolder;">Arab Data Hub</a>

        <ul class="navbar-nav mx-auto mb-4 mb-lg-0 ">
          <li class="nav-item ">
            <form class="d-flex" role="search">

              <input class="form-control me-2 rounded-9 rounded-pill" type="search" placeholder="Find a specfic course ?" aria-label="Search"
                style="width: 400px;">
            </form>
          </li>
        </ul>
        <?php
        session_start();

        if(!empty($_SESSION['ID'])) {

          echo '
            <div class="mx-auto " >
              <div class="row">
                    <div class="col">
                      <a href="profile.php">
                        <button class="btn" style="background-color: #CED8E3; color: #0F141A;">
                          Profile
                        </button>
                      </a>
                    </div>
                    <div class="col">
                      <a href="signout.php">
                        <button class="btn" style="background-color: #58779D; color: white;">
                          Logout
                        </button>
                      </a>
                    </div>
                    </div>
                  </div>';
     
      } else {
        
          echo '
              <div class="mx-auto " >
                <div class="row">
              
                <div class="col">
                  <a href="signup.php">
                    <button class="btn" style="background-color: #58779D; color: white;">
                      SignUp
                    </button>
                  </a>
                </div>
              </div>
              </div>';
            }
          ?>
    </div>
  </nav>

