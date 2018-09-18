<?php $this->load->view('header'); ?>
<div class="content">
	<div class="row multi-card">
		<div class="multi-card">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
				<form id="addCorp" action="<?php echo base_url('Admin/insert_newCorp'); ?>" method="POST" enctype="multipart/form-data">
					<div class="card card-multi-form">
						<div class="card-header card-header-form bg-rose">
							<i class="material-icons">perm_identity</i>
						</div>
						<div class="card-header-text-form bg-rose">
							<h4 class="title">Add Corporate</h4>
						</div>
						<div class="card-content card-content-form">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Company Name</label>
										<input type="text" name="CompanyName" class="form-control CompanyName">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Company Email</label>
										<input type="text" name="CompanyEmail" class="form-control CompanyEmail">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">GST Number</label>
										<input type="text" name="GSTNumber" class="form-control GSTNumber">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Company Phone</label>
										<input type="text" name="CompanyPhone" class="form-control CompanyPhone">
									</div>
								</div>
								
							</div>
							<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
										<div class="form-group label-floating">
											<label class="control-label">Facebook Page Link</label>
											<input type="text" name="FBLink" class="form-control FBLink">
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
										<div class="form-group label-floating">
											<label class="control-label">Map Link</label>
											<div class="input-group DateOfBirth">
												<input type="text" name="MapLink"  class="form-control MapLink" id="mapLink" >
												<span class="input-group-addon add-on">
													<i class="fa fa-map-marker fa fa-2x" aria-hidden="true"></i>
												</span>
											</div>
										</div>
										<!--Google map-->
										<!--div id="map-container" class="z-depth-1" style="height: 500px"></div>
										 [ . . . ]-->

									</div>
								</div>
							<!--div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Photo Upload</label>
										<input type="text" name="PhotoUpload" class="form-control PhotoUpload">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Logo Upload</label>
										<input type="text" name="LogoUpload" class="form-control LogoUpload">
									</div>
								</div>
								</div-->
							</div>
						</div>
					<div class="card card-multi-form">
						<div class="card-header card-header-form bg-rose">
							<i class="material-icons">perm_identity</i>
						</div>
						<div class="card-header-text-form bg-rose">
							<h4 class="title">Postal Address</h4>
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
						<!--
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
							</div>-->
							
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
									<input type="text" name="ContactPersonFName" class="form-control ContactPersonFName">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Last Name</label>
									<input type="text" name="ContactPersonLName" class="form-control ContactPersonLName">
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Email Address</label>
									<input type="text" name="ContactPersonEmail" class="form-control ContactPersonEmail">
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
									<input type="text" name="ContactPersonLandLine" class="form-control ContactPersonLandLine">
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
<script src="<?php echo base_url('assets/validation/add_corp.js'); ?>"></script>
