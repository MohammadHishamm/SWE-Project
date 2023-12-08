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



}

function signupForm(){
$str=' <form method="post" class="sign-up-form" id="register_form">
    <h2 class="title">Sign up</h2>
    <div class="input-field">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="Full name" id="name1" name="user_name" />
        </br>
        <span class="alert" id="alert3"></span>

    </div>
    </br>
    <div class="input-field">
        <i class="fas fa-envelope"></i>
        <input type="text" placeholder="Email" id="email1" name="user_email" />
        </br>


    </div>
    </br>
    <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Password" id="password1" name="user_password" />
        </br>


    </div>
    </br>
    <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Confirm password" id="password2" name="Confirmpass" />
        </br>
        <span class="alert" id="alert6"></span>

    </div>
    </br>
    <input type="submit" name="register" class="btn btn-success" value="sign up" />
    <p class="social-text">Or Sign up with social platforms</p>
    <div class="social-media">
        <a href="#" class="social-icon">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#" class="social-icon">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="#" class="social-icon">
            <i class="fab fa-google"></i>
        </a>
        <a href="#" class="social-icon">
            <i class="fab fa-linkedin-in"></i>
        </a>
    </div>
</form>';
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