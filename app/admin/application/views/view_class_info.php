<?php $this->load->view('header');
$this->uri->segment(2);
$StartTime = $this->Admin_Model->get_classTimeById($class_data_byId['StartTime']);
$EndTime = $this->Admin_Model->get_classTimeById($class_data_byId['EndTime']);
 ?>
<div class="content">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card card-table">
		<div class="card-header card-header-table bg-rose">
			<i class="material-icons">perm_identity</i>
		</div>
		<div class="card-header-text-table bg-rose">
			<h4 class="title">Class Detail Info</h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table text-gray">
					<tbody class="TableContentPad">
					<tr></tr>
					<tr>
						<th>Class Number</th>
						<td><?php echo (!empty($class_data_byId['Class_UniqueId'])) ? $class_data_byId['Class_UniqueId'] : '';?></td>
					</tr>
					<tr>
						<th>Class Name</th>
						<td><?php echo (!empty($class_data_byId['ClassName'])) ? $class_data_byId['ClassName'] : '';?></td>
					</tr>
					<tr>
						<th>Class Capacity</th>
						<td><?php echo (!empty($class_data_byId['ClassCapacity'])) ? $class_data_byId['ClassCapacity'] : ''; ?></td>
					</tr>
					<tr>
						<th>Class Recurrence</th>
						<td><?php echo (!empty($class_data_byId['RecurrenceType'])) ? $class_data_byId['RecurrenceType'] : ''; ?></td>
					</tr>
					<tr>
						<th>Start Date</th>
						<td><?php echo (!empty($class_data_byId['StartDate'])) ? $class_data_byId['StartDate'] : ''; ?></td>
					</tr>
					<tr>
						<th>End Date</th>
						<td><?php echo (!empty($class_data_byId['EndDate'])) ? $class_data_byId['EndDate'] : ''; ?></td>
					</tr>
					<tr>
						<th>Start Time</th>
						<td><?php echo (!empty($StartTime['TimeName'])) ? $StartTime['TimeName'] : ''; ?></td>
					</tr>
					<tr>
						<th>End Time</th>
						<td><?php echo (!empty($EndTime['TimeName'])) ? $EndTime['TimeName'] : ''; ?></td>
					</tr>
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
	$('.sidebar-wrapper').find('.nav li.ClassManagement').addClass('active');
});
</script>