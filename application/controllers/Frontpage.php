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
    $data['header_page'] = "Sekilas Tentang saya";
    $this->load->view('frontheader', $data );
    $this->load->view('frontservice', $data);
    $this->load->view('frontfooter', $data);
  }

  public function contact(){
    $data['title_bar'] = "Kontak | Edo";
    $data['header_page'] = "Sekilas Tentang saya";
    $this->load->view('frontheader', $data );
    $this->load->view('frontcontact', $data);
    $this->load->view('frontfooter', $data);
  }

  public function project(){
    $data['title_bar'] = "Project | Edo";
    $data['header_page'] = "Sekilas Tentang saay";
    $this->load->view('frontheader', $data );
    $this->load->view('frontproject', $data);
    $this->load->view('frontfooter', $data);
  } 

  public function notfound(){
    $data['title_bar'] = "4040 Not Found | Edo";
    $this->load->view('frontheader', $data );
    $this->load->view('notfound', $data);
    $this->load->view('frontfooter', $data);
  }

  public function insert_contact(){
    $name = $this->input->post('p_name', TRUE);
    $email = $this->input->post('p_email', TRUE);
    $message = $this->input->post('p_message', TRUE);
    $data = array(
      'name' => $name,
      'email' => $email,
      'message' => $message
    );

    $this->db->insert('contact', $data);
    $check = $this->db->affected_rows() > 0;
		if($check){
      $configs = [
        'mailtype'  => 'html',
        'charset'   => 'utf-8',
        'protocol'  => 'smtp',
        'smtp_host' => 'ssl://smtp.gmail.com',
        'smtp_user' => 'zalbinaridwan@gmail.com',    // Ganti dengan email gmail kamu
        'smtp_pass' => 'passwordemail',      // Password gmail kamu
        'smtp_port' => 465,
        'crlf'      => "\r\n",
        'newline'   => "\r\n"
      ];

      // Load library email dan konfigurasinya
      $this->load->library('email', $configs);

      // Email dan nama pengirim
      $this->email->from('zalbinaridwan@gmail.com', 'MRZ');

      // Email penerima
      $this->email->to('mridwanzalbina@gmail.com'); // Ganti dengan email tujuan kamu

      // Lampiran email, isi dengan url/path file
      $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

      // Subject email
      $this->email->subject('Kirim Email dengan SMTP Gmail | MasRud.com');

      // Isi email
      $this->email->message("Ini adalah contoh email CodeIgniter yang dikirim menggunakan SMTP email Google (Gmail).<br><br> Klik <strong><a href='https://masrud.com/post/kirim-email-dengan-smtp-gmail' target='_blank' rel='noopener'>disini</a></strong> untuk melihat tutorialnya.");

      // Tampilkan pesan sukses atau error
      if ($this->email->send()) {
          echo 'Sukses! email berhasil dikirim.';
      } else {
          echo 'Error! email tidak dapat dikirim.';
      }
      $this->session->set_flashdata('success', 'Submit data berhasil, Terima kasih.');
			redirect(base_url('frontpage/contact'));
		}
  }

}

?>