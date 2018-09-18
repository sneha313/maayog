$(document).ready(function() {
	 var base_url = $('#base_url').val();
	$('#editcorp').bootstrapValidator({
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
					},
					regexp: {
						regexp: /^[a-zA-Z]+[a-zA-Z\s]+$/,
						message: '* This field only takes characters'
					}
				}
			},
			CompanyEmail: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					},
					emailAddress: {
						message: 'Please enter a valid email address'
					}
                    // remote: {
                        // message: 'The email is already used by another user, Enter different email please',
                        // type: 'POST',
                        // url: base_url+'Admin/check_user',
                        // dataType: 'JSON',
                    // }
				}
			},
			// GSTNumber: {
				// verbose: false,
				// validators: {
					// notEmpty: {
						// message: '* This is required field'
					// }
				// }
			// },
			CompanyPhone: {
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
			FBLink: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This field is required'
					},
					regexp: {
						regexp:  /^(?:(?:http|https):\/\/)?(?:www.)?facebook.com\/(?:(?:\w)*#!\/)?(?:pages\/)?(?:[?\w\-]*\/)?(?:profile.php\?id=(?=\d.*))?([\w\-]*)?/,
						message: 'Please provide valid URL'
					}
				}
			},
			// MapLink: {
				// verbose: false,
				// validators: {
					// notEmpty: {
						// message: '* This field is required'
					// }
				// }
			// },
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
					},
					regexp: {
						regexp: /^[a-zA-Z0-9-,. ]+$/,
						message: '* This field only takes numbers, alphabetes space comma, and dot'
					}
				}
			},
			AddressLine2: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This field is required'
					},
					regexp: {
						regexp: /^[a-zA-Z0-9-,. ]+$/,
						message: '* This field only takes numbers, alphabetes space comma, and dot'
					}
				}
			},
			City: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This field is required'
					},
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes alphabets and  space'
					}
				}
			},
			State: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This field is required'
					},
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
					},
					stringLength: {
						min:6,
						max:6,
						message: 'This field takes only 6 digits.'
					},
					regexp: {
						regexp: /^[0-9]+$/,
						message: '* This field only takes numbers'
					}
				}
			},
			Country: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This field is required'
					},
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes alphabets and  space'
					}
				}
			},
			ContactPersonFName: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This field is required'
					},
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes alphabets'
					}
				}
			},
			ContactPersonLName: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This field is required'
					},
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes alphabets'
					}
				}
			},
			ContactPersonEmail: {
				verbose: false,
				validators: {
						notEmpty: {
						message: '* This is required field'
					},
					emailAddress: {
						message: 'Please enter a valid email address'
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
						regexp: /^(\+?\d{1,3}[- ]?)?\d{10}$/,
						message: '* Enter valid contact number (Ex. +91-9876543210 or 9876543210)'
					}
				}
			},
			ContactPersonLandLine: {
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
						regexp: /^(\+?\d{1,3}[- ]?)?\d{10}$/,
						message: '* Enter valid contact number (Ex. +91-9876543210 or 9876543210)'
					}
				}
			}
		}
	})
});

$(document).ready(function(){
	$('.sidebar-wrapper').find('.nav li').removeClass('active');
	$('.sidebar-wrapper').find('.nav li.CorpUserManagement').addClass('active');
});