 $('body').on('change','.day,.month,.year', function(){
	console.log($(this).val());
	var day= $(this).val();
	if( day == '' ) {
		$(this).closest('.form-group.label-floating.is-empty').addClass('is-focused');
	}
});
 $(document).ready(function() {
	 var addr = $("#checkAddress").val();
	if(addr ==1){
		$("#checkAddress").attr('checked', true);
			$("#localAddressLine1").attr('readonly','readonly');
			$("#localAddressLine2").attr('readonly','readonly');
			$("#localCity").attr('readonly','readonly');
			$("#localState").attr('readonly','readonly');
			$("#localPinCode").attr('readonly','readonly');
			$("#localCountry").attr('readonly','readonly');

	}
	 $("#checkAddress").change(function() {
		//var dateStr;
		if (this.checked) {
			//var now = new Date();
			//dateStr = now.getDate() + "." + (now.getMonth() + 1) + "." + now.getFullYear();
			var country = $("#country").val();
			var pinCode = $("#pinCode").val();
			var state = $("#state").val();
			var city = $("#city").val();
			var addressLine2 = $("#addressLine2").val();
			var addressLine1 = $("#addressLine1").val();
			$("#localAddressLine1").val(addressLine1).attr('readonly','readonly');
			$("#localAddressLine2").val(addressLine2).attr('readonly','readonly');
			$("#localCity").val(city).attr('readonly','readonly');
			$("#localState").val(state).attr('readonly','readonly');
			$("#localPinCode").val(pinCode).attr('readonly','readonly');
			$("#localCountry").val(country).attr('readonly','readonly');
			
		} else {
			$("#localAddressLine1").val(' ').removeAttr('readonly');
			$("#localAddressLine2").val(' ').removeAttr('readonly');
			$("#localCity").val(' ').removeAttr('readonly');
			$("#localState").val(' ').removeAttr('readonly');
			$("#localPinCode").val(' ').removeAttr('readonly');
			$("#localCountry").val(' ').removeAttr('readonly');
			
		}
		
		$('#editUserDetail').bootstrapValidator('revalidateField', $('#localAddress').find('[name="LocalAddressLine1"]'));
		$('#editUserDetail').bootstrapValidator('revalidateField', $('#localAddress').find('[name="LocalAddressLine2"]'));
		$('#editUserDetail').bootstrapValidator('revalidateField', $('#localAddress').find('[name="LocalCity"]'));
		$('#editUserDetail').bootstrapValidator('revalidateField', $('#localAddress').find('[name="LocalState"]'));
		$('#editUserDetail').bootstrapValidator('revalidateField', $('#localAddress').find('[name="LocalPinCode"]'));
		$('#editUserDetail').bootstrapValidator('revalidateField', $('#localAddress').find('[name="LocalCountry"]'));
	});
	$('#dob').combodate({
		minYear: 1970,
		maxYear: 2018,
		minuteStep: 10
	}).on('changeDate', function(){
			$('#editUserDetail').bootstrapValidator('revalidateField', $('#dob').find('[name="DOB"]'));
	});
	$('#healthCondition').change(function () {
		console.log($(this).val());
		if ($(this).val() == 'concern') {
			$('.HealthProblemDiv').show();
		}
		else $('.HealthProblemDiv').hide(); // hide div if value is not "custom"
		// var select;
		// var healthProblemId = $("#healthProblem").val();

		// var healthProblem='<option value=""></option>';
		// $.ajax({
			 // type: "POST",
			 // url: base_url+'User/get_healthProblemforSessionUser',
			 // dataType: 'JSON',
			 // success: function(result){
				 // console.log(result);
				// for(var i=0;i < result.length;i++){
					 // if(healthProblemId == result[i].HealthId){
						  // select = ' selected';
					 // }else{
						  // select = '';
					 // }
					 // healthProblem +="<option value='"+result[i].HealthId+"' "+select+" >"+ result[i].HealthProblemName+"</option>";
				// }
				// $("#healthProblem").append(healthProblem);
			// }
		// });
	});
	 var base_url = $('#base_url').val();
	$('#editUserDetail').bootstrapValidator({
		// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
	icons: {
			invalid: 'glyphicon glyphicon-remove',
			valid: 'glyphicon glyphicon-ok',
			alidating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			UserType: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			},
			// ProfilePhoto: {
				// verbose: false,
				// validators: {
					// notEmpty: {
						// message: '* This is required field'
					// }
				// }
			// },
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
			AadharNumber: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					},
					stringLength: {
						min:12,
						max:12,
						message: 'This field takes only number and it should be 12 digit.'
					},
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
			EmailAddress: {
				verbose: false,
				validators: {
						notEmpty: {
						message: '* This is required field'
					},
					emailAddress: {
						message: 'Please supply a valid email address'
                    }
				}
			},
			AddressLine1: {
				verbose: false,
				validators: {
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes characters and space'
					}
					// notEmpty: {
						// message: '* This field is required'
					// }
				}
			},
			AddressLine2: {
				verbose: false,
				validators: {
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes characters and space'
					}
					// notEmpty: {
						// message: '* This field is required'
					// }
				}
			},
			City: {
				verbose: false,
				validators: {
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes characters and space'
					}
					// notEmpty: {
						// message: '* This field is required'
					// }
				}
			},
			State: {
				verbose: false,
				validators: {
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes characters and space'
					}
					// notEmpty: {
						// message: '* This field is required'
					// }
				}
			},
			PinCode: {
				verbose: false,
				validators: {
					regexp: {
						regexp: /^[0-9+-]+$/,
						message: '* This field only takes numbers'
					}
					// notEmpty: {
						// message: '* This field is required'
					// }
				}
			},
			Country: {
				verbose: false,
				validators: {
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes characters and space'
					}
					// notEmpty: {
						// message: '* This field is required'
					// }
				}
			},
			LocalAddressLine1: {
				verbose: false,
				validators: {
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes characters and space'
					}
					// notEmpty: {
						// message: '* This field is required'
					// }
				}
			},
			LocalAddressLine2: {
				verbose: false,
				validators: {
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes characters and space'
					}
					// notEmpty: {
						// message: '* This field is required'
					// }
				}
			},
			LocalCity: {
				verbose: false,
				validators: {
					// notEmpty: {
						// message: '* This field is required'
					// }
				}
			},
			LocalState: {
				verbose: false,
				validators: {
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes characters and space'
					}
					// notEmpty: {
						// message: '* This field is required'
					// }
				}
			},
			LocalPinCode: {
				verbose: false,
				validators: {
					regexp: {
						regexp: /^[0-9+-]+$/,
						message: '* This field only takes numbers'
					}
					// notEmpty: {
						// message: '* This field is required'
					// }
				}
			},
			LocalCountry: {
				verbose: false,
				validators: {
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: '* This field only takes characters and space'
					}
					// notEmpty: {
						// message: '* This field is required'
					// }
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

