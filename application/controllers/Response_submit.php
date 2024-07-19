<?php
class Response_submit extends CI_Controller {

    public function view($form_id) {
        $this->load->model('Response_model');

        $data['form'] = $this->Response_model->get_form($form_id);
        $questions = $this->Response_model->get_questions($form_id);

        foreach ($questions as $question) {
            $question->options = $this->Response_model->get_options($question->id);
        }

        $data['questions'] = $questions;

        // Redirect to the view_responses function in the Response_submit controller
        redirect('Response_submit/view_responses/' . $form_id);
    }

    public function view_responses($form_id) {
        $this->load->model('Response_model');

        $data['form'] = $this->Response_model->get_form($form_id);
        $data['responses'] = $this->Response_model->get_responses_by_form($form_id);

        $this->load->view('templates/header');
        $this->load->view('responses_list', $data);
        $this->load->view('templates/footer');

    }

    public function submit_form() {
        $this->load->model('Response_model');
        $responses = $this->input->post('responses');
        $user_id = $this->session->userdata('user_id'); // Assuming user_id is stored in session

        foreach ($responses as $response) {
            $answered_text = '';

            if (isset($response['options'])) {
                if (is_array($response['options'])) {
                    $answered_text = implode(', ', $response['options']);
                } else {
                    $answered_text = $response['options'];
                }
            } else if (isset($response['answered_text'])) {
                $answered_text = $response['answered_text'];
            }

            // Find the max response_id for the given form_id
            $this->db->select_max('response_id');
            $this->db->where('form_id', $response['form_id']);
            $max_response_id = $this->db->get('responses')->row()->response_id;

            // Increment the response_id by 1
            $new_response_id = $max_response_id + 1;

            $data = [
                'form_id' => $response['form_id'],
                'user_id' => $user_id,
                'question_id' => $response['question_id'],
                'answered_text' => $answered_text,
                'response_id' => $new_response_id,
                'submitted_at' => date('Y-m-d H:i:s')
            ];

            $this->Response_model->insert_response($data);
        }

        redirect('Response_submit/view_responses/' . $response['form_id']);
    }
    
    
        // Method to list responses for a form
        public function list_responses($form_id) {
            $this->load->model('Response_model');
            $data['form'] = $this->Response_model->get_form($form_id);
            $data['responses'] = $this->Response_model->get_responses($form_id);
            
            $this->load->view('Frontend/header');
            $this->load->view('responses_list_view', $data);
            $this->load->view('Frontend/footer');
        }
    
        // Method to view questions and answers for a specific response
        public function viewresponse($response_id) {
            $this->load->model('Response_model');
            $data['response'] = $this->Response_model->get_response($response_id);
            $data['form'] = $this->Response_model->get_form_by_response($response_id); // Get form details
            $data['questions'] = $this->Response_model->get_questions_and_answers($response_id);
            
            $this->load->view('templates/header');
            $this->load->view('response_details_view', $data);
            $this->load->view('templates/footer');
        }
}
