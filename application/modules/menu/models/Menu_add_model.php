<?php
class Menu_add_model extends CI_Model {
  
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
  
    public function get_users() {
        $query = $this->db->get('');
        return $query->result();
    }
  
    public function insert_menu($data) {
        $this->db->insert('top_menu', $data);
        return $this->db->insert_id();
    }
  
    // public function update_user($id, $data) {
    //     $this->db->where('id', $id);
    //     $this->db->update('users', $data);
    // }
  
    // public function delete_user($id) {
    //     $this->db->where('id', $id);
    //     $this->db->delete('users');
    // }
}
?>
