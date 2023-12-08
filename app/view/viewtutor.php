<?php

require_once(__ROOT__ . "View/View.php");

class ViewTutor extends View{	
	public function output(){
		$str="";
		$str.="<h1>Welcome ".$this->model->getName()."</h1>";
		$str.="<h5>Age: ".$this->model->getAge()."</h5>";
		$str.="<h5>Phone: ".$this->model->getPhone()."</h5>";
		$str.="<br><br>";
		$str.="<a href='profile.php?action=edit'>Edit Profile </a><br><br>";
		$str.="<a href='profile.php?action=movie'>My Movies </a><br><br>";
		$str.="<a href='profile.php?action=signOut'>SignOut </a><br><br>";
		$str.="<a href='profile.php?action=delete'>Delete Account </a>";
		return $str;
	}
	
	function show_courses(){
        foreach($_SESSION['user_data'] as $key => $value)
        {
           $tutor_id = $value['id'];
        }

echo '
<div class="col-lg-8 ">
<div class=" mb-4">
    <div class="">
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0" style="font-size: 1.5rem;"> Your Course</p>
            </div>
        </div>
        <hr>

        <section class="playlists">

            <div class="box-container">

                <div class="box" style="text-align: center;">
                    <h3 class="title" style="margin-bottom: .5rem;">create new
                        playlist</h3>
                    <a href="add_playlist.php" class="btn">add playlist</a>
                </div>';

$select_playlist = $this->model->get_All_playlist($tutor_id);
if($select_playlist->rowCount() > 0){
while($fetch_playlist = $select_playlist->fetch(PDO::FETCH_ASSOC)){
$playlist_id = $fetch_playlist['playlist_id'];
$total_videos = $this->model->get_videos_count($playlist_id);
echo'
<div class="box">
    <div class="flex">
    <div><i class="fas fa-circle-dot" style="
    
    if($fetch_playlist["status"] == "active")
    {
        echo "color:limegreen";
     }
    else
    {
        echo "color:red";
    } 
    
    ">
    </i><span style="if($fetch_playlist["status"] == "active"){echo "color:limegreen"; }else{echo "color:red";} ">'.$fetch_playlist['status'].'</span></div>
    <div><i class="fas fa-calendar"></i><span>'.$fetch_playlist['date'].'</span></div>
    </div>
    <div class="thumb">
        <span>'.$total_videos.'</span>
        <img src="../php/teacher/uploaded_files/'.$fetch_playlist['thumb'].'" alt="">
    </div>
    <h3 class="title">'.$fetch_playlist['title'].'</h3>
    <p class="description">'.$fetch_playlist['description'].'
    </p>
    <form action="" method="post" class="flex-btn">
        <input type="hidden" name="playlist_id" value="'.$playlist_id.'">
        <a href="update_playlist.php?get_id='.$playlist_id.'" class="btn btn-warning w-100">update</a>
        <button type="submit"  class="btn btn-danger w-100" name="delete">delete</button>
    </form>
    <a href="view_playlist.php?get_id='.$playlist_id.'" class="btn btn-primary w-100 mt-3">view playlist</a>
</div>
';
}
} 
else{
echo '<p class="empty">no playlist added yet!</p>';
}

echo '                                           
</div>
</section>

</div>
</div>
</div>';


}

function add_course(){
$str='    
<div class="col-lg-8 ">
<div class=" mb-4">
    <div class="">
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0" style="font-size: 1.5rem;"> Add Course</p>
            </div>
        </div>
        <hr>
<section class="playlist-form">


<form action="" method="post" enctype="multipart/form-data">
    <p>playlist status <span>*</span></p>
    <select name="status" class="box" required>
        <option value="" selected disabled>-- select status</option>
        <option value="active">active</option>
        <option value="deactive">deactive</option>
    </select>
    <p>playlist title <span>*</span></p>
    <input type="text" name="title" maxlength="100" required placeholder="enter playlist title" class="box ">
    <p>playlist description <span>*</span></p>
    <textarea name="description" class="box" required placeholder="write description" maxlength="1000" cols="30"
        rows="10"></textarea>
    <p>playlist requirements <span>*</span></p>
    <textarea name="description" class="box" required placeholder="write requirements" maxlength="1000"
        cols="30" rows="10"></textarea>

    <p>what the student will learn from these course <span>*</span></p>
    <input name="tags" type="text" value="html,css" class="box" required  maxlength="10" size="10">

    <p>playlist Price <span>*</span></p>
    <input type="text" name="price" maxlength="100" required placeholder="enter playlist Price" class="box">
    <p>playlist thumbnail <span>*</span></p>
    <input type="file" name="image" accept="image/*" required class="box">
    <br>
    <button type="submit"  name="submit" class="btn btn-primary w-100">Create a playlist</button>
</form>

</section>
                                          
</div>
</section>

</div>
</div>
</div>';
return $str;
}

public function editForm(){
$str='<form action="profile.php?action=editaction" method="post">
    <div>Name:</div>
    <div> <input type="text" name="name" value="'.$this->model->getName().'" /></div><br>
    <div>Password:</div>
    <div> <input type="password" name="password" value="'.$this->model->getPassword().'" /></div><br>
    <div>Age:</div>
    <div> <input type="text" name="age" value="'.$this->model->getAge().'" /></div><br>
    <div>Phone: </div>
    <div><input type="text" name="phone" value="'.$this->model->getPhone().'" /></div><br>
    <div><input type="submit" /></div>';
    return $str;
    }
    }
    ?>