<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Model extends CI_Model{
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
		"EmailAddress" => $this->input->post('EmailAddress'),
		"MobileNumber" => $this->input->post('MobileNumber'),
		"Password" => $this->input->post('Password'),
		"CreatedBy" => $this->input->post('EmailAddress'),
		"CreatedOn" => date('Y-m-d: H:i:s'),
		"Status" => 1,
		"MarkAsDelete" => 0,
		);
	  $query = $this->db->insert('registered_user',$data);
	  if($query){
		  return true;
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
	
	#to check class exist or not 
	public function check_class() {
		$where = array(
			"ClassName" => $this->input->post('ClassName'),
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$query = $this->db->get_where('class',$where);
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
	public function get_ind_subscriber() {
		$where = array(
			"Role" => 1,
			"UserType" => 1,
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
	  $this->db->select('*');
	  $this->db->where('CreatedOn BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()');
	  // $this->db->from('registered_user');
	  $query = $this->db->get_where('user',$where);
	  if($query){
		  
		return $query->result();
	  } else{
		  return false;
	  }
	}
	public function get_cor_subscriber() {
		$where = array(
			"Role" => 1,
			"UserType" => 2,
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
	  $this->db->select('*');
	  $this->db->where('CreatedOn BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()');
	  // $this->db->from('registered_user');
	  $query = $this->db->get_where('user',$where);
	  if($query){
		  
		return $query->result();
	  } else{
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
	
	//to edit user data from session user id
	public function updateUserDetail() {
		
		$where = array(
			"RegId" => $this->session->userdata('UserId'),
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$user_detail=array(
			"FirstName" => $this->input->post('FirstName'),
			"LastName" => $this->input->post('LastName'),
			"MobileNumber" => $this->input->post('MobileNumber'),
			"EmailAddress" => $this->input->post('EmailAddress'),
			// "DateOfBirth" => $this->input->post('DOB'),
			// "HealthCondition" => $this->input->post('HealthCondition'),
			// "HealthProblem" => $this->input->post('HealthProblem'),
		);
		$FirstName = $this->input->post('FirstName');
		$LastName = $this->input->post('LastName');
		$MobileNumber = $this->input->post('MobileNumber');
		$user_reg=array(
			"FirstName" => $this->input->post('FirstName'),
			"LastName" => $this->input->post('LastName'),
			"MobileNumber" => $this->input->post('MobileNumber'),
		);
		$query = $this->db->where($where);
		$query = $this->db->update('registered_user',$user_reg);
		$sess_query=$this->db->get_where('registered_user',$where);
		$sess_res=$sess_query->row_array();
		$updated_sess_data = array(
			"FirstName" => $FirstName,
			"LastName" => $LastName,
			"Role" => $sess_res['Role'],
			"FullName" => $FirstName.' '.$LastName
		);
		if($query){
			$query1 = $this->db->where($where);
			$query1 = $this->db->update('user',$user_detail);
			if($query1){
				$this->session->set_userdata($updated_sess_data);
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
	  #get health problem of particular user
	public function get_healthProblem_byId($id) {
		$where = array(
			"HealthId" => $id,
		);
		$query = $this->db->get_where('health_problem',$where);
		$result = $query->row_array();
		if($result){
			
			return $result;
			
		}else{
			return false;
		}   
	  }	 
	  
	#get list of health problem of logged in User
	// public function get_healthProblemforSessionUser() {
		// $where = array(
			// "UserId" => $this->session->userdata('UserId'),
			// "Status" => 1,
			// "MarkAsDelete" => 0,
		// );
		// $query = $this->db->get_where('user',$where);
		// $result = $query->row_array();
		// $where1 = array(
			// "HealthId" => $result['HealthProblem'],
		// );
		// $query1 = $this->db->get_where('health_problem',$where1);
		// $result1 = $query1->row_array();
		// $userid=$this->session->userdata('UserId');
		// if($result1){
			
			// return $result1;
			
		// }else{
			// return false;
		// }   
	  // }	
	

######################################################################################################
# 
#User Section
#1)get list of user
#2)get user by id
#3)insert new user  
#4)update existing user  
#5)delete existing user  
#
#####################################################################################################
	
	# to get list of users
	public function getUsers() {
		$where = array(
			"Status" => 1,
			"MarkAsDelete" => 0
		);
		$query = $this->db->where_not_in('Role',3);
		$query = $this->db->get_where('user',$where);
		$count = $query->num_rows();
		$result = $query->result_array();
		if($query){
			return $result;
		}else{
			return false;
		}   
	}
	# to get count of individual users
	public function get_indUsers() {
		$where = array(
			"Status" => 1,
			"MarkAsDelete" => 0,
			"UserType" => 1
		);
		$query = $this->db->where_not_in('Role',3);
		$query = $this->db->get_where('user',$where);
		$count = $query->num_rows();
		$result = $query->result_array();
		if($query){
			return $result;
		}else{
			return false;
		}   
	}
	# to get count of corporate users
	public function get_corUsers() {
		$where = array(
			"Status" => 1,
			"MarkAsDelete" => 0,
			"UserType" => 2
		);
		$query = $this->db->where_not_in('Role',3);
		$query = $this->db->get_where('user',$where);
		$count = $query->num_rows();
		$result = $query->result_array();
		if($query){
			return $result;
		}else{
			return false;
		}   
	}
	
#to get user by their id for particular user information
	public function getUser_byId($id) {
		
		$where = array(
			"RegId"=>$id,
			"Status" => 1,
			"MarkAsDelete" => 0
		);
		$query = $this->db->order_by('UserId','desc');
		$query = $this->db->get_where('user',$where);
		$count = $query->num_rows();
		$result = $query->row_array();
		if($count==1){
			
			return $result;
			
		}else{
			return false;
		}   
	}	
#to get user by their class id for particular user information
	public function getUser_byClassId($classId) {
		
		$where = array(
			"ClassName"=>$classId,
			"Status" => 1,
			"MarkAsDelete" => 0
		);
		$query = $this->db->order_by('UserId','desc');
		$query = $this->db->get_where('user',$where);
		$count = $query->num_rows();
		$result = $query->result_array();
		if($query){
			
			return $result;
			
		}else{
			return false;
		}   
	}

	//to add new individual user
	public function insert_ind_user() {
		$userType=$this->input->post('UserType');
		$max_id = $this->db->select('UserId')->order_by('UserId','desc')->limit(1)->get('user')->row('UserId');
		$max_id = (!empty($max_id))? $max_id+1 : 1;
		$num = "00000";
		//$max_id = "1";
		$fin_id = $num.$max_id;
		$chr = substr($fin_id,-5);
		$str = ($userType == 1 ? "IND" : "COR");
		$User_UniqueId= $str."-".$chr;
		$reg_data = array(
			"FirstName" => $this->input->post('FirstName'),
			"LastName" => $this->input->post('LastName'),
			"FullName" => $this->input->post('FirstName').' '.$this->input->post('LastName'),
			"MobileNumber" => $this->input->post('MobileNumber'),
			"Password" => '1234567',
			"Role" => '1',
			"EmailAddress" => $this->input->post('EmailAddress'),
			"CreatedBy" => $this->session->userdata('EmailAddress'),
			"CreatedOn" => date('Y-m-d: H:i:s'),
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$query = $this->db->insert('registered_user',$reg_data);
		$regId = $this->db->insert_id();
		if($query){
		  // if(true){
			  $dir = "assets/images/";
			  $target_fileimages = '';
			  
			  $dob =  $this->input->post('DOB');
				$dateofBirth = date('Y-m-d', strtotime($dob));
				if (!empty($_FILES['ProfilePhoto']['name'])) 
				{ 
					$filename = stripslashes($_FILES['ProfilePhoto']['name']);
					$extension = $this->getExtension($filename);
					$extension = strtolower($extension);
					$img_ext = rand(000000,999999)."_".rand(000000,999999).".".$extension;
					$target_fileimages = $dir.$img_ext;
					move_uploaded_file($_FILES["ProfilePhoto"]["tmp_name"], $target_fileimages) ;
				}
				
				$user_data = array(
					"UserType" => $this->input->post('UserType'),
					"RegId" => $regId,
					"User_UniqueId" => $User_UniqueId,
					"FirstName" => $this->input->post('FirstName'),
					"LastName" => $this->input->post('LastName'),
					"Gender" => $this->input->post('Gender'),
					"MobileNumber" => $this->input->post('MobileNumber'),
					"ProfilePhoto" => (!empty($target_fileimages)) ? $target_fileimages : '',
					"EmailAddress" => $this->input->post('EmailAddress'),
					"Role" => '1',
					// "DateOfBirth" => $this->input->post('DOB'),
					"DateOfBirth" => $dateofBirth,
					"AadharNumber" => $this->input->post('AadharNumber'),
					"ClassName" => $this->input->post('ClassName'),
					"CorporateType" => $this->input->post('CorporateType'),
					"BatchName" => $this->input->post('TimeSlot'),
					//"TimeSlot" => $this->input->post('TimeSlot'),
					"HealthCondition" => $this->input->post('HealthCondition'),
					"HealthProblem" => $this->input->post('HealthProblem'),
					"AddressLine1" => $this->input->post('AddressLine1'),
					"AddressLine2" => $this->input->post('AddressLine2'),
					"City" => $this->input->post('City'),
					"State" => $this->input->post('State'),
					"PinCode" => $this->input->post('PinCode'),
					"Country" => $this->input->post('Country'),
					"LocalAddressLine1" => $this->input->post('LocalAddressLine1'),
					"LocalAddressLine2" => $this->input->post('LocalAddressLine2'),					
					"LocalCity" => $this->input->post('LocalCity'),
					"LocalState" => $this->input->post('LocalState'),
					"LocalPinCode" => $this->input->post('LocalPinCode'),
					"LocalCountry" => $this->input->post('LocalCountry'),
					"CreatedBy" => $this->session->userdata('EmailAddress'),
					"CreatedOn" => date('Y-m-d: H:i:s'),
					"Status" => 1,
					"MarkAsDelete" => 0,
				);
			  $query = $this->db->insert('user',$user_data);
			  if($query){
				  return true;
			  }else{
				  return false;
			  }
		}
	}
	
	//to edit individual user
	public function get_editIndUser($Id) {
		$dir = "assets/images/";
		$target_fileimages = '';
		if (!empty($_FILES['ProfilePhoto']['name'])) 
		{ 
			$filename = stripslashes($_FILES['ProfilePhoto']['name']);
			$extension = $this->getExtension($filename);
			$extension = strtolower($extension);
			$img_ext = rand(000000,999999)."_".rand(000000,999999).".".$extension;
			echo $target_fileimages = $dir.$img_ext;
			move_uploaded_file($_FILES["ProfilePhoto"]["tmp_name"], $target_fileimages) ;
		}
		$reg_data = array(
			"FirstName" => $this->input->post('FirstName'),
			"LastName" => $this->input->post('LastName'),
			"FullName" => $this->input->post('FirstName').' '.$this->input->post('LastName'),
			"MobileNumber" => $this->input->post('MobileNumber'),
			"ModifiedBy" => $this->session->userdata('EmailAddress'),
			"ModifiedOn" => date('Y-m-d: H:i:s'),
		);
		$query=$this->db->where('RegId',$Id);
		$query = $this->db->update('registered_user',$reg_data);
		if($query){
			  $dob =  $this->input->post('DOB');
				$dateofBirth = date('Y-m-d', strtotime($dob));
				$edit_user_data = array(
					"UserType" => $this->input->post('UserType'),
					"FirstName" => $this->input->post('FirstName'),
					"LastName" => $this->input->post('LastName'),
					"Gender" => $this->input->post('Gender'),
					"MobileNumber" => $this->input->post('MobileNumber'),
					// "EmailAddress" => $this->input->post('EmailAddress'),
					"ProfilePhoto" => $target_fileimages,
					"Role" => '1',
					// "DateOfBirth" => $this->input->post('DOB'),
					"DateOfBirth" => $dateofBirth,
					"ClassName" => $this->input->post('ClassName'),
					"AadharNumber" => $this->input->post('AadharNumber'),
					"CorporateType" => $this->input->post('CorporateType'),
					"BatchName" => $this->input->post('TimeSlot'),
					//"TimeSlot" => $this->input->post('TimeSlot'),
					"HealthCondition" => $this->input->post('HealthCondition'),
					"HealthProblem" => $this->input->post('HealthProblem'),
					"AddressLine1" => $this->input->post('AddressLine1'),
					"AddressLine2" => $this->input->post('AddressLine2'),
					"City" => $this->input->post('City'),
					"State" => $this->input->post('State'),
					"PinCode" => $this->input->post('PinCode'),
					"Country" => $this->input->post('Country'),
					"LocalAddressLine1" => $this->input->post('LocalAddressLine1'),
					"LocalAddressLine2" => $this->input->post('LocalAddressLine2'),
					"LocalCity" => $this->input->post('LocalCity'),
					"LocalState" => $this->input->post('LocalState'),
					"LocalPinCode" => $this->input->post('LocalPinCode'),
					"LocalCountry" => $this->input->post('LocalCountry'),
					"ModifiedBy" => $this->session->userdata('EmailAddress'),
					"ModifiedOn" => date('Y-m-d: H:i:s')
			);
		$query1=$this->db->where('RegId',$Id);
		$query1 = $this->db->update('user',$edit_user_data);
		  if($query1){
			  return true;
		  }else{
			  return false;
		  }
		} else{
			return false;
		}
	  }
	  
	  //to delete individual user
	public function deleteIndUser($Id) {
		$delete_user =  array(
			"MarkAsDelete" => 1
			);
		$query=$this->db->where('RegId',$Id);
		$query = $this->db->update('user',$delete_user);
		  if($query){
			$query1=$this->db->where('RegId',$Id);
			$query1 = $this->db->update('registered_user',$delete_user);
			if($query1){
				return true;
			}
		  }else{
			  return false;
		  }
	  }

	  
	  
######################################################################################################
# 
#Corporates Section
#1)get list of corporates
#2)get corporate by id
#3)insert new corporate
#4)update existing corporate
#5)delete existing corporate
#
#####################################################################################################
	  
	// to get list of corporates
	public function getCorporates() {
		$where = array(
			"Status" => 1,
			"MarkAsDelete" => 0
		);
		$query = $this->db->order_by('CorpId','desc');
		$query = $this->db->get_where('corporate',$where);
		$count = $query->num_rows();
		$result = $query->result_array();
		if($query){
			return $result;
		}else{
			return false;
		}   
	}
	
	//to get corporate by their id for particular corporate information
	public function getCorp_byId($Id) {
		$where = array(
			"CorpId"=>$Id,
			"Status" => 1,
			"MarkAsDelete" => 0
		);
		$query = $this->db->get_where('corporate',$where);
		$count = $query->num_rows();
		$result = $query->row_array();
		if($count==1){
			
			return $result;
			
		}else{
			return false;
		}   
	}
	//to get corporate by their id for particular corporate information
	public function getAssign_class_info($Id) {
		$where = array(
			"AssignedId"=>$Id,
			"Status" => 1,
			"MarkAsDelete" => 0
		);
		$query = $this->db->get_where('class_assign',$where);
		$count = $query->num_rows();
		$result = $query->row_array();
		if($count==1){
			
			return $result;
			
		}else{
			return false;
		}   
	}
	//to get assigned instructor detail
	public function getAssign_Instructor($Id) {
		$where = array(
			"InstructorName"=>$Id,
			"Status" => 1,
			"MarkAsDelete" => 0
		);
		// print_r($where);
		$query = $this->db->get_where('class_assign',$where);
		$count = $query->num_rows();
		$result = $query->result_array();
		// print_r($result);
		// exit;
		if($query){
			
			return $result;
			
		}else{
			return false;
		}   
	}
	
	//to add new corporate user
	public function insert_newCorp() {
		 $maxCorp_id = $this->db->select('CorpId')->order_by('CorpId','desc')->limit(1)->get('corporate')->row('CorpId');
		$maxCorp_id = (!empty($maxCorp_id))? $maxCorp_id+1 : 1;
		$num = "00000";
		$compName=strtoupper($this->input->post('CompanyName'));
		$companyName=substr($compName, 0, 3);
		//$max_id = "1";
		$fin_id = $num.$maxCorp_id;
		$chr = substr($fin_id,-5);
		$str = "COR".$companyName;
		 $Corp_UniqueId= $str."-".$chr;
		$insert_data = array(
		"Corp_UniqueId" => $Corp_UniqueId,
		"CompanyName" => $this->input->post('CompanyName'),
		"CompanyEmail" => $this->input->post('CompanyEmail'),
		"GSTNumber" => $this->input->post('GSTNumber'),
		"CompanyPhone" => $this->input->post('CompanyPhone'),
		"FBLink" => $this->input->post('FBLink'),
		"MapLink" => $this->input->post('MapLink'),
		"PhotoUpload" => $this->input->post('PhotoUpload'),
		"LogoUpload" => $this->input->post('LogoUpload'),
		"AddressLine1" => $this->input->post('AddressLine1'),
		"AddressLine2" => $this->input->post('AddressLine2'),
		"City" => $this->input->post('City'),
		"State" => $this->input->post('State'),
		"PinCode" => $this->input->post('PinCode'),
		"Country" => $this->input->post('Country'),
		"ContactPersonFName" => $this->input->post('ContactPersonFName'),
		"ContactPersonLName" => $this->input->post('ContactPersonLName'),
		"ContactPersonEmail" => $this->input->post('ContactPersonEmail'),
		"ContactPersonMobile" => $this->input->post('ContactPersonMobile'),
		"ContactPersonLandLine" => $this->input->post('ContactPersonLandLine'),
		"CreatedBy" => $this->session->userdata('EmailAddress'),
		"CreatedOn" => date('Y-m-d: H:i:s'),
		"Status" => 1,
		"MarkAsDelete" => 0,
		);
	  $query = $this->db->insert('corporate',$insert_data);
		  if($query){
			  return true;
		  }else{
			  return false;
		  }
	  }
	  
	//to edit corporate detail
	public function editCorp($Id) {
		$edit_corp_data = array(
			"CompanyName" => $this->input->post('CompanyName'),
			"CompanyEmail" => $this->input->post('CompanyEmail'),
			"GSTNumber" => $this->input->post('GSTNumber'),
			"CompanyPhone" => $this->input->post('CompanyPhone'),
			"FBLink" => $this->input->post('FBLink'),
			"MapLink" => $this->input->post('MapLink'),
			"PhotoUpload" => $this->input->post('PhotoUpload'),
			"LogoUpload" => $this->input->post('LogoUpload'),
			"AddressLine1" => $this->input->post('AddressLine1'),
			"AddressLine2" => $this->input->post('AddressLine2'),
			"City" => $this->input->post('City'),
			"State" => $this->input->post('State'),
			"PinCode" => $this->input->post('PinCode'),
			"Country" => $this->input->post('Country'),
			"ContactPersonFName" => $this->input->post('ContactPersonFName'),
			"ContactPersonLName" => $this->input->post('ContactPersonLName'),
			"ContactPersonEmail" => $this->input->post('ContactPersonEmail'),
			"ContactPersonMobile" => $this->input->post('ContactPersonMobile'),
			"ContactPersonLandLine" => $this->input->post('ContactPersonLandLine'),
			"ModifiedBy" => $this->session->userdata('EmailAddress'),
			"ModifiedOn" => date('Y-m-d: H:i:s'),
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$query=$this->db->where('CorpId',$Id);
		$query = $this->db->update('corporate',$edit_corp_data);
		  if($query){
			  return true;
		  }else{
			  return false;
		  }
	  }
	
	//to delete corporate
	public function deleteCorp($Id) {
		$delete_corp =  array(
			"MarkAsDelete" => 1
			);
		$query=$this->db->where('CorpId',$Id);
		$query = $this->db->update('corporate',$delete_corp);
		  if($query){
			  return true;
		  }else{
			  return false;
		  }
	  }	
	  
	  
	  	  
######################################################################################################
# 
#Class Section
#1)get class type individual/corporate
#2)get class name from database
#3)get class start date and end date(session) from class id
#4)insert new class
#5)get class for individual 
#6)get class for corporate 
#7)get class by id 
#8)update existing class by id 
#9)delete class by id 
#10)get class time table 
#11)get class time table by id
#12)get class end time id
#
#####################################################################################################

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
	#to get types of recurrence for class
	public function getClassRecurrence_type() {
		$query = $this->db->get('recurrence');
		$result = $query->result_array();
		if($query){
			return $result;
		}else{
			return false;
		}   
	}
	
	#to get class name
	public function getClass_name() {
		$where = array(
			"Status" => 1,
			"MarkAsDelete" => 0
		);
		$query = $this->db->get_where('class',$where);
		$result = $query->result_array();
		if($query){
			return $result;
		}else{
			return false;
		}   
	}
	
	#get start date and end date by class id
	public function getDateByClassId() {
		$ClassId= $this->input->post('ClassId');
		$where = array(
			"ClassId"=>$ClassId,
			"Status" => 1,
			"MarkAsDelete" => 0
		);
		$query = $this->db->get_where('class',$where);
		if($query){
			return $query->row_array();
		}else{
			return false;
		}   
	}
	// #get instructor assigned class
	// public function get_instrucAssign_class($instrucId) {
		// $where = array(
			// "InstructorName"=>$instrucId,
			// "Status" => 1,
			// "MarkAsDelete" => 0
		// );
		// $query = $this->db->get_where('class_assign',$where);
		// if($query){
			// return $query->row_array();
		// }else{
			// return false;
		// }   
	// }
	
	#to insert new class
	public function insert_newClass() {
		 $recurrence_type = implode(',', $_POST['RecurrenceType']);
		// $recurrence_type = $_POST['RecurrenceType'];
		 // print_r($recurrence_type);
		 // die();
		$className=$this->input->post('ClassName');
		$class=substr($className, 0, 3);
		$maxClass_id = $this->db->select('ClassId')->order_by('ClassId','desc')->limit(1)->get('class')->row('ClassId');
		
		$maxClass_id = (!empty($maxClass_id))? $maxClass_id+1 : 1;
		$num = "00000";
		//$max_id = "1";
		$classType=$this->input->post('ClassType');
		$classType=($classType == 1) ? 'IND' : 'COR'."-".$class;
		$fin_id = $num.$maxClass_id;
		$chr = substr($fin_id,-5);
		$str = $classType."-CL";
		$Class_UniqueId = $str."-".$chr;
		// echo $Class_UniqueId;
		// exit();
		
		$startDate=$this->input->post('StartDate');
		$endDate=$this->input->post('EndDate');
		$StartTime = $this->input->post('StartTime');
		$EndTime = $this->input->post('EndTime');
		$length = $EndTime - $StartTime;
		$prefix = $Ids = '';
		for($i = 0; $i < ($length+1); $i++){
			 $Ids .= $prefix.($StartTime+$i);
			$prefix = ', ';
		}
		$CorporateType = $this->input->post('CorporateType');
		$EmailAddress = $this->session->userdata('EmailAddress');
		$insert_class = array(
		"className" => $this->input->post('ClassName'),
		"Class_UniqueId"=>$Class_UniqueId,
		"ClassType" => $this->input->post('ClassType'),
		"CorporateType" => (!empty($CorporateType)) ? $CorporateType : 0,
		"ClassCapacity" => $this->input->post('ClassCapacity'),
		"RecurrenceType" => $recurrence_type,
		"StartDate" => date_format(date_create($startDate),'Y-m-d'),
		"EndDate" => date_format(date_create($endDate),'Y-m-d'),
		"StartTime" =>$this->input->post('StartTime'),
		"EndTime" => $this->input->post('EndTime'),
		"AssignedTimeId" => $Ids,
		"CreatedBy" => (!empty($EmailAddress)) ? $EmailAddress : NULL,
		"CreatedOn" => date('Y-m-d: H:i:s'),
		"Status" => 1,
		"MarkAsDelete" => 0,
		);
		// echo '<pre>';
		// print_r($insert_class);
		// exit;
	  $query = $this->db->insert('class',$insert_class);
	  // echo $this->db->last_query($query);
	  // die();
		  if($query){
			  return true;
		  }else{
			  return false;
		  }
	  }
	#to get list of classes
	public function getClass_forInd() {
		$where =  array(
			"ClassType" => 1,
			"Status" => 1,
			"MarkAsDelete" => 0
			);
		$query = $this->db->order_by('ClassId','desc');
		$query = $this->db->get_where('class',$where);
		//echo $this->db->last_query($query);
		
		$result = $query->result_array();
		// echo "<pre>";
		// print_r($result);
		// die();
		if($query){
			return $result;
		}else{
			return false;
		}   
	}
	
	#to get corporate class
	public function getClass_forCorp() {
		$where =  array(
			"ClassType" => 2,		
			"Status" => 1,
			"MarkAsDelete" => 0
		);
		$query = $this->db->order_by('ClassId','desc');
		$query = $this->db->get_where('class',$where);
		// echo $this->db->last_query($query);
		// die();
		$result = $query->result_array();
		
		if($query){
			return $result;
		}else{
			return false;
		}   
	}
	#to get class list to show in event management class list
	public function get_classList() {
		$where =  array(		
			"Status" => 1,
			"MarkAsDelete" => 0
		);
		$query = $this->db->order_by('ClassId','desc');
		$query = $this->db->get_where('class',$where);
		// echo $this->db->last_query($query);
		// die();
		$result = $query->result_array();
		
		if($query){
			return $result;
		}else{
			return false;
		}   
	}
	
	#to get class by class id
	public function getClass_byId($Id) {
		$where = array(
			"ClassId"=>$Id,
			"Status" => 1,
			"MarkAsDelete" => 0
		);
		$query = $this->db->get_where('class',$where);
		$count = $query->num_rows();
		$result = $query->row_array();
		if($count==1){
			
			return $result;
			
		}else{
			return false;
		}   
	}
	#to get time slot by time id
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
	public function getTime($Id, $ClassType, $CorporateType) {
		$CorporateType = (!empty($CorporateType)) ? $CorporateType : 0;
		$where =  array(	
		"ClassId" => $Id,	
		"ClassType" => $ClassType,	
		"CorporateType" => $CorporateType,	
		"Status" => 1,
		"MarkAsDelete" => 0
		);
		$query = $this->db->select('AssignedTimeId');
		$query = $this->db->get_where('class',$where);
		 // echo $this->db->last_query(); die();
		$result = $query->result_array();
		$arr_id = array();
		if(!empty($result)){
		foreach($result as $key => $resp){
		$exp_arr =  explode(",",$resp['AssignedTimeId']);
			foreach($exp_arr as $ky => $ex_r){
			array_push($arr_id,$ex_r);
			}
		}

		$query_not = $this->db->where_not_in('TimeId',$arr_id);
		$query_not = $this->db->get('time_table');

		}else{

		$query_not = $this->db->get('time_table');

		}
		// echo $this->db->last_query(); die();
		 
		$result_not = $query_not->result_array();
		if($query_not){
		return $result_not;
		}else{
		return false;
		}
	}
	#to edit class detail
	public function editClass($Id) {
		 $recurrence_type = implode(', ', $_POST['RecurrenceType']);
		$edit_class = array(
		"className" => $this->input->post('ClassName'),
		"ClassType" => $this->input->post('ClassType'),
		"ClassCapacity" => $this->input->post('ClassCapacity'),
		"RecurrenceType" => $recurrence_type,
		"StartDate" => $this->input->post('StartDate'),
		"EndDate" => $this->input->post('EndDate'),
		"StartTime" => $this->input->post('StartTime'),
		"EndTime" => $this->input->post('EndTime'),
		"ModifiedBy" => $this->session->userdata('EmailAddress'),
		"ModifiedOn" => date('Y-m-d: H:i:s'),
		"Status" => 1,
		"MarkAsDelete" => 0,
		);
		$query=$this->db->where('ClassId',$Id);
		$query = $this->db->update('class',$edit_class);
		  if($query){
			  return true;
		  }else{
			  return false;
		  }
	  }
	
	#to delete class
	public function deleteClass($Id) {
		$delete_class =  array(
			"MarkAsDelete" => 1
			);
		$query=$this->db->where('ClassId',$Id);
		$query = $this->db->update('class',$delete_class);
		  if($query){
			  return true;
		  }else{
			  return false;
		  }
	  }
	  
	 
	#get class time table
	public function get_timeTable() {
		
		$query = $this->db->get('time_table');
		$result = $query->result_array();
		if($result){
			
			return $result;
			
		}else{
			return false;
		}   
	  } 
	
	#get list of class time table by id
	public function get_classTimeById($TimeId) {
		$where =  array(
			"TimeId" => $TimeId
			);
		$query = $this->db->get_where('time_table',$where);
		// echo $this->db->last_query(); die('sneha');
		if($query){
			return $result = $query->row_array();
		}else{
			return false;
		}   
	  }
	#get list of class time table by id
	public function get_classStartEndTimeById() {
		$startTime=$this->input->post('StartTimeId');
		$endTime=$this->input->post('EndTimeId');
		// echo $startTime." ".$endTime;
		// die();
		
		$Where =  array($startTime, $endTime);
		$query = $this->db->select('TimeName');
		$query = $this->db->where_in('TimeId',$Where);
		$query = $this->db->get('time_table');
		$result = $query->result_array();
		$timeName=array($result[0],$result[1]);
		if($query){
			return $timeName;
		}else{
			return false;
		}   
	  }
	  
	#get list of class end time table by id
	public function get_classEndTime() {
		$StartTime=$this->input->post('TimeId');
		$where =  array(
			"TimeId >" => $StartTime
			);
		$query = $this->db->get_where('time_table',$where);
		$result = $query->result_array();
		if($result){
			
			return $result;
			
		}else{
			return false;
		}   
	  }
	  
	  
######################################################################################################
# 
#Instructor Section
#1)get list of instructor
#2)get instructor by id
#3)insert new instructor
#4)update existing instructor
#5)delete existing instructor
#6)get not assigned class list for existing instructors
#
#####################################################################################################
	  
	// to get list of users
	public function getInstructors() {
		$where = array(
			"Status" => 1,
			"MarkAsDelete" => 0
		);
		$query = $this->db->order_by('InstrucId','desc');
		$query = $this->db->get_where('instructor',$where);
		$result = $query->result_array();
		if($query){
			return $result;
		}else{
			return false;
		}   
	}
	
	//to get user by their id for particular user information
	public function getInstructor_byId($id) {
		$where = array(
			"InstrucId"=>$id,
			"Status" => 1,
			"MarkAsDelete" => 0
		);
		$query = $this->db->get_where('instructor',$where);
		$result = $query->row_array();
		if($result){
			
			return $result;
			
		}else{
			return false;
		}   
	}
	//to add new individual user
	public function insert_instructor() {
		$max_id = $this->db->select('InstrucId')->order_by('InstrucId','desc')->limit(1)->get('instructor')->row('InstrucId');
		$max_id = (!empty($max_id))? $max_id+1 : 1;
		$num = "00000";
		//$max_id = "1";
		$fin_id = $num.$max_id;
		$chr = substr($fin_id,-5);
		$str = "INST";
		$Instruc_UniqueId= $str."-".$chr;
		$dob =  $this->input->post('DOB');
		$dateofBirth = date('Y-m-d', strtotime($dob));
		$instruc_data = array(
		"Instruc_UniqueId" => $Instruc_UniqueId,
		"InstrucFName" => $this->input->post('InstrucFName'),
		"InstrucLName" => $this->input->post('InstrucLName'),
		"InstrucMobile" => $this->input->post('InstrucMobile'),
		"InstrucEmail" => $this->input->post('InstrucEmail'),
		"InstrucGender" => $this->input->post('InstrucGender'),
		"InstrucPhoto" => $this->input->post('InstrucPhoto'),
		"DateOfBirth" => $dateofBirth,
		"Profession" => $this->input->post('Profession'),
		"OrganizationName" => $this->input->post('OrganizationName'),
		"Designation" => $this->input->post('Designation'),
		"AddressLine1" => $this->input->post('AddressLine1'),
		"AddressLine2" => $this->input->post('AddressLine2'),
		"City" => $this->input->post('City'),
		"State" => $this->input->post('State'),
		"PinCode" => $this->input->post('PinCode'),
		"Country" => $this->input->post('Country'),
		"IsChecked" => $this->input->post('IsChecked'),
		"LocalAddressLine1" => $this->input->post('LocalAddressLine1'),
		"LocalAddressLine2" => $this->input->post('LocalAddressLine2'),
		"LocalCity" => $this->input->post('LocalCity'),
		"LocalState" => $this->input->post('LocalState'),
		"LocalPinCode" => $this->input->post('LocalPinCode'),
		"LocalCountry" => $this->input->post('LocalCountry'),
		"CreatedBy" => $this->session->userdata('EmailAddress'),
		"CreatedOn" => date('Y-m-d: H:i:s'),
		"Status" => 1,
		"MarkAsDelete" => 0,
		);
		// print_r($instruc_data);
		// // exit;
		  $query = $this->db->insert('instructor',$instruc_data);
		  if($query){
			  return true;
		  }else{
			  return false;
		  }
	}
	//to edit individual user
	public function editInstructor($Id) {
		
		$dob =  $this->input->post('DOB');
		$dateofBirth = date('Y-m-d', strtotime($dob));
		$edit_instruc_data = array(
			"Instruc_UniqueId" => $Instruc_UniqueId,
			"InstrucFName" => $this->input->post('InstrucFName'),
			"InstrucLName" => $this->input->post('InstrucLName'),
			"InstrucMobile" => $this->input->post('InstrucMobile'),
			"InstrucEmail" => $this->input->post('InstrucEmail'),
			"InstrucGender" => $this->input->post('InstrucGender'),
			"InstrucPhoto" => $this->input->post('InstrucPhoto'),
			"DateOfBirth" => $dateofBirth,
			"Profession" => $this->input->post('Profession'),
			"OrganizationName" => $this->input->post('OrganizationName'),
			"Designation" => $this->input->post('Designation'),
			"AddressLine1" => $this->input->post('AddressLine1'),
			"AddressLine2" => $this->input->post('AddressLine2'),
			"City" => $this->input->post('City'),
			"State" => $this->input->post('State'),
			"PinCode" => $this->input->post('PinCode'),
			"Country" => $this->input->post('Country'),
			"IsChecked" => $this->input->post('IsChecked'),
			"LocalAddressLine1" => $this->input->post('LocalAddressLine1'),
			"LocalAddressLine2" => $this->input->post('LocalAddressLine2'),
			"LocalCity" => $this->input->post('LocalCity'),
			"LocalState" => $this->input->post('LocalState'),
			"LocalPinCode" => $this->input->post('LocalPinCode'),
			"LocalCountry" => $this->input->post('LocalCountry'),
			"ModifiedBy" =>  $this->session->userdata('EmailAddress'),
			"ModifiedOn" => date('Y-m-d: H:i:s'),
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		 $query=$this->db->where('InstrucId',$Id);
		 $query = $this->db->update('instructor',$edit_instruc_data);
		  if($query){
			  return true;
		  }else{
			  return false;
		  }
	  }
	//to delete individual user
	public function deleteInstructor($Id) {
		$delete_instructor =  array(
			"MarkAsDelete" => 1
			);
		$query=$this->db->where('InstrucId',$Id);
		$query = $this->db->update('instructor',$delete_instructor);
		  if($query){
			  return true;
		  }else{
			  return false;
		  }
	  }
	   #get class time table if class is not already assigned
		public function get_notAssignedClassList() {
		  
		$ClassType = $this->input->post('ClassType');
		$StartDate = $this->input->post('StartDate');
		$EndDate = $this->input->post('EndDate');
		$CorporateType = $this->input->post('CorporateType');
		$CorporateType = (!empty($CorporateType)) ? $CorporateType : 0;
		$where =  array(	
		"ClassType" => $ClassType,	
		"CorporateType" => $CorporateType,	
		"Status" => 1,
		"MarkAsDelete" => 0
		);
		$query = $this->db->select('AssignedTimeId');
		$query = $this->db->get_where('class',$where);
		 // echo $this->db->last_query(); die();
		$result = $query->result_array();

		// print_r($result);
		// exit;
		$arr_id = array();
		if(!empty($result)){
		foreach($result as $key => $resp){
		$exp_arr =  explode(",",$resp['AssignedTimeId']);
			foreach($exp_arr as $ky => $ex_r){
			array_push($arr_id,$ex_r);
			}
		}

		$query_not = $this->db->where_not_in('TimeId',$arr_id);
		$query_not = $this->db->get('time_table');

		}else{

		$query_not = $this->db->get('time_table');

		}
		// echo $this->db->last_query(); die();
		 
		$result_not = $query_not->result_array();
		if($query_not){
		return $result_not;
		}else{
		return false;
		}
	}

	
	  
	  
######################################################################################################
# 
#class Assign to Instructor Section
#1)get assigned class list to instructor
#2)insert instructor to class
#3)get assigned instructor to class by id
#4)update assigned instructor to class by id
#5)delete assigned instructor to class by id
#6)get class list to assign instructor on selection of class type 
#
#####################################################################################################
	  
	#to get list of assigned instructor to class
	public function getAssignClassToInstructorList() {
		$where = array(
			"ca.Status" => 1,
			"ca.MarkAsDelete" => 0
		);
		$query = $this->db->order_by('AssignedId','desc');
		$query = $this->db->select('ca.ClassName as cln, ca.AssignedId, c.ClassId,c.ClassType,c.ClassName as ClassName,c.StartDate,c.EndDate,c.StartTime,c.EndTime, ins.InstrucId, ins.InstrucFName, ins.InstrucLName, ins.InstrucMobile,ins.InstrucEmail');
		$query = $this->db->join('class as c', 'c.ClassId = ca.ClassName');
		$query = $this->db->join('instructor as ins', 'ins.InstrucId = ca.InstructorName', 'left');
		$query = $this->db->order_by('ca.AssignedId','desc');         
		$query = $this->db->get_where('class_assign as ca',$where); 
		$result = $query->result_array();
		if($query){
			return $result;
		}else{
			return false;
		}   
	}
	
	#to add new individual user
	public function insert_instructor_to_class() {
		$assign_instructor = array(
		"InstructorName" => $this->input->post('InstructorName'),
		"ClassType" => $this->input->post('AssignClassType'),
		"ClassName" => $this->input->post('AssignClassName'),
		"CreatedBy" => $this->session->userdata('EmailAddress'),
		"CreatedOn" => date('Y-m-d: H:i:s'),
		"Status" => 1,
		"MarkAsDelete" => 0,
		);
	  $query = $this->db->insert('class_assign',$assign_instructor);
	  if($query){
		  return true;
	  }else{
		  return false;
	  }
	}
	
	
	#to get user by their id for particular user information
	public function getAssignedInstructor_byId($id) {
		$where = array(
			"AssignedId"=>$id,
			"Status" => 1,
			"MarkAsDelete" => 0
		);
		$query = $this->db->get_where('class_assign',$where);
		$result = $query->row_array();
		if($result){
			
			return $result;
			
		}else{
			return false;
		}   
	}	
	
	#to edit individual user
	public function editAssignInstructor($Id) {
		$edit_assignedInstructor = array(
		"InstructorName" => $this->input->post('InstructorName'),
		"ClassType" => $this->input->post('AssignClassType'),
		"ClassName" => $this->input->post('AssignClassName'),
		"ModifiedBy" =>  $this->session->userdata('EmailAddress'),
		"ModifiedOn" => date('Y-m-d: H:i:s'),
		"Status" => 1,
		"MarkAsDelete" => 0,
		);
		 $query=$this->db->where('AssignedId',$Id);
		 $query = $this->db->update('class_assign',$edit_assignedInstructor);
		  if($query){
			  return true;
		  }else{
			  return false;
		  }
	  }
	  
	#to delete individual user
	public function deleteAssignInstructor($Id) {
		$delete_assignedInstructor =  array(
			"MarkAsDelete" => 1
			);
		$query=$this->db->where('AssignedId',$Id);
		$query = $this->db->update('class_assign',$delete_assignedInstructor);
		  if($query){
			  return true;
		  }else{
			  return false;
		  }
	  } 
	  
	public function getClassByTypeId() {
		$InstructorName = $this->input->post('InstructorName');
		$ClassType = $this->input->post('ClassType');
		$CorporateType = $this->input->post('CorporateType');
		if($CorporateType == 0){

		$where =  array(
		"ClassType" => $ClassType,	
		"CorporateType" => $CorporateType,	
		"Status" => 1,
		"MarkAsDelete" => 0
		);

		}else{

		$where =  array(
		"InstructorName" => $InstructorName,	
		"ClassType" => $ClassType,	
		"CorporateType" => $CorporateType,	
		"Status" => 1,
		"MarkAsDelete" => 0
		);
		}
		$query = $this->db->order_by('AssignedId','desc');
		$query = $this->db->select('ClassName');
		$query = $this->db->get_where('class_assign',$where);
		$result = $query->result_array();
		// $prefix = $Ids = '';
		// foreach($result as $k => $res){
		// 	 $Ids .= $prefix.$res['ClassName'];
		// 	$prefix = ', ';
		// }
		$wheres =  array(
			"ClassType" => $ClassType,	
			"CorporateType" => $CorporateType,	
			"Status" => 1,
			"MarkAsDelete" => 0
		);
		$wheres_not =  array(
		"CorporateType" => $CorporateType,
		"Status" => 1,
		"MarkAsDelete" => 0
		);
		$arr_id = array();
		if(!empty($result)){
			foreach($result as $key => $resp) {
				array_push($arr_id,$resp['ClassName']);
			}
			$Ids = implode(",",$arr_id);

			$query1 = $this->db->where_not_in('ClassId',$Ids);
			// $query1 = $this->db->join('time_table','time_table.TimeId = class.StartTime');
			$query1 = $this->db->get_where('class',$wheres);

		} else {
			$query1 = $this->db->get_where('class',$wheres_not);
		}
		// print_r(implode(",",$arr_id));
		// exit;
		// echo $this->db->last_query(); die();
		$result1 = $query1->result_array();
		if($query1){
			return $result1;
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

	
	 
	  
######################################################################################################
# 
#event section
#1)
#2)
#3)
#4)
#5)
#6)
#
#####################################################################################################
  
	#get class detail for logged in User
	public function get_EventCalendar() {
		$where = array(
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$query = $this->db->get('class');
		$result = $query->result_array();
		
		if($result){
			return $result;
		}else{
			return false;
		}   
	  }	
	  
	    
	#get class detail for logged in User
	public function get_userOfClass() {
		$where = array(
			"ClassName" => $this->input->post('ClassId'),
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$query = $this->db->get_where('user',$where);
		// echo $this->db->last_query(); die();
		$result = $query->result_array();
		if($result){
			
			return $result;
			
		}else{
			return false;
		}   
	  }	    
	#get class based on full calendar clicked date
	public function get_ClassOnDateSelection() {
		$date=$this->input->post('Date');
		$cancelclassWhere = array(
			"CurrentDate" => $date,
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		//$classcheck=json_decode($res['Class'],true);
		$cancelClassQuery = $this->db->get_where('class_action',$cancelclassWhere);
		// echo $this->db->last_query(); die();
		$cancelClassResult = $cancelClassQuery->result_array();
		if($cancelClassResult){
			foreach($cancelClassResult as $cancelClassRes){
				$where = array(
					"StartDate <=" => $date,
					"EndDate >" => $date,
					"Status" => 1,
					"MarkAsDelete" => 0,
				);
				 $cancelClassList=json_decode($cancelClassRes['ClassList'],true);
				$query = $this->db->where_not_in('classId',$cancelClassList);
				$query = $this->db->get_where('class',$where);
				// echo $this->db->last_query(); die();
				$result = $query->result_array();
				if($result){
					return $result;
				}
				else{
					return false;
				}   
			}
		} else{
				$where = array(
					"StartDate <=" => $date,
					"EndDate >" => $date,
					"Status" => 1,
					"MarkAsDelete" => 0,
				);
				 // $cancelClassList=json_decode($cancelClassRes['ClassList'],true);
				// $query = $this->db->where_not_in('classId',$cancelClassList);
				$query = $this->db->get_where('class',$where);
				// echo $this->db->last_query(); die();
				$result = $query->result_array();
				if($result){
					return $result;
				}
				else{
					return false;
				}   
		}
	  }
	public function get_ClassTime() {
	#get class based on full calendar clicked date
		// $date=$this->input->post('Date');
		$where = array(
			// "StartDate <=" => $date,
			// "EndDate >" => $date,
			"ClassId" => $this->input->post('ClassId'),
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$query = $this->db->get_where('class',$where);
		$result = $query->row_array();
		if($result){
				$timewhere = array(
					"TimeId" => $result['StartTime'],
				);
				$timeQuery = $this->db->get_where('time_table',$timewhere);
				$timeResult = $timeQuery->row_array();
				return $timeResult;
		}else{
			return false;
		}   
	  }
	
	
	public function insert_cancel_class() {
		
		$classList=($this->input->post('ClassList[]')!='') ? json_encode($this->input->post('ClassList[]')): '[,]';
		$rescheduleList = ($this->input->post('RescheduleClass')!='') ? $this->input->post('RescheduleClass') : '0';
		$RescheduleDate = ($this->input->post('EventAction')== 2) ? $this->input->post('RescheduleDate') : '';
		$ClickDate = $this->input->post('ClickDate');
		$cancelclassReason=$this->input->post('Reason');
		$admin_action = array(
			"ClassList" =>$classList,
			"EventList" => $this->input->post('EventAction'),
			"RescheduleList" => $rescheduleList,
			"ClassTime" => $this->input->post('RescheduleTime'),
			"CurrentDate" => $ClickDate,
			"RescheduleDate" => $RescheduleDate,
			"Reason" => $this->input->post('Reason'),
			"CreatedBy" => $this->session->userdata('EmailAddress'),
			"CreatedOn" => date('Y-m-d: H:i:s'),
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		// $cancelClass=$this->db->select('ClassName')->from('class')->where_in($classList)->get();
		$cancelClassList=$this->input->post('ClassList[]');
		$rescheduleClassList=$this->input->post('RescheduleClass');
		$query = $this->db->insert('class_action',$admin_action); 
		if($query) {
			
			if($classList == '[,]' && $rescheduleList == '0') {
				$event_detail = array(
					"EventName" => $this->input->post('NewEvent'),
					"EventDate" => $this->input->post('ClickDate'),
					"Reason" => $this->input->post('Reason'),
					"CreatedBy" => $this->session->userdata('EmailAddress'),
					"CreatedOn" => date('Y-m-d: H:i:s'),
					"Status" => 1,
					"MarkAsDelete" => 0,
				);
				$query1 = $this->db->insert('event_calendar',$event_detail);
				if($query1) {
					$event_data = array(
						"Role" => '3',
						"Name" => $this->session->userdata('FullName'),
						"RegId" => $this->session->userdata('UserId'),
						"EventId" => 3,
						"Message" => $this->input->post('NewEvent').' is scheduled on '.$this->input->post('ClickDate').' event topic is '.$this->input->post('Reason'),
						"ShortMessage" => 'New event created',
						"Reason" => $this->input->post('Reason'),
						"CreatedBy" => $this->session->userdata('EmailAddress'),
						"CreatedOn" => date('Y-m-d: H:i:s'),
						"Status" => 1,
						"MarkAsDelete" => 0,
					);
				$event_query = $this->db->insert('notification',$event_data);
				if($event_query){
						return true;
				}else{
					return false;
				}
			}
			
			} else{
				if($cancelClassList !=null) {
					$notif_query = false;
				for($i=0;$i < sizeof($cancelClassList); $i++){
					$cancelClass=$this->db->select('*')->from('class')->where('ClassId',$cancelClassList[$i])->get();
					// echo  $this->db->last_query();
// exit;
					 $cancelClassRes= $cancelClass->row_array();
					 // print_r($cancelClassList);
// exit;
					$notification_data = array(
						"Role" => '3',
						"Name" => $this->session->userdata('FullName'),
						"RegId" => $this->session->userdata('UserId'),
						"ClassId"=> $cancelClassList[$i],
						"Message" => $cancelClassRes['ClassName'].' has been cancelled on '.$this->input->post('ClickDate') ,
						"Reason" => $this->input->post('Reason'),
						"ShortMessage" => $cancelClassRes['ClassName'].' cancelled',
						"CreatedBy" => $this->session->userdata('EmailAddress'),
						"CreatedOn" => date('Y-m-d: H:i:s'),
						"Status" => 1,
						"MarkAsDelete" => 0,
					);
					$notification_query = $this->db->insert('notification',$notification_data);
					$notif_query = true;
				 }
				 if($notif_query){ return true; }else{ return false; }
				} else{
					$rescheduleClass=$this->db->select('*')->from('class')->where('ClassId',$rescheduleClassList)->get();
					// echo  $this->db->last_query();
					 $rescheduleClassRes= $rescheduleClass->row_array();
					 // print_r($cancelClassRes);
					$notification_data = array(
						"Role" => '3',
						"RegId" => $this->session->userdata('UserId'),
						"Name" => $this->session->userdata('FullName'),
						"ClassId" => $rescheduleClassList,
						"Message" => $rescheduleClassRes['ClassName'].' has been rescheduled on '.$this->input->post('RescheduleDate'),
						"Reason" => $this->input->post('Reason'),
						"ShortMessage" => $rescheduleClassRes['ClassName'].' has been rescheduled',
						"CreatedBy" => $this->session->userdata('EmailAddress'),
						"CreatedOn" => date('Y-m-d: H:i:s'),
						"Status" => 1,
						"MarkAsDelete" => 0,
					);
					
					$notification_query = $this->db->insert('notification',$notification_data);
					if($notification_query){
							return true;
					}
				}
		}
	}else{
		return false;
	}   
}


	public function get_notAttendingClass_byUser() {
		$count = 0;
		$userresult ='';
		$date = date('Y-m-d');
		$where = array(
			"CurrentDate" => $date,
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		$query = $this->db->where($where);
		$query = $this->db->get('class_action');
		$result = $query->result_array();
		if($result){
			foreach($result as $k => $res){
				//print_r($res);
				if (!empty($res['UserList'])){
					$u_list=json_decode($res['UserList']);
					foreach($u_list as $key => $user){
						$userquery=$this->db->select('u.ClassName as u_classId,u.FirstName as Fname, u.LastName as Lname, c.ClassName as ClassName')
							 ->from('user as u')
							 ->where_in('u.RegId', $user)
							 ->where('u.Status', '1')
							 ->where('u.MarkAsDelete', '0')
							 ->join('class as c', 'c.ClassId = u.ClassName', 'LEFT')
							 ->get();
						$count = $userquery->num_rows();
						$userresult = $userquery->result_array();
					}
				}
			}

			 return $userresult;
		}
	}
	public function get_adminActionEvents() {
		$where = array(
			"Status" => 1,
			"MarkAsDelete" => 0,
		);
		
		$query = $this->db->where($where);
		$query = $this->db->get('class_action');
		$result = $query->result_array();
		$events = array();
		$Totalevents = array();
		$cancelClass = array();
		$rescheduleClassArray = array();
		$rescheduleDate = array();
		$userNotAttendClass = array();
		if($result){
			foreach($result as $k => $res){
				//print_r($res);
				if (!empty($res['UserList'])){
					$u_list=json_decode($res['UserList']);
					foreach($u_list as $key => $user){
						$userquery=$this->db->select('u.ClassName as u_classId,u.FirstName as Fname, u.LastName as Lname, c.ClassName as ClassName')
								 ->from('user as u')
								 ->where_in('u.RegId', $user)
								 ->where('u.Status', '1')
								 ->where('u.MarkAsDelete', '0')
								 ->join('class as c', 'c.ClassId = u.ClassName', 'LEFT')
								 ->get();
						$userresult = $userquery->row_array();
						$classattend['id'] = $userresult['u_classId'];
						$classattend['title'] = $userresult['Fname']." ".$userresult['Lname'] ." is not attending ".$userresult['ClassName'];
						$classattend['start'] = $res['CurrentDate'];
						$classattend['allDay'] = true;
						$classattend['className'] = 'primary';
						array_push($userNotAttendClass, $classattend);
					}
				}
				if($res['EventList'] == '2'){
					$rescheduleClass = json_decode($res['RescheduleList'],true);
					$rescheduleQuery = $this->db->where('ClassId',$rescheduleClass);
					$rescheduleQuery = $this->db->get('class');
					$rescheduleResult = $rescheduleQuery->result_array();
					foreach($rescheduleResult as $rescheduleky => $rescheduleRe){
						
						$reschedule['id'] = $rescheduleRe['ClassId'];
						$reschedule['title'] = $rescheduleRe['ClassName']." is rescheduled on ".date("d M", strtotime($res['RescheduleDate']));
						$reschedule['start'] = $res['CurrentDate'];
						$reschedule['allDay'] = true;
						$reschedule['className'] = 'success';
						array_push($rescheduleDate, $reschedule);
						$r['id'] = $rescheduleRe['ClassId'];
						$r['title'] = $rescheduleRe['ClassName']." from ".date("d M", strtotime($res['CurrentDate']))." is rescheduled on ".date("g:i A", strtotime($res['ClassTime']));
						$r['start'] = $res['RescheduleDate'];
						$r['allDay'] = true;
						$r['className'] = 'success';
						array_push($rescheduleClassArray, $r);
					}
					
				}
				
				if($res['EventList'] == '1'){
					$classcheck=array();
					$classcheck=json_decode($res['ClassList'],true);
					$query1 = $this->db->where_in('ClassId',$classcheck);
					$query1 = $this->db->get('class');
					$result1 = $query1->result_array();
					foreach($result1 as $ky => $resu){
						$c['id'] = $resu['ClassId'];
						$c['title'] = "Class ".$resu['ClassName']." is cancelled";
						$c['start'] = $res['CurrentDate'];
						 //$c['end'] = $resu['EndDate'];
						$c['allDay'] = true;
						$c['className'] = 'important';
						array_push($cancelClass, $c);
					}
				}
			}
			//all data is fetched from event calendar table not from class_action
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
			$Totalevents=array_merge($events,$cancelClass,$rescheduleClassArray,$rescheduleDate,$userNotAttendClass);
			//exit;
			 return json_encode($Totalevents);
		}else{
			return false;
		}   
	}

	  
	  
	  
	  
	  
	  
	  
######################################################################################################
# 
#notification section
#1)
#2)
#3)
#4)
#5)
#6)
#
#####################################################################################################	
	public function getNotification() {
		$query = $this->db->order_by('CreatedOn','desc');
		$query = $this->db->where_not_in('Role',3);
		$query = $this->db->get('notification');
		// echo  $this->db->last_query();
		// $count = $query->num_rows();
		$result = $query->result_array();
		if($query){
			
			return $result;
			
		}else{
			return false;
		}   
	}
	public function get_latest_notification() {
		$query = $this->db->order_by('CreatedOn','desc');
		$query = $this->db->where_not_in('Role',3);
		$query = $this->db->limit(5);
		$query = $this->db->get('notification');
		// echo  $this->db->last_query();
		// $count = $query->num_rows();
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
		$query = $this->db->where_not_in('Role','3');
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
				$Gquery = $this->db->where_not_in('Role','3');
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
	// public function get_results($search_term='default')
    // {
        // // Use the Active Record class for safer queries.
        // $this->db->select('*');
        // $this->db->from('members');
        // $this->db->like('username',$search_term);

        // // Execute the query.
        // $query = $this->db->get();

        // // Return the results.
        // return $query->result_array();
    // }
	
	public function get_users_feedback() {
		$query = $this->db->select('*')
		->order_by('FeedbackId', 'DESC')
		->from('user_feedback as uf')
		->limit('5')
		 ->join('feedbacktype as ft', 'uf.Subject = ft.FeedbackTypeId', 'LEFT')
		 ->join('user as u', 'uf.UserId = u.RegId', 'LEFT')
		 ->get();
		$result = $query->result_array();
		if($query){
			
			return $result;
			
		}else{
			return false;
		}   
	}
	public function get_PaymentHistoryDash() {
		$query = $this->db->select('*')
		 ->from('payment_histroy as ph')
		->limit('5')
		->where('ph.Status', 1)
		->where('ph.MarkAsDelete', 0)
		 ->join('user as u', 'ph.RegId = u.RegId', 'LEFT')
		 ->get();
		if($query) {
			return $query->result_array();
		} else {
			return false;
		}
	}
	public function get_allPaymentHistory() {
		$query = $this->db->select('*')
		 ->from('payment_histroy as ph')
		->where('ph.Status', 1)
		->where('ph.MarkAsDelete', 0)
		 ->join('user as u', 'ph.RegId = u.RegId', 'LEFT')
		 ->get();
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
	public function get_indPaymentHistory() {
		$query = $this->db->select('*')
			->from('payment_histroy as ph')
			->where('ph.Status', 1)
			->where('ph.MarkAsDelete', 0)
			->join('user as u', 'ph.RegId = u.RegId', 'LEFT')
			->where('u.UserType', 1)
			->get();
		if($query) {
			return $query->result_array();
		} else {
			return false;
		}
	}
	public function get_corPaymentHistory() {
		$query = $this->db->select('*')
			->from('payment_histroy as ph')
			->where('ph.Status', 1)
			->where('ph.MarkAsDelete', 0)
			->join('user as u', 'ph.RegId = u.RegId', 'LEFT')
			->where('u.UserType', 2)
			->get();
		if($query) {
			return $query->result_array();
		} else {
			return false;
		}
	}
}
?>