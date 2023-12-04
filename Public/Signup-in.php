<?php
define('__ROOT__', "../app/");
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

<body>
    <?php
    require_once('../app/controller/usercontroller.php');
    require_once('../app/model/user.php');
    require_once('../app/view/viewuser.php');

    $model = new User();
    $controller = new UsersController($model);
    $view = new ViewUser($controller, $model);

    foreach($_SESSION['user_data'] as $key => $value)
         {
           $User_ID = $value['id'];
         }  
        
         
    if(!isset($User_ID))
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
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <!-- Sign in -->
                <?= $view->signinForm(); ?>
                <!-- Sign up -->
                <?= $view->signupForm(); ?>
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