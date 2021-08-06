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
            $data = $query = $this->db->get_where('user_permission_master upm', array('upm.user_id' => $userId))->result_array();
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
    
   public function getUserPermissionforLogin($userId) {
        $data;
        
        $this->db->select(
                'upm.activity_id,'
                . 'am.activity_title,'
                .'am.category,'
                .'am.url,'
                .'am.is_active as activityisActive,'
                .'upm.profile_master_id,'
                .'upm.user_id,'
                .'upm._view,'
                .'upm._create,'
                .'upm._update,'
                .'upm._delete,'
                .'upm.permissionBtn,'
                .'upm.is_active as userisActive'
                );
        $this->db->join('activity_master am', 'am.id = upm.activity_id');
        
        if ($userId != 0) {
            $data = $query = $this->db->get_where('user_permission_master upm', array('upm.user_id' => $userId))->result_array();
        } else {
            $data =array();
        }
        return $data;
    }
    
    
}