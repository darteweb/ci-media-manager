<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Manager extends CI_Controller {
  
    public function index()
    {
        $this->data['browser_title']    =   'Media Manager';
        $this->load->view('view_media_manager');
    }
}