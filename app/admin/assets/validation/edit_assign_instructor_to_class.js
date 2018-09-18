$(document).ready(function() {
	 var base_url = $('#base_url').val();
	$('#editAssignInstructorToClass').bootstrapValidator({
		// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
		icons: {
			valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			InstructorName: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			},
			AssignClassType: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			},
			AssignClassName: {
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

$('#instructorName').change( function () {
    var instructorname = $(this).val();
	if(instructorname == ""){
		$("#assignClassTypeDiv").hide();
		$("#corporateTypeDiv").hide();
		$("#assignClassNameDiv").hide();
		
	}else{
		$("#assignClassTypeDiv").show();
		$("#assignClassTypeDiv option:selected").prop("selected", false);
		$("#corporateTypeDiv option:selected").prop("selected", false);
		$("#assignClassNameDiv option:selected").prop("selected", false);
		$('#assignInstructorToClass').bootstrapValidator('revalidateField', $('#assignClassTypeDiv').find('[name="AssignClassType"]'));
		

	} 
});
$('#assignClassType').bind('change', function () {
	var base_url = $('#base_url').val();
    var classtype = $(this).val();
    var instructorname = $('#instructorName').val();
    if(classtype == ""){
		$("#corporateTypeDiv").hide();
		$("#assignClassNameDiv").hide();
	}else{
		if(classtype == 1 ){
			corpotype = 0;
			$("#corporateTypeDiv").hide();
			$("#assignClassNameDiv").show();

			get_ClassByTypeId(base_url,classtype,instructorname,corpotype);

		} else {
			$("#corporateTypeDiv").show();
			$("#assignClassNameDiv").hide();
		}	
	}	
});
$('#corporateType').change( function () {
    var corpotype = $(this).val();
	var base_url = $('#base_url').val();
    var instructorname = $('#instructorName').val();
    var classtype = $('#assignClassType').val();
	if(classtype == 1){
		corpotype = 0;
	}
	if(corpotype != ""){
		$("#assignClassNameDiv").show();
		get_ClassByTypeId(base_url,classtype,instructorname,corpotype);
	} else {
		$("#assignClassNameDiv").hide();
	}	

});

function get_ClassByTypeId(base_url,classtype,instructorname,corpotype) {
	$.ajax({
		 type: "POST",
		 url: base_url+'Admin/getClassByTypeId',
		 data: {ClassType: classtype, InstructorName:instructorname , CorporateType: corpotype },
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
			 
			 $("#assignClassName").html();
			 $("#assignClassName").html(strclass);
		}
	});
}
$(document).ready(function(){
	$('.sidebar-wrapper').find('.nav li').removeClass('active');
	$('.sidebar-wrapper').find('.nav li.ClassAssignment').addClass('active');
});