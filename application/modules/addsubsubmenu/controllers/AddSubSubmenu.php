<?php
class AddSubSubmenu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('addsubmenu/Add_sub_menu_model' ,'Add_sub_menu_model');
        $this->load->model('addsubsubmenu/Add_sub_sub_menu_model' ,'Add_sub_sub_menu_model');
        //$this->load->model('Add_menu_model');
    }

    public function index()
    {
        // Fetch all users
        // $data['menus'] = $this->Add_menu_model->get_menus();
        $data['submenus'] = $this->Add_sub_menu_model->get_sub_menus();
        $data['subsubmenus'] = $this->Add_sub_sub_menu_model->get_sub_sub_menus();
        // Pass the data to the view
        $this->load->view('addsubsubmenu', $data);
    }


    public function create()
    {
        // Handle form submission
        
        if ($_POST) {
            $data = array(
                'submenuselect' => $this->input->post('submenuselect'),
                'subsubmenuname' => $this->input->post('subsubmenuname'),
                'subsubmenuslug' => $this->input->post('subsubmenuslug')
            );

            // Insert user
            $this->Add_sub_sub_menu_model->insert_menu($data);

            // Redirect to user list
            redirect('addsubsubmenu');
        }

        // Show create user form
        $this->load->view('addsubsubmenu');
    }

    public function edit($id)
    {
        // Handle form submission
        //$this->load->model('Add_menu_model');
        $data['submenus'] = $this->Add_sub_menu_model->get_sub_menus();
        $data['subsubmenu'] = $this->Add_sub_sub_menu_model->edit_sub_sub_menu($id);
        // Fetch the user
        // Show edit user form
        $this->load->view('addsubsubmenuedit', $data);
    }

    public function update($id)
    {
        if ($_POST) {
            $data = array(
                'submenuselect' => $this->input->post('submenuselect'),
                'subsubmenuname' => $this->input->post('subsubmenuname'),
                'subsubmenuslug' => $this->input->post('subsubmenuslug')
            );

            $this->db->where('id', $id);
            $this->db->update('add_sub_sub_menu', $data);

            // $this->load->model('Add_menu_model');
            // Insert user

            // Redirect to user list
            redirect('addsubsubmenu');
        }

        //redirect(base_url('addmenu'));
    }

    public function delete($id)
    {
        // Delete user
        $this->Add_sub_sub_menu_model->delete_subsubmenu($id);

        // Redirect to user list
        redirect('addsubsubmenu');
    }
}
