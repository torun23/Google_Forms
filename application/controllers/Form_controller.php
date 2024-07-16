<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_controller extends CI_Controller {

	public function index_forms()
	{
 $this->load->view('Frontend/header');

 $this->load->model('Frontend_model');

 $data= $this->Frontend_model->getforms();
 $this->load->view('Tables/list_forms',['forms'=> $data]);


 $this->load->view('Frontend/footer');

	}

	public function delete($id)
	{
$this->load->model('Frontend_model');
$this->Frontend_model->deleteForm($id);
$this->session->set_flashdata('status','Form data deleted successfully');
redirect('forms_home');
	}

}