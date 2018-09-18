$(document).ready(function() {
	var base_url = $('#base_url').val();
	var today = new Date();
	$('#startDatePicker').datepicker({
		format:'yyyy-mm-dd',
		autoclose: true,
		todayHighlight: true
	}).on('changeDate', function(selected){
		var minDate = new Date(selected.date.valueOf());
		$('#endtDatePicker').datepicker('setStartDate', minDate);
		$('#formAddClass').bootstrapValidator('revalidateField', $('#startDatePicker').find('[name="StartDate"]'));
	});
	
	$('#endtDatePicker').datepicker({
		format:'yyyy-mm-dd',
		autoclose: true,
		todayHighlight: true
	}).on('changeDate', function(selected) {
		var maxDate = new Date(selected.date.valueOf());
		$('#startDatePicker').datepicker('setEndDate', maxDate);
		$('#formAddClass').bootstrapValidator('revalidateField', $('#endtDatePicker').find('[name="EndDate"]'));
	});

	$('#formAddClass').bootstrapValidator({
		excluded: ':disabled',
		icons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			ClassName: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			},  
			ClassCapacity: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			},
			ClassType: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			},
			Recurrence: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			},
			'RecurrenceType[]': {
				verbose: false,
				group: '.col-xs-12 .col-sm-12 .col-md-6 .col-lg-6 .col-xl-6',
				validators: {
					callback: {
						message: 'Please choose atleast one value for recurrence',
						callback: function(value, validator) {
							// Get the selected options
							var options = validator.getFieldElements('RecurrenceType[]').val();
							return (options != null && options.length >= 1);
						}
					}
				}
			},
			StartDate: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			},
			EndDate: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			},
			StartTime: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			},
			EndTime: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			}		
		}
	})
});

$('#classType').bind('change', function () {
    var classType = $(this).val();
	
	var base_url = $('#base_url').val();
    var corpType = 0;
    var startDate = $("input[name='StartDate']").val();
    var endDate = $("input[name='EndDate']").val();
	
	if(classType == "" ) {
		$('#corporateTypeDiv').hide();
		get_timeSlots(base_url,corpType,classType,startDate,endDate);
	}else if(classType == 1) {
		$('#corporateTypeDiv').hide();
		get_timeSlots(base_url,corpType,classType,startDate,endDate);
	} else {
		$('#corporateTypeDiv').show();
		$("#startTime").html('');
		$("#startTime").html('<option value=""></option>');
	}
	
});

$('body').on('change','#corporateType', function () {

	var base_url = $('#base_url').val();
    var corpType = $(this).val();
    var classType = $("select[name='ClassType']").val();
    var startDate = $("input[name='StartDate']").val();
    var endDate = $("input[name='EndDate']").val();
    if(corpType != ''){
		get_timeSlots(base_url,corpType,classType,startDate,endDate);
	}else{
		$("#startTime").html('');
		$("#startTime").html('<option value=""></option>');
	}
});

$('#startTime').bind('change', function () {
	var base_url = $('#base_url').val();
    var timeId = $(this).val();
	$.ajax({
		 type: "POST",
		 url: base_url+'Admin/get_classEndTime',
		 data: {TimeId: timeId},
		 dataType: 'JSON',
		 success: function(result){
			  var endTime='<option value=""></option>';
			 if(result != 'error') {
				// var endtime=result[i].TimeName;
				 //console.log(result);
				for(var i=0;i < result.length;i++){
					//if (endtime > strtotime('16:00:00')) {
						endTime +="<option value='"+result[i].TimeId +"'>"+ result[i].TimeName+"</option>";
					//}
				}
			 }
			$("#endTime").html('');
			$("#endTime").html(endTime);
		}
	});
});

function get_timeSlots(base_url,corpType,classType,startDate,endDate) {

	$.ajax({
		 type: "POST",
		 url: base_url+'Admin/get_notAssignedClassList',
		 data: {ClassType: classType, StartDate: startDate, EndDate: endDate, CorporateType:corpType},
		 dataType: 'JSON',
		 success: function(result){
			 var startTime='<option value=""></option>';
			 if(result != 'error') {
					for(var i=0;i < result.length;i++){
					startTime +="<option value='"+result[i].TimeId +"'>"+ result[i].TimeName+"</option>";
				}
			 }
			 $("#startTime").html('');
			$("#startTime").html(startTime);
		}
	});
}

$(document).ready(function(){
	  $("#recurrence").on("click",function() {
		$(".RecurrenceTypeDiv").toggle(this.checked);
	});
});
$(document).ready(function(){
	$('.sidebar-wrapper').find('.nav li').removeClass('active');
	$('.sidebar-wrapper').find('.nav li.ClassManagement').addClass('active');
});

$(document).ready(function() {
   // $('.mdb-select').material_select();
   $('#recurrenceType').multiselect({
	   includeSelectAllOption: true,
	  // selectAllValue: 'multiselect-all',    
	   enableCaseInsensitiveFiltering: true,

    nonSelectedText: 'Select Recurrence Type...',
   // enableFiltering: true,
    // templates: {
        // li: '<li><a href="javascript:void(0);"><label class="pl-2"></label></a></li>',
        // filter: '<li class="multiselect-item filter"><div class="input-group m-0 mb-1"><input class="form-control multiselect-search" type="text"></div></li>',
        // filterClearBtn: '<div class="input-group-append"><button class="btn btn btn-outline-secondary multiselect-clear-filter" type="button"><i class="fa fa-close"></i></button></div>'
    // },
    selectedClass: 'bg-light',
	isOpen: true,
         keepOpen: true
    // onInitialized: function(select, container) {
        // // hide checkboxes
        // container.find('input[type=checkbox]').addClass('d-none');
    // }
});
});
