<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
?>
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
    <link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
	<style>
		.FacebookBtn{
			background: #3b5998;
			box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.31), 0 2px 10px 0 rgba(0, 0, 0, 0.38);
		}
		.FacebookLogo{
			margin: 0px 25px 0px 13px;
		}
	</style>
</head>
<body style="/*background-image: url(<?php echo base_url('assets/img/3.png')?>*/">
    <div class="blur">

		<div id="flash_data" data-id="<?php echo $this->session->flashdata('msg'); ?>"> </div>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="cont login-page col-lg-8 col-md-8 col-xs-12 col-sm-offset-2  col-md-offset-2 col-lg-offset-2">
				
                <div class="row">
                    <div class="form sign-in col-md-5">
                       <div class="text-center"> <img src="<?php echo base_url('assets/img/logo.png')?>" class="login-logo"></div>
                        <form id="loginForm" action="<?php echo base_url('dashboard_login'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group label-floating bmd-collapse-inline">
                                        <label class="control-label">Email address </label>
                                        <input type="text" name = "EmailAddress" class="form-control EmailAddress">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group label-floating bmd-collapse-inline">
                                        <label class="control-label">Password </label>
                                        <input type="password" name="Password" class="form-control Password">
                                    </div>
                                </div>
                            </div>
                            <div class="text-right pt-15">
                                <a href="<?php echo base_url('forgotpwd'); ?>" class="f-14">Forgot password?</a>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <button type="submit" class="btn btn-1 btn-block">Log in</button>
                                </div>
								 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
										<a href="https://www.facebook.com/v3.1/dialog/oauth?client_id=1083236595164776&amp;state=8da8373da908dc41d0d39748906b98d3&amp;response_type=code&amp;sdk=php-sdk-5.6.3&amp;redirect_uri=https%3A%2F%2Flocalhost%2FLiveProjects%2Fmaayog%2Fapp%2Fuser_authentication&amp;scope=email"><img src="https://localhost/LiveProjects/maayog/app/assets/images/flogin.png" alt=""></a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="signup link mt-4 title5 text-center">
                                        Don't have account?
                                        <a href="javascript:void(0)" class="title4">Sign Up</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                                </div>
                            </div>
                        </form>



                    </div>
                    <div class="sub-cont col-sm-12 col-xs-12 pr-0">
                        <div class="img" style="background-image: url(<?php echo base_url('assets/img/login.jpeg')?>">
                            <div class="img__text m--up">
                                <h2>New User?</h2>
                                <p>Sign up and discover great amount of new opportunities!</p>
                            </div>
                            <div class="img__text m--in">
                                <h2>One of us?</h2>
                                <p>If you already has an account, just sign in. We've missed you!</p>
                            </div>
                            <div class="img__btn">
                                <span class="m--up">Register</span>
                                <span class="m--in">log In</span>
                            </div>
                        </div>
						<div class="alert x alert-success" style="display:none;"><i data-notify="icon" class="material-icons">add_alert</i>
						<button type="button" name="close" aria-hidden="true" class="close">×</button>
						<span><b> Thank you - </b> you have successfully registered with <strong>maayog</strong></span>
						</div>
						<div class="alert alert-danger" style="display:none;"><i data-notify="icon" class="material-icons">add_alert</i>
							<button type="button" name="close" aria-hidden="true" class="close">×</button>
							<span><strong>Oops something went wrong! </strong>Please try again.</span>
						</div>
                        <div class="form sign-up">
                            <h2 class="h3">Register</h2>
                            <div class="row">
                                <form id="registerPage" action="<?php echo base_url('User/registerUser'); ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
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
                                            <button type="submit" class="btn btn-1 btn-block">Register</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p class="mt-4 title5 text-right signin link ">
                                            Already have account?
                                            <a href="javascript:void(0)" class="title4">Sign In</a>
                                        </p>
                                    </div>
                                </form>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
	
</body>

<?php 
$sess_data = array(
	"UserId" => $this->session->userdata('UserId'),
	"FirstName" => $this->session->userdata('FirstName'),
	"LastName" => $this->session->userdata('LastName'),
	"FullName" => $this->session->userdata('FullName'),
	"EmailAddress" => $this->session->userdata('EmailAddress'),
	"MobileNumber" => $this->session->userdata('MobileNumber'),
	"Role" => $this->session->userdata('Role'),
);
$this->session->unset_userdata($sess_data);
$this->session->sess_destroy($sess_data);
?>
<input type="hidden" id="base_url" value="<?php echo  base_url(); ?>">
<input type="hidden" id="custom_base_url" value="<?php echo  $this->config->item('custom_base_url'); ?>">
<input type="hidden" id="userId" value="<?php echo $this->session->userdata('UserId'); ?>">
<input type="hidden" id="role" value="<?php echo $this->session->userdata('Role'); ?>" >

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

<!-- login validation -->
<script>
$(document).ready(function() {
		var base_url = $('#base_url').val();
		var custom_base_url = $('#custom_base_url').val();
		var userId = $('#userId').val();
		var role = $('#role').val();
		// console.log(role);
		if( (role == 1)  && (base_url == custom_base_url) ){
			location.href= base_url+'dashboard';
		}else{

		}
 }); 
 $(document).ready(function() {

	 var flash_data = $('#flash_data').attr('data-id');
	 var mess = '';
	 switch(flash_data){
		 case 'invalid' :
			mess = '<b>Invalid Credentials ! </b>  Please enter valid Email Id & Password';
			showNotify('top','center', 4, mess);
		 break;
		 case 'forgot' :
			mess = '<b>Your password </b>has been sent to your registered email.';
			showNotify('top','center', 1, mess);
		 break;
		 case 'error' :
			mess = '<b>Oops something went wrong! </b>Please try again.';
			showNotify('top','center', 5, mess);
		 break;
	 }
	 
 });
 $(document).ready(function() {
	var base_url = $('#base_url').val();
	$('#loginForm').find('input[name="EmailAddress"]').val(''); 
	$('#loginForm').find('input[name="Password"]').val(''); 
	$('#loginForm').bootstrapValidator({
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
						message: 'Please enter a valid email address'
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
						message: '* This field only takes characters and numbers'
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
});

$("body").on("click",".alert .close", function() {
	$(this).closest('div').hide();
});
</script>

<!-- sign up validation -->
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
                            message: 'Please enter a valid email address'
                        },
                        remote: {
                            message: 'The email is already used by another user, Enter different email please',
                            type: 'POST',
                            url: base_url+'User/check_user',
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
							regexp: /^(\+?\d{1,3}[- ]?)?\d{10}$/,
							message: '* Enter valid contact number (Ex. +91-9876543210 or 9876543210)'
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
						var mess = '<b> Thank you - </b> you have successfully registered with <b>maayog</b>';
                        showNotify('top','center', 3, mess);
                        setTimeout(function(){ window.location.href= base_url+'login';  }, 3000);
                    }else{
						var mess = '<b>Oops something went wrong! </b>Please try again.';
                         showNotify('top','center', 5, mess);
                        setTimeout(function(){ window.location.reload();  }, 3000);
                    }
                });
            });
    });


    $("body").on("click",".alert .close", function() {
        $(this).closest('div').hide();
    });
</script>
<script>

    //loging page transition effect

    $(".img__btn").click(function(){
        $(".cont").toggleClass("s--signup");
    });

    $('.signup').click (function() {
        $('.cont').addClass('s--signup');
    });
    $('.signin').click (function() {
        $('.cont').removeClass('s--signup');
    });
</script>
<script>
function showNotify(from, align, color,mess) {
	type = ['', 'info', 'danger', 'success', 'warning', 'rose', 'primary'];

	// color = Math.floor((Math.random() * 6) + 1);
	
	$.notify({
	  icon: "add_alert",
	  message: mess

	}, {
	  type: type[color],
	  timer: 3000,
	  placement: {
	from: from,
	align: align
	  }
	});
};
</script>
</html>