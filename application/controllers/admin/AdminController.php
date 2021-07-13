<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class AdminController extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
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
    }

    public function role_master() {
        $this->load->view('header');
        $this->load->view('side_bar');
        $this->load->view('role_master/role_master');
        $this->load->view('role_master/add_role');
//        $this->load->view('role_master/update_role');
        $this->load->view('footer');
        $this->load->view('role_master/show_js');
        $this->load->view('role_master/new_js');
        $this->load->view('role_master/update_js');

    }

    public function user_master() {
        $this->load->view('header');
        $this->load->view('side_bar');
        $this->load->view('user_master/user_master');
        $this->load->view('user_master/add_user');
        $this->load->view('footer');
//        $this->load->view('dashboard/dashboard_js');
    }
    public function service_master() {
        $this->load->view('header');
        $this->load->view('side_bar');
        $this->load->view('service_master/service_master');
        $this->load->view('service_master/add_service');
        $this->load->view('footer');
        $this->load->view('service_master/show_js');
        $this->load->view('service_master/new_js');
        $this->load->view('service_master/update_js');
    }
    

    public function activity_master() {
        $this->load->view('header');
        $this->load->view('side_bar');
        $this->load->view('activity_master/activity_master');
        $this->load->view('activity_master/add_activity');
        $this->load->view('footer');
        $this->load->view('activity_master/show_js');
        $this->load->view('activity_master/new_js');
        $this->load->view('activity_master/update_js');
    }

    public function profile_master() {
        $this->load->view('header');
        $this->load->view('side_bar');
        $this->load->view('profile_master/profile_master');
        $this->load->view('profile_master/add_profile');
        $this->load->view('footer');
        $this->load->view('profile_master/show_js');
        $this->load->view('profile_master/new_js');
        $this->load->view('profile_master/update_js');
    }
}