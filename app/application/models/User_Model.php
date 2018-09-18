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
				"UserType" => '1',
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
			$query1 = $this->db->insert('user',$user_data);
			if($query1){
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
		$class_where = array(
			"ClassId" => $u_result['ClassName'],
			"StartDate <= " => $this->input->post('ClickDate'),
			"EndDate >= " => $this->input->post('ClickDate'),
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$classQuery = $this->db->get_where('class',$class_where);
		$c_result = $classQuery->row_array();
		// if(empty($c_result)){
			// return true;
		// }
		// else{
			// return false;
		// }
		// echo $ClassId;
		if(!empty($c_result)){

			$where = array(
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
		} else{
			return true;
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
	
	#to get user detail
	public function get_userDetail($id) {
		// $query = $this->db->get('class_type');
		// $result = $query->result_array();
		$query = $this->db->select('u.ClassName as ClassId, u.FirstName as FName, u.LastName as LName, u.EmailAddress as emailAddress, c.ClassName as className')
		 ->from('user as u')
		 ->where('u.RegId', $id)
		 ->join('class as c', 'u.ClassName = c.ClassId', 'LEFT')
		 ->get();
// echo $this->db->last_query();
// exit;
		$result = $query->row_array();
		if($query){
			return $result;
		}else{
			return false;
		}   
	}
	
	#to get types of classes
	public function get_userClass($classId) {
		$where = array(
			"ClassId" => $classId,
		);
		$query = $this->db->get_where('class',$where);
		$result = $query->row_array();
		if($query){
			return $result;
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
				"MobileNumber" => $result['MobileNumber'],
				"Role" => $result['Role']
			);
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
// print_r($result);
// exit;
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
	  #get list of corporates
	public function get_feedbackType_byId($id) {
		$where = array(
		"FeedbackTypeId" => $id
		);
		$query = $this->db->get_where('feedbacktype',$where);
		$result = $query->row_array();
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
	public function get_yogaPackage() {
		$where = array(
		"MarkAsDelete" => 0
		);
		$query = $this->db->get_where('yoga_package',$where);
		// echo $this->db->last_query();
		$result = $query->result_array();
		if($result){

		return $result;

		}else{
		return false;
		}   
	}
	public function get_yogaCost() {
		$where = array(
		"YogaDuration" => $this->input->post('YogaDuration'),
		"MarkAsDelete" => 0
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
	#get class or event on calendar
	public function get_classBackground() {
		$userId= $this->session->userdata('UserId');
		$ClassDetail = array();
		$Totalevents = array();
		$where = array(
			"UserId" => $userId,
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$query=$this->db->select('u.ClassName as u_classId, c.ClassName as ClassName,c.StartDate,c.EndDate')
		 ->from('user as u')
		 ->where('u.RegId',$userId)
		 ->where('u.Status', '1')
		 ->where('u.MarkAsDelete', '0')
		 ->join('class as c', 'c.ClassId = u.ClassName', 'LEFT')
		 ->get();
		$result = $query->row_array();
		
		if(!empty($result)){
			$class_arr= array();
			$class_arr['id'] = $result['u_classId'];
			$class_arr['title'] =  "Class Date";
			$class_arr['start'] = $result['StartDate'];
			$class_arr['end'] = $result['EndDate'];
			$class_arr['allDay'] = true;
			$class_arr['className'] = 'red';
			$class_arr['backgroundColor'] = 'green';
			$class_arr['borderColor'] = 'yellow';
			array_push($ClassDetail, $class_arr);
			
			// $Totalevents=array_merge($events,$cancelClass,$rescheduleClass,$rescheduleClassListArray,$userCancelClass);
			return $ClassDetail;  
		}
		else{
			return false;
		}
	}
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
	  
	#get list of cancelled class by user
	public function get_class_detail() {
		$userId= $this->session->userdata('UserId');
		$query = $this->db->select('u.ClassName as u_classId, c.ClassName as ClassName, c.ClassType, c.StartDate, c.EndDate,c.StartTime,c.EndTime')
				 ->from('user as u')
				 ->where('u.RegId', $userId)
				 ->join('class as c', 'u.ClassName = c.ClassId', 'LEFT')
				 ->get();
	 $result = $query->row_array();
// print_r($result);
	 if($query){
		 $query1 = $this->db->select('*')
				 ->from('class as c1')
				 ->where('c1.StartTime', $result['StartTime'])
				 ->join('time_table as t', 'c1.StartTime = t.TimeId', 'LEFT')
				 ->get();
		$result1 = $query1->row_array();
		$startTime=$result1 ['TimeName']; 
		$query2 = $this->db->select('*')
				 ->from('class as c1')
				 ->where('c1.EndTime', $result['EndTime'])
				 ->join('time_table as t', 'c1.EndTime = t.TimeId', 'LEFT')
				 ->get();
		$result2 = $query2->row_array();
		$endTime=$result2 ['TimeName'];
		array_push($result, $startTime, $endTime);
		// print_r($result1);
		// exit;
		return $result;
	 }else{
		 return false;
	 }
	}
	public function getNotification() {
		$response = $this->get_user();
		$ClsId = (!empty($response['ClassId'])) ? $response['ClassId'] : '';
		$query = $this->db->order_by('CreatedOn','desc');
		$query = $this->db->where_not_in('Role','1');
		$query = $this->db->where('ClassId', $ClsId);
		$query = $this->db->or_where('EventId','3');
		$query = $this->db->get('notification');
		$result = $query->result_array();
		if($query){
			
			return $result;
			
		}else{
			return false;
		}   
	}
	public function get_latest_notification() {
		$response = $this->get_user();
		$ClsId = (!empty($response['ClassId'])) ? $response['ClassId'] : '';

		$query = $this->db->order_by('CreatedOn','desc');
		$query = $this->db->where_not_in('Role','1');
		$query = $this->db->where('ClassId', $ClsId);
		$query = $this->db->or_where('EventId','3');
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
		$userId = $this->session->userdata('UserId');
		$response = $this->get_user();
		$ClsId = (!empty($response['ClassId'])) ? $response['ClassId'] : '';
		$where = array(
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$query = $this->db->select('NotificationId');
		$query = $this->db->where_not_in('Role','1');
		$query = $this->db->where('ClassId', $ClsId);
		$query = $this->db->or_where('EventId','3');
		$query = $this->db->get_where('notification',$where);

		if($query->num_rows() > 0) {

			$Ids = array();
			foreach($query->result_array() as $k => $resp){
				array_push($Ids,$resp['NotificationId']);
			}

			$wheres = array(
				"Role" => $this->session->userdata('Role'),
				"RegId" => $userId,
				"ReadStatus" =>1,
			);
			$Tquery = $this->db->select('NotificationAutoId as NotificationId');
			$Tquery = $this->db->where_in('NotificationAutoId',$Ids);
			$Tquery = $this->db->get_where('trans_notification',$wheres);

			$GRes = $Tquery->result_array();
			if($Tquery->num_rows() > 0)  {
				$GId = array();
				foreach($GRes as $ke => $res){
					array_push($GId,$res['NotificationId']);
				}
				$Gwhere = array(
				"Status" => 1,
				"MarkAsDelete" => 0,
				);
				$RIds = array();
				$result = array();
				$RIds = array_diff($Ids,$GId);
				
				if(count($RIds) > 0) {
					
					$Gquery = $this->db->select('NotificationId');
					$Gquery = $this->db->where_not_in('Role','1');
						// $Gquery = $this->db->where('ClassId', $ClsId);
					// $Gquery = $this->db->or_where('EventId','3');
					$Gquery = $this->db->where_in('NotificationId',$RIds);
					$Gquery = $this->db->get_where('notification',$Gwhere);
										// echo $this->db->last_query(); die();
					$result['count'] = $Gquery->num_rows();
					$Id = array();
					foreach($Gquery->result_array() as $k => $Gresp){
						array_push($Id,$Gresp['NotificationId']);
					}
					$result['Ids'] = $Id;
				} else {
					$result['count'] = 0;
					$result['Ids'] = [];
				}
				echo json_encode($result);

			}else{
				$result['count'] = $query->num_rows();
				$Id = array();
				foreach($query->result_array() as $k => $resp){
					array_push($Id,$resp['NotificationId']);
				}
				$result['Ids'] = $Id;
				if($query){
				  echo json_encode($result);
				} else {
					echo false;
				}
			}
		} else {
			 $result['count'] = 0;
			 $result['Ids'] = [];
			 echo json_encode($result);
		}
	}	

	public function insert_cancel_classbyUser() {
		$reason=$this->input->post('Reason');
		$ClickDate = $this->input->post('UserClickDate');
		$arr_user = array();
		$arr_reason = array();
		$userId = $this->session->userdata('UserId');
		$where = array(
			"CurrentDate" => $this->input->post('UserClickDate'),
		);
		$query = $this->db->get_where('class_action', $where);
		$result = $query->row_array();
		if($result['UserList']){
			$arr_reason=json_decode($result['Reason']);
			array_push($arr_reason, $reason);
			
			$arr_user = json_decode($result['UserList']);
			array_push($arr_user, $userId);
			$data = array(
				"UserList" => json_encode($arr_user),
				"CurrentDate" => $ClickDate,
				"Reason" => json_encode($arr_reason),
				"CreatedBy" => $this->session->userdata('EmailAddress'),
				"CreatedOn" => date('Y-m-d: H:i:s'),
				"Status" => 1,
				"MarkAsDelete" => 0,
			);
			
		  $query1 = $this->db->where('CurrentDate',$ClickDate);
		  $query1 = $this->db->update('class_action',$data);
		} else{
			array_push($arr_reason, $reason);
			array_push($arr_user,$userId);
			$data = array(
				"UserList" => json_encode($arr_user),
				"CurrentDate" => $ClickDate,
				"Reason" => json_encode($arr_reason),
				"CreatedBy" => $this->session->userdata('EmailAddress'),
				"CreatedOn" => date('Y-m-d: H:i:s'),
				"Status" => 1,
				"MarkAsDelete" => 0,
			);
		  	$query1 = $this->db->insert('class_action',$data);
		}
	  
		if($query1){
			$notification_data = array(
					"Role" => '1',
					"Name" => $this->session->userdata('FullName'),
					"RegId" => $this->session->userdata('UserId'),
					// "ClassId" => $ClassId,
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
	public function get_cancelledClass() {
		$userId= $this->session->userdata('UserId');
		$cancelClass = array();
		$events = array();
		$userCancelClass = array();
		$ClassDetail = array();
		$Totalevents = array();
		$rescheduleClass = array();
		$rescheduleClassListArray = array();
		$where = array(
			"UserId" => $userId,
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$query=$this->db->select('u.ClassName as u_classId, c.ClassName as ClassName,c.StartDate,c.EndDate')
		 ->from('user as u')
		 ->where('u.RegId',$userId)
		 ->where('u.Status', '1')
		 ->where('u.MarkAsDelete', '0')
		 ->join('class as c', 'c.ClassId = u.ClassName', 'LEFT')
		 ->get();
		 // echo $this->db->last_query(); die();
		$result = $query->row_array();
		if(!empty($result)){
			$eventwhere = array(
				"Status" => 1,
				"MarkAsDelete" => 0,
			);
			$query1 = $this->db->where($eventwhere);
			$query1 = $this->db->get('class_action');
			$result1 = $query1->result_array();
			$classList=$result['u_classId'];
			foreach($result1 as $key => $res){
				if (!empty($res['UserList'])){
					$u= array();
					$usList= json_decode($res['UserList'],true);
					$reasonList= json_decode($res['Reason'],true);
					// array_search($userId,$usList);
					if(in_array($userId, $usList)){
						$u['id'] = $result['u_classId'];
						$u['title'] =  "Not attending class beacuse ".$reasonList[array_search($userId,$usList)];
						$u['start'] = $res['CurrentDate'];
						 //$u['end'] = $res['EndDate'];
						$u['allDay'] = true;
						$u['className'] = 'primary';
						array_push($userCancelClass, $u);
					}
				}
				$e= array();
				$classCheckList= json_decode($res['ClassList'],true);
				if($res['EventList'] == '1'){
					if(in_array($classList, $classCheckList)){
						$e['id'] = $result['u_classId'];
						$e['title'] = $result['ClassName']." cancelled";
						$e['start'] = $res['CurrentDate'];
						$e['allDay'] = true;
						$e['className'] = 'important';
						array_push($cancelClass, $e);
					}
				}
				$classRescheduleList = $res['RescheduleList'];
				if($res['EventList'] == '2' AND $result['u_classId'] == $classRescheduleList){
					$p['id'] = $result['u_classId'];
					$p['title'] = $result['ClassName']." from ".date("d M", strtotime($res['CurrentDate']))." is rescheduled on ".date("g:i A", strtotime($res['ClassTime']));
					$p['start'] = $res['RescheduleDate'];
					 //$c['end'] = $resu['EndDate'];
					$p['allDay'] = true;
					$p['className'] = 'success';
					array_push($rescheduleClassListArray, $p);
					$c['id'] = $result['u_classId'];
					$c['title'] = $result['ClassName']." is rescheduled on ".date("d M", strtotime($res['RescheduleDate']));
					$c['start'] = $res['CurrentDate'];
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
		public function paymentRequest($data) {
		$arr_data = array(
			"RegId" => $data['CUST_ID'],
			"ORDERID" => $data['ORDER_ID'],
			"TXNAMOUNT" => $data['TXN_AMOUNT'],
			"CreatedBy" => $this->session->userdata('EmailAddress'),
			"CreatedOn" => date('Y-m-d: H:i:s'),
			"Status" => 1,
			"MarkAsDelete" => 0
		);
		$user_datails = array_diff($data, $arr_data);
		$trans_data = array(
			"RegId" => $data['CUST_ID'],
			"ORDERID" => $data['ORDER_ID'],
			"TXNAMOUNT" => $data['TXN_AMOUNT'],
			"UserDetails" => (!empty($user_datails)) ? json_encode($user_datails) : '',
			"CreatedBy" => $this->session->userdata('EmailAddress'),
			"CreatedOn" => date('Y-m-d: H:i:s'),
			"Status" => 1,
			"MarkAsDelete" => 0
		);
		$query = $this->db->insert('payment_histroy',$trans_data);
		if($query) {
			return true;
		} else {
			return false;
		}

	}
	public function paymentResponse($data) {
		$where = array(
			"RegId" => $this->session->userdata('UserId'),
			"ORDERID" => $data['ORDERID'],
		);
		$arr_data = array(
			"MID" => $data['MID'],
			"TXNID" => $data['TXNID'],
			"ORDERID" => $data['ORDERID'],
			"TXNAMOUNT" => $data['TXNAMOUNT'],
			"CURRENCY" => $data['CURRENCY'],
			"TXNDATE" => $data['TXNDATE'],
			"TXNSTATUS" => $data['STATUS'],
			"RESPCODE" => $data['RESPCODE'],
			"RESPMSG" => $data['RESPMSG'],
			"GATEWAYNAME" => $data['GATEWAYNAME'],
			"BANKTXNID" => $data['BANKTXNID'],
			"GATEWAYNAME" => $data['GATEWAYNAME'],
			"BANKNAME" => $data['BANKNAME'],
			"PAYMENTMODE" => $data['PAYMENTMODE'],
			"CHECKSUMHASH" => $data['CHECKSUMHASH'],
			"ModifiedBy" => $this->session->userdata('EmailAddress'),
			"ModifiedOn" => date('Y-m-d: H:i:s A'),
			"Status" => 1,
			"MarkAsDelete" => 0
		);
		$query = $this->db->where($where);
		$query = $this->db->update('payment_histroy',$arr_data);
		if($query) {
			return true;
		} else {
			return false;
		}

	}
	public function get_paymentHistory() {
		$where = array(
			"RegId" => $this->session->userdata('UserId'),
			"Status" => 1,
			"MarkAsDelete" =>0,
		);
		
		$query = $this->db->order_by('PaymentId', 'DESC');
		$query = $this->db->get_where('payment_histroy', $where);
		if($query) {
			return $query->result_array();
		} else {
			return false;
		}
	}
	public function getPayment_ById($PaymentId) {
		$where = array(
			"PaymentId" => $PaymentId,
			"Status" => 1,
			"MarkAsDelete" =>0,
		);
		$query = $this->db->get_where('payment_histroy', $where);
		if($query) {
			return $query->row_array();
		} else {
			return false;
		}

	}
	public function last_transaction() {
		$where = array(
			"RegId" => $this->session->userdata('UserId'),
			"Status" => 1,
			"MarkAsDelete" =>0,
		);
		
		$query = $this->db->order_by('TXNDATE', 'DESC');
		$query = $this->db->get_where('payment_histroy', $where);
		$this->db->limit(1);  
		// echo $this->db->last_query();
		// exit;
		// print_r($query);
		if($query) {
			return $query->row_array();
		} else {
			return false;
		}
	}
	public function get_Times($TimeId) {
		$where = array(
			"TimeId"=>$TimeId
		);
		$query = $this->db->get_where('time_table', $where);		
		if($query){
			return $result = $query->row_array();
			
		}else{
			return false;
		}   
	}
	public function get_upcomingClass() {
		$upcomingClass= '';
		$result = $this->get_user();
		$startTime = $this->get_Times($result['StartTime']);
		$endTime = $this->get_Times($result['EndTime']);
		$time = strtotime(date("h:i A"));
		// echo $time.'<br>';
		$startTimeName = strtotime($startTime['TimeName']);
		// echo $startTimeName;
		$endTimeName = strtotime($endTime['TimeName']);
		$startTime = $this->get_Times($result['StartTime']);
		$rescurrence = $result['RecurrenceType'];
		$classRecurr = (explode(",",$rescurrence));
		if(function_exists('date_default_timezone_set')) {
			date_default_timezone_set("Asia/Kolkata");
		}
		$date = date('Y-m-d');
		$currDay = strtoupper(date("N",strtotime($date)));
		$weekDays = array('SUN','MON','TUE','WED','THU','FRI','SAT');
		$arr_day = array_intersect($weekDays,$classRecurr);

		foreach($arr_day as $key => $aDay){
			
			if($key >= $currDay){
				if(($startTimeName >= $time && $endTimeName >= $time)||( $startTimeName <= $time || $endTimeName >= $time )){
					$upcomingClass = $aDay.' ('.$startTime['TimeName'].' )';
					// echo 'time matched'.'<br>';
					return $upcomingClass;
					// break;

				} else{
					return "Class not assigned";
					// echo 'time not matched'.'<br>';
				}
			} else{
				// echo 'not matched'.'<br>';
			}
		}
		
	}
}
?>