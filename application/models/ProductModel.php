<?php

class ProductModel extends CI_Model {

    public function insert_product($data) {

        $this->db->insert('product_master', $data);
        return $this->db->insert_id();
    }

    public function get_product($id) {
        $data;
        if ($id != 0) {
            $data = $query = $this->db->get_where('product_master', array('id' => $id))->row_array();
        } else {
            $this->db->from('product_master');
            $this->db->order_by('id', 'DESC');
            $data = $this->db->get()->result();
        }
        return $data;
    }

    public function update_product($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('product_master', $data);
    }
    
    public function delete_product($id) {
        return $this->db->delete('product_master', array('id' => $id));
    }

}
