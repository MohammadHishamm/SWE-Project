<?php

require_once(__ROOT__ . "View/View.php");

class ViewContent extends View{	



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
	
	function show_content(){


        $content = $this->model->getcontent();


        foreach($_SESSION['user_data'] as $key => $value)
        {
           $tutor_id = $value['id'];
        }
        echo'
        <div class="col-lg-8 ">
        <div class=" mb-4">
            <div class="">
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0" style="font-size: 1.5rem;"> Your Contents</p>
                    </div>
                </div>
                <hr>

                <section class="contents">

           

                    <div class="box-container">

                        <div class="box" style="text-align: center;">
                            <h3 class="title" style="margin-bottom: .5rem;">create new
                                content</h3>
                            <a href="Control-Content.php?action=add" class="btn">add content</a>
                        </div>
';
                     
$select_videos = $content->get_All_content($tutor_id);
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
                            <img src="../Images/courses/thumbs/'.$fecth_videos['thumb'].'"
                                class="thumb" alt="">
                            <h3 class="title">'.$fecth_videos['title'].'</h3>
                            <form action="" method="post" class="flex-btn">
                                <input type="hidden" name="video_id"
                                    value="'.$video_id.'">
                                <a href="update_content.php?get_id='.$video_id.'?>"
                                    class="btn btn-warning w-100">update</a>
                                <button type="submit"  class="btn btn-danger w-100" name="delete_video">
                                    delete
                                </button>
                            </form>
                            <a href="view_content.php?get_id='.$video_id.'"
                                class="btn btn-primary w-100 mt-3">view content</a>
                        </div>
                        ';
                       
}
}else{
echo '<p class="empty">no contents added yet!</p>';
}


                echo'
                </section>
                </div>
        </section>
        
        </div>
        </div>
        </div>
';


}

function add_content(){
    $content = $this->model->getcontent();
    $playlist = $this->model->getplaylist();
    
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
                    <p class="mb-0" style="font-size: 1.5rem;"> Add Content</p>
                </div>
            </div>
            <hr>



            <section class="video-form">

          

                <form action="" method="post" enctype="multipart/form-data">
                    <p>video status <span>*</span></p>
                    <select name="status" class="box" required>
                        <option value="" selected disabled>-- select status</option>
                        <option value="active">active</option>
                        <option value="deactive">deactive</option>
                    </select>
                    <p>video title <span>*</span></p>
                    <input type="text" name="title" maxlength="100" required
                        placeholder="enter video title" class="box">
                    <p>video description <span>*</span></p>
                    <textarea name="description" class="box" required
                        placeholder="write description" maxlength="1000" cols="30"
                        rows="10"></textarea>
                    <p>video playlist <span>*</span></p>
                    <select name="playlist" class="box" required>
                        <option value="" disabled selected>--select playlist</option>
                        ';
$select_playlists = $playlist->get_All_playlist($tutor_id);
if ($select_playlists->rowCount() > 0) {
while ($fetch_playlist = $select_playlists->fetch(PDO::FETCH_ASSOC)) 
{

echo '<option value="'.$fetch_playlist['playlist_id'].'">
        '.$fetch_playlist['title'].'</option> ';
}
} else {
echo '<option value="" disabled>no playlist created yet!</option>';
}

echo'                
</select>

                    <p>select thumbnail <span>*</span></p>
                    <input type="file" name="thumb" accept="image/*" required
                        class="box">
                    <p>select video <span>*</span></p>
                    <input type="file" name="video" accept="video/*" required
                        class="box">
                    <button type="submit"  name="submit" class="btn btn-primary w-100">
                    upload video
                    </button>
                </form>

            </section>
        </div>
</section>

</div>
</div>
</div>
';

}

public function update_course(){

    $content = $this->model->getcontent();

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
    <section class="video-form">

    <h1 class="heading">update content</h1>
    ';

       $select_videos = $content->get_content_by_id($id);
       if($select_videos->rowCount() > 0){
          while($fecth_videos = $select_videos->fetch(PDO::FETCH_ASSOC)){ 
             $video_id = $fecth_videos['content.content_id'];
    echo'
    <form action="" method="post" enctype="multipart/form-data">
       <input type="hidden" name="video_id" value="'.$fecth_videos['content.content_id'].'">
       <input type="hidden" name="old_thumb" value="'.$fecth_videos['content.thumb'].'">
       <input type="hidden" name="old_video" value="'.$fecth_videos['content.video'].'">
       <p>update status <span>*</span></p>
       <select name="status" class="box" required>
          <option value="'.$fecth_videos['content.status'].'" selected>'.$fecth_videos['content.status'].'</option>
          <option value="active">active</option>
          <option value="deactive">deactive</option>
       </select>
       <p>update title <span>*</span></p>
       <input type="text" name="title" maxlength="100" required placeholder="enter video title" class="box" value="'.$fecth_videos['content.title'].'">
       <p>update description <span>*</span></p>
       <textarea name="description" class="box" required placeholder="write description" maxlength="1000" cols="30" rows="10">'.$fecth_videos['content.description'].'></textarea>
       <p>update playlist</p>
       <select name="playlist" class="box">
          <option value="'.$fecth_videos['playlist.playlist_id'].'" selected>--select playlist</option>
          ';
        

          if($fecth_videos['playlist.playlist_id'] != 0)
          {
            echo '<option value="'.$fecth_videos['playlist.playlist_id'].'">'.$fecth_videos['playlist.title'].'</option>';
          }
          else
          {
            echo '<option value="" disabled>no playlist created yet!</option>';
          }
        
        echo'
       </select>
       <img src="../uploaded_files/'.$fecth_videos['content.thumb'].'" alt="">
       <p>update thumbnail</p>
       <input type="file" name="thumb" accept="image/*" class="box">
       <video src="../uploaded_files/'.$fecth_videos['content.video'].'" controls></video>
       <p>update video</p>
       <input type="file" name="video" accept="video/*" class="box">
       <input type="submit" value="update content" name="update" class="btn">
       <div class="flex-btn">
          <a href="view_content.php?get_id='.$video_id.'" class="option-btn">view content</a>
          <input type="submit" value="delete content" name="delete_video" class="delete-btn">
       </div>
    </form>
    ';
   
          }
       }else{
          echo '<p class="empty">video not found! <a href="add_content.php" class="btn" style="margin-top: 1.5rem;">add videos</a></p>';
       }
    
 echo'
 </section>
 </div>
</section>

</div>
</div>
</div>
 ';
 

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