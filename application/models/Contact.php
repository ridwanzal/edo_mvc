<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Model{
  public $name;
  public $email;
  public $message;

  public function insert_contact(){
    $this->$name  = $_POST['name'];
    $this->$email = $_POST['email'];
    $this->message = $_POST['message'];

    $this->db-insert('entries', $this);
  }

}

?>