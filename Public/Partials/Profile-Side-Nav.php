<?php
?>
<div class="col-lg-3">
    <div class=" mb-4 mb-lg-0">
        <div class=" p-0">
        <ul class="list-group">

<?php
if (isset($_SESSION['user_data'])) {
    foreach ($_SESSION['user_data'] as $key => $value) {
        $type = $value['type'];

        if ($type == 'Student' || $type == 'Admin') {
            ?>
            <li class="list-group-item d-flex justify-content-start align-items-start pt-3">
                <a href="Edit-Profile.php" class="btn btn-light mb-0 w-100 active" style="">Profile</a>
            </li>
            <li class="list-group-item d-flex justify-content-start align-items-start pt-3">
                <a href="Edit-Profile-Email.php" class="btn btn-light w-100 mb-0" style="">Account</a>
            </li>
            <li class="list-group-item d-flex justify-content-start align-items-start pt-3 w-100">
                <div class="dropdown w-100">
                    <a class="btn btn-light w-100 dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                       data-mdb-dropdown-init data-mdb-ripple-init aria-expanded="false">My Courses
                    </a>
                    <ul class="dropdown-menu w-100 text-center" aria-labelledby="dropdownMenuLink">
                      
                        <li><a class="dropdown-item" href="Control-Courses.php?action=view">View Courses</a></li>
                    </ul>
                </div>
            </li>
            <?php
        }
        else if($type=='Teacher')
        {
            ?>
            <li class="list-group-item d-flex justify-content-start align-items-start pt-3">
                <a href="Edit-Profile.php" class="btn btn-light mb-0 w-100 active" style="">Profile</a>
            </li>
            <li class="list-group-item d-flex justify-content-start align-items-start pt-3">
                <a href="Edit-Profile-Email.php" class="btn btn-light w-100 mb-0" style="">Account</a>
            </li>
            <li class="list-group-item d-flex justify-content-start align-items-start pt-3 w-100">
                <div class="dropdown w-100">
                    <a class="btn btn-light w-100 dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                       data-mdb-dropdown-init data-mdb-ripple-init aria-expanded="false">My Courses
                    </a>
                    <ul class="dropdown-menu w-100 text-center" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="Control-Courses.php?action=add">Add Courses</a></li>
                        <li><a class="dropdown-item" href="Control-Courses.php?action=view">View Courses</a></li>
                    </ul>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-start align-items-start pt-3 w-100">
                <div class="dropdown w-100">
                    <a class="btn btn-light w-100 dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                       data-mdb-dropdown-init data-mdb-ripple-init aria-expanded="false">My Content
                    </a>
                    <ul class="dropdown-menu w-100 text-center" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="Control-Content.php?action=add">Add Content</a></li>
                        <li><a class="dropdown-item" href="Control-Content.php?action=view">View Content</a></li>
                    </ul>
                </div>
            </li>
            <?php
        }
    }
}
?>

</ul>

        </div>
    </div>
</div>