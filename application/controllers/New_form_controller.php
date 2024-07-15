<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_form_controller extends CI_Controller {

    public function submit_form() {
        // no need to decode the data
        $formData = $this->input->post('formData');


      $formId = $this->session->userdata('form_id');
        if ($formId) {
            // Save questions and options associated with the form_id
            $this->load->model('new_form_model');
            $this->new_form_model->save_form_data($formId, $formData);

            echo json_encode(['status' => 'success', 'message' => 'Form data submitted successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to submit form data']);
        }
    }

}
?>