<?php $this->load->view('header');
	$this->uri->segment(2);
	$instructorId = $assign_class_byId['InstructorName'];
	$instructorName = $this->Admin_Model->getInstructor_byId($instructorId);
	$classid = $assign_class_byId['ClassName'];
	$classDetail = $this->Admin_Model->getClass_byId($classid);
	// print_r($classDetail);
	$classStartTime = $classDetail['StartTime'];
	$classEndTime = $classDetail['EndTime'];
	$StartTime = $this->Admin_Model->get_classTimeById($classStartTime);
	$EndTime = $this->Admin_Model->get_classTimeById($classEndTime);
	$startDate=getdate(strtotime($classDetail['StartDate']));
	$startMonthNum  = $startDate['mon'];
	$startDateObj   = DateTime::createFromFormat('!m', $startMonthNum);
	$startMonthName = $startDateObj->format('F');
	$endDate=getdate(strtotime($classDetail['EndDate']));
	$endMonthNum  = $endDate['mon'];
	$endDateObj   = DateTime::createFromFormat('!m', $endMonthNum);
	$endMonthName = $endDateObj->format('F');
	$userdetail = $this->Admin_Model->getUser_byClassId($classid);
	

?>
<style>
.bord-right{
	border-right: 1px solid #ddd;
}
</style>
<div class="content">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
      <div class="card card-table">
		<div class="card-header card-header-table bg-rose">
			<i class="material-icons">perm_identity</i>
		</div>
		<div class="card-header-text-table bg-rose">
			<h4 class="title">Instructor Info</h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table text-gray">
					
					<tbody class="TableContentPad">
					<tr></tr>
					<tr>
						<th>Name</th>
						<td><?php echo (!empty($assign_class_byId['InstructorName'])) ? $instructorName['InstrucFName'].' '.$instructorName['InstrucLName'] : '';?></td>
					</tr>
					<tr>
						<th>Mobile</th>
						<td><?php echo (!empty($assign_class_byId['InstructorName'])) ? $instructorName['InstrucMobile'] : '';?></td>
					</tr>
					<tr>
						<th>Email</th>
						<td><?php echo (!empty($assign_class_byId['InstructorName'])) ? $instructorName['InstrucEmail'] : '';?></td>
					</tr>
					
					</tbody>
				</table>
			</div>
		</div>
	</div>
    </div>
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
      <div class="card card-table">
		<div class="card-header card-header-table bg-rose">
			<i class="material-icons">perm_identity</i>
		</div>
		<div class="card-header-text-table bg-rose">
			<h4 class="title">Assigned Class Info</h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table text-gray">
					<tbody class="TableContentPad">
						<tr></tr>
						<tr>
							<th>Name</th>
							<td class="bord-right"><?php echo (!empty($assign_class_byId['ClassName'])) ? $classDetail['ClassName'] : 'class not available';?></td>
							<th>Type</th>
							<td><?php echo (!empty($assign_class_byId['ClassType']) && $classDetail['ClassType'] ==1) ? 'Individual'  : 'corporate';?></td>
						</tr>
						<tr>
							<th>Recurrence</th>
							<td class="bord-right"><?php echo (!empty($assign_class_byId['ClassName'])) ? $classDetail['RecurrenceType'] : '';?></td>
							<th>Batch Duration</th>
							<td><?php echo (!empty($assign_class_byId['ClassName'])) ?  $startDate['mday']." ".$startMonthName.", ".$startDate['year'].' -  '. $endDate['mday']." ".$endMonthName.", ".$endDate['year']: '';?></td>
						</tr>
						<tr>
							<th>Start Time</th>
							<td class="bord-right"><?php echo (!empty($assign_class_byId['ClassName'])) ? $StartTime['TimeName'] : '';?></td>
							<th>End Time</th>
							<td><?php echo (!empty($assign_class_byId['ClassName'])) ? $EndTime['TimeName'] : '';?></td>
						</tr>
						<!--tr>
							<th>Class Name</th>
							<td><?php echo (!empty($assign_class_byId['ClassName'])) ? $classDetail['ClassName'] : 'class not available';?></td>
						</tr>
						<tr>
							<th>Class Type</th>
							<td><?php echo (!empty($assign_class_byId['ClassType']) && $classDetail['ClassType'] == 1) ? 'Individual' : 'Corporate' ;?></td>
						</tr>
						<tr>
							<th>Class Recurrence Type</th>
							<td><?php echo (!empty($assign_class_byId['ClassName'])) ? $classDetail['RecurrenceType'] : '';?></td>
						</tr>
						<tr>
							<th>Batch Duration</th>
							<td><?php echo (!empty($assign_class_byId['ClassName'])) ?  $startDate['mday']." ".$startMonthName.", ".$startDate['year'].' -  '. $endDate['mday']." ".$endMonthName.", ".$endDate['year']: '';?></td>
						</tr>
						<tr>
							<th>Class Start Time</th>
							<td><?php echo (!empty($assign_class_byId['ClassName'])) ? $StartTime['TimeName'] : '';?></td>
						</tr>
						<tr>
							<th>Class End Time</th>
							<td><?php echo (!empty($assign_class_byId['ClassName'])) ? $EndTime['TimeName'] : '';?></td>
						</tr-->
					</tbody>
				</table>
			</div>
		</div>
	</div>
    </div>
   
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <div class="card card-table">
		<div class="card-header card-header-table bg-rose">
			<i class="material-icons">perm_identity</i>
		</div>
		<div class="card-header-text-table bg-rose">
			<h4 class="title">Assigned User List</h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table text-gray">
					<tbody class="TableContentPad">
						<tr></tr>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>Type</th>
						</tr>
						<?php if(!empty($userdetail)){
							foreach($userdetail as $user){ ?>
						<tr>
							<td><?php echo (!empty($assign_class_byId['InstructorName'])) ? $user['FirstName'].' '.$user['LastName'] : '';?></td>
						
							
							<td><?php echo (!empty($assign_class_byId['InstructorName'])) ? $user['MobileNumber'] : '';?></td>
							
							<td><?php echo (!empty($assign_class_byId['InstructorName'])) ? $user['EmailAddress'] : '';?></td>
					
							
							<td><?php echo (!empty($assign_class_byId['InstructorName']) && $user['UserType'] == 1) ? 'Individual' : 'Corporate';?></td>
						</tr>
						<?php } } ?>
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
	$('.sidebar-wrapper').find('.nav li.ClassAssignment').addClass('active');
});
</script>