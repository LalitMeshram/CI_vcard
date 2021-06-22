<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class UserProductMappingController extends REST_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('UserProductMappingModel', 'mapping');
    }

    public function user_product_get($id = 0) {
        $response = [];
        $data = $this->mapping->get_user_product($id);
        if (!empty($data)) {
            $response['data'] = $data;
            $response['msg'] = 'All Data Fetch successfully!';
            $response['status'] = 200;
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            $response['msg'] = 'Data not Found!';
            $response['status'] = 404;
            $this->response($response, REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function user_product_post() {
        $response = [];

        $data['user_id'] = $this->post('userId');
        $data['product_id'] = $this->post('productId');
        $data['installation_date'] = $this->post('installationDate');
        $data['installation_amount'] = $this->post('installationAmount');
        $data['amc_amount_per_year'] = $this->post('amcAmountPerYear');
        $data['upcomming_amc_date'] = $this->post('upcommingAmcDate');
        $data['description'] = $this->post('description');

        $id = $this->mapping->insert_user_product($data);
        if (!empty($id)) {
            $response['msg'] = 'Data successfully inserted!';
            $response['id'] = $id;
            $response['status'] = 200;
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            $response['msg'] = 'Bad Request!';
            $response['id'] = $id;
            $response['status'] = 400;
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function user_product_update_post() {
        $response = [];
//        print_r($this->post());exit;
        if (!empty($this->mapping->get_user_product($this->post('uId')))) {
            $data['id'] = $this->post('uId');
            $data['user_id'] = $this->post('uuserId');
        $data['product_id'] = $this->post('uproductId');
            $data['installation_date'] = $this->post('uinstallationDate');
            $data['installation_amount'] = $this->post('uinstallationAmount');
            $data['amc_amount_per_year'] = $this->post('uamcAmountPerYear');
            $data['upcomming_amc_date'] = $this->post('uupcommingAmcDate');
            $data['description'] = $this->post('udescription');

            $this->mapping->update_user_product($data);

            $response['msg'] = 'Details Updated successfully!';
            $response['status'] = 200;
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            $response['msg'] = 'Data not Found!';
            $response['status'] = 404;
            $this->response($response, REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function user_product_delete($id) {
        $response = [];
        if (!empty($this->mapping->get_user_product($id))) {
            $result = $this->mapping->delete_user_product($id);
            if ($result == 1) {
                $response['msg'] = 'User Product successfully deleted!';
                $response['status'] = 200;
                $this->response($response, REST_Controller::HTTP_OK);
            } else {
                $response['msg'] = 'Bad request!';
                $response['status'] = 400;
                $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            $response['msg'] = 'Record not Found!';
            $response['status'] = 404;
            $this->response($response, REST_Controller::HTTP_NOT_FOUND);
        }
    }

}
