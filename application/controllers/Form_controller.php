<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_controller extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/forms_ui');
	}
}