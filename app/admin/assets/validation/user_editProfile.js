 $('#dob').datepicker({
		format:'yyyy-mm-dd',
		autoclose: true,
		todayHighlight: true
});
 $(document).ready(function() {
	var healthCondition = $('#healthCondition');
	var select = this.value;
	healthCondition.change(function () {
		if ($(this).val() == 'concern') {
			$('.HealthProblem').show();
		}
		else $('.HealthProblem').hide(); // hide div if value is not "custom"
	});
	 var base_url = $('#base_url').val();
	$('#editUserProfile').bootstrapValidator({
		// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
	icons: {
			valid: 'glyphicon glyphicon-ok',
			alidating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			ProfilePhoto: {invalid: 'glyphicon glyphicon-remove',
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			},
			FirstName: {invalid: 'glyphicon glyphicon-remove',
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
			DOB: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			},
			Gender: {
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
			
			AddressLine1: {
				verbose: false,
				validators: {
					// notEmpty: {
						// message: '* This field is required'
					// },
					regexp: {
						regexp: /^[a-zA-Z0-9-,. ]+$/,
						message: '* This field only takes numbers, alphabetes space comma, and dot'
					}
				}
			},
			AddressLine2: {
				verbose: false,
				validators: {
					// notEmpty: {
						// message: '* This field is required'
					// },
					regexp: {
						regexp: /^[a-zA-Z0-9-,. ]+$/,
						message: '* This field only takes numbers, alphabetes space comma, and dot'
					}
				}
			},
			City: {
				verbose: false,
				validators: {
					// notEmpty: {
						// message: '* This field is required'
					// },
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes alphabets and  space'
					}
				}
			},
			State: {
				verbose: false,
				validators: {
					// notEmpty: {
						// message: '* This field is required'
					// },
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes alphabets and  space'
					}
				}
			},
			PinCode: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This field is required'
					}
					stringLength: {
						min:6,
						max:6,
						message: 'This field takes only 6 digits.'
					},
					regexp: {
						regexp: /^[0-9 ]+$/,
						message: '* This field only takes numbers'
					}
				}
			},
			Country: {
				verbose: false,
				validators: {
					// notEmpty: {
						// message: '* This field is required'
					// },
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes alphabets and  space'
					}
				}
			},
			HealthCondition: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This field is required'
					}
				}
			},
			HealthProblem: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This field is required'
					}
				}
			}
		}
	})
});
