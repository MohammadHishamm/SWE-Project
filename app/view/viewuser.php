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
	
	function signinForm($google_client){
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
			<a href="'.$google_client->createAuthUrl().'" class="social-icon">
				<i class="fab fa-google"></i>
			</a>
			<a href="#" class="social-icon">
				<i class="fab fa-linkedin-in"></i>
			</a>
		</div>
	</form>';
		return $str;
	}

	function signupForm($google_client){
		echo '<form method="post" class="sign-up-form" id="register_form">
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
			<a href="'.$google_client->createAuthUrl().'"  class="social-icon" >
			<i class="fab fa-google"></i>
			</a>
			<a href="#" class="social-icon">
				<i class="fab fa-linkedin-in"></i>
			</a>
		</div>
	</form>';
		
	}

	public function view_courses(){

				$playlist = $this->model->getplaylist();
                $playlist_data =$playlist->get_playlist_table_row_5();
                
                if($playlist_data->rowCount() > 0)
                {
                 while($fetch_playlist = $playlist_data->fetch(PDO::FETCH_ASSOC) )
                {
                    
				echo'

                <div class="col  mb-3">
                    <div class="card" style="width: 20rem; height: 25rem;  ">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light"
                            style="width: 20rem; height: 25rem;  ">
                            <img src="../images/courses/'.$fetch_playlist['thumb'].'"
                                style="object-fit: cover ; height: 100%; width: 100%;" />
                            <a href="View-Course.php?playlist_id='.$fetch_playlist['playlist_id'].'">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                </div>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="card-title">
                                <div class="row mb-3">
                                    <div class="col-7 d-flex justify-content-start align-items-center">
                                        <img src="../images/users/'.$fetch_playlist['user_img'].'"
                                            alt="Generic placeholder image"
                                            class="img-fluid rounded-circle border  border-3"
                                            style="width: 45px; height: 45px;">
                                        <span class="ps-2"
                                            style="font-size: 13px;">'.$fetch_playlist['user_name'].'</span>
                                    </div>
                                    <div class="col-5 d-flex justify-content-end align-items-center">
                                        <ul class="mb-0 list-unstyled d-flex flex-row  " style="color: yellow;">
                                            <li>
                                                <i class="fas fa-star fa-xs"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star fa-xs"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star fa-xs"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star fa-xs"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star fa-xs"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="card-text mb-3 text-muted">'.$fetch_playlist['title'].'</p>
                                <div>
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <p class="small mb-0"><i class="far fa-clock me-2"></i>'.$fetch_playlist['date'].'</p>
                                        <p class="fw-bold mb-0">'.$fetch_playlist['Price'].'$</p>
                                    </div>



									<div class="d-flex row align-items-center justify-content-between mb-2">
									
										<div class="d-flex col-12 align-items-center w-100 mb-2">
										

                                    		<a class="addtocart btn btn-primary w-100" href="?add_to_wishlist=true" id="addtocart">
                                           	Add to wishlist
                                    		</a>
										</div>
										<div class="d-flex col-12 align-items-center w-100 ">

											<a class="addtocart btn btn-secondry w-100" href="View-Course.php?playlist_id='.$fetch_playlist['playlist_id'].'">
											view course
							 				</a>
										</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
					';
         
                     $Course_ID = $fetch_playlist['playlist_id'];
                
					}

                }

                if (isset($_GET['add_to_wishlist'])) {

                    // $wishlist->addwishlist($Course_ID, $User_ID);
                }



          

	
}
}
?>