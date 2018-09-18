<?php $this->load->view('header');?>
<div class="content">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="alert alert-success text-center" style="display:none;">
				<button type="button" aria-hidden="true" class="close">×</button>
				<span><b> Thank you - </b> you have changed password for <strong>maayog</strong></span>
			</div>
			<div class="alert alert-danger"  style="display:none">
				<button type="button" aria-hidden="true" class="close">×</button>
				<span><b> Oops - </b>  Something went wrong, Please change password again</span>
			</div>
		</div>
	</div>
	<div class="row UserProfileBackground">
	
		<div class="col-md-9">
			<?php //echo "<pre>";
			// print_r($user_profile);
			// exit;
			?>
			<div class="card-text">
				<div class="row">
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 UserHeaderMargin">
						<div class="ProfileHeader places-sweet-alerts">
							<strong>
								<h4><?php echo (!empty($user_profile['FirstName'])) ? ucwords($user_profile['FirstName']).' '.ucwords($user_profile['LastName']) : ''; ?>
									<a href="javascript:void(0);"><i class="fa fa-pencil icon" id="edit" onclick="demo.showSwal('input-field')" title="Edit Profile"></i></a>
									
								</h4>
							</strong>
						</div>
						<div class="SubHeader">
							<span><?php echo (!empty($user_profile['Role']) && ($user_profile['Role'] == 3)) ? 'Admin': '';?></span>
						</div>
					</div>
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">

						<div class="ProfileHeader">
							<a href="javascript:void(0);" class="btn btn-info InfoBtn ChangePassBtn"><i class="fa fa-unlock-alt icon" id="changePassword" title="Change Password"></i>Change Password</a>
						</div>
					</div>
				</div>
			<div class="row Profile-detail">
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<div class="UserDetail row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<i class="fa fa-id-card-o icon" aria-hidden="true" title="user Id"></i>
								<span  title="User Registration Id <?php echo (!empty($user_profile['User_UniqueId'])) ? $user_profile['User_UniqueId']: ''; ?>"><?php echo (!empty($user_profile['User_UniqueId'])) ? $user_profile['User_UniqueId']: ''; ?></span>
							</div>
						</div>
						<div class="UserDetail row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<i class="fa fa-calendar icon" aria-hidden="true" title="Date Of Birth"></i><?php 
									$date = (!empty($user_profile['DateOfBirth'])) ? $user_profile['DateOfBirth'] : '';
										$values=getdate(strtotime($date));
										$monthNum  = $values['mon'];
										$dateObj   = DateTime::createFromFormat('!m', $monthNum);
										$monthName = $dateObj->format('F'); 
									?>
								<span title="Date of Birth <?php 
										echo (!empty($values)) ? $values['mday']." ".$monthName.", ".$values['year'] : ''; 
									?>">
									<?php 
										echo (!empty($values)) ? $values['mday']." ".$monthName.", ".$values['year'] : ''; 
									?>
								</span>
							</div>
						</div>
						<div class="UserDetail row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<i class="fa fa-phone icon" aria-hidden="true" title="MobileNumber"></i>
								<span title="Mobile Number <?php echo (!empty($user_profile['MobileNumber'])) ? $user_profile['MobileNumber'] : ''; ?>"><?php echo (!empty($user_profile['MobileNumber'])) ? $user_profile['MobileNumber'] : ''; ?></span>
							</div>
						</div>
						<div class="UserDetail row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<i class="fa fa-envelope-o icon" aria-hidden="true" title="Email Address"></i>
								<span title="EmailAddress <?php echo (!empty($user_profile['EmailAddress'])) ? $user_profile['EmailAddress']: ''; ?>"><?php echo (!empty($user_profile['EmailAddress'])) ? $user_profile['EmailAddress']: ''; ?></span>
							</div>
						</div>
					</div>
					
					
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
						
						<!--div class="UserDetail row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<i class="fa fa-tasks icon" aria-hidden="true" title="Batch Name"></i>
								<span  title="Batch Name <?php echo (!empty($user_profile['BatchName'])) ? $user_profile['BatchName'] : ''; ?>"><?php echo (!empty($user_profile['BatchName'])) ? $user_profile['BatchName'] : ''; ?></span>
							</div>
						</div>
						<div class="UserDetail row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" title="TimeSlot">
								<i class="fa fa-clock-o icon" aria-hidden="true"></i>
								<span title="Class Time <?php echo (!empty($user_profile['TimeSlot'])) ? $user_profile['TimeSlot'] : ''; ?>"><?php echo (!empty($user_profile['TimeSlot'])) ? $user_profile['TimeSlot'] : ''; ?></span>
							</div>
						</div-->
						<div class="UserDetail row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<i class="fa fa-map-marker icon" aria-hidden="true" title="location"></i>
								<span title="City <?php echo (!empty($user_profile['City'])) ? $user_profile['City']: ''; ?>"><?php echo (!empty($user_profile['City'])) ? $user_profile['City']: ''; ?></span>
							</div>
						</div>
						<div class="UserDetail row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<i class="fa fa-map-marker icon" aria-hidden="true" title="location"></i>
								<span title="State <?php echo (!empty($user_profile['State'])) ? $user_profile['State']: ''; ?>"><?php echo (!empty($user_profile['State'])) ? $user_profile['State']: ''; ?></span>
							</div>
						</div>
						<div class="UserDetail row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<i class="fa fa-map-marker icon" aria-hidden="true" title="location"></i>
								<span title="Pin Code <?php echo (!empty($user_profile['PinCode'])) ? $user_profile['PinCode']: ''; ?>"><?php echo (!empty($user_profile['PinCode'])) ? $user_profile['PinCode']: ''; ?></span>
							</div>
						</div>
						<div class="UserDetail row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<i class="fa fa-map-marker icon" aria-hidden="true" title="location"></i>
								<span title="Country <?php echo (!empty($user_profile['Country'])) ? $user_profile['Country']: ''; ?>"><?php echo (!empty($user_profile['Country'])) ? $user_profile['Country']: ''; ?></span>
							</div>
						</div>
						<!--div class="UserDetail row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<i class="fa fa-map-marker icon" aria-hidden="true"></i>
								<span><?php echo (!empty($user_profile['Country'])) ? $user_profile['Country']: ''; ?></span>
							</div>
						</div>
						<div class="UserDetail row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<i class="fa fa-map-pin icon" aria-hidden="true"></i>
								<span><?php echo (!empty($user_profile['PinCode'])) ? $user_profile['PinCode']: ''; ?></span>
							</div>
						</div-->
					</div>
					
				</div>
				<!--div class="row ">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="row Health">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<strong><span title="Health Issue">Health Condition ( concern )																	  	 - Allergies																</span></strong>
							</div>
						</div>
					</div>
				</div-->
				
			</div>
		</div>
		
		<div class="col-md-3">
		  <!--div id="image-preview" class="userProfileImage">
				<!--img src="<?php echo  base_url('assets/img/faces/placeholder.jpg')?>" />
			  <label for="image-upload" id="image-label">Add Image</label>
			  <input type="file" name="image" id="image-upload" />
			</div-->
				<div id="image-preview" <?php echo (!empty($user_profile['ProfilePhoto'])) ? 'style ="background-image: url('.base_url($user_profile['ProfilePhoto']).')"' : 'style ="background-image: url('.base_url('assets/img/faces/placeholder.jpg').')"'; ?>>
			  <!--label for="image-upload" id="image-label">Add Image</label>
			  <input type="file" name="ProfilePhoto" id="image-upload" /-->
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
	<div class="card card-modal">
		<div class="card-header card-header-form bg-rose">
			<i class="material-icons">perm_identity</i>
		</div>				
	  <div class="modal-header CardModalHeader">
		<div class="card-header-text-form bg-rose">
		<h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
	  </div>
	  </div>
	  
	  <form id="changePwd" action="<?php echo base_url('Admin/update_pwd'); ?>" method="POST" enctype="multipart/form-data">
	  <div class="modal-body">
	  <div class="card-content card-content-modal">
	   <div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<div class="form-group label-floating is-empty bmd-form-group">
					<label class="control-label bmd-label-static">Current Password</label>
					<input type="password" name="CurrentPassword" class="form-control CurrentPassword" value="">
				<span class="material-input"></span></div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<div class="form-group label-floating is-empty bmd-form-group">
					<label class="control-label bmd-label-static">New Password</label>
					<input type="password" name="NewPassword" class="form-control NewPassword" value="">
				<span class="material-input"></span></div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<div class="form-group label-floating is-empty bmd-form-group">
					<label class="control-label bmd-label-static">Confirm Password</label>
					<input type="password" name="ConfirmPassword" class="form-control ConfirmPassword" value="">
				<span class="material-input"></span></div>
			</div>
		</div>
	  </div>
	  </div>
	  <div class="modal-footer CardModalfooter">
		<button type="submit" class="btn btn-info InfoBtn pull-right">Change Password</button>
		<button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Cancel</button>
	  </div>
	  
		</form>
	</div>
  </div>
</div>
<?php $this->load->view('footer'); ?>
<script src="<?php echo base_url('assets/validation/user_profile.js'); ?>"></script>
<script>
	$('document').ready(function(){
		$(".ChangePassBtn").click(function(){
			$('#changePasswordModal').modal({
				backdrop: false,
				keyboard: false,
				show: true
			});
		});
	});
$(document).ready(function() {
  $.uploadPreview({
    input_field: "#image-upload",   // Default: .image-upload
    preview_box: "#image-preview",  // Default: .image-preview
    label_field: "#image-label",    // Default: .image-label
    label_default: "Choose File",   // Default: Choose File
    label_selected: "Change File",  // Default: Change File
    no_label: false                 // Default: false
  });
});
</script>
<script>
 // $('body').on('change', '#healthCondition', function(){
	// var healthCondition = $(this).val();
	// //console.log(healthCondition);
		// if (healthCondition == 'concern') {
			// $('.healthProblemDiv').show();
		// } else {
			// $('.healthProblemDiv').hide();
		// }
// });

$(document).ready(function(){
	$('#modalRegisterForm').modal(open);
	demo = {
		showSwal: function(type) {
			var base_url = $('#base_url').val();
			var userID = $('#userId').val();
			// var healthProblemName='';
			// var healthProblemId='';
			// var healthProblem='<option value=""></option>';
			var select='';
			$.ajax({
					type: "post",
					url: base_url+"Admin/edituserProfile",
					data: "UserId="+userID,
					dataType: 'JSON',
					success: function(result){
						// var healthCondition=result.user_profile.HealthCondition;
						// if(healthCondition =='concern'){
							// $('.healthProblemDiv').show();
						// } else{
							// $('.healthProblemDiv').hide();
						// }
						var dob= new Date(result.user_profile.DateOfBirth);
						var startMonth = dob.getMonth() + 1;
						var startMonthName = moment.months(startMonth - 1); 
						var myStartDate = dob.getDate();
						var startDateName= myStartDate < 10 ? '0' + myStartDate : '' + myStartDate;
						var startDay = dob.getDay();
						var startYear = dob.getFullYear();
						var sd = startDateName  + " " + startMonthName + ", "+ startYear;
						  $('#input-field').val(result.user_profile.FirstName);
						  $('#lastName').val(result.user_profile.LastName);
						  $('#mobileNumber').val(result.user_profile.MobileNumber);
						  $('#emailAddress').val(result.user_profile.EmailAddress);
						  // $('#dob').val(sd);
						  // $('#healthCondition').val(healthCondition);
						  // healthProblemName=result.health_prob.HealthProblemName;
						  // healthProblemId=result.health_prob.HealthId;
						    // $.ajax({
							 // type: "POST",
							 // url: base_url+'Admin/get_healthProblem',
							 // dataType: 'JSON',
							 // success: function(result){
								// for(var i=0;i < result.length;i++){
									 // if(healthProblemId == result[i].HealthId){
										  // select = ' selected';
									 // }else{
										  // select = '';
									 // }
									 // healthProblem +="<option value='"+result[i].HealthId+"' "+select+" >"+ result[i].HealthProblemName+"</option>";
								// }
								// $("#healthProblem").append(healthProblem);
							// }
						// });
					}
				})
		if (type == 'input-field') {
			var form = $('form#editUserDetail');
			swal({
				title: 'Edit Admin Detail',
				backdrop: false,
				allowEscapeKey: false,
				allowOutsideClick: false,
				allowEnterKey: false,
				// html:'<form id="editUserDetail" method="POST" enctype="multipart/form-data">'+
						// '<div class="row">'+
							// '<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">'+
								// '<div class="form-group label-floating">'+
									// '<label class="control-label SweetForm">First Name</label>'+
									// '<input type="text"  id="input-field" name="FirstName" class="form-control  FirstName" value=" ">'+
								// '</div>'+
							// '</div>'+
							// '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">'+
								// '<div class="form-group label-floating">'+
									// '<label class="control-label SweetForm">Last Name</label>'+
									// '<input type="text"  id="lastName" name="LastName" class="form-control  LastName" value=" ">'+
								// '</div>'+
								// '</div>'+
						// '</div>'+
						// '<div class="row">'+
							// '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">'+
								// '<div class="form-group label-floating">'+
									// '<label class="control-label SweetForm">Contact Number</label>'+
									// '<input type="text" name="MobileNumber" id="mobileNumber" class="form-control MobileNumber " value=" ">'+
								// '</div>'+
							// '</div>'+
						// '</div>'+
						// '<div class="row">'+
							// '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">'+
								// '<div class="form-group label-floating">'+
									// '<label class="control-label SweetForm">Date of Birth</label>'+
									// '<div class="input-group DateOfBirth"  >'+
										// '<input type="text" name="DOB"  id="dob" class="form-control  DOB"  value=" ">'+
										// '<span class="input-group-addon add-on">'+
										// '<span class="glyphicon glyphicon-calendar">'+
										// '</span>'+
										// '</span>'+
									// '</div>'+
								// '</div>'+
							// '</div>'+
						// '</div>'+
						// '<div class="row">'+
							// '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="healthConditionDiv">'+
								// '<div class="form-group label-floating">'+
									// '<label class="control-label" for="healthCondition">Choose Health Condition</label>'+
									// '<select class="form-control HealthCondition" id="healthCondition" name="HealthCondition" value=" " >'+
										// '<option value=""></option>'+
										// '<option value="noConcern">No Concern</option>'+
										 // '<option value="concern">Have a Concern</option>'+
									// '</select>'+
								// '</div>'+
							// '</div>'+
						// '</div>'+
						// '<div class="row" style="dispaly:none;">'+
							// '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 healthProblemDiv" >'+
								// '<div class="form-group label-floating">'+
									// '<label class="control-label" for="healthProblem">choose Health Problem</label>'+
									// '<select class="form-control HealthProblem" name="HealthProblem" id="healthProblem" value=" " >'+
									// '</select>'+
								// '</div>'+
							// '</div>'+
						// '</div>'+
					// '</form>',
					html:'<form id="editUserDetail" method="POST" enctype="multipart/form-data">'+
						'<div class="row">'+
							'<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">'+
								'<div class="form-group label-floating">'+
									'<label class="control-label">First Name</label>'+
									'<input type="text"  id="input-field" name="FirstName" class="form-control  FirstName" value=" ">'+
								'</div>'+
							'</div>'+
							'<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">'+
								'<div class="form-group label-floating">'+
									'<label class="control-label">Last Name</label>'+
									'<input type="text"  id="lastName" name="LastName" class="form-control  LastName" value=" ">'+
								'</div>'+
								'</div>'+
						'</div>'+
						'<div class="row">'+
							'<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">'+
								'<div class="form-group label-floating">'+
									'<label class="control-label">Contact Number</label>'+
									'<input type="text" name="MobileNumber" id="mobileNumber" class="form-control MobileNumber " value=" ">'+
								'</div>'+
							'</div>'+
						'</div>'+
						'<div class="row">'+
							'<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">'+
								'<div class="form-group label-floating">'+
									'<label class="control-label">Email Address</label>'+
									'<input type="text" name="EmailAddress" id="emailAddress" class="form-control EmailAddress " value=" " readonly>'+
								'</div>'+
							'</div>'+
						'</div>'+
					'</form>',
					showCancelButton: true,
					confirmButtonClass: 'btn btn-success',
					cancelButtonClass: 'btn btn-danger',
					buttonsStyling: false,
					// onOpen: function() {
						  // $('#dob').datepicker({
							  // format:'yyyy-mm-dd',
							  // endDate: "today",
							  // maxDate: "today"
						  // });
					  // },
					  
					  // preConfirm: function (form) {
						  // console.log('hello');
							  // console.log(form.find('#mobileNumber').val());
						// return new Promise(function (resolve) {
						  // resolve([
							// //form.find('#mobileNumber').val(),
							// $('#input-field').val(),
							// $('#lastName').val(),
							// $('#dob').val()
						  // ])
						// })
					  // },
					  // onOpen: function () {
						// $('#swal-input').focus()
					  // }

			}).then(function(result) {
				if(result.value){
					form_data = {
						'FirstName': $('#editUserDetail').find('input[name="FirstName"]').val(),
						'LastName': $('#editUserDetail').find('input[name="LastName"]').val(),
						'MobileNumber': $('#editUserDetail').find('input[name="MobileNumber"]').val(),
						'EmailAddress': $('#editUserDetail').find('input[name="EmailAddress"]').val(),
						// 'DOB': $('#editUserDetail').find('input[name="DOB"]').val(),
						// 'HealthCondition': $('#editUserDetail').find('select[name="HealthCondition"]').val(),
						// 'HealthProblem': $('#editUserDetail').find('select[name="HealthProblem"]').val(),
						
					};
					console.log(form_data);
					$.ajax({
						url: base_url+"Admin/updateUserDetail",
						type: "post",
						data: form_data,
						success: function(res){
							if(res){
								
								swal({
								type: 'success',
								html: 'Your Profile deatil is updated successfully: <strong>' +
									$('#input-field').val() +" "+$('#lastName').val()+
									'</strong>',
									title: "Auto close alert!",
									text: "I will close in 2 seconds.",
									timer: 3000,
									showConfirmButton: false
								})
								 setTimeout(function(){ 
									// window.location.href=base_url+'user-profile';
									location.reload();
								 },3000);
							} else{
								
								swal({
								type: 'error',
								html: 'oops! something went wrong: <strong>' +
									'</strong>',
									title: "Auto close alert!",
									text: "I will close in 2 seconds.",
									timer: 3000,
									showConfirmButton: false
								})
								 setTimeout(function(){ 
									// window.location.href=base_url+'user-profile';
									location.reload();
								 },3000);
							}
						}
					});		
				}
				}).catch(swal.noop)
			}	
		}
	}
});

</script>