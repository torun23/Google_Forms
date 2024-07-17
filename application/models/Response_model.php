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
    }
}
