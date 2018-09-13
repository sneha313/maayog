<?php $this->load->view('header');
$refer = $this->uri->segment(2);

 ?>

<!--style>
.btn-group.open>.dropdown-toggle.btn, .btn-group.open>.dropdown-toggle.btn.btn-default {
    background-color: #773a98;
}
  .btn.btn-default{
    background-color: #773a98;
    color: #FFFFFF;
} 
.btn-default:hover{
    background-color: #773a98 !important;
    color: #FFFFFF;
}
.btn-default:focus{
    background-color: #773a98;
    color: #FFFFFF;
}
.checkbox input[type=checkbox] {
    opacity: inherit;
    position: absolute;
    margin: 0;
    z-index: 555555555555555555555;
    width: inherit;
    height: auto;
    overflow: hidden;
    left: 0;
    pointer-events: none;
    color: #333;
}
.row.Captcha .help-block {
    margin-top: -18px !important; 
}

</style-->
<div class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-2">
			<div class="card card-form">
				<div class="card-header card-header-form bg-rose">
					<i class="material-icons">perm_identity</i>
				</div>
				<div class="card-header-text-form bg-rose">
					<h4 class="title">Contact Us -
					<small>Write Your Message</small></h4>
				</div>
				<div class="card-content card-content-form">
					<form id="contactForm" action="<?php echo base_url('User/insert_message'); ?>" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group label-floating">
									<label class="control-label">Subject</label>
									<select class="form-control FeedbackType" id="feedbackType" name="FeedbackType">
										<option value=""></option>
										   <?php
											  if(!empty($feedback_type)){
												foreach($feedback_type as $feedback){
										?>
										<option value="<?php echo $feedback['FeedbackTypeId'];  ?>"><?php echo $feedback['FeedbackName']; ?></option>
										<?php } }?>
									</select>
								</div>
							</div>
						</div>
						<div class="row" id="friendNameDiv" style="display:<?php echo $refer == 01 ?'block' : 'none'; ?>">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group label-floating">
									<label class="control-label">Friend Name</label>
									<input type="text" name="FriendName"class="form-control FriendName" id="friendName">
								</div>
							</div>
						</div>
						<div class="row" id="emailAddressDiv" style="display:<?php echo $refer == 01 ?'block' : 'none'; ?>">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group label-floating">
									<label class="control-label">Email Address</label>
									<input type="text" name="EmailAddress"class="form-control EmailAddress" id="emailAddress">
								</div>
							</div>
						</div>
						<div class="row" id="mobileNumberDiv" style="display:<?php echo $refer == 01 ?'block' : 'none'; ?>">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group label-floating">
									<label class="control-label">Mobile Number</label>
									<input type="text" name="MobileNumber"class="form-control MobileNumber" id="mobileNumber">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group label-floating">
									<label class="control-label">Message</label>
									<textarea name="Message"class="form-control Message"></textarea>
								</div>
							</div>
						</div>
						<br>
						<div class="row Captcha" >
							<!--div class="col-xs-12 col-sm-12 col-md-6  col-lg-6 ">
								<div id="captcha" class="CaptchaResize" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
								<input type="hidden" name="hiddencaptcha" id="hiddencaptcha">
								<div class="clearfix"></div>
							</div-->
							<div class="col-xs-12 col-sm-12 col-md-12  col-lg-12 ">
								<button type="submit" name="Submit" class="btn btn-rose pull-right">Submit</button>
								<button type="submit" name="Submit" class="btn btn-primary pull-right"  onclick=" window.history.go(-1)">Cancel</button>
							</div>
							<input type="hidden" name="FlashMessage" id="flashMessage" value="<?php echo $refer; ?>">
						</div>
					</form>
				</div>
			</div>

		</div>
		
	</div>										
</div>
<?php $this->load->view('footer'); ?>
<!--script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script-->
<script>
$(document).ready(function() {
	$('#contactForm').bootstrapValidator({
		// excluded: ':disabled',
		icons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			FeedbackType: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			},  
			Message: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			},
			FriendName: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			},
			EmailAddress: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			},
			MobileNumber: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			}
			// 'hiddencaptcha': {
				// verbose: false,
				// validators: {
					// notEmpty: {
						// message: '* Please varify you are not robot'
					// }
				// }
			// }
					
		}
	})
});

      // var verifyCallback = function(response) {
        // $('#hiddencaptcha').val(response);
		// $('#contactForm').bootstrapValidator('revalidateField', $('#hiddencaptcha'));

      // };
      // var recaptcha;
      // var onloadCallback = function() {
        // recaptcha = grecaptcha.render('captcha', {
          // 'sitekey' : '6LfPWWsUAAAAAIVnqEEVabUXdl8uzyaUhW10Axb-',
          // 'callback' : verifyCallback,
          // 'theme' : 'light'
        // });
      // };
</script>
<script>
$(document).ready(function(){
	$('.sidebar-wrapper').find('.nav li').removeClass('active');
	$('.sidebar-wrapper').find('.nav li.FeedbackForm').addClass('active');
});
$(document).ready(function(){
	var message = $('#flashMessage').val();
	if(message == '01') {
		$('#feedbackType').closest('.form-group.is-empty').addClass('is-focused');
		var feedback = $('#feedbackType option[value="4"]').attr('selected','selected');
	}
	
});
$("#feedbackType").change(function(){
	var feedback= $(this).val();
	// console.log(feedback);
	if(feedback ==4){
		$("#friendNameDiv").css('display','block');
		$("#emailAddressDiv").css('display','block');
		$("#mobileNumberDiv").css('display','block');
	} else{
		$("#friendNameDiv").hide();
		$("#emailAddressDiv").hide();
		$("#mobileNumberDiv").hide();
	}
});
</script>