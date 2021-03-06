<?php $this->load->view('header'); 
$msg = $this->session->flashdata('message');
?>
<div class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<?php if(!empty($msg)){ ?>
				<div class="alert alert-success <?php echo ($msg == 'success') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'success') ? 'block':'none' ?>">
					<button type="button" name="close" aria-hidden="true" class="close">×</button>
					<span><strong> Instructor Info! </strong>  Assigned to class Successfully</span>
				</div>
				<div class="alert alert-info <?php echo ($msg == 'succ') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'succ') ? 'block':'none' ?>">
					<button type="button" name="close" aria-hidden="true" class="close">×</button>
					<span><strong> Instructor Info! </strong> Assigned to class Edited Successfully</span>
				</div>
				
				<div class="alert alert-danger <?php echo ($msg == 'error') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'error') ? 'block':'none' ?>">
					<button type="button" name="close" aria-hidden="true" class="close">×</button>
					<span><strong> oops ! </strong>  something went wrong</span>
				</div>
			<?php } ?>
			<div class="row">
				<!--div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 col-xl-2 SideIconMargin">
					<ul class="nav nav-pills nav-stacked nav-pills-icons flex-column SideClassType" role="tablist">
						<li class="nav-item">
							<a class="nav-link active show" href="#instructorClass" role="tab" data-toggle="tab" aria-selected="true">
								<i class="material-icons">group</i>
								Assign Instructor
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#userClass" role="tab" data-toggle="tab" aria-selected="false">
								<i class="material-icons">person</i>
								Assign User
							</a>
						</li>
						
					</ul>
				</div-->
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="tab-content">
						<div class="tab-pane active show" id="instructorClass">
							<div class="card card-table">
								<div class="card-header card-header-table bg-rose">
									<i class="material-icons">assignment</i>
								</div>
								<a href="<?php echo base_url('assign-instructor-to-class'); ?>" class="btn btn-sm table-btn btn-round pull-right"><i class="fa fa-plus-circle" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i>Assign Instructor to Class<div class="ripple-container"></div></a>

								<div class="card-header-text-table bg-rose">
									<h6 class="title">Instructor List Assign to Class</h6>
								</div>
								<div class="card-body">
								  <div class="table-responsive">
									<table class="table" id="instructorTable">
									  <thead>
										<tr>
										  <th class="text-left">No.</th>
										  <th class="text-left">Instructor Name</th>
										  <th class="text-left">Email Address</th>
										  <th class="text-left">Class Name</th>
										  <th class="text-left">Start Date - End Date</th>
										  <th class="text-left">Start Time - End Time</th>
										  <th class="text-left">Actions</th>
										</tr>
									  </thead>
									  <tbody>
										<?php
										
										  if(!empty($assign_class_to_instructor)){
											  $i=1;
											foreach($assign_class_to_instructor as $key => $data){
												$startDate=getdate(strtotime($data['StartDate']));
												$startMonthNum  = $startDate['mon'];
												$startDateObj   = DateTime::createFromFormat('!m', $startMonthNum);
												$startMonthName = $startDateObj->format('F');
												$endDate=getdate(strtotime($data['EndDate']));
												$endMonthNum  = $endDate['mon'];
												$endDateObj   = DateTime::createFromFormat('!m', $endMonthNum);
												$endMonthName = $endDateObj->format('F'); 
												$startTime=$data['StartTime'];
												$endTime=$data['EndTime'];
												
										  ?>
											<tr>
												  <td class="text-left"><?php echo $i; ?></td>
												  <td class="text-left"><?php echo $data['InstrucFName']." ".$data['InstrucLName']; ?></td>
												  <td class="text-left"><?php echo $data['InstrucEmail']; ?></td>
												  <td class="text-left"><?php echo $data['ClassName']; ?></td>
												  <td class="text-left"><?php echo $startDate['mday']." ".$startMonthName.", ".$startDate['year']." - ".$endDate['mday']." ".$endMonthName.", ".$endDate['year'];?></td>
												  <td class="text-left"><?php echo date("h:i a",strtotime($startTime))." - ".date("h:i a",strtotime($endTime)); ?></td>
												  <td class="td-actions text-left">
													<div class="actions-container">
														<a href="<?php echo base_url('edit-instruc-class/'.$data['AssignedId']);?>" class="btn btn-round btn-info" title="View Assign Instructor To Class">
														  <i class="fa fa-eye" aria-hidden="true"></i>
														</a>
														<a href="<?php echo base_url('edit-instruc-class/'.$data['AssignedId']);?>" class="btn btn-round btn-success"  title="Edit Assign Instructor To Class">
														  <i class="material-icons">edit</i>
														</a>
														<a href="<?php echo base_url('delete-instruc-class/'.$data['AssignedId']);?>" class="btn btn-round btn-danger" title="Delete Assign Instructor To Class">
														  <i class="material-icons">close</i>
														</a>
													</div>
												  </td>
												</tr>
										  <?php $i++; } } 
										  //else {?>
											<!--tr>
												<td colspan="8" class="text-center">No Instructor Available to the Class</td>
											</tr-->
										<?php	//} ?>
									  </tbody>
									</table>
								  </div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="userClass">
							<div class="card card-table">
								<div class="card-header card-header-table bg-rose">
									<i class="material-icons">assignment</i>
								</div>
								<a href="<?php echo base_url('add-class'); ?>" class="btn btn-sm table-btn btn-round pull-right"><i class="fa fa-plus-circle" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i>Assign User to Class<div class="ripple-container"></div></a>

								<div class="card-header-text-table bg-rose">
									<h6 class="title">Users List Assign to Class</h6>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table" id="userTable">
										  <thead>
												<tr>
												  <th class="text-center">No.</th>
												  <th class="text-center">Class Name</th>
												  <th>Class Capacity</th>
												  <th class="text-right">Start Date</th>
												  <th class="text-right">End Date</th>
												  <th class="text-right">Start Time</th>
												  <th class="text-right">End Time</th>
												  <th class="text-right">Actions</th>
												</tr>
										  </thead>
										  <tbody>
											<?php
											if(!empty($corp_class_data)){
												$i=1;
												foreach($corp_class_data as $key => $data){
										  ?>
											<tr>
												  <td class="text-center"><?php echo $i; ?></td>
												  <td class="text-center"><?php echo $data['ClassName']; ?></td>
												  <td><?php echo $data['ClassCapacity']; ?></td>
												  <td><?php echo $data['StartDate']; ?></td>
												  <td class="text-right"><?php echo $data['EndDate']; ?></td>
												  <td class="text-right"><?php echo $data['StartTime']; ?></td>
												  <td class="text-right"><?php echo $data['EndTime']; ?></td>
												  <td class="td-actions text-right">
													<div class="actions-container">
														<a href="<?php echo base_url('class_info/'.$data['ClassId']);?>" class="btn btn-round btn-info" title="View Class Detail Info">
														  <i class="fa fa-eye" aria-hidden="true"></i>
														</a>
														<a href="<?php echo base_url('edit_class_info/'.$data['ClassId']);?>" class="btn btn-round btn-success"  title="Edit Class Detail">
														  <i class="material-icons">edit</i>
														</a>
														<a href="<?php echo base_url('delete_class_info/'.$data['ClassId']);?>" class="btn btn-round btn-danger" title="Delete Class">
														  <i class="material-icons">close</i>
														</a>
													</div>
												  </td>
												</tr>
										  <?php $i++; } }
												else {?>
													<tr>
														<td colspan="8" class="text-center">No User Available to the Class</td>
													</tr>
											<?php	}
										  ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
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
	$('.sidebar-wrapper').find('.nav li.ClassAssignment').addClass('active');
});
</script>
