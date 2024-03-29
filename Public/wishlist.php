<?php



define('__ROOT__', "../app/");
require_once('../app/controller/wishlistcontroller.php');
require_once('../app/model/wishlist.php');
require_once('../app/view/viewwishlist.php');
require_once('../app/model/notify.php');

$notify = new notify();
$wishlist_model = new wishlist();
$wishlist_controller = new WishlistController($wishlist_model);
$View_wishlist = new ViewWishlist($wishlist_controller,$wishlist_model);

if(!isset($_SESSION['user_data']))
{
  header('location:signup-in.php');
}

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    
    <link rel="stylesheet" href="../css/MDB css/mdb.min.css">
    <link rel="stylesheet" href="../css/All.css">
    <link rel="stylesheet" href="../css/Sidenav.css">
</head>
<script src="../js/Toast.js"></script>


  <body>

  <audio id="Audio">
        <source src="../images/alert.wav">
    </audio>
    <?php include "Partials/Toast.php" ?>
    <?php include "Partials/Top-Nav.php" ?>
    <?php include "Partials/Side-Nav.php" ?>
    <?php include "Partials/Top-Button.php" ?>
  <section class="container-fluid">
  <div class=" py-5">
    <div class="row d-flex justify-content-center align-items-center ">
      <div class="col-10">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Wishlist</h3>
        </div>
      <?php
        $View_wishlist->view_wishlist();
      ?>
      </div>
    </div>
  </div>
</section>
    
<?php include "Partials/Bottom-Nav.php" ?>

  </body>
</html>

