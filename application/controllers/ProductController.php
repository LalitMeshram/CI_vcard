<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class ProductController extends REST_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('ProductModel', 'product');
    }

    public function product_get($id = 0) {
        $response = [];
        $data = $this->product->get_product($id);
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

    public function product_post() {
        $response = [];
//        echo 'web='.( ($this->post('web')=='on')?1:0);exit;
        $data['name'] = $this->post('name');
        $data['description'] = $this->post('description');
        $data['type'] = $this->post('type');
        $data['technology'] = $this->post('technology');
        $data['web'] = ($this->post('web') == 'on' || $this->post('web') == 1) ? 1 : 0;
        $data['android'] = ($this->post('android') == 'on' || $this->post('android') == 1) ? 1 : 0;
        $data['is_active'] = ($this->post('is_active') == 'on' || $this->post('is_active') == 1) ? 1 : 0;
        $data['created_at'] = date(DATE_ISO8601, time());
        $data['modified_at'] = date(DATE_ISO8601, time());

        $id = $this->product->insert_product($data);
        if (!empty($id)) {
            $response['msg'] = 'Product created successfully!';
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

    public function product_update_post() {
        $response = [];
        //if product id is present then execute if otherwise else block will execute
        if (!empty($this->product->get_product($this->post('pId')))) {
            $data['id'] = $this->post('pId');
            $data['name'] = $this->post('uname');
            $data['description'] = $this->post('udescription');
            $data['type'] = $this->post('utype');
            $data['technology'] = $this->post('utechnology');
            $data['web'] = ($this->post('uweb') == 'on' || $this->post('uweb') == 1) ? 1 : 0;
            $data['android'] = ($this->post('uandroid') == 'on' || $this->post('uandroid') == 1) ? 1 : 0;
            $data['is_active'] = ($this->post('uis_active') == 'on' || $this->post('uis_active') == 1) ? 1 : 0;
            $data['modified_at'] = date(DATE_ISO8601, time());
            $this->product->update_product($data);

            $response['msg'] = 'Product Updated successfully!';
            $response['status'] = 200;
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            $response['msg'] = 'Data not Found!';
            $response['status'] = 404;
            $this->response($response, REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function product_delete($id) {
        $response = [];
        if (!empty($this->product->get_product($id))) {
            $result = $this->product->delete_product($id);
            if ($result == 1) {
                $response['msg'] = 'Product successfully deleted!';
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
