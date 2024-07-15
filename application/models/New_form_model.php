<?php
class New_form_model extends CI_Model {

    public function save_form_data($formId,$formData) {
        if (!$formId) {
            return false; // Handle error if formId is not valid
        }
        foreach ($formData['questions'] as $question) {
            $questionData = [
            'form_id' => $formId,
            'text' => $question['text'],       
            'type' => $question['type'],      
            'required' => ($question['required'] == 'true') ? 0 : 1
            ];
    
            $this->db->insert('questions', $questionData);
            $questionId = $this->db->insert_id(); // Get the inserted question_id
    
            foreach ($question['options'] as $option) {
                $optionData = [  'question_id' => $questionId,
                'option_text' => $option];
                  
                // Insert option into options table
                $this->db->insert('options', $optionData);
            }
        }
    
        return true; // Return true indicating success
    }
    
    

}
?>
