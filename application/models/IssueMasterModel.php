<?php

class IssueMasterModel extends CI_Model {

    public function insert_issue($data) {

        $this->db->insert('issue_master', $data);
        return $this->db->insert_id();
    }

    public function get_issue($id) {
        $data;
        
        $this->db->select('im.id as im_id,'
                . 'im.`client_id`,'
                . 'im.`product_id`,'
                . 'um.owner_name,'
                . 'pm.name as product_name,'
                . 'im.`issue`,'
                . 'im.`call_date`,'
                . 'im.`solution`,'
                . 'im.`status`,'
                . 'im.`start_date`,'
                . 'im.`close_date`');
        $this->db->from('issue_master im');
        $this->db->join('user_master um','um.id=im.`client_id');
        $this->db->join('product_master pm','pm.id=im.`product_id');
        
        
        
        
        if ($id != 0) {
            
             $this->db->where('im.id',$id);
             $data = $this->db->get()->row_array();
        } else {
            
            $data = $this->db->get()->result();
        }
        return $data;
    }

    public function update_issue($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('issue_master', $data);
    }
    
    public function delete_issue($id) {
        return $this->db->delete('issue_master', array('id' => $id));
    }

}
