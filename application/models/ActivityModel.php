<?php

class ActivityModel extends CI_Model {

    public function insert_activity($data) {

        $this->db->insert('activity_master', $data);
        return $this->db->insert_id();
    }

    public function get_activity($id) {
        $data;
        if ($id != 0) {
            $data = $query = $this->db->get_where('activity_master', array('id' => $id))->row_array();
        } else {
            $data = $this->db->get('activity_master')->result();
        }
        return $data;
    }

    public function update_activity($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('activity_master', $data);

        return true;
    }

    public function delete_activity($id) {
        return $this->db->delete('activity_master', array('id' => $id));
    }

}
