<?php
// Form_controller.php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menumethod extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load necessary libraries, models, etc.
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        // Load the form view
        $this->load->view('MenuForm');
    }

    public function submit_form() {
        // Set form validation rules
        $this->form_validation->set_rules('menuname', 'MenuName', 'required');
        // $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed, reload the form view with validation errors
            $this->load->view('form_view');
        } else {
            // Form validation succeeded, process the form data
            $menuname = $this->input->post('menuname');
            // $email = $this->input->post('email');

            // You can perform any necessary actions with the form data here,
            // such as storing it in a database, sending emails, etc.

            // Redirect to a success page or display a success message
            $this->load->view('success_view');
        }
    }
}
