<?php
	$this->load->view('header');
	$Id = $this->uri->segment(2);
 ?>

<div class="content">
	<div class="row multi-card">
		<div class="multi-card">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
				<form id="editUserProfile" action="<?php echo base_url('Admin/get_editIndUser/'.$Id); ?>" method="POST" enctype="multipart/form-data">
					<div class="card card-multi-form">
						<div class="card-header card-header-form bg-rose">
							<i class="material-icons">perm_identity</i>
						</div>
						<div class="card-header-text-form bg-rose">
							<h4 class="title">Edit User Profile</h4>
						</div>
						<div class="card-content card-content-form">
							
							<div class="row">
								<div class="col-xs-12 col-sm-12  col-md-6 col-lg-6 col-xl-6">	
									<div class="form-group label-floating">
										<label class="control-label">First Name</label>
										<input type="text" name="FirstName" class="form-control FirstName">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Last Name</label>
										<input type="text" name="LastName" class="form-control LastName">
									</div>
								</div>
							</div>
							<div class="row">
							<div class="col-xs-12 col-sm-12  col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label" for="EmailAddress">Email Id</label>
									<input type="text" name="EmailAddress" id="EmailAddress" class="form-control EmailAddress">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12  col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Contact Number</label>
									<input type="text" name="MobileNumber" class="form-control MobileNumber">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating " >
									<label class="control-label">Date of Birth</label>
									<div class="input-group DateOfBirth">
										<input type="text" name="DOB"  class="form-control" id="dob" >
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
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
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label" for="healthCondition">Choose Health Condition</label>
									<select class="form-control HealthCondition" id="healthCondition" name="HealthCondition">
									  <option value=""></option>
									  <option value="noConcern">No Concern</option>
									  <option value="concern">Have a Concern</option>
									</select>
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 HealthProblem"  id="healthProblem" style="display:none;">
								<div class="form-group label-floating">
									<label class="control-label" for="healthProblem">choose Health Problem</label>
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
									<input type="text" name="AddressLine1" class="form-control AddressLine1">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Address Line2</label>
									<input type="text" name="AddressLine2" class="form-control AddressLine2">
								</div>
							</div>
						</div>
						<div class="row">	
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">City</label>
									<input type="text" name="City" class="form-control City">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">State</label>
									<input type="text" name="State" class="form-control State">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Pin Code</label>
									<input type="text" name="PinCode" class="form-control PinCode">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Country</label>
									<input type="text" name="Country" class="form-control Country">
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
<script src="<?php echo base_url('assets/validation/user_profile.js'); ?>"></script>
