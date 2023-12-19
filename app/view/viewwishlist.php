<?php

require_once(__ROOT__ . "View/View.php");

class ViewWishlist extends View
{	

    function View_Wishlist ()
    {
 
        foreach($_SESSION['user_data'] as $key => $value)
          {
            $User_ID = $value['id'];
          }  
          
        $wishlistt=$wishlist->get_All_wishlist($User_ID);
                 
    foreach ($wishlistt as $wishlistitem):
                   $courseid=$wishlistitem['Course_ID'];
                     
 
                     
                 echo '

<div class="card rounded-3 mb-4">
    <div class="card-body p-4">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-2 col-lg-2 col-xl-2">
                <img src="teacher/uploaded_files/' . $wishlistitem['thumb'] .'" class="img-fluid rounded-3"
                    alt="Cotton T-shirt">
            </div>
            <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2">'.$wishlistitem['title'] .'</p>
                <p><span class="text-muted">Instructor: </span>'.$wishlistitem['user_name'] .'
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h5 class="mb-0">$499.00 <div class="buttonarea">
                        <a class="button1" href="?delete_wishlist=true&Course_ID='.$wishlistitem['Course_ID'].'">Delete</a>
                    </div>
                </h5>
            </div>
            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>






                <!-- End of data section -->


            </div>
        </div>
    </div>
</div>
';
    endforeach;
    
    if (isset($_GET['delete_wishlist'])) 
    {
 
        $wishlist->deletewishlist($_GET['Course_ID'],$User_ID);
    }
 
 
 
  

        echo '
        <div class="buttonarea">
        <button type="button" class="button">Proceed to Payment</button>
        </div>
        ';
}


}

?>