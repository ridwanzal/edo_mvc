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

      if($submit){
        $data = array(
          'title' => $title,
          'subtitle' => $subtitle,
          'author_id' => $author_id,
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
          'author_id' => $author_id,
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

  public function blog_content_list(){
      $query="SELECT * FROM blog order by date_created";
      $query_result = $this->db->query($query);
      $result = json_encode($query_result->result());
      echo $result;
  }

  public function blog_content_list_ex(){
      $query="SELECT blog_id, title, subtitle, author_id, date_created, max_length, image_path, category, tag, bookmark, likes FROM blog order by date_created";
      $query_result = $this->db->query($query);
      $result = json_encode($query_result->result());
      echo $result;
  }

}

?>