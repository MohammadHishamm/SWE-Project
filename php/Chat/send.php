<?php
session_start();
include "../dbh.inc.php";

if (isset($_GET['q'])) 
{
    $q = $_GET['q'];
    $id = $_GET['id'];


    $Time =  date("M,d,Y h:i:s A") . "\n";
    $Message_id_from=htmlspecialchars($_SESSION['ID']);
	$Message_id_to=htmlspecialchars($id);
	$Message=htmlspecialchars($q);
	$Seen=htmlspecialchars("FALSE");
    
	$sql="insert into chat(Message,Time,Message_id_from,Message_id_to,Seen) 
	values('$Message','$Time','$Message_id_from','$Message_id_to','$Seen')";
	$result=mysqli_query($conn,$sql);


}





?>