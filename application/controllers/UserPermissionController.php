<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . '/libraries/CreatorJwt.php';

class UserPermissionController extends REST_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('UserPermissionModel', 'permission');
        $this->load->model('UserMasterModel', 'user');
        $this->objOfJwt = new CreatorJwt();
    }

    function userPermission_get($userId = 0) {
        $response = [];
        $received_Token = $this->input->request_headers();
        $jwtData = $this->objOfJwt->DecodeToken($received_Token['Authorization']);

        $result = $this->permission->getUserPermission($userId);

        if (!empty($result)) {
            $response['data'] = $result;
            $response['msg'] = 'All Data Fetch successfully!';
            $response['status'] = 200;
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            $response['msg'] = 'Data not Found!';
            $response['status'] = 404;
            $this->response($response, REST_Controller::HTTP_OK);
        }
    }

    function userPermission_post() {
        $response = [];
        $received_Token = $this->input->request_headers();
        $jwtData = $this->objOfJwt->DecodeToken($received_Token['Authorization']);

        $userId = $this->post('userId');
        $permission_data = $this->post('Data');
        $permission_data = json_decode($permission_data);
       $userPermission;
        if (!empty($this->permission->getUserPermission($userId))) {
            $this->permission->delete_permissions($userId);
            $userPermission=$permission_data;
        } else {
            $userDetails= $this->user->get_user($userId);
            
            $i=0;
            foreach ($permission_data as $permission) {
                $userPermission[$i++]=array(
                    "user_id"=>$userId,
                    "profile_master_id"=>$userDetails['data'][0]['profile_id'],
                    "activity_id"=>$permission->activity_id,
                    "_view"=>$permission->_view,
                    "_create"=>$permission->_create,
                    "_update"=>$permission->_update,
                    "_delete"=>$permission->_delete,
                    "permissionBtn"=>$permission->permissionBtn,
                );
            }
            
            
            
        }
//        print_r($userPermission);exit;
        
        $status = $this->permission->insert_permission($userPermission);
        if ($status) {
            $response['msg'] = 'All Inserted successfully!';
            $response['status'] = 200;
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            $response['msg'] = 'Data not Inserted!';
            $response['status'] = 404;
            $this->response($response, REST_Controller::HTTP_OK);
        }
    }

}
