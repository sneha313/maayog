<?php $this->load->view('header');
$this->uri->segment(2);
 ?>
<div class="content">
  <div class="row">
	<div class="col-md-4">
      <div class="card card-profile">
          <img class="img-responsive" src="<?php echo (!empty($users_data_byId['ProfilePhoto'])) ? base_url($users_data_byId['ProfilePhoto']) : base_url('assets/img/faces/placeholder.jpg'); ?>">
       <div class="myCard">
			<h6 class="card-category text-gray ContentStyle">
			<?php echo (!empty($users_data_byId['FirstName'])) ? $users_data_byId['FirstName'].' '.$users_data_byId['LastName'] : ''; ?></h6>
		</div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-table">
		<div class="card-header card-header-table bg-rose">
			<i class="material-icons">perm_identity</i>
		</div>
		<div class="card-header-text-table bg-rose">
			<h4 class="title">Personal Detail</h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table text-gray">
					<tbody class="TableContentPad">
					<tr></tr>
					<tr>
						<th>User Type</th>
						<td><?php echo (!empty($users_data_byId['UserType'])) ? $users_data_byId['UserType'] : '';?></td>
					</tr>
					<tr>
						<th>Mobile Number</th>
						<td><?php echo (!empty($users_data_byId['MobileNumber'])) ? $users_data_byId['MobileNumber'] : ''; ?></td>
					</tr>
					<tr>
						<th>Email Address</th>
						<td><?php echo (!empty($users_data_byId['EmailAddress'])) ? $users_data_byId['EmailAddress'] : ''; ?></td>
					</tr>
					<tr>
						<th>Aadhar Number</th>
						<td><?php echo (!empty($users_data_byId['AadharNumber'])) ? $users_data_byId['AadharNumber'] : ''; ?></td>
					</tr>
					<tr>
						<th>Class Name</th>
						<td><?php echo (!empty($users_data_byId['BatchName'])) ? $users_data_byId['BatchName'] : ''; ?></td>
					</tr>
					<tr>
						<th>Class Time</th>
						<td><?php echo (!empty($users_data_byId['HealthProblem'])) ? $users_data_byId['HealthProblem'] : ''; ?></td>
					</tr>
					<tr>
						<th>Health Condition</th>
						<td><?php echo (!empty($users_data_byId['HealthCondition'])) ? $users_data_byId['HealthCondition'] : ''; ?></td>
					</tr>
					<tr>
						<th>Health Problem</th>
						<td><?php echo (!empty($users_data_byId['HealthProblem'])) ? $users_data_byId['HealthProblem'] : ''; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
    </div>
	<div class="col-md-4">
      <div class="card card-table">
		<div class="card-header card-header-table bg-rose">
			<i class="material-icons">receipt</i>
		</div>
		<div class="card-header-text-table bg-rose">
			<h4 class="title">Address Detail</h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table text-gray TableData">
					<tbody class="TableContentPad">
					<tr></tr>
					<tr>
						<th>Address Line1</th>
						<td><?php echo (!empty($users_data_byId['AddressLine1'])) ? $users_data_byId['AddressLine1'] : ''; ?></td>
					</tr>
					<tr>
						<th>Address Line2</th>
						<td><?php echo (!empty($users_data_byId['AddressLine2'])) ? $users_data_byId['AddressLine2'] : ''; ?></td>
					</tr>
					<tr>
						<th>City</th>
						<td><?php echo (!empty($users_data_byId['City'])) ? $users_data_byId['City'] : ''; ?></td>
					</tr>
					<tr>
						<th>State</th>
						<td><?php echo (!empty($users_data_byId['State'])) ? $users_data_byId['State'] : ''; ?></td>
					</tr>
					<tr>
						<th>Pin Code</th>
						<td><?php echo (!empty($users_data_byId['PinCode'])) ? $users_data_byId['PinCode'] : ''; ?></td>
					</tr>
					<tr>
						<th>Country</th>
						<td><?php echo (!empty($users_data_byId['Country'])) ? $users_data_byId['Country'] : ''; ?></td>
					</tr>
					</tbody>
					</tbody>
				</table>
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
	$('.sidebar-wrapper').find('.nav li.IndUserManagement').addClass('active');
});
</script>