<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . '/libraries/CreatorJwt.php';

class ProfileController extends REST_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('ProfileModel', 'profile');
        $this->objOfJwt = new CreatorJwt();
    }

    public function profile_get($id = 0) {
        $response = [];
        $received_Token = $this->input->request_headers();
        $jwtData = $this->objOfJwt->DecodeToken($received_Token['Authorization']);
        $data = $this->profile->get_profile($id);
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

    public function profile_post() {
        $response = [];
        $received_Token = $this->input->request_headers();
        $jwtData = $this->objOfJwt->DecodeToken($received_Token['Authorization']);
        $data['role_id'] = $this->post('role_id');
        $data['title'] = $this->post('title');
        $data['is_active'] = ($this->post('is_active') == 'on' || $this->post('is_active') == 1) ? 1 : 0;
//        $data['created_at'] = $this->post('created_at');

        $id = $this->post('id');
        if (empty($id)) {
            $profile_id = $this->profile->insert_profile($data);

            if (!empty($profile_id)) {
                $response['msg'] = 'Profile created successfully!';
                $response['id'] = $profile_id;
                $response['status'] = 200;
                $this->response($response, REST_Controller::HTTP_OK);
            } else {
                $response['msg'] = 'Bad Request!';
                $response['id'] = $id;
                $response['status'] = 400;
                $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            if (!empty($this->profile->get_profile($id))) {
                $status = $this->profile->update_profile($id, $data);
                if ($status) {
                    $response['msg'] = 'Profile updated successfully!';
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

    public function profile_delete($id) {
        $response = [];
        $received_Token = $this->input->request_headers();
        $jwtData = $this->objOfJwt->DecodeToken($received_Token['Authorization']);
        if (!empty($this->profile->get_profile($id))) {
            $result = $this->profile->delete_profile($id);
            if ($result == 1) {
                $response['msg'] = 'Profile successfully deleted!';
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
