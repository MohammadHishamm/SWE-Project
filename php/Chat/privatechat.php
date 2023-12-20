<?php 

//privatechat.php

// session_start();
define('__ROOT__', "../../app/");
require_once(__ROOT__ .'model/notify.php');
require_once(__ROOT__ . 'model/user.php');

if(!isset($_SESSION['user_data']))
{
	header('location:/SWE-PROJECT/public/signup-in.php');
}

$notify = new notify();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Chat application in php using web scocket programming</title>
    <!-- Bootstrap core CSS -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="vendor-front/bootstrap/bootstrap.min.css" rel="stylesheet">

    <link href="vendor-front/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="vendor-front/parsley/parsley.css" />

    <link rel="stylesheet" href="../../css/Sidenav.css">

    <link rel="stylesheet" href="../../css/MDB css/mdb.min.css">
    <link rel="stylesheet" href="../../css/All.css">


    <!-- Bootstrap core JavaScript -->
    <script src="vendor-front/jquery/jquery.min.js"></script>
    <script src="vendor-front/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor-front/jquery-easing/jquery.easing.min.js"></script>



    <script type="text/javascript" src="vendor-front/parsley/dist/parsley.min.js"></script>
    <style type="text/css">
    html,
    body {

        height: 100%;
        width: 100%;
        margin: 0;
    }

    #wrapper {
        display: flex;
        flex-flow: column;
        height: 100%;
    }

    #remaining {
        flex-grow: 1;
    }

    #messages {
        height: 200px;
        background: whitesmoke;
        overflow: auto;
    }

    #chat-room-frm {
        margin-top: 10px;
    }

    #user_list {
        height: 450px;
        overflow-y: auto;
        overflow-x: hidden;
    }

    #messages_area {
        height: 60vh;
        overflow-y: auto;
        overflow-x: hidden;
        /*background-color:#e6e6e6;*/
        /*background-color: #EDE6DE;*/
    }
    </style>
</head>

<body>
    <?php include "../../Public/Partials/Top-Nav.php" ?>
    <?php include "../../Public/Partials/Side-Nav.php" ?>
    <section class=" w-100 mb-10" style="height: fit-content;">
        <div class="container py-5 " >

            <div class="row" >

                <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">

                    <h5 class="font-weight-bold mb-3 text-center text-lg-start">Friends</h5>

                    <div class="card">
                        <div class="card-body">

                            <ul class="list-unstyled mb-0">
                                <?php
                                		$login_user_id = '';

                                        $token = '';
                                
                                        foreach($_SESSION['user_data'] as $key => $value)
                                        {
                                            $login_user_id = $value['id'];
                                
                                            $token = $value['token'];
                                        }

                                        $user_object = new User;

                                        $user_object->setUserId($login_user_id);
                        
                                        $user_data = $user_object->get_user_all_data_with_status_count();

                                        
                                        
                                        foreach($user_data as $key => $user)
                                        {
                                            if($user['user_id'] != $login_user_id)
                                            {
                                ?>
                                <li class="p-2 border-bottom select_user" style="background-color: #eee;"
                                    data-userid="<?=$user['user_id']?>">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row ">
                                            <img src="../../Images/users/<?php echo $user['user_img']; ?>" alt="avatar"
                                                class="rounded-circle d-flex align-self-center me-3  shadow-1-strong"
                                                width="40">
                                            <div class="pt-1 " style="margin-left: 10px;">
                                                <p class="fw-bold mb-0 "
                                                    id="list_user_name_<?php echo $user["user_id"]; ?>">
                                                    <?php echo $user['user_name']; ?></p>
                                                <p class="small text-muted"></p>
                                            </div>
                                        </div>
                                        <div class="pt-1">
                                            <p class="small text-muted mb-1"><?php
                                            if($user['user_login_status'])
                                            {
                                                echo "<span class='text-success'>Online</span>";
                                            }
                                            else
                                            {
                                                echo "<span class='text-danger'>Offline</span>";
                                            
                                            }
                                            ?> </p>
                                            <span class="badge bg-danger text-white  float-end"
                                                style="margin-left: 10px;"><?php echo $user['count_status'] ?></span>
                                        </div>
                                    </div>
                                </li>
                                <?php
                                            }
                                        }
                                ?>
                            </ul>
                            <input type="hidden" name="login_user_id" id="login_user_id"
                                value="<?php echo $login_user_id; ?>" />

                            <input type="hidden" name="is_active_chat" id="is_active_chat" value="No" />

                        </div>
                    </div>

                </div>

                <div class="col-md-6 col-lg-7 col-xl-8  " >

                    <div id="chat_area"  class="bg-white  " ></div>

                </div>

            </div>

        </div>
    </section>
    <?php include "../../Public/Partials/Bottom-Nav.php" ?>
</body>
<script type="text/javascript">
$(document).ready(function() {

    var receiver_userid = '';

    var conn = new WebSocket('ws://localhost:8080?token=<?php echo $token; ?>');
    console.log('WebSocket Token:', '<?php echo $token; ?>');


    conn.onopen = function(event) {
        console.log('Connection Established');
    };

    conn.onmessage = function(event) {
        var data = JSON.parse(event.data);

        if (data.status_type == 'Online') {
            $('#userstatus_' + data.user_id_status).html('<i class="fa fa-circle text-success"></i>');
        } else if (data.status_type == 'Offline') {
            $('#userstatus_' + data.user_id_status).html('<i class="fa fa-circle text-danger"></i>');
        } else {

            var row_class = '';
            var background_class = '';
            var text_class = '';
            if (data.from == 'Me') {
                row_class = 'row justify-content-end';
                background_class = 'bg-secondary';
                text_class = 'text-white';

            } else {
                row_class = 'row justify-content-start';
                background_class = 'bg-dark';
                text_class = 'text-white';

            }

            if (receiver_userid == data.userId || data.from == 'Me') {
                if ($('#is_active_chat').val() == 'Yes') {
                    var html_data = `
                    <li class="d-flex ` + row_class + `  mb-4     ">
                            <div class="card  ` + background_class + ` ` + text_class + ` " style="max-width: 400px;">
                                <div class="card-header d-flex justify-content-between p-3">
                                    <p class="fw-bold mb-0">` + data.from + `</p>
                                    <p class="` + text_class + ` small mb-0"><i class="far fa-clock"></i> ` + data
                        .datetime + `</p>
                                </div>
                                <div class="card-body ">
                                    <p class="mb-0">
                                    ` + data.msg + `
                                    </p>
                                </div>
                            </div>
                        </li>

						`;

                    $('#messages_area').append(html_data);

                    $('#messages_area').scrollTop($('#messages_area')[0].scrollHeight);

                    $('#chat_message').val("");
                }
            } else {
                var count_chat = $('#userid' + data.userId).text();

                if (count_chat == '') {
                    count_chat = 0;
                }

                count_chat++;

                $('#userid_' + data.userId).html('<span class="badge badge-danger badge-pill">' +
                    count_chat + '</span>');
            }
        }
    };

    conn.onclose = function(event) {
        console.log('Connection closed:', event);
    };



    function make_chat_area(user_name) {
        var html = `
   
        <div class="card-header d-flex justify-content-between p-3 ">
            <p class="fw-bold mb-0">Chatting with  <span class="text-primary fs-6">` + user_name + `</span></p>
        </div>
        <ul class="list-unstyled" >


                        <div class="card-body ms-2 me-2" id="messages_area">

                        </div>
        </ul>
        <form id="chat_form" method="POST" data-parsley-errors-container="#validation_error">
                        <div class=" mb-3 ps-3 pe-3 pb-3  row d-flex justify-content-center align-items-center">
                        <div class="col-10">
                        <textarea class="form-control " id="chat_message" name="chat_message" placeholder="Type Message Here" data-parsley-maxlength="1000" data-parsley-pattern="/^[a-zA-Z0-9 ]+$/" required></textarea>
                        </div>
                        <div class="col-2">   
                        <button type="submit" name="send" id="send" class="btn btn-primary  ">Send</button>
                        </div>   
                        </div>
                        <div id="validation_error"></div>
                       
        </form>
    
			`;

        $('#chat_area').html(html);

        $('#chat_form').parsley();
    }

    $(document).on('click', '.select_user', function() {

        receiver_userid = $(this).data('userid');

        var from_user_id = $('#login_user_id').val();

        var receiver_user_name = $('#list_user_name_' + receiver_userid).text();

        $('.select_user.active').removeClass('active');

        $(this).addClass('active');

        make_chat_area(receiver_user_name);

        $('#is_active_chat').val('Yes');

        $.ajax({
            url: "action.php",
            method: "POST",
            data: {
                action: 'fetch_chat',
                to_user_id: receiver_userid,
                from_user_id: from_user_id
            },
            dataType: "JSON",
            success: function(data) {
                if (data.length > 0) {
                    var html_data = '';

                    for (var count = 0; count < data.length; count++) {
                        var row_class = '';
                        var background_class = '';
                        var text_class = '';
                        var user_name = '';

                        if (data[count].from_user_id == from_user_id) {
                            row_class = 'row justify-content-end';

                            background_class = 'bg-secondary';
                            text_class = 'text-white';
                            user_name = 'Me';
                        } else {
                            row_class = 'row justify-content-start';

                            background_class = 'bg-dark';
                            text_class = 'text-white';
                            user_name = data[count].from_user_name;
                        }

                        html_data +=
                            `
                        <li class="d-flex ` + row_class + `  mb-4      ">
                            <div class="card   ` + background_class  + ` ` + text_class + ` " style="max-width: 400px;">
                                <div class="card-header d-flex justify-content-between p-3">
                                    <p class="fw-bold mb-0">` + user_name + `</p>
                                    <p class="` + text_class + ` small mb-0"><i class="far fa-clock"></i> ` + data[
                                count].timestamp + `</p>
                                </div>
                                <div class="card-body ">
                                    <p class="mb-0">
                                    ` + data[count].chat_message + `
                                    </p>
                                </div>
                            </div>
                        </li>
						`;
                    }

                    $('#userid_' + receiver_userid).html('');

                    $('#messages_area').html(html_data);

                    $('#messages_area').scrollTop($('#messages_area')[0].scrollHeight);
                }
            }
        })

    });

    $(document).on('click', '#close_chat_area', function() {

        $('#chat_area').html('');

        $('.select_user.active').removeClass('active');

        $('#is_active_chat').val('No');

        receiver_userid = '';

    });

    $(document).on('submit', '#chat_form', function(event) {
        event.preventDefault();

        if ($('#chat_form').parsley().isValid()) {
            var user_id = parseInt($('#login_user_id').val());
            var message = $('#chat_message').val();

            if (conn.readyState === WebSocket.OPEN) {
                var data = {
                    userId: user_id,
                    msg: message,
                    receiver_userid: receiver_userid,
                    command: 'private'
                };

                conn.send(JSON.stringify(data));
            } else {
                console.error('WebSocket connection is not open. Current readyState:', conn.readyState);
            }
        }
    });



    $('#logout').click(function() {
        var user_id = $('#login_user_id').val();

        $.ajax({
            url: "action.php",
            method: "POST",
            data: {
                user_id: user_id,
                action: 'leave'
            },
            success: function(data) {
                var response = JSON.parse(data);
                if (response.status == 1) {
                    // Check if the WebSocket connection is open before closing it
                    if (conn.readyState === WebSocket.OPEN) {
                        conn.close();
                    } else {
                        console.error('WebSocket connection is not open.');
                    }
                    location = '../home.php';
                }
            }
        });
    });




})
</script>

</html>