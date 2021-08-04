<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class AdminController extends CI_Controller {

   
    public function index() {
//		$this->load->view('welcome_message');
        echo base_url();
    }

    public function dashboard() {
        $this->load->view('header');
        $this->load->view('side_bar');
        $this->load->view('dashboard/dashboard');
        $this->load->view('footer');
        $this->load->view('dashboard/dashboard_js');
        $this->load->view('end');
    }

    public function role_master() {
        $this->load->view('header');
        $this->load->view('side_bar');
        $this->load->view('role_master/role_master');
        $this->load->view('role_master/add_role');
        $this->load->view('footer');
        $this->load->view('role_master/role_js');
        $this->load->view('end');

    }

    public function user_master() {
        $this->load->view('header');
        $this->load->view('side_bar');
        $this->load->view('user_master/user_master');
        $this->load->view('user_master/permissionList');
//        $this->load->view('user_master/add_user');
//        $this->load->view('user_master/add_user_wizard');
        $this->load->view('footer');
//        $this->load->view('user_master/validation_js');
//        $this->load->view('user_master/show_js');
//        $this->load->view('user_master/set_permission_js');
        $this->load->view('user_master/user_master_js');
        $this->load->view('end');
    }
    public function user_detail($id) {
        $data['id']=$id;
        $this->load->view('header');
        $this->load->view('side_bar');
        $this->load->view('user_master/user_details');
        $this->load->view('footer');
//        $this->load->view('user_master/user_details_js',$data);
        $this->load->view('user_master/user_detail_common_js');
        $this->load->view('end');
    }
    public function user_form() {
        $this->load->view('header');
        $this->load->view('side_bar');
        $this->load->view('user_master/create_user_wizard');
        $this->load->view('footer');
//        $this->load->view('user_master/new_js');
//        $this->load->view('user_master/validation_js');
//        $this->load->view('user_master/service_buss_js');
//        $this->load->view('user_master/other_info_js');
//        $this->load->view('user_master/user_js');
//        $this->load->view('user_master/role_js');
        $this->load->view('user_master/user_form_common_js');
        $this->load->view('end');
    }
    public function update_user_form($id) {
        $data['id']=$id;
        $this->load->view('header');
        $this->load->view('side_bar');
        $this->load->view('user_master/update_user_wizard');
        $this->load->view('footer');
//        $this->load->view('user_master/new_js');
//        $this->load->view('user_master/service_buss_js');
//        $this->load->view('user_master/other_info_js');
//        $this->load->view('user_master/user_js');
//        $this->load->view('user_master/role_js');
//        $this->load->view('user_master/profile_js');
//        $this->load->view('user_master/set_update_user_js',$data);
        $this->load->view('user_master/update_user_form_js');
        $this->load->view('end');
    }
    public function service_master() {
        $this->load->view('header');
        $this->load->view('side_bar');
        $this->load->view('service_master/service_master');
        $this->load->view('service_master/add_service');
        $this->load->view('footer');
//        $this->load->view('service_master/validation_js');
//        $this->load->view('service_master/show_js');
//        $this->load->view('service_master/new_js');
//        $this->load->view('service_master/update_js');
        $this->load->view('service_master/service_js');
        $this->load->view('end');
    }
    

    public function activity_master() {
        $this->load->view('header');
        $this->load->view('side_bar');
        $this->load->view('activity_master/activity_master');
        $this->load->view('activity_master/add_activity');
        $this->load->view('footer');
//        $this->load->view('activity_master/validation_js');
//        $this->load->view('activity_master/show_js');
//        $this->load->view('activity_master/new_js');
//        $this->load->view('activity_master/update_js');
        $this->load->view('activity_master/activity_js');
        $this->load->view('end');
    }

    public function profile_master() {
        $this->load->view('header');
        $this->load->view('side_bar');
        $this->load->view('profile_master/profile_master');
        $this->load->view('profile_master/permissionList');
        $this->load->view('profile_master/add_profile');
        $this->load->view('footer');
//        $this->load->view('profile_master/validation_js');
//        $this->load->view('profile_master/show_js');
//        $this->load->view('profile_master/new_js');
//        $this->load->view('profile_master/update_js');
//        $this->load->view('profile_master/set_permission_js');
        $this->load->view('profile_master/profile_js');
        $this->load->view('end');
    }
}