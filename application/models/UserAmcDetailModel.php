<?php

class UserAmcDetailModel extends CI_Model {

    public function insert_user_amc_detail($data) {

        $id = $this->db->insert('user_amc_details', $data);
        if (!empty($id)) {
            $this->db->query("UPDATE user_product_mapping SET `upcomming_amc_date` = DATE_ADD(`upcomming_amc_date`, INTERVAL 1 YEAR) WHERE id=".$data['upm_id']);
        }
        return $id;
    }

    public function get_user_amc_detail($id, $upmId) {
        $data;

        $this->db->select('uad.id as amc_detail_id,'
                . 'uad.upm_id,'
                . 'upm.user_id,'
                . 'um.business_name,'
                . 'um.owner_name,'
                . 'upm.product_id,'
                . 'pm.name as product_name,'
                . 'uad.amc_amount,'
                . 'DATE_FORMAT(uad.amc_date,"%d/%m/%Y") as amc_date,'
                . 'uad.description as amc_remark');

        $this->db->from('user_amc_details uad');
        $this->db->join('user_product_mapping upm', 'upm.id = uad.upm_id');
        $this->db->join('user_master um', 'um.id = upm.user_id');
        $this->db->join('product_master pm', 'pm.id = upm.product_id');

        if ($id != 0 && $upmId != 0) {
            $this->db->where('uad.id', $id);
            $this->db->where('uad.upm_id', $upmId);
            $data = $this->db->get()->row_array();
        } else if ($id == 0 && $upmId != 0) {
            $this->db->where('uad.upm_id', $upmId);
            $data = $this->db->get()->result();
        } else {
            $data = $this->db->get()->result();
        }
        return $data;
    }

    public function update_user_amc_detail($data, $id, $umpId) {
        $this->db->where('id', $data['id']);
        $this->db->where('upm_id', $data['upm_id']);
        $this->db->update('user_amc_details', $data);
    }

    public function delete_user_amc_detail($id, $umpId) {
        return $this->db->delete('user_amc_details', array('id' => $id, 'upm_id' => $umpId));
    }

    public function check_amc_date($upmId) {
        //this query get record between current year of january 1 to next year of january 1 example:between 2021-01-01 to 2022-01-01
//SELECT COUNT(*) FROM user_amc_details
//WHERE (amc_date BETWEEN MAKEDATE(YEAR(CURDATE()), 1) AND MAKEDATE(YEAR(CURDATE())+1, 1)) AND upm_id=2

        $query = $this->db->query("SELECT * FROM user_amc_details
WHERE (amc_date BETWEEN MAKEDATE(YEAR(CURDATE()), 1) AND MAKEDATE(YEAR(CURDATE())+1, 1)) AND upm_id=$upmId;");

        return $query->row();
    }

}
