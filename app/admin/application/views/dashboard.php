<?php $this->load->view('header'); ?> 
<style>
	// .card .card-header {
		// box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.42), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
		// margin: -20px 15px 0;
		// border-radius: 3px;
		// padding: 5px;
		// background-color: #999999;
	// }
	table.dataTable.dtr-column tbody td.control:before, table.dataTable.dtr-column tbody th.control:before {
		left: -2.5%;
	}
	
	
</style>
            <div class="content">
                <div class="container-fluid-custom">
                    <div class="row">
                         <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">person</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Individual Users</p>
                                    <h3 class="title"><?php echo (!empty($ind_user)) ? count($ind_user) : 'Not available'; ?>
                                        <!--small>Users</small-->
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
										<a href="<?php echo base_url('ind_user'); ?>"> <i class="material-icons text-danger">warning</i>
                                        Get indidvidual users detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">group</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Corporate Users</p>
                                    <h3 class="title"><?php echo (!empty($cor_user)) ? count($cor_user) : 'Not available'; ?> <!--small>Users</small></h3-->
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <a href="<?php echo base_url('corp'); ?>"> <i class="material-icons">date_range</i>Get corporates detail
										</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="purple">
                                    <i class="material-icons">content_paste</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Classes</p>
                                    <h3 class="title"><?php echo (!empty($class_name)) ? count($class_name) : 'Not available'; ?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
										<a href="<?php echo base_url('class'); ?>"> 
                                        <i class="material-icons">local_offer</i> Get classes detail
										</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="red">
                                    <i class="material-icons">info_outline</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Not attending Class</p>
                                    <h3 class="title"><?php echo (!empty($user_not_attend)) ? count($user_not_attend) : 'All users attending'; ?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
										<a href="<?php echo base_url('event'); ?>"> 
                                        <i class="material-icons">local_offer</i> Get not attending class by users
										</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">subscriptions</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Individual Subscribers</p>
                                    <h3 class="title"><?php echo (!empty($ind_subs)) ? count($ind_subs) : ' Not available'; ?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">update</i> In last 30 days 
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">subscriptions</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Corpotrate subscribers</p>
                                    <h3 class="title"><?php echo (!empty($cor_subs)) ? count($cor_subs) : ' Not available'; ?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">update</i> In last 30 days
                                    </div>
                                </div>
                            </div>
                        </div>
						<!--div class="col-lg-4 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="blue">
									<i class="fa fa-twitter"></i>
								</div>
								<div class="card-content">
									<p class="category">Followers</p>
									<h3 class="title">+245</h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">update</i> In last 30 days
									</div>
								</div>
							</div>
						</div-->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="card card-table">
								<div class="card-header card-header-table"  data-background-color="purple">
									<i class="material-icons">assignment</i>
								</div>
								<div class="card-header-text-table bg-rose">
									<h4 class="title">Payment History</h4>
								</div>
								<div class="card-content">
								  <div class="table-responsive">
									<table class="table notify" id="userPaymentHis">
									  <thead class="text-primary">
										<tr>
											<th>Order Id</th>
											<th>User Name</th>
											<th>Status</th>
											<th>Date</th>
										</tr>
									  </thead>
									  <tbody>
									  <?php 
										if(!empty($all_payment_history)) { 
											foreach($all_payment_history as $allPay) {
												switch($allPay['TXNSTATUS']) {
													case 'TXN_SUCCESS' :
														$pay_stat = 'Success';
													break;
													case 'TXN_FAILURE' :
														$pay_stat = 'Failure';
													break;
													case 'PENDING' :
														$pay_stat = 'Pending';
													break;
													default:
														$pay_stat = 'Failure';
													break;
												}
												$trans_made_on = date_format(date_create($allPay['TXNDATE']),"d M Y");
										?><tr>
											<td><?php echo $allPay['ORDERID']; ?></td>
											<td><?php echo $allPay['FirstName'].' '.$allPay['LastName']; ?></td>
											<td><?php echo $pay_stat; ?></td>
											<td><?php echo $trans_made_on; ?></td>
										</tr>
										 
									  <?php } } ?>
										
									  </tbody>
									</table>
								  </div>
								</div>
							</div>
                        </div>
						<!-- class="col-lg-6 col-md-12">
                            <div class="card card-table">
                                <div class="card-header card-header-table" data-background-color="orange">
                                   	<i class="material-icons">assignment</i>
                                </div>
								<div class="card-header-text-table bg-rose">
									<h4 class="title">Users Feedback</h4>
								</div>
                                <div class="card-content">
									 <div class="table-responsive">
                                    <table id="userPaymentHis" class="table table-hover">
                                        <thead class="text-warning">
											<tr>
												<th>Order Id</th>
												<th>User Name</th>
												<th>Status</th>
												<th>Date</th>
											</tr>
                                        </thead>
										 <?php 
										if(!empty($all_payment_history)) { 
											foreach($all_payment_history as $allPay) {
												switch($allPay['TXNSTATUS']) {
													case 'TXN_SUCCESS' :
														$pay_stat = 'Success';
													break;
													case 'TXN_FAILURE' :
														$pay_stat = 'Failure';
													break;
													case 'PENDING' :
														$pay_stat = 'Pending';
													break;
													default:
														$pay_stat = 'Failure';
													break;
												}
												$trans_made_on = date_format(date_create($allPay['TXNDATE']),"d M Y");
										?>
                                        <tbody>
										 <?php //if(!empty($all_payment_history)) {
											// foreach($all_payment_history as $allPay) {?>
                                            <tr>
                                               <td><?php echo $allPay['ORDERID']; ?></td>
												<td><?php echo $allPay['FirstName'].' '.$allPay['LastName']; ?></td>
												<td><?php echo $pay_stat; ?></td>
												<td><?php echo $trans_made_on; ?></td>
                                            </tr>
										<?php } }?>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div-->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="card card-table">
                                <div class="card-header card-header-table" data-background-color="orange">
                                   	<i class="material-icons">assignment</i>
                                </div>
								<div class="card-header-text-table bg-rose">
									<h4 class="title">Users Feedback</h4>
								</div>
                                <div class="card-content">
									 <div class="table-responsive">
                                    <table id="userFeedback" class="table table-hover">
                                        <thead class="text-warning">
											<tr>
												<th>Name</th>
												<th>Phone Number</th>
												<th>Email Address</th>
												<th>Type</th>
												<th>Message</th>
											</tr>
                                        </thead>
                                        <tbody>
										<?php if(!empty($users_feedback)) {
											foreach($users_feedback as $userData) {?>
                                            <tr>
                                                <td><?php echo $userData['FirstName'].' '.$userData['LastName']; ?></td>
                                                <td><?php echo $userData['MobileNumber']; ?></td>
                                                <td><?php echo $userData['EmailAddress']; ?></td>
                                                <td><?php echo $userData['FeedbackName']; ?></td>
                                                <td><?php echo $userData['Message']; ?></td>
                                            </tr>
										<?php } }?>
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
$(document).ready(function() {
      demo.initDashboardPageCharts();
            
    });
</script>
<script type="text/javascript">
$(document).ready(function() {
	$('.sidebar-wrapper').find('.nav li').removeClass('active');
	$('.sidebar-wrapper').find('.nav li.dashboard').addClass('active');
});
$(document).ready( function () {
  // $('#userPaymentHis').DataTable({
	   // "oLanguage": { 
		// "sSearch": '',
		// "oPaginate": {
			// "sPrevious": '<i class="fa fa-angle-double-left " aria-hidden="true"></i>',
			// "sNext": '<i class="fa fa-angle-double-right " aria-hidden="true"></i>',
			// }
		// },
		// pageLength: 10,
			// "sDom":"<'row am-datatable-header'<'pull-right'f>><'top'>t<'bottom'p><'clear'>", // Add l before p for Length
			// "drawCallback": function(settings) {
			// var pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
			// pagination.toggle(this.api().page.info().pages > 1);
		// },
		 // responsive: {
				// details: {
					// type: 'column'
				// }
			// },
			// columnDefs: [ {
				// className: 'control',
				// orderable: false,
				// targets: 0
			// } ],
			// order: [ 1, 'asc' ]
    // } );
	$('#userFeedback').DataTable({
	   "oLanguage": { 
		"sSearch": '',
		"oPaginate": {
			"sPrevious": '<i class="fa fa-angle-double-left " aria-hidden="true"></i>',
			"sNext": '<i class="fa fa-angle-double-right " aria-hidden="true"></i>',
			}
		},
		pageLength: 10,
			"sDom":"<'row am-datatable-header'<'pull-right'f>><'top'>t<'bottom'p><'clear'>", // Add l before p for Length
			"drawCallback": function(settings) {
			var pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
			pagination.toggle(this.api().page.info().pages > 1);
		},
	 responsive: {
            details: {
                type: 'column'
            }
        },
        columnDefs: [ {
            className: 'control',
            orderable: false,
            targets:   0
        } ],
        order: [ 1, 'asc' ]
    } );
} );
$(document).ready(function(){

	$('.dataTables_filter').addClass('pull-left');
	$('.dataTables_filter input').attr("placeholder", "seach here");
});
</script>