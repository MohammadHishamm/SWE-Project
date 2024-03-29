<?php

define('__ROOT__', "../app/");

// require_once('wishlistclass.php');
require_once('../app/controller/Playlistcontroller.php');
require_once('../app/controller/usercontroller.php');
require_once('../app/model/user.php');
require_once('../app/model/tutor.php');
require_once('../app/view/viewuser.php');
require_once('../app/model/notify.php');
require_once('../app/model/wishlist.php');
require_once('../app/model/checkout.php');

$checkout_model = new checkout();
$wishlist_model = new wishlist();
$notify = new notify();

$tutor = new tutor();
$playlist = $playlist = $tutor->getplaylist();
$playliscontroller = new PlaylistController($playlist);

$view_playlist = new ViewUser($playliscontroller, $tutor);

$model = new User();
$controller = new UsersController($model);


// if(empty($_SESSION['user_data']))
// {
//   header('location:signup.php');
// }




// $wishlist = new wishlist;
if(isset($_SESSION['user_data']))
{
    foreach($_SESSION['user_data'] as $key => $value)
    {
      $User_ID = $value['id'];
    }  
}

if (isset($_GET['add_to_wishlist'])) {

    $wishlist_model->addwishlist($_GET['Course_Id'], $User_ID);
}

if (isset($_GET['add_to_cart']))
{
    $checkout_model->addcheckout($_GET['Course_Id'], $User_ID);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="../css/Sidenav.css">

    <link rel="stylesheet" href="../css/MDB css/mdb.min.css">
    <link rel="stylesheet" href="../css/All.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>


</head>
<script src="../js/wishlist.js"></script>
  
<script src="../js/Toast.js"></script>



<body style="overflow: hidden">

<audio id="Audio">
        <source src="../images/alert.wav">
    </audio>
    <!-- Loaders -->
    <div class="text-center transition transition-1 is-active" id="preloading">

        <div style="margin-top: 100px">

            <img src="../images/loader.gif">

        </div>

        <div class="mx-auto "  style="width: 500px; height: 200px; overflow: hidden; margin-top: 20px;">
        <img src="../Images/MyWebsite/loader logo.png" alt="" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
    </div>

    <!-- Loaders -->
    <!-- <div class="text-center transition transition-2 is-active" id="preloading">

        <div style="margin-top: 100px">

            <img src="../images/loader.gif">

        </div>
        <p style="margin-top: 20px;   
color: #0f141a;
font-size: 3.0rem;
font-weight: bolder;">Arab Data Hub</p>
    </div> -->




    <?php include "Partials/Toast.php" ?>
    <?php include "Partials/Top-Nav.php" ?>
    <?php include "Partials/Side-Nav.php" ?>
    <?php include "Partials/Top-Button.php" ?>
    <!-- First Section -->
    <div class="  mb-10" style="height: min-content; margin-top: 100px; ">

        <img src="../Images/blue wave back.png" alt="" class=" position-absolute main-img img-fluid"
            style="z-index: -1000;  transition: 1.0s ease-in-out; ">
        <div class="container w-100 ">

            <div class="row  align-items-center ">

                <div class="col-lg-6 pb-5  order-lg-1 order-5 ">

                    <h1 class="mb-5 hero_main_text">
                        Build your first step
                        <br>
                        of knowledge with
                        <br>
                        <span class="typed-text"></span><span class="cursor typing">&nbsp;</span>
                    </h1>

                    <p class="lead fs-6 mb-6"> <img src="../Images/bar.png" alt=""
                            style="height: 64px;width: 11px; margin-top: 20px; ">
                        <span class="hero_main_text2" style="margin-left: 10px; ">Empower your learning journey with our
                            online platform.
                        </span>
                    </p>

                    <div style="margin-top: 70px;  width: fit-content; height: fit-content;">
                        <a class="btn p-3 fs-7 rounded-9" href="Teacher-Form.php"
                            style="background-color: #58779D; color: white; letter-spacing: 3px;">
                            Apply Now
                        </a>
                        <a href="/SWE-PROJECT/Public/Categories.php">
                        <button class="btn btn-link ms-5 p-3 fs-7" style="color:black; letter-spacing: 3px;">
                            <i class="fa-sharp fa-solid fa-circle-play" style="color: black;"></i>
                          
                            Watch Our Courses
                         
                        </button>
                        </a>
                    </div>
                </div>

                <div class="col-10 pt-5 col-sm-8 col-lg-6  order-2 p-5 ">
                    <span class="dot"></span>
                    <img src="../Images/image.png" class="d-block  img-fluid " alt="Bootstrap Themes" width="600"
                        height="600" loading="lazy">
                </div>

            </div>
        </div>
    </div>


    <!-- <div class="container-fluid" >
    <div class="d-flex flex-wrap flex-lg-nowrap ">
      <div class="card text-center mx-auto " style="height: fit-content; width: 314px; height: 294px; background-color: transparent;">
        <div class="card-body">
          <h5 class="card-title pt-3">Special title treatment</h5>
          <p class="card-text pt-5 pb-4">250 courses</p>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean.</p>
        </div>
      </div>
  
      <div class="card text-center mx-auto " style="height: fit-content; width: 314px; height: 294px; background-color: transparent;">
        <div class="card-body">
          <h5 class="card-title pt-3">Special title treatment</h5>
          <p class="card-text pt-5 pb-4">250 courses</p>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean.</p>
        </div>
      </div>
  
      <div class="card text-center mx-auto " style="height: fit-content; width: 314px; height: 294px; background-color: transparent;">
        <div class="card-body">
          <h5 class="card-title pt-3">Special title treatment</h5>
          <p class="card-text pt-5 pb-4">250 courses</p>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean.</p>
        </div>
      </div>
  
      <div class="card text-center mx-auto " style="height: fit-content; width: 314px; height: 294px; background-color: transparent;">
        <div class="card-body">
          <h5 class="card-title pt-3">Special title treatment</h5>
          <p class="card-text pt-5 pb-4">250 courses</p>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean.</p>
        </div>
      </div>
    </div>
  </div> -->

    <div class="container-fluid ps-5 pe-5 mb-6">
        <div class="row d-flex justify-content-between align-content-center">
            <img src="../Images/dhl-3.svg" alt="" srcset="" style="width: 150px; margin-bottom: 50px;">
            <img src="../Images/dropbox.svg" alt="" srcset="" style="width: 150px; margin-bottom: 50px;">
            <img src="../Images/airbnb.svg" alt="" srcset="" style="width: 150px; margin-bottom: 50px;">
            <img src="../Images/fedex-express-6.svg" alt="" srcset="" style="width: 150px; margin-bottom: 50px;">
            <img src="../Images/juniper-networks-logo-4.svg" alt="" srcset=""
                style="width: 150px; margin-bottom: 50px;">
        </div>

    </div>

    <div class="">
        <div class="p-5 ">
            <!-- Section name -->
            <div class="row mb-8">
                <div class="col-6 d-flex justify-content-start  align-items-center">
                    <span class="fs-1 text">Featured <span style="color: #58779D;">Courses</span></span>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <button class="btn btn-light ">
                        Browse All
                        <i class="fa-solid fa-arrow-right" style="color: #000000;"></i>
                    </button>
                </div>
            </div>
            <!-- section products -->
            <div class="row d-flex justify-content-center align-items-center">

                <?=
                $view_playlist->view_courses();
                ?>

            </div>
        </div>
    </div>

    <!-- Second Section -->
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row  align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="../Images/hero 1 back image.avif" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes"
                    width="700" height="500" loading="lazy">
            </div>

            <div class="col-lg-6 p-5">

                <p class="fs-6 fw-bold lh-1 " style="color: #58779D;">ABOUT US
                <h1>
                    <h1 class="fs-2 fw-bold lh-1 mb-3" style="color: black;">Innovative Way To Learn
                    </h1>
                    <p class="fs-6 lead">Quickly design and customize responsive mobile-first sites with
                        Bootstrap, the
                        world’s most popular front-end open source toolkit, featuring Sass variables and
                        mixins,
                        responsive grid system, extensive prebuilt components, and powerful JavaScript
                        plugins.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2"
                            style="background-color: #58779D; color: white;">Learn More</button>
                    </div>
            </div>

        </div>
    </div>

    <!-- Courses section -->
    <div class="container-fluid px-4 py-5 " style="background-color: #CED8E3;">
        <div class="mb-7 ">
            <div class="row">
                <div class="col">
                    <h4 class="text text-center">Our <span style="color: white;">Courses</span></h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h1 class="text text-center">Explore Courses By Category</h1>
                </div>
            </div>
        </div>

        <div class="d-flex flex-wrap flex-sm-nowrap ">

            <div class="bg-image  me-3 mb-3 ripple" style="width: 400; height: 250;">
                <img src="../Images/web_design back image.png" class="w-100 h-100" />
                <div class="mask text-light d-flex justify-content-center  flex-column text-center"
                    style="background-color: rgba(0, 0, 0, 0.5) ">
                    <a href="Categories.php" style="color:white;">
                        <h4>Web Design</h4>
                        <p class="m-0">100 Courses</p>
                    </a>
                </div>
            </div>

            <div class="bg-image  me-3 mb-3 ripple" style="width: 400; height: 250;">
                <img src="../Images/web_design back image.png" class="w-100 h-100" />
                <div class="mask text-light d-flex justify-content-center  flex-column text-center"
                    style="background-color: rgba(0, 0, 0, 0.5) ">
                    <a href="Categories.php" style="color:white;">
                        <h4>Web Design</h4>
                        <p class="m-0">100 Courses</p>
                    </a>
                </div>
            </div>

            <div class="bg-image  me-3 mb-3 ripple" style="width: 400; height: 250;">
                <img src="../Images/web_design back image.png" class="w-100 h-100" />
                <div class="mask text-light d-flex justify-content-center  flex-column text-center"
                    style="background-color: rgba(0, 0, 0, 0.5) ">
                    <a href="categories.php" style="color:white;">
                        <h4>Web Design</h4>
                        <p class="m-0">100 Courses</p>
                    </a>
                </div>
            </div>

            <div class="bg-image  me-3 mb-3 ripple" style="width: 400; height: 250;">
                <img src="../Images/web_design back image.png" class="w-100 h-100" />
                <div class="mask text-light d-flex justify-content-center  flex-column text-center"
                    style="background-color: rgba(0, 0, 0, 0.5) ">
                    <a href="categories.php" style="color:white;">
                        <h4>Web Design</h4>
                        <p class="m-0">100 Courses</p>
                    </a>
                </div>
            </div>




        </div>

        <div class="d-flex flex-wrap flex-sm-nowrap ">

            <div class="bg-image  me-3 mb-3 ripple" style="width: 400; height: 250;">
                <img src="../Images/web_design back image.png" class="w-100 h-100" />
                <div class="mask text-light d-flex justify-content-center  flex-column text-center"
                    style="background-color: rgba(0, 0, 0, 0.5) ">
                    <h4>Web Design</h4>
                    <p class="m-0">100 Courses</p>
                </div>
            </div>

            <div class="bg-image  me-3 mb-3 ripple" style="width: 400; height: 250;">
                <img src="../Images/devolopment back image.png" class="w-100 h-100" />
                <div class="mask text-light d-flex justify-content-center flex-column text-center"
                    style="background-color: rgba(0, 0, 0, 0.5) ">
                    <h4>Devolopment</h4>
                    <p class="m-0">100 Courses</p>
                </div>
            </div>

            <div class="bg-image  me-3 mb-3 ripple" style="width: 400; height: 250;">
                <img src="../Images/marketing back image.png" class="w-100 h-100" />
                <div class="mask text-light d-flex justify-content-center flex-column text-center"
                    style="background-color: rgba(0, 0, 0, 0.5) ">
                    <h4>Martketing</h4>
                    <p class="m-0">200 Courses</p>
                </div>
            </div>

            <div class="bg-image  me-3 mb-3 ripple" style="width: 400; height: 250;">
                <img src="../Images/Ceo back image.png" class="w-100 h-100" />
                <div class="mask text-light d-flex justify-content-center flex-column text-center"
                    style="background-color: rgba(0, 0, 0, 0.5) ">
                    <h4>Ceo</h4>
                    <p class="m-0">500 Courses</p>
                </div>
            </div>


        </div>
    </div>

    <!-- Testimonials section -->
    <section style="color: #000; background-color: #EBEFF4;">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-xl-8 text-center">
                    <h3 class="fw-bold mb-4">What Our Students Says About Us</h3>
                    <p class="mb-4 pb-2 mb-md-5 pb-md-0">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet
                        numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum
                        quisquam eum porro a pariatur veniam.
                    </p>
                </div>
            </div>


            <div class="row text-center">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card">
                        <div class="card-body py-4 mt-2">
                            <div class="d-flex justify-content-center mb-4">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp"
                                    class="rounded-circle shadow-1-strong" width="100" height="100" />
                            </div>
                            <h5 class="font-weight-bold">Teresa May</h5>
                            <h6 class="font-weight-bold my-3">Founder at ET Company</h6>
                            <ul class="list-unstyled d-flex justify-content-center">
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star-half-alt fa-sm text-info"></i>
                                </li>
                            </ul>
                            <p class="mb-2">
                                <i class="fas fa-quote-left pe-2"></i>Lorem ipsum dolor sit amet,
                                consectetur adipisicing elit. Quod eos id officiis hic tenetur quae
                                quaerat
                                ad velit ab hic tenetur.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card">
                        <div class="card-body py-4 mt-2">
                            <div class="d-flex justify-content-center mb-4">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(15).webp"
                                    class="rounded-circle shadow-1-strong" width="100" height="100" />
                            </div>
                            <h5 class="font-weight-bold">Maggie McLoan</h5>
                            <h6 class="font-weight-bold my-3">Photographer at Studio LA</h6>
                            <ul class="list-unstyled d-flex justify-content-center">
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                            </ul>
                            <p class="mb-2">
                                <i class="fas fa-quote-left pe-2"></i>Autem, totam debitis suscipit
                                saepe
                                sapiente magnam officiis quaerat necessitatibus odio assumenda
                                perferendis
                                labore laboriosam.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="card">
                        <div class="card-body py-4 mt-2">
                            <div class="d-flex justify-content-center mb-4">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(17).webp"
                                    class="rounded-circle shadow-1-strong" width="100" height="100" />
                            </div>
                            <h5 class="font-weight-bold">Alexa Horwitz</h5>
                            <h6 class="font-weight-bold my-3">Front-end Developer in NY</h6>
                            <ul class="list-unstyled d-flex justify-content-center">
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="far fa-star fa-sm text-info"></i>
                                </li>
                            </ul>
                            <p class="mb-2">
                                <i class="fas fa-quote-left pe-2"></i>Cras sit amet nibh libero, in
                                gravida
                                nulla metus scelerisque ante sollicitudin commodo cras purus odio,
                                vestibulum in tempus viverra turpis.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Start Video -->
    <div class="video container-fluid py-5  p-5" style="width: 100%;">
        <video autoplay muted loop>
            <source src="../Images/canva-blue-clean-minimalist-online-education-youtube-video-ad-pzKSOrWMo8Y.mp4" type="video/mp4" />
        </video>

    </div>
    <!-- End Video -->

    <!-- Start Features -->
    <div class="features">
        <div class="container">
            <div class="feat">
                <i class="fa-solid fa-person-chalkboard" style="font-size: 40px;"></i>
                <h3>Experienced mentor</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate
                    iusto eaque eos neque saepe, molestias sequi quaerat quam nostrum
                </p>
            </div>
            <div class="feat">
                <i class="fa-solid fa-headphones" style="font-size: 40px;"></i>
                <h3>Dedicated Support</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate
                    iusto eaque eos neque saepe, molestias sequi quaerat quam nostrum
                </p>
            </div>
            <div class="feat">
                <i class="fa-solid fa-mobile-screen-button" style="font-size: 40px;"></i>
                <h3>Digital learning</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate
                    iusto eaque eos neque saepe, molestias sequi quaerat quam nostrum
                </p>
            </div>
            <div class="feat">
                <i class="fa-solid fa-certificate" style="font-size: 40px;"></i>
                <h3>Global Certificate</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate
                    iusto eaque eos neque saepe, molestias sequi quaerat quam nostrum
                </p>
            </div>
        </div>
    </div>
    <!-- End   Features -->

    <!-- Footer -->
    <?php include "Partials/Bottom-Nav.php" ?>


    <!-- Load library from the CDN -->
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>

    <!-- Setup and start animation! -->
    <script>
    const typedTextSpan = document.querySelector(".typed-text");
    const cursorSpan = document.querySelector(".cursor");

    const textArray = ["Arab Data Hub"];
    const typingDelay = 400;
    const erasingDelay = 40;
    const newTextDelay = 500; // Delay between current and next text
    let textArrayIndex = 0;
    let charIndex = 0;

    function type() {
        if (charIndex < textArray[textArrayIndex].length) {
            if (!cursorSpan.classList.contains("typing")) cursorSpan.classList.add("typing");
            typedTextSpan.textContent += textArray[textArrayIndex].charAt(charIndex);
            charIndex++;
            setTimeout(type, typingDelay);
        } else {
            cursorSpan.classList.remove("typing");
            setTimeout(erase, newTextDelay);
        }
    }

    function erase() {
        if (charIndex > 0) {
            // add class 'typing' if there's none
            if (!cursorSpan.classList.contains("typing")) {
                cursorSpan.classList.add("typing");
            }
            typedTextSpan.textContent = textArray[textArrayIndex].substring(0, 0);
            charIndex--;
            setTimeout(erase, erasingDelay);
        } else {
            cursorSpan.classList.remove("typing");
            textArrayIndex++;
            if (textArrayIndex >= textArray.length) textArrayIndex = 0;
            setTimeout(type, typingDelay);
        }
    }

    document.addEventListener("DOMContentLoaded", function() { // On DOM Load initiate the effect
        if (textArray.length) setTimeout(type, newTextDelay + 250);
    });
    </script>
    <script src="../js/Loaders.js"></script>
    <!-- MDB -->
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"
    >
    </script>




    </script>
</body>

</html>