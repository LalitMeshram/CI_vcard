<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . '/libraries/CreatorJwt.php';

class ProfilePermissionController extends REST_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('ProfilePermissionModel', 'permission');
        $this->objOfJwt = new CreatorJwt();
    }

    public function permission_get($profileId = 0) {
        $response = [];

        $received_Token = $this->input->request_headers();
        try {
            //Authentication
            $jwtData = $this->objOfJwt->DecodeToken($received_Token['Authorization']);

            $data = $this->permission->get_permission_asper_profile($profileId);
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

    public function permission_post() {
        $response = [];
        $received_Token = $this->input->request_headers();
        $jwtData = $this->objOfJwt->DecodeToken($received_Token['Authorization']);

        $profileId = $this->post('profileId');
        $permission_data = $this->post('Data');
        $permission_data = json_decode($permission_data);

        if (!empty($this->permission->get_permission_asper_profile($profileId))) {
            $this->permission->delete_permissions($profileId);
        } 
            $status = $this->permission->insert_permission($permission_data);
            if ($status) {
                $response['msg'] = 'All Inserted successfully!';
                $response['status'] = 200;
                $this->response($response, REST_Controller::HTTP_OK);
            }else{
                $response['msg'] = 'Data not Inserted!';
                $response['status'] = 404;
                $this->response($response, REST_Controller::HTTP_OK);
            }
        
    }

  

}
