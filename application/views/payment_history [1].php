<?php $this->load->view('header'); 
$msg = $this->session->flashdata('message');
?>
<div class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<?php if(!empty($msg)){ ?>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<!--div class="alert alert-success text-center <?php echo ($msg == 'success') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'success') ? 'block':'none' ?>"-->
						<div class="alert alert-success text-center <?php echo ($msg == 'success') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'success')  ? 'block':'none' ?>"><i data-notify="icon" class="material-icons">add_alert</i>
							<span><strong> Instructor Info! </strong> Assigned to class Successfully</span>
						</div>
					
						<div class="alert alert-primary text-center <?php echo ($msg == 'succ') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'succ') ? 'block':'none' ?>"><i data-notify="icon" class="material-icons">add_alert</i>
							<span><strong> Instructor Info! </strong> Assigned to class Updated Successfully</span>
						</div>
						<?php echo ($msg == 'error') ? 'alert-msg':'' ?>
						<div class="alert alert-rose text-center <?php echo ($msg == 'error') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'error') ? 'block':'none' ?>"><i data-notify="icon" class="material-icons">add_alert</i>
							<span><strong> Oops! </strong>  something went wrong </span>
						</div>
					</div>
				</div>
			<?php } ?>
			<div class="card card-table">
				<div class="card-header card-header-table bg-rose">
					<i class="material-icons">assignment</i>
				</div>

				<div class="card-header-text-table bg-rose">
					<h6 class="title" style="margin-bottom: 15px;">Payment History</h6>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
					<table id="payment" class="table">
					  <thead>
						<tr>
						  <th>Order Id</th>
						  <th>Transasction Id</th>
						  <th class="text-left">Amount</th>
						  <th class="text-center">Payment Mode</th>
						  <th class="text-center">Transaction Made On</th>
						  <th class="text-center">Status</th>
						</tr>
					  </thead>
						  <tbody>
						  	<?php
						  		if(!empty($paymenthistory)){
							  		foreach($paymenthistory as $key => $history) {
						  				switch($history['TXNSTATUS']) {
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

						  				switch($history['PAYMENTMODE']) {
						  					case 'CC' :
						  						$pay_type = 'Credit card';
						  					break;
						  					case 'DC' :
						  						$pay_type = 'Debit card';
						  					break;
						  					case 'NB' :
						  						$pay_type = 'Net banking';
						  					break;
						  					case 'PPI' :
						  						$pay_type = 'Paytm wallet';
						  					break;
						  					default:
						  						$pay_type = '';
						  					break;
						  				}

						  				$trans_made_on = date_format(date_create($history['TXNDATE']),"d M Y, H:i:s A");

							  		?>
								<tr>
								  <td><a href="javascript:void(0)" title="click here to see details"><?php echo $history['ORDERID']; ?></a></td>
								  <td><?php echo $history['TXNID']; ?></td>
								  <td class="amt"><i class="fa fa-inr"></i><?php echo $history['TXNAMOUNT']; ?></td>
								  <td class="text-center"><?php echo $pay_type; ?></td>
								  <td class="text-center"><?php echo $trans_made_on; ?></td>
								  <td class="text-center"><div class="<?php echo $pay_stat_class; ?>"><?php echo $pay_stat; ?></div></td>
								  <!---td class="td-actions text-right">
									<div class="actions-container">
										<a href="javascript:void(0);"rel="tooltip" class="btn btn-primary" data-original-title="" title="view detail information">
										  <i class="fa fa-eye" aria-hidden="true"></i>
										</a>
									</div>
								  </td--->	
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
<script src="<?php echo base_url('assets/validation/payment_history.js'); ?>"></script>
