<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RoomReservationrequest extends MX_Controller
{

  public function __construct()
  {
    parent::__construct();

    // $this->load->model('addsubmenu/Add_sub_menu_model', 'Add_sub_menu_model');
    $this->load->model('roomreservationrequest/Room_reservation_request_model', 'Room_reservation_request_model');
  }

  public function index()
  {
    $data['title'] = display('Room Reservation Request');
    $data['module'] = "roomreservationrequest";
    $data['page']   = "roomreservationrequest";
    $data['customerbookinginfos'] = $this->Room_reservation_request_model->get_booking_info();
    // $data['submenus'] = $this->Add_sub_menu_model->get_sub_menus();
    echo Modules::run('template/layout', $data);
  }

  // public function create()
  // {
  //   // Handle form submission
  //   if ($_POST) {
  //     $data = array(
  //       'menuselect' => $this->input->post('menuselect'),
  //       'submenuname' => $this->input->post('submenuname'),
  //       'checksubsubmenu' => $this->input->post('checksubsubmenu'),
  //       'submenuslug' => $this->input->post('submenuslug')
  //     );

  //     // Insert user
  //     $this->Add_sub_menu_model->insert_menu($data);

  //     // Redirect to user list
  //     redirect('addsubmenu');
  //   }

  //   // Show create user form
  //   $this->load->view('addsubmenu');
  // }


  public function specificcustomerbookingaccept($id)
  {
    // Handle form submission
    $data['module'] = "roomreservationrequest";
    $data['page']   = "roomreservationrequest";
    $this->load->model('roomreservationrequest/Room_reservation_request_model', 'Room_reservation_request_model');

    $data['accept'] = $this->Room_reservation_request_model->specific_customer_booking_info_accept($id);
    // Fetch the user
    // Show edit user form
    redirect('roomreservationrequest');
    $this->load->view('roomreservationrequest', $data);
    echo Modules::run('template/layout', $data);
  }

  // public function update($id)
  // {
  //   if ($_POST) {
  //     $data = array(
  //       'menuselect' => $this->input->post('menuselect'),
  //       'submenuname' => $this->input->post('submenuname'),
  //       'checksubsubmenu' => $this->input->post('checksubsubmenu'),
  //       'submenuslug' => $this->input->post('submenuslug')
  //     );

  //     $this->db->where('id', $id);
  //     $this->db->update('add_sub_menu', $data);

  //     // $this->load->model('Add_menu_model');
  //     // Insert user

  //     // Redirect to user list
  //     redirect('addsubmenu');
  //   }

  //   //redirect(base_url('addmenu'));
  // }

  // public function delete($id)
  // {
  //   // Delete user
  //   $this->Add_sub_menu_model->delete_submenu($id);

  //   // Redirect to user list
  //   redirect('addsubmenu');
  // }
}
