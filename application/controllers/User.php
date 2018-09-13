<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
       parent :: __construct();	
    }
	
	#login section
	public function index() {
		if(($this->session->userdata('Role') == 1) AND  ($this->config->item('custom_base_url') == base_url())){
			$this->load->view('dashboard');
		} else {
			$this->load->view('index');
		}
	}
	
	#if login credential is not matched it will throw error
	public function check_login() {
		$result['test']= $this->User_Model->check_login();
		
		if($result){
			if(($this->session->userdata('Role') =='1')  AND  ($this->config->item('custom_base_url') == base_url())){
				// $this->load->view('dashboard');
				redirect(base_url('dashboard'));
			} else{
				$this->session->set_flashdata('Error','error');
				redirect(base_url());
			}
		}else{
			$this->session->set_flashdata('Error','error');
			redirect(base_url());
		}
	}
	
	#mail for login
	public function check_user() {
		
		$result = $this->User_Model->check_user();
	}
	public function get_cancelledClass() {
		
		$result = $this->User_Model->get_cancelledClass();
	}
	#mail for login
	public function check_mail() {
		
		$result = $this->User_Model->check_mail();
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
		
		$result['status'] = $this->User_Model->registerUser();
		$emailAddress=$this->input->post('EmailAddress');
		$fullName=$this->input->post('FirstName').' '.$this->input->post('LastName');
		$result['title'] = 'Registered User';
		$result['content']='<span class="promotion-code" style="text-overflow: ellipsis;font-size: 14px;font-style: italic;line-height: 35px;color: #136193;font-weight: 400;"> Dear  <b>'.$fullName.'</b>, <br> A new Individual user '.$fullName.'., email address : <b>'.$emailAddress.'</b> is registerd with maayog. <br> for full user detail,  Kindly log in with maayog.';
		$message = $this->load->view('email-template',$result,true);
		// echo $message = $this->load->view('email-template',$result,true);
		// exit;
        $EmailAddress = $this->input->post('EmailAddress');
        $succMsg = '';
        $this->form_validation->set_rules('EmailAddress','Name','trim|required');
		if(isset($EmailAddress) && !empty($EmailAddress)) {

			$config = $this->config->item('email_detail');

			$this->email->initialize($config);

			$this->email->set_newline("\r\n");
			$this->email->from('info@maayog.com','Maayog');
			$this->email->to($emailAddress);
			$this->email->cc('sneha.k@purpledot.in');
			$this->email->bcc('chauhana700@gmail.com');
			$this->email->subject('Thanku For Registering With Maayog');
			$this->email->message($message);
			if($this->email->send()) {
				  echo true;
			} else {
				 echo false;
			}
		}
		
	}
	
	#forgot password section
	public function forgot_password() {
		$this->load->view('forgot_password');
	}
	public function forgot_pwdMail() {
		$result = $this->User_Model->forgot_pwdMail();
		$emailAddress=$result['EmailAddress'];
		$fullName=$result['FullName'];
		$password=$result['Password'];
		$result['title'] = 'Forgot Password';
		$result['content']='<span class="promotion-code" style="text-overflow: ellipsis;font-size: 14px;font-style: italic;line-height: 35px;color: #136193;font-weight: 400;"> Dear  <b>'.$fullName.'</b>, <br> We got a request to provide Password for '.$fullName.'. Please find your login details below <br>Username : <b>'.$emailAddress.'</b>  <br/> Password : <b>'.$password.'</b>. <br> If you have not requested it, Kindly log in change your password immediately.<br> <br>  <b>Cheers </b>,<br>  <b>Maayog Team </b><br><br><center></span>';
		 $message = $this->load->view('email-template',$result,true);
		// echo $message = $this->load->view('email-template',$result,true);
// exit;
        $EmailAddress = $this->input->post('EmailAddress');
        $succMsg = '';
        $this->form_validation->set_rules('EmailAddress','Name','trim|required');
            if(isset($EmailAddress) && !empty($EmailAddress)) {

				$config = $this->config->item('email_detail');

                $this->email->initialize($config);

                $this->email->set_newline("\r\n");
                $this->email->from('info@maayog.com','Maayog');
                $this->email->to($emailAddress);
                $this->email->cc('sneha.k@purpledot.in');
                $this->email->bcc('chauhana700@gmail.com');
                $this->email->subject('Forgot password.');
                $this->email->message($message);

            if($this->email->send()) {

				$this->session->set_flashdata('succ','success');
				redirect(base_url());
            } else {
                // show_error($this->email->print_debugger());
				$this->session->set_flashdata('err','error'); 
            }

        }

     }
	#dashboard section
	public function dashboard() {
		$result['package'] = $this->User_Model->get_yogaPackage();	
		$result['paymentTransac'] = $this->User_Model->last_transaction();
		$result['upcoming_class'] = $this->User_Model->get_upcomingClass();
		$this->load->view('dashboard', $result);
		
	}
	#to get types of classes
	public function getClassType() {
		$result['class_type'] = $this->User_Model->getClass_type();
	}
	#to get class detail
	public function get_class_detail() {
		$result = $this->User_Model->get_class_detail();
			if($result){
			// echo "success";
			echo json_encode($result);
		}else{
			return false;
		}   
	}
	#to get types of classes
	public function get_classBackground() {
		$result = $this->User_Model->get_classBackground();
		if($result){
			// echo "success";
			echo json_encode($result);
		}else{
			return false;
		}   
		
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
		$result['health_problem'] = $this->User_Model->get_healthProblemforSessionUser();
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
		$result['health_prob'] = $this->User_Model->get_healthProblem();
		$result['user_profile'] = $this->User_Model->userProfileDetail();
		if($result){
			$this->load->view('user_editProfile',$result);
			//echo json_encode($result);
		}else{
			return false;
		}  
	}
	#to get health problem name
	public function get_healthProblemforSessionUser() {
		$result = $this->User_Model->get_healthProblemforSessionUser();
		print_r($result);
		if($result){
			//$this->load->view('user_editProfile',$result);
			echo json_encode($result);
		}else{
			echo json_encode('Error');
		}  
	}
	
	#to edit user profile detail by sessionid
	public function updateUserDetail() {
		$result = $this->User_Model->updateUserDetail();
		
		if($result) {
			//die();
			//$this->session->set_flashdata('message', 'succ');
			redirect(base_url('user-profile'));
		} else {
			//die();
			redirect(base_url('edit-user-detail'));
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
		// if($this->session->userdata("role") == 1){
			$this->load->view('view_event_list');
		// }
	}
	public function contact($id='') {
		$result['feedback_type'] = $this->User_Model->get_feedbackType();		
		// $this->session->set_flashdata('msg', 'succ');
		$this->load->view('contact_us',$result);
	}
	public function payForYoga() {
		
		$result['package'] = $this->User_Model->get_yogaPackage();		
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
		$result = $this->User_Model->insert_message();
        // $recaptcha = $this->input->post('g-recaptcha-response');
        $FeedbackType = $this->input->post('FeedbackType');
        $Message = $this->input->post('Message');
        $succMsg = '';
        // $this->form_validation->set_rules('FeedbackType','Name','trim|required');
        // $this->form_validation->set_rules('Message','Name','trim|required');
            // if(isset($recaptcha) && !empty($recaptcha)) {
				$config = $this->config->item('email_detail');

                $this->email->initialize($config); // added on 1/16

                $this->email->set_newline("\r\n");
                
                $this->email->from('info@maayog.com','Maayog');
                
                $this->email->to('amit.c@purpledot.in');
				
                $this->email->cc('sneha.k@purpledot.in');
				
                $this->email->bcc('chauhana700@gmail.com');
				
                $this->email->subject('Contact Us');
                
                $this->email->message('Thank You for your feedback');

            if($this->email->send()) {
				redirect(base_url('dashboard'));
            } else {
                
            }

        // }

     }
	 
	public function get_notification_count() {
		$result['notification_count'] = $this->User_Model->get_notification_count();
		if($result) {
			return $result;
		}
		else{
			return false;
		}
	}	
	public function cancel_class_modal_hide() {
		$result = $this->User_Model->cancel_class_modal_hide();
		if($result) {
			echo $result;
		}
		else{
			echo 0;
		}
	}
	public function getNotification() {
		
		$result['notification'] = $this->User_Model->getNotification();
		if($result) {
			$this->load->view('notification',$result);
		}
		else{
			return false;
		}
	}
	public function update_notification_count() {
		
		$result['notification'] = $this->User_Model->update_notification_count();
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
	public function viewPayment($Id) {	

		$result['Payment'] = $this->User_Model->getPayment_ById($Id);
		$this->load->view('view-payment', $result);
		
		
	}
	public function paymentRequest() {	

		$post['post_deta'] = $this->input->post();
		// echo '<pre>';
		// print_r($post);
		// exit;
		$res = $this->User_Model->paymentRequest($post['post_deta']);
		if($res){
			$this->load->view('payment-request', $post);
		}
		
	}
	public function paymentResponse() {

		$post['response_data'] = $this->input->post();
		$res = $this->User_Model->paymentResponse($post['response_data']);
		if($res){
			$this->load->view('payment-response', $post);
		}
		
	}
	public function paymentHistory() {

		$result['paymenthistory'] = $this->User_Model->get_paymentHistory();
		if($result){
			$this->load->view('payment_history', $result);
		}
	}
	// public function get_upcomingClass() {

		// $result['paymenthistory'] = $this->User_Model->get_upcomingClass();
		// exit;
		// if($result){
			// $this->load->view('payment_history', $result);
		// }
	// }
	

}
