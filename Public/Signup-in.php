<?php
define('__ROOT__', "../app/");
include_once "../php/chat/vendor/autoload.php";
?>
    <?php
    require_once('../app/controller/usercontroller.php');
    require_once('../app/model/user.php');
    require_once('../app/view/viewuser.php');

    $google_client = new Google_Client();
    $model = new User();
    $controller = new UsersController($model);
    $view = new ViewUser($controller, $model);

   

    $google_client->setClientId('608036531258-jf1jd39drma700qpka2ir6ovult420fl.apps.googleusercontent.com'); //Define your ClientID

    $google_client->setClientSecret('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'); //Define your Client Secret Key
  
    $google_client->setRedirectUri('http://localhost/SWE-PROJECT/public/Signup-in.php'); //Define your Redirect Uri

    $google_client->addScope('email');

    $google_client->addScope('profile');

    if(isset($_GET["code"]) ) 
    {

        
   
         $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

        if(!isset($token["error"]))
        {

            $google_client->setAccessToken($token['access_token']);

            $_SESSION['access_token']=$token['access_token'];

            $google_service = new Google_Service_Oauth2($google_client);

            $data = $google_service->userinfo->get();


            // print_r($data);

            $_POST['user_name']=$data['given_name'] . " " . $data['family_name'];
            $_POST['user_email']=$data['email'];
            $_POST['user_img']=$data['picture'];
            

            $controller->signup_with_google();
       
            // echo $token['error'];
        }


    }

    if(!isset($_SESSION["user_data"]))
    {  
        if (isset($_POST["register"])) {
            $controller->signup();
        }
    
        if (isset($_POST["login"])) {
          $controller->signin();
    
        }
    }
    else
    {
        $_SESSION["error_message"] = "You already signed in !";
        header('location:index.php');
    }


    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/signuppage.css" />
    
    <title>Sign in & Sign up Form</title>
</head>

<script>
function showToast() {

    x = document.getElementById("Audio");

    x.play();

    document.getElementById('toast').classList.add('show');

    setTimeout(function() {
        document.getElementById('toast').classList.remove('show');
    }, 5000);

}
</script>

<body>


    <?php if(isset($_SESSION['error_message'])){  ?>
    <div class="toast fade fixed-bottom shadow border border-3 me-5 mb-5 ms-auto " id="toast">
        <div class="toast-header ">
            <strong class="me-auto">Arab Data Hub</strong>
            <small>Notfication</small>
        </div>
        <div class="toast-body text-danger"><?= $_SESSION['error_message'] ?></div>
    </div>
    <script>
    showToast();
    </script>
    <?php unset($_SESSION['error_message']); } ?>


    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <!-- Sign in -->
                <?= $view->signinForm(); ?>
                <!-- Sign up -->
                <?= $view->signupForm($google_client); ?>

            </div>
        </div>




        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
                        ex ratione. Aliquid!
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button>
                </div>

            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                        laboriosam ad deleniti.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                <img src="img/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="../js/sign-up.js"></script>


</body>

</html>