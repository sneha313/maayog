<?php $this->load->view('header'); 
?>
<style>
a {
    color: rgb(153, 153, 178);
    font-weight: 500;
}
a:hover {
    color: rgb(153, 153, 178);
    font-weight: 500;
}
	
	.modal .modal-header .close {
		border-radius: 50%;
		padding: 5px 10px;
		font-size: x-large;
		color: #ffffff;
		background: #9c27b0;
		margin-top: -40px;
		margin-right: -40px;
		box-shadow: 0px 3px 20px -2px #7b7b7b, 0px 2px 8px 2px #868686;
	}
	.modal-open .modal {
		overflow-x: hidden;
		overflow-y: auto;
		background: #00000061;
	}
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
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
						<div class="alert alert-success" id="feedbackAlert"  style="display:<?php echo ($this->session->flashdata('succ') == 'success') ? 'block':'none' ?>"><i data-notify="icon" class="material-icons">add_alert</i>
						<span class="text-center"><strong>We have received your feedback </strong> will get back to you soon.</span>
						</div>
						</div>
					</div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
							
					<div class="alert alert-danger"  style="display:<?php echo ($this->session->flashdata('err') == 'error') ? 'block':'none' ?>"><i data-notify="icon" class="material-icons">add_alert</i>
						<button type="button" name="close" aria-hidden="true" class="close">×</button>
						<span><strong>Oops something went wrong! </strong>Please try again.</span>
					</div>
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="purple">
                                    <i class="material-icons">info_outline</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Package Types</p>
                                    <h3 class="title"><?php echo !(empty($package)) ? count($package) : '0'; ?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
									
									<a href="javascript:void(0);" id="yogaPackage"> <i class="material-icons">update</i>Get Package Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                             <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">store</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Upcoming Class</p>
                                    <h3 class="title"><?php echo (!empty($upcoming_class)) ? $upcoming_class : 'Class not assigned'; ?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <a href="<?php echo base_url('class-calendar'); ?>"> <i class="material-icons">update</i> Get Your Class Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
						<div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">payment</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Last Payment Made</p>
									<?php if(!empty($paymentTransac)){
										$transacDate = strtotime($paymentTransac['TXNDATE']);?>
                                    <h3 class="title"><i class="fa fa-inr"></i><?php echo $paymentTransac['TXNAMOUNT']; ?><small> <?php echo  "on ( ".date('d M Y', $transacDate). " )"; ?></small></h3>
									<?php } else{?>
											<h3 class="title">No recent transaction</h3>
										<?php } ?>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
									<a href="<?php echo base_url('payment-history'); ?>"> <i class="material-icons">update</i>Get Payment History</a>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
						 <div class="col-lg-4 col-md-6 col-sm-6">
                           <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">person</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Refer a Friend</p>
                                    <h3 class="title">MaaYog</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                       <a href="<?php echo base_url('contact/01'); ?>" id="referFriend"> <i class="material-icons">update</i>Click Here to Refer Your Friend</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="red">
                                   <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Yoga News & Updates</p>
                                    <h3 class="title">Coming soon</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">update</i> Yoga Tips And Latest News  Updates
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="fa fa-medkit"></i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Events</p>
                                    <h3 class="title">Coming soon</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">update</i> Yoga Events For Better Health
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	<div class="modal fade GetPackageDetail" id="getPackageDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" onclick="resetModal()">&times;</span></button>
                 <h5 class="modal-title" id="myModalLabel">Package Detail</h5>
             </div>
			 
             <div class="modal-body" id="UserActionBody">
				<table class = "table table-bordered">
					<tr>
						<th>Package Type</th>
						<th>Package Cost</th>
					</tr>
					<?php if(!empty($package)) { foreach($package as $k => $cost) {?>
					<tr>
						<td><?php echo $cost['YogaDuration']; ?></td>
						<td><?php echo $cost['YogaCost']; ?></td>
					</tr>
					<?php } } ?>
				</table>
             </div>
        </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>
<script>
$(document).ready(function() {
	setTimeout(function() {
		$('#feedbackAlert').fadeOut('slow');
	}, 3000);
});
$(document).ready(function() {
      demo.initDashboardPageCharts();
            
    });
	$("#yogaPackage").click(function(){
		$('.GetPackageDetail').modal({ backdrop: false, keyboard: false, show: true });
		
	});
</script>
<script type="text/javascript">
$(document).ready(function() {
	$('.sidebar-wrapper').find('.nav li').removeClass('active');
	$('.sidebar-wrapper').find('.nav li.dashboard').addClass('active');
});
</script>