<?php
include "dbh.inc.php";
include "wishlistclass.php";
session_start();



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Wishlist</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/css/intlTelInput.css"
    />
    <link
      rel="stylesheet"
      href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
    />

    <link rel="stylesheet" href="../css/wishlist.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    
</head>
  </head>
  <style>
   

    </style>
  <body>
  <section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Wishlist</h3>
          
        </div>
       <!-- Data section -->
       <?php
                require_once('teacher/components/playlist_control.php');
                foreach($_SESSION['user_data'] as $key => $value)
         {
           $User_ID = $value['id'];
         }  
                $playlist = new playlist;
                $wishlist= new wishlist;
                $wishlistt=$wishlist->get_All_wishlist($User_ID);
                $playlist_data =$playlist->get_playlist_table_row_5();
                
                foreach ($wishlistt as $wishlist):
                  $courseid=$wishlist['Course_ID'];
                
               
                $playlist->get_playlist_by_id($courseid);
                $fetch_playlist = $playlist_data->fetch(PDO::FETCH_ASSOC);
                    

                    
                ?>

        <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
                <img
                src="teacher/uploaded_files/<?= $fetch_playlist['thumb'] ?>"
                  class="img-fluid rounded-3" alt="Cotton T-shirt">
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2"><?= $fetch_playlist['title'] ?></p>
                <p><span class="text-muted">Instructor: </span><?= $fetch_playlist['user_name'] ?>
              </div>
             
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
              <h5 class="mb-0">$499.00  <div class="buttonarea">
            <a  class="button1" href="?delete_wishlist=true">Delete</a>
          </div></h5>
              </div>
              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>


               



                <!-- End of data section -->


              </div>
            </div>
          </div>
        </div>
        <?php
                endforeach;
                                           $Course_ID = $fetch_playlist['playlist_id'];
                

                

                if (isset($_GET['delete_wishlist'])) {

                    $wishlist->deletewishlist($Course_ID,$User_ID);
                }



        ?>

       
          <div class="buttonarea">
            <button type="button" class="button">Proceed to Payment</button>
          </div>
        

      </div>
    </div>
  </div>
</section>
    
    <script src="../js/wishlist.js"></script>
  </body>
</html>

