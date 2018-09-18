<?php $this->load->view('header'); 
$msg = $this->session->flashdata('message');
?>
<link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<div class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<div class="row">
				<div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 col-xl-2 SideIconMargin">
					<ul class="nav nav-pills nav-stacked nav-pills-icons flex-column SideClassType" role="tablist">
						<li class="nav-item">
							<a class="nav-link active show" href="#allPaymentType" role="tab" data-toggle="tab" aria-selected="true">
								<i class="material-icons">group</i>
								All User
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#individualType" role="tab" data-toggle="tab" aria-selected="false">
								<i class="material-icons">person</i>
								Individual
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#corporateType" role="tab" data-toggle="tab" aria-selected="true">
								<i class="material-icons">group</i>
								Corporate
							</a>
						</li>
					</ul>
				</div>
				<div class="col-xs-9  col-sm-10 col-md-10 col-lg-10 col-xl-10">
					<div class="tab-content">
						<div class="tab-pane" id="individualType">
							<div class="card card-table">
								<div class="card-header card-header-table bg-rose">
									<i class="material-icons">assignment</i>
								</div>

								<div class="card-header-text-table bg-rose">
									<h6 class="title">Individual User Payment History</h6>
								</div>
								<div class="card-body">
								  <div class="table-responsive">
									<table class="table" id="indPayment">
									  <thead>
										<tr>
										  <th>Name</th>
										  <th>Order Id</th>
										  <th class="text-left">Amount</th>
										  <th class="text-center">Transaction Made On</th>
										  <th class="text-center">Status</th>
										</tr>
									  </thead>
										  <tbody>
											<?php 
												if(!empty($ind_payment_history)) { 
													foreach($ind_payment_history as $indPay) {
														switch($indPay['TXNSTATUS']) {
															case 'TXN_SUCCESS' :
																$pay_stat = 'Success';
																$pay_stat_class = 'Paysuccess';
															break;
															case 'TXN_FAILURE' :
																$pay_stat = 'Failure';
																$pay_stat_class = 'PayFailure';
															break;
															case 'PENDING' :
																$pay_stat = 'Pending';
																$pay_stat_class = 'PayPending';
															break;
															default:
																$pay_stat = 'Failure';
																$pay_stat_class = 'PayFailure';
															break;
														}
														$trans_made_on = date_format(date_create($indPay['TXNDATE']),"d M Y, H:i:s A");
													?>
													<tr>
														<td><?php echo $indPay['FirstName'].' '.$indPay['LastName']; ?></td>
														<td><a href="<?php echo base_url('view-payment/'.$indPay['PaymentId']); ?>" title="click here to see details"><?php echo $indPay['ORDERID']; ?></a></td>
														<td class="text-center"><?php echo $indPay['TXNAMOUNT']; ?></td>
														<td class="text-center"><?php echo $trans_made_on; ?></td>
														<td class="td-actions text-center">
															<div class="<?php echo $pay_stat_class; ?>"><?php echo $pay_stat; ?></div>
														</td>
													</tr>
												<?php } } ?>
										  </tbody>
										</table>
									  </div>
									</div>
								</div>
							</div>
							<div class="tab-pane active show" id="allPaymentType">
								<div class="card card-table">
									<div class="card-header card-header-table bg-rose">
										<i class="material-icons">assignment</i>
									</div>

									<div class="card-header-text-table bg-rose">
										<h6 class="title">All User Payment History</h6>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table" id="allPayment">
												  <thead>
													<tr>
													  <th>Name</th>
													  <th>Order Id</th>
													  <th class="text-left">Amount</th>
													  <th class="text-center">Transaction Made On</th>
													  <th class="text-center">Status</th>
													</tr>
												</thead>
												<tbody>
												<?php 
												if(!empty($all_payment_history)) { 
													foreach($all_payment_history as $allPay) {
														switch($allPay['TXNSTATUS']) {
															case 'TXN_SUCCESS' :
																$pay_stat = 'Success';
																$pay_stat_class = 'Paysuccess';
															break;
															case 'TXN_FAILURE' :
																$pay_stat = 'Failure';
																$pay_stat_class = 'PayFailure';
															break;
															case 'PENDING' :
																$pay_stat = 'Pending';
																$pay_stat_class = 'PayPending';
															break;
															default:
																$pay_stat = 'Failure';
																$pay_stat_class = 'PayFailure';
															break;
														}
														$trans_made_on = date_format(date_create($allPay['TXNDATE']),"d M Y, H:i:s A");
													?>
													<tr>
														<td><?php echo $allPay['FirstName'].' '.$allPay['LastName']; ?></td>
														<td><a href="<?php echo base_url('view-payment/'.$allPay['PaymentId']); ?>" title="click here to see details"><?php echo $allPay['ORDERID']; ?></a></td>
														<td class="text-center"><?php echo $allPay['TXNAMOUNT']; ?></td>
														<td class="text-center"><?php echo $trans_made_on; ?></td>
														<td class="td-actions text-center">
															<div class="<?php echo $pay_stat_class; ?>"><?php echo $pay_stat; ?></div>
														</td>
													</tr>
												<?php } } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="corporateType">
								<div class="card card-table">
									<div class="card-header card-header-table bg-rose">
										<i class="material-icons">assignment</i>
									</div>

									<div class="card-header-text-table bg-rose">
										<h6 class="title">Corporate Payment History</h6>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table" id="corpPayment">
												  <thead>
													<tr>
														<th>Name</th>
														<th>Order Id</th>
														<th class="text-left">Amount</th>
														<th class="text-center">Transaction Made On</th>
														<th class="text-center">Status</th>
													</tr>
												  </thead>
												<tbody>
												<?php 
												if(!empty($cor_payment_history)) { 
													foreach($cor_payment_history as $corPay) {
														switch($corPay['TXNSTATUS']) {
															case 'TXN_SUCCESS' :
																$pay_stat = 'Success';
																$pay_stat_class = 'Paysuccess';
															break;
															case 'TXN_FAILURE' :
																$pay_stat = 'Failure';
																$pay_stat_class = 'PayFailure';
															break;
															case 'PENDING' :
																$pay_stat = 'Pending';
																$pay_stat_class = 'PayPending';
															break;
															default:
																$pay_stat = 'Failure';
																$pay_stat_class = 'PayFailure';
															break;
														}
														$trans_made_on = date_format(date_create($corPay['TXNDATE']),"d M Y, H:i:s A");
													?>
													<tr>
														<td><?php echo $corPay['FirstName'].' '.$corPay['LastName']; ?></td>
														<td><a href="<?php echo base_url('view-payment/'.$allPay['PaymentId']); ?>" title="click here to see details"><?php echo $allPay['ORDERID']; ?></a></td>
														<td class="text-center"><?php echo $corPay['TXNAMOUNT']; ?></td>
														<td class="text-center"><?php echo $trans_made_on; ?></td>
														<td class="td-actions text-center">
															<div class="<?php echo $pay_stat_class; ?>"><?php echo $pay_stat; ?></div>
														</td>
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
		</div>
	</div>
</div>
</div>
<?php $this->load->view('footer'); ?>
<script src="<?php echo base_url('assets/validation/payment_history.js'); ?>"></script>
