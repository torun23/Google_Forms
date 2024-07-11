<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/footer');

	}

	public function index1()
	{
		$this->load->view('templates/header');
		$this->load->view('pages/about');
		$this->load->view('templates/footer');


	}
	public function index2()
	{
		$this->load->view('templates/header');
		$this->load->view('pages/formspage');
		$this->load->view('templates/footer');


	}
	public function index3()
	{
		$this->load->view('templates/header');
		$this->load->view('pages/homepage');
		$this->load->view('templates/footer');
}

public function create_form(){
	$this->load->view('templates/forms_ui');
}
}