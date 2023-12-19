<?php



?>


<!DOCTYPE php>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Courses</title>
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/framework.css" />
  <link rel="stylesheet" href="css/master.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
  <div class="page d-flex">
    <div class="sidebar bg-white p-20 p-relative">
      <h3 class="p-relative txt-c mt-0">Arab Data Hub</h3>
      <ul>
        <li>
          <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="index.php">
            <i class="fa-regular fa-chart-bar fa-fw"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="settings.php">
            <i class="fa-solid fa-gear fa-fw"></i>
            <span>Settings</span>
          </a>
        </li>
        <li>
          <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="profile.php">
            <i class="fa-regular fa-user fa-fw"></i>
            <span>Profile</span>
          </a>
        </li>
        <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="tutor.php">
                        <i class="fa-solid fa-diagram-project fa-fw"></i>
                        <span>Tutors requests</span>
                    </a>
                </li>
        <li>
          <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="courses.php">
            <i class="fa-solid fa-graduation-cap fa-fw"></i>
            <span>Courses</span>
          </a>
        </li>
        <li>
        <form>
                    <a type="submit" class="d-flex align-center fs-14 c-black rad-6 p-10" name="get_users">
                         <i class="fa-regular fa-circle-user fa-fw"></i>
                        <span>Users</span>
                    </a>
            </form>
        </li>
        
        
      </ul>
    </div>
    <div class="content w-full">
      <!-- Start Head -->
      <div class="head bg-white p-15 between-flex">
        <div class="search p-relative">
          <input class="p-10" type="search" placeholder="Type A Keyword" />
        </div>
        <div class="icons d-flex align-center">
          <span class="notification p-relative">
            <i class="fa-regular fa-bell fa-lg"></i>
          </span>
          <img src="imgs/avatar.png" alt="" />
        </div>
      </div>
      <!-- End Head -->


      <h1 class="p-relative">Courses</h1>
      
      <div class="courses-page d-grid m-20 gap-20">
      <?php
$select_courses = $playlist->get_All_playlists();

      if ($select_courses->rowCount() > 0) {
        while ($fetch_course = $select_courses->fetch(PDO::FETCH_ASSOC)) {
        $course_id = $fetch_course['playlist_id'];

        $count_videos = $playlist->get_connect()->prepare("SELECT * FROM `content` WHERE playlist_id = ?");
        $count_videos->execute([$course_id]);
        $total_videos = $count_videos->rowCount();
?>
        <div class="course bg-white rad-6 p-relative">
            <img class="cover" src="../teacher/uploaded_files/<?= $fetch_course['thumb']; ?>" alt="" />

            <div class="p-20">
                <h4 class="m-0"><?= $fetch_course['title']; ?></h4>
                <p class="description c-grey mt-15 fs-14">
                    <?= $fetch_course['description']; ?>
                </p>
            </div>

            <div class="info p-15 p-relative between-flex">
                <span class="title bg-blue c-white btn-shape">Course Info</span>
                
                <?php
           $playlistApprove = $fetch_course['playlist_approval'];
          ?>

            <?php if ($playlistApprove === 'True'): ?>
            <h4><span class="label label-success">Approved</span></h4>
            <?php elseif ($playlistApprove === 'False'): ?>
            <h4><a class="label label-danger" href="?approve_playlist=<?= $fetch_course['playlist_id']; ?>">Disapproved</a></h4>
              <?php endif; ?>



                <?php
                if (isset($_GET['approve_playlist']) && $_GET['approve_playlist'] == $fetch_course['playlist_id']) {
                    $playlist_id = $fetch_course['playlist_id'];
                    $playlist->approve_playlist($playlist_id);
                }
                ?>
            </div>
        </div>
<?php
    }
} else {
    echo '<p class="empty">No courses added yet!</p>';
}
?>

</div>

         
       
      </div>
    </div>
  </div>
</body>

</html>