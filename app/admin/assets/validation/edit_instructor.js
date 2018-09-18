$(document).ready(function(){
	var postalAddress1 = $('#addressLine1').val();
	var postalAddress2 = $('#addressLine2').val();
	var postalCity = $('#city').val();
	var postalState = $('#state').val();
	var postalPinCode = $('#pinCode').val();
	var postalCountry = $('#country').val();
	var localAddr1 = $("#localAddressLine1").val();
	var localAddr2 = $("#localAddressLine2").val();
	var localCity = $("#localCity").val();
	var localState = $("#localState").val();
	var localPincode = $("#localPinCode").val();
	var localCountry= $("#localCountry").val();
	if(postalAddress1 == localAddr1 && postalAddress2 == localAddr2 && postalCity == localCity && postalState == localState && postalPinCode == localPincode && postalCountry == localCountry){
		$("#checkboxAddress").prop('checked', true);
	}
});
	
$("#checkboxAddress").change(function() {
	var postalAddress1 = $('#addressLine1').val();
	var postalAddress2 = $('#addressLine2').val();
	var postalCity = $('#city').val();
	var postalState = $('#state').val();
	var postalPinCode = $('#pinCode').val();
	var postalCountry = $('#country').val();
	if($(this).prop('checked')) {

		var localAddr1 = $("#localAddressLine1").val(postalAddress1);
		var localAddr2 = $("#localAddressLine2").val(postalAddress2);
		var localCity = $("#localCity").val(postalCity);
		var localState = $("#localState").val(postalState);
		var localPincode = $("#localPinCode").val(postalPinCode);
		var localCountry= $("#localCountry").val(postalCountry);
		$("#localAddressLine1").attr("readonly","readonly");
		$("#localAddressLine2").attr("readonly","readonly");
		$("#localCity").attr("readonly","readonly");
		$("#localState").attr("readonly","readonly");
		$("#localPinCode").attr("readonly","readonly");
		$("#localCountry").attr("readonly","readonly");
	} else {

		$("#localAddressLine1").val(' ');
		$("#localAddressLine2").val(' ');
		$("#localCity").val(' ');
		$("#localState").val(' ');
		$("#localPinCode").val(' ');
		$("#localCountry").val(' ');
		$("#localAddressLine1").removeAttr("readonly","readonly");
		$("#localAddressLine2").removeAttr("readonly","readonly");
		$("#localCity").removeAttr("readonly","readonly");
		$("#localState").removeAttr("readonly","readonly");
		$("#localPinCode").removeAttr("readonly","readonly");
		$("#localCountry").removeAttr("readonly","readonly");
	}
	$('#editInstruc').bootstrapValidator('revalidateField', $('[name="LocalAddressLine1"]'));
	$('#editInstruc').bootstrapValidator('revalidateField', $('[name="LocalAddressLine2"]'));
	$('#editInstruc').bootstrapValidator('revalidateField', $('[name="LocalCity"]'));
	$('#editInstruc').bootstrapValidator('revalidateField', $('[name="LocalState"]'));
	$('#editInstruc').bootstrapValidator('revalidateField', $('[name="LocalPinCode"]'));
	$('#editInstruc').bootstrapValidator('revalidateField', $('[name="LocalCountry"]'));
});
 $('body').on('change','.day,.month,.year', function(){
	// console.log($(this).val());
	var day= $(this).val();
		$(this).closest('.form-group.label-floating.is-empty').addClass('is-focused');

});
$('#dob').combodate({
		minYear: 1970,
		maxYear: 2018,
		minuteStep: 10
}).on('changeDate', function(){
		$('#editIndUser').bootstrapValidator('revalidateField', $('#dob').find('[name="DOB"]'));
});
$(document).ready(function() {
	 var base_url = $('#base_url').val();
	$('#editInstruc').bootstrapValidator({
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
					},
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes characters and space'
					}
				}
			},
			InstrucLName: {
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
						regexp: /^(\+?\d{1,3}[- ]?)?\d{10}$/,
						message: '* Enter valid contact number (Ex. +91-9876543210 or 9876543210)'
					}
				}
			},
			InstrucEmail: {
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
			DOB: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This field is required'
					}
				}
			},
			AadharNumber: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					},
					stringLength: {
						min:12,
						max:12,
						message: 'This field takes only 12 digit.'
					},
					regexp: {
						regexp: /^[0-9]+$/,
						message: '* This field only takes numbers'
					}
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
			InstructorProfession: {
				verbose: false,
				validators: {
					// notEmpty: {
						// message: '* This is required field'
					// }
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes characters and space'
					}
				}
			},
			InstructorWorking: {
				verbose: false,
				validators: {
					// notEmpty: {
						// message: '* This is required field'
					// }
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes characters and space'
					}
				}
			},
			InstructorDesignation: {
				verbose: false,
				validators: {
					// notEmpty: {
						// message: '* This is required field'
					// }
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes characters and space'
					}
				}
			},
			AddressLine1: {
				verbose: false,
				validators: {
					// notEmpty: {
						// message: '* This is required field'
					// }
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
						// message: '* This is required field'
					// }
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
						// message: '* This is required field'
					// }
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
						// message: '* This is required field'
					// }
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes alphabets and  space'
					}
				}
			},
			PinCode: {
				verbose: false,
				validators: {
					// notEmpty: {
						// message: '* This is required field'
					// }
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
					// notEmpty: {
						// message: '* This is required field'
					// }
					
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes alphabets and  space'
					}
				}
			},
			LocalAddressLine1: {
				verbose: false,
				validators: {
					// notEmpty: {
						// message: '* This is required field'
					// }
					
					regexp: {
						regexp: /^[a-zA-Z0-9-,. ]+$/,
						message: '* This field only takes numbers, alphabetes space comma, and dot'
					}
				}
			},
			LocalAddressLine2: {
				verbose: false,
				validators: {
					// notEmpty: {
						// message: '* This is required field'
					// }
					
					regexp: {
						regexp: /^[a-zA-Z0-9-,. ]+$/,
						message: '* This field only takes numbers, alphabetes space comma, and dot'
					}
				}
			},
			LocalCity: {
				verbose: false,
				validators: {
					// notEmpty: {
						// message: '* This is required field'
					// }
					
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes alphabets and  space'
					}
				}
			},
			LocalState: {
				verbose: false,
				validators: {
					// notEmpty: {
						// message: '* This is required field'
					// }
					
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes alphabets and  space'
					}
				}
			},
			LocalPinCode: {
				verbose: false,
				validators: {
					// notEmpty: {
						// message: '* This is required field'
					// }
					
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
			LocalCountry: {
				verbose: false,
				validators: {
					// notEmpty: {
						// message: '* This is required field'
					// }
					
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes alphabets and  space'
					}
				}
			}
		}
	})
});

$(document).ready(function(){
	$('.sidebar-wrapper').find('.nav li').removeClass('active');
	$('.sidebar-wrapper').find('.nav li.InstructorManagement').addClass('active');
});