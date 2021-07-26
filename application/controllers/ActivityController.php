<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . '/libraries/CreatorJwt.php';

class ActivityController extends REST_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('ActivityModel', 'activity');
        $this->objOfJwt = new CreatorJwt();
    }

    public function activity_get($id = 0) {
        $response = [];
        $received_Token = $this->input->request_headers();
        $jwtData = $this->objOfJwt->DecodeToken($received_Token['Authorization']);
        $data = $this->activity->get_activity($id);
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

    public function activity_post() {
        $response = [];
        $received_Token = $this->input->request_headers();
        $jwtData = $this->objOfJwt->DecodeToken($received_Token['Authorization']);
        $data['activity_title'] = $this->post('activity_title');
        $data['category'] = $this->post('category');
        $data['url'] = $this->post('url');
        $data['is_active'] = ($this->post('is_active') == 'on' || $this->post('is_active') == 1) ? 1 : 0;

        $id = $this->post('id');
        if (empty($id)) {
            $activity_id = $this->activity->insert_activity($data);

            if (!empty($activity_id)) {
                $response['msg'] = 'Activity created successfully!';
                $response['id'] = $activity_id;
                $response['status'] = 200;
                $this->response($response, REST_Controller::HTTP_OK);
            } else {
                $response['msg'] = 'Bad Request!';
                $response['id'] = $id;
                $response['status'] = 400;
                $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            if (!empty($this->activity->get_activity($id))) {
                $status = $this->activity->update_activity($id, $data);
                if ($status) {
                    $response['msg'] = 'Activity updated successfully!';
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

    public function activity_delete($id) {
        $response = [];
        $received_Token = $this->input->request_headers();
        $jwtData = $this->objOfJwt->DecodeToken($received_Token['Authorization']);
        if (!empty($this->activity->get_activity($id))) {
            $result = $this->activity->delete_activity($id);
            if ($result == 1) {
                $response['msg'] = 'Activity successfully deleted!';
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
