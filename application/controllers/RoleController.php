<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class RoleController extends REST_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('RoleModel', 'role');
    }

    public function role_get($id = 0) {
        $response = [];
        $data = $this->role->get_role($id);
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

    public function role_post() {
        $response = [];
        $data['role'] = $this->post('role');
        $data['is_active'] = ($this->post('is_active') == 'on' || $this->post('is_active') == 1) ? 1 : 0;
        $id = $this->post('id');
        if (empty($id)) {
            $role_id = $this->role->insert_role($data);

            if (!empty($role_id)) {
                $response['msg'] = 'Role created successfully!';
                $response['id'] = $role_id;
                $response['status'] = 200;
                $this->response($response, REST_Controller::HTTP_OK);
            } else {
                $response['msg'] = 'Bad Request!';
                $response['id'] = $id;
                $response['status'] = 400;
                $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            if (!empty($this->role->get_role($id))) {
                $status = $this->role->update_role($id, $data);
                if ($status) {
                    $response['msg'] = 'Role updated successfully!';
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

    public function role_delete($id) {
        $response = [];
        if (!empty($this->role->get_role($id))) {
            $result = $this->role->delete_role($id);
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
