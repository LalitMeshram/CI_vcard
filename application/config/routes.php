<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//login page ui
$route['default_controller'] = 'welcome';
//dashboard ui
$route['dashboard'] = 'admin/AdminController/dashboard';
//forgate password ui
$route['forgate-password'] = 'welcome/forgate_password';
//reset password ui
$route['resetpassword'] = 'welcome/reset_password';
//forgate password rest mail link api
$route['send_resetpassword-link'] = 'LoginController/forgate_password_link_sendmail';
//----------------------------
//role master ui
$route['role-master'] = 'admin/AdminController/role_master';
//user mstre ui
$route['user-master'] = 'admin/AdminController/user_master';

//service mster ui
$route['service-master'] = 'admin/AdminController/service_master';

//activity mster ui
$route['activity-master'] = 'admin/AdminController/activity_master';

//----------------------------
//login api
$route['login_auth'] = 'LoginController/login_auth';
$route['logout'] = 'LoginController/logout';

//role api
$route['role'] = 'RoleController/role';
$route['role/(:num)'] = 'RoleController/role/$1';



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
