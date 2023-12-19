<?php



define('__ROOT__', "../app/");
require_once('../app/controller/checkoutcontroller.php');
require_once('../app/model/checkout.php');
require_once('../app/view/viewcheckout.php');

$checkout_model = new checkout();
$checkout_controller = new CheckoutController($checkout_model);
$View_checkout = new ViewCheckout($checkout_controller,$checkout_model);



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Checkout</title>
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

    <link rel="stylesheet" href="../css/checkout.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    
    <link rel="stylesheet" href="../css/MDB css/mdb.min.css">
    
</head>
  <style>
   

    </style>
  <body>
  <section class="container-fluid">
  <div class=" py-5">
    <div class="row d-flex justify-content-center align-items-center ">
      <div class="col-10">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Checkout</h3>
        </div>
      <?php
        $View_checkout->view_checkout();
      ?>
      </div>
    </div>
  </div>
</section>
    

  </body>
</html>

