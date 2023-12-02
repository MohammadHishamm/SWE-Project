<?php
define('__ROOT__', "../app/");
require_once('../app/controller/tutorcontroller.php');
require_once('../app/model/tutor.php');
// require_once('../app/view/viewuser.php');

$tutormodel = new tutor();
$tutorcontroller = new TutorsController($tutormodel);


if (isset($_POST['submit']))
{
    $tutorcontroller->Add_Tutor();
}




?>

<!DOCTYPE html>
<html lang="en">
<style>
.error {
    color: #FF0001;
    text-align: left;
    padding-right: 300px;
    width: 300px
}

.qual {
    margin-left: 5px;
    width: 300px
}
</style>

<head>
    <meta charset="UTF-8" />
    <title>Teacher form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/css/intlTelInput.css" />
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" />

    <link rel="stylesheet" href="../css/teacherform.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
</head>

<body>
    <!-- partial:index.partial.html -->
    <!-- Multi step form -->
    <section class="multi_step_form">
        <form  method="post"  enctype="multipart/form-data">
            <!-- Tittle -->
            <div class="tittle">
                <h2>Become a teacher with us!</h2>
                <p>
                    In order to be a teacher, you have to complete this form process
                </p>
            </div>

            <!-- fieldsets -->
            <fieldset>
                <h5>Choose your gender:</h5>
                <div class="container">
                    <input type="radio" id="male" name="gender" />
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" />
                    <label for="female">Female</label>
                    <br />

                </div>
           
                <tr>

                    <h5>Qualification:</h5>

                    <textarea name="Qualification" rows="10" cols="50"></textarea>

                    <br>
    

                    <h5>Subjects you can teach:</h5>

                    <div class="inputs-set" id="email-list" class="input-field">
                        <div class="email-input__w">
                            <input class="input-field" type="text" name="field" />
                            <button class="btn-add-input" onclick="addEmailField()" type="button">
                                +
                            </button>
                        </div>
                    </div>
    
                    <br />
                    <h5>Upload your CV here (required):</h5>
                    <br />

                   
                            <input type="text" class="form-control"
                                   placeholder="Enter your name" name="name">
                        </div>                                  
                        <div class="form-group">
                            <input type="file" name="pdf_file"
                                   class="form-control" accept=".pdf" required/>
                        </div>
                    <!-- <div class="cvup">
                        <input type="file" name="cv" />
                    </div> -->
                    <br />
        
                    <h5>Additional comment:</h5>
                    <textarea name="Qualification" rows="10" cols="50"></textarea>
                    <br />
                    <br />

                    <h6>
                        <input name="agree" type="checkbox" checked=" " /> I agree to the
                        <a href="#" id="input">terms and conditions</a>
             
                    </h6>

                    <br />
                    <div class="row d-flex justify-content-center ">
                    <button type="button" class="btn btn-danger col-5 me-2 action-button previous ">
                        Back
                    </button>
                    <button type="submit" name="submit" href="#" class="btn col-5 btn-primary ">Submit</button>
                    </div>

                </tr>
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
    <script src="../js/teacherform.js"></script>
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</body>

</html>