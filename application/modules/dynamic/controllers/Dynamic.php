<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dynamic extends MX_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('addmenu/Add_menu_model');
  }

  public function fin_yearlist()
  {
    $data['title'] = display('Add Menu');
    $data['module'] = "dynamic";
    $data['page']   = "financial_year";
    $data['menus'] = $this->Add_menu_model->get_menus();
    echo Modules::run('template/layout', $data);
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
      redirect('dynamic_menu');
    }

    // Show create user form
    $this->load->view('financial_year');
  }


  public function edit($id)
  {
    // Handle form submission
    $data['module'] = "dynamic";
    $data['page']   = "financial_year_edit";
    $this->load->model('Add_menu_model');

    $data['menu'] = $this->Add_menu_model->edit_menu($id);
    // Fetch the user
    // Show edit user form
    $this->load->view('financial_year_edit', $data);
    echo Modules::run('template/layout', $data);
  }

  public function update($id)
  {
    if ($_POST) {
      $data = array(
        'menuname' => $this->input->post('menuname'),
        'checksubmenu' => $this->input->post('checksubmenu'),
        'menuslug' => $this->input->post('menuslug')
      );

      $this->db->where('id', $id);
      $this->db->update('add_menu', $data);

      // $this->load->model('Add_menu_model');
      // Insert user

      // Redirect to user list
      redirect('dynamic_menu');
    }

    //redirect(base_url('addmenu'));
  }

  public function delete($id)
    {
        // Delete user
        $this->Add_menu_model->delete_menu($id);

        // Redirect to user list
        redirect('dynamic_menu');
    }
}
