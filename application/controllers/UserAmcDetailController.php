<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class UserAmcDetailController extends REST_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('UserAmcDetailModel', 'amc');
    }

    public function user_amc_detail_get($id = 0, $upmId = 0) {
        $response = [];
        $data = $this->amc->get_user_amc_detail($id, $upmId);
        if (!empty($data)) {
            $response['data'] = $data;
            $response['msg'] = 'All Data Fetch successfully!';
            $response['status'] = 200;
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            $response['msg'] = 'Data not Found!';
            $response['status'] = 404;
            $this->response($response, REST_Controller::HTTP_OK);
        }
    }

    public function user_amc_detail_post() {
        $response = [];
//        echo ''.$this->amc->check_amc_date($this->post('upm_id'));exit;

        $result = $this->amc->check_amc_date($this->post('upm_id'));
        if (empty($result)) {
            $data['upm_id'] = $this->post('upm_id');
            $data['amc_amount'] = $this->post('amc_amount');
            $data['description'] = $this->post('description');
            $data['amc_date'] = $this->post('amc_date');

            $id = $this->amc->insert_user_amc_detail($data);
            if (!empty($id)) {
                $response['msg'] = 'Amc paid successfully!';
                $response['status'] = 200;
                $this->response($response, REST_Controller::HTTP_OK);
            } else {
                $response['msg'] = 'Bad Request!';
                $response['status'] = 400;
                $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            $response['msg'] = 'Amc already paid,please try to next year!';
            $response['Data'] = $result;
            $response['status'] = 400;
            $this->response($response, REST_Controller::HTTP_OK);
        }
    }

    public function user_amc_detail_update_post() {
        $response = [];
        //if user id is present then execute if otherwise else block will execute
        if (!empty($this->amc->get_user_amc_detail($this->post('uId'),$this->post('upm_id')))) {
            $data['id'] = $this->post('uId');
            $data['upm_id'] = $this->post('upm_id');
            $data['amc_amount'] = $this->post('amc_amount');
            $data['description'] = $this->post('description');
            $data['amc_date'] = $this->post('amc_date');
            
            $this->amc->update_user_amc_detail($data);

            $response['msg'] = 'Amc details Updated successfully!';
            $response['status'] = 200;
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            $response['msg'] = 'Data not Found!';
            $response['status'] = 404;
            $this->response($response, REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function user_amc_detail_delete($id,$umpId) {
        $response = [];
        if (!empty($this->amc->get_user_amc_detail($id,$upmId))) {
            $result = $this->amc->delete_user_amc_detail($id,$umpId);
            if ($result == 1) {
                $response['msg'] = 'Amc details successfully deleted!';
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
