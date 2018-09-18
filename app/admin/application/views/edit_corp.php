<?php $this->load->view('header');
$Id = $this->uri->segment(2);
 ?>

<div class="content">
	<div class="row multi-card">
		<div class="multi-card">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
				<form id="editcorp" action="<?php echo base_url('Admin/get_editCorp/'.$Id); ?>" method="POST" enctype="multipart/form-data">
					<div class="card card-multi-form">
						<div class="card-header card-header-form bg-rose">
							<i class="material-icons">perm_identity</i>
						</div>
						<div class="card-header-text-form bg-rose">
							<h4 class="title">Edit Corporate Detail</h4>
						</div>
						<div class="card-content card-content-form">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Company Name</label>
										<input type="text" name="CompanyName" class="form-control CompanyName" value="<?php echo (!empty($edit_corp_data_byId['CompanyName'])) ? $edit_corp_data_byId['CompanyName'] : ''; ?>">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Company Email</label>
										<input type="text" name="CompanyEmail" class="form-control CompanyEmail" value="<?php echo (!empty($edit_corp_data_byId['CompanyEmail'])) ? $edit_corp_data_byId['CompanyEmail'] : ''; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">GST Number</label>
										<input type="text" name="GSTNumber" class="form-control GSTNumber" value="<?php echo (!empty($edit_corp_data_byId['GSTNumber'])) ? $edit_corp_data_byId['GSTNumber'] : ''; ?>">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Company Phone</label>
										<input type="text" name="CompanyPhone" class="form-control CompanyPhone" value="<?php echo (!empty($edit_corp_data_byId['CompanyPhone'])) ? $edit_corp_data_byId['CompanyPhone'] : ''; ?>">
									</div>
								</div>
								
							</div>
							<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
										<div class="form-group label-floating">
											<label class="control-label">Facebook Page Link</label>
											<input type="text" name="FBLink" class="form-control FBLink" value="<?php echo (!empty($edit_corp_data_byId['FBLink'])) ? $edit_corp_data_byId['FBLink'] : ''; ?>">
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
										<div class="form-group label-floating">
											<label class="control-label">Map Link</label>
											<input type="text" name="MapLink" class="form-control MapLink" value="<?php echo (!empty($edit_corp_data_byId['MapLink'])) ? $edit_corp_data_byId['MapLink'] : ''; ?>">
										</div>
									</div>
								</div>
							<!--div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Photo Upload</label>
										<input type="text" name="PhotoUpload" class="form-control PhotoUpload" value="<?php echo (!empty($edit_corp_data_byId['PhotoUpload'])) ? $edit_corp_data_byId['PhotoUpload'] : ''; ?>">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
										<label class="control-label">Logo Upload</label>
										<input type="text" name="LogoUpload" class="form-control LogoUpload" value="<?php echo (!empty($edit_corp_data_byId['LogoUpload'])) ? $edit_corp_data_byId['LogoUpload'] : ''; ?>">
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
									<input type="text" name="AddressLine1" class="form-control AddressLine1" value="<?php echo (!empty($edit_corp_data_byId['AddressLine1'])) ? $edit_corp_data_byId['AddressLine1'] : ''; ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Address Line2</label>
									<input type="text" name="AddressLine2" class="form-control AddressLine2" value="<?php echo (!empty($edit_corp_data_byId['AddressLine2'])) ? $edit_corp_data_byId['AddressLine2'] : ''; ?>">
								</div>
							</div>
						</div>
						<div class="row">	
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">City</label>
									<input type="text" name="City" class="form-control City" value="<?php echo (!empty($edit_corp_data_byId['City'])) ? $edit_corp_data_byId['City'] : ''; ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">State</label>
									<input type="text" name="State" class="form-control State" value="<?php echo (!empty($edit_corp_data_byId['State'])) ? $edit_corp_data_byId['State'] : ''; ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Pin Code</label>
									<input type="text" name="PinCode" class="form-control PinCode" value="<?php echo (!empty($edit_corp_data_byId['PinCode'])) ? $edit_corp_data_byId['PinCode'] : ''; ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Country</label>
									<input type="text" name="Country" class="form-control Country" value="<?php echo (!empty($edit_corp_data_byId['Country'])) ? $edit_corp_data_byId['Country'] : ''; ?>">
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
									<input type="text" name="ContactPersonFName" class="form-control ContactPersonFName" value="<?php echo (!empty($edit_corp_data_byId['ContactPersonFName'])) ? $edit_corp_data_byId['ContactPersonFName'] : ''; ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Last Name</label>
									<input type="text" name="ContactPersonLName" class="form-control ContactPersonLName" value="<?php echo (!empty($edit_corp_data_byId['ContactPersonLName'])) ? $edit_corp_data_byId['ContactPersonLName'] : ''; ?>">
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Email Address</label>
									<input type="text" name="ContactPersonEmail" class="form-control ContactPersonEmail" value="<?php echo (!empty($edit_corp_data_byId['ContactPersonEmail'])) ? $edit_corp_data_byId['ContactPersonEmail'] : ''; ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Phone Number</label>
									<input type="text" name="ContactPersonMobile" class="form-control ContactPersonMobile" value="<?php echo (!empty($edit_corp_data_byId['ContactPersonMobile'])) ? $edit_corp_data_byId['ContactPersonMobile'] : ''; ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Land Line Number</label>
									<input type="text" name="ContactPersonLandLine" class="form-control ContactPersonLandLine" value="<?php echo (!empty($edit_corp_data_byId['ContactPersonLandLine'])) ? $edit_corp_data_byId['ContactPersonLandLine'] : ''; ?>">
								</div>
							</div>
						</div>
					</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-2 col-md-3 col-lg-2 col-xl-2  col-xs-offset-0  col-sm-offset-8  col-md-offset-6  col-lg-offset-8 col-xl-offset-8">
							<button type="submit" class="btn btn-info InfoBtn Submit btn-block pull-right-mar-10 mar-top-25px">Submit</button>
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
<script src="<?php echo base_url('assets/validation/edit_corp.js'); ?>"></script>
