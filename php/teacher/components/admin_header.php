<?php


if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}


   ?>




<header class="header">

   <section class="flex">

      <a href="dashboard.php" class="logo">Arab Data Hub</a>


      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
      </div>


   </section>

</header>

<!-- header section ends -->

<!-- side bar section starts  -->

<div class="side-bar">

   <div class="close-side-bar">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
       
   <?php
           
           
           require_once('../../User/user.php');
           $User = new User();
           $User->setUserId($tutor_id); 
           
           $Data = $User->get_user_by_id();
           if($Data->rowCount() > 0){
             while($fetch_user = $Data->fetch(PDO::FETCH_ASSOC)){
             
                 ?>
         <!-- <img src="../uploaded_files/" alt=""> -->
         <h3><?= $fetch_user['user_name']; ?></h3>
         <span><?= $fetch_user['user_type']; ?></span>
         <a href="update.php" class="btn">view profile</a>
         <?php }
      }?>
       
      </div>

   <nav class="navbar">
      <a href="dashboard.php"><i class="fas fa-home"></i><span>Analysis</span></a>
      <a href="playlists.php"><i class="fa-solid fa-bars-staggered"></i><span>Playlists</span></a>
      <a href="contents.php"><i class="fas fa-graduation-cap"></i><span>Contents</span></a>
      <a href="/SWE-PROJECT/php/home.php"><i class="fa-solid fa-left-long"></i><span>Back</span></a>
      
   </nav>

</div>

<!-- side bar section ends -->