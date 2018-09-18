<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model{
    function __construct() {
        $this->tableName = 'users';
        $this->primaryKey = 'id';
    }
    
    /*
     * Insert / Update facebook profile data into the database
     * @param array the data for inserting into the table
     */
    public function checkUser($ru_Data = array(), $u_Data = array()){
        // if(!empty($userData)){
            // //check whether user data already exists in database with same oauth info
            // $this->db->select($this->primaryKey);
            // $this->db->from($this->tableName);
            // $this->db->where(array('oauth_provider'=>$userData['oauth_provider'],'oauth_uid'=>$userData['oauth_uid']));
            // $prevQuery = $this->db->get();
            // $prevCheck = $prevQuery->num_rows();
            
            // if($prevCheck > 0){
                // $prevResult = $prevQuery->row_array();
                
                // //update user data
                // $userData['modified'] = date("Y-m-d H:i:s");
                // $update = $this->db->update($this->tableName,$userData,array('id'=>$prevResult['id']));
                
                // //get user ID
                // $userID = $prevResult['id'];
            // }else{
                // //insert user data
                // $userData['created']  = date("Y-m-d H:i:s");
                // $userData['modified'] = date("Y-m-d H:i:s");
                // $insert = $this->db->insert($this->tableName,$userData);
                
                // //get user ID
                // $userID = $this->db->insert_id();
            // }
        // }  
		if(!empty($ru_Data)){
            //check whether user data already exists in database with same oauth info
            $this->db->select('*');
            $this->db->from('registered_user');
            $this->db->where(array('OauthProvider'=>$ru_Data['OauthProvider'],'OauthUid'=>$ru_Data['OauthUid']));
            $prevQuery = $this->db->get();
            $prevCheck = $prevQuery->num_rows();
            
            if($prevCheck > 0){
                $prevResult = $prevQuery->row_array();
                
                //update user data
                $ru_Data['ModifiedOn'] = date("Y-m-d H:i:s");
                $update = $this->db->update('registered_user',$ru_Data,array('RegId'=>$prevResult['RegId']));

                if($update){
					//to insert data into user table
					$update_user = $this->db->update('user',$u_Data,array('RegId'=>$prevResult['RegId']));
				}
                //get user ID
                $userID = $prevResult['RegId'];
				
            }else{
                //insert user data
                $ru_Data['CreatedOn']  = date("Y-m-d H:i:s");
                $insert = $this->db->insert('registered_user',$ru_Data);
                
                //get user ID
                $userID = $this->db->insert_id();
				if($insert){
					$u_Data['RegId'] = $userID;
					$u_Data['Role'] = '1';
					 $insert_user = $this->db->insert('user',$u_Data);
				}

            }
        }
// exit;
        
        //return user ID
        return $userID?$userID:FALSE;
    }
}
?>