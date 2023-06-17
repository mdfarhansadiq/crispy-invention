<?php
class Add_menu_model extends CI_Model {
  
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
  
    public function get_menus() {
        $query = $this->db->get('add_menu');
        return $query->result();
    }
  
    public function insert_menu($data) {
        $this->db->insert('add_menu', $data);
        return $this->db->insert_id();
    }
  

    public function edit($id) {
        // Handle form submission
        if ($_POST) {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email')
            );
  
            // Update user
            $this->User_model->update_user($id, $data);
  
            // Redirect to user list
            redirect('user');
        }
  
        // Fetch the user
        $data['user'] = $this->User_model->get_user($id);
  
        // Show edit user form
        $this->load->view('edit_user', $data);
    }
  
    // public function delete_user($id) {
    //     $this->db->where('id', $id);
    //     $this->db->delete('users');
    // }
}
?>
