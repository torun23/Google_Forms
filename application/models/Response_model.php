<?php
class Response_model extends CI_Model {

    public function insert_response($data) {
        $this->db->insert('responses', $data);
        return $this->db->insert_id();
    }

    public function get_form($form_id) {
        $this->db->where('id', $form_id);
        $query = $this->db->get('forms');
        return $query->row();
    }

    public function get_questions($form_id) {
        $this->db->where('form_id', $form_id);
        $query = $this->db->get('questions');
        return $query->result();
    }

    public function get_options($question_id) {
        $this->db->where('question_id', $question_id);
        $query = $this->db->get('options');
        return $query->result();
    }

    public function get_responses_by_form($form_id) {
        $this->db->select('responses.response_id, MAX(responses.submitted_at) as submitted_at, users.username');
        $this->db->from('responses');
        $this->db->join('users', 'responses.user_id = users.id');
        $this->db->where('responses.form_id', $form_id);
        $this->db->group_by('responses.response_id, users.username');
        $query = $this->db->get();
        return $query->result();
    }    public function get_responses($form_id) {
        $this->db->where('form_id', $form_id);
        $query = $this->db->get('responses');
        return $query->result();
    }


    // Method to get response details
    public function get_response($response_id) {
        $this->db->where('response_id', $response_id);
        $query = $this->db->get('responses');
        return $query->row();
    }

    // Method to get questions and answers for a response
    public function get_questions_and_answers($response_id) {
        $this->db->select('questions.id AS question_id, questions.text AS question_text, responses.answered_text');
        $this->db->from('questions');
        $this->db->join('responses', 'questions.id = responses.question_id');
        $this->db->where('responses.response_id', $response_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_form_by_response($response_id) {
        $this->db->select('forms.title, forms.description');
        $this->db->from('forms');
        $this->db->join('responses', 'forms.id = responses.form_id');
        $this->db->where('responses.response_id', $response_id);
        $query = $this->db->get();
        return $query->row();
    }
}
