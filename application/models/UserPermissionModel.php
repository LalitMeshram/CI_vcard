<?php

class UserPermissionModel extends CI_Model {
    
    
     public function insert_permission($data) {

        $this->db->insert_batch('user_permission_master', $data);
        return true;
//        return $this->db->insert_id();
    }

    
    public function getUserPermission($userId) {
        $data;
        if ($userId != 0) {
            $data = $query = $this->db->get_where('user_permission_master', array('user_id' => $userId))->result_array();
        } else {
            $data =array();
        }
        return $data;
    }
    
    public function setUserPermission($data) {
        $this->db->insert_batch('user_permission_master', $data);
        return true;
    }
    
    public function delete_permissions($userId) {
        $this->db->where('user_id', $userId);
       return $this->db->delete('user_permission_master');
    }
    
}