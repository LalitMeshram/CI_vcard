<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class ProductInvestmentController extends REST_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('ProductInvestmentModel', 'investment');
    }

    public function investment_get($id = 0) {
        $response = [];
        $data = $this->investment->get_investment($id);
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

    public function investment_post() {
        $response = [];

        $data['product_id'] = $this->post('product_id');
        $data['dev_point'] = $this->post('dev_point');
        $data['status'] = $this->post('status');
        $data['description'] = $this->post('description');
        $data['deadline'] = $this->post('deadline');
        $data['investment'] = $this->post('investment');
        $data['start_date'] = $this->post('start_date');
        $data['close_date'] = $this->post('close_date');

        $id = $this->investment->insert_investment($data);
        if (!empty($id)) {
            $response['msg'] = 'Data submitted successfully!';
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

    public function investment_update_post() {
        $response = [];
        //if user id is present then execute if otherwise else block will execute
        if (!empty($this->investment->get_investment($this->post('uId')))) {
            $data['id'] = $this->post('uId');
            $data['product_id'] = $this->post('uproduct_id');
            $data['dev_point'] = $this->post('udev_point');
            $data['status'] = $this->post('ustatus');
            $data['description'] = $this->post('udescription');
            $data['deadline'] = $this->post('udeadline');
            $data['investment'] = $this->post('uinvestment');
            $data['start_date'] = $this->post('ustart_date');
            $data['close_date'] = $this->post('uclose_date');

            $this->investment->update_investment($data);

            $response['msg'] = 'Date Updated successfully!';
            $response['status'] = 200;
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            $response['msg'] = 'Data not Found!';
            $response['status'] = 404;
            $this->response($response, REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function investment_delete($id) {
        $response = [];
        if (!empty($this->investment->get_investment($id))) {
            $result = $this->investment->delete_investment($id);
            if ($result == 1) {
                $response['msg'] = 'user successfully deleted!';
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
