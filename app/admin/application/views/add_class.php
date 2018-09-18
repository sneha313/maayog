<?php $this->load->view('header'); ?>
<!--style>
.btn-group>.btn:first-child {
    margin-left: 0;
    margin-top: -15px;
}
.ChooseRecurrence{
	margin-top: -5px;
}
</style-->
<div class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
			<div class="card card-form">
				<div class="card-header card-header-form bg-rose">
					<i class="material-icons">perm_identity</i>
				</div>
				<div class="card-header-text-form bg-rose">
					<h4 class="title">Add Class</h4>
				</div>
				<div class="card-content card-content-form">
					<form id="formAddClass" action="<?php echo base_url('Admin/insert_newClass'); ?>" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label" for="classNames">Class Name</label>
									<input type="text" name="ClassName" class="form-control"  id="classNames">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label"  for="classCapacity">Class Capacity</label>
									<input type="text" name="ClassCapacity" class="form-control"  id="classCapacity" >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating dropdown-calendar" >
									<label class="control-label">Start Date</label>
									<div class="input-group date" id="startDatePicker" >
										<input type="text" name="StartDate"  class="form-control">
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating dropdown-calendar" >
									<label class="control-label">End Date</label>
									<div class="input-group date" id="endtDatePicker" >
										<input type="text" name="EndDate"  class="form-control">
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label" for="classType">Choose Class Type</label>
									<select class="form-control ClassType" name="ClassType" id="classType">
										<option value=""></option>
										 <?php
											  if(!empty($class_type)){
												foreach($class_type as $key => $data){
										?>
										<option value="<?php echo $data['TypeId']; ?>"><?php echo $data['TypeName']; ?></option>
											  <?php } }?>
									</select>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 CorporateTypeDiv" id="corporateTypeDiv" style="display:none;" >
								<div class="form-group label-floating">
								<label class="control-label ">Choose Corporate</label>
									<select class="form-control CorporateType" id="corporateType" name="CorporateType">
									  <option value=""></option>
									   <?php
									  if(!empty($corp_name)){
										foreach($corp_name as $key => $data){
										?>
										<option value="<?php echo $data['CorpId']; ?>"><?php echo $data['CompanyName']?></option>

									  <?php } }?>
									</select>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 StartTimeDiv">
								<div class="form-group label-floating">
									<label class="control-label">Start Time</label>
									<select class="form-control StartTime" id="startTime" name="StartTime">
										  <!--append data from ajax-->
									</select>
									<!--div class="input-group bootstrap-timepicker timepicker">
										<label class="control-label">Start Time</label>
										<input type="text" name="StartTime" class="form-control input-small TimePicker">
										<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
									</div-->
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">End Time</label>
									<select class="form-control EndTime" id="endTime" name="EndTime">
											<!--append data from ajax-->
									</select>
								<!--div class="input-group bootstrap-timepicker timepicker">
									<label class="control-label">End Time</label>
									<input  type="text" name="EndTime" class="form-control input-small TimePicker">
									<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
								</div-->
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group">
									<div class="form-check">
									  <label class="form-check-label" for="recurrence">
										  <input class="form-check-input Recurrence" name="Recurrence" id="recurrence" type="checkbox" value="">
												Working Day
										  <span class="form-check-sign">
											<span class="check"></span>
										  </span>
									  </label>
									</div>
								  </div>
								<!--div class="form-group label-floating">
									<label class="control-label" for="recurrenceType">Choose Class Recurrence</label>
									<select class="form-control ClassType" name="RecurrenceType" id="recurrenceType">
										<option value=""></option>
										 <?php
											  if(!empty($class_recurrence)){
												foreach($class_recurrence as $key => $data){
										?>
										<option value="<?php echo $data['Id']; ?>"><?php echo $data['RecurrenceType']; ?></option>
											  <?php } }?>
									</select>
								</div-->
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 RecurrenceTypeDiv" id="recurrenceTypeDiv" style="display:none;">
								<div class="form-group">
									<div class="row">
										<div class="col-sm-4 ChooseRecurrence">
											<label class="control-label ">Choose Recurrence Type</label>
										</div>
										<div class="col-sm-8">
											<select class="custom-select RecurrenceType" name="RecurrenceType[]" id="recurrenceType" multiple="multiple" data-actions-box="true">
											  <option value="SUN">Sunday</option>
											  <option value="MON">Monday</option>
											  <option value="TUE">Tuesday</option>
											  <option value="WED">Wednesday</option>
											  <option value="THU">Thursday</option>
											  <option value="FRI">Friday</option>
											  <option value="SAT">Saturday</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6 col-sm-2 col-md-3 col-lg-2 col-xl-2  col-xs-offset-0  col-sm-offset-8  col-md-offset-6  col-lg-offset-8 col-xl-offset-8">
								<button type="submit" class="btn btn-info InfoBtn Submit btn-block pull-right-mar-10 mar-top-25px">Submit</button>
							</div>
							<div class="col-xs-6 col-sm-2 col-md-3 col-lg-2 col-xl-2">
								<button type="button" class="btn btn-primary btn-block pull-right-mar-10 mar-top-25px"  onclick=" window.history.go(-1)">Cancel</button>
								<div class="clearfix"></div>
							</div>
						</div>
						<!--div class="row">
							<div class="col-xs-6 col-sm-2 col-md-4 col-lg-2 col-xl-2  col-xs-offset-0  col-sm-offset-8  col-md-offset-4  col-lg-offset-8 col-xl-offset-8">
								<button type="submit" class="btn btn-rose ProceedAssignInstructor btn-block pull-right-mar-10 mar-top-25px" onclick="" title="Click me to assign instructor to class">Proceed</button>
							</div>
							<div class="col-xs-6 col-sm-2 col-md-3 col-lg-2 col-xl-2">
								<button type="button" class="btn btn-primary btn-block pull-right-mar-10 mar-top-25px"  onclick="window.history.go(-1)">Cancel</button>
								<div class="clearfix"></div>
							</div>
						</div-->
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<?php $this->load->view('footer'); ?>
<script src="<?php echo base_url('assets/validation/add_class.js'); ?>"></script>

