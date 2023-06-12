<?php
class Menumethod extends CI_Controller {
  
    public function __construct() {
        parent::__construct();
        $this->load->model('Menu_add_model');
    }
  
    public function index() {
        // Fetch all users
        $data['users'] = $this->Menu_add_model->get_users();
  
        // Pass the data to the view
        $this->load->view('user_list', $data);
    }
  
    public function create() {
        // Handle form submission
        if ($_POST) {
            $data = array(
                'menu_name' => $this->input->post('menu_name'),
                'menu_slug' => $this->input->post('menu_slug'),
                'parentid' => '0',
                'entrydate' => date("Y-m-d"),
                'isactive' => '1'
            );
  
            // Insert user
            $this->Menu_add_model->insert_menu($data);
  
            // Redirect to user list
            redirect('setting');
        }
  
        // Show create user form
        $this->load->view('menu_list');
    }
  
    // public function edit($id) {
    //     // Handle form submission
    //     if ($_POST) {
    //         $data = array(
    //             'name' => $this->input->post('name'),
    //             'email' => $this->input->post('email')
    //         );
  
    //         // Update user
    //         $this->Menu_add_model->update_user($id, $data);
  
    //         // Redirect to user list
    //         redirect('user');
    //     }
  
    //     // Fetch the user
    //     $data['user'] = $this->Menu_add_model->get_user($id);
  
    //     // Show edit user form
    //     $this->load->view('edit_user', $data);
    // }
  
    // public function delete($id) {
    //     // Delete user
    //     $this->Menu_add_model->delete_user($id);
  
    //     // Redirect to user list
    //     redirect('user');
    // }
}
?>
