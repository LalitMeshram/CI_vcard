<?php

class UserProductMappingModel extends CI_Model {

    public function insert_user_product($data) {

        $this->db->insert('user_product_mapping', $data);
        return $this->db->insert_id();
    }

    public function get_user_product($id) {
        $data;
        
        $this->db->select('upm.id as upmId,upm.user_id as userId,'
                    . 'upm.product_id as productId,'
                    . 'upm.installation_date as installationDate,'
                    . 'upm.installation_amount as installationAmount,'
                    . 'upm.amc_amount_per_year as amcAmountPerYear,'
                    . 'upm.upcomming_amc_date as upcommingAmcDate,'
                    . 'upm.description as installationDescription,'
                    . 'um.owner_name as ownerName,'
                    . 'um.business_name as businessName,'
                    . 'um.emailid as ownerEmailid,'
                    . 'um.contact1,'
                    . 'um.contact2,'
                    . 'um.address,'
                    . 'um.highway,'
                    . 'um.city,'
                    . 'um.is_active as userStatus,'
                    . 'pm.name as productName,'
                    . 'pm.description as productDescription,'
                    . 'pm.type as productType,'
                    . 'pm.technology,'
                    . 'pm.web,'
                    . 'pm.android,'
                    . 'pm.is_active as productStatus');
            $this->db->from('user_product_mapping upm');
            $this->db->join('user_master um', 'um.id = upm.user_id');
            $this->db->join('product_master pm', 'pm.id = upm.product_id');
        
//        query
//        SELECT `upm`.`id` as `upmId`, `upm`.`user_id` as `userId`, `upm`.`product_id` as `productId`, `upm`.`installation_date` as `installationDate`, `upm`.`installation_amount` as `installationAmount`, `upm`.`amc_amount_per_year` as `amcAmountPerYear`, `upm`.`upcomming_amc_date` as `upcommingAmcDate`, `upm`.`description` as `installationDescription`, `um`.`owner_name` as `ownerName`, `um`.`business_name` as `businessName`, `um`.`emailid` as `ownerEmailid`, `um`.`contact1`, `um`.`contact2`, `um`.`address`, `um`.`highway`, `um`.`city`, `um`.`is_active` as `userStatus`, `pm`.`name` as `productName`, `pm`.`description` as `productDescription`, `pm`.`type` as `productType`, `pm`.`technology`, `pm`.`web`, `pm`.`android`, `pm`.`is_active` as `productStatus`
//FROM `user_product_mapping` `upm`
// LEFT JOIN `user_master` `um` ON `um`.`id` = `upm`.`user_id`
//LEFT JOIN `product_master` `pm` ON `pm`.`id` = `upm`.`product_id`
//        query
        
        if ($id != 0) {
            $this->db->where('upm.id', $id);
            $data = $this->db->get()->row_array();
        } else {
            $data = $this->db->get()->result();
        }
        return $data;
    }
    
    public function update_user_product($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('user_product_mapping', $data);
    }

    public function delete_user_product($id) {
        return $this->db->delete('user_product_mapping', array('id' => $id));
    }
}
