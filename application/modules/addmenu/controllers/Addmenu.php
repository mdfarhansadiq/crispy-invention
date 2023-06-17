<?php
class Addmenu extends CI_Controller {
  
    public function __construct() {
        parent::__construct();
        $this->load->model('Add_menu_model');
    }
  
    public function index() {
        // Fetch all users
        $data['menus'] = $this->Add_menu_model->get_menus();
  
        // Pass the data to the view
        $this->load->view('addmenu', $data);
       
    }

  
    public function create() {
        // Handle form submission
        if ($_POST) {
            $data = array(
                'menuname' => $this->input->post('menuname'),
                'checksubmenu' => $this->input->post('checksubmenu'),
                'menuslug' => $this->input->post('menuslug')
            );
  
            // Insert user
            $this->Add_menu_model->insert_menu($data);
  
            // Redirect to user list
            redirect('addmenu');
        }
  
        // Show create user form
        $this->load->view('addmenu');
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
