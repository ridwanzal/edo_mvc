<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->helper('url');
  }

  public function index(){
    $data['title_bar'] = "Admin";
    $data['header_page'] = "";
    $this->load->view('admin/adminheader', $data );
    $this->load->view('admin/adminbar', $data);
    $this->load->view('admin/adminpage', $data);
    $this->load->view('admin/adminfooter', $data);
  }

}

?>