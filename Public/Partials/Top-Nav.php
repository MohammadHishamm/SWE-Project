  <!-- TopNav -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary ">
      <div class="container-fluid ">
          <button class="btn btn-link ms-lg-5  mb-lg-0 mb-3" data-mdb-toggle="offcanvas" href="#offcanvasExample"
              role="button" aria-controls="offcanvasExample">
              <i class="fa-solid fa-bars-staggered  btn-open hero_main_text2"></i>
          </button>
          <a class=" navbar-brand mx-auto mb-lg-0 mb-3 logo_name" href="index.php">Arab Data Hub</a>

          <ul class="navbar-nav mx-auto   mb-4 mb-lg-0 mt-2 ">
              <li class="nav-item ">
                  <form class="d-flex" action="categories.php" method="post" role="search">

                      <input class="form-control me-2 rounded-9 rounded-pill search" name="search" type="search"
                          placeholder="Find a specfic course ?" aria-label="Search">
                  </form>
              </li>
          </ul>
          <?php
    

        if(isset($_SESSION['user_data']))
        {
          foreach($_SESSION['user_data'] as $key => $value)
{
  $id = $value['id'];
}
          echo '
            <div class="mx-auto  mb-4 mb-lg-0 mt-2 " >
              <div class="row align-items-center">

              <div class="col">
              <a class="btn btn-primary p-2  rounded-2"  href="../php/chat/privatechat.php">
                Chat
              </a>

              
            </div>

                    
                    <div class="col">
                      <a href="Signout.php">

                        <i class="fa-solid fa-arrow-right-from-bracket" style="color: #000000;"></i>

                      </a>
                    </div>
                    </div>
                  </div>';
     
      } else {
        
          echo '
              <div class="mx-auto  mb-4 mb-lg-0 mt-2 " >
                <div class="row">
              
                <div class="col">
                  <a href="Signup-in.php">
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