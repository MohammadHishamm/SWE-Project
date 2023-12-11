<?php

require_once(__ROOT__ . "controller/controller.php");


class ContentController extends Controller
{

    function delete_playlist()
    {

        $delete_id = $_POST['video_id'];
        $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);
     
        if($this->model->remove_content($delete_id))
        {
            $_SESSION["error_message"] = 'Content deleted!';
        }
        else
        {
            $_SESSION["error_message"] = 'Content already deleted!';
        }
        
    }


    function add_content()
    {
        $status = $_POST['status'];
        $status = filter_var($status, FILTER_SANITIZE_STRING);
        $title = $_POST['title'];
        $title = filter_var($title, FILTER_SANITIZE_STRING);
        $description = $_POST['description'];
        $description = filter_var($description, FILTER_SANITIZE_STRING);
        $playlist = $_POST['playlist'];
        $playlist = filter_var($playlist, FILTER_SANITIZE_STRING);
     
        $thumb = $_FILES['thumb']['name'];
        $video = $_FILES['video']['name'];
        
        $this->model->setContentId();
        $this->model->setContentStatus($status);
        $this->model->setContentTitle($title);
        $this->model->setContentDescription($description);
        $this->model->setContentPlaylist($playlist);
        $this->model->setContentThumb($thumb);
        $this->model->setContentVideo($video);
     
     
        if($this->model->saveContent()){
            $_SESSION["error_message"]  = 'new content uploaded!';  
        }else{
            $_SESSION["error_message"]  = 'failed to upload content';  
        }
    }


    function update_playlist($get_id, $tutor_id)
    {
        $title = $_POST['title'];
        $title = filter_var($title, FILTER_SANITIZE_STRING);
        $description = $_POST['description'];
        $description = filter_var($description, FILTER_SANITIZE_STRING);
        $status = $_POST['status'];
        $status = filter_var($status, FILTER_SANITIZE_STRING);
     
        
        $old_image = $_POST['old_image'];
        $old_image = filter_var($old_image, FILTER_SANITIZE_STRING);
        $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_STRING);
        $image_size = $_FILES['image']['size'];
     
     
        $this->model->setPlaylistTitle($title);
        $this->model->setPlaylistDescription($description);
        $this->model->setPlaylistStatus($status);
        
        if (!empty($image)) 
        {
           if($image_size > 200000000)
           {
            $_SESSION["error_message"]  = 'image size is too large!';
           }
           else
           {
              if($old_image != '')
              {
                 unlink('../images/courses/'.$old_image);
                 $this->model->setPlaylistImage($image);
              }
           }
         
        }
        else
        {
            $this->model->setPlaylistoldimg($old_image);
        }
        $this->model->Update_playlist($get_id, $tutor_id);
        $_SESSION["error_message"]  = 'playlist updated!';  
    }

}
