<?php

class ProfilePermissionModel extends CI_Model {

    public function insert_permission($data) {

        $this->db->insert_batch('profile_permission_master', $data);
        return true;
//        return $this->db->insert_id();
    }

  

    public function get_permission_asper_profile($profileId) {
        $data = [];
        $this->db->select('ppm.id,'
                . 'ppm.profile_id,'
                . ' ppm.activity_id,'
                . ' am.activity_title,'
                . ' ppm._create,'
                . ' ppm._update,'
                . ' ppm._delete'
        );
//        $this->db->join('profile_master pm', 'pm.id = ppm.profile_id');
        $this->db->join('activity_master am', 'am.id = ppm.activity_id');

        if ($profileId != 0) {
            $data = $query = $this->db->get_where('profile_permission_master ppm', array('ppm.profile_id' => $profileId))->result();
        }
        return $data;
    }

    

    public function delete_permissions($profilId) {
        $this->db->where('profile_id', $profilId);
       return $this->db->delete('profile_permission_master');
    }

}
