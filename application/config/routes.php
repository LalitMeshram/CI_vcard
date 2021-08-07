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
$route['user-form'] = 'admin/AdminController/user_form';
$route['update-form/(:num)'] = 'admin/AdminController/update_user_form/$1';
$route['userDetail/(:num)'] = 'admin/AdminController/user_detail/$1';
//$route['userDetail'] = 'admin/AdminController/user_detail';

//service mster ui
$route['service-master'] = 'admin/AdminController/service_master';

//my profile ui
$route['my-profile'] = 'admin/AdminController/my_profile';
$route['myProfileDetail/(:num)']='admin/AdminController/myProfileDetail/$1';

//activity mster ui
$route['activity-master'] = 'admin/AdminController/activity_master';

//profile mster ui
$route['profile-master'] = 'admin/AdminController/profile_master';
//----------------------------
//login api
$route['login_auth'] = 'LoginController/login_auth';
$route['logout'] = 'LoginController/logout';

//Jwt Token example
$route['jwtlogin']='JwtToken/LoginToken';
$route['getjwtlogin']='JwtToken/GetTokenData';

//role api
$route['role'] = 'RoleController/role';
$route['role/(:num)'] = 'RoleController/role/$1';

//service api
$route['service'] = 'ServiceController/service';
$route['service/(:num)'] = 'ServiceController/service/$1';

//activity api
$route['activity'] = 'ActivityController/activity';
$route['activity/(:num)'] = 'ActivityController/activity/$1';

//activity api
$route['profile'] = 'ProfileController/profile';
$route['profile/(:num)'] = 'ProfileController/profile/$1';
$route['profileasperRole/(:num)'] = 'ProfileController/asper_role_profile/$1';
//profile permissions
$route['profilePermission']='ProfilePermissionController/permission';
$route['profilePermission/(:num)']='ProfilePermissionController/permission/$1';



//user master api
$route['user']='UserController/user';
$route['user/(:num)']='UserController/user/$1';
$route['userPermission/(:num)']='UserPermissionController/userPermission/$1';
$route['userPermission']='UserPermissionController/userPermission';
$route['checkUserId']='UserController/isCheckUserId';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
