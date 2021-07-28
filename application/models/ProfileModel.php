<?php

class ProfileModel extends CI_Model {

    public function insert_profile($data) {

        $this->db->insert('profile_master', $data);
        return $this->db->insert_id();
    }

    public function get_profile($id) {
        $data;

        $this->db->select('pm.id,'
                . 'pm.role_id,'
                . ' pm.title,'
                . ' pm.is_active,'
                . ' rm.role');
        $this->db->join('role_master rm', 'pm.role_id = rm.id');

        if ($id != 0) {
            $data = $query = $this->db->get_where('profile_master pm', array('pm.id' => $id))->row_array();
        } else {
            $data = $this->db->get('profile_master pm')->result();
        }
        return $data;
    }
    
    public function get_profile_asper_role($id) {
      $data=[]; 
      $this->db->select('pm.id,'
                . 'pm.role_id,'
                . ' pm.title,'
                . ' pm.is_active,'
                . ' rm.role');
        $this->db->join('role_master rm', 'pm.role_id = rm.id');

        if ($id != 0) {
            $data = $query = $this->db->get_where('profile_master pm', array('pm.role_id' => $id))->result();
        } 
        return $data;
    }

    public function update_profile($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('profile_master', $data);

        return true;
    }

    public function delete_profile($id) {
        return $this->db->delete('profile_master', array('id' => $id));
    }

}
