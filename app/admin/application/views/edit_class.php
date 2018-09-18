<?php $this->load->view('header');
$Id = $this->uri->segment(2);
 ?>
<style>
.btn-group>.btn:first-child {
    margin-left: 0;
    margin-top: -15px;
}
.ChooseRecurrence{
	margin-top: -5px;
	font-size: 14px;
}
</style>
<div class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
			<div class="card card-form">
				<div class="card-header card-header-form bg-rose">
					<i class="material-icons">perm_identity</i>
				</div>
				<div class="card-header-text-form bg-rose">
					<h4 class="title">Edit Class Detail</h4>
				</div>
					<div class="card-content card-content-form">
					<form id="formEditClass" action="<?php echo base_url('Admin/get_editClass/'.$Id); ?>" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Class Name</label>
									<input type="text" name="ClassName" class="form-control" value="<?php echo (!empty($edit_class_data_byId['ClassName'])) ? $edit_class_data_byId['ClassName'] : ''; ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label"  for="classCapacity">Class Capacity</label>
									<input type="text" name="ClassCapacity" class="form-control"  id="classCapacity" value="<?php echo (!empty($edit_class_data_byId['ClassCapacity'])) ? $edit_class_data_byId['ClassCapacity'] : ''; ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating " >
									<label class="control-label">Start Date</label>
									<div class="input-group date" id="startDatePicker" >
										<input type="text" name="StartDate"  class="form-control" value="<?php echo (!empty($edit_class_data_byId['StartDate'])) ? $edit_class_data_byId['StartDate'] : ''; ?>">
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating " >
									<label class="control-label">End Date</label>
									<div class="input-group date" id="endtDatePicker" >
										<input type="text" name="EndDate"  class="form-control" value="<?php echo (!empty($edit_class_data_byId['EndDate'])) ? $edit_class_data_byId['EndDate'] : ''; ?>">
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
								</div>
							</div>
						</div>
						
						<!--div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
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
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 CorporateTypeDiv" id="corporateTypeDiv" style="display:none;">
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
						</div-->
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label" for="classType">choose Class Type</label>
									<select class="form-control ClassType" name="ClassType" id="classType">
										<option value=""></option>
										
										 <?php
										
											  if(!empty($class_type)){
												foreach($class_type as $key => $data){
										?>
										<option value="<?php echo $data['TypeId']; ?>" <?php echo ($data['TypeId'] == $edit_class_data_byId['ClassType']) ? 'selected': ''; ?>><?php echo $data['TypeName']; ?></option>
											  <?php } }?>
									</select>
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 CorporateTypeDiv" id="corporateTypeDiv" style="display:<?php echo ($edit_class_data_byId['ClassType'] == 2) ? 'block': 'none'; ?>;">
								<div class="form-group label-floating">
								<label class="control-label ">Choose Corporate</label>
									<select class="form-control CorporateType" id="corporateType" name="CorporateType">
									  <option value=""></option>
									   <?php
									  if(!empty($corp_name)){
										foreach($corp_name as $key => $data){
										?>
										<option value="<?php echo $data['CorpId']; ?>" <?php echo ($data['CorpId'] == $edit_class_data_byId['CorporateType']) ? 'selected': ''; ?>><?php echo $data['CompanyName']?></option>

									  <?php } }?>
									</select>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Start Time</label>
									
									<select class="form-control StartTime" id="startTime" name="StartTime">
									<?php 										
										$startId = $this->Admin_Model->get_Times($edit_class_data_byId['StartTime']);
									?>
										<option value="<?php echo $startId['TimeId']; ?>" selected ><?php echo $startId['TimeName']; ?></option>
									<?php  
										$ClassType = $edit_class_data_byId['ClassType'];
										$CorporateType = $edit_class_data_byId['CorporateType'];
										
										$startTime=$this->Admin_Model->getTime($Id, $ClassType, $CorporateType);
										if(!empty($startTime)){
											foreach($startTime as $key => $data){
										?>
										<option value="<?php echo $data['TimeId']; ?>" <?php echo ( $edit_class_data_byId['StartTime'] == $data['TimeId']) ? 'selected': ''; ?>><?php echo $data['TimeName']; ?></option>
											  <?php }} ?>
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
										<?php 										
										$endId = $this->Admin_Model->get_Times($edit_class_data_byId['EndTime']);
									?>
										<option value="<?php echo $endId['TimeId']; ?>" selected ><?php echo $endId['TimeName']; ?></option>
									<?php  
										$ClassType = $edit_class_data_byId['ClassType'];
										$CorporateType = $edit_class_data_byId['CorporateType'];
										$startTime=$this->Admin_Model->getTime($Id, $ClassType, $CorporateType);
										if(!empty($startTime)){
											foreach($startTime as $key => $data){
										?>
										<option value="<?php echo $data['TimeId']; ?>" <?php echo ( $edit_class_data_byId['StartTime'] == $data['TimeId']) ? 'selected': ''; ?>><?php echo $data['TimeName']; ?></option>
											  <?php }} ?>
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
												Click here to select working days
										  <span class="form-check-sign">
											<span class="check"></span>
										  </span>
									  </label>
									</div>
								  </div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 RecurrenceTypeDiv" id="recurrenceTypeDiv" style="display:<?php (!empty($edit_class_data_byId['RecurrenceType'])) ? 'block': 'none'; ?>">
								<div class="form-group">
									<div class="col-sm-4 ChooseRecurrence">
										<label class="control-label ">Choose Recurrence Type</label>
									</div>
									<div class="col-sm-8 RecurrenceName">
										<select class="custom-select RecurrenceType" name="RecurrenceType[]" id="recurrenceType" multiple >
										<?php $recurrence = (!empty($edit_class_data_byId['RecurrenceType'])) ? json_encode($edit_class_data_byId['RecurrenceType'], true) : ''; ?>
										  <option value="SUN" <?php echo strpos($recurrence, 'SUN') ? 'selected':''; ?> >Sunday</option>
										  <option value="MON" <?php echo strpos($recurrence, 'MON') ? 'selected':''; ?> >Monday</option>
										  <option value="TUE" <?php echo strpos($recurrence, 'TUE') ? 'selected':''; ?> >Tuesday</option>
										  <option value="WED" <?php echo strpos($recurrence, 'WED') ? 'selected':''; ?> >Wednesday</option>
										  <option value="THU" <?php echo strpos($recurrence, 'THU') ? 'selected':''; ?> >Thursday</option>
										  <option value="FRI" <?php echo strpos($recurrence, 'FRI') ? 'selected':''; ?> >Friday</option>
										  <option value="SAT" <?php echo strpos($recurrence, 'SAT') ? 'selected':''; ?> >Saturday</option>
										</select>
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
<script src="<?php echo base_url('assets/validation/edit_class.js'); ?>"></script>

