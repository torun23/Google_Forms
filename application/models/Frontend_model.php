
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_model extends CI_Model {
    public function getforms(){
        $query = $this->db->get("forms");
        return $query->result();
    }
    
    public function deleteForm($id){  
        return $this->db->delete('forms', ['id' => $id]);
        }

}