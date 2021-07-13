<?php

class ServiceModel extends CI_Model {

    public function insert_service($data) {

        $this->db->insert('service_type_master', $data);
        return $this->db->insert_id();
    }

    public function get_service($id) {
        $data;
        if ($id != 0) {
            $data = $query = $this->db->get_where('service_type_master', array('id' => $id))->row_array();
        } else {
            $data = $this->db->get('service_type_master')->result();
        }
        return $data;
    }

    public function update_service($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('service_type_master', $data);

        return true;
    }

    public function delete_service($id) {
        return $this->db->delete('service_type_master', array('id' => $id));
    }

}
