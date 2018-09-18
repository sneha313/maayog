$('#dob').datepicker({
		format:'yyyy-mm-dd',
		autoclose: true,
		todayHighlight: true
});
$(document).ready(function(){
	var type = $('#userType');
	type.change(function () {
		if($(this).val() == 'Corporate') {
			$('.CorporateTypeDiv').show();
		}
		else $('.CorporateTypeDiv').hide();
	});
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
	$('#addIndUser').bootstrapValidator({
		// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
		icons: {
			valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
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
					},
                    remote: {
                        message: 'The email is already used by another user, Enter different email please',
                        type: 'POST',
                        url: base_url+'Admin/check_user',
                        dataType: 'JSON',
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
			DOB: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This field is required'
					}
				}
			},
			ClassName: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This field is required'
					}
				}
			},
			Address: {
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
			},
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
			}
		}
	})
});

$('#className').bind('change', function () {
	var base_url = $('#base_url').val();
    //var classame = $('#className').val();
    var classId = $(this).val();
	
	$.ajax({
		 type: "POST",
		 url: base_url+'Admin/getDateByClassId',
		 data: {ClassId: classId},
		 dataType: 'JSON',
		 success: function(result){
			 //var timeslot='';
			 if(result != 'error') {
				 console.log(result);
					var startDate= new Date(result.StartDate);
					var startMonth = startDate.getMonth() + 1;
					var startMonthName = moment.months(startMonth - 1); 
					var myStartDate = startDate.getDate();
					var startDateName= myStartDate < 10 ? '0' + myStartDate : '' + myStartDate;
					var startDay = startDate.getDay();
					var startYear = startDate.getFullYear();
					var sd = startDateName  + " " + startMonthName + ", "+ startYear;
					var endDate=new Date(result.EndDate);
					var endMonth = endDate.getMonth() + 1;
					var endMonthName = moment.months(endMonth - 1); 
					var myEndDate = endDate.getDate();
					var endDateName= myEndDate < 10 ? '0' + myEndDate : '' + myEndDate;
					var day = endDate.getDay();
					var endYear = endDate.getFullYear();
					var ed = endDateName + " " + endMonthName+ ", "+ endYear;
					$("#timeSlot").val(sd+ " - "+ ed);
			 }
		}
	});
});

$(document).ready(function(){
	$('.sidebar-wrapper').find('.nav li').removeClass('active');
	$('.sidebar-wrapper').find('.nav li.IndUserManagement').addClass('active');
});
