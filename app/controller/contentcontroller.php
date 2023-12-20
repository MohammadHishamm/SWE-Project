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


    function update_playlist()
    {
        $video_id = $_POST['video_id'];
        $video_id = filter_var($video_id, FILTER_SANITIZE_STRING);
        $status = $_POST['status'];
        $status = filter_var($status, FILTER_SANITIZE_STRING);
        $title = $_POST['title'];
        $title = filter_var($title, FILTER_SANITIZE_STRING);
        $description = $_POST['description'];
        $description = filter_var($description, FILTER_SANITIZE_STRING);
        $playlist = $_POST['playlist'];
        $playlist = filter_var($playlist, FILTER_SANITIZE_STRING);
     
        $this->model->setContentId($video_id);
        $this->model->setContentTitle($title);
        $this->model->setContentDescription($description);
        $this->model->setContentStatus($status);
        $this->model->Update_content();

        if($this->model->Update_content()){
            $_SESSION["error_message"]  = 'new content uploaded!';  
        }else{
            $_SESSION["error_message"]  = 'failed to upload content';  
        }
        
        if(!empty($playlist))
        {
            $this->model->setContentPlaylist($playlist);
            $this->model->Update_play();
        }
       

     
        $old_thumb = $_POST['old_thumb'];
        $old_thumb = filter_var($old_thumb, FILTER_SANITIZE_STRING);
        $thumb = $_FILES['thumb']['name'];
        $thumb = filter_var($thumb, FILTER_SANITIZE_STRING);
        $thumb_ext = pathinfo($thumb, PATHINFO_EXTENSION);
        $rename_thumb = unique_id().'.'.$thumb_ext;
        $thumb_size = $_FILES['thumb']['size'];
        $thumb_tmp_name = $_FILES['thumb']['tmp_name'];
        $thumb_folder = '../Images/courses/thumbs/'.$rename_thumb;
     
        if(!empty($thumb)){
           if($thumb_size > 2000000){
              $message[] = 'image size is too large!';
           }else{
              $this->model->setContentThumb($rename_thumb);
              $this->model->Update_thumb();
              move_uploaded_file($thumb_tmp_name, $thumb_folder);
              if($old_thumb != '' AND $old_thumb != $rename_thumb){
                 unlink('../Images/courses/videos/'.$old_thumb);
              }
           }
        }
     
        $old_video = $_POST['old_video'];
        $old_video = filter_var($old_video, FILTER_SANITIZE_STRING);
        $video = $_FILES['video']['name'];
        $video = filter_var($video, FILTER_SANITIZE_STRING);
        $video_ext = pathinfo($video, PATHINFO_EXTENSION);
        $rename_video = unique_id().'.'.$video_ext;
        $video_tmp_name = $_FILES['video']['tmp_name'];
        $video_folder = '../Images/courses/videos/'.$rename_video;
     
        if(!empty($video)){
           $this->model->setContentVideo($rename_video);
           $this->model->Update_video();
           move_uploaded_file($video_tmp_name, $video_folder);
           if($old_video != '' AND $old_video != $rename_video){
              unlink('../Images/courses/videos/'.$old_video);
           }
        }
    }

}
