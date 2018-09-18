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
				<form id="addIndUser" action="<?php echo base_url('Admin/insert_ind_user'); ?>" method="POST" enctype="multipart/form-data">
					<div class="card card-multi-form">
						<div class="card-header card-header-form bg-rose">
							<i class="material-icons">perm_identity</i>
						</div>
						<div class="card-header-text-form bg-rose">
							<h4 class="title">Add User</h4>
						</div>
						<div class="card-content card-content-form">
							<div class="row">
								<div class="col-xs-12 col-sm-12  col-md-8 col-lg-9 col-xl-9">
									<div class="row">
										<div class="col-xs-12 col-sm-6  col-md-6 col-lg-6 col-xl-6">
											<div class="form-group label-floating">
												<label class="control-label">First Name</label>
												<input type="text" name="FirstName" class="form-control FirstName" value="">
											</div>
										</div>
										<div class="col-xs-12 col-sm-6  col-md-6 col-lg-6 col-xl-6">
											<div class="form-group label-floating">
												<label class="control-label">Last Name</label>
												<input type="text" name="LastName" class="form-control LastName" value="">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-6  col-md-6 col-lg-6 col-xl-6">
											<div class="form-group label-floating">
												<label class="control-label" for="EmailAddress">Email Id</label>
												<input type="text" name="EmailAddress" id="EmailAddress" class="form-control EmailAddress" value="">
											</div>
										</div>
										<div class="col-xs-12 col-sm-6  col-md-6 col-lg-6 col-xl-6">
											<div class="form-group label-floating">
												<label class="control-label">Contact Number</label>
												<input type="text" name="MobileNumber" class="form-control MobileNumber" value="">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-6  col-md-6 col-lg-6 col-xl-6">
											<div class="form-group label-floating">
												<label class="control-label">Date of Birth</label>
												<!--div class="input-group DateOfBirth"-->
													<!--input type="text" name="DOB"  class="form-control" id="dob" >
													<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span-->
													<div class="DateofBirth">
														<input type="text" id="dob" data-format="DD-MM-YYYY" data-template="D MMM YYYY" name="DOB" value="">
													</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
											<div class="form-group label-floating">
											<label class="control-label ">Gender</label>
												<select class="form-control Gender" id="gender" name="Gender">
												  <option value=""></option>
												  <option value="Male">Male</option>
												  <option value="Female">Female</option>
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
												  <option value="noConcern">No Concern</option>
												  <option value="concern">Have a Concern</option>
												</select>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 HealthProblem"  id="healthProblem" style="display:none;">
											<div class="form-group label-floating">
												<label class="control-label" for="healthProblem">Choose Health Problem</label>
												<select class="form-control HealthProblem" name="HealthProblem" id="healthProblem">
												  <option value=""></option>
													<?php
												  if(!empty($health_problem)){
													foreach($health_problem as $key => $data){
													?>
													<option value="<?php echo $data['HealthId']; ?>"><?php echo $data['HealthProblemName'];?></option>
												  <?php } }?>
												</select>
												
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
											<div class="form-group label-floating">
												<label class="control-label" for="healthCondition">Aadhar Number</label>
												<input type="text" name="AadharNumber" id="aadharNumber" class="form-control AadharNumber" value="">
											</div>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12  col-md-4 col-lg-3 col-xl-3">
									<div class="row">
										<div id="image-preview" style="background-image: url(<?php echo base_url('assets/img/faces/placeholder.jpg')?>)">
										  <label for="image-upload" id="image-label">Add Image</label>
										  <input type="file" name="ProfilePhoto" id="image-upload" />
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
										<select class="form-control UserType" id="userType" name="UserType">
										  <option value=""></option>
										  <!--option value="Individual">Individual</option>
										  <option value="Corporate">Corporate</option-->
										  <?php
											  if(!empty($user_type)){
												foreach($user_type as $key => $data){
										?>
										<option value="<?php echo $data['TypeId']; ?>"><?php echo $data['TypeName']; ?></option>
											  <?php } }?>
										</select>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 CorporateTypeDiv" style="display:none;" id="corporateTypeDiv">
									<div class="form-group label-floating">
									<label class="control-label ">Choose Corporate</label>
										<select class="form-control CorporateType" id="corporateType" name="CorporateType">
										  <option value=""></option>
										   <?php
										  if(!empty($corp_name)){
											foreach($corp_name as $key => $data){
											?>
											<option value="<?php echo $data['CorpId']; ?>"><?php echo $data['CompanyName']?></option>

										  <?php } }?>
										</select>
									</div>
								</div>
							</div>	
							<div class="row AssignClassTimeDiv" id="assignClassTimeDiv"style="display:none;">
								<div class="col-xs-12 col-sm-12  col-md-6 col-lg-6 col-xl-6 AssignClassName"  id="assignClassNameDiv" >
									<div class="form-group label-floating">
										<label class="control-label">Choose Class Name</label>
										<select class="form-control ClassName" id="className" name="ClassName">
										  <option value=""></option>
										</select>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<!--label class="control-label">Batch Duration</label-->
										<input type="text" name="TimeSlot" id="timeSlot" class="form-control TimeSlot" value="" readonly>
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
							<h4 class="title">Postal Address Detail</h4>
						</div>
						<div class="card-content card-content-form">
							<div class="row">	
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Address Line1</label>
										<input type="text" name="AddressLine1" id="addressLine1" class="form-control AddressLine1" value="">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Address Line2</label>
										<input type="text" name="AddressLine2" id="addressLine2" class="form-control AddressLine2" value="">
									</div>
								</div>
							</div>
							<div class="row">	
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">City</label>
										<input type="text" name="City" id="city" class="form-control City" value="">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">State</label>
										<input type="text" name="State" id="state" class="form-control State" value="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Pin Code</label>
										<input type="text" name="PinCode"  id="pinCode" class="form-control PinCode" value="">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Country</label>
										<input type="text" name="Country" id="country" class="form-control Country" value="">
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
							<h4 class="title">Local Address Detail</h4>
						</div>
						<div class="card-content card-content-form">
							<div class="row">	
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<div class="form-check">
										  <label class="form-check-label">
											  <input class="form-check-input" name="IsChecked" id="checkboxAddress" type="checkbox" value="1">
											  Same As Permanent Address
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
										<input type="text" name="LocalAddressLine1" id="localAddressLine1" class="form-control LocalAddressLine1" value="">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Address Line2</label>
										<input type="text" name="LocalAddressLine2" id="localAddressLine2" class="form-control LocalAddressLine2" value="">
									</div>
								</div>
							</div>
							<div class="row">	
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">City</label>
										<input type="text" name="LocalCity" id="localCity" class="form-control LocalCity" value="">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">State</label>
										<input type="text" name="LocalState" id="localState" class="form-control LocalState" value="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Pin Code</label>
										<input type="text" name="LocalPinCode" id="localPinCode" class="form-control LocalPinCode" value="">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Country</label>
										<input type="text" name="LocalCountry" id="localCountry" class="form-control LocalCountry" value="">
									</div>
								</div>
							</div>
					</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-2 col-md-3 col-lg-2 col-xl-2  col-xs-offset-0  col-sm-offset-8  col-md-offset-6  col-lg-offset-8 col-xl-offset-8">
							<button type="submit" class="btn btn-info InfoBtn btn-block Submit pull-right-mar-10 mar-top-25px">Submit</button>
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
<script src="<?php echo base_url('assets/validation/add_ind_user.js'); ?>"></script>

