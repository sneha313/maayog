<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
       parent :: __construct();	
    }
	
	#login section
	public function index() {
		if(($this->session->userdata('Role') == 3) AND  ($this->config->item('custom_base_url') == base_url())){
			$this->load->view('dashboard');
		} else {
			$this->load->view('index');
		}
	}
	
	#if login credential is not matched it will throw error
	public function check_login() {
		$result= $this->Admin_Model->check_login();
		
		if($result){
			if(($this->session->userdata('Role') =='3')  AND  ($this->config->item('custom_base_url') == base_url())){
				redirect(base_url('dashboard'));
			} else{
				
			$this->session->set_flashdata('Error','error');
				redirect(base_url('../dashboard'));
			}
		}else{
			
			$this->session->set_flashdata('Error','error');
			redirect(base_url());
		}
	}
	
	#mail for login
	public function check_mail() {
		
		$result = $this->Admin_Model->check_mail();
	}
	
	#check class exist or not
	public function check_class() {
		
		$result = $this->Admin_Model->check_class();
	}
	
	#logout section
	public function logout() {
		$sess_data = array("UserId","FirstName","LastName","FullName","EmailAddress");
		$this->session->unset_userdata($sess_data);
		$this->session->sess_destroy();
		redirect(base_url());
	}
	
	#register section
	public function register() {
		
		$this->load->view('register');
	}
	public function registerUser() {
		
		$result = $this->Admin_Model->registerUser();
		
		if($result){
			  echo true;
		}else{
			  echo false;
		}
	}
	
	#forgot password section
	public function forgot_password() {
		
		$this->load->view('forgot_password');
	}
	#dashboard section
	public function dashboard() {
		$result['ind_user'] = $this->Admin_Model->get_indUsers();
		$result['cor_user'] = $this->Admin_Model->get_corUsers();
		$result['class_name'] = $this->Admin_Model->getClass_name();
		$result['ind_subs'] = $this->Admin_Model->get_ind_subscriber();
		$result['cor_subs'] = $this->Admin_Model->get_cor_subscriber();
		$result['users_feedback'] = $this->Admin_Model->get_users_feedback();
		$result['all_payment_history'] = $this->Admin_Model->get_PaymentHistoryDash();
		$result['user_not_attend'] = $this->Admin_Model->get_notAttendingClass_byUser();
		$this->load->view('dashboard', $result);
		
	}
	#to get types of classes
	public function getClassType() {
		$result['class_type'] = $this->Admin_Model->getClass_type();
		// print_r($result);
	}	
	
######################################################################################################
# 
#User Section
#1) view user/admin profile detail
#2) get health problem for user/admin profile
#3) edit form for user/admin profile
#4) update user/admin profile by id
#
######################################################################################################

	#to view user profile detail by sessionid
	public function userProfileDetail() {
	//	$result['health_prob'] = $this->Admin_Model->get_healthProblemforSessionUser();
		$result['user_profile'] = $this->Admin_Model->userProfileDetail();
		if($result){
			$this->session->set_flashdata('message', 'succ');
			$this->load->view('user_profile',$result);
		}else{
			return false;
		}  
	}
	
	#to view user profile detail by sessionid
	public function get_healthProblem() {
		$result = $this->Admin_Model->get_healthProblem();
		if($result){
			echo json_encode($result);
		}else{
			echo json_encode('Error');
		}  
	}
	
	#to edit user profile detail by sessionid
	public function edituserProfile() {
		//$result['health_prob'] = $this->Admin_Model->get_healthProblemforSessionUser();
		$result['user_profile'] = $this->Admin_Model->userProfileDetail();
		if($result){
			echo json_encode($result);
		}else{
			return false;
		}  
	}
	
	#to edit user profile detail by sessionid
	public function updateUserDetail() {
		//$result['health_prob'] = $this->Admin_Model->get_healthProblemforSessionUser();
		$result['edit_userDeatil'] = $this->Admin_Model->updateUserDetail();
		if($result){
			echo true;
		}else{
			echo false;
		}  
	}

	
#####################################################################################################
# 
#User Section
#1)Add new individual user form
#2)insert individual user
#3)view individual user list
#4)view individual user info by id
#5)edit individual user form
#6)update individual user info by id
#7)delete individual user info by id
#
#####################################################################################################

	public function add_ind_user() {
		$result['class_name']= $this->Admin_Model->getClass_name();
		$result['corp_name']= $this->Admin_Model->getCorporates();
		$result['user_type'] = $this->Admin_Model->getClass_type();
		$result['health_problem'] = $this->Admin_Model->get_healthProblem();
		$this->load->view('add_ind_user', $result);
	}
	# to insert new individual user
	public function insert_ind_user() {
		$result= $this->Admin_Model->insert_ind_user();
		if($result){
			$this->session->set_flashdata('message', 'success');
			redirect('ind_user');
		}else{
			$this->load->view('ind_user',$result);
		}
	}	
	
	#to get list of users
	 public function indUserManagement() {

		$result['users_data'] = $this->Admin_Model->getUsers();
		if($result){
			// $result['msg']='success';
			$this->load->view('view_ind_users_list',$result);
		}else{
			// $result['msg']='error';
			return false;
		}   
	}
	
	#to view user by id
	public function indUserInfo($Id='') {
		$result['class_name']= $this->Admin_Model->getClass_name();
		$result['users_data_byId'] = $this->Admin_Model->getUser_byId($Id);
		if($result){
			$this->load->view('view_ind_user_info',$result);
		}else{
			return false;
		}  
	}
	
	public function editIndUserInfo($Id='') {
		$result['class_name']= $this->Admin_Model->getClass_name();
		$result['health_problem'] = $this->Admin_Model->get_healthProblem();
		$result['corp_name']= $this->Admin_Model->getCorporates();
		$result['user_type'] = $this->Admin_Model->getClass_type();
		$result['ind_class'] = $this->Admin_Model->getClass_forInd();
		$result['corp_class'] = $this->Admin_Model->getClass_forCorp();

		$result['edit_Induser_data_byId'] = $this->Admin_Model->getUser_byId($Id);
		if($result){
			$this->load->view('edit_ind_user',$result);
		}else{
			return false;
		}  
	}
	
	#to edit individual user data by id
	public function get_editIndUser($Id='') {
		
		$result['edit_Induser_List'] = $this->Admin_Model->get_editIndUser($Id);
		if($result){
			$this->session->set_flashdata('message', 'succ');
			redirect('ind_user');
		}else{
			//$resultmsg['msg'] = 'error';
			return false;
		}  
	}
	
	#to delete individual user by id
	public function deleteIndUser($Id='') {
		$result['delete_Induser_List'] = $this->Admin_Model->deleteIndUser($Id);
		if($result){
			redirect('ind_user');
		}else{
			return false;
		}  
	}
	
#####################################################################################################
# 
# Corporate Section
#1)view corporate list
#2)view corporate info by particular id
#3)add corporate form
#4)insert corporate
#5)edit corporate form
#6)update corporate form
#7)delete corporate
#
#####################################################################################################
	
	#to get list of corporate
	public function corpManagement() {

		$result['corporates_data'] = $this->Admin_Model->getCorporates();
		if($result){
			// $result['msg']='success';
			$this->load->view('view_corp_list',$result);
		}else{
			// $result['msg']='error';
			return false;
		}   
	}
	
	#to view corporate by id
	public function CorpInfo($Id='') {
		$result['corporate_data_byId'] = $this->Admin_Model->getCorp_byId($Id);
		if($result){
			$this->load->view('view_corp_info',$result);
		}else{
			return false;
		}  
	}
	
	#to add corporate
	public function add_corp() {

		$this->load->view('add_corp');
	}
	
	# to insert corporate data
	public function insert_newCorp() {
		$result= $this->Admin_Model->insert_newCorp();
		if($result){
			$this->session->set_flashdata('message', 'success');
			redirect('corp');
		}else{
			// $result['Error'] = 'error';
			$this->load->view('corp',$result);
		}
	}		
	
	#edit corporate form
	public function editCorpInfo($Id='') {
		$result['edit_corp_data_byId'] = $this->Admin_Model->getCorp_byId($Id);
		if($result){
			$this->load->view('edit_corp',$result);
		}else{
			return false;
		}  
	}
	
	#update corporate
	public function get_editCorp($Id='') {
		$result['edit_Corp_List'] = $this->Admin_Model->editCorp($Id);
		if($result){
			$this->session->set_flashdata('message', 'succ');
			redirect('corp');
		}else{
			return false;
		}  
	}
	
	#to delete corporate user by id
	public function deleteCorp($Id='') {
		$result['delete_Corp_List'] = $this->Admin_Model->deleteCorp($Id);
		if($result){
			redirect('corp');
		}else{
			return false;
		}  
	}
	
	
#####################################################################################################
# 
# Class Section
#1)Add class form
#2)Insert new class 
#3)view class list
#4)view particular class detail by id
#4)Edit class form appear by id
#5)update class by id
#6)delete class by id
#6)get class end time
#
#####################################################################################################
	
	#to insert new class
	public function add_class() {
			
		$result['class_timeTable'] = $this->Admin_Model->get_timeTable();
		$result['corp_name']= $this->Admin_Model->getCorporates();
		$result['class_type'] = $this->Admin_Model->getClass_type();
		$result['class_recurrence'] = $this->Admin_Model->getClassRecurrence_type();
		$this->load->view('add_class', $result);

	}
	
	#to check class inserted successfully
	public function insert_newClass() {
		$result= $this->Admin_Model->insert_newClass();
		if($result){
			$this->session->set_flashdata('message', 'success');
			// redirect('class');
			redirect('assign-instructor-to-class');
		}else{
			$this->load->view('ind_user',$result);
		}
	}	
	
	#to view class
	public function classManagement() {
		
		
		$result['ind_class_data'] = $this->Admin_Model->getClass_forInd();
		$result['corp_class_data'] = $this->Admin_Model->getClass_forCorp();
		if($result){
			$this->load->view('view_classes_list',$result);
		}else{
			return false;
		} 
	}
	
	#to view class by id
	public function ClassInfo($Id='') {
		$result['class_data_byId'] = $this->Admin_Model->getClass_byId($Id);
		if($result){
			$this->load->view('view_class_info',$result);
		}else{
			return false;
		}  
	}
	
	#get edit class form
	public function editClassInfo($Id='') {
		
		$result['edit_class_data_byId'] = $this->Admin_Model->getClass_byId($Id);
		$result['corp_name']= $this->Admin_Model->getCorporates();
		$result['class_timeTable'] = $this->Admin_Model->get_timeTable();
		$result['class_type'] = $this->Admin_Model->getClass_type();
		// $result['class_endTime']= $this->Admin_Model->get_classEndTime();
		$result['class_assignTime'] = $this->Admin_Model->get_notAssignedClassList();
		if($result){
			$this->load->view('edit_class',$result);
		}else{
			return false;
		}  
	}
	
	#get table after editing class
	public function get_editClass($Id='') {
		$result['edit_Class_List'] = $this->Admin_Model->editClass($Id);
		if($result){
			$this->session->set_flashdata('message', 'succ');
			// redirect('class');
			redirect('assign-instructor-to-class');
		}else{
			return false;
		}  
	}
	
	#to delete class  by id
	public function deleteClass($Id='') {
		$result['delete_Class_List'] = $this->Admin_Model->deleteClass($Id);
		if($result){
			redirect('class');
		}else{
			return false;
		}  
	}

	public function get_classEndTime(){
		$result = $this->Admin_Model->get_classEndTime();
		
		if($result){
			echo json_encode($result);
		}else{
			echo json_encode('error');
		}
	}
	
	
#######################################################################################################
#Instructor Section
#1) to add instructor form
#2)to insert instructor 
#3)to view list of instructor
#4)to view instructor by id
#5)to edit instructor form
#6)to update instructor by id
#7)to delete instructor by id
#
######################################################################################################
	
	#to get form for add instructor
	public function add_instructor() {

		$this->load->view('add_instructor');
	}
	
	#to insert instructor
	public function insert_instructor() {
		$result= $this->Admin_Model->insert_instructor();
		if($result){
			$this->session->set_flashdata('message', 'success');
			redirect('instruc');
		}else{
			$this->load->view('instruc',$result);
		}
	}	
	
	#to get list of instructors
	 public function getInstructors() {

		$result['instructors_data'] = $this->Admin_Model->getInstructors();
		if($result){
			$this->load->view('view_instructor_list',$result);
		}else{
			return false;
		}   
	}
	
	#to get instructor by id
	public function getInstructor_byId($Id='') {
		$result['instructor_info_byId'] = $this->Admin_Model->getInstructor_byId($Id);
		if($result){
			$this->load->view('view_instructor_info',$result);
		}else{
			return false;
		}  
	}
	
	#to edit instructor form by id
	public function editInstructorInfo($Id='') {
		$result['edit_Instructor_data_byId'] = $this->Admin_Model->getInstructor_byId($Id);
		if($result){
			$this->load->view('edit_instructor',$result);
		}else{
			return false;
		}  
	}
	
	#to update individual instructor data by id
	public function editInstructor($Id='') {
		$result['edit_Instructor_List'] = $this->Admin_Model->editInstructor($Id);
		if($result){
			$this->session->set_flashdata('message', 'succ');
			redirect('instruc');
		}else{
			//$resultmsg['msg'] = 'error';
			return false;
		}  
	}
	
	#to delete instructor by id
	public function deleteInstructor($Id='') {
		$result['delete_Instructor_List'] = $this->Admin_Model->deleteInstructor($Id);
		if($result){
			redirect('instruc');
		}else{
			return false;
		}  
	}
	
#######################################################################################################
# Assign Class to Instructor 
#1) to view list of instructor assign to class
#2)to assign instructor to class assign page
#3)to insert instructor to class 
#4)to delete instructor to assigned class
#
######################################################################################################

	public function classAssignment(){
		$result['assign_class_to_instructor'] = $this->Admin_Model->getAssignClassToInstructorList();
		if($result){
			$this->load->view('class_assign',$result);
		}else{
			return false;
		}   
	}
	public function assign_instructor_to_class(){
		$result['corp_name']= $this->Admin_Model->getCorporates();
		$result['instructor_name'] = $this->Admin_Model->getInstructors();
		$result['assign_class_type'] = $this->Admin_Model->getClass_type();
		$result['assign_corp_class'] = $this->Admin_Model->getClass_forCorp();
		$result['assign_ind_class'] = $this->Admin_Model->getClass_forInd();
		$this->load->view('assign_instructor_to_class', $result);
	}
	public function getClassByTypeId(){
		$result = $this->Admin_Model->getClassByTypeId();
		if($result){
			echo json_encode($result);
		}else{
			echo json_encode('error');
		}
	}
	public function get_classStartEndTimeById(){
		$result = $this->Admin_Model->get_classStartEndTimeById();
		if($result){
			echo json_encode($result);
		}else{
			echo json_encode('error');
		}
	}
	public function getDateByClassId(){
		$result = $this->Admin_Model->getDateByClassId();
		
		if($result){
			echo json_encode($result);
		}else{
			echo json_encode('error');
		}
	}
	
	public function insert_instructor_to_class() {
		$result = $this->Admin_Model->insert_instructor_to_class();
		if($result){
			$this->session->set_flashdata('message', 'success');
			redirect('assign-class');
		}else{
			$this->load->view('assign-class',$result);
		}
	}
	public function edit_Assignedinstructor_class($Id='') {
		$result['instructor_name'] = $this->Admin_Model->getInstructors();
		$result['assign_class_type'] = $this->Admin_Model->getClass_type();
		$result['assign_corp_class'] = $this->Admin_Model->getClass_forCorp();
		$result['assign_ind_class'] = $this->Admin_Model->getClass_forInd();
		
		$result['instructor_data'] = $this->Admin_Model->getAssignedInstructor_byId($Id);

		if($result){
			$this->load->view('edit_assign_instructor_to_class',$result);
		}else{
			return false;
		}  
	}
	
	#to view assign class info
	public function getAssign_class_info($Id='') {
		$result['assign_class_byId'] = $this->Admin_Model->getAssign_class_info($Id);
		// $result['class_data_byId'] = $this->Admin_Model->getClass_byId($Id);
		// $result['edit_Instructor_data_byId'] = $this->Admin_Model->getInstructor_byId($Id);
		if($result){
			$this->load->view('class_assign_info',$result);
		}else{
			return false;
		}  
	}
	#get table after editing class
	public function editAssignInstructor($Id='') {
		$result['edit_assigned_instructor'] = $this->Admin_Model->editAssignInstructor($Id);
		if($result){
			$this->session->set_flashdata('message', 'succ');
			redirect('assign-class');
		}else{
			return false;
		}  
	}
	#to delete individual user by id
	public function deleteAssignInstructor($Id='') {
		$result['delete_assignedInstructor'] = $this->Admin_Model->deleteAssignInstructor($Id);
		if($result){
			redirect('assign-class');
		}else{
			return false;
		}  
	}
		public function get_notAssignedClassList(){
		$result = $this->Admin_Model->get_notAssignedClassList();
		if($result){
			echo json_encode($result);
		}else{
			echo json_encode('error');
		}
	}
	
	public function add_event() {
		
		$this->load->view('add_event');
	}
	public function eventManagement() {
		//$result['classList'] = $this->Admin_Model->get_classList();
		$this->load->view('view_event_list');
	}
	public function get_timeTable() {
		$result = $this->Admin_Model->get_timeTable();
		if($result){
			echo  json_encode($result);
		}else{
			echo json_encode("error");
		}
	}
	public function get_classList() {
		$result = $this->Admin_Model->get_classList();
		if($result){
			 echo  json_encode($result);
		}else{
			echo json_encode("error");
		}
	}
	public function get_EventCalendar() {
		
		$result=$this->Admin_Model->get_EventCalendar();
		$result1=$this->Admin_Model->get_adminActionEvent();
		if($result){
			$events = array();
			$e = array();
			foreach($result as $res){
				$e['id'] = $res['ClassId'];
				$e['title'] = $res['ClassName'];
				$e['start'] = $res['StartDate'];
				$e['end'] = $res['EndDate'];
				$e['allDay'] = true;
				$e['className'] = 'success';
				array_push($events, $e);
				// print_r($events);
				// die();
			}
			
			echo json_encode($events);
		}else{
			echo json_encode('error');
		}
	}
	public function get_userOfClass() {
		
		$result=$this->Admin_Model->get_userOfClass();
		// print_r($result);
		// die();
		if($result){
			echo json_encode($result);
		}else{
			echo json_encode('error');
		}
	}
	public function get_ClassOnDateSelection() {
		
		$result=$this->Admin_Model->get_ClassOnDateSelection();
		// print_r($result);
		// die();
		if($result){
			echo json_encode($result);
		}else{
			echo json_encode('error');
		}
	}
	public function get_ClassTime() {
		
		$result=$this->Admin_Model->get_ClassTime();
		if($result){
			echo json_encode($result);
		}else{
			echo json_encode('error');
		}
	}
	public function get_adminActionEvent() {
		
		$result['events']=$this->Admin_Model->get_adminActionEvents();

		if($result){

			echo json_encode($result['events']);

		}else{
			echo json_encode('error');
		}
	}
	
	public function insert_cancel_class() {
		
		
		$classList=$this->input->post('ClassList[]');
		$rescheduleClass = $this->input->post('RescheduleClass');
		$eventAction= $this->input->post('EventAction');
		$reason= $this->input->post('Reason');
		$ClickDate = $this->input->post('ClickDate');
		$result = $this->Admin_Model->insert_cancel_class();
		$config = $this->config->item('email_detail');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");


	if($result){
		if(!empty($classList)){
			foreach($classList as $list){
				$res = $this->Admin_Model->getUser_byClassId($list);
				$classDetail = $this->Admin_Model->getClass_byId($list);
				$className = $classDetail['ClassName'];
				if(!empty($res)){
					$arr_mail = array();
					foreach($res as $user){
						$classId=$user['ClassName'];
						$FirstName=$user['FirstName'];
						$LastName=$user['LastName'];
						$emailAddress=$user['EmailAddress'];
						$user['title'] = 'Cancelled Class';
						$user['content']='<span class="promotion-code" style="text-overflow: ellipsis;font-size: 14px;font-style: italic;line-height: 35px;color: #136193;font-weight: 400;"> Dear, <br> '.$className.' Has been cancelled on '.$ClickDate.', <br>Reason is : <b>'.$reason.'</b>.';
						$message = $this->load->view('email-template',$user,true);
						// $status = false;
						if(isset($emailAddress) && !empty($emailAddress)) {
							array_push($arr_mail, $emailAddress);
						}
					}
				}
				$this->email->from('info@maayog.com','Maayog');
				$this->email->to($arr_mail);
				$this->email->cc('sneha.k@purpledot.in');
				// $this->email->bcc('sneha.k@purpledot.in');
				$this->email->subject($className.' has been cancelled');
				$this->email->message($message);
				if($this->email->send()){
				}
			}
		} elseif(!empty($rescheduleClass)){
			$res = $this->Admin_Model->getUser_byClassId($rescheduleClass);
			if(!empty($res)){
				$reschedule_mail = array();
				foreach($res as $user){
					$classId=$user['ClassName'];
					$FirstName=$user['FirstName'];
					$LastName=$user['LastName'];
					$emailAddress=$user['EmailAddress'];
					$classDetail = $this->Admin_Model->getClass_byId($classId);
					$className = $classDetail['ClassName'];
					$user['title'] = 'Rescheduled Class';
					$user['content']='<span class="promotion-code" style="text-overflow: ellipsis;font-size: 14px;font-style: italic;line-height: 35px;color: #136193;font-weight: 400;"> Dear, <br> '.$className.' has been rescheduled on '.$this->input->post('RescheduleDate').', <br>Reason is : <b>'.$reason.'</b>.<br> Kindly login with maayog for more detail.';
					$message = $this->load->view('email-template',$user,true);
					if(isset($emailAddress) && !empty($emailAddress)) {
						array_push($reschedule_mail, $emailAddress);
					}
				}
				$this->email->from('info@maayog.com','Maayog');
				$this->email->to($reschedule_mail);
				$this->email->cc('sneha.k@purpledot.in');
				// $this->email->bcc('sneha.k@purpledot.in');
				$this->email->subject($className.' has been rescheduled');
				$this->email->message($message);
				if($this->email->send()){
				} 
			}
		}elseif(empty($rescheduleClass) && empty($classList) && $eventAction == 3){
			$resp = $this->Admin_Model->getusers();
			if(!empty($resp)){
				$user_arr = array();
				foreach($resp as $userDetail){
					$FirstName=$userDetail['FirstName'];
					$LastName=$userDetail['LastName'];
					$emailAddress=$userDetail['EmailAddress'];
					$userDetail['title'] = 'New Event Created';
					$userDetail['content']='<span class="promotion-code" style="text-overflow: ellipsis;font-size: 14px;font-style: italic;line-height: 35px;color: #136193;font-weight: 400;"> Dear, <br> A new event created for <b>'.$reason.'</b>.<br> Kindly login with maayog for more detail.';
					$message = $this->load->view('email-template',$userDetail,true);
					if(isset($emailAddress) && !empty($emailAddress)) {
						array_push($user_arr, $emailAddress);
					}
				}
				$this->email->from('info@maayog.com','Maayog');
				$this->email->to($user_arr);
				$this->email->cc('sneha.k@purpledot.in');
				// $this->email->bcc('sneha.k@purpledot.in');
				$this->email->subject('New event created');
				$this->email->message($message);
				if($this->email->send()){
				}
			} 
		}
		echo json_encode($result);
	}else{
		echo json_encode('error');
	}
		
	}
	
	public function paymentHistory() {
		
		$result['all_payment_history'] = $this->Admin_Model->get_allPaymentHistory();
		$result['ind_payment_history'] = $this->Admin_Model->get_indPaymentHistory();
		$result['cor_payment_history'] = $this->Admin_Model->get_corPaymentHistory();
		$this->load->view('payment_history',$result);
	}
	public function get_notification_count() {
		$result['notification_count'] = $this->Admin_Model->get_notification_count();
		if($result) {
			return $result;
		}
		else{
			return false;
		}
	}
	public function getNotification() {
		
		$result['notification'] = $this->Admin_Model->getNotification();
		// echo "<pre>";
		// print_r($result);
		if($result) {
			$this->load->view('notification',$result);
			// $this->load->view('notification');
		}
		else{
			return false;
		}
	}
	public function update_notification_count() {
		
		$result['notification'] = $this->Admin_Model->update_notification_count();
		// echo "<pre>";
		// print_r($result);
		if($result) {
			//return $result;
			//$this->load->view('notification',$result);
			// $this->load->view('notification');
		}
		else{
			return false;
		}
	}	
	public function contactus() {
		
		$this->load->view('contact_us');
	}	
	public function check_user() {
		
		$result = $this->Admin_Model->check_user();

	}	
	public function check_corp() {
		
		$result = $this->Admin_Model->check_corp();

	}
	public function check_pwd() {
		
		$result = $this->Admin_Model->check_pwd();

	}
		#get table after editing class
	public function update_pwd() {
		$result = $this->Admin_Model->update_pwd();
		if($result){
			$this->session->set_flashdata('message', 'succ');
			redirect('user-profile');
		}else{
			return false;
		}  
	}
	// public function search_keyword()
	// {
		// $keyword    =   $this->input->post('keyword');
		// $data['results']    =   $this->Admin_Model->search($keyword);
		// $this->twig->display('result_view.php',$data);
		// //$this->load->view('result_view.php',$data);
	// }
	 // public function execute_search()
    // {
        // // Retrieve the posted search term.
        // $search_term = $this->input->post('Search');

        // // Use a model to retrieve the results.
        // $data['results'] = $this->Admin_Model->get_results($search_term);

        // // Pass the results to the view.
        // $this->load->view('search_results',$data);
    // }

}
