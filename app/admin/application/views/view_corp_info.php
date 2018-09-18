<?php $this->load->view('header');
$this->uri->segment(2);
 ?>
<div class="content">
	<div class="row">
		<div class="col-md-3">
		  <div class="card card-profile">
		  <img class="img-responsive" src="http://localhost/LiveProjects/maayog1/admin/assets/img/faces/user.jpg">
			
		   <div class="myCard">
				<h6 class="card-category text-gray ContentStyle">
				<?php echo (!empty($corporate_data_byId['CompanyName'])) ? $corporate_data_byId['CompanyName'] : ''; ?></h6>
			</div>
		  </div>
		</div>
		<div class="col-md-9">
			<div class="card card-table">
				<div class="card-header card-header-table bg-rose">
					<i class="material-icons">perm_identity</i>
				</div>
				<div class="card-header-text-table bg-rose">
					<h4 class="title">Company Detail</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table text-gray TableData">
							<tbody  class="TableContentPad">
							<tr></tr>
							<tr>
								<th>Company Name</th>
								<td><?php echo (!empty($corporate_data_byId['CompanyName'])) ? $corporate_data_byId['CompanyName'] : '';?></td>
							</tr>
							<tr>
								<th>Phone Number</th>
								<td><?php echo (!empty($corporate_data_byId['CompanyPhone'])) ? $corporate_data_byId['CompanyPhone'] : ''; ?></td>
							</tr>
							<tr>
								<th>Email Address</th>
								<td><?php echo (!empty($corporate_data_byId['CompanyEmail'])) ? $corporate_data_byId['CompanyEmail'] : ''; ?></td>
							</tr>
							
							<tr>
								<th>FB Link</th>
								<td><?php echo (!empty($corporate_data_byId['FBLink'])) ? $corporate_data_byId['FBLink'] : ''; ?></td>
							</tr>
							<!--tr>
								<th>Map Link</th>
								<td><?php echo (!empty($corporate_data_byId['MapLink'])) ? $corporate_data_byId['MapLink'] : ''; ?></td>
							</tr>
							<tr>
								<th>Number of Users</th>
								<td><?php echo (!empty($corporate_data_byId[''])) ? $corporate_data_byId[''] : ''; ?></td>
							</tr-->
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
		  <div class="card card-table">
			<div class="card-header card-header-table bg-rose">
				<i class="material-icons">receipt</i>
			</div>
			<div class="card-header-text-table bg-rose">
				<h4 class="title">Address Detail</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table text-gray">
					<tbody  class="TableContentPad">
						<tr></tr>
						<tr>
							<th>City</th>
							<td><?php echo (!empty($corporate_data_byId['City'])) ? $corporate_data_byId['City'] : ''; ?></td>
						</tr>
						<tr>
							<th>State</th>
							<td><?php echo (!empty($corporate_data_byId['State'])) ? $corporate_data_byId['State'] : ''; ?></td>
						</tr>
						<tr>
							<th>Pin Code</th>
							<td><?php echo (!empty($corporate_data_byId['PinCode'])) ? $corporate_data_byId['PinCode'] : ''; ?></td>
						</tr>
						<tr>
							<th>Country</th>
							<td><?php echo (!empty($corporate_data_byId['Country'])) ? $corporate_data_byId['Country'] : ''; ?></td>
						</tr>
						<tr>
							<th>Address Detail</th>
							<td><?php echo (!empty($corporate_data_byId['AddressLine1'])) ? $corporate_data_byId['AddressLine1'] .' '.$corporate_data_byId['AddressLine2']: ''; ?></td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>	
		</div>
		<div class="col-md-6">
			<div class="card card-table">
				<div class="card-header card-header-table bg-rose">
					<i class="material-icons">receipt</i>
				</div>
				<div class="card-header-text-table bg-rose">
					<h4 class="title">Contact Person Detail</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table text-gray TableData">
							<tbody  class="TableContentPad">
							<tr></tr>
							<tr>
								<th>Name</th>
								<td><?php  echo (!empty($corporate_data_byId['ContactPersonFName'])) ? $corporate_data_byId['ContactPersonFName'].' '.$corporate_data_byId['ContactPersonLName'] : '';?></td>
							</tr>
							<tr>
								<th>Mobile Number</th>
								<td><?php echo (!empty($corporate_data_byId['ContactPersonMobile'])) ? $corporate_data_byId['ContactPersonMobile'] : ''; ?></td>
							</tr>
							<tr>
								<th>Land Line Number</th>
								<td><?php echo (!empty($corporate_data_byId['ContactPersonMobile'])) ? $corporate_data_byId['ContactPersonMobile'] : ''; ?></td>
							</tr>
							<tr>
								<th>Email Address</th>
								<td><?php echo (!empty($corporate_data_byId['ContactPersonEmail'])) ? $corporate_data_byId['ContactPersonEmail'] : ''; ?></td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
<?php $this->load->view('footer'); ?>
<script>
$(document).ready(function(){
	$('.sidebar-wrapper').find('.nav li').removeClass('active');
	$('.sidebar-wrapper').find('.nav li.CorpUserManagement').addClass('active');
});
</script>