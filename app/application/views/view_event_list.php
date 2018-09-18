<?php $this->load->view('header'); 
$Id = $this->uri->segment(2);
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
	.fc-event.beige {
		background-color: beige;
		color: #fff;
		padding: 2px;
	}
</style>
<div class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
			<div class="card card-form">
				<div class="card-header card-header-form bg-rose">
					<i class="material-icons">assignment</i>
				</div>
				<div class="card-header-text-form bg-rose">
				
					<?php $result = $this->User_Model->get_class_detail(); ?>
					<!--table class="table-bordered">
						<tr>
							<th>Class Name</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Start Time</th>
							<th>End Time</th>
						</tr>
						<tr>
							<th><?php echo $result['ClassName']; ?></th>
							<th><?php echo $result['StartDate']; ?></th>
							<th><?php echo $result['EndDate']; ?></th>
							<th><?php echo $result['0']; ?></th>
							<th><?php echo $result['1']; ?></th>
						</tr>
					</table-->
					<h4 class="title">Class Calendar  -
						<small>See class time and events</small>
						<a tabindex="0" id="classCheckList" class="btn btn-sm pull-right btn-danger ClassCheckList" role="button" data-toggle="popover" >Class Detail</a>	
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
<div class="modal fade UserAction" id="userAction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" onclick="resetModal()">&times;</span></button>
                 <h5 class="modal-title" id="myModalLabel">Class Not Attending</h5>
             </div>
			 <form id="userActionForm" action="<?php echo base_url('User/insert_cancel_classbyUser'); ?>" method="POST" enctype="multipart/form-data">
             <div class="modal-body" id="UserActionBody">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="form-group label-floating ClassCancel">
							<label class="control-label">Class Cancel Date</label>
							<input type="text" class="form-control" name="UserClickDate" id="userClickDate" readonly>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="form-group label-floating">
							<label class="control-label">Reason</label>
							<textarea name="Reason" class="form-control Reason"></textarea>
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
			 
			 </form>
        </div>
    </div>
</div>
<div id="popoverContent"></div>
<?php $this->load->view('footer'); ?>

<script>
function popoverContent(){
		var base_url = $('#base_url').val();
		var startTimeId='';
		var endTimeId='';
		var classDetail='<table class="table-responsive table-bordered" id="popoverContentId"><tr><th>Class Name</th><th>Class Type</th><th>Start Date</th><th>End Date</th></tr>';
		$.ajax({
			dataType: 'JSON',
			async: false,
			url: base_url+'User/get_class_detail',
			success: function(result){
				// console.log(result);
				if(result){
				var classType=(result.ClassType == 2) ? 'Corporate' : 'Individual';
				if(result.ClassName != null){
					classDetail += "<tr><td>"+result.ClassName+" ( "+result[0]+"-"+result[1]+" ) "+"</td><td>"+classType+"</td><td>"+result.StartDate+"</td><td>"+result.EndDate+"</td></tr>";
					classDetail +="</table>";
				}else{
					classDetail += "<tr><td colspan='4' class='text-center'>Class not assigned yet</td></tr>";
					classDetail +="</table>";
				}
				} 
				
			}
		});
		return classDetail;
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
function resetModal(){
	$('#userActionForm').bootstrapValidator('resetForm', true);
}
	$(document).ready(function() {
		
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
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});
			
		});
	
	
		/* initialize the calendar
		-----------------------------------------------------------------*/
		
		var base_url = $('#base_url').val();
		var STD='';
		var END='';
			$.ajax({
					dataType: 'JSON',
					async: false,
					'type': 'POST',
					url: base_url+'User/get_classBackground',
					// data:{ClickDate : date},
					success: function(result){
						for(var i=0; i < result.length; i++) {
							STD = result[i].start;
							END = result[i].end;
						}
					}
				});
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
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}
				
			},
			
			dayClick: function(date, jsEvent, view) {
				var now = new Date();
				if (date.setHours(0,0,0,0) < now.setHours(0,0,0,0)){
					  $('#calendar').fullCalendar('unselect');
						return false;
				}
				
				var base_url = $('#base_url').val();
				var month=date.getMonth()+1;
				var date= date.getFullYear()+"-"+month+"-"+date.getDate();
				date_last_clicked = $(this);
				$(this).css('background-color', '#bed7f3');
				
				var clickDate = $('#userClickDate').val(date);
				var c_list = classList(base_url, date);
			},
			dayRender: function(date, cell) {
					var cell_d = date.getDate();
					var cell_m = date.getMonth();
					var cell_y = date.getFullYear();
					var cell_date = cell_y+'-'+cell_m +'-'+cell_d;
					
					var STDC = new Date(STD);
					var d = STDC.getDate();
					var m = STDC.getMonth();
					var y = STDC.getFullYear();
					var STD_date = y+'-'+m +'-'+d;
					
					var ENDC = new Date(END);
					var Ed = ENDC.getDate();
					var Em = ENDC.getMonth();
					var Ey = ENDC.getFullYear();
					var END_date = Ey+'-'+Em +'-'+Ed;
					if((new Date(STD_date) <= new Date(cell_date)) && (new Date(cell_date) <= new Date(END_date))){

						cell.css("background", "#e8f1c7");
						cell.css("border", "1px solid rgb(226, 219, 219)");
					}
			},
			events: <?php if($this->session->userdata('Role') == 1 ) { $result = $this->User_Model->get_cancelledClass(); echo (!empty($result)) ? $result : '[]';   } ?>,			
		});
		
		
	});

</script>
<script>
function classList(base_url,date){
	$.ajax({
		dataType: 'JSON',
		async: false,
		'type': 'POST',
		url: base_url+'User/cancel_class_modal_hide',
		data:{ClickDate : date},
		success: function(result){
			if(result == '0'){
				$('#userAction').modal({ backdrop: false, keyboard: false, show: true });
			}
		}
	});
}

$(document).ready(function(){
	$('.ClassCancel').removeClass('is-empty');
	$('.ClassCancel').addClass('is-filled');
	//var base_url = $('#base_url').val();
    // $.ajax({type:'POST',url: base_url+'User/get_ClassbyLoggedinUser', success: function(result){
    // }});
		   
	$('#userActionForm').bootstrapValidator({
		// excluded: ':disabled',
		icons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
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
		var date = $("#userClickDate").val();
		var bv = $form.data('bootstrapValidator');
		// var url_event=base_url+'User/get_cancelledClass';
		// Use Ajax to submit form data
		$.post($form.attr('action'), $form.serialize(), function(resp) {
			$("#userAction").hide();
			location.reload(); 
		});
	});

	$('.sidebar-wrapper').find('.nav li').removeClass('active');
	$('.sidebar-wrapper').find('.nav li.ClassCalendar').addClass('active');
});
$(document).ready(function(){
	$('.fc-button.fc-button-today').text('Today');
});
</script>
</html>
