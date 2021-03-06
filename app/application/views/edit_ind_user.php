<?php
	$this->load->view('header');
	$Id = $this->uri->segment(2);
 ?>
<div class="content">
	<div class="row multi-card">
		<div class="multi-card">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
				<form id="editIndUser" action="<?php echo base_url('Admin/get_editIndUser/'.$Id); ?>" method="POST" enctype="multipart/form-data">
					<div class="card card-multi-form">
						<div class="card-header card-header-form bg-rose">
							<i class="material-icons">perm_identity</i>
						</div>
						<div class="card-header-text-form bg-rose">
							<h4 class="title">Edit User</h4>
						</div>
						<div class="card-content card-content-form">
							<div class="row">
							<div class="col-xs-12 col-sm-12  col-md-8 col-lg-9 col-xl-9">
							<div class="row">
								<div class="col-xs-12 col-sm-12  col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">First Name</label>
										<input type="text" name="FirstName" class="form-control FirstName" value="<?php echo (!empty($edit_Induser_data_byId['FirstName'])) ? $edit_Induser_data_byId['FirstName'] : ''; ?>">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12  col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Last Name</label>
										<input type="text" name="LastName" class="form-control LastName" value="<?php echo (!empty($edit_Induser_data_byId['LastName'])) ? $edit_Induser_data_byId['LastName'] : ''; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12  col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label" for="EmailAddress">Email Id</label>
										<input type="text" name="EmailAddress" id="EmailAddress" class="form-control EmailAddress" value="<?php echo (!empty($edit_Induser_data_byId['EmailAddress'])) ? $edit_Induser_data_byId['EmailAddress'] : ''; ?>">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12  col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Contact Number</label>
										<input type="text" name="MobileNumber" class="form-control MobileNumber" value="<?php echo (!empty($edit_Induser_data_byId['MobileNumber'])) ? $edit_Induser_data_byId['MobileNumber'] : ''; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12  col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating " >
									<label class="control-label">Date of Birth</label>
									<div class="input-group DateOfBirth">
										<input type="text" name="DOB"  class="form-control" id="dob"  value="<?php echo (!empty($edit_Induser_data_byId['DateOfBirth'])) ? $edit_Induser_data_byId['DateOfBirth'] : ''; ?>">
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
									</div>
								</div>
								
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
									<label class="control-label ">Gender</label><!--?php echo print_r($edit_Induser_data_byId);?-->
										<select class="form-control Gender" id="gender" name="Gender">
										  <option value=""></option>
										  <option value="Male" <?php echo ($edit_Induser_data_byId['Gender'] == 'Male') ? 'selected': ''; ?>>Male</option>
										  <option value="Female"<?php echo ($edit_Induser_data_byId['Gender'] == 'Female') ? 'selected': ''; ?>>Female</option>
										</select>
									</div>
								</div>
								
							</div>
							
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label" for="healthCondition">Choose Health Condition</label>
										<select class="form-control HealthCondition" id="healthCondition" name="HealthCondition">
										  <option value=""></option>
										  <option value="noConcern" <?php echo ($edit_Induser_data_byId['HealthCondition'] == 'noConcern') ? 'selected': ''; ?>>No Concern</option>
										  <option value="concern" <?php echo ($edit_Induser_data_byId['HealthCondition'] == 'concern') ? 'selected': ''; ?>>Have a Concern</option>
										</select>
										
									</div>
								</div>
								
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 HealthProblem"  id="healthProblem" style="display:<?php echo ($edit_Induser_data_byId['HealthCondition'] == 'concern') ? 'block': 'none'; ?>;">
									<div class="form-group label-floating">
										<label class="control-label" for="healthProblem">choose Health Problem</label>
										<select class="form-control HealthProblem" name="HealthProblem" id="healthProblem">
										  <option value=""></option>
											<?php
										  if(!empty($health_problem)){
											foreach($health_problem as $key => $data){
											?>
											<option value="<?php echo $data['HealthId']; ?>"<?php echo ($edit_Induser_data_byId['HealthProblem'] == $data['HealthId']) ? 'selected': ''; ?>><?php echo $data['HealthProblemName'];?></option>
										  <?php } }?>
										</select>
										
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label" for="healthCondition">Aadhar Number</label>
										<input type="text" name="AadharNumber" id="aadharNumber" class="form-control AadharNumber" value="<?php echo (!empty($edit_Induser_data_byId['AadharNumber'])) ? $edit_Induser_data_byId['AadharNumber'] : ''; ?>">
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12  col-md-4 col-lg-3 col-xl-3">
							<div class="row">
								<div class="col-xs-12 col-sm-12  col-md-6 col-lg-6 col-xl-6">
									<div id="image-preview" <?php echo (!empty($edit_Induser_data_byId['ProfilePhoto'])) ?  'style ="background-image: url('.base_url($edit_Induser_data_byId['ProfilePhoto']).')"' : 'style ="background-image: url('.base_url('assets/img/faces/placeholder.jpg').')"'; ?>>
									  <label for="image-upload" id="image-label">Add Image</label>
									  <input type="file" name="ProfilePhoto" id="image-upload" />
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
					</div>
					<div class="card card-multi-form">
						<div class="card-header card-header-form bg-rose">
							<i class="material-icons">perm_identity</i>
						</div>
						<div class="card-header-text-form bg-rose">
							<h4 class="title">Assign Class</h4>
						</div>
						<div class="card-content card-content-form">
							
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
									<label class="control-label ">Choose User Type</label>
										<select class="form-control UserType" id="userType" name="UserType" value="<?php echo (!empty($edit_Induser_data_byId['Gender'])) ? $edit_Induser_data_byId['Gender'] : ''; ?>">
										  <option value=""></option>
										   <!--option value="Admin"<?php echo ($edit_Induser_data_byId['UserType'] == 'Admin') ? 'selected': ''; ?>>Admin</option-->
										   <option value="Individual"<?php echo ($edit_Induser_data_byId['UserType'] == 'Individual') ? 'selected': ''; ?>>Individual</option>
										  <option value="Corporate"<?php echo ($edit_Induser_data_byId['UserType'] == 'Corporate') ? 'selected': ''; ?>>Corporate</option>
										  
										</select>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 CorporateTypeDiv" style="display:none;" id="corporateTypeDiv">
									<div class="form-group label-floating">
									<label class="control-label ">Choose Corporate</label>
										<select class="form-control CorporateType" id="corporateType" name="CorporateType"  value="<?php echo (!empty($edit_Induser_data_byId['Gender'])) ? $edit_Induser_data_byId['Gender'] : ''; ?>">
										  <option value=""></option>
										   <?php
										  if(!empty($corp_name)){
											foreach($corp_name as $key => $data){
											?>
											<option value="<?php echo $data['CorpId']; ?>"<?php echo ($edit_Induser_data_byId['CorporateType'] == $data['CorpId']) ? 'selected': ''; ?>><?php echo $data['CompanyName']?></option>

										  <?php } }?>
										</select>
									</div>
								</div>
							</div>	
							
							<div class="row">
								<div class="col-xs-12 col-sm-12  col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">class Name</label>
										<select class="form-control ClassName" id="className" name="ClassName">
										  <option value=""></option>
										  <?php
										  if(!empty($class_name)){
											foreach($class_name as $key => $data){
												$startTime=$data['StartTime'];
												$endTime=$data['EndTime'];
											?>
											<option value="<?php echo $data['ClassId']; ?>"<?php echo ($data['ClassId'] == $edit_Induser_data_byId['ClassName']) ? 'selected': ''; ?>><?php echo $data['ClassName']." ( From ". date("h:i a",strtotime($startTime))." - ". date("h:i a",strtotime($endTime))." )" ?></option>

										  <?php } }?>
										</select>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<!--label class="control-label">Batch Start From - To</label-->
										<input type="text" name="TimeSlot" id="timeSlot" class="form-control TimeSlot" value="<?php echo (!empty($edit_Induser_data_byId['BatchName'])) ? $edit_Induser_data_byId['BatchName'] : ''; ?>" readonly>
											  <!------appended data from ajax------>
									</div>
								</div>
							</div>
						</div>
						</div>
					<div class="card card-multi-form">
						<div class="card-header card-header-form bg-rose">
							<i class="material-icons">perm_identity</i>
						</div>
						<div class="card-header-text-form bg-rose">
							<h4 class="title">Contact Address Detail</h4>
						</div>
						<div class="card-content card-content-form">
						<div class="row">	
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Address Line1</label>
									<input type="text" name="AddressLine1" class="form-control AddressLine1" value="<?php echo (!empty($edit_Induser_data_byId['AddressLine1'])) ? $edit_Induser_data_byId['AddressLine1'] : ''; ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Address Line2</label>
									<input type="text" name="AddressLine2" class="form-control AddressLine2" value="<?php echo (!empty($edit_Induser_data_byId['AddressLine2'])) ? $edit_Induser_data_byId['AddressLine2'] : ''; ?>">
								</div>
							</div>
						</div>
						<div class="row">	
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">City</label>
									<input type="text" name="City" class="form-control City" value="<?php echo (!empty($edit_Induser_data_byId['City'])) ? $edit_Induser_data_byId['City'] : ''; ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">State</label>
									<input type="text" name="State" class="form-control State" value="<?php echo (!empty($edit_Induser_data_byId['State'])) ? $edit_Induser_data_byId['State'] : ''; ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Pin Code</label>
									<input type="text" name="PinCode" class="form-control PinCode"  value="<?php echo (!empty($edit_Induser_data_byId['PinCode'])) ? $edit_Induser_data_byId['PinCode'] : ''; ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Country</label>
									<input type="text" name="Country" class="form-control Country" value="<?php echo (!empty($edit_Induser_data_byId['Country'])) ? $edit_Induser_data_byId['Country'] : ''; ?>">
								</div>
							</div>
						</div>
						   
							
					</div>
					</div>
					<!--div class="card card-multi-form">
						<div class="card-header card-header-form bg-rose">
							<i class="material-icons">perm_identity</i>
						</div>
						<div class="card-header-text-form bg-rose">
							<h4 class="title">Local Address Detail</h4>
						</div>
						<div class="card-content card-content-form">
							
						<div class="row">	
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Same as Permanent Address</label>
										<input type="checbox" name="SameAsLocalPermAddress" class="form-control SameAsLocalPermAddress">
									</div>
								</div>
							</div>
							<div class="row">	
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Address Line1</label>
										<input type="text" name="LocalAddressLine1" class="form-control LocalAddressLine1">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Address Line2</label>
										<input type="text" name="LocalAddressLine2" class="form-control LocalAddressLine2">
									</div>
								</div>
							</div>
							<div class="row">	
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">City</label>
										<input type="text" name="LocalCity" class="form-control LocalCity">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">State</label>
										<input type="text" name="LocalState" class="form-control LocalState">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Pin Code</label>
										<input type="text" name="LocalPinCode" class="form-control LocalPinCode">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Country</label>
										<input type="text" name="LocalCountry" class="form-control LocalCountry">
									</div>
								</div>
							</div>
					</div>
					</div-->
					<div class="row">
						<div class="col-xs-6 col-sm-2 col-md-3 col-lg-2 col-xl-2  col-xs-offset-0  col-sm-offset-8  col-md-offset-6  col-lg-offset-8 col-xl-offset-8">
							<button type="submit" class="btn btn-rose btn-block Submit pull-right-mar-10 mar-top-25px">Submit</button>
						</div>
						<div class="col-xs-6 col-sm-2 col-md-3 col-lg-2 col-xl-2">
							<button type="button" class="btn btn-primary btn-block pull-right-mar-10 mar-top-25px"  onclick=" window.history.go(-1)">Cancel</button>
							<div class="clearfix"></div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('footer'); ?>
<script src="<?php echo base_url('assets/validation/edit_ind_user.js'); ?>"></script>
