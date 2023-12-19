<?php

require_once(__ROOT__ . "View/View.php");

class ViewWishlist extends View
{	


    function output()
    {
 
    
}

    function view_wishlist()
    {
        foreach($_SESSION['user_data'] as $key => $value)
        {
          $User_ID = $value['id'];
        }  
        
      $wishlistt= $this->model->get_All_wishlist($User_ID);
        
      if($wishlistt->rowCount() > 0)
      {
          while($wishlistitem = $wishlistt->fetch(PDO::FETCH_ASSOC) ){
        
      
                   

                   
               echo '
               <div class="row justify-content-center mb-3">
               <div class="col-md-12 col-xl-10">
                   <div class="card shadow-0 border rounded-3">
                       <div class="card-body">
                           <div class="row">
                               <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                   <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                       <img src="../Images/courses/'.$wishlistitem['thumb'].'"
                                       class="w-100" />
                                       <a  href="course.php?playlist_id='.$wishlistitem['playlist_id'].'">
                                   <div class="hover-overlay">
                                   <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);">
                               </div>
                               </div>
                           </a>
                       </div>
                   </div>
                   <div class="col-md-6 col-lg-6 col-xl-6">
                       <h5>'.$wishlistitem['title'].'</h5>
                       <div class="d-flex flex-row">
                           <div class="text-danger mb-1 me-2">
                               <i class="fa fa-star"></i>
                               <i class="fa fa-star"></i>
                               <i class="fa fa-star"></i>
                               <i class="fa fa-star"></i>
                           </div>
                           <span>300</span>
                       </div>
                       <a class="text-dark" href="profile_view.php?user_id='.$wishlistitem['user_id'].'" style="font-size: 13px;">'.$wishlistitem['user_name'].'</a>

                       <p class="text-truncate mb-4 mt-3 mb-md-0">
                           '.$wishlistitem['description'].'
                       </p>
                   </div>
                   <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                       <div class="d-flex flex-row align-items-center mb-1">
                           <h4 class="mb-1 me-1">$'.$wishlistitem['Price'].'</h4>
                           <span class="text-danger"><s>$20.99</s></span>
                       </div>
                       <div class="d-flex flex-column mt-4">
                           <a href="course.php?playlist_id='.$wishlistitem['playlist_id'].'"
                               class="btn btn-primary btn-sm mt-2">
                               Add to wishlist
                           </a>
                           <a class="btn btn-secondary btn-sm mt-2" href="View-Course.php?playlist_id='.$wishlistitem['playlist_id'].'" >
                               View Courses  
                           </a>
                           </div>
                       </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   ';
  
          }
    }
  
  if (isset($_GET['delete_wishlist'])) 
  {

      $this->model->deletewishlist($_GET['Course_ID'],$User_ID);
  }





      echo '
      <div class="buttonarea mt-5">
      <button type="button" class="btn btn-success ">Proceed to Payment</button>
      </div>
      ';
    }


}

?>