<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Your_controller extends CI_Controller
{

public function getFormId()
{
    // Check if user is logged in and get user_id from session
    $user_id = $this->session->userdata('user_id');

    // Query to fetch form_id from database based on user_id
    $form_id = $this->your_model->getFormIdByUserId($user_id); // Replace with your actual model method

    // Return form_id as JSON response
    $this->output
         ->set_content_type('application/json')
         ->set_output(json_encode(array('form_id' => $form_id)));
}
}
