<? 
  // model users
  class Users_model extends CI_Model {
    
    public function get_login($username, $password){
      return $this->db->get_where('users', ['username' => $username, 'password' => md5($password)])->result_array();
    }
  }

?>