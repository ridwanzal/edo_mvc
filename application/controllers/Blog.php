<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->helper('url');
  }


  
  public function submit_blog(){
    if($this->session->userdata('status') != "login"){
      redirect(base_url("login"));
    }else{
      // $thumbnail = $this->input->post('blog_thumb', TRUE);
      $title = $this->input->post('blog_title', TRUE);
      $subtitle = $this->input->post('blog_subtitle', TRUE);
      $content = $this->input->post('blog_content', TRUE);
      $author_id = $this->session->userdata('user_id');
      $submit = $this->input->post('submit_blog');
      $submit_draft = $this->input->post('submit_draft_blog');
      $category = $this->input->post('blog_category');
      $tag = $this->input->post('blog_tag');
      //Buat slug
      $string=preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $title); //filter karakter unik dan replace dengan kosong ('')
      $trim=trim($string); // hilangkan spasi berlebihan dengan fungsi trim
      $pre_slug=strtolower(str_replace(" ", "-", $trim)); // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
      $slug=$pre_slug; // tambahkan ektensi .html pada slug
      $foto = $_FILES['upload_thumb'];
      $image_path = "";
      if($submit && !$foto == ''){
        $config['upload_path'] = './assets/thumb_img/';
        $config['allowed_types'] = 'jpg|png|gif';
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('upload_thumb')){
          echo 'Gagal upload';
        }else{
          $image_path = $this->upload->data('file_name');
        }
        
        $data = array(
          'title' => $title,
          'subtitle' => $subtitle,
          'slug' => $slug,
          'author_id' => $author_id,
          'image_path' => $image_path,
          'content' => $content,
          'category' => $category,
          'tag' => $tag,
          'type' => 1
        );

        $this->db->insert('blog', $data);
        $affect_row = $this->db->affected_rows();
        if($affect_row > 0){
          $this->session->set_flashdata('message', 'Berhasil menambahkan konten');
        }else{
          $this->session->set_flashdata('error', 'Gagal menambahkan konten');
        }
				redirect(base_url("admin"));

      }else if($submit_draft){
        $data = array(
          'title' => $title,
          'subtitle' => $subtitle,
          'slug' => $slug,
          'author_id' => $author_id,
          'image_path' => $image_path,
          'content' => $content,
          'category' => $category,
          'tag' => $tag,
          'type' => 2
        );

        $this->db->insert('blog', $data);
        $affect_row = $this->db->affected_rows();
        if($affect_row > 0){
          $this->session->set_flashdata('message', 'Berhasil menambahkan konten');
        }else{
          $this->session->set_flashdata('error', 'Gagal menambahkan konten');
        }
				redirect(base_url("admin"));
      }
    }
  }

  public function blog_upload(){
    if($this->session->userdata('status') != "login"){
      redirect(base_url("login"));
    }else{
      // you can upload if your state is logged in
      $config['upload_path'] = './images/';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = 2000;
      $config['max_width'] = 1500;
      $config['max_height'] = 1500;
      $this->load->library('upload', $config);
    }

  }

  public function blog_content_detail($slug){
    $query = "SELECT * FROM blog where slug='$slug'";
    $query_result = $this->db->query($query);
    $query_resulat_array = $this->db->query($query)->result();
    if($query_result->num_rows() > 0 ){
      $x['data']= $query_result;
      $x['title_bar'] = $query_resulat_array[0]->title;
      $x['header_page'] = "";
      $this->load->view('frontpage/frontheader', $x);
      $this->load->view('frontpage/frontblogdetail',$x);
      $this->load->view('frontpage/frontfooter', $x);
    }else{
      redirect(base_url("blog"));
    }
  } 

  public function blog_content_list(){
      $query="SELECT * FROM blog order by date_created";
      $query_result = $this->db->query($query);
      $result = json_encode($query_result->result());
      echo $result;
  }

  public function blog_content_list_ex(){
    if($this->session->userdata('status') != "login"){
      redirect(base_url("login"));
    }else{
      $query="SELECT blog_id, title, subtitle, author_id, date_created, max_length, image_path, category, tag, bookmark, likes FROM blog order by date_created";
      $query_result = $this->db->query($query);
      $result = json_encode($query_result->result());
      echo $result;
    }
  }

}

?>