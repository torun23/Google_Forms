<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publish_controller extends CI_Controller {

// Method to publish a form
public function publish_form($form_id) {
    // Generate a unique link
    $response_link = base_url("forms/preview/" . $form_id);
$this->load->model('Publish_model');
    // Update is_published to 1 and set the response link
    $this->Publish_model->update_form($form_id, [
        'is_published' => 1,
        'response_link' => $response_link
    ]);

    // Redirect to the list_user_published_forms function
    redirect('Publish_controller/list_user_published_forms');
}

// Method to list published forms of a user
public function list_user_published_forms() {
    $user_id = $this->session->userdata('user_id');
    $this->load->model('Publish_model');
    $data['forms'] = $this->Publish_model->get_published_forms_by_user($user_id);

    $this->load->view('Frontend/header');
    $this->load->view('publish_view', $data);
    $this->load->view('Frontend/footer');
}
}
