<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class IssueMasterController extends REST_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('IssueMasterModel', 'issue');
    }

    public function issue_get($id = 0) {
        $response = [];
        $data = $this->issue->get_issue($id);
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

    public function issue_post() {
        $response = [];

        $data['client_id'] = $this->post('client_id');
        $data['product_id'] = $this->post('product_id');
        $data['issue'] = $this->post('issue');
        $data['call_date'] = $this->post('call_date');
        $data['solution'] = $this->post('solution');
        $data['status'] = $this->post('status');
        $data['start_date'] = $this->post('start_date');
        $data['close_date'] = $this->post('close_date');

        $id = $this->issue->insert_issue($data);
        if (!empty($id)) {
            $response['msg'] = 'Date submitted successfully!';
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

    public function issue_update_post() {
        $response = [];
//        print_r($this->post());exit;
        //if issue id is present then execute if otherwise else block will execute
        if (!empty($this->issue->get_issue($this->post('uId')))) {
            $data['id'] = $this->post('uId');
            $data['client_id'] = $this->post('uclient_id');
            $data['product_id'] = $this->post('uproduct_id');
            $data['issue'] = $this->post('uissue');
            $data['call_date'] = $this->post('ucall_date');
            $data['solution'] = $this->post('usolution');
            $data['status'] = $this->post('ustatus');
            $data['start_date'] = $this->post('ustart_date');
            $data['close_date'] = $this->post('uclose_date');
            $this->issue->update_issue($data);

            $response['msg'] = 'Data Updated successfully!';
            $response['status'] = 200;
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            $response['msg'] = 'Data not Found!';
            $response['status'] = 404;
            $this->response($response, REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function issue_delete($id) {
        $response = [];
        if (!empty($this->issue->get_issue($id))) {
            $result = $this->issue->delete_issue($id);
            if ($result == 1) {
                $response['msg'] = 'Data successfully deleted!';
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
