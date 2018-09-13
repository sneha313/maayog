<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "Admin";
$route['404_override'] = '';

$route['login'] = 'Admin/index';
$route['logout'] = 'Admin/logout';
$route['user-profile'] = 'Admin/userProfileDetail';
//$route['edit-user'] = 'Admin/editUserDetail';
$route['register'] = 'Admin/register';
$route['forgotpwd'] = 'Admin/forgot_password';
$route['dashboard'] = 'Admin/dashboard';
$route['dashboard_login'] = 'Admin/check_login';
$route['ind_user'] = 'Admin/indUserManagement';
$route['ind_user_info'] = 'Admin/indUserInfo';
$route['add-ind-user'] = 'Admin/add_ind_user';
$route['ind_user_info/(:any)'] = 'Admin/indUserInfo/$1';
$route['edit_ind_user_info/(:any)'] = 'Admin/editIndUserInfo/$1';
$route['delete_ind_user_info/(:any)'] = 'Admin/deleteIndUser/$1';
$route['corp'] = 'Admin/corpManagement';
$route['corp_info'] = 'Admin/CorpInfo';
$route['add-corp'] = 'Admin/add_corp';
$route['corp_info/(:any)'] = 'Admin/CorpInfo/$1';
$route['edit_corp_info/(:any)'] = 'Admin/editCorpInfo/$1';
$route['delete_corp_info/(:any)'] = 'Admin/deleteCorp/$1';
$route['class'] = 'Admin/classManagement';
$route['class_info'] = 'Admin/ClassInfo';
$route['class_info/(:any)'] = 'Admin/ClassInfo/$1';
$route['edit_class_info/(:any)'] = 'Admin/editClassInfo/$1';
$route['delete_class_info/(:any)'] = 'Admin/deleteClass/$1';
$route['add-class'] = 'Admin/add_class';
$route['assign-class'] = 'Admin/classAssignment';
$route['assign-instructor-to-class'] = 'Admin/assign_instructor_to_class';
$route['assign-class-info'] = 'Admin/getAssign_class_info';
$route['assign-class-info/(:any)'] = 'Admin/getAssign_class_info/$1';
$route['instruc'] = 'Admin/getInstructors';
$route['add-instruc'] = 'Admin/add_instructor';
$route['edit-instruc-class/(:any)'] = 'Admin/edit_Assignedinstructor_class/$1';
$route['delete-instruc-class/(:any)'] = 'Admin/deleteAssignInstructor/$1';
$route['instruc_info/(:any)'] = 'Admin/getInstructor_byId/$1';
$route['edit_instruc_info/(:any)'] = 'Admin/editInstructorInfo/$1';
$route['delete_instruc_info/(:any)'] = 'Admin/deleteInstructor/$1';
$route['event'] = 'Admin/eventManagement';
$route['payment'] = 'Admin/paymentHistory';
$route['notification'] = 'Admin/getNotification';
$route['contact'] = 'Admin/contactus';
$route['add-event'] = 'Admin/add_event';
// $route['payment-history'] = 'Admin/payment_history';

/* End of file routes.php */
/* Location: ./application/config/routes.php */