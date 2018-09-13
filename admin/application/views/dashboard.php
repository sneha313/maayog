<?php $this->load->view('header'); ?>
<style>
.card .card-header {
		box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.42), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
		margin: -20px 15px 0;
		border-radius: 3px;
		padding: 5px;
		background-color: #999999;
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
                                    <h3 class="title"><?php echo (!empty($ind_user)) ? count($ind_user) : 'No individual users available'; ?>
                                        <small>Users</small>
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
                                    <h3 class="title"><?php echo (!empty($cor_user)) ? count($cor_user) : 'No corporate users available'; ?> <small>Users</small></h3>
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
                                    <h3 class="title"><?php echo (!empty($class_name)) ? count($class_name) : 'No classes available'; ?></h3>
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
                         <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">subscriptions</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Individual Subscribers</p>
                                    <h3 class="title"><?php echo (!empty($ind_subs)) ? count($ind_subs) : ' Individual subscriber not available'; ?></h3>
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
                                <div class="card-header" data-background-color="rose">
                                    <i class="material-icons">subscriptions</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Corpotrate subscribers</p>
                                    <h3 class="title"><?php echo (!empty($cor_subs)) ? count($cor_subs) : ' Corporate subscriber not available'; ?></h3>
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
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Payment Details </h4>
                                    <p class="category">All user payment detail</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-rose">
                                            <th>Order Id</th>
                                            <th>User Name</th>
                                            <th>Status</th>
                                            <th>Date</th>
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
													?>
													<tr>
														<td><?php echo $allPay['ORDERID']; ?></td>
														<td><?php echo $allPay['FirstName'].' '.$allPay['LastName']; ?></td>
														<td class="td-actions text-center"><?php echo $pay_stat; ?>
														</td>
														<td class="text-center"><?php echo $trans_made_on; ?></td>
													</tr>
												<?php } } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="orange">
                                    <h4 class="title">Users Feedback</h4>
                                    <p class="category">Feedback for maayog</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-warning">
                                            <th>Name</th>
                                            <th>Phone Number</th>
                                            <th>Email Address</th>
                                            <th>Type</th>
                                            <th>Message</th>
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
</script>