<?php

class ProductInvestmentModel extends CI_Model {

    public function insert_investment($data) {

        $this->db->insert('product_investment_master', $data);
        return $this->db->insert_id();
    }

    public function get_investment($id) {
        $data;
        if ($id != 0) {
            $data = $query = $this->db->get_where('product_investment_master', array('id' => $id))->row_array();
        } else {
            $data = $this->db->get('product_investment_master')->result();
        }
        return $data;
    }

    public function update_investment($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('product_investment_master', $data);
    }
    
    public function delete_investment($id) {
        return $this->db->delete('product_investment_master', array('id' => $id));
    }

}
