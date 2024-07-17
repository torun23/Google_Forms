<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index1()
	{
		$this->load->view('templates/header');
		$this->load->view('pages/about');
		$this->load->view('templates/footer');


	}
	public function index2()
	{
		// $this->load->view('templates/header');
		$this->load->view('Frontend/header');

		$this->load->view('Form_controller/index_forms');
		// $this->load->view('templates/footer');
		$this->load->view('Frontend/footer');



	}
	public function index3()
	{
		$this->load->view('templates/header');
		$this->load->view('pages/homepage');
		$this->load->view('templates/footer');
}

public function design_form(){
	$this->load->view('templates/forms_ui');
}
public function title(){
	$this->load->view('templates/header');
	$this->load->view('templates/form_title');
	$this->load->view('templates/footer');

}
public function index4()
{
	$this->load->view('templates/forms_ui');
}

// public function preview_forms($data)

// {	$this->load->view('templates/header');

// 	$this->load->view('form_preview',$data);
// 	$this->load->view('templates/footer');

// }
}