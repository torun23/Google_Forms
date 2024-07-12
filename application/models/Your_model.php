
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Your_model extends CI_Model {
public function getFormIdByUserId($user_id)
{
    $this->db->select('form_id');
    $this->db->where('user_id', $user_id);
    $query = $this->db->get('forms'); // Replace 'your_forms_table' with your actual table name

    if ($query->num_rows() > 0) {
        $row = $query->row();
        return $row->form_id;
    } else {
        return null; // Handle case when form_id is not found
    }
}
}