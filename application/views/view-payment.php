<?php $this->load->view('header'); ?> 

<style type="text/css">
.user-details .status {
    font-size: 5em;
    font-weight: initial;
    color: #095b86;
    border-radius: 50%;
    background: transparent;
    border: 3px solid #7e9aa9;
    padding: 6px 16px;
    text-align: center;
}
.user-details .msg {
    font-size: 3.0em;
    font-weight: 600;
    color: #095b86;
    line-height: 50px;
}
.pament-details .status {
    font-size: 2em;
    font-weight: initial;
    color: #ffffff;
    border-radius: 50%;
    background: #095b86;
    border: 3px solid #649fbd;
    padding: 8px 15px;
    text-align: center;
}

.pament-details .order {
	font-size: 1.0em;
    font-weight: 600;
    color: #ffffff;
    border-radius: 10px;
    background: #095b86;
    padding: 3px 8px;
    margin-top: 10px;
    display: inline-block;
}

.pament-details .msg {
	font-size: 2.50em;
    font-weight: 600;
    color: #095b86;
    line-height: 50px;
    margin: 0px 10px;
}
.card-pay-status .table>tbody>tr>td, .card-pay-status .table>tbody>tr>th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
    color: #095b86;
}
</style>>
<div class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="card card-pay-status">
				<div class=" col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="card-pay-content" style="border-right: 1px solid #ddd">
						<div class="row pament-details">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="text-center" style="margin-bottom:15px;">
									<span class="fa fa-inr status"></span>
									<span class="msg">Payment Details</span>
								</div>
							</div>
							<?php
								switch($Payment['TXNSTATUS']) {
				  					case 'TXN_SUCCESS' :
				  						$pay_stat = 'SUCCESS';
				  						$pay_stat_class = 'Paysuccess';
				  					break;
				  					case 'TXN_FAILURE' :
				  						$pay_stat = 'FAILURE';
				  						$pay_stat_class = 'PayFailure';
				  					break;
				  					case 'PENDING' :
				  						$pay_stat = 'PENDING';
				  						$pay_stat_class = 'PayPending';
				  					break;
				  					default:
				  						$pay_stat = 'FAILURE';
				  						$pay_stat_class = 'PayFailure';
				  					break;
				  				}

				  				switch($Payment['PAYMENTMODE']) {
				  					case 'CC' :
				  						$pay_type = 'CREDIT CARD';
				  					break;
				  					case 'DC' :
				  						$pay_type = 'DEBIT CARD';
				  					break;
				  					case 'NB' :
				  						$pay_type = 'NET BANKING';
				  					break;
				  					case 'PPI' :
				  						$pay_type = 'PAYTM WALLET';
				  					break;
				  					default:
				  						$pay_type = '';
				  					break;
				  				}

				  				$trans_made_on = date_format(date_create($Payment['TXNDATE']),"d M Y, H:i:s A");

							?>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="text-center">
									<span class="order">TRANSACTION ID #: <?php echo (!empty($Payment['TXNID'])) ? $Payment['TXNID'] : ''; ?></span>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="text-center">
									<span class="order">ORDER ID #: <?php echo (!empty($Payment['ORDERID'])) ? $Payment['ORDERID'] : ''; ?></span>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="text-center">
									<span class="order">STATUS #: <?php echo $pay_stat; ?></span>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="text-center">
									<span class="order">Ammount #: <?php echo (!empty($Payment['TXNAMOUNT'])) ? $Payment['TXNAMOUNT'] : ''; ?></span>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="table-responsive" style="margin-top: 20px;">
								    <table class="table table-hover">
									     <tbody>
									       <tr class="infra" style="border-top: 1px solid #ddd;">
									         <th>Transaction Date</th>
									         <td><?php echo $trans_made_on; ?></td>
									       </tr>
									       <tr class="infra">
									         <th>Payment Mode</th>
									         <td> <?php echo $pay_type; ?></td>
									       </tr>
									       <tr class="infra">
									         <th>Bank Name</th>
									         <td><?php echo (!empty($Payment['BANKNAME'])) ? $Payment['BANKNAME'] : ''; ?></td>
									       </tr>
									       <tr class="infra">
									         <th>RESPCODE</th>
									         <td><?php echo (!empty($Payment['RESPCODE'])) ? $Payment['RESPCODE'] : ''; ?></td>
									       </tr>
									     </tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="card-pay-content">
						<div class="row user-details">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="text-center">
									<span class="fa fa-user status"></span>
								</div>
							</div>
							<?php 
								$user = array();
								$user = json_decode($Payment['UserDetails'], true);
							 ?>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="text-center">
									<span class="msg"><?php echo (!empty($user['UserName'])) ? $user['UserName'] : ''; ?></span>
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="table-responsive" style="margin-top: 20px;">
								    <table class="table table-hover">
									     <tbody>
									       <tr class="infra" style="border-top: 1px solid #ddd;">
									         <th>Email Address</th>
									         <td><?php echo (!empty($Payment['CreatedBy'])) ? $Payment['CreatedBy'] : ''; ?></td>
									       </tr>
									       <tr class="infra">
									         <th>Contct No</th>
									         <td><?php echo (!empty($user['PhoneNumber'])) ? $user['PhoneNumber'] : ''; ?></td>
									       </tr>
									       <tr class="infra">
									         <th>Gender	</th>
									         <td><?php echo (!empty($user['Gender'])) ? $user['Gender'] : ''; ?></td>
									       </tr>
									       <tr class="infra">
									         <th>Class Name</th>
									         <td><?php echo (!empty($user['ClassName'])) ? $user['ClassName'] : ''; ?></td>
									       </tr>
									       <tr class="infra">
									         <th>Package Type </th>
									         <td><?php echo (!empty($user['PackageType'])) ? $user['PackageType'] : ''; ?></td>
									       </tr>
									       <tr class="infra">
									         <th>User Type </th>
									         <td><?php echo (!empty($user['UserType'])) ? $user['UserType'] : ''; ?></td>
									       </tr>
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
<?php $this->load->view('footer'); ?>
<script>
$(document).ready(function() {
	var base_url = $('#base_url').val();
	$('.sidebar-wrapper').find('.nav li').removeClass('active');
	$('.sidebar-wrapper').find('.nav li.PaymentHistory').addClass('active');
});
</script>