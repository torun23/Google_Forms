<?php
class preview_model extends CI_Model {

    public function get_form($form_id)
    {
        return $this->db->get_where('forms', array('id' => $form_id))->row();
    }
    
    public function get_questions($form_id)
    {
        return $this->db->get_where('questions', array('form_id' => $form_id))->result();
    }
    
    public function get_options($question_id)
    {
        return $this->db->get_where('options', array('question_id' => $question_id))->result();
    }
    
}