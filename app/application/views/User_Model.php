<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model{
function __construct() {
	parent::__construct();
}

	  
######################################################################################################
# register User/admin Section
#
#
#
#####################################################################################################

	#to register user
	public function registerUser() {
		$data = array(
		"FullName" => $this->input->post('FirstName').' '.$this->input->post('LastName'),
		"FirstName" => $this->input->post('FirstName'),
		"LastName" => $this->input->post('LastName'),
		"Role" => '1',
		"EmailAddress" => $this->input->post('EmailAddress'),
		"MobileNumber" => $this->input->post('MobileNumber'),
		"Password" => $this->input->post('Password'),
		"CreatedBy" => $this->input->post('EmailAddress'),
		"CreatedOn" => date('Y-m-d: H:i:s'),
		"Status" => 1,
		"MarkAsDelete" => 0,
		);
		$query = $this->db->insert('registered_user',$data);
		$RegId = $this->db->insert_id();
		$max_id = $this->db->select('UserId')->order_by('UserId','desc')->limit(1)->get('user')->row('UserId');
		$max_id = (!empty($max_id))? $max_id+1 : 1;
		$num = "00000";
		//$max_id = "1";
		$fin_id = $num.$max_id;
		$chr = substr($fin_id,-5);
		$str = "IND";
		$User_UniqueId= $str."-".$chr;
	  if($RegId){
			$user_data = array(
				"RegId" => $RegId,
				"UserType" => 'Individual',
				"User_UniqueId" => $User_UniqueId,
				"Role" => '1',
				"ProfilePhoto" => $this->input->post('ProfilePhoto'),
				"FirstName" => $this->input->post('FirstName'),
				"LastName" => $this->input->post('LastName'),
				"MobileNumber" => $this->input->post('MobileNumber'),
				"EmailAddress" => $this->input->post('EmailAddress'),
				"CreatedBy" => $this->input->post('EmailAddress'),
				"CreatedOn" => date('Y-m-d: H:i:s'),
				"Status" => 1,
				"MarkAsDelete" => 0,
			);
		//	$emailAddress = $this->input->post('EmailAddress');
			$query = $this->db->insert('user',$user_data);
			if($query){
			 $notification_data = array(
				"Role" => '1',
				"Name" => $this->input->post('FirstName').' '.$this->input->post('LastName'),
				"RegId" => $RegId,
				"Message" => $this->input->post('FirstName').' '.$this->input->post('LastName').' is registered with maayog',
				"Reason" => 'Yoga Classes',
				"ShortMessage" => 'New User Registered',
				"CreatedBy" => $this->input->post('EmailAddress'),
				"CreatedOn" => date('Y-m-d: H:i:s'),
				"Status" => 1,
				"MarkAsDelete" => 0,
			);
			$notification_query = $this->db->insert('notification',$notification_data);
			if($notification_query){
				// $trans_notification_data = array(
					// "Role" => '1',
					// "UserId" => $RegId,
					// "ReadStatus" =>0,
				// );
				// $trans_notification_query = $this->db->insert('trans_notification',$trans_notification_data);
				// if($trans_notification_query){
					return true;
				}
			}
		  }else{
			  return false;
		  
		}
	}
	
	#to insert contact message
	public function cancel_class_modal_hide() {
		$u_where = array(
			"RegId" => $this->session->userdata('UserId'),
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$userId= $this->session->userdata('UserId');
		$userQuery = $this->db->get_where('user',$u_where);
		$u_result = $userQuery->row_array();
		$ClassId = $u_result['ClassName'];
		// echo $ClassId;
		$where = array(
			// "UserList" => $this->session->userdata('UserId'),
			// "ClassList" => $u_result['ClassName'],
			"CurrentDate" => $this->input->post('ClickDate'),
		);
		$query = $this->db->get_where('class_action', $where);
		// echo $this->db->last_query(); die();
		$result = $query->row_array();
		$userList = json_decode($result['UserList']);
		$classList = json_decode($result['ClassList']);
	
		if((!empty($classList) AND in_array($ClassId, $classList)) OR (!empty($userList) AND in_array($userId, $userList))){
			return true;
		}else{
		  return false;
		}
		exit;
	} 
	#to not attend class by user
	public function insert_cancel_classbyUser() {
		
		
		$arr_user = array();
		$userId = $this->session->userdata('UserId');
		$where = array(
			"CurrentDate" => $this->input->post('UserClickDate'),
		);
		$query = $this->db->get_where('class_action', $where);
		$result = $query->row_array();
		if($result['UserList']){
			
			$arr_user = json_decode($result['UserList']);
			array_push($arr_user, $userId);
			
		} else{
			
			array_push($arr_user,$userId);
		}
		print_r($arr_user);
		$data = array(
			"UserList" => json_encode($arr_user),
			"CurrentDate" => $this->input->post('UserClickDate'),
			"Reason" => $this->input->post('Reason'),
			"CreatedBy" => $this->session->userdata('EmailAddress'),
			"CreatedOn" => date('Y-m-d: H:i:s'),
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		// echo '<pre>';
		// print_r($data);
		// exit;
	  $query = $this->db->insert('class_action',$data);
	  
	  if($query){
		  $notification_data = array(
				"Role" => '1',
				"Name" => $this->session->userdata('FullName'),
				"RegId" => $this->session->userdata('UserId'),
				"Message" => $this->session->userdata('FullName').' will not attend class',
				"ShortMessage" => 'Class NotAttending',
				"Reason" => $this->input->post('Reason'),
				"CreatedBy" => $this->session->userdata('EmailAddress'),
				"CreatedOn" => date('Y-m-d: H:i:s'),
				"Status" => 1,
				"MarkAsDelete" => 0,
			);
		$notification_query = $this->db->insert('notification',$notification_data);
		if($notification_query){
			  return true;
			
		}else{
			return false;
		}
	}
	}
	#to insert contact message
	public function insert_message() {
		$data = array(
			"UserId" => $this->session->userdata('UserId'),
			"Subject" => $this->input->post('FeedbackType'),
			"Message" => $this->input->post('Message'),
		);
		
	  $query = $this->db->insert('user_feedback',$data);
	  if($query){
		  return true;
	  }else{
		  return false;
	  }
	} 
	#to get types of classes
	public function getClass_type() {
		$query = $this->db->get('class_type');
		$result = $query->result_array();
		if($query){
			return $result;
		}else{
			return false;
		}   
	}
	#to check user is registered or not 
	public function check_user() {
		$where = array(
			"EmailAddress" => $this->input->post('EmailAddress'),
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$query = $this->db->get_where('registered_user',$where);
		$count = $query->num_rows();
		
		if($count == 0){
			$isAvailable = True;
		}else{
			$isAvailable = False;
		}   
		echo json_encode(array('valid' => $isAvailable));
	}
	#to check company name is available or not 
	public function check_corp() {
		$where = array(
			"CompanyName" => $this->input->post('CompanyName'),
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$query = $this->db->get_where('corporate',$where);
		$count = $query->num_rows();
		
		if($count == 0){
			$isAvailable = True;
		}else{
			$isAvailable = False;
		}   
		echo json_encode(array('valid' => $isAvailable));
	}
	#to check password validation 
	public function check_pwd() {
		$where = array(
			"RegId" => $this->session->userdata('UserId'),
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$query = $this->db->get_where('registered_user',$where);
		$count = $query->num_rows();
		$result =$query->row_array();
		$pwd=$result['Password'];
		$pwdPost=$this->input->post('CurrentPassword');
		// echo "<pre>";
		// print_r($query);
		// die();
		if($pwd == $pwdPost){
			$isAvailable = True;
		}else{
			$isAvailable = False;
		}   
		echo json_encode(array('valid' => $isAvailable));
	}
	#to update password for logged in admin/user
	public function update_pwd() {
		$where = array(
			"RegId" => $this->session->userdata('UserId'),
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$pwd = array(
			"Password" => $this->input->post('ConfirmPassword')
		);
		$query = $this->db->where($where);
		$query = $this->db->update('registered_user',$pwd);
		if($query){
			return true;
		}else{
			return false;
		}   
	}
	public function check_mail() {
		$where = array(
			"EmailAddress" => $this->input->post('EmailAddress'),
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$query = $this->db->get_where('registered_user',$where);
		$count = $query->num_rows();
		
		if($count == 0){
			$isAvailable = False;
		}else{
			$isAvailable = True;
		}   
		echo json_encode(array('valid' => $isAvailable));
	}
	
		  
######################################################################################################
# Login Section
#
#
#
#####################################################################################################
	
	#to verify login credential for user
	public function check_login() {
		$where = array(
			"EmailAddress" => $this->input->post('EmailAddress'),
			"Password" => $this->input->post('Password'),
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$query = $this->db->get_where('registered_user',$where);
		$count = $query->num_rows();
		if($count == 1){
			$result = $query->row_array();
				$sess_data = array(
				"UserId" => $result['RegId'],
				"FirstName" => $result['FirstName'],
				"LastName" => $result['LastName'],
				"FullName" => $result['FirstName'].' '.$result['LastName'],
				"EmailAddress" => $result['EmailAddress'],
				"Role" => $result['Role']
			);
			// print_
			$this->session->sess_destroy();
			$this->session->set_userdata($sess_data);
			return true;
		}else{
			return false;
		}   
	}
	
	public function all_users() {
	  $this->db->select('*');
	  $this->db->from('form');
	  $result = $this->db->get();
	  return $result->result();
	}
	
	
	
######################################################################################################
# 
#User/Admin Profile Section
#1)view user/admin profile based on who is logged in
#2)update user/admin profile based on who is logged in
#3)get health problem
#3)get health problem for admin/user who is logged in
#
#####################################################################################################
	
	#to get user data from session user id
	public function userProfileDetail() {
		$where = array(
			"RegId" => $this->session->userdata('UserId'),
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$query = $this->db->get_where('user',$where);
		$result = $query->row_array();
		if($query){
			return $result;
		}else{
			return false;
		}   
	}	
	#to get password for forget password
	public function forgot_pwdMail() {
		$where = array(
			"EmailAddress" => $this->input->post('EmailAddress'),
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$query = $this->db->get_where('registered_user',$where);
		$result = $query->row_array();
		if($query){
			return $result;
		}else{
			return false;
		}   
	}	
		
	public function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
	}
	//to edit user data from session user id
	public function updateUserDetail() {
		$dob =  $this->input->post('DOB');
		$dateofBirth = date('Y-m-d', strtotime($dob));
		$dir = "assets/images/";
		$target_fileimages = '';
		if (!empty($_FILES['ProfilePhoto']['name'])) 
		{ 
			$filename = stripslashes($_FILES['ProfilePhoto']['name']);
			$extension = $this->getExtension($filename);
			$extension = strtolower($extension);
			$img_ext = rand(000000,999999)."_".rand(000000,999999).".".$extension;
			$target_fileimages = $dir.$img_ext;
			move_uploaded_file($_FILES["ProfilePhoto"]["tmp_name"], $target_fileimages) ;
		} else{
			$target_fileimages = $this->input->post('CheckProfilePhoto');
		}
		$where = array(
			"RegId" => $this->session->userdata('UserId'),
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$checed = $this->input->post('CheckAddress');
		$user_detail=array(
			"FirstName" => $this->input->post('FirstName'),
			"LastName" => $this->input->post('LastName'),
			"MobileNumber" => $this->input->post('MobileNumber'),
			"ProfilePhoto" => $target_fileimages,
			"EmailAddress" => $this->input->post('EmailAddress'),
			"DateOfBirth" => $dateofBirth,
			"Gender" => $this->input->post('Gender'),
			"AadharNumber" => $this->input->post('AadharNumber'),
			"HealthCondition" => $this->input->post('HealthCondition'),
			"HealthProblem" => $this->input->post('HealthProblem'),
			"AddressLine1" => $this->input->post('AddressLine1'),
			"AddressLine2" => $this->input->post('AddressLine2'),
			"City" => $this->input->post('City'),
			"State" => $this->input->post('State'),
			"PinCode" => $this->input->post('PinCode'),
			"Country" => $this->input->post('Country'),
			"IsChecked" => (!empty($checed)) ? '1' : '',
			"LocalAddressLine1" => $this->input->post('LocalAddressLine1'),
			"LocalAddressLine2" => $this->input->post('LocalAddressLine2'),
			"LocalCity" => $this->input->post('LocalCity'),
			"LocalState" => $this->input->post('LocalState'),
			"LocalPinCode" => $this->input->post('LocalPinCode'),
			"LocalCountry" => $this->input->post('LocalCountry'),
		);
		// echo '<pre>';
		// print_r($user_detail);
// exit;
		$user_reg=array(
			"FirstName" => $this->input->post('FirstName'),
			"LastName" => $this->input->post('LastName'),
			"MobileNumber" => $this->input->post('MobileNumber'),
		);
		$query = $this->db->where($where);
		$query = $this->db->update('registered_user',$user_reg);
		if($query){
			$query1 = $this->db->where($where);
			$query1 = $this->db->update('user',$user_detail);
			if($query1){
				return true;
			} else{
				return false;
			}  
		}else{
			return false;
		}  
	}
	  #get list of health problem
	public function get_healthProblem() {
		
		$query = $this->db->get('health_problem');
		$result = $query->result_array();
		if($result){
			
			return $result;
			
		}else{
			return false;
		}   
	  }
	  #get list of corporates
	public function get_corpType() {
		
		$query = $this->db->get('corporate');
		$result = $query->result_array();
		if($result){
			
			return $result;
			
		}else{
			return false;
		}   
	  }	
	  #get list of corporates
	public function get_feedbackType() {
		
		$query = $this->db->get('feedbacktype');
		$result = $query->result_array();
		if($result){
			
			return $result;
			
		}else{
			return false;
		}   
	  }	
	  
	  #get list of users
	public function get_user() {
		$query=$this->db->select('*')
		 ->from('user as u')
		 ->where('u.RegId', $this->session->userdata('UserId'))
		 ->where('u.Status', '1')
		 ->where('u.MarkAsDelete', '0')
		 ->join('class as c', 'c.ClassId = u.ClassName', 'LEFT')
		 ->get();
		 $result=$query->row_array();
		 // echo $this->db->last_query();
		if($result){
			return $result;
			
		}else{
			return false;
		}   
	  }	
	  
	  #get costs based on yoga duration
	public function get_yogaCost() {
		$where = array(
			"YogaDuration" => $this->input->post('PackageType')
		);
		$query = $this->db->get_where('yoga_package',$where);
		// echo $this->db->last_query();
		$result = $query->row_array();
		if($result){
			
			return $result;
			
		}else{
			return false;
		}   
	  }	 
	  
	#get class detail for logged in User
	// public function get_ClassbyLoggedinUser() {
		// $where = array(
			// "user.RegId" => $this->session->userdata('UserId'),
			// "user.Status" => 1,
			// "user.MarkAsDelete" => 0,
		// );
		// $query= $this->db->join('class', 'class.ClassId = user.ClassName');
		// $query = $this->db->get_where('user',$where);
		// // echo $this->db->last_query(); die();
		// $result = $query->row_array();
		// // $where1 = array(
			// // "HealthId" => $result['HealthProblem'],
		// // );
		// // $query1 = $this->db->get_where('health_problem',$where1);
		// // $result1 = $query1->row_array();
		// // $userid=$this->session->userdata('UserId');
		// if($result){
			
			// return $result;
			
		// }else{
			// return false;
		// }   
	  // }		  
	#get list of health problem of logged in User
	public function get_healthProblemforSessionUser() {
		$where = array(
			"RegId" => $this->session->userdata('UserId'),
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$query = $this->db->get_where('user',$where);
		// echo $this->db->last_query();
		$result = $query->row_array();
		//print_r($result);
		$where1 = array(
			"HealthId" => $result['HealthProblem'],
		);
		$query1 = $this->db->get_where('health_problem',$where1);
		// echo $this->db->last_query();
		$result1 = $query1->row_array();
		//print_r($result1);
		$userid=$this->session->userdata('UserId');
		if($result1){
			
			return $result1;
			
		}else{
			return false;
		}   
	  }		
	#get list of health problem of logged in User
	public function get_cancelledClass() {
		$cancelClass = array();
		$events = array();
		$userCancelClass = array();
		$Totalevents = array();
		$rescheduleClass = array();
		$rescheduleClassListArray = array();
		$where = array(
			"UserId" => $this->session->userdata('UserId'),
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$query=$this->db->select('u.ClassName as u_classId, c.ClassName as ClassName')
		 ->from('user as u')
		 ->where('u.UserId', $this->session->userdata('UserId'))
		 ->where('u.Status', '1')
		 ->where('u.MarkAsDelete', '0')
		 ->join('class as c', 'c.ClassId = u.ClassName', 'LEFT')
		 ->get();
		$result = $query->row_array();
		if(!empty($result)){
			$eventwhere = array(
				"Status" => 1,
				"MarkAsDelete" => 0,
			);
		
			$query1 = $this->db->where($eventwhere);
			// $query1 = $this->db->where("(EventList='1' OR EventList='2' OR EventList='3')", NULL, FALSE);
			$query1 = $this->db->get('class_action');
			$result1 = $query1->result_array();
			$classList=$result['u_classId'];
			foreach($result1 as $key => $res){
				if (!empty($res['UserList'])){
					$u['id'] = $result['u_classId'];
					$u['title'] =  "Not attending class beacuse ".$res['Reason'];
					$u['start'] = $res['CurrentDate'];
					 //$c['end'] = $resu['EndDate'];
					$u['allDay'] = true;
					$u['className'] = 'primary';
					array_push($userCancelClass, $u);
				}
				$e= array();
				$classCheckList= json_decode($res['ClassList'],true);
				if($res['EventList'] == '1'){
					if(in_array($classList, $classCheckList)){
						//echo "hello";
						// return $classList;
						$e['id'] = $result['u_classId'];
						$e['title'] = $result['ClassName']." cancelled";
						$e['start'] = $res['CurrentDate'];
						 //$e['end'] = $re['EndDate'];
						$e['allDay'] = true;
						$e['className'] = 'important';
						array_push($cancelClass, $e);
					}
				}
				$classRescheduleList= json_decode($res['RescheduleList'],true);
				if($res['EventList'] == '2'){
					$p['id'] = $result['u_classId'];
					$p['title'] = $result['ClassName']." from ".date("d M", strtotime($res['CreatedOn']))." is rescheduled on ".date("g:i A", strtotime($res['ClassTime']));
					$p['start'] = $res['CurrentDate'];
					 //$c['end'] = $resu['EndDate'];
					$p['allDay'] = true;
					$p['className'] = 'success';
					array_push($rescheduleClassListArray, $p);
					$c['id'] = $result['u_classId'];
					$c['title'] = $result['ClassName']." is rescheduled on ".date("d M", strtotime($res['CurrentDate']));
					$c['start'] = $res['CreatedOn'];
					 //$c['end'] = $resu['EndDate'];
					$c['allDay'] = true;
					$c['className'] = 'success';
					array_push($rescheduleClass, $c);
				}
			}
			//data fetched from event calendar not from class_action
			$eventwhere = array(
				"Status" => 1,
				"MarkAsDelete" => 0,
			);
			$query2 = $this->db->get_where('event_calendar',$eventwhere);
			$result2 = $query2->result_array();
			foreach($result2 as $key => $re){
				$e['id'] = $re['EventId'];
				$e['title'] = $re['EventName'];
				$e['start'] = $re['EventDate'];
				 //$e['end'] = $re['EndDate'];
				$e['allDay'] = true;
				$e['className'] = 'info';
				array_push($events, $e);
			}
		$Totalevents=array_merge($events,$cancelClass,$rescheduleClass,$rescheduleClassListArray,$userCancelClass);
			return json_encode($Totalevents);  
		}
		else{
			return false;
		}
	  }	
######################################################################################################
# 
#User/Admin Profile Section
#1)view user/admin profile based on who is logged in
#2)update user/admin profile based on who is logged in
#3)get health problem
#3)get health problem for admin/user who is logged in
#
#####################################################################################################
	public function getNotification() {
		$query = $this->db->order_by('CreatedOn','desc');
		$query = $this->db->where_not_in('Role','1');
		$query = $this->db->get('notification');
		$result = $query->result_array();
		if($query){
			
			return $result;
			
		}else{
			return false;
		}   
	}
	public function get_latest_notification() {
		$query = $this->db->order_by('CreatedOn','desc');
		$query = $this->db->where_not_in('Role','1');
		$query = $this->db->limit(5);
		$query = $this->db->get('notification');
		$result = $query->result_array();
		if($query){
			
			return $result;
			
		}else{
			return false;
		}   
	}
	public function get_notification_count() { 
		$where = array(
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$query = $this->db->select('NotificationId');
		$query = $this->db->where_not_in('Role','1');
		$query = $this->db->get_where('notification',$where);
		if($query->num_rows() > 0 ){

			$Ids = array();
			foreach($query->result_array() as $k => $resp){
				array_push($Ids,$resp['NotificationId']);
			}
			
			$wheres = array(
				"Role" => $this->session->userdata('Role'),
				"RegId" => $this->session->userdata('UserId'),
				"ReadStatus" =>1,
			);
			$Tquery = $this->db->select('NotificationAutoId as NotificationId');
			$Tquery = $this->db->where_in('NotificationAutoId',$Ids);
			$Tquery = $this->db->get_where('trans_notification',$wheres);
			// echo $this->db->last_query(); die();

			$GRes = $Tquery->result_array();
			if($Tquery->num_rows() > 0 ){
				$GId = array();
				foreach($GRes as $ke => $res){
					array_push($GId,$res['NotificationId']);
				}
				$Gwhere = array(
					"Status" => 1,
					"MarkAsDelete" => 0,
				);
				$Gquery = $this->db->select('NotificationId');
				$Gquery = $this->db->where_not_in('Role','1');
				$Gquery = $this->db->where_not_in('NotificationId',$GId);
				$Gquery = $this->db->get_where('notification',$Gwhere);
				
				
				// echo $this->db->last_query(); die();
				$result['count'] = $Gquery->num_rows();
				$Id = array();
				foreach($Gquery->result_array() as $k => $resp){
					array_push($Id,$resp['NotificationId']);
				}
				$result['Ids'] = $Id;
				if($query){
					echo json_encode($result);
				}else{
					echo false;
				}
			}else{
				
				// echo $this->db->last_query(); die();
				$result['count'] = $query->num_rows();
				$Id = array();
				foreach($query->result_array() as $k => $resp){
					array_push($Id,$resp['NotificationId']);
				}
				$result['Ids'] = $Id;
				if($query){
					echo json_encode($result);
				}else{
					echo false;
				}
			}
		}else{
			echo false;
		}
	}
	public function update_notification_count() {
		$N_arr = array();
		$message_data = array();
		$Id = $this->input->post('NotificationId');
		$N_arr = explode(',',$Id[0]);

		foreach ($N_arr as $key) {
			$trans_notification_data = array(
				"NotificationAutoId" => $key,
				"Role" => $this->session->userdata('Role'),
				"RegId" => $this->session->userdata('UserId'),
				"ReadStatus" =>1,
			);
			$message_data[] = $trans_notification_data;
		}
		$trans_notification_query = $this->db->insert_batch( 'trans_notification', $message_data );
		if($trans_notification_query){
			return true;
		}  
	}
}
?>