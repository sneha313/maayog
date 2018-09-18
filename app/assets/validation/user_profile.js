 $(document).ready(function() {
	 var base_url = $('#base_url').val();
	$('#changePwd').bootstrapValidator({
		// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
		icons: {
			valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			CurrentPassword: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					},
					remote: {
						message: 'your current password didnot match please enter correct password',
						type: 'POST',
						url: base_url+'Admin/check_pwd',
						dataType: 'JSON',
					}
				}
			}, 
			NewPassword: {
				verbose: false,
                validators: {
					notEmpty: {
						message: '* This is required field'
					},
                    // identical: {
                        // field: 'ConfirmPassword',
                        // message: 'The new password and confirm password are not the same'
                    // },
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
            },
            ConfirmPassword: {
				verbose: false,
                validators: {
					notEmpty: {
						message: '* This is required field'
					},
                    identical: {
                        field: 'NewPassword',
                        message: 'The new password and confirm password are not the same'
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
	.on('success.form.bv', function(e) {
		e.preventDefault();
		var $form = $(e.target);
		var bv = $form.data('bootstrapValidator');
		// Use Ajax to submit form data
		$.post($form.attr('action'), $form.serialize(), function(result) {
			if(result){
				$('.alert-success').css('display','block');
				$('#changePasswordModal').hide();
				setTimeout(function(){ $('.alert-success').css('display','none');  }, 2000);
			}else{
				$('.alert-danger').css('display','block');
				setTimeout(function(){ window.location.reload();  }, 2000);
			}
		});
	});
});
