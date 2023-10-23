  <!-- TopNav -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container-fluid">
      <button class="btn btn-link ms-lg-5  mb-lg-0 mb-3" data-mdb-toggle="offcanvas" href="#offcanvasExample" role="button"
      aria-controls="offcanvasExample">
        <i class="fa-solid fa-bars-staggered fa-2xl " style="color: #0f141a; "></i>
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

      <div class="mx-auto " >
        <div class="row">
          <div class="col">
           <a href="signin.php">  <button class="btn" style="background-color: #CED8E3; color: #0F141A;">
              Login
            </button>
          </a>
          </div>
          <div class="col">
          <a href="signup.php">
            <button class="btn" style="background-color: #58779D; color: white;">
              SignUp
            </button>
          </a>
          </div>
        </div>
      </div>
    </div>
  </nav>


  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
    <button type="button" class="btn-close text-reset" data-mdb-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
      Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images,
      lists, etc.
    </div>
    <div class="dropdown mt-3">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
        data-mdb-toggle="dropdown">
        Dropdown button
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </div>
  </div>
</div>
