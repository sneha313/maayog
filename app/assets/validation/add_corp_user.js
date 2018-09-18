$(document).ready(function() {
	 var base_url = $('#base_url').val();
	$('#addCorp').bootstrapValidator({
		// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
		icons: {
			valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			CompanyName: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			},
			CompanyEmail: {
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
			GSTNumber: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			},
			CompanyPhone: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					},
					stringLength: {
						min:10,
						max:15,
						message: 'This field takes only digit and minimum digit should be 10.'
					},
					regexp: {
						regexp: /^[0-9+-]+$/,
						message: '* This field only takes numbers and  + -'
					}
				}
			},
			FBLink: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This field is required'
					}
				}
			},
			MapLink: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This field is required'
					}
				}
			},
			// PhotoUpload: {
				// verbose: false,
				// validators: {
					// notEmpty: {
						// message: '* This field is required'
					// }
				// }
			// },
			// LogoUpload: {
				// verbose: false,
				// validators: {
					// notEmpty: {
						// message: '* This field is required'
					// }
				// }
			// },
			AddressLine1: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This field is required'
					}
				}
			},
			AddressLine2: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This field is required'
					}
				}
			},
			City: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This field is required'
					}
				}
			},
			State: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This field is required'
					}
				}
			},
			PinCode: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This field is required'
					}
				}
			},
			Country: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This field is required'
					}
				}
			},
			ContactPersonFName: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This field is required'
					}
				}
			},
			ContactPersonLName: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This field is required'
					}
				}
			},
			ContactPersonEmail: {
				verbose: false,
				validators: {
						notEmpty: {
						message: '* This is required field'
					},
					CompanyEmail: {
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
			},
			ContactPersonMobile: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					},
					stringLength: {
						min:10,
						max:15,
						message: 'This field takes only digit and minimum digit should be 10.'
					},
					regexp: {
						regexp: /^[0-9+-]+$/,
						message: '* This field only takes numbers and  + -'
					}
				}
			},
			ContactPersonLandLine: {
				verbose: false,
				validators: {
					stringLength: {
						min:10,
						max:15,
						message: 'This field takes only digit and minimum digit should be 10.'
					},
					regexp: {
						regexp: /^[0-9+-]+$/,
						message: '* This field only takes numbers and  + -'
					}
				}
			},
		}
	})
});

$(document).ready(function(){
	$('.sidebar-wrapper').find('.nav li').removeClass('active');
	$('.sidebar-wrapper').find('.nav li.CorpUserManagement').addClass('active');
});