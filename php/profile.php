<!DOCTYPE html>
<html lang="en">
  <?php include "Header.php" ?>
  <head>
        <link rel="stylesheet" href="../css/MDB css/mdb.min.css">
        <script src="../js/MDB java/mdb.min.js"></script>
        <link rel="stylesheet" href="../css/profile.css">
        <link rel="stylesheet" href="../css/Sidenav.css">
</head>
  <body style="background-color: #ebeff4">

    <?php include "Topnav.php" ?>
    <?php include "Sidenav.php" ?>
    <div class="container">
      <div class="main-body" style="margin: 10px">
        <div class="row gutters-sm">
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <img
                    src="img1.jpg"
                    alt="img"
                    class="rounded-circle"
                    width="150"
                  />
                  <div class="mt-3">
                  <h4><?php echo $_SESSION["Name"] ; ?></h4>
                  </div>
                </div>
              </div>
              <div class="d-flex flex-column align-items-left">
                <nav id="sidebar">
                  <ul class="list-unstyled components mb-5">
                    <li class="active">
                      <a href="#"
                        ><i style="font-size: 24px" class="fa">&#xf015;</i>
                        Overview</a
                      >
                    </li>

                    <li>
                      <a href="#"
                        ><i style="font-size: 20px" class="fa">&#xf0f3;</i>
                        Notifications</a
                      >
                    </li>

                    <li>
                      <a href="#"
                        ><i style="font-size: 24px" class="fa">&#xf013;</i>
                        Settings</a
                      >
                    </li>
                    <li>
                      <a href="#"
                        ><i style="font-size: 24px" class="fa">&#xf08b;</i> Sign
                        out</a
                      >
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card mb-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Full Name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary"><?php echo $_SESSION["Name"] ; ?></div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary"><?php echo $_SESSION["Email"] ; ?></div>
                </div>
                <hr />

              
             
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Billing Information</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">Paypal</div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-sm-12">
                    <a class="btn btn-info" target="__blank" href="edit-page.php"
                      >Edit Profile</a
                    >
                  </div>
                </div>
              </div>
            </div>

            <div class="row gutters-sm">
              <div class="col-sm-6 mb-3">
                <div class="card h-100">
                  <div class="card-body">
                    <h5>My Courses</h5>
                    <ul class="list-group list-group-flush">
                      <a
                        href="#"
                        class="list-group-item list-group-item-action"
                        aria-current="true"
                      >
                        Course 1
                      </a>
                      <a
                        href="#"
                        class="list-group-item list-group-item-action"
                      >
                        Course 2</a
                      >
                      <a
                        href="#"
                        class="list-group-item list-group-item-action"
                      >
                        Course 3</a
                      >
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 mb-3">
                <div class="card h-100">
                  <div class="card-body">
                    <h5 class="d-flex align-items-center mb-3">
                      <i class="material-icons text-info mr-2"></i>Calender
                      <div id="calendar"></div>
                    </h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script src="test.js"></script>
  </body>
</html>
