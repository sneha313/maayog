<?php $this->load->view('header'); 
$Id = $this->uri->segment(2);
?>
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
				<form id="editInstruc" action="<?php echo base_url('Admin/editInstructor/'.$Id); ?>" method="POST" enctype="multipart/form-data">
					<div class="card card-multi-form">
						<div class="card-header card-header-form bg-rose">
							<i class="material-icons">perm_identity</i>
						</div>
						<div class="card-header-text-form bg-rose">
							<h4 class="title">Edit Instructor
							<small> - Personal Information</small>
							</h4>
							
						</div>
						<div class="card-content card-content-form">
							<div class="row">
								<div class="col-xs-12 col-sm-12  col-md-8 col-lg-9 col-xl-9">
									<div class="row">
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
											<div class="form-group label-floating">
												<label class="control-label">First Name</label>
												<input type="text" name="InstrucFName" class="form-control InstrucFName" value="<?php echo (!empty($edit_Instructor_data_byId['InstrucFName'])) ? $edit_Instructor_data_byId['InstrucFName'] : ''; ?>">
											</div>
										</div>
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
											<div class="form-group label-floating">
												<label class="control-label">Last Name</label>
												<input type="text" name="InstrucLName" class="form-control InstrucLName" value="<?php echo (!empty($edit_Instructor_data_byId['InstrucLName'])) ? $edit_Instructor_data_byId['InstrucLName'] : ''; ?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
										<div class="form-group label-floating">
											<label class="control-label">Mobile</label>
											<input type="text" name="InstrucMobile" class="form-control InstrucMobile" value="<?php 
											echo (!empty($edit_Instructor_data_byId['InstrucMobile'])) ? $edit_Instructor_data_byId['InstrucMobile'] : ''; ?>">
										</div>
									</div>
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
										<div class="form-group label-floating">
											<label class="control-label">Email</label>
											<input type="text" name="InstrucEmail" class="form-control InstrucEmail" value="<?php echo (!empty($edit_Instructor_data_byId['InstrucEmail'])) ? $edit_Instructor_data_byId['InstrucEmail'] : ''; ?>">
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
													<?php $date = (!empty($edit_Instructor_data_byId['DateOfBirth'])) ? $edit_Instructor_data_byId['DateOfBirth'] : ''; ?>
												<div class="DateofBirth">
													<input type="text" id="dob" data-format="DD-MM-YYYY" data-template="D MMM YYYY" name="DOB" value="<?php echo date('d-m-Y', strtotime($date)); ?>">
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
											<div class="form-group label-floating">
												<label class="control-label">Gender</label>
												<!--input type="text" name="InstrucGender" class="form-control InstrucGender"-->
												<select class="form-control Gender" id="instrucGender" name="InstrucGender">
													<option value=""></option>
													<option value="Male" <?php echo ($edit_Instructor_data_byId['InstrucGender'] == 'Male') ? 'selected': ''; ?>>Male</option>
													<option value="Female"<?php echo ($edit_Instructor_data_byId['InstrucGender'] == 'Female') ? 'selected': ''; ?>>Female</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12  col-md-4 col-lg-3 col-xl-3">
									<div class="row">
										<div id="image-preview" <?php echo (!empty($edit_Instructor_data_byId['ProfilePhoto'])) ?  'style ="background-image: url('.base_url($edit_Instructor_data_byId['ProfilePhoto']).')"' : 'style ="background-image: url('.base_url('assets/img/faces/placeholder.jpg').')"'; ?>>
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
							<h4 class="title">Professional Information</h4>
						</div>
						<div class="card-content card-content-form">
						
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Profession</label>
										<input type="text" name="InstructorProfession" class="form-control InstructorProfession">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Organization Name</label>
										<input type="text" name="InstructorWorking" class="form-control InstructorWorking">
									</div>
								</div>
							</div>
							<div class="row">	
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Designation</label>
										<input type="text" name="InstructorDesignation" class="form-control InstructorDesignation">
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
										<input type="text" name="AddressLine1" id="addressLine1" class="form-control AddressLine1">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Address Line2</label>
										<input type="text" name="AddressLine2"  id="addressLine2" class="form-control AddressLine2">
									</div>
								</div>
							</div>
							<div class="row">	
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">City</label>
										<input type="text" name="City" id="city" class="form-control City">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">State</label>
										<input type="text" name="State" id="state" class="form-control State">
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Pin Code</label>
										<input type="text" name="PinCode" id="pinCode" class="form-control PinCode">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Country</label>
										<input type="text" name="Country"  id="country" class="form-control Country">
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
										<input type="text" name="LocalAddressLine1" id="localAddressLine1" class="form-control LocalAddressLine1">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Address Line2</label>
										<input type="text" name="LocalAddressLine2" id="localAddressLine2" class="form-control LocalAddressLine2">
									</div>
								</div>
							</div>
							<div class="row">	
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">City</label>
										<input type="text" name="LocalCity" id="localCity" class="form-control LocalCity">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">State</label>
										<input type="text" name="LocalState" id="localState" class="form-control LocalState">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Pin Code</label>
										<input type="text" name="LocalPinCode" id="localPinCode" class="form-control LocalPinCode">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Country</label>
										<input type="text" name="LocalCountry" id="localCountry" class="form-control LocalCountry">
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
<script src="<?php echo base_url('assets/validation/edit_instructor.js'); ?>"></script>

