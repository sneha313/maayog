<?php $this->load->view('header'); ?>
<div class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
			<div class="card card-form">
				<div class="card-header card-header-form bg-rose">
					<i class="material-icons">perm_identity</i>
				</div>
				<div class="card-header-text-form bg-rose">
					<h4 class="title">Add New Event</h4>
				</div>
				<div class="card-content card-content-form">
					<form id="addEvent" action="" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Event Name</label>
									<input type="text" name="EventName" id="eventName" class="form-control EventName">
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Location</label>
									<input type="text" name="Location" id="location" class="form-control Location">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Start Date</label>
									   <input type="text" name="StartDate"  id="startDate" class="form-control datepicker">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">End Date</label>
									   <input type="text" name="EndDate"  id="endDate" class="form-control datepicker">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Sponsered By</label>
									   <input type="text" name="SponseredBy"  id="sponseredBy" class="form-control SponseredBy">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Organised By</label>
									   <input type="text" name="OrganisedBy"  id="organisedBy" class="form-control OrganisedBy">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group label-floating">
									<label class="control-label">Partners</label>
									<input type="text" name="Partners" id="partners" class="form-control Partners">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6 col-sm-2 col-md-3 col-lg-2 col-xl-2  col-xs-offset-0  col-sm-offset-8  col-md-offset-6  col-lg-offset-8 col-xl-offset-8">
								<button type="submit" class="btn btn-info InfoBtn Submit pull-right-mar-10">Submit</button>
							</div>
							<div class="col-xs-6 col-sm-2 col-md-3 col-lg-2 col-xl-2">
								<button type="button" class="btn btn-primary pull-right-mar-10"  onclick=" window.history.go(-1)">Cancel</button>
								<div class="clearfix"></div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>
<script>
$(document).ready(function(){
	$('.sidebar-wrapper').find('.nav li').removeClass('active');
	$('.sidebar-wrapper').find('.nav li.eventManagement').addClass('active');
});
</script>
