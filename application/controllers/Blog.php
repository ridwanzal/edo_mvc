<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->helper('url');
  }

  public function index(){
    $data['title_bar'] = "Edo";
    $data['header_page'] = "";
    $this->load->view('frontpage/frontheader', $data );
    $this->load->view('frontpage/frontpage', $data);
    $this->load->view('frontpage/frontfooter', $data);
  }

}

?>