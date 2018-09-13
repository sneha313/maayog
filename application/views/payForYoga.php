<?php $this->load->view('header'); ?>
<?php
$sess_id = (!empty($this->session->userdata('UserId')))? $this->session->userdata('UserId') : '0';
// $num = "0000";
//$max_id = "1";
// $fin_id = $num.$sess_id;
// $chr = substr($fin_id,-4);
// $CUST_ID = "CUST".$chr;
?>
<style>
#packageCost .rupee{
	color: #9c27b0;
    font-weight: bold;
    font-size: 20px;
	
}
.EditIcon{
	color:black;
	margin:5px;
}
</style>
<div class="content">
	<div class="row multi-card">
		<div class="multi-card">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
				<form id="formPayforYoga" action="<?php echo base_url('payment-request'); ?>" method="POST" enctype="multipart/form-data">
					<div id="hiddenfields">
						<input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo strtoupper(uniqid('ORDS')); ?>">
						<input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $sess_id; ?>">
						<input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
						<input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
						<input type="hidden" title="TXN_AMOUNT" tabindex="10" name="TXN_AMOUNT" value="0">
						<input type="hidden" name="CreatedBy" value="<?php echo $this->session->userdata('EmailAddress'); ?>">
						<input type="hidden" name="CreatedOn" value="<?php echo  date('Y-m-d: H:i:s'); ?>">
						<input type="hidden" name="Status" value="1">
						<input type="hidden" name="MarkAsDelete" value="0">
					</div>
					<div class="card card-multi-form">
						<div class="card-header card-header-form bg-rose">
							<i class="material-icons">content_paste</i>
						</div>
						<div class="card-header-text-form bg-rose">
							<h4 class="title">Pay Now</h4>
							<?php //echo 'Current PHP version: ' . phpversion();?>
						</div>
						<div class="card-content card-content-form">
							<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 PackageTypeDiv" id="packageTypeDiv">
								<div class="form-group label-floating">
									<label class="control-label ">Choose Package Type</label>
									<select class="form-control PackageType" name="PackageType" id="packageType">
									  <option value=""></option>
									  <?php 
									  	if(!empty($package)) {
									  		foreach($package as $k => $cost) {
											?>
											<option value="<?php echo $cost['YogaDuration']; ?>"><?php echo $cost['YogaDuration']; ?></option>
										<?php } }  ?>
									</select>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 PackageCostDiv" id="packageCostDiv" style="display:none;">
								<div class="form-group label-floating"  id="packageCost">
									
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
								<div class="form-group label-floating" >
									<label class="control-label">Note</label>
										<input type="text" name="Note" class="form-control Note" id="note">
								</div>
							</div>
						</div>
						</div>
					</div>
					<div class="card card-multi-form">
						<div class="card-header card-header-form bg-rose">
							<i class="material-icons">perm_identity</i>
						</div>
						<div class="card-header-text-form bg-rose">
							<h4 class="title">User Details<a href="<?php echo base_url('edit-user-detail'); ?>"><i class="fa fa-pencil EditIcon" id="edit" title="Edit Profile"></i></a></h4>
						</div>
						<div class="card-content card-content-form">
							<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">User Name</label>
									<input type="text" name="UserName" class="form-control UserName" value="<?php echo (!empty($user['FirstName'])) ? $user['FirstName'].' '.$user['LastName']: ''; ?>" readonly>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label"  for="classCapacity">Email Address</label>
									<input type="text" name="EmailAddress" class="form-control EmailAddress"  id="emailAddress" value="<?php echo (!empty($user['EmailAddress'])) ? $user['EmailAddress']: ''; ?>" readonly>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating" >
									<label class="control-label">Phone Number</label>
									<input type="text" name="PhoneNumber" class="form-control PhoneNumber"  id="phoneNumber" value="<?php echo (!empty($user['MobileNumber'])) ? $user['MobileNumber']: ''; ?>" readonly>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating" >
									<label class="control-label">Gender</label>
									<input type="text" name="Gender" class="form-control Gender"  id="gender" value="<?php echo (!empty($user['Gender'])) ? $user['Gender']: ''; ?>" readonly>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 UserTypeDiv" id="userTypeDiv">
								<div class="form-group label-floating">
									<label class="control-label ">User Type</label>
									<input type="text" name="UserType" class="form-control UserType"  id="userType" value="<?php echo (!empty($user['UserType']) && $user['UserType'] == 1) ? 'Individual': 'Corporate'; ?>" readonly>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" id="classNameDiv">
								<div class="form-group label-floating">
									<label class="control-label "> Class Name</label>
									<input type="text" name="ClassName" class="form-control ClassName"  id="className" value="<?php echo (!empty($user['ClassName'])) ? $user['ClassName']: 'Class not assigned to you yet'; ?>" readonly>
								</div>
							</div>
							<!--div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 CorpTypeDiv" id="corpTypeDiv">
								<div class="form-group label-floating">
									<label class="control-label "> Class Name</label>
									<input type="text" name="CorpType" class="form-control CorpType"  id="corpType" value="<?php //echo (!empty($user['ClassName'])) ? $user['ClassName']: 'Class not assigned to you yet'; ?>" readonly>
								</div>
							</div---->
						</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-2 col-md-3 col-lg-2 col-xl-2  col-xs-offset-0  col-sm-offset-8  col-md-offset-6  col-lg-offset-8 col-xl-offset-8">
							<button type="submit"  value="CheckOut" class="btn btn-rose btn-block Submit pull-right-mar-10 mar-top-25px">Submit</button>
						</div>
						<div class="col-xs-6 col-sm-2 col-md-3 col-lg-2 col-xl-2">
							<button type="button" class="btn btn-primary btn-block pull-right-mar-10 mar-top-25px"  onclick=" window.history.go(-1)">Cancel</button>
							<div class="clearfix"></div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('footer'); ?>
 <script src="<?php echo base_url('assets/validation/payForYoga.js'); ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('body').on("change",'#packageType', function () {
	var base_url = $('#base_url').val();
    var pack = $(this).val();
    var curr = $('#formPayforYoga').find('#hiddenfields');
	var yogaCost="<label class='rupee'><i class='fa fa-inr' aria-hidden='true'></i>";
	if(pack){
		$.ajax({
			 type: "POST",
			 url: base_url+'User/get_yogaCost',
			 data: {YogaDuration: pack},
			 dataType: 'JSON',
			 success: function(result) {
				 if(result != 'error') {
					$('#packageCostDiv').show();
					yogaCost+=result.YogaCost+'/'+result.YogaDuration+' - Five classes per week';
					$('#packageCost').html(yogaCost);
					curr.find('input[name="TXN_AMOUNT"]').val('');
					curr.find('input[name="TXN_AMOUNT"]').val(result.YogaCost);
					console.log(result.YogaCost);
				 }
				 yogaCost+='</label>';
			}
		});
	} else {
		$('#packageCostDiv').hide();
	}

  });
  $('#userType').on("change",function () {
	var base_url = $('#base_url').val();
    var userType = $(this).val();
    var companyName ='<option value=" "></option>';
	if(userType == 'CORP'){
		$('#corpTypeDiv').show();
	}
	else{
		$('#corpTypeDiv').hide();
	}
	$.ajax({
		 type: "POST",
		 url: base_url+'User/get_companyName',
		// data: {PackageType: packageType},
		 dataType: 'JSON',
		 success: function(result){
			 if(result != 'error') {
				 for(var i=0;i<result.length;i++){
					companyName +='<option value="'+result[i].CorpId+'">'+result[i].CompanyName+'</option>';
				 }
			 }
			$("#corpType").html('');
			$("#corpType").html(companyName);
		}
	});

  });
});
$(document).ready(function() {
	$('.sidebar-wrapper').find('.nav li').removeClass('active');
	$('.sidebar-wrapper').find('.nav li.PaymentHistory').addClass('active');
});
</script>
