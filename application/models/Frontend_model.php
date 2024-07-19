
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_model extends CI_Model {
    public function getforms()
    {
        // Get the user_id from session
        $user_id = $this->session->userdata('user_id');

        // Ensure user_id is set
        if (!$user_id) {
            return []; // Return an empty array if user_id is not available
        }

        // Filter forms by user_id
        $this->db->where('user_id', $user_id); // Assuming 'user_id' is the column name in the 'forms' table
        $query = $this->db->get('forms');
        
        return $query->result(); // Return the result as an array of objects
    }
    public function deleteForm($id){  
        return $this->db->delete('forms', ['id' => $id]);
        }
        public function getFormById($form_id)
        {
            $query = $this->db->get_where('forms', ['id' => $form_id]);
            return $query->row_array();
        }
}