<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . '/libraries/CreatorJwt.php';

class LoginController extends REST_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('LoginModel', 'login');
        $this->objOfJwt = new CreatorJwt();
    }

    public function login_auth_post() {
        $response = [];
        
        $data['uname'] = $this->post('uname');
        $data['password'] = $this->post('password');

        $result = $this->login->get_authenticate($data);
        if (!empty($result)) {
            $tokenData['id']=$result['id'];
            $tokenData['role_id']=$result['role_id'];
            
            $jwtToken = $this->objOfJwt->GenerateToken($tokenData);
//          set session  
            $sessionData = array(
                'username' => $result['first_name'] . ' ' . $result['middle_name'] . ' ' . $result['last_name'],
                'userid' => $result['id'],
                'token' => $jwtToken,
                'logged_in' => TRUE
            );
            $this->session->set_userdata('loginSession', $sessionData);

//            send response
            $response['msg'] = 'user login successfully!';
            $response['userid']=$result['id'];
            $response['url']= base_url();
            $response['token'] = $jwtToken;
            $response['status'] = 200;
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            $response['msg'] = 'incorrect username or password!';
            $response['status'] = 400;
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function logout_get() {
        $this->load->driver('cache');
        $this->session->sess_destroy();
        $this->cache->clean();
        redirect(base_url('/'));
    }

    public function forgate_password_link_sendmail_post() {
        $response = [];

        $userid = $this->post('email');
        $row = $this->login->send_mail($userid);

        if ($row['status']) {
            $from_email = "support@soulsoftinfotech.in";
            $to_email = $userid;
            $link = base_url() . "resetpassword?key=" . $userid . "&token=" . $row['token'];
            //Load email library 
            $this->load->library('email');

            $this->email->from($from_email, 'Soulsoft');
            $this->email->to($to_email);
            $this->email->subject('Reset Password Link');
            $this->email->message($link);

            //Send mail 
            if ($this->email->send()) {
                $response = array(
                    'Message' => 'Mail is sent to your email id please reset your password',
                    'Responsecode' => 200
                );
                $this->response($response, REST_Controller::HTTP_OK);
            } else {
                $response = array(
                    'Message' => 'problem with Mail sent try again some time',
                    'Responsecode' => 400
                );
                $this->response($response, REST_Controller::HTTP_OK);
            }
        } else {
            $response = array(
                'Message' => 'Email id is not registred',
                'Responsecode' => 204
            );
            $this->response($response, REST_Controller::HTTP_OK);
        }
    }

    public function checkemailexpire_get() {
        $email = $this->get('email');
        $token = $this->get('token');
        $row = $this->login->check_link($email, $token);
        $curDate = date("Y-m-d H:i:s");
        if ($row['status']) {
            if ($row['data']->expiry_date >= $curDate) {
                $response = array(
            'Message' => 'check data',
            'Responsecode' => 200
        );
            }
        } else {
            $response = array(
            'Message' => 'check data',
            'Responsecode' => 400
        );
        }
        
        $this->response($response, REST_Controller::HTTP_OK);
    }

}
