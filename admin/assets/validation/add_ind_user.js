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
		// alert("Checked Box deselect");
		$("#localAddressLine1").val('');
		$("#localAddressLine2").val('');
		$("#localCity").val('');
		$("#localState").val('');
		$("#localPinCode").val('');
		$("#localCountry").val('');
		$("#localAddressLine1").removeAttr("readonly","readonly");
		$("#localAddressLine2").removeAttr("readonly","readonly");
		$("#localCity").removeAttr("readonly","readonly");
		$("#localState").removeAttr("readonly","readonly");
		$("#localPinCode").removeAttr("readonly","readonly");
		$("#localCountry").removeAttr("readonly","readonly");
	}
});
$('body').on('change','.day,.month,.year', function(){
	var day= $(this).val();
	// console.log($(this).val());
	// var month= $('.month').val();
	// console.log('sneha');
		$(this).closest('.form-group.label-floating.is-empty').addClass('is-focused');
});
$('#dob').combodate({
		minYear: 1970,
		maxYear: 2018,
		minuteStep: 10
	}).on('changeDate', function(){
			$('#addIndUser').bootstrapValidator('revalidateField', $('#dob').find('[name="DOB"]'));
	});
$(document).ready(function(){
	var type = $('#userType');
	type.change(function () {
		if($(this).val() == '2') {
			$('.CorporateTypeDiv').show();
		}
		else $('.CorporateTypeDiv').hide();
	});
});
// $(document).ready(function(){
// });
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
			}
			// Address: {
				// verbose: false,
				// validators: {
					// notEmpty: {
						// message: '* This field is required'
					// }
				// }
			// },
			// PinCode: {
				// verbose: false,
				// validators: {
					// notEmpty: {
						// message: '* This field is required'
					// }
				// }
			// },
			// HealthCondition: {
				// verbose: false,
				// validators: {
					// notEmpty: {
						// message: '* This field is required'
					// }
				// }
			// },
			// HealthProblem: {
				// verbose: false,
				// validators: {
					// notEmpty: {
						// message: '* This field is required'
					// }
				// }
			// },
			// AddressLine1: {
				// verbose: false,
				// validators: {
					// notEmpty: {
						// message: '* This field is required'
					// }
				// }
			// },
			// AddressLine2: {
				// verbose: false,
				// validators: {
					// notEmpty: {
						// message: '* This field is required'
					// }
				// }
			// },
			// City: {
				// verbose: false,
				// validators: {
					// notEmpty: {
						// message: '* This field is required'
					// }
				// }
			// },
			// State: {
				// verbose: false,
				// validators: {
					// notEmpty: {
						// message: '* This field is required'
					// }
				// }
			// },
			// PinCode: {
				// verbose: false,
				// validators: {
					// notEmpty: {
						// message: '* This field is required'
					// }
				// }
			// },
			// Country: {
				// verbose: false,
				// validators: {
					// notEmpty: {
						// message: '* This field is required'
					// }
				// }
			// },
			// LocalAddressLine1: {
				// verbose: false,
				// validators: {
					// notEmpty: {
						// message: '* This field is required'
					// }
				// }
			// },
			// LocalAddressLine2: {
				// verbose: false,
				// validators: {
					// notEmpty: {
						// message: '* This field is required'
					// }
				// }
			// },
			// LocalCity: {
				// verbose: false,
				// validators: {
					// notEmpty: {
						// message: '* This field is required'
					// }
				// }
			// },
			// LocalState: {
				// verbose: false,
				// validators: {
					// notEmpty: {
						// message: '* This field is required'
					// }
				// }
			// },
			// LocalPinCode: {
				// verbose: false,
				// validators: {
					// notEmpty: {
						// message: '* This field is required'
					// }
				// }
			// },
			// LocalCountry: {
				// verbose: false,
				// validators: {
					// notEmpty: {
						// message: '* This field is required'
					// }
				// }
			// }
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
				 // console.log(result);
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
$('#userType').bind('change', function () {
	var base_url = $('#base_url').val();
    var usertype = $(this).val();
	$("#timeSlot").val('');
    if(usertype == ""){
		$("#corporateTypeDiv").hide();
		$("#assignClassTimeDiv").hide();
	}else{
		if(usertype == 1 ){
			corpotype = 0;
			$("#corporateTypeDiv").hide();
			$("#assignClassTimeDiv").show();
			

			get_ClassByTypeId(base_url,usertype,corpotype);

		} else {
			$("#corporateTypeDiv").show();
			$("#assignClassTimeDiv").hide();
		}	
	}	
});
$('#corporateType').change( function () {
    var corpotype = $(this).val();
	var base_url = $('#base_url').val();
    var usertype = $('#userType').val();
	$("#timeSlot").val('');
	if(usertype == 1){
		corpotype = 0;
	}
	if(corpotype != ""){
		$("#assignClassTimeDiv").show();
		get_ClassByTypeId(base_url,usertype,corpotype);
	} else {
		$("#assignClassTimeDiv").hide();
	}	

});

function get_ClassByTypeId(base_url,usertype,corpotype) {

	$.ajax({
		 type: "POST",
		 url: base_url+'Admin/getClassByTypeId',
		 data: {UserType: usertype, CorporateType: corpotype },
		 dataType: 'JSON',
		 async: false,
		 success: function(result){

			 var strclass='<option value=""></option>';
			 if(result != 'error') {
				for(var i=0;i < result.length;i++){
					var endTimeId=result[i].EndTime;
					var startTimeId=result[i].StartTime;
					var ClassId=result[i].ClassId;
					var ClassName=result[i].ClassName;
					$.ajax({
						 type: "POST",
						 url: base_url+'Admin/get_classStartEndTimeById',
						 data: {StartTimeId: startTimeId, EndTimeId: endTimeId},
						 dataType: 'JSON',
						 async: false,
						 success: function(resp){
							 if(resp != 'error') {

								var StartTimeName=resp[0].TimeName;
								var EndTimeName=resp[1].TimeName;
								 
								 strclass +="<option value='"+ClassId+"'>"+ClassName+" From "+StartTimeName+" - "+EndTimeName+"</option>";

							}
						}
					});
				}
			 }else{
			 	confirm('Please assign class for this corporation');
			 }
			 
			 $("#className").html();
			 $("#className").html(strclass);
		}
	});
}

$(document).ready(function(){
	$('.sidebar-wrapper').find('.nav li').removeClass('active');
	$('.sidebar-wrapper').find('.nav li.IndUserManagement').addClass('active');
});
