<?php





include "dbh.inc.php";




if(isset($_POST["search"]))
{
$word = $_POST["search"];
$sql="Select * from course where Course_Name ='$word' ";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
while($row=mysqli_fetch_array($result))	
{
    
    echo " 

    <div class='col mb-3'>
          <div class='card' style='width: 300px;'>
            <div class='bg-image hover-overlay ripple' data-mdb-ripple-color='light'>
              <img src='../Images/111.webp' class='img-fluid'>
              <a href='#!'>
                <div class='mask' style='background-color: rgba(251, 251, 251, 0.15);'></div>
              </a>
            </div>
            <div class='card-body'>
              <div class='card-title'>
                <div class='row mb-3'>
                  <div class='col-7 d-flex justify-content-start align-items-center'>
                    <img src='../Images/avatar-2.webp' alt='Generic placeholder image; class='img-fluid rounded-circle border border-dark border-3' style='width: 40px;'>
                    <span class='ps-2' style='font-size: 13px;'>@ $row[2]</span>
                  </div>
                  <div class='col-5 d-flex justify-content-end align-items-center'>
                    <ul class='mb-0 list-unstyled d-flex flex-row  ' style='color: yellow;'>
                      <li>
                        <i class='fas fa-star fa-xs'></i>
                      </li>
                      <li>
                        <i class='fas fa-star fa-xs'></i>
                      </li>
                      <li>
                        <i class='fas fa-star fa-xs'></i>
                      </li>
                      <li>
                        <i class='fas fa-star fa-xs'></i>
                      </li>
                      <li>
                        <i class='fas fa-star fa-xs'></i>
                      </li>
                    </ul>
                  </div>
                </div>
                <p class='card-text mb-3'>Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p>
                <div>
                  <div class='d-flex align-items-center justify-content-between mb-3'>
                    <p class='small mb-0'><i class='far fa-clock me-2'></i>3 hrs</p>
                    <p class='fw-bold mb-0'>$90</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    
    ";
}
}
else
{
    echo "NO DATA ";
}
}
else
{


  if (isset($_GET['q'])) 
{
  $q = intval($_GET['q']);


  if ($q == -1) {
    $sql="Select * from course ";
    $result = mysqli_query($conn,$sql);
  }
  else
  {
    $sql="Select * from course where Category_ID = '".$q."' ";
    $result = mysqli_query($conn,$sql);
  }

if (mysqli_num_rows($result) > 0) {
  while($row=mysqli_fetch_array($result))	
  {
echo " 

<div class='col mb-3'>
      <div class='card' style='width: 300px;'>
        <div class='bg-image hover-overlay ripple' data-mdb-ripple-color='light'>
          <img src='../Images/111.webp' class='img-fluid'>
          <a href='#!'>
            <div class='mask' style='background-color: rgba(251, 251, 251, 0.15);'></div>
          </a>
        </div>
        <div class='card-body'>
          <div class='card-title'>
            <div class='row mb-3'>
              <div class='col-7 d-flex justify-content-start align-items-center'>
                <img src='../Images/avatar-2.webp' alt='Generic placeholder image; class='img-fluid rounded-circle border border-dark border-3' style='width: 40px;'>
                <span class='ps-2' style='font-size: 13px;'>@ $row[2]</span>
              </div>
              <div class='col-5 d-flex justify-content-end align-items-center'>
                <ul class='mb-0 list-unstyled d-flex flex-row  ' style='color: yellow;'>
                  <li>
                    <i class='fas fa-star fa-xs'></i>
                  </li>
                  <li>
                    <i class='fas fa-star fa-xs'></i>
                  </li>
                  <li>
                    <i class='fas fa-star fa-xs'></i>
                  </li>
                  <li>
                    <i class='fas fa-star fa-xs'></i>
                  </li>
                  <li>
                    <i class='fas fa-star fa-xs'></i>
                  </li>
                </ul>
              </div>
            </div>
            <p class='card-text mb-3'>Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <div>
              <div class='d-flex align-items-center justify-content-between mb-3'>
                <p class='small mb-0'><i class='far fa-clock me-2'></i>3 hrs</p>
                <p class='fw-bold mb-0'>$90</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

";
  }
}

}
else{
  $sql="Select * from course ";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    while($row=mysqli_fetch_array($result))	
{
    
    echo " 

    <div class='col mb-3'>
          <div class='card' style='width: 300px;'>
            <div class='bg-image hover-overlay ripple' data-mdb-ripple-color='light'>
              <img src='../Images/111.webp' class='img-fluid'>
              <a href=''>
                <div class='mask' style='background-color: rgba(251, 251, 251, 0.15);'></div>
              </a>
            </div>
            <div class='card-body'>
              <div class='card-title'>
                <div class='row mb-3'>
                  <div class='col-7 d-flex justify-content-start align-items-center'>
                    <img src='../Images/avatar-2.webp' alt='Generic placeholder image; class='img-fluid rounded-circle border border-dark border-3' style='width: 40px;'>
                    <span class='ps-2' style='font-size: 13px;'>@ $row[2]</span>
                  </div>
                  <div class='col-5 d-flex justify-content-end align-items-center'>
                    <ul class='mb-0 list-unstyled d-flex flex-row  ' style='color: yellow;'>
                      <li>
                        <i class='fas fa-star fa-xs'></i>
                      </li>
                      <li>
                        <i class='fas fa-star fa-xs'></i>
                      </li>
                      <li>
                        <i class='fas fa-star fa-xs'></i>
                      </li>
                      <li>
                        <i class='fas fa-star fa-xs'></i>
                      </li>
                      <li>
                        <i class='fas fa-star fa-xs'></i>
                      </li>
                    </ul>
                  </div>
                </div>
                <p class='card-text mb-3'>Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p>
                <div>
                  <div class='d-flex align-items-center justify-content-between mb-3'>
                    <p class='small mb-0'><i class='far fa-clock me-2'></i>3 hrs</p>
                    <p class='fw-bold mb-0'>$90</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    
    ";
}
}
}
}


?>



