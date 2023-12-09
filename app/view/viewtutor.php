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


        $playlist = $playlist = $this->model->getplaylist();


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
                    <a href="Control-Courses.php?action=add" class="btn">add playlist</a>
                </div>';

$select_playlist =   $playlist->get_All_playlist($tutor_id);
if($select_playlist->rowCount() > 0){
while($fetch_playlist = $select_playlist->fetch(PDO::FETCH_ASSOC)){
$playlist_id = $fetch_playlist['playlist_id'];
$total_videos =   $playlist->get_videos_count($playlist_id);
echo'
<div class="box">
    <div class="flex">
    <div><i class="fas fa-circle-dot" style="';if($fetch_playlist['status'] == 'active'){echo 'color:limegreen';}else{echo 'color:red';}echo'">
    </i><span style="';if($fetch_playlist["status"] == "active"){echo "color:limegreen"; }else{echo "color:red";} echo'">'.$fetch_playlist['status'].'</span></div>
    <div><i class="fas fa-calendar"></i><span>'.$fetch_playlist['date'].'</span></div>
    </div>
    <div class="thumb">
        <span>'.$total_videos.'</span>
        <img src="../images/courses/'.$fetch_playlist['thumb'].'" alt="">
    </div>
    <h3 class="title">'.$fetch_playlist['title'].'</h3>
    <p class="description">'.$fetch_playlist['description'].'
    </p>
    <form action="" method="post" class="flex-btn">
        <input type="hidden" name="playlist_id" value="'.$playlist_id.'">
        <a href="Courses.php?action=update&get_id='.$playlist_id.'" class="btn btn-warning w-100">update</a>
        <button type="submit"  class="btn btn-danger w-100" name="delete">delete</button>
    </form>
    <a href="Control-Courses.php?action=view_playlist&get_id='.$playlist_id.'" class="btn btn-primary w-100 mt-3">view playlist</a>
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
    <input type="text" id="result" hidden name="result">
    <input type="text" id="input" onkeydown="addTag(event)" class="box"  size="10" maxlength="10" placeholder="Press Enter to add a tag" name="tags">
    <div class="tags-container"></div>

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

public function update_course(){

    $playlist =  $this->model->getplaylist();
    
    echo '
    <div class="col-lg-8 ">
<div class=" mb-4">
    <div class="">
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0" style="font-size: 1.5rem;"> Update Course</p>
            </div>
        </div>
        <hr>
    <section class="playlist-form">
';
 
 
$select_playlist =$playlist->get_playlist_by_id($_REQUEST['get_id']);
if($select_playlist->rowCount() > 0){
while($fetch_playlist = $select_playlist->fetch(PDO::FETCH_ASSOC)){
$playlist_id = $fetch_playlist['playlist_id'];
$total_videos = $playlist->get_videos_count($playlist_id);
       
       echo ' 
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="old_image" value="'.$fetch_playlist['thumb'].'">
    <input type="hidden" name="playlist_id" value="'.$playlist_id.'">
    <p>playlist status <span>*</span></p>
    <select name="status" class="box" required>
        <option value="'.$fetch_playlist['status'].'" selected>'.$fetch_playlist['status'].'</option>
        <option value="active">active</option>
        <option value="deactive">deactive</option>
    </select>
    <p>playlist title <span>*</span></p>
    <input type="text" name="title" maxlength="100" required placeholder="enter playlist title"
        value="'.$fetch_playlist['title'].'" class="box">
    <p>playlist description <span>*</span></p>
    <textarea name="description" class="box" required placeholder="write description" maxlength="1000" cols="30"
        rows="10">'.$fetch_playlist['description'].'</textarea>
    <p>playlist thumbnail <span>*</span></p>
    <div class="thumb">
        <span>'.$total_videos.'</span>
        <img src="../images/courses/'.$fetch_playlist['thumb'].'" alt="">
    </div>
    <input type="file" name="image" accept="image/*" class="box">
    <button type="submit" name="update_submit" class="btn btn-primary w-100 mb-3">update playlist</button>
    <div class="flex-btn">
        <button type="submit" class="btn btn-danger w-100" name="delete"> delete</button>
        <a href="Control-Courses.php?action=view_playlist&get_id='.$playlist_id.'" class="btn btn-warning w-100">view playlist</a>
    </div>
</form>
';

       } 
    }else{
       echo '<p class="empty">no playlist added yet!</p>';
    }
    

    echo '
</section>
</div>
</section>

</div>
</div>
</div>';

}

public function view_course_content()
{

    $playlist  = $this->model->getplaylist();
    $content  = $this->model->getcontent();

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
                <p class="mb-0" style="font-size: 1.5rem;"> Course Content</p>
            </div>
        </div>
        <hr>
    <section class="playlist-details">
';

   
      $select_playlist = $playlist->get_playlist_by_id($_REQUEST['get_id']);
      if($select_playlist->rowCount() > 0){
         while($fetch_playlist = $select_playlist->fetch(PDO::FETCH_ASSOC)){
            $playlist_id = $fetch_playlist['playlist_id'];
            
            $total_videos = $playlist->get_videos_count($playlist_id);
   
            echo '
<div class="row">
    <div class="thumb">
        <span>'.$total_videos.'</span>
        <img src="../images/courses/'.$fetch_playlist['thumb'].'" alt="">
    </div>
    <div class="details">
        <h3 class="title">'.$fetch_playlist['title'].'</h3>
        <div class="date"><i class="fas fa-calendar"></i><span>'.$fetch_playlist['date'].'</span></div>
        <div class="description"> '.$fetch_playlist['description'].'</div>
        <form action="" method="post" class="flex-btn">
            <input type="hidden" name="playlist_id" value="'.$playlist_id.'">
            <a href="Control-Courses.php?action=update&get_id='.$playlist_id.'" class="btn btn-warning w-100">update playlist</a>
            <button type="submit"  class="btn btn-danger w-100" name="delete">delete playlist </button>
        </form>
    </div>
</div>';

         }
      }else{
         echo '<p class="empty">no playlist found!</p>';
      }
   

echo '
</section>
<div class="row mt-3">
<div class="col-sm-3">
    <p class="mb-0" style="font-size: 1.5rem;">Content</p>
</div>
</div>
<hr>
<section class="contents">

 
    <div class="box-container">
';
      
      $select_videos =  $content->get__playlist_by_id($_REQUEST['get_id']);
      if($select_videos->rowCount() > 0){
         while($fecth_videos = $select_videos->fetch(PDO::FETCH_ASSOC)){ 
            $video_id = $fecth_videos['content_id'];
   
   echo'
        <div class="box">
            <div class="flex">
            <div><i class="fas fa-circle-dot" style="';if($fecth_videos['status'] == 'active'){echo 'color:limegreen';}else{echo 'color:red';}echo'">
            </i><span style="';if($fecth_videos["status"] == "active"){echo "color:limegreen"; }else{echo "color:red";} echo'">'.$fecth_videos['status'].'</span></div>
            <div><i class="fas fa-calendar"></i><span>'.$fecth_videos['date'].'</span></div>
            </div>
            <img src="../images/courses/'.$fecth_videos['thumb'].'" class="thumb" alt="">
            <h3 class="title">'.$fecth_videos['title'].'</h3>
            <form action="" method="post" class="flex-btn">
                <input type="hidden" name="video_id" value="'.$video_id.'">
                <a href="update_content.php?get_id='.$video_id.'" class="btn btn-warning w-100">update</a>
                <button type="submit" class="btn btn-danger w-100" name="delete"> delete </button>
            </form>
            <a href="view_content.php?get_id='.$video_id.'" class="btn btn-primary w-100 mt-3">watch video</a>
        </div>
        ';
         }

      }else{
         echo '<p class="empty">no videos added yet! <a href="add_content.php" class="btn btn-secondary" style="margin-top: 1.5rem;">add videos</a></p>';
      }


echo'
    </div>

</section>
';
}

}
?>