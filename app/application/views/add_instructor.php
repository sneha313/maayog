<?php $this->load->view('header'); ?>

<div class="content">
	<div class="row multi-card">
		<div class="multi-card">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
				<form id="addInstruc" action="<?php echo base_url('Admin/insert_instructor'); ?>" method="POST" enctype="multipart/form-data">
					<div class="card card-multi-form">
						<div class="card-header card-header-form bg-rose">
							<i class="material-icons">perm_identity</i>
						</div>
						<div class="card-header-text-form bg-rose">
							<h4 class="title">Add Instructor</h4>
						</div>
						<div class="card-content card-content-form">
						<div class="row">
						<div class="col-xs-12 col-sm-12  col-md-8 col-lg-9 col-xl-9">
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">First Name</label>
										<input type="text" name="InstrucFName" class="form-control InstrucFName">
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Last Name</label>
										<input type="text" name="InstrucLName" class="form-control InstrucLName">
									</div>
								</div>
								<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Mobile</label>
										<input type="text" name="InstrucMobile" class="form-control InstrucMobile">
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Email</label>
										<input type="text" name="InstrucEmail" class="form-control InstrucEmail">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Gender</label>
										<input type="text" name="InstrucGender" class="form-control InstrucGender">
									</div>
								</div>
								</div>
								
							</div>
						</div>
						<div class="col-xs-12 col-sm-12  col-md-4 col-lg-3 col-xl-3">
									<div class="row">
										<div id="image-preview">
											<!--img src="<?php echo  base_url('assets/img/faces/placeholder.jpg')?>" /-->
										  <label for="image-upload" id="image-label">Add Image</label>
										  <input type="file" name="InstrucPhoto" id="image-upload" />
										</div>
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
							<h4 class="title">Professional Detail</h4>
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
										<label class="control-label">Company Name</label>
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
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">State</label>
									<input type="text" name="InstructorState" class="form-control InstructorState">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Pin Code</label>
									<input type="text" name="InstructorPinCode" class="form-control InstructorPinCode">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Country</label>
									<input type="text" name="InstructorCountry" class="form-control InstructorCountry">
								</div>
							</div>
						</div>
						   <div class="row">	
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Same as Permanent Address</label>
										<input type="checbox" name="SameLocPermAddress" class="form-control SameLocPermAddress">
									</div>
								</div>
							</div>
							<div class="row">	
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Address Line1</label>
										<input type="text" name="LocAddressLine1" class="form-control LocAddressLine1">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Address Line2</label>
										<input type="text" name="LocAddressLine2" class="form-control LocAddressLine2">
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
									<input type="text" name="InstructorAddressLine1" class="form-control InstructorAddressLine1">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Address Line2</label>
									<input type="text" name="InstructorAddressLine2" class="form-control InstructorAddressLine2">
								</div>
							</div>
						</div>
						<div class="row">	
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">City</label>
									<input type="text" name="InstructorCity" class="form-control InstructorCity">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">State</label>
									<input type="text" name="InstructorState" class="form-control InstructorState">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Pin Code</label>
									<input type="text" name="InstructorPinCode" class="form-control InstructorPinCode">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Country</label>
									<input type="text" name="InstructorCountry" class="form-control InstructorCountry">
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
									<div class="form-group label-floating">
										<label class="control-label">Same as Permanent Address</label>
										<input type="checbox" name="SameLocPermAddress" class="form-control SameLocPermAddress">
									</div>
								</div>
							</div>
							<div class="row">	
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Address Line1</label>
										<input type="text" name="LocAddressLine1" class="form-control LocAddressLine1">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Address Line2</label>
										<input type="text" name="LocAddressLine2" class="form-control LocAddressLine2">
									</div>
								</div>
							</div>
							<div class="row">	
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">City</label>
										<input type="text" name="LocCity" class="form-control LocCity">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">State</label>
										<input type="text" name="LocState" class="form-control LocState">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Pin Code</label>
										<input type="text" name="LocPinCode" class="form-control LocPinCode">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Country</label>
										<input type="text" name="LocCountry" class="form-control LocCountry">
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
							<h4 class="title">Contact person Detail</h4>
						</div>
						<div class="card-content card-content-form">
							
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">First Name</label>
									<input type="text" name="InstrucContactPersonFName" class="form-control InstrucContactPersonFName">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Last Name</label>
									<input type="text" name="InstrucContactPersonLName" class="form-control InstrucContactPersonLName">
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Email Address</label>
									<input type="text" name="InstrucContactPersonEmail" class="form-control InstrucContactPersonEmail">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Phone Number</label>
									<input type="text" name="ContactPersonMobile" class="form-control ContactPersonMobile">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Land Line Number</label>
									<input type="text" name="InstrucContactPersonLandLine" class="form-control InstrucContactPersonLandLine">
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
<script src="<?php echo base_url('assets/validation/add_instructor.js'); ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
  $.uploadPreview({
    input_field: "#image-upload",   // Default: .image-upload
    preview_box: "#image-preview",  // Default: .image-preview
    label_field: "#image-label",    // Default: .image-label
    label_default: "Choose File",   // Default: Choose File
    label_selected: "Change File",  // Default: Change File
    no_label: false                 // Default: false
  });
});
</script>
