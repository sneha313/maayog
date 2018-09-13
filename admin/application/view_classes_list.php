<?php $this->load->view('header'); 
$msg = $this->session->flashdata('message');
?>
<style>
h4,.h4 {
    font-size: 1.75em;
    line-height: 1.4em;
}
.alert {
    border: 0;
    border-radius: 0;
    position: relative;
    padding: 5px 15px;
    line-height: 20px;
}
</style>
<div class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<?php if(!empty($msg)){ ?>
			<div class="row">
				<div class="col-xs-9 col-sm-10 col-md-10 col-lg-10 col-xl-10 col-xs-offset-3 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-xl-offset-2">
					<div class="alert alert-success text-center <?php echo ($msg == 'success') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'success') ? 'block':'none' ?>">
						<h4><strong><i class="material-icons">check_circle</i> </strong> Class Added Successfully</h4>
					</div>
					<div class="alert alert-success text-center <?php echo ($msg == 'succ') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'succ') ? 'block':'none' ?>">
						<h4><strong> <i class="material-icons">check_circle</i> </strong> Class Edited Successfully</h4>
					</div>
					
					<div class="alert alert-danger text-center <?php echo ($msg == 'error') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'error') ? 'block':'none' ?>">
						<h4><strong> <i class="material-icons">error_outline</i> </strong>  something went wrong</h4>
					</div>
				</div>
			</div>
			<?php } ?>
			<div class="row">
				<div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 col-xl-2 SideIconMargin">
					<ul class="nav nav-pills nav-pills-icons flex-column SideClassType" role="tablist">
						<li class="nav-item">
							<a class="nav-link active show" href="#individualClass" role="tab" data-toggle="tab" aria-selected="false">
								<i class="material-icons">person</i>
								Individual class
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#corporateClass" role="tab" data-toggle="tab" aria-selected="true">
								<i class="material-icons">group</i>
								Corporate class
							</a>
						</li>
						
						
					</ul>
				</div>
				<div class="col-xs-9  col-sm-10 col-md-10 col-lg-10 col-xl-10">
					<div class="tab-content">
						<div class="tab-pane active show" id="individualClass">
							<div class="card card-table">
								<div class="card-header card-header-table bg-rose">
									<i class="material-icons">assignment</i>
								</div>
								<a href="<?php echo base_url('add-class'); ?>" class="btn btn-sm table-btn btn-round pull-right"><i class="fa fa-plus-circle" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i>Add Class<div class="ripple-container"></div></a>

								<div class="card-header-text-table bg-rose">
									<h6 class="title">Individual Class list</h6>
								</div>
								<div class="card-body">
								  <div class="table-responsive">
									<table class="table notify">
									  <thead>
										<tr>
										  <!--th class="text-center">No.</th-->
										  <th>Class ID</th>
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
										
										  if(!empty($ind_class_data)){
											  $i=1;
											foreach($ind_class_data as $key => $data){
													$startDate=getdate(strtotime($data['StartDate']));
													$startMonthNum  = $startDate['mon'];
													$startDateObj   = DateTime::createFromFormat('!m', $startMonthNum);
													$startMonthName = $startDateObj->format('F');
													$endDate=getdate(strtotime($data['EndDate']));
													$endMonthNum  = $endDate['mon'];
													$endDateObj   = DateTime::createFromFormat('!m', $endMonthNum);
													$endMonthName = $endDateObj->format('F'); 
													$StartTime = $this->Admin_Model->get_classTimeById($data['StartTime']);
													$EndTime = $this->Admin_Model->get_classTimeById($data['EndTime']);
										  ?>
											<tr>
												  <!--td class="text-center"><?php echo $i; ?></td-->
												  <td class="text-center"><?php echo $data['Class_UniqueId']; ?></td>
												  <td class="text-center"><?php echo $data['ClassName']; ?></td>
												  <td><?php echo $data['ClassCapacity']; ?></td>
												  <td><?php echo $startDate['mday']." ".$startMonthName.", ".$startDate['year'];?></td>
												  <td class="text-right"><?php echo $endDate['mday']." ".$endMonthName.", ".$endDate['year']; ?></td>
												<td class="text-right"><?php echo $StartTime['TimeName']; ?></td>
												  <td class="text-right"><?php echo $EndTime['TimeName'];  ?></td>
												  <td class="td-actions text-right">
													<div class="actions-container">
														<a href="<?php echo base_url('class_info/'.$data['ClassId']);?>" class="btn btn-round btn-info" title="View Class Detail Info">
														  <i class="fa fa-eye" aria-hidden="true"></i>
														</a>
														<a href="<?php echo base_url('edit_class_info/'.$data['ClassId']);?>" class="btn btn-round btn-success"  title="Edit Class Detail">
														  <i class="material-icons">edit</i>
														</a>
														<a href="<?php echo base_url('delete_class_info/'.$data['ClassId']);?>" class="btn btn-round btn-danger" data-toggle="confirmation" data-placement="left" data-singleton="true" title="Delete Ind Class">
														  <i class="material-icons">close</i>
														</a>
													</div>
												  </td>
												</tr>
										  <?php $i++; } } else {?>
													<tr>
														<td colspan="8" class="text-center">No Individual Class available</td>
													</tr>
											<?php	}
										  ?>
									  </tbody>
									</table>
								  </div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="corporateClass">
							<div class="card card-table">
								<div class="card-header card-header-table bg-rose">
									<i class="material-icons">assignment</i>
								</div>
								<a href="<?php echo base_url('add-class'); ?>" class="btn btn-sm table-btn btn-round pull-right"><i class="fa fa-plus-circle" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i>Add Class<div class="ripple-container"></div></a>

								<div class="card-header-text-table bg-rose">
									<h6 class="title">Corporate Classes list</h6>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table">
										  <thead>
												<tr>
												  <!--th class="text-center">No.</th-->
												  <th class="text-center">Class ID</th>
												  <th class="text-center">Class Name</th>
												  <th class="text-center">Class Capacity</th>
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
													$startDate=getdate(strtotime($data['StartDate']));
													$startMonthNum  = $startDate['mon'];
													$startDateObj   = DateTime::createFromFormat('!m', $startMonthNum);
													$startMonthName = $startDateObj->format('F');
													$endDate=getdate(strtotime($data['EndDate']));
													$endMonthNum  = $endDate['mon'];
													$endDateObj   = DateTime::createFromFormat('!m', $endMonthNum);
													$endMonthName = $endDateObj->format('F'); 
													$StartTime = $this->Admin_Model->get_classTimeById($data['StartTime']);
													$EndTime = $this->Admin_Model->get_classTimeById($data['EndTime']);										
										  ?>
											<tr>
												  <!--td class="text-center"><?php echo $i; ?></td-->
												  <td class="text-center"><?php echo $data['Class_UniqueId']; ?></td>
												  <td class="text-center"><?php echo $data['ClassName']; ?></td>
												  <td><?php echo $data['ClassCapacity']; ?></td>
												  <td><?php echo $startDate['mday']." ".$startMonthName.", ".$startDate['year'];?></td>
												  <td class="text-right"><?php echo $endDate['mday']." ".$endMonthName.", ".$endDate['year']; ?></td>
												<td class="text-right"><?php echo $StartTime['TimeName']; ?></td>
												  <td class="text-right"><?php echo $EndTime['TimeName'];  ?></td>
												  <td class="td-actions text-right">
													<div class="actions-container">
														<a href="<?php echo base_url('class_info/'.$data['ClassId']);?>" class="btn btn-round btn-info" title="View Class Detail Info">
														  <i class="fa fa-eye" aria-hidden="true"></i>
														</a>
														<a href="<?php echo base_url('edit_class_info/'.$data['ClassId']);?>" class="btn btn-round btn-success"  title="Edit Class Detail">
														  <i class="material-icons">edit</i>
														</a>
														<a href="<?php echo base_url('delete_class_info/'.$data['ClassId']);?>" class="btn btn-round btn-danger DeleteConfirm" data-toggle="confirmation" data-placement="left" data-singleton="true" title="Delete Corp Class">
														  <i class="material-icons">close</i>
														</a>
													</div>
												  </td>
												</tr>
										  <?php $i++; } }
												else {?>
													<tr>
														<td colspan="8" class="text-center">No Corporate Class available</td>
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
	$('.sidebar-wrapper').find('.nav li.ClassManagement').addClass('active');
});
</script>
