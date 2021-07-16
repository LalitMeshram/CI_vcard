<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class UserController extends REST_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('UserMasterModel', 'user');
    }

    public function user_get($id = 0) {
        $response = [];
        $data = $this->user->get_user($id);
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

    public function user_post() {
        $response = [];
        $data['role_id'] = $this->post('role_id');
        $data['business_name'] = $this->post('business_name');
        $data['designation'] = $this->post('designation');
        $data['first_name'] = $this->post('first_name');
        $data['middle_name'] = $this->post('middle_name');
        $data['last_name'] = $this->post('last_name');
        $data['phone1'] = $this->post('phone1');
        $data['phone2'] = $this->post('phone2');
        $data['whatsapp_number'] = $this->post('whatsapp_number');
        $data['map_direction_url'] = $this->post('map_direction_url');
        $data['website_url'] = $this->post('website_url');
        $data['email_id'] = $this->post('email_id');
        $data['password'] = $this->post('password');
        $data['address'] = $this->post('address');
        $data['about_us'] = $this->post('about_us');
        $data['total_amount'] = $this->post('total_amount');
        $data['paid_amount'] = $this->post('paid_amount');
        $data['discount'] = $this->post('discount');
        $data['installation_date'] = $this->post('installation_date');
        $data['next_renewal_date'] = $this->post('next_renewal_date');
        $data['renewal_amount'] = $this->post('renewal_amount');
        $data['term'] = $this->post('term');
        $data['remark'] = $this->post('remark');
        $data['discount_id'] = $this->post('discount_id');
        $data['created_by'] = $this->post('created_by');
        $data['modified_by'] = $this->post('modified_by');
        $data['is_active'] = ($this->post('is_active') == 'on' || $this->post('is_active') == 1) ? 1 : 0;
        $id = $this->post('id');
        
        $service_data = $this->input->post('serviceData');
        $service_data = json_decode($service_data);
        
        $buss_data = $this->input->post('bussData');
        $buss_data = json_decode($buss_data);


        if (empty($id)) {
            $data['created_at'] = date('Y-m-d H:i:s', now());
            if (!empty($_FILES['profile_image']['name'])) {
                $file_data['file_name'] = $_FILES['profile_image']['name'];
                $file_data['file_type'] = $_FILES['profile_image']['type'];
                $file_data['temp_name'] = $_FILES['profile_image']['tmp_name'];
                $file_data['file_size'] = $_FILES['profile_image']['size'];
                $data['profile_image'] = $this->upload_docs($file_data);
            }
            
            $allData=array(
                'userData'=>$data,
                'serviceData'=>$service_data,
                'bussData'=>$buss_data
            );
            $result = $this->user->insert_user($allData);



            if ($result['status']) {
                $response['msg'] = 'User created successfully!';
                $response['id'] = $result['userid'];
                $response['status'] = 200;
                $this->response($response, REST_Controller::HTTP_OK);
            } else {
                $response['msg'] = 'Bad Request!';
                $response['id'] = $id;
                $response['status'] = 400;
                $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            $userData = $this->user->get_user($id);
            if (!empty($userData)) {
                $data['id'] = $id;
                $data['modified_at'] = date('Y-m-d H:i:s', now());
                if (!empty($_FILES['profile_image']['name'])) {
                    unlink($userData['profile_image']);
                    $file_data['file_name'] = $_FILES['profile_image']['name'];
                    $file_data['file_type'] = $_FILES['profile_image']['type'];
                    $file_data['temp_name'] = $_FILES['profile_image']['tmp_name'];
                    $file_data['file_size'] = $_FILES['profile_image']['size'];
                    $data['profile_image'] = $this->upload_docs($file_data);
                }
                $allData=array(
                'userData'=>$data,
                'serviceData'=>$service_data,
                'bussData'=>$buss_data
            );
                $status = $this->user->update_user($allData);
                if ($status) {
                    $response['msg'] = 'User updated successfully!';
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

    public function user_delete($id) {
        $response = [];
        if (!empty($this->user->get_role($id))) {
            $result = $this->user->delete_role($id);
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

    public function upload_docs($file) {
        if (($file['file_type'] == "image/gif") || ($file['file_type'] == "image/jpeg") || ($file['file_type'] == "image/png") || ($file['file_type'] == "image/pjpeg")) {
            $ext = pathinfo($file['file_name'], PATHINFO_EXTENSION);
            $time = date('Y_m_d_hisu');
            $filename = $this->compress_image($file['temp_name'], "resource/img/user/" . 'photo' . $time . "." . $ext, 50);
            return $filename;
        }
    }

    function compress_image($source_url, $destination_url, $quality) {
        $info = getimagesize($source_url);
        if ($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($source_url);
        elseif ($info['mime'] == 'image/gif')
            $image = imagecreatefromgif($source_url);
        elseif ($info['mime'] == 'image/png')
            $image = imagecreatefrompng($source_url);
        imagejpeg($image, $destination_url, $quality);
        return $destination_url;
    }

}
