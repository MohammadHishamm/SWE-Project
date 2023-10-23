

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Sign up</title>
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

    <link rel="stylesheet" href="../css/signup.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <!-- partial:index.partial.html -->
    <!-- Multi step form -->
    <section class="multi_step_form">
      <form action="" method="post" id="msform" >
        <!-- Tittle -->
        <div class="tittle">
          <h2>Registration Process</h2>
          <p>
            In order to use this service, you have to complete this Registration
            process
          </p>
        </div>
        <!-- progressbar -->
        <ul id="progressbar">
          <li class="active">Fill informations</li>

          <li>Verify phone number</li>
          <li>Verify payment</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
          <div class="question">
            <input type="text" required  name="FName"/>
            <label>First Name</label>
          </div>
          <div class="question">
            <input type="text" required name="LName" />
            <label>Last Name</label>
          </div>
          <div class="question">
            <input type="text" required name="Age" />
            <label>Age</label>
          </div>
          <div class="question">
            <input type="text" required  name="Email"/>
            <label>Email Address</label>
          </div>
          <div class="question">
            <input type="password" required  name="Password"/>
            <label> Password</label>
          </div>
          <div class="question">
            <input type="password" required name="confirmpass" />
            <label>Confirm password</label>
          </div>

          <button
            type="button"
            class="btn btn-danger action-button previous_button"
          >
            Back
          </button>
          <button type="button" class="btn btn-primary next action-button">
            Continue
          </button>
        </fieldset>

        <fieldset>
          <h3>Setup your phone</h3>
          <h6>We will send you a SMS. Input the code to verify.</h6>
          <div class="form-row">
            <div class="form-group col-md-6">
              <input
                type="tel"
                id="phone"
                class="form-control"
                placeholder="+880"
              />
            </div>
            <div class="form-group col-md-6">
              <input
                type="text"
                class="form-control"
                placeholder="1123456789"
                name="Phone"
              />
            </div>
          </div>
          <div class="verify">
            <button type="button" class="btn btn-primary">Send code</button>
          </div>
          <div class="done_text">
            <a href="#" class="don_icon"><i class="ion-android-done"></i></a>
            <h6>
              A secret code is sent to your phone. <br />Please enter it here.
            </h6>
          </div>
          <div class="code_group">
            <input
              type="text"
              class="form-control"
              placeholder="0"
              size="1"
              minlength="1"
              maxlength="1"
            />
            <input
              type="text"
              class="form-control"
              placeholder="0"
              size="1"
              minlength="1"
              maxlength="1"
            />
            <input
              type="text"
              class="form-control"
              placeholder="0"
              size="1"
              minlength="1"
              maxlength="1"
            />
            <input
              type="text"
              class="form-control"
              placeholder="0"
              size="1"
              minlength="1"
              maxlength="1"
            />
            <br />
            <label
              >If you didn't receive a code, re-press "Send code" button
            </label>
          </div>

          <button
            type="button"
            class="btn btn-danger action-button previous previous_button"
          >
            Back
          </button>
          <button
            type="button"
            class="btn btn-primary next action-button"
            id="visa"
          >
            Continue
          </button>
        </fieldset>
        <fieldset>
          <div class="container-fluid px-1 px-md-2 px-lg-4 py-5 mx-auto">
            <div class="row d-flex justify-content-center">
              <div class="col-xl-7 col-lg-8 col-md-9 col-sm-11">
                <div class="card border-0">
                  <div class="row justify-content-center"></div>
                  <div class="row">
                    <div class="col-sm-7 border-line pb-3">
                      <div class="form-group">
                        <p class="text-muted text-sm mb-0">Name on the card</p>
                        <input
                          type="text"
                          name="name"
                          placeholder="Name"
                          size="15"
                        />
                      </div>
                      <div class="form-group">
                        <p class="text-muted text-sm mb-0">Card Number</p>
                        <div class="row px-3">
                          <input
                            type="text"
                            name="card-num"
                            placeholder="0000 0000 0000 0000"
                            size="18"
                            id="cr_no"
                            minlength="19"
                            maxlength="19"
                          />
                          <p class="mb-0 ml-3"></p>
                          <img
                            class="image ml-1"
                            src="https://i.imgur.com/WIAP9Ku.jpg"
                          />
                        </div>
                      </div>
                      <div class="form-group">
                        <p class="text-muted text-sm mb-0">Expiry date</p>
                        <input
                          type="text"
                          name="exp"
                          placeholder="MM/YY"
                          size="6"
                          id="exp"
                          minlength="5"
                          maxlength="5"
                        />
                      </div>
                      <div class="form-group">
                        <p class="text-muted text-sm mb-0">CVV/CVC</p>
                        <input
                          type="password"
                          name="cvv"
                          placeholder="000"
                          size="1"
                          minlength="3"
                          maxlength="3"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <button
            type="button"
            class="btn btn-danger action-button previous previous_button"
          >
            Back
          </button>
          <a href="Home.php"> <input type="submit" class="btn btn-primary action-button" value="Finish" name="Submit"> </a>
     
        </fieldset>
      </form>
    </section>
    <!-- End Multi step form -->
    <!-- partial -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/js/intlTelInput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <script src="../js/signup.js"></script>
  </body>
</html>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$DB = "SWE";

$conn = mysqli_connect($servername,$username,$password,$DB);


if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}



if($_SERVER["REQUEST_METHOD"]=="POST"){ 
	$Fname=htmlspecialchars($_POST["FName"]);
	$Lname=htmlspecialchars($_POST["LName"]);
	$Email=htmlspecialchars($_POST["Email"]);
	$Password=htmlspecialchars($_POST["Password"]);
	$Phone=htmlspecialchars($_POST["Phone"]);
  $Age=htmlspecialchars($_POST["Age"]);
  
	$sql="insert into users(FirstName,LastName,Email,Password,Phonenumber,Age) 
	values('$Fname','$Lname','$Email','$Password','$Phone','$Age')";
	$result=mysqli_query($conn,$sql);

  
	if($result)	{
		//done popup
	}
  else{
   //error popup 
  }
}










?>