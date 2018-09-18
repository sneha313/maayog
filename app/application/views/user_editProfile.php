<?php $this->load->view('header'); ?>
<style>
.DateofBirth{
	padding-top: 13px;
}
.day{
	height: 22px;
}
.month{
	height: 22px;
}
.year{
	height: 22px;
}
</style>
<div class="content">
	<div class="row multi-card">
		<div class="multi-card">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
			<form id="editUserDetail" action="<?php echo base_url('User/updateUserDetail'); ?>"  method="POST" enctype="multipart/form-data">
					<div class="card card-multi-form">
						<div class="card-header card-header-form bg-rose">
							<i class="material-icons">perm_identity</i>
						</div>
						<div class="card-header-text-form bg-rose">
							<h4 class="title">Edit User Detail</h4>
						</div>
						<div class="card-content card-content-form">
							<div class="row">
								<div class="col-xs-12 col-sm-12  col-md-8 col-lg-9 col-xl-9">
									<div class="row">
										<div class="col-xs-12 col-sm-6  col-md-6 col-lg-6 col-xl-6">
											<div class="form-group label-floating">
												<label class="control-label">First Name</label>
												<input type="text" name="FirstName" class="form-control FirstName" value="<?php echo (!empty($user_profile['FirstName'])) ? $user_profile['FirstName'] : ''; ?>">
											</div>
										</div>
										<div class="col-xs-12 col-sm-6  col-md-6 col-lg-6 col-xl-6">
											<div class="form-group label-floating">
												<label class="control-label">Last Name</label>
												<input type="text" name="LastName" class="form-control LastName" value="<?php echo (!empty($user_profile['LastName'])) ? $user_profile['LastName'] : ''; ?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-6  col-md-6 col-lg-6 col-xl-6">
											<div class="form-group label-floating">
												<label class="control-label" for="EmailAddress">Email Id</label>
												<input type="text" name="EmailAddress" id="EmailAddress" class="form-control EmailAddress" value="<?php echo (!empty($user_profile['EmailAddress'])) ? $user_profile['EmailAddress'] : ''; ?>" readonly>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6  col-md-6 col-lg-6 col-xl-6">
											<div class="form-group label-floating">
												<label class="control-label">Contact Number</label>
												<input type="text" name="MobileNumber" class="form-control MobileNumber"  value="<?php echo (!empty($user_profile['MobileNumber'])) ? $user_profile['MobileNumber'] : ''; ?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-6  col-md-6 col-lg-6 col-xl-6">
											<div class="form-group label-floating" id="dateOfBirthDiv">
												<label class="control-label">Date of Birth</label>
												<?php $date = (!empty($user_profile['DateOfBirth'])) ? $user_profile['DateOfBirth'] : '';?>
												<div class="DateofBirth">
												<input type="text" id="dob" data-format="DD-MM-YYYY" data-template="D MMM YYYY" name="DOB" value="<?php echo date('d-m-Y', strtotime($date)); ?>">
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
											<div class="form-group label-floating">
											<label class="control-label ">Gender</label>
												<select class="form-control Gender" id="gender" name="Gender">
												  <option value=""></option>
												  <option value="Male" <?php echo ($user_profile['Gender'] == 'Male') ? 'selected': ''; ?>>Male</option>
												  <option value="Female"<?php echo ($user_profile['Gender'] == 'Female') ? 'selected': ''; ?>>Female</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
											<div class="form-group label-floating">
												<label class="control-label" for="healthCondition">Choose Health Condition</label>
												<select class="form-control HealthCondition" id="healthCondition" name="HealthCondition">
													<option value=""></option>
													<option value="noConcern" <?php echo ($user_profile['HealthCondition'] == 'noConcern') ? 'selected': ''; ?>>No Concern</option>
													<option value="concern" <?php echo ($user_profile['HealthCondition'] == 'concern') ? 'selected': ''; ?>>Have a Concern</option>
												</select>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 HealthProblemDiv"  id="healthProblemDiv" style="display:<?php echo ($user_profile['HealthCondition'] == 'concern') ? 'block': 'none'; ?>;">
											<div class="form-group label-floating">
												<label class="control-label" for="healthProblem">Choose Health Problem</label>
												<select class="form-control HealthProblem" name="HealthProblem" id="healthProblem">
												   <option value=""></option>
													<?php
												   if(!empty($health_prob)){
													 foreach($health_prob as $prob){
													?>
													<option value="<?php echo $prob['HealthId']; ?>"<?php echo ($user_profile['HealthProblem'] == $prob['HealthId']) ? 'selected': ''; ?>><?php echo $prob['HealthProblemName'];?></option>
												  <?php } }?>
												</select>
												
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
											<div class="form-group label-floating">
												<label class="control-label" for="healthCondition">Aadhar Number</label>
												<input type="text" name="AadharNumber" id="aadharNumber" class="form-control AadharNumber" value="<?php echo (!empty($user_profile['AadharNumber'])) ? $user_profile['AadharNumber'] : ''; ?>">
											</div>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12  col-md-4 col-lg-3 col-xl-3 ImageVal">
									<div class="row">
										<div id="image-preview" <?php echo (!empty($user_profile['ProfilePhoto'])) ?  'style ="background-image: url('.base_url($user_profile['ProfilePhoto']).')"' : 'style ="background-image: url('.base_url('assets/img/faces/placeholder.jpg').')"'; ?>>
										<label for="image-upload" id="image-label">Add Image</label>
										<input type="file" name="ProfilePhoto" id="image-upload" value="<?php echo (!empty($user_profile['ProfilePhoto'])) ? $user_profile['ProfilePhoto'] : '' ; ?>" accept="image/*"/>
										<input type="hidden" name="CheckProfilePhoto" class="CheckProfilePhoto" id="checkProfilePhoto" value="<?php echo (!empty($user_profile['ProfilePhoto'])) ? $user_profile['ProfilePhoto'] : '' ; ?>">
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
							<h4 class="title">Permanent Address Detail</h4>
						</div>
						<div class="card-content card-content-form">
							<div class="row">	
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Address Line1</label>
										<input type="text" name="AddressLine1" id="addressLine1" class="form-control AddressLine1" value="<?php echo (!empty($user_profile['AddressLine1'])) ? $user_profile['AddressLine1'] : ''; ?>">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Address Line2</label>
										<input type="text" name="AddressLine2" id="addressLine2" class="form-control AddressLine2" value="<?php echo (!empty($user_profile['AddressLine2'])) ? $user_profile['AddressLine2'] : ''; ?>">
									</div>
								</div>
							</div>
							<div class="row">	
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">City</label>
										<input type="text" name="City" id="city" class="form-control City" value="<?php echo (!empty($user_profile['City'])) ? $user_profile['City'] : ''; ?>">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">State</label>
										<input type="text" name="State" id="state" class="form-control State" value="<?php echo (!empty($user_profile['State'])) ? $user_profile['State'] : ''; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Pin Code</label>
										<input type="text" name="PinCode" id="pinCode" class="form-control PinCode" value="<?php echo (!empty($user_profile['PinCode'])) ? $user_profile['PinCode'] : ''; ?>">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Country</label>
										<input type="text" name="Country" id="country" class="form-control Country" value="<?php echo (!empty($user_profile['Country'])) ? $user_profile['Country'] : ''; ?>">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card card-multi-form" id="localAddress">
						<div class="card-header card-header-form bg-rose">
							<i class="material-icons">perm_identity</i>
						</div>
						<div class="card-header-text-form bg-rose">
							<h4 class="title">Communication Address Detail</h4>
						</div>
						<div class="card-content card-content-form">
							<div class="row">	
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
									<div class="form-group">
										<div class="form-check">
										  <label class="form-check-label">
											  <input class="form-check-input" name="CheckAddress" id="checkAddress" type="checkbox" value="<?php echo (!empty($user_profile['IsChecked'])) ? $user_profile['IsChecked'] : ''; ?>">
											  Same As Permanent Address (Please check this box, in case local address same as permanent address)
											  <span class="form-check-sign">
												<span class="check"></span>
											  </span>
										  </label>
										</div>
									  </div>
										
									</div>
								</div>
							<div class="row">	
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Address Line1</label>
										<input type="text" name="LocalAddressLine1" id="localAddressLine1" class="form-control LocalAddressLine1" value="<?php echo (!empty($user_profile['LocalAddressLine1'])) ? $user_profile['LocalAddressLine1'] : ''; ?>">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Address Line2</label>
										<input type="text" name="LocalAddressLine2" id="localAddressLine2" class="form-control LocalAddressLine2" value="<?php echo (!empty($user_profile['LocalAddressLine2'])) ? $user_profile['LocalAddressLine2'] : ''; ?>">
									</div>
								</div>
							</div>
							<div class="row">	
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">City</label>
										<input type="text" name="LocalCity" id="localCity" class="form-control LocalCity" value="<?php echo (!empty($user_profile['LocalCity'])) ? $user_profile['LocalCity'] : ''; ?>">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">State</label>
										<input type="text" name="LocalState" id="localState" class="form-control LocalState" value="<?php echo (!empty($user_profile['LocalState'])) ? $user_profile['LocalState'] : ''; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Pin Code</label>
										<input type="text" name="LocalPinCode" id="localPinCode" class="form-control LocalPinCode" value="<?php echo (!empty($user_profile['LocalPinCode'])) ? $user_profile['LocalPinCode'] : ''; ?>">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Country</label>
										<input type="text" name="LocalCountry" id="localCountry" class="form-control LocalCountry" value="<?php echo (!empty($user_profile['LocalCountry'])) ? $user_profile['LocalCountry'] : ''; ?>">
									</div>
								</div>
							</div>
					</div>
					</div>
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
<script src="<?php echo base_url('assets/validation/user_editProfile.js'); ?>"></script>

