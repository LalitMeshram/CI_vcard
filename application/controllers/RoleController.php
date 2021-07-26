<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . '/libraries/CreatorJwt.php';

class RoleController extends REST_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('RoleModel', 'role');
        $this->objOfJwt = new CreatorJwt();
    }

    public function role_get($id = 0) {
        $response = [];

            $received_Token = $this->input->request_headers();
        try {
            //Authentication
            $jwtData = $this->objOfJwt->DecodeToken($received_Token['Authorization']);

            $data = $this->role->get_role($id);
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
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function role_post() {
        $response = [];
        $data['role'] = $this->post('role');
        $data['is_active'] = ($this->post('is_active') == 'on' || $this->post('is_active') == 1) ? 1 : 0;

        $id = $this->post('id');
        $received_Token = $this->input->request_headers();   
            $jwtData = $this->objOfJwt->DecodeToken($received_Token['Authorization']);
            
            if (empty($id)) {
                if($this->role->find_role($data['role'])){
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
                }else{
                    $response['msg'] = 'Duplicate Entry!';
                $response['status'] = 400;
                $this->response($response, REST_Controller::HTTP_OK);
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
                $response['msg'] = 'Role successfully deleted!';
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
