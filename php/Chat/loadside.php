<?php
                                session_start();
                                include "../dbh.inc.php";
                                $sql="Select * from users";
                                $result = mysqli_query($conn,$sql);
                                
                                if (mysqli_num_rows($result) > 0) {
                                while($row=mysqli_fetch_array($result))	
                                {
                                    if($row[0] != $_SESSION["ID"] )
                                    {
                                        $id = $_SESSION['ID'] ;
                                        $sql2="Select Message,Time,Seen,Message_id_from from chat where Message_id_to = $row[0] and  Message_id_from = $id    or Message_id_from = $row[0] and Message_id_to = $id " ;
                                        $result2 = mysqli_query($conn,$sql2);
                                        $date = "";
                                        $last_message = "";
                                        $count = 0;
                                        while($row2 = mysqli_fetch_array($result2))
                                        {
                                            $date = $row2[1];
                                            $last_message = $row2[0];
                                            if($row2[2] == FALSE &&  $row2[3] == $row[0])
                                            {
                                                $count = $count + 1;
                                            }
                                        }

                                        echo "
                                        <li class='p-2 border-bottom' style='background-color: #eee;'>
                                        <a  href='chat.php?id=$row[0]' class='d-flex justify-content-between' >
                                            <div class='d-flex flex-row'>
                                            <div class='d-inline-flex position-relative me-2'>
                                            
                                            ";
                                                if($row[4] == "active")
                                                {
                                                    echo "
                                                    <span class='position-absolute top-0 start-100 translate-middle p-1 bg-success border border-light rounded-circle '>
                                                    <span class='visually-hidden'>New alerts</span>
                                                    </span>
                                                    ";
                                                }
                                                else
                                                {
                                                    echo "
                                                    <span class='position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle '>
                                                    <span class='visually-hidden'>New alerts</span>
                                                    </span>
                                                    ";       
                                                }
                                                
                                            echo "
                                          
                                            <img class='rounded-4 shadow-4' src='my phot.jpeg' alt='Avatar' style='width: 50px; height: 50px;'>
                                                </div>
                                                <div class='pt-1'>
                                                    <p class='fw-bold mb-0 '>$row[1]</p>
                                                    ";
                                                    if (strlen($last_message) > 50)
                                                     {
                                                        echo "<p class='text-wrap text-muted fs-6 ' style='width: 8rem;'>"; 
                                                        echo substr($last_message,0,25) ;
                                                        echo "....</p>";
                                                     }
                                                     else
                                                     {
                                                        echo "<p class='text-wrap text-muted fs-6 ' style='width: 8rem;'>$last_message</p>";         
                                                     }
                                            echo"
                                                </div>
                                            </div>
                                            <div class='pt-1'>
                                                <p class='small text-muted mb-1 text-wrap'>$date</p>
                                                ";
                                                if ($count>0 )
                                                {
                                                    echo "<span class='badge bg-danger float-end'>$count</span>";
                                                }
                                            echo "
                                            </div>
                                        </a>
                                        </li>
                                        ";  
                                    }

                                }
                                }
?>