<?php $this->load->view('header'); ?>

<div class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-2 col-md-offset-3 col-lg-offset-3">
			<form id="assignInstructorToClass" action="<?php echo base_url('Admin/insert_instructor_to_class'); ?>" method="POST" enctype="multipart/form-data">
				<div class="card card-form">
					<div class="card-header card-header-form bg-rose">
						<i class="material-icons">perm_identity</i>
					</div>
					<div class="card-header-text-form bg-rose">
						<h4 class="title">Assign Instructor to Class</h4>
					</div>
					<div class="card-content card-content-form">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
								<div class="form-group label-floating">
								<label class="control-label ">Choose Instructor Name</label>
									<select class="form-control InstructorName" id="instructorName" name="InstructorName">
									  <option value=""></option>
									 <?php
										  if(!empty($instructor_name)){
											foreach($instructor_name as $key => $data){
									?>
									  <option value="<?php echo $data['InstrucId']; ?>"><?php echo $data['InstrucFName']." ".$data['InstrucLName']; ?></option>
										  <?php } }?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 AssignClassType" id="assignClassTypeDiv" style="display:none;">
								<div class="form-group label-floating">
									<label class="control-label" for="assignClassType">Choose Class Type</label>
									<select class="form-control AssignClassType" name="AssignClassType" id ="assignClassType">
									 <option value=" "></option>
									 <?php
										  if(!empty($assign_class_type)){
											foreach($assign_class_type as $key => $data){
									?>
									<option value="<?php echo $data['TypeId']; ?>"><?php echo $data['TypeName']; ?></option>
										  <?php } }?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12  CorporateTypeDiv" id="corporateTypeDiv" style="display:none;" >
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
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 AssignClassName"  id="assignClassNameDiv" style="display:none;">
								<div class="form-group label-floating">
									<label class="control-label" for="assignClassName">Choose Class Name</label>
									<select class="form-control AssignClassName" name="AssignClassName" id="assignClassName">
									  <!------appended data from ajax------>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 col-lg-offset-6 col-xl-offset-6">
								<button type="submit" class="btn btn-info InfoBtn btn-block Submit pull-right-mar-10 mar-top-25px">Submit</button>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
								<button type="button" class="btn btn-primary btn-block pull-right-mar-10 mar-top-25px"  onclick=" window.history.go(-1)">Cancel</button>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php $this->load->view('footer'); ?>
<script src="<?php echo base_url('assets/validation/assign_instructor_to_class.js'); ?>"></script>
