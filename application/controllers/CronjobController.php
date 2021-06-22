<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class CronjobController extends REST_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('CronjobModel', 'cron');
        $this->load->library('email');
    }

    public function amc_renewal_list_get() {
        $response = [];
        
        $data = $this->cron->getAmcExpireList();
        if (!empty($data)) {

//            $this->messenger($data);
            
            $response['data'] = $data;
            $response['msg'] = 'All Data Fetch successfully!';
            $response['status'] = 200;
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            $response['msg'] = 'Data not Found!';
            $response['status'] = 404;
            $this->response($response, REST_Controller::HTTP_OK);
        }
    }

    function messenger($data) {
        $msg="Amc Renewal Date Alert";
        foreach ($data as $row) {
            $msg .="\n\n client Name:$row->owner_name \n product:$row->product_name \n AMC Date:$row->upcomming_amc_date";
            }
            $msg.="Please Contact Them,Thank you!";
            $this->sendMail($msg);
//            $this->sendSMS($msg);
    }

    function sendMail($data) {
        $status;
        $from_email = "lalitrmeshram@gmail.com";
        $to_email = "lalitlucky007meshram@gmail.com";
        //Load email library
        $this->load->library('email');
        $this->email->from($from_email, 'AMC RENEWAL');
        $this->email->to($to_email);
        $this->email->subject('AMC RENEWAL LIST');
        $this->email->message($data);
        //Send mail
        if ($this->email->send()) {
            $status = TRUE;
        } else {
            $status = FALSE;
        }
        return $status;
    }

    function sendSMS($data) {
        $loginId = 'T1Soulsoft';
        $password = 'Shreya@2012';
        $vendorMobile = '8007015819';
        $senderid = 'soulit';
        $routeId = 2;
        $unicode = 1;

        $message = $data;
        $message = urlencode($message);
        $url = "http://hindit.co.in/API/pushsms.aspx?loginID=$loginId&password=$password&mobile=$vendorMobile&text=$message&senderid=$senderid&route_id=$routeId&Unicode=$unicode";
        $json = file_get_contents($url);
        $json = json_decode($json, true);
        if ($json[0]['responseCode'] == 'Message SuccessFully Submitted') {
            $response = true;
        } else {
            $response = false;
        }
//                    $response = $json;

        return $response;
    }

}
