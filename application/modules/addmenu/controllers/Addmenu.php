<?php
class Addmenu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Add_menu_model');
    }

    public function index()
    {
        // Fetch all users
        $data['menus'] = $this->Add_menu_model->get_menus();

        // Pass the data to the view
        $this->load->view('addmenu', $data);
    }


    public function create()
    {
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

    public function edit($id)
    {
        // Handle form submission
        $this->load->model('Add_menu_model');

        $data['menu'] = $this->Add_menu_model->edit_menu($id);
        // Fetch the user
        // Show edit user form
        $this->load->view('addmenuedit', $data);
    }

    // public function update($id)
    // {
    //     if ($_POST) {
    //         $data = array(
    //             'menuname' => $this->input->post('menuname'),
    //             'checksubmenu' => $this->input->post('checksubmenu'),
    //             'menuslug' => $this->input->post('menuslug')
    //         );

    //         // Update user
    //         $this->Add_menu_model->update_menu($id, $data);

    //         // Redirect to user list
    //         redirect('addmenu');
    //     }
    // }

    // public function delete($id) {
    //     // Delete user
    //     $this->Menu_add_model->delete_user($id);

    //     // Redirect to user list
    //     redirect('user');
    // }
}
