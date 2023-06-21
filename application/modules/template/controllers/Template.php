<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'template_model'
		));
		$this->load->model('addsubsubmenu/Add_sub_sub_menu_model', 'Add_sub_sub_menu_model');
		$this->load->model('addsubmenu/Add_sub_menu_model', 'Add_sub_menu_model');
		$this->load->model('addmainmenu/Add_menu_model', 'Add_menu_model');
	}
 
	public function layout($data)
	{  
		if (! $this->session->userdata('isLogIn'))
		redirect('login');
		$id = $this->session->userdata('id');
		$data['notifications'] = $this->template_model->notifications($id);
		$data['quick_messages'] = $this->template_model->messages($id);
		$data['setting'] = $this->template_model->setting();
		$data['menus'] = $this->Add_menu_model->get_menus();
		$data['submenus'] = $this->Add_sub_menu_model->get_sub_menus();
		$data['subsubmenus'] = $this->Add_sub_sub_menu_model->get_sub_sub_menus();
		$this->load->view('layout', $data);
		echo Modules::run('template/includes/sidebar', $data);
	}
 
	public function login($data)
	{ 
		
		$data['setting'] = $this->template_model->setting();
		$data['web_setting'] = $this->template_model->read(); 
		$this->load->view('login', $data);
	}
 
}
