<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
require_once("lib/encdec_paytm.php");

$checkSum = "";
$paramList = array();

$ORDER_ID = $post_deta["ORDER_ID"];
$CUST_ID = $post_deta["CUST_ID"];
$INDUSTRY_TYPE_ID = $post_deta["INDUSTRY_TYPE_ID"];
$CHANNEL_ID = $post_deta["CHANNEL_ID"];
$TXN_AMOUNT = $post_deta["TXN_AMOUNT"];

// Create an array having all required parameters for creating checksum.
$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $CUST_ID;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;

$paramList["CALLBACK_URL"] = base_url('payment-response');
$paramList["MSISDN"] = $MSISDN = (!empty($this->session->userdata('MobileNumber'))) ? $this->session->userdata('MobileNumber') : ''; //Mobile number of customer
$paramList["EMAIL"] = $EMAIL = (!empty($this->session->userdata('EmailAddress'))) ? $this->session->userdata('EmailAddress') : ''; //Email ID of customer
$paramList["VERIFIED_BY"] = "EMAIL"; //
$paramList["IS_USER_VERIFIED"] = "YES"; //
// echo PAYTM_MERCHANT_KEY;
// echo '<pre>';
// print_r($paramList);
// exit;
//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
?>
<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>