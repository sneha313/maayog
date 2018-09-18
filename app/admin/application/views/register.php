<!doctype html>
<html lang="en">
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
		<div class="wrapper ">
			<div class="content margin-top-10per">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xs-offset-0 col-sm-offset-3  col-md-offset-4 col-lg-offset-4">
						<div class="alert alert-success" style="display:none;">
							<button type="button" aria-hidden="true" class="close">×</button>
							<span><b> Thank you - </b> you have successfully registered with <strong>maayog</strong></span>
						</div>
						<div class="alert alert-danger"  style="display:none">
							<button type="button" aria-hidden="true" class="close">×</button>
							<span><b> Oops - </b>  Something went wrong, Please register again</span>
						</div>
						<div class="card card-register">
							<div class="card-header bg-rose">
								<h4 class="title">Register</h4>
								<p class="category">Create An Account for Maayog</p>
							</div>
							<div class="card-content">
								<form id="registerPage" action="<?php echo base_url('Admin/registerUser'); ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
									<div class="row">
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
											<div class="form-group label-floating">
												<label class="control-label">First Name</label>
												<input type="text" name="FirstName" class="form-control FirstName">
											</div>
										</div>
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
											<div class="form-group label-floating">
												<label class="control-label">Last Name</label>
												<input type="text" name="LastName" class="form-control LastName">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="form-group label-floating">
												<label class="control-label">Email Address</label>
												<input type="text" name="EmailAddress"class="form-control EmailAddress">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="form-group label-floating">
												<label class="control-label">Mobile Number</label>
												<input type="text" name="MobileNumber"class="form-control MobileNumber" >
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="form-group label-floating">
												<label class="control-label">Password</label>
												<input type="password" name="Password" class="form-control Password">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<button type="submit" class="btn btn-rose btn-block">Register</button>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
											<a class="text-rose" href="<?php echo base_url('login'); ?>">ALREADY HAVE AN ACCOUNT?</a>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
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
	$('#registerPage').bootstrapValidator({
		// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
		icons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			FirstName: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					},
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes characters and space'
					}
				}
			},
			 LastName: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					},
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes characters and space'
					}
				}
			},
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
                        message: 'The email is already used by another user, Enter different email please',
                        type: 'POST',
                        url: base_url+'Admin/check_user',
                        dataType: 'JSON',
                    }
				}
			},
			MobileNumber: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					},
					stringLength: {
						min:10,
						max:15,
						message: 'This field takes only digit and minimum digit should be 10 and maximum should be 15.'
					},
					regexp: {
						regexp: /^[0-9+-]+$/,
						message: '* This field only takes numbers and  + -'
					}
				}
			},
			Password: {
				verbose: false,
				validators: {
					notEmpty: {
						message: 'Please enter a password'
					},
					regexp: {
						regexp: /^[a-zA-Z0-9]+$/,
						message: '* This field only takes characters and space'
					},
					stringLength: {
						min: 5,
						max: 15,
						message:'Please enter at least 5 characters and no more than 15'
					}
				}
			}
		}
	})
	.on('success.form.bv', function(e) {
		e.preventDefault();
		var $form = $(e.target);
		var bv = $form.data('bootstrapValidator');
		// Use Ajax to submit form data
		$.post($form.attr('action'), $form.serialize(), function(result) {
			if(result){
				$('.alert-success').css('display','block');
				// setTimeout(function(){ window.location.href= base_url+'login';  }, 2000);
			}else{
				$('.alert-danger').css('display','block');
				// setTimeout(function(){ window.location.reload();  }, 2000);
			}
		});
	});
});


$("body").on("click",".alert .close", function() {
	$(this).closest('div').hide();
});
</script>
</html>