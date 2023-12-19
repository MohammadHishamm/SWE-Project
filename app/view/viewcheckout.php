<?php

require_once(__ROOT__ . "View/View.php");

class ViewCheckout extends View
{	

    function output()
    {
    
}

    function view_checkout()
    {


        foreach($_SESSION['user_data'] as $key => $value)
        {
          $User_ID = $value['id'];
        }  
        if (isset($_GET['delete_checkout'])) 
        {
        
            $this->model->deletecheckout($_GET['Course_ID'],$User_ID);
        }
      $checkoutt= $this->model->get_All_checkout($User_ID);
        
      if($checkoutt->rowCount() > 0)
      {
          while($checkoutitem = $checkoutt->fetch(PDO::FETCH_ASSOC) ){
        
      
               echo '
               <div class="row justify-content-center mb-3 mt-5">
               <div class="col-md-12 col-xl-10">
                   <div class="card shadow-0 border rounded-3">
                       <div class="card-body">
                           <div class="row">
                               <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                   <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                       <img src="/SWE-PROJECT/Images/courses/thumbs/'.$checkoutitem['thumb'].'"
                                       class="w-100" />
                                       <a  href="course.php?playlist_id='.$checkoutitem['playlist_id'].'">
                                   <div class="hover-overlay">
                                   <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);">
                               </div>
                               </div>
                           </a>
                       </div>
                   </div>
                   <div class="col-md-6 col-lg-6 col-xl-6">
                       <h5>'.$checkoutitem['title'].'</h5>
                       <div class="d-flex flex-row">
                           <div class="text-danger mb-1 me-2">
                               <i class="fa fa-star"></i>
                               <i class="fa fa-star"></i>
                               <i class="fa fa-star"></i>
                               <i class="fa fa-star"></i>
                           </div>
                           <span>300</span>
                       </div>
                       <a class="text-dark" href="profile_view.php?user_id='.$checkoutitem['user_id'].'" style="font-size: 13px;">'.$checkoutitem['user_name'].'</a>

                       <p class="text-truncate mb-4 mt-3 mb-md-0">
                           '.$checkoutitem['description'].'
                       </p>
                   </div>
                   <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                       <div class="d-flex flex-row align-items-center mb-1">
                           <h4 class="mb-1 me-1">$'.$checkoutitem['Price'].'</h4>
                           <span class="text-danger"><s>$20.99</s></span>
                       </div>
                       <div class="d-flex flex-column mt-4">
                           <a href="?delete_checkout&Course_ID='.$checkoutitem['playlist_id'].'"
                               class="btn btn-danger btn-sm mt-2">
                               Delete
                           </a>
                           <a class="btn btn-secondary btn-sm mt-2" href="View-Course.php?playlist_id='.$checkoutitem['playlist_id'].'" >
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
echo'
<div class="flex-row row d-flex justify-content-end align-item-end  mb-3 w-100">
<button class="btn btn-success ms-auto">Pay</button>
</div>
';
    }
    else
    {

        echo '
        <div class="text-muted py-5">
        <p class="text-danger fs-5 text-center ">No Data To show</p>
        </div>
        ';
    }
    }


}

?>