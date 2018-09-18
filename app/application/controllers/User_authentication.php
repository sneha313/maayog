<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User_Authentication extends CI_Controller
{
    function __construct() {
        parent::__construct();
        
        // Load facebook library
        $this->load->library('facebook');
        
        //Load user model
        $this->load->model('user');
    }
    
    public function index(){
        $userData = array();

        // Check if user is logged in
        if($this->facebook->is_authenticated()){

            // Get user facebook profile details
            $fbUserProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,locale,cover,picture');

            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $fbUserProfile['id'];
            $userData['first_name'] = $fbUserProfile['first_name'];
            $userData['last_name'] = $fbUserProfile['last_name'];
            $userData['email'] = $fbUserProfile['email'];
            $userData['gender'] = (!empty($fbUserProfile['gender']) OR isset($fbUserProfile['gender'])) ? $fbUserProfile['gender'] : '';
            $userData['locale'] = (!empty($fbUserProfile['locale']) OR isset($fbUserProfile['locale'])) ? $fbUserProfile['locale'] : '';
            $userData['cover'] = (!empty($fbUserProfile['cover']['source']) OR isset($fbUserProfile['cover']['source'])) ? $fbUserProfile['cover']['source'] :'';
            $userData['picture'] = $fbUserProfile['picture']['data']['url'];
            $userData['link'] = (!empty($fbUserProfile['link']) OR isset($fbUserProfile['link'])) ? $fbUserProfile['link'] : '';
			
			// echo '<pre>';
			// print_r($userData);
			// exit;

			//insert data into register table
			$ru_Data['OauthProvider'] = 'facebook';
			$ru_Data['OauthUid'] = $fbUserProfile['id'];
			$ru_Data['FirstName'] = $fbUserProfile['first_name'];
			$ru_Data['LastName'] = $fbUserProfile['last_name'];
			$ru_Data['FullName'] = $fbUserProfile['first_name'].' '.$fbUserProfile['last_name'];
			$ru_Data['Role'] = '1';
			$ru_Data['EmailAddress'] = $fbUserProfile['email'];

			//to insert data into user table
			$u_Data['FirstName'] = $fbUserProfile['first_name'];
			$u_Data['LastName'] = $fbUserProfile['last_name'];
			$u_Data['EmailAddress'] = $fbUserProfile['email'];
			$u_Data['Gender'] = (!empty($fbUserProfile['gender']) OR isset($fbUserProfile['gender'])) ? $fbUserProfile['gender'] : '';
            $u_Data['City'] = (!empty($fbUserProfile['locale']) OR isset($fbUserProfile['locale'])) ? $fbUserProfile['locale'] : '';
            $u_Data['FbCover'] = (!empty($fbUserProfile['cover']['source']) OR isset($fbUserProfile['cover']['source'])) ? $fbUserProfile['cover']['source'] :'';
            $u_Data['ProfilePhoto'] = $fbUserProfile['picture']['data']['url'];
            $u_Data['FbLink'] = (!empty($fbUserProfile['link']) OR isset($fbUserProfile['link'])) ? $fbUserProfile['link'] : '';
            
            // Insert or update user data
            $userID = $this->user->checkUser($ru_Data,$u_Data);
            
            // Check user data insert or update status
            if(!empty($userID)){
				$sess_data = array(
					"UserId" => $userID,
					"FirstName" => $userData['first_name'],
					"LastName" => $userData['last_name'],
					"FullName" => $userData['first_name'].' '.$userData['last_name'],
					"EmailAddress" => $userData['email'],
					"MobileNumber" => '',
					"Role" => 1
				);
			// echo '<pre>';
			// print_r($sess_data);
			// exit;
                $data['userData'] = $u_Data;
                 $this->session->set_userdata($sess_data);
            }else{
               $data['userData'] = array();
            }
            
            // Get logout URL
            $data['logoutURL'] = $this->facebook->logout_url();
        }else{
            // Get login URL
            $data['authURL'] =  $this->facebook->login_url();
        }
        // Load login & profile view
        // $this->load->view('user_authentication/index',$data);

		if(($this->session->userdata('Role') == 1) AND  ($this->config->item('custom_base_url') == base_url())){
			redirect(base_url('dashboard'));
		} else {
			redirect(base_url());
		}
    }

    public function logout() {
        // Remove local Facebook session
        $this->facebook->destroy_session();
        // Remove user data from session
        $this->session->unset_userdata('userData');
        // Redirect to login page
			redirect(base_url());
        // redirect('/user_authentication');
    }
}
?>