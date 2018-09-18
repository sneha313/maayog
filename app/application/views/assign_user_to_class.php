<?php $this->load->view('header'); ?>

<div class="content">
	<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
				<form id="assignUserToClass" action="<?php echo base_url('Admin/insert_ind_user'); ?>" method="POST" enctype="multipart/form-data">
					<div class="card card-form">
						<div class="card-header card-header-form bg-rose">
							<i class="material-icons">perm_identity</i>
						</div>
						<div class="card-header-text-form bg-rose">
							<h4 class="title">Assign Instructor to Class</h4>
						</div>
						<div class="card-content card-content-form">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group label-floating">
									<label class="control-label ">Choose User Name</label>
										<select class="form-control InstructorName" id="instructorName" name="InstructorName">
										  <option value=""></option>
										  <option value="Individual">Individual</option>
										  <option value="Corporate">Corporate</option>
										</select>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 AssignClassName"  id="AssignClassName">
									<div class="form-group label-floating">
										<label class="control-label" for="assignClassName">choose Class Name</label>
										<select class="form-control AssignClassName" name="AssignClassName" id="assignClassName">
										  <option value=""></option>
										  <option value="pain">Pain</option>
										  <option value="diabities">Diabities</option>
										</select>
									</div>
								</div>
							</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="display:none;">
								<div class="form-group label-floating">
									<label class="control-label" for="assignTimeSlot">Time Slot</label>
									<select class="form-control AssignTimeSlot" id="assignTimeSlot" name="AssignTimeSlot" readonly>
									  <option value=""></option>
									  <option value="noConcern">No Concern</option>
									  <option value="concern">Have a Concern</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-2 col-md-3 col-lg-2 col-xl-2  col-xs-offset-0  col-sm-offset-8  col-md-offset-6  col-lg-offset-8 col-xl-offset-8">
							<button type="submit" class="btn btn-rose btn-block Submit pull-right-mar-10 mar-top-25px">Submit</button>
						</div>
						<div class="col-xs-6 col-sm-2 col-md-3 col-lg-2 col-xl-2">
							<button type="button" class="btn btn-primary btn-block pull-right-mar-10 mar-top-25px"  onclick=" window.history.go(-1)">Cancel</button>
							<div class="clearfix"></div>
						</div>
					</div>
				</form>
			</div>
	</div>
</div>
<?php $this->load->view('footer'); ?>
<script src="<?php echo base_url('assets/validation/add_ind_user.js'); ?>"></script>
