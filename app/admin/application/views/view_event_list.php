<?php $this->load->view('header'); 
$Id = $this->uri->segment(2);
$msg = $this->session->flashdata('message');
?>
<style>
	body {
		font-size: 14px;
		font-family: "Helvetica Nueue",Arial,Verdana,sans-serif;

	}
		
	#external-events {
		float: left;
		width: 150px;
		padding: 0 10px;
		text-align: left;
	}
		
	#external-events h4 {
		font-size: 16px;
		margin-top: 0;
		padding-top: 1em;
	}
		
	.external-event { /* try to mimick the look of a real event */
		margin: 10px 0;
		padding: 2px 4px;
		background: #3366CC;
		color: #fff;
		font-size: .85em;
		cursor: pointer;
	}
		
	#external-events p {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
	}
		
	#external-events p input {
		margin: 0;
		vertical-align: middle;
	}
	.alert {
		border: 0;
		border-radius: 0;
		position: relative;
		padding: 5px 15px;
		line-height: 20px;
	}
	.title>.ClassCheckList:hover{
		background: #00bcd4;;
	}
	.title>.ClassCheckList{
		margin: 7px 15px 0;
		border-radius: 3px;
		background: #9c27b0;
		color: white;
		font-weight: inherit;
	}
	.popover.left {
		margin-left: -10px;
		max-width: 900px;
	}
	#popoverContentId {
		white-space: nowrap;
		background: #9c27b0;
		color: white;
		
	}
	#popoverContentId>tbody>tr>th,#popoverContentId>tbody>tr>td{
		padding: 5px 10px !important;
	}	
	.popover-content {
		padding: 0px 0px 0px 0px;
		line-height: 1.4;
	}
	.popover.left>.arrow:after {
		right: 1px;
		bottom: -20px;
		content: " ";
		border-right-width: 0;
		border-left-color: #9c27b0;
	}
	.modal .modal-header .close {
		border-radius: 50%;
		padding: 5px 10px;
		font-size: x-large;
		color: #ffffff;
		background: #9c27b0;
		margin-top: -40px;
		margin-right: -40px;
		box-shadow: 0px 3px 20px -2px #7b7b7b, 0px 2px 8px 2px #868686;
	}
	.modal-open .modal {
		overflow-x: hidden;
		overflow-y: auto;
		background: #00000061;
	}
	.fc-event.success {
		background-color: #4caf50;
		color: #fff;
		padding: 2px;
	}
	.fc-event.important {
		background-color: #e91e63;
		color: #fff;
		padding: 2px;
	}
	.fc-event.info {
		background-color: #00bcd4;
		color: #fff;
		padding: 2px;
	}
	
	.fc-event.primary {
		background-color: #9c27b0;
		color: #fff;
		padding: 2px;
	}
</style>
<div class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
			<?php if(!empty($msg)){ ?>
				<div class="row">
				<div class="col-xs-9 col-sm-10 col-md-10 col-lg-10 col-xl-10 col-xs-offset-3 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-xl-offset-2">
				<div class="alert alert-success text-center <?php echo ($msg == 'success') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'success') ? 'block':'none' ?>">
					<!--button type="button" name="close" aria-hidden="true" class="close">×</button-->
					<!--span><strong> User Info! </strong>  Added Successfully</span-->
					<span><strong><!--button type="button" class="btn btn-success bmd-btn-fab"><i class="material-icons">grade</i></button--><!--i class="material-icons">beenhere</i--> <!--i class="material-icons">check</i--><i class="material-icons">check_circle</i></strong> Class Cancel Successfully</span>
				</div>
				<div class="alert alert-info text-center <?php echo ($msg == 'succ') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'succ') ? 'block':'none' ?>">
					<button type="button" name="close" aria-hidden="true" class="close">×</button>
					<span><!--strong> User Info! </strong--><strong><i class="material-icons">info</i> </strong> Edited</span>
				</div>
				
				<div class="alert alert-danger text-center <?php echo ($msg == 'error') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'error') ? 'block':'none' ?>">
					<button type="button" name="close" aria-hidden="true" class="close">×</button>
					<span><!--strong> oops ! </strong--><strong> <i class="material-icons">error</i> </strong>  something went wrong</span>
				</div>
				</div>
				</div>
			<?php } ?>
			<div class="card card-form">
				<div class="card-header card-header-form bg-rose">
					<i class="material-icons">assignment</i>
				</div>
				<div class="card-header-text-form bg-rose">
					<h4 class="title">Class Calendar  -
						<small>See class time and events</small>
						<a tabindex="0" id="classCheckList" class="btn btn-sm pull-right btn-danger ClassCheckList" role="button" data-toggle="popover" >Class List</a>	
					</h4>
					
				</div>
				<div id='wrap'>

					<div id='calendar'></div>

					<div style='clear:both'></div>
				</div>
			</div>
		</div>
		
	</div>
</div>
<div class="modal fade ShowUser" id="showUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" >&times;</span></button>
                 <h5 class="modal-title" id="myModalLabel">User List Belongs To particular Class</h5>
             </div>
             <div class="modal-body" id="showUserBelongsToClass">
                
             </div>
        </div>
    </div>
</div>
<div class="modal fade AdminAction" id="adminAction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" onclick="resetModal()">&times;</span></button>
                 <h5 class="modal-title" id="myModalLabel">Admin Action</h5>
             </div>
			 <form id="adminActionForm" action="<?php echo base_url('Admin/insert_cancel_class'); ?>" method="POST" enctype="multipart/form-data">
             <div class="modal-body" id="AdminActionBody">
                <div class="row">
					<div class="col-xs-12 col-sm-12  col-md-12 col-lg-12 col-xl-12">
						<div class="form-group label-floating">
							<label class="control-label">Choose Action</label>
							<select class="form-control EventAction" id="eventAction" name="EventAction">
							  <option value=""></option>
							  <option value="1">Class Cancel </option>
							  <option value="2">Class Reschedule</option>
							  <option value="3">New Event</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row ClassListDiv" style="display:none;">
					<div class="col-xs-12 col-sm-12  col-md-12 col-lg-12 col-xl-12">
						<div class="form-group label-floating">
							<label class="control-label">Class List</label>
							<select class="form-control ClassList" id="classList" name="ClassList[]" multiple="multiple" style="display:none;">
							</select>
						</div>
					</div>
				</div>
				<label class="row col-xs-12 col-sm-12  col-md-12 col-lg-12 col-xl-12 control-label" id="noClassAvail"style="display:none;"></label>
				<div class="row ClassRescheduleDiv" id="classRescheduleDiv" style="display:none;">
					<div class="col-xs-12 col-sm-12  col-md-12 col-lg-12 col-xl-12">
						<div class="form-group label-floating">
							<label class="control-label">Reschedule Class</label>
							<select class="form-control RescheduleClass" id="rescheduleClass" name="RescheduleClass">
							 
							</select>
						</div>
					</div>
				</div>
				<div class="row ClassRescheduleDateTimeDiv" id="classRescheduleDateTimeDiv" style="display:none;">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 "id="ClassRescheduleDateDiv">
						<div class="form-group label-floating dropdown-calendar" >
							<label class="control-label">Reschedule Date</label>
							<div class="input-group date ClassRescheduleDate" id="classRescheduleDate" >
								<input type="text" name="RescheduleDate"  class="form-control RescheduleDate">
								<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 ClassRescheduleTimeDiv">
					<div class="form-group label-floating">
						<label class="control-label">Reschedule Time</label>
						<div class="input-group bootstrap-timepicker ClassRescheduleTime" id="classRescheduleTime">
							<input type="text" name="RescheduleTime" id="rescheduleTime" class="form-control input-small RescheduleTime" value="2:00 PM">
							<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
						</div>
					</div>
				</div>
				</div>
				<div class="row NewEventDiv" style="display:none;">
					<div class="col-xs-12 col-sm-12  col-md-12 col-lg-12 col-xl-12">
						<div class="form-group label-floating">
							<label class="control-label">Event Title</label>
							<input type="text" name="NewEvent" id="newEvent" class="form-control NewEvent">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="form-group label-floating">
							<label class="control-label">Reason</label>
							<textarea name="Reason"class="form-control Reason"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="form-group label-floating">
						<button type="submit" name="Submit" id="submitButton"class="btn btn-primary pull-right">Submit</button>
						</div>
					</div>
				</div>
             </div>
			 <input type="hidden" name="ClickDate" id="clickDate">
			 </form>
        </div>
    </div>
</div>
<input type="hidden" name="ResultCalendar" id="resultCalendar">
<!--input type="hidden" name="ClassContent" id="classContent"-->
<div id="popoverContent"></div>
<?php $this->load->view('footer'); ?>

<script>
	
	function resetModal(){
		$('#adminActionForm').bootstrapValidator('resetForm', true);
	}
	$('a.ClassCheckList').popover({ //here is my problem, I want dynamic id not static
		html: true,
		placement: 'left',
		trigger: 'click',
		content: function() {
			return popoverContent();
		}
    }).blur(function(e) {
      $(this).popover('hide');
    });
	$(document).ready(function(){
		var base_url = $('#base_url').val();
		var today = new Date();
		// var rescheduleDate = $("#clickDate").val();
		$('#classRescheduleDate').datepicker({
			format:'yyyy-mm-dd',
			autoclose: true,
			startDate: today,
			todayHighlight: true
		});
		$('.RescheduleTime').timepicker();	
		
		
		
		//console.log(classId);
		$('#rescheduleClass').on('change', function () {
			var classId=$(this).val();
			if(classId == ''){
				$("#classRescheduleDateTimeDiv").hide();
			} else{
				$("#classRescheduleDateTimeDiv").show();
			}
			var classStartTime='';
			var curr = $(this).closest('div.modal-body').find('.ClassRescheduleTimeDiv');
			$.ajax({
				 type: "POST",
				 url: base_url+'Admin/get_ClassTime',
				 data: {ClassId: classId},
				 dataType: 'JSON',
				 async: false,
				 success: function(result){
					 if(result != 'error') {
							classStartTime = result.TimeName;
							// console.log(classStartTime);
							curr.find('input[name="RescheduleTime"]').val('');
							curr.find('input[name="RescheduleTime"]').val(classStartTime);
					 }
					//$("#rescheduleTime").val(classStartTime);
				}
			});
		});
		
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		/*  className colors
		
		className: default(transparent), important(red), chill(pink), success(green), info(blue)
		
		*/		
		
		  
		/* initialize the external events
		-----------------------------------------------------------------*/
	
		$('#external-events div.external-event').each(function() {
		
			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};
			
			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);
			
			// make the event draggable using jQuery UI
			// $(this).draggable({
				// zIndex: 999,
				// revert: false,      // will cause the event to go back to its
				// revertDuration: 0  //  original position after the drag
			// });
			
		});
		//var base_url = $('#base_url').val();
	
		/* initialize the calendar
		-----------------------------------------------------------------*/
		var calendar =  $('#calendar').fullCalendar({
			
			
			header: {
				left: 'title',
				// center: 'agendaDay,agendaWeek,month',
				right: 'prev,next today'
			},
			
			editable: false,
			firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
			selectable: true,
			defaultView: 'month',
			axisFormat: 'h:mm',
			columnFormat: {
                month: 'ddd',    // Mon
                week: 'ddd d', // Mon 7
                day: 'dddd M/d',  // Monday 9/7
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMMM yyyy', // September 2009
                week: "MMMM yyyy", // September 2009
                day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
            },
			allDaySlot: false,
			selectHelper: true,
			events: <?php $result = $this->Admin_Model->get_adminActionEvents(); echo (!empty($result)) ? $result : '[]'?>,
			//events: evt,
			select: function(start, end, allDay) {
			
				calendar.fullCalendar('unselect');
			},
			droppable: true, // this allows things to be dropped onto the calendar !!!
			drop: function(date, allDay) { // this function is called when something is dropped
			
				// retrieve the dropped element's stored Event Object
				var originalEventObject = $(this).data('eventObject');
				
				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);
				
				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.allDay = allDay;
				
				// render the event on the calendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
				$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
				
				// is the "remove after drop" checkbox checked?
				// if ($('#drop-remove').is(':checked')) {
					// // if so, remove the element from the "Draggable Events" list
					// $(this).remove();
				// }
				
			},
			dayClick: function(date, jsEvent, view) {
				var now = new Date();
				if (date.setHours(0,0,0,0) < now.setHours(0,0,0,0)){
					  $('#calendar').fullCalendar('unselect');
						return false;
				}
				var month=date.getMonth()+1;
				var date= date.getFullYear()+"-"+month+"-"+date.getDate();
				date_last_clicked = $(this);
				$(this).css('background-color', '#bed7f3');
				$('#clickDate').val(date);
				
				$('#adminAction').modal({ backdrop: false, keyboard: false, show: true });
				//console.log(date);
			},
		});
		
		
	});

	function popoverContent(){
		var base_url = $('#base_url').val();
		var startTimeId='';
		var endTimeId='';
		var classDetail='<table class="table-responsive table-bordered" id="popoverContentId"><tr><th>Class Name</th><th>Class Type</th><th>Start Date</th><th>End Date</th></tr>';
		$.ajax({
			dataType: 'JSON',
			async: false,
			url: base_url+'Admin/get_classList',
			success: function(result){
				for(var i=0;i < result.length;i++){
					$.ajax({
						dataType: 'JSON',
						async: false,
						url: base_url+'Admin/get_timeTable',
						success: function(resp){
							for(var j=0;j < resp.length;j++){
								if(resp[j].TimeId == result[i].StartTime){
									startTimeId = resp[j].TimeName;
								}	if(resp[j].TimeId == result[i].EndTime){
									endTimeId = resp[j].TimeName;
								}
							}
							// console.log(resp);
							var classType=(result[i].ClassType == 2) ? 'Corporate' : 'Individual';
							classDetail += "<tr><td>"+result[i].ClassName+" ( "+startTimeId+"-"+endTimeId+" ) "+"</td><td>"+classType+"</td><td>"+result[i].StartDate+"</td><td>"+result[i].EndDate+"</td></td></tr>";
						}
					});
				}
				classDetail +="</table>";
			}
		});
		return classDetail;
	}
	function classList(base_url,date,curr_mod,actionId){
		
		var categCheck = $('#classList').multiselect({
			includeSelectAllOption: true,
			enableCaseInsensitiveFiltering: true,
			nonSelectedText: 'Select Class List...',
			selectedClass: 'bg-light',
			isOpen: false,
			keepOpen: false
		});
		
		var cl_List='';
		var noClass='No Class Avaible to cancel';
		var rescheduleClass='No Class Avaible to reschedule';
		$.ajax({
			 type: "POST",
			 url: base_url+'Admin/get_ClassOnDateSelection',
			 data: {Date: date},
			 dataType: 'JSON',
			 sync: true,
			 success: function(result){
				// console.log(result);
				  cl_List +='';
				  if(result == 'error'){
						if(actionId ==1){
							$(".ClassListDiv").hide();
							$("#noClassAvail").text(noClass).css('color','red');
							$("#noClassAvail").show();
							$("#submitButton").hide();
						} else if(actionId == 2){
							// $("#noClassAvail").hide();
							$(".ClassRescheduleDiv").hide();
							$("#noClassAvail").text(rescheduleClass).css('color','red');
							$("#noClassAvail").show();
							$("#submitButton").hide();
						} 
						
					} else if(result != 'error') {
					 $("#noClassAvail").hide();
					 $("#classList").show();
					 $("#submitButton").show();
					if(result.length >0) {
						for(var i=0;i < result.length;i++){
							//console.log(result[i].FirstName);
							cl_List +='<option value="'+result[i].ClassId+'">'+result[i].ClassName+'</option>';
						}
					}
				} 
				if(actionId ==1){
					$("#classList").html(cl_List);
					categCheck.multiselect('rebuild');
				}
				if(actionId == 2){
					// $("#noClassAvail").hide();
					$("#rescheduleClass").html('<option value=""></option>'+cl_List);
				}
			}
		});
	}

	$(document).ready(function(){
		   
	$('#adminActionForm').bootstrapValidator({
		// excluded: ':disabled',
		icons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			EventAction: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			},
			RescheduleDate: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			}, 
			RescheduleClass: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			}, 
			RescheduleTime: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			},  
			'ClassList[]': {
				verbose: false,
				group: '.col-xs-12 .col-sm-12 .col-md-12 .col-lg-12 .col-xl-12',
				validators: {
					callback: {
						message: 'Please choose atleast one class Name',
						callback: function(value, validator) {
							// Get the selected options
							var options = validator.getFieldElements('ClassList[]').val();
							return (options != null && options.length >= 1);
						}
					}
				}
			},
			NewEvent: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			},
			Reason: {
				verbose: false,
				validators: {
					notEmpty: {
						message: '* This is required field'
					}
				}
			}		
		}
	})
	.on('success.form.bv', function(e) {
		e.preventDefault();
		var base_url = $('#base_url').val();
		var $form = $(e.target);
		var date = $("#clickDate").val();
		var bv = $form.data('bootstrapValidator');
		// Use Ajax to submit form data
		
		$('body').find('#loader').css('display','block');
		$.post($form.attr('action'), $form.serialize(), function(resp) {
			//console.log(resp);
			$("#adminAction").hide();
			location.reload(); 
		});
	
	});

	$('body').on('change','#eventAction',function() {
		var type = $(this).val();
		var base_url = $('#base_url').val();
		var curr_mod = $('#adminAction').find('#AdminActionBody');
		var date = $('#clickDate').val();
		// console.log(date);
		// console.log(type);
		switch(type){
			case '1' :
				curr_mod.find('.ClassListDiv').show();
				curr_mod.find('.ClassRescheduleDiv').hide();
				curr_mod.find('.NewEventDiv').hide();
				classList(base_url,date,curr_mod,1)
			break;
			case '2' :
				curr_mod.find('.ClassRescheduleDiv').show();
				curr_mod.find('.ClassListDiv').hide();
				curr_mod.find('.NewEventDiv').hide();
				classList(base_url,date,curr_mod,2)

			break;
			case '3' :
				curr_mod.find('.ClassListDiv').hide();
				curr_mod.find('#noClassAvail').hide();
				curr_mod.find('.ClassRescheduleDiv').hide();
				curr_mod.find('.NewEventDiv').show();
				curr_mod.find('#submitButton').show();
			break;
		}
	}); 	


$('.sidebar-wrapper').find('.nav li').removeClass('active');
	$('.sidebar-wrapper').find('.nav li.EventManagement').addClass('active');
});	
$(document).ready(function(){
	$('.fc-button.fc-button-today').text('Today');
});
</script>
</html>
