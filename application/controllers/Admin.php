<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('Users_model', 'user_model');
    $data_session = null; // set globally
  }

  public function index(){
      if($this->session->userdata('status') != "login"){
        redirect(base_url("login"));
      }else{  
        $data['title_bar'] = "Buat Post Baru| Admin";
        $data['header_page'] = "";
        $this->load->view('admin/adminheader', $data );
        $this->load->view('admin/adminbar', $data);
        $this->load->view('admin/adminpage', $data);
        $this->load->view('admin/adminfooter', $data);
      }
  }

  public function postlist(){
    if($this->session->userdata('status') != "login"){
      redirect(base_url("login"));
    }else{
      $data['title_bar'] = "Daftar Post | Admin";
      $data['header_page'] = "";
      $this->load->view('admin/adminheader', $data );
      $this->load->view('admin/adminbar', $data);
      $this->load->view('admin/adminpagelist', $data);
      $this->load->view('admin/adminfooter', $data);
    }
  }
  

  public function connectlist(){
    if($this->session->userdata('status') != "login"){
      redirect(base_url("login"));
    }else{
      $data['title_bar'] = "Daftar Terhubung | Admin";
      $data['header_page'] = "";
      $this->load->view('admin/adminheader', $data );
      $this->load->view('admin/adminbar', $data);
      $this->load->view('admin/adminpagecontact', $data);
      $this->load->view('admin/adminfooter', $data);
    }
  }


  public function login(){
    $data['title_bar'] = "Login | Admin";
    $data['header_page'] = "";
    $this->load->view('admin/adminheader', $data );
    $this->load->view('admin/adminlogin', $data);
    $this->load->view('admin/adminfooter', $data);
  }

  public function submit_login(){
    $username = $this->input->post('p_username', TRUE);
    $password = $this->input->post('p_password', TRUE);
    $encrypted_mypassword=md5($password);

    $query="SELECT * FROM users where username = '$username' AND password = '$encrypted_mypassword'";
    $query_result = $this->db->query($query)->result_array();
    if(count($query_result) > 0){
      for($i=0; $i<count($query_result); $i++){
        $data_session = array(
          'name' => $username,
          'user_id' => $query_result[$i]['user_id'],
          'username' => $query_result[$i]['username'],
          'fullname' =>  $query_result[$i]['fullname'],
          'email' =>  $query_result[$i]['email'],
          'status' => 'login'
        );
      }
      $this->session->set_flashdata('key', 1);
			$this->session->set_userdata($data_session);	
      redirect(base_url('admin'));
    }else{
      if($username == ''){
        $this->session->set_flashdata('error', 'Maaf, Login Gagal');
				redirect(base_url("login"));
      }
      $this->session->set_flashdata('error', 'Maaf, Login Gagal');
			redirect(base_url("login"));
    }
  }

  public function submit_logout(){
    $this->session->unset_userdata($newdata);
    $this->session->sess_destroy();
    redirect(base_url("login"));
  }

}

?>