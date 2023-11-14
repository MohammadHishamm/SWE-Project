<!DOCTYPE html>
<html lang="en">
<?php
include "../dbh.inc.php";
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <link rel="stylesheet" href="../../css/Sidenav.css">
    <link rel="stylesheet" href="../../css/MDB css/mdb.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<script>




        height_after = 0;
        
        function Loadside() {
            setInterval(function()  {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtlist").innerHTML = this.responseText;
                }
                };
            xmlhttp.open("GET", "loadside.php" , true);
            xmlhttp.send();
              
            
             }, 1000);
        


         }
         Loadside();


        function play_mosa()
        {
            document.getElementById("audio").play();
        }
       

        function send_message(id) {
            str = document.getElementById('message').value;
            if(str.length > 0) {
                document.getElementById('message').value = "";
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("POST", "send.php?q=" + str + '& id=' + id  , true);
                xmlhttp.send();
            
                document.getElementById("audio").play();
            }
        }


        function Load() {
            setInterval(function()  {
            $id = <?php if(isset($_GET['id'])){echo $_GET['id'];}else{echo "0";} ?>;
            if($id != 0 )
            {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function () {
                if (this.readyState == 4 && this.status == 200) {
                    height_before = document.getElementById("txtHint").scrollHeight;
                    if(height_after != height_before ||  height_after==0)
                    {
                        height_after = height_before;
                        document.getElementById("txtHint").scrollTop = document.getElementById("txtHint").scrollHeight;
                    }
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
                };
                xmlhttp.open("GET", "load.php?id=" + $id   , true);
                xmlhttp.send();
            }
             }, 2000);


         }
         Load();





    function myFunction(event)
    {
        if (event.keyCode === 13) {
        send_message('<?php if(!empty($_GET['id'])){echo $_GET['id']; }?>');
        }
    }

     </script>
     
<body onload = 'Load()'>
    <?php include "../Topnav.php" ?>
    <?php include "../Sidenav.php" ?>
    <audio src="message_sent.mp3" id="audio"></audio>
    <audio src="reiciving_message.mp3" id="audio2"></audio>
    <section >
        <div class="container py-5 rounded-3 shadow m-5 mx-auto"  style="height: fit-content;">

            <div class="row">

                <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">

                    <h5 class="font-weight-bold mb-3 text-center text-lg-start">Member</h5>

                    <div class="card">
                        <div class="card-body">

                            <ul class="list-unstyled mb-0" id="txtlist">

                            </ul>

                        </div>
                    </div>

                </div>

                <div class="col-md-6 col-lg-7 col-xl-8 " >
                    <?php
                         if(!empty($_GET['id']) && $_GET['id']!= $_SESSION["ID"])
                         {
                         $sql="Select * from users where id = $_GET[id]";
                         $result = mysqli_query($conn,$sql);
                       
                     
                         if (mysqli_num_rows($result) > 0) {
                         while($row=mysqli_fetch_array($result))	
                         {
                             echo "
                             <div class='p-2 border-bottom' style='background-color: #eee;'>
                             <a href='profile_view.php?id=$row[0]'  class='d-flex justify-content-between'>
                                 <div class='d-flex flex-row'>
                                 <img class='rounded-4 shadow-4' src='my phot.jpeg' alt='Avatar' style='width: 50px; height: 50px;'>
                                     <div class='pt-1 ps-4'>
                                         <p class='fw-bold mb-0'>$row[1]</p>
                                     </div>
                                 </div>
                                 <div class='pt-4 pe-3 '>
                                 ";
                                if($row[4]=="active")
                                {
                                    echo "
                                    <p class='text-success'>active</p>
                                    </div>
                                    </a>
                                    </div>
                                    ";
                                }
                                else
                                {
                                    echo "
                                    <p class='text-danger'>offline</p>
                                    </div>
                                    </a>
                                    </div>
                                    ";
                                }

                         }
                         }
                        }
                     ?>

                    <ul class="list-unstyled" id="txtHint" style="height: 300px; overflow-y: visible; overflow-x: hidden;">


                    </ul>
                    <div class="bg-white mb-3">
                            <div class="form-outline shadow">
                                <textarea class="form-control pt-5" id="message" rows="3" onkeydown="myFunction(event)" maxlength="150"></textarea>
                                <label class="form-label " for="message">Message</label>
                            </div>
                        </div>
                        <button type="button" onclick="send_message('<?php if(!empty($_GET['id'])){echo $_GET['id']; }?>')
                        "
                            class="btn btn-info btn-rounded float-end">Send</button>
                </div>

            </div>

        </div>
    </section>
    <?php include "../Bottomnav.php" ?>
</body>

</html>