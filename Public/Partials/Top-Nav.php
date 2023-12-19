<!-- TopNav -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="btn btn-link ms-lg-5 mb-lg-0 mb-5" data-mdb-toggle="offcanvas" href="#offcanvasExample"
            role="button" aria-controls="offcanvasExample">
            <i class="fa-solid fa-bars-staggered btn-open hero_main_text2"></i>
        </button>
        <a class="navbar-brand me-auto mb-lg-0 mb-5" href="index.php"
            style="width: 360px; height: 72px; overflow: hidden;">
            <img src="../Images/MyWebsite/logo2.png" alt="" style="width: 100%; height: 100%; object-fit: cover;">
        </a>




        <ul class="navbar-nav mx-auto mb-4 mb-lg-0 mt-2 ">
            <li class="nav-item ">
                <form class="d-flex" action="Categories.php" method="post" role="search">

                    <input class="form-control me-2 rounded-9 rounded-pill search" autocomplete="off" name="search"
                        type="search" placeholder="Find a specfic course ?" aria-label="Search">
                </form>
            </li>
        </ul>
        <?php
    

        if(isset($_SESSION['user_data']))
        {
          foreach($_SESSION['user_data'] as $key => $value)
          {
              $id = $value['id'];
              $img = $value['img'];
          }

          $notify->setuserid($id);
          $notify->get_notify();
          
          $notifications = $_POST['statement'];
          $notification_count = $_POST['count'];
          
        ?>
        <!-- <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('fcccde774b0f17925676', {
            cluster: 'eu',
            encrypted: true,
        });

        var channel = pusher.subscribe('my-channel'); -->

        <!-- // channel.bind('my-event', function(data) 
        // {
        // }); -->
        </script>

        <?php
  

          echo '
            <div class="mx-auto  mb-4 mb-lg-0 mt-2 " >
              <div class="row align-items-center">

            <div class="col">
 
            </div>

            <div class="dropdown col me-5">
            <a 
            data-mdb-dropdown-init
            href="#"
            id="navbarDropdownMenuAvatar"
            role="button"
            aria-expanded="false"
            href="" class="text-dark">
            <i class="fas fa-envelope fa-lg"></i>
            <span class="badge rounded-pill badge-notification bg-danger">'. $notification_count.'</span>
            </a>



            <ul class="dropdown-menu text-small  overflow-auto" "  aria-labelledby="navbarDropdownMenuAvatar"  style="width: 230px; height: 300px;"  >
            ';                              
            // if( $notifications->rowCount() > 0){
            
              if(!empty($notifications) )
              {
            foreach($notifications as $fetch_notifications)
            {
              echo'<li class="p-1"><a class="dropdown-item border border-bottom  text-wrap " href="#">
              <span class="  " style="font-size: 20px; color: #58779D; ">Notification</span>
              <br>
              '.$fetch_notifications['msg'].'
              <br>
              <span class="  text-muted" style="font-size: 10px;">'.$fetch_notifications['created_on'].'</span>
              </a>
              
              </li>';
            }
          }
          else{
            echo'<li class="p-1"><a class="dropdown-item border border-bottom  text-wrap " href="#">
            <span class="  " style="font-size: 20px; color: #58779D; ">Notification</span>
            <br>
            No notification 
            <br>
            <span class="  text-muted" style="font-size: 10px;"></span>
            </a>
            
            </li>';
          }
            // }
            echo '
            </ul>
            </div>
              
            <div class="dropdown col">
            <a 
            data-mdb-dropdown-init
            href="#"
            id="navbarDropdownMenuAvatar"
            role="button"
            aria-expanded="false"
            href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../images/users/'.$img.'" alt="mdo" width="36" height="36" class="rounded-circle">
            </a>

            <ul class="dropdown-menu text-small " aria-labelledby="navbarDropdownMenuAvatar" style="position: absolute; inset: 0px auto auto 300px; margin: 0px; transform: translate(0px, 34px);" data-popper-placement="bottom-start">
         
          
            <li><a class="dropdown-item" href="Partials/Sign-out.php">Sign out</a></li>
            </ul>

          </div>
          ';

        }
  
     
      else {
        
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
