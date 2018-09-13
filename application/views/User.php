<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
       parent :: __construct();	
    }
	
	#login section
	public function index() {
		
		$this->load->view('index');
	}
	
	#if login credential is not matched it will throw error
	public function check_login() {
		$result= $this->User_Model->check_login();
		
		if($result){
			 $this->load->view('dashboard');
		}else{
			$result['Error'] = 'error';
			$this->load->view('index',$result);
		}
	}
	
	#mail for login
	public function check_user() {
		
		$result = $this->User_Model->check_user();
	}
	public function get_cancelledClass() {
		
		$result = $this->User_Model->get_cancelledClass();
		// echo "<pre>";
		// print_r($result);
	}
	#mail for login
	public function check_mail() {
		
		$result = $this->User_Model->check_mail();
	}
	
	#logout section
	public function logout() {
		
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
	
	#register section
	public function register() {
		
		$this->load->view('register');
	}
	public function registerUser() {
		
		$result = $this->User_Model->registerUser();
		
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
		
		$this->load->view('dashboard');
		
	}
	#to get types of classes
	public function getClassType() {
		$result['class_type'] = $this->User_Model->getClass_type();
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
		$result['health_prob'] = $this->User_Model->get_healthProblemforSessionUser();
		$result['user_profile'] = $this->User_Model->userProfileDetail();
		if($result){
			$this->session->set_flashdata('message', 'succ');
			$this->load->view('user_profile',$result);
		}else{
			return false;
		}  
	}
	
	#to view user profile detail by sessionid
	public function get_healthProblem() {
		$result = $this->User_Model->get_healthProblem();
		if($result){
			echo json_encode($result);
		}else{
			echo json_encode('Error');
		}  
	}
	
	#to edit user profile detail by sessionid
	public function edituserProfile() {
		$result['health_prob'] = $this->User_Model->get_healthProblemforSessionUser();
		$result['user_profile'] = $this->User_Model->userProfileDetail();
		if($result){
			echo json_encode($result);
		}else{
			return false;
		}  
	}
	
	#to edit user profile detail by sessionid
	public function updateUserDetail() {
		$result['health_prob'] = $this->User_Model->get_healthProblemforSessionUser();
		$result['edit_userDeatil'] = $this->User_Model->updateUserDetail();
		if($result){
			echo true;
		}else{
			echo false;
		}  
	}	
	#to edit user profile detail by sessionid
	public function get_ClassbyLoggedinUser() {
		$result = $this->User_Model->get_ClassbyLoggedinUser();
		if($result){
			echo json_encode($result);
		}else{
			echo false;
		}  
	}
	
	public function eventManagement() {
		
		$this->load->view('view_event_list',$result);
	}
	public function contact() {
		
		$result['feedback_type'] = $this->User_Model->get_feedbackType();		
		$this->load->view('contact_us',$result);
	}
	
	public function payForYoga() {
		
		$result['user'] = $this->User_Model->get_user();		
		if($result){
			
			$this->load->view('payForYoga',$result);
		}
		else{
			echo "error";
		}
	}
	public function get_yogaCost() {
		$result = $this->User_Model->get_yogaCost();
		//print_r($result);
		//exit;
		if($result){
			//$this->load->view('payForYoga',$result);
			echo json_encode($result);
		}
		else{
			echo json_encode('error');
		}
	}
	public function get_companyName() {
		$result = $this->User_Model->get_corpType();
		//print_r($result);
		//exit;
		if($result){
			//$this->load->view('payForYoga',$result);
			echo json_encode($result);
		}
		else{
			echo json_encode('error');
		}
	}
	public function insert_cancel_classbyUser() {
		$result = $this->User_Model->insert_cancel_classbyUser();
		if($result){
			//$this->session->set_flashdata('message', 'success');
			//redirect('event');
			echo json_encode($result);
		}else{
			echo json_encode('error');
		}
	}
	public function insert_message() {
		$recaptcha = $this->input->post('g-recaptcha-response');
		$FeedbackType = $this->input->post('FeedbackType');
		$Message = $this->input->post('Message');
		$succMsg = '';
		
		

		
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'sneha.k@purpledot.in',
			'smtp_pass' => '76342$purple',
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1'
		);
		$this->load->library('email', $config);
		$this->email->from('amit.c@purpledot.in', 'Amit Chauhan');
		$this->email->to('sneha.k@purpledot.in');
		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');
		$this->email->cc('amit.c@purpledot.in');
		$this->email->bcc('amit.c@purpledot.in');

		$this->email->send();

		// if(isset($recaptcha) && !empty($recaptcha)){
				// //your site secret key
				// $secret = '6LfPWWsUAAAAACu5x0BMUGx0nZJcKWvGrm7dhsXU';
				// //get verify response data
				// $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
				// $responseData = json_decode($verifyResponse);
				// // if($responseData->success){
					
					// $to = 'sneha.k@purpledot.in';
					// $subject = 'New contact form have been submitted';
					// $htmlContent = "
						// <h1>Contact request details</h1>
						// <p><b>recaptcha: </b>".$recaptcha."</p>
						// <p><b>FeedbackType: </b>".$FeedbackType."</p>
						// <p><b>Email: </b>sneha.k@purpledot.in</p>
						// <p><b>Message: </b>".$Message."</p>
					// ";
					// // Always set content-type when sending HTML email
					// $headers = "MIME-Version: 1.0" . "\r\n";
					// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					// // More headers
					// $headers .= 'From:sneha <sneha.k@purpledot.in>' . "\r\n";
					// //send email
					// @mail($to,$subject,$htmlContent,$headers);
					
					// echo $succMsg = 'Your contact request have submitted successfully.';
				// // }else{
					// // echo $errMsg = 'Robot verification failed, please try again.';
				// // }
			// }else{
				// echo $errMsg = 'Please click on the reCAPTCHA box.';
			// }
		// $result = $this->User_Model->insert_message();
		// if($result){
			
			// $this->load->view('dashboard');
		// }else{
		// echo json_encode('error');
		// }
	 }

}
