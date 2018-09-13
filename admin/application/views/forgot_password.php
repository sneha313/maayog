<html lang="en" class="perfect-scrollbar-on">
<head>
		<meta charset="utf-8" />
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-icon.png" />
		<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>MaaYog</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta name="viewport" content="width=device-width" />
		<!-- Bootstrap core CSS     -->
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
		<!--  Material Dashboard CSS    -->
		<link href="<?php echo base_url(); ?>assets/css/material-dashboard.css" rel="stylesheet" />
		<!--  CSS for Demo Purpose, don't include it in your project     -->
		<link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" />
		<!--     Fonts and icons     -->
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
		
</head>

<body style="overflow:hidden;">
	<div class="content margin-top-10per">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xs-offset-0 col-sm-offset-3  col-md-offset-4 col-lg-offset-4">
				<div class="alert alert-danger"  style="display:<?php echo (!empty($Success)) ? 'block':'none' ?>">
					<button type="button" name="close" aria-hidden="true" class="close">×</button>
					<span><strong> Invalid Credentials ! </strong>  Please enter valid Email Id & Password</span>
				</div>
				<div class="card">
					<div class="bg-rose">
						
						<h4 class="title text-center forgotpwd">Forgot Your Password?</h4>
						
					</div>
					<div class="card-content">
						<form action="<?php  echo base_url('Admin/index'); ?>" id="forgotpassword" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label">Email address</label>
										<input type="email" name="EmailAddress" class="form-control EmailAddress">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<button type="submit" class="btn btn-rose btn-block">Submit</button>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<button type="button" class="btn btn-rose btn-block" onclick=" window.history.go(-1)">Back</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<input type="hidden" id="base_url" value="<?php echo  base_url(); ?>">
	<!--   Core JS Files   -->
	<script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-validator.min.js" type="text/javascript"></script>

	<script src="<?php echo base_url(); ?>assets/js/material.min.js" type="text/javascript"></script>
	<!--  Charts Plugin -->
	<script src="<?php echo base_url(); ?>assets/js/chartist.min.js"></script>
	<!--  Dynamic Elements plugin -->
	<script src="<?php echo base_url(); ?>assets/js/arrive.min.js"></script>
	<!--  PerfectScrollbar Library -->
	<script src="<?php echo base_url(); ?>assets/js/perfect-scrollbar.jquery.min.js"></script>
	<!--  Notifications Plugin    -->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.js"></script>
	<!--  Google Maps Plugin    -->
	<!-- Material Dashboard javascript methods -->
	<script src="<?php echo base_url(); ?>assets/js/material-dashboard.js?v=1.2.0"></script>
	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
	<script>
		 $(document).ready(function() {
			var base_url = $('#base_url').val();
				$('#forgotpassword').find('input[name="EmailAddress"]').val(' '); 
			$('#forgotpassword').bootstrapValidator({
				// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
				icons: {
					valid: 'glyphicon glyphicon-ok',
					invalid: 'glyphicon glyphicon-remove',
					validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
					EmailAddress: {
						verbose: false,
						validators: {
								notEmpty: {
								message: '* This is required field'
							},
							emailAddress: {
								message: 'Please supply a valid email address'
							},
							remote: {
								message: 'This email does not exist, please enter the same mail you registred with',
								type: 'POST',
								url: base_url+'Admin/check_mail',
								dataType: 'JSON',
							}
						}
					}
				}
			})
		});
		
		$("body").on("click",".alert .close", function() {
			$(this).closest('div').hide();
		});
	</script>
</body>
</html>