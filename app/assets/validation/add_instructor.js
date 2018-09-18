$(document).ready(function() {
	 var base_url = $('#base_url').val();
	$('#addInstruc').bootstrapValidator({
		// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
		icons: {
			valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			InstrucFName: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			},
			InstrucLName: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					},
					CompanyEmail: {
						message: 'Please supply a valid email address'
					}
                    // remote: {
                        // message: 'The email is already used by another user, Enter different email please',
                        // type: 'POST',
                        // url: base_url+'Admin/check_user',
                        // dataType: 'JSON',
                    // }
				}
			},
			InstrucGender: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			},
			InstrucMobile: {
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
			InstrucEmail: {
				verbose: false,
				validators: {
						notEmpty: {
						message: '* This is required field'
					},
					InstrucEmail: {
						message: 'Please supply a valid email address'
					}
					// ,
                    // remote: {
                        // message: 'The email is already used by another user, Enter different email please',
                        // type: 'POST',
                        // url: base_url+'Admin/check_user',
                        // dataType: 'JSON',
                    // }
				}
			}
		}
	})
});

$(document).ready(function(){
	$('.sidebar-wrapper').find('.nav li').removeClass('active');
	$('.sidebar-wrapper').find('.nav li.InstructorManagement').addClass('active');
});