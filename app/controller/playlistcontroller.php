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

}
