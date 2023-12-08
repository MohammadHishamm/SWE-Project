<?php

require_once(__ROOT__ . "controller/controller.php");


class PlaylistController extends Controller
{

    function delete_playlist($delete_id , $tutor_id)
    {


   if(  $this->model->Delete_playlist($delete_id,$tutor_id))
   {
    $_SESSION["error_message"] = "Playlist deleted successfully!";
   }
   else
   {
    $_SESSION["error_message"] = "Error !";
   }
        
    }


    function add_playlist($tutor_id)
    {
        $title = $_POST['title'];
        $title = filter_var($title, FILTER_SANITIZE_STRING);
        $description = $_POST['description'];
        $description = filter_var($description, FILTER_SANITIZE_STRING);
        $status = $_POST['status'];
        $status = filter_var($status, FILTER_SANITIZE_STRING);
        $image = $_FILES['image']['name'];
        $price= $_POST['price'];
     
        $this->model->setPlaylistId();
        $this->model->setPlaylistTitle($title);
        $this->model->setPlaylistDescription($description);
        $this->model->setPlaylistRequirements($description);

        $this->model->setPlaylistPrice($price);
        $this->model->setPlaylistImage($image);
        $this->model->setPlaylistTutor($tutor_id);
        $this->model->setPlaylistStatus($status);


        if($this->model->Save())
        {
         $_SESSION["error_message"] = "Playlist Added successfully!";
        }
        else
        {
         $_SESSION["error_message"] = "Error can't add playlist!";
        }
    }

}
