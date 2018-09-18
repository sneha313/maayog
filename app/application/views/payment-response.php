<?php $this->load->view('header');
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
require_once("lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $response_data;
$paytmChecksum = isset($response_data["CHECKSUMHASH"]) ? $response_data["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


$arr_response = array();
define('STATUS', $response_data["STATUS"]);

if($isValidChecksum == "TRUE") {
	if ($response_data["STATUS"] == "TXN_SUCCESS") {
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}

	if (isset($response_data) && count($response_data)>0 )
	{ 
		foreach($response_data as $paramName => $paramValue) {
			$arr_response[$paramName] = $paramValue;

		}
	}
	
}
?>


<div class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-2">
			<?php if($isValidChecksum == "TRUE") { ?>	
				<div class="card card-pay-status">
					<?php  if(STATUS == 'TXN_SUCCESS') { 
						?>
						<div class="card-pay-content">
							<div class="row success">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="text-center">
										<span class="fa fa-check status"></span>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="text-center">
										<span class="msg">Thank You!</span>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="text-center">
										<span class="order">TRANSACTION ID #: <?php echo (!empty($arr_response['TXNID'])) ? $arr_response['TXNID'] : ''; ?></span>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="text-center">
										<span class="order">ORDER ID #: <?php echo (!empty($arr_response['ORDERID'])) ? $arr_response['ORDERID'] : ''; ?></span>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="text-center">
										<span class="pay-info">Your payment of <i class="fa fa-inr amount"> <?php echo (!empty($arr_response['TXNAMOUNT'])) ? $arr_response['TXNAMOUNT'] : ''; ?></i> has been processed successfully</span>
										<span class="pay-info">For your reference, you can use your Order Id and Transaction Id</span>
										<span class="pay-info">You will receive confirmation email very shortly</span>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php  if(STATUS == 'TXN_FAILURE') { ?>
						<div class="card-pay-content">
							<div class="row failure">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="text-center">
										<span class="fa fa-times status"></span>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="text-center">
										<span class="msg">Order Failed!</span>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="text-center">
										<span class="order">ORDER ID #: <?php echo (!empty($arr_response['ORDERID'])) ? $arr_response['ORDERID'] : ''; ?></span>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="text-center">
										<span class="pay-info">Your payment of <i class="fa fa-inr amount"> <?php echo (!empty($arr_response['TXNAMOUNT'])) ? $arr_response['TXNAMOUNT'] : ''; ?></i> could not be processed</span>
										<span class="pay-info">For your reference, you can use your order id as transaction id</span>
										<span class="pay-info">You will receive confirmation email very shortly</span>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php  if(STATUS == 'PENDING') { ?>
						<div class="card-pay-content">
							<div class="row warning">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="text-center">
										<span class="fa fa-warning status"></span>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="text-center">
										<span class="msg">Order Pending!</span>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="text-center">
										<span class="order">ORDER ID #: <?php echo (!empty($arr_response['ORDERID'])) ? $arr_response['ORDERID'] : ''; ?></span>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="text-center">
										<span class="pay-info">Your payment of <i class="fa fa-inr amount"> <?php echo (!empty($arr_response['TXNAMOUNT'])) ? $arr_response['TXNAMOUNT'] : ''; ?></i> put on hold due to some server problem</span>
										<span class="pay-info">For your reference, you can use your order id as transaction id</span>
										<span class="pay-info">You will receive confirmation email very shortly</span>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>										
</div>
<?php $this->load->view('footer'); ?>
<script>
$(document).ready(function() {
	var base_url = $('#base_url').val();
	$('.sidebar-wrapper').find('.nav li').removeClass('active');
	$('.sidebar-wrapper').find('.nav li.PaymentHistory').addClass('active');
	setTimeout(function() {
		window.location.href=base_url+'payment-history';
	}, 10000);
});
</script>