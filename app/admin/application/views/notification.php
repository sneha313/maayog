<?php $this->load->view('header'); ?>

<div class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
			<div class="card card-table">
				<div class="card-header card-header-table bg-rose">
					<i class="material-icons">assignment</i>
				</div>
				<div class="card-header-text-table bg-rose">
					<h4 class="title">Notification Details</h4>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
					<table class="table notify" id="adminNotification">
					  <thead>
						<tr>
						  <!--th>Id</th-->
						  <th>User Name</th>
						  <th>Email Address</th>
						  <th>Message</th>
						  <th>Reason</th>
						  <th>Date</th>
						  <!--th class="text-right">User Type</th>
						  <th class="text-right">Action</th-->
						</tr>
					  </thead>
					  <tbody>
					  <?php if(!empty($notification)){ 
							foreach($notification as $res) {
								// $startDate=getdate(strtotime($res['CreatedOn']));
								// $startMonthNum  = $startDate['mon'];
								// $startDateObj   = DateTime::createFromFormat('!m', $startMonthNum);
								// $startMonthName = $startDateObj->format('F');
								$startDate = strtotime($res['CreatedOn']);
					?>
						<tr>
						  <!--td><?php echo $res['RegId']; ?></td-->
							<td><?php echo $res['Name']; ?></td>
							<td><?php echo $res['CreatedBy']; ?></td>
							<td class="CellWithComment"><i class="fa fa-info-circle InfoMsg" aria-hidden="true"></i><?php echo $res['ShortMessage']; ?>
							  <span class="CellComment"><?php echo $res['Message']; ?></span>
							</td>
							<td><?php echo $res['Reason']; ?></td>
							<td><?php echo date('d M Y', $startDate); ?></td>
						  <!--td class="td-actions text-right">
							<div class="actions-container">
								<a href="javascript:void(0);"rel="tooltip" class="btn btn-info" data-original-title="" title="">
								  <i class="fa fa-eye" aria-hidden="true"></i>
								</a>
							</div>
						  </td-->
						</tr>
						 
					  <?php } 
					  } else {?>
						<tr>
							<td colspan="6" class="text-center">No Notification Available</td>
						</tr>
					  <?php } ?>
					  </tbody>
					</table>
				  </div>
				</div>
		  </div>
		</div>
	</div>
</div>
<?php $this->load->view('footer'); ?>
<script src="<?php echo base_url('assets/validation/notification.js'); ?>"></script>