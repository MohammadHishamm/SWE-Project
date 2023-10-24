<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Files</title>
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/framework.css" />
  <link rel="stylesheet" href="css/master.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
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
          <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="projects.php">
            <i class="fa-solid fa-diagram-project fa-fw"></i>
            <span>Projects</span>
          </a>
        </li>
        <li>
          <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="courses.php">
            <i class="fa-solid fa-graduation-cap fa-fw"></i>
            <span>Courses</span>
          </a>
        </li>
        <li>
          <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="friends.php">
            <i class="fa-regular fa-circle-user fa-fw"></i>
            <span>Users</span>
          </a>
        </li>
        <li>
          <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="files.php">
            <i class="fa-regular fa-file fa-fw"></i>
            <span>Files</span>
          </a>
        </li>
        <li>
          <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="plans.php">
            <i class="fa-regular fa-credit-card fa-fw"></i>
            <span>Plans</span>
          </a>
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
      <h1 class="p-relative">Files</h1>
      <div class="files-page d-flex m-20 gap-20">
        <div class="files-stats p-20 bg-white rad-10">
          <h2 class="mt-0 mb-15 txt-c-mobile">Files Statistics</h2>

          <div class="d-flex align-center border-eee p-10 rad-6 mb-15 fs-13">
            <i class="fa-regular fa-file-pdf fa-lg blue center-flex c-blue icon"></i>
            <div class="info">
              <span>PDF Files</span>
              <span class="c-grey d-block mt-5">130</span>
            </div>
            <div class="size c-grey">6.5GB</div>
          </div>

          <div class="d-flex align-center border-eee p-10 rad-6 mb-15 fs-13">
            <i class="fa-regular fa-images fa-lg green center-flex c-green icon"></i>
            <div class="info">
              <span>Images</span>
              <span class="c-grey d-block mt-5">115 Files</span>
            </div>
            <div class="size c-grey">3.5GB</div>
          </div>

          <div class="d-flex align-center border-eee p-10 rad-6 mb-15 fs-13">
            <i class="fa-regular fa-file-word fa-lg red center-flex c-red icon"></i>
            <div class="info">
              <span>Word Files</span>
              <span class="c-grey d-block mt-5">110 Files</span>
            </div>
            <div class="size c-grey">3.2GB</div>
          </div>

          <div class="d-flex align-center border-eee p-10 rad-6 fs-13">
            <i class="fa-solid fa-file-csv fa-lg orange center-flex c-orange icon"></i>
            <div class="info">
              <span>CSV Files</span>
              <span class="c-grey d-block mt-5">99 Files</span>
            </div>
            <div class="size c-grey">2.9GB</div>
          </div>
          <a class="upload bg-blue c-white fs-13 rad-6 d-block w-fit" href="#">
            <i class="fa-solid fa-angles-up mr-10"></i>
            Upload
          </a>
        </div>
        <div class="files-content d-grid gap-20">
          <div class="file bg-white p-10 rad-10">
            <i class="fa-solid fa-download c-grey p-absolute"></i>
            <div class="icon txt-c">
              <img class="mt-15 mb-15" src="imgs/pdf.svg" alt="" />
            </div>
            <div class="txt-c mb-10 fs-14">my-file.pdf</div>
            <p class="c-grey fs-13">Arab Data Hub</p>
            <div class="info between-flex mt-10 pt-10 fs-13 c-grey">
              <span>20/06/2020</span>
              <span>5.5MB</span>
            </div>
          </div>
          <div class="file bg-white p-10 rad-10">
            <i class="fa-solid fa-download c-grey p-absolute"></i>
            <div class="icon txt-c">
              <img class="mt-15 mb-15" src="imgs/avi.svg" alt="" />
            </div>
            <div class="txt-c mb-10 fs-14">my-file.avi</div>
            <p class="c-grey fs-13">Admin</p>
            <div class="info between-flex mt-10 pt-10 fs-13 c-grey">
              <span>16/5/2021</span>
              <span>12.5MB</span>
            </div>
          </div>
          <div class="file bg-white p-10 rad-10">
            <i class="fa-solid fa-download c-grey p-absolute"></i>
            <div class="icon txt-c">
              <img class="mt-15 mb-15" src="imgs/eps.svg" alt="" />
            </div>
            <div class="txt-c mb-10 fs-14">my-file.eps</div>
            <p class="c-grey fs-13">Uploader</p>
            <div class="info between-flex mt-10 pt-10 fs-13 c-grey">
              <span>16/5/2021</span>
              <span>2.7MB</span>
            </div>
          </div>
          <div class="file bg-white p-10 rad-10">
            <i class="fa-solid fa-download c-grey p-absolute"></i>
            <div class="icon txt-c">
              <img class="mt-15 mb-15" src="imgs/psd.svg" alt="" />
            </div>
            <div class="txt-c mb-10 fs-14">my-file.psd</div>
            <p class="c-grey fs-13">Mark</p>
            <div class="info between-flex mt-10 pt-10 fs-13 c-grey">
              <span>16/5/2021</span>
              <span>15.1MB</span>
            </div>
          </div>





          
        </div>
      </div>
    </div>
  </div>
</body>

</html>