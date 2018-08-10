<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Manager extends CI_Controller {
  
    public function index()
    {
        $this->data['browser_title']    =   'Media Manager';
        $this->load->view('view_media_manager');
    }
    
    
    public function upload()
    {
        if(!empty($_FILES)){
    // Include the database configuration file
    //require 'dbConfig.php';
    
    // File path configuration
    $targetDir = "public/uploads/";
    $fileName = $_FILES['file']['name'];
    $targetFilePath = $targetDir.$fileName;
    
    // Upload file to server
    $newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["file"]["name"]));
    move_uploaded_file($_FILES['file']['tmp_name'], "public/uploads/".$newfilename);

}
    }
}