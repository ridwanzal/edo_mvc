<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontpage extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->library('form_validation');
  }

  public function index(){
    $data['title_bar'] = "Edo";
    $data['header_page'] = "";
    $this->load->view('frontpage/frontheader', $data );
    $this->load->view('frontpage/frontpage', $data);
    $this->load->view('frontpage/frontfooter', $data);
  }

  public function about(){
    $data['title_bar'] = "Tentang Saya | Edo";
    $data['header_page'] = "Sekilas Tentang saya";
    $this->load->view('frontpage/frontheader', $data );
    $this->load->view('frontpage/frontabout', $data);
    $this->load->view('frontpage/frontfooter', $data);
  }

  public function service(){
    $data['title_bar'] = "Layanan | Edo";
    $data['header_page'] = "Sekilas Tentang saya";
    $this->load->view('frontpage/frontheader', $data );
    $this->load->view('frontpage/frontservice', $data);
    $this->load->view('frontpage/frontfooter', $data);
  }

  public function contact(){
    $data['title_bar'] = "Kontak | Edo";
    $data['header_page'] = "Sekilas Tentang saya";
    $this->load->view('frontpage/frontheader', $data );
    $this->load->view('frontpage/frontcontact', $data);
    $this->load->view('frontpage/frontfooter', $data);
  }

  public function project(){
    $data['title_bar'] = "Project | Edo";
    $data['header_page'] = "Sekilas Tentang saay";
    $this->load->view('frontpage/frontheader', $data );
    $this->load->view('frontpage/frontproject', $data);
    $this->load->view('frontpage/frontfooter', $data);
  } 

  public function notfound(){
    $data['title_bar'] = "4040 Not Found | Edo";
    $this->load->view('frontpage/frontheader', $data );
    $this->load->view('frontpage/notfound', $data);
    $this->load->view('frontpage/frontfooter', $data);
  }

  public function blog(){
    $data['title_bar'] = "Blog | Edo";
    $this->load->view('frontpage/frontheader', $data );
    $this->load->view('frontpage/frontblog', $data);
    $this->load->view('frontpage/frontfooter', $data);
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
    
    $data = $this->security->xss_clean($data);
    $this->db->insert('contact', $data);
    $check = $this->db->affected_rows() > 0;
		if($check){
      $this->session->set_flashdata('success', 'Submit data berhasil, Terima kasih.');
			redirect(base_url('frontpage/contact'));
		}else{
      $this->session->set_flashdata('failed', 'Submit data gagal, Terima kasih.');
			redirect(base_url('frontpage/contact'));
    }
  }

  public function connect_list(){
    if($this->session->userdata('status') != "login"){
      redirect(base_url("login"));
    }else{
      $query="SELECT * from contact order by id";
      $query_result = $this->db->query($query);
      $result = json_encode($query_result->result());
      echo $result;
    }
  }

}

?>