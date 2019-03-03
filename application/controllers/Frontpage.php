<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontpage extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->helper('url');
  }

  public function index(){
    $data['title_bar'] = "Edo";
    $data['header_page'] = "";
    $this->load->view('frontheader', $data );
    $this->load->view('frontpage', $data);
    $this->load->view('frontfooter', $data);
  }

  public function about(){
    $data['title_bar'] = "Tentang Saya | Edo";
    $data['header_page'] = "Sekilas Tentang saya";
    $this->load->view('frontheader', $data );
    $this->load->view('frontabout', $data);
    $this->load->view('frontfooter', $data);
  }

  public function service(){
    $data['title_bar'] = "Layanan | Edo";
    $data['header_page'] = "Sekilas Tentang saay";
    $this->load->view('frontheader', $data );
    $this->load->view('frontservice', $data);
    $this->load->view('frontfooter', $data);
  }

  public function contact(){
    $data['title_bar'] = "Layanan | Edo";
    $data['header_page'] = "Sekilas Tentang saay";
    $this->load->view('frontheader', $data );
    $this->load->view('frontcontact', $data);
    $this->load->view('frontfooter', $data);
  }

  public function insert_contact(){
    $name = $this->input->post('p_name');
    $email = $this->input->post('p_email');
    $message = $this->input->post('p_message');
    $data = array(
      'name' => $name,
      'email' => $email,
      'message' => $message
    );

    $this->db->insert('contact', $data);
    $check = $this->db->affected_rows() > 0;
		if($check){
      $this->session->set_flashdata('success', 'Submit data berhasil');
			redirect(base_url('index.php/frontpage/contact'));
		}
  }

}

?>