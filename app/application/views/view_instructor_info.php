<?php $this->load->view('header');
$this->uri->segment(2);
 ?>
<div class="content">
	<div class="row">
		<div class="col-md-3">
		  <div class="card card-profile">
		  <img class="img-responsive" src="http://localhost/LiveProjects/maayog1/admin/assets/img/faces/user.jpg">
			  <!--img class="img-responsive" src="<?php echo (!empty($instructor_info_byId['InstrucPhoto'])) ? $instructor_info_byId['InstrucPhoto']: ''; ?>" /-->
		   <div class="myCard">
				<h6 class="card-category text-gray ContentStyle">
				<?php echo (!empty($instructor_info_byId['InstrucFName'])) ? $instructor_info_byId['InstrucFName'].' '. $instructor_info_byId['InstrucLName']: ''; ?></h6>
			</div>
		  </div>
		</div>
		<div class="col-md-9">
			<div class="card card-table">
				<div class="card-header card-header-table bg-rose">
					<i class="material-icons">perm_identity</i>
				</div>
				<div class="card-header-text-table bg-rose">
					<h4 class="title">Instructor Detail</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table text-gray">
							<tbody  class="TableContentPad">
							<tr></tr>
							<tr>
								<th>Instructor Name</th>
								<td><?php echo (!empty($instructor_info_byId['InstrucFName'])) ? $instructor_info_byId['InstrucFName'].' '. $instructor_info_byId['InstrucLName']: ''; ?></td>
							</tr>
							<tr>
								<th>Phone Number</th>
								<td><?php echo (!empty($instructor_info_byId['InstrucMobile'])) ? $instructor_info_byId['InstrucMobile'] : ''; ?></td>
							</tr>
							<tr>
								<th>Email Address</th>
								<td><?php echo (!empty($instructor_info_byId['InstrucEmail'])) ? $instructor_info_byId['InstrucEmail'] : ''; ?></td>
							</tr>
							
							<tr>
								<th>Gender</th>
								<td><?php echo (!empty($instructor_info_byId['InstrucGender'])) ? $instructor_info_byId['InstrucGender'] : ''; ?></td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--div class="row">
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
						<tbody class="TableContentPad">
						<tr></tr>
						<tr>
							<th>City</th>
							<td><?php echo (!empty($instructor_info_byId['City'])) ? $instructor_info_byId['City'] : ''; ?></td>
						</tr>
						<tr>
							<th>State</th>
							<td><?php echo (!empty($instructor_info_byId['State'])) ? $instructor_info_byId['State'] : ''; ?></td>
						</tr>
						<tr>
							<th>Pin Code</th>
							<td><?php echo (!empty($instructor_info_byId['PinCode'])) ? $instructor_info_byId['PinCode'] : ''; ?></td>
						</tr>
						<tr>
							<th>Country</th>
							<td><?php echo (!empty($instructor_info_byId['Country'])) ? $instructor_info_byId['Country'] : ''; ?></td>
						</tr>
						<tr>
							<th>Address Detail</th>
							<td><?php echo (!empty($instructor_info_byId['AddressLine1'])) ? $instructor_info_byId['AddressLine1'] .' '.$instructor_info_byId['AddressLine2']: ''; ?></td>
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
						<table class="table text-gray">
							<tbody  class="TableContentPad">
							<tr></tr>
							<tr>
								<th>Name</th>
								<td><?php  echo (!empty($instructor_info_byId['ContactPersonFName'])) ? $instructor_info_byId['ContactPersonFName'].' '.$instructor_info_byId['ContactPersonLName'] : '';?></td>
							</tr>
							<tr>
								<th>Mobile Number</th>
								<td><?php echo (!empty($instructor_info_byId['ContactPersonMobile'])) ? $instructor_info_byId['ContactPersonMobile'] : ''; ?></td>
							</tr>
							<tr>
								<th>Land Line Number</th>
								<td><?php echo (!empty($instructor_info_byId['ContactPersonMobile'])) ? $instructor_info_byId['ContactPersonMobile'] : ''; ?></td>
							</tr>
							<tr>
								<th>Email Address</th>
								<td><?php echo (!empty($instructor_info_byId['ContactPersonEmail'])) ? $instructor_info_byId['ContactPersonEmail'] : ''; ?></td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div-->
	</div>

<?php $this->load->view('footer'); ?>
<script>
$(document).ready(function(){
	$('.sidebar-wrapper').find('.nav li').removeClass('active');
	$('.sidebar-wrapper').find('.nav li.InstructorManagement').addClass('active');
});
</script>