<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . '/libraries/CreatorJwt.php';

class ServiceController extends REST_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('ServiceModel', 'service');
        $this->objOfJwt = new CreatorJwt();
    }

    public function service_get($id = 0) {
        $response = [];
        $received_Token = $this->input->request_headers();
        $jwtData = $this->objOfJwt->DecodeToken($received_Token['Authorization']);
        $data = $this->service->get_service($id);
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

    public function service_post() {
        $response = [];
        $received_Token = $this->input->request_headers();
        $jwtData = $this->objOfJwt->DecodeToken($received_Token['Authorization']);
        $data['title'] = $this->post('title');
//        $data['is_active'] = ($this->post('is_active') == 'on' || $this->post('is_active') == 1) ? 1 : 0;

        $id = $this->post('id');
        if (empty($id)) {
            $service_id = $this->service->insert_service($data);

            if (!empty($service_id)) {
                $response['msg'] = 'Service created successfully!';
                $response['id'] = $service_id;
                $response['status'] = 200;
                $this->response($response, REST_Controller::HTTP_OK);
            } else {
                $response['msg'] = 'Bad Request!';
                $response['id'] = $id;
                $response['status'] = 400;
                $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            if (!empty($this->service->get_service($id))) {
                $status = $this->service->update_service($id, $data);
                if ($status) {
                    $response['msg'] = 'Service updated successfully!';
                    $response['id'] = $id;
                    $response['status'] = 200;
                    $this->response($response, REST_Controller::HTTP_OK);
                }
            } else {
                $response['msg'] = 'Data not found!';
                $response['id'] = $id;
                $response['status'] = 400;
                $this->response($response, REST_Controller::HTTP_OK);
            }
        }
    }

    public function service_delete($id) {
        $response = [];
        $received_Token = $this->input->request_headers();
        $jwtData = $this->objOfJwt->DecodeToken($received_Token['Authorization']);
        if (!empty($this->service->get_service($id))) {
            $result = $this->service->delete_service($id);
            if ($result == 1) {
                $response['msg'] = 'Service successfully deleted!';
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
