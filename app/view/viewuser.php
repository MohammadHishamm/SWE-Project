<?php

require_once(__ROOT__ . "View/View.php");

class ViewUser extends View{	
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
	
	function signinForm(){
		$str='                
		<form method="post" class="sign-in-form" id="login_form">
		<h2 class="title">Sign in</h2>
		<div class="input-field">
			<i class="fas fa-user"></i>
			<input type="text" placeholder="Email" id="email" name="user_email" />
			</br>


		</div>
		</br>
		<div class="input-field">
			<i class="fas fa-lock"></i>
			<input type="password" placeholder="Password" id="password" name="user_password" />
			</br>

		</div>
		</br>
		<input type="submit" name="login" id="login" class="btn btn-primary" value="signin" />
		<p class="social-text">Or Sign in with social platforms</p>
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

	function signupForm(){
		$str='                <form method="post" class="sign-up-form" id="register_form">
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
		<div>Name:</div><div> <input type="text" name="name" value="'.$this->model->getName().'"/></div><br>
		<div>Password:</div><div> <input type="password" name="password" value="'.$this->model->getPassword().'"/></div><br>
		<div>Age:</div><div> <input type="text" name="age" value="'.$this->model->getAge().'"/></div><br>
		<div>Phone: </div><div><input type="text" name="phone" value="'.$this->model->getPhone().'"/></div><br>
		<div><input type="submit" /></div>';
		return $str;
	}
}
?>