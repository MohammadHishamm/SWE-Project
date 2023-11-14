<?php
                                session_start();
                                include "../dbh.inc.php";
                                $sql="Select * from chat";
                                
                                $result = mysqli_query($conn,$sql);
                                $flag = FALSE; 
                                if (isset($_GET['id'])&& $_GET['id']!=$_SESSION["ID"]) {
                                    $sql2 = "update chat set Seen='TRUE' where Message_id_from = " .$_GET['id'] ;
                                    mysqli_query($conn,$sql2);
                                    if (mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_array($result))	
                                        {
                                            if($row[3] == $_GET['id'] && $row[2] == $_SESSION["ID"])
                                            {
                                                echo "
                                                <li class='d-flex justify-content-between mb-4'  >
                                                <class='rounded-circle d-flex align-self-start me-3 shadow-1-strong' width='60'>
                                                <div class='card ' style='background-color: rgb(235, 239, 244);'>
                                                <div class='card-header d-flex justify-content-between p-3'>
                                                <p class='fw-bold mb-0 pe-5'>mark</p>
                                                <p class='text-muted small mb-0'>$row[1]</p>
                                                </div>
                                                <div class='card-body'>
                                                <p class='text-wrap text-muted fs-6' style='width: 18rem;'>
                                                    $row[0]
                                                </p>
                                                ";
                                                if ($row[4] == "TRUE")
                                                {
                                                    echo "<p
                                                     class='d-flex justify-content-end  small text-primary'>
                                                     <i class='fa-solid fa-check-double ps-4'></i> 
                                                    </p>";
                                                }
                                                else
                                                {
                                                    echo "<p 
                                                    class='d-flex justify-content-end  small text-secondry' >
                                                    <i class='fa-solid fa-check ps-4'></i>
                                                    </p>
                                                    ";

                                                }
                                                echo "
                                                </div>
                                                </div>
                                                </li>";

                                                $flag = TRUE;
                                            }
                                            elseif ($row[3] == $_SESSION["ID"] && $row[2] == $_GET['id'])
                                            {
                                                echo "
                                                <li class='d-flex justify-content-end mb-4'>
                                                <class='rounded-circle d-flex align-self-end me-3 shadow-1-strong' width='60'>
                                                <div class='card '>
                                                <div class='card-header d-flex justify-content-between p-3'>
                                                <p class='fw-bold mb-0' >YOU </p>
                                                <p class='text-muted small mb-0'>$row[1]</p>
                                                </div>
                                                <div class='card-body'>
                                                <p class='text-wrap text-muted fs-6' style='width: 18rem;'>
                                                $row[0]
                                                </p>
                                                ";
                                                if ($row[4] == "TRUE")
                                                {
                                                    
                                                    echo "<p
                                                     class='d-flex justify-content-end  small text-primary'>
                                                     <i class='fa-solid fa-check-double ps-4'></i> 
                                                    </p>";
                                                }
                                                else
                                                {
                                                    echo "<p 
                                                    class='d-flex justify-content-end  small text-secondry'>
                                                    <i class='fa-solid fa-check ps-4'></i>
                                                    </p>";
                                                }
                                                echo "
                                                </div>
                                                </div>
                                                </li>";
                                                $flag = TRUE;
                                            }
                                      
                                        }

                                        }
                                        
                                        if (!$flag ) {
                                            echo "no messages"; 
                                        } 
                                        
                                }

                        ?>