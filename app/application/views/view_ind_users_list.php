<?php $this->load->view('header');
$msg = $this->session->flashdata('message');
 ?>
<div class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
			<?php if(!empty($msg)){ ?>
				<div class="row">
				<div class="col-xs-9 col-sm-10 col-md-10 col-lg-10 col-xl-10 col-xs-offset-3 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-xl-offset-2">
				<div class="alert alert-success text-center <?php echo ($msg == 'success') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'success') ? 'block':'none' ?>">
					<!--button type="button" name="close" aria-hidden="true" class="close">×</button-->
					<!--span><strong> User Info! </strong>  Added Successfully</span-->
					<span><strong><!--button type="button" class="btn btn-success bmd-btn-fab"><i class="material-icons">grade</i></button--><!--i class="material-icons">beenhere</i--> <!--i class="material-icons">check</i--><i class="material-icons">check_circle</i></strong>  Added Successfully</span>
				</div>
				<div class="alert alert-info text-center <?php echo ($msg == 'succ') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'succ') ? 'block':'none' ?>">
					<button type="button" name="close" aria-hidden="true" class="close">×</button>
					<span><!--strong> User Info! </strong--><strong><i class="material-icons">info</i> </strong> Edited Successfully</span>
				</div>
				
				<div class="alert alert-danger text-center <?php echo ($msg == 'error') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'error') ? 'block':'none' ?>">
					<button type="button" name="close" aria-hidden="true" class="close">×</button>
					<span><!--strong> oops ! </strong--><strong> <i class="material-icons">error</i> </strong>  something went wrong</span>
				</div>
				</div>
				</div>
			<?php } ?>
			<div class="card card-table">
				<div class="card-header card-header-table bg-rose">
					<i class="material-icons">assignment</i>
				</div>
				<a href="<?php echo base_url('add-ind-user'); ?>" class="btn btn-sm table-btn btn-round pull-right"><i class="fa fa-user-plus" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i>Add User<div class="ripple-container"></div></a>

				<div class="card-header-text-table bg-rose">
					<h4 class="title">Users list</h4>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
					<table class="table" id="indUserList">
					  <thead>
						<tr>
						  <th class="text-center">User Id</th>
						  <th>Name</th>
						  <th>Email Id</th>
						  <th>Mobile No.</th>
						  <th class="text-right">Batch Duration</th>
						  <!--<th class="text-right">Last Payment</th>-->
						  <th class="text-right">Since</th>
						  <th class="text-right">Status</th>
						  <th class="text-right">Actions</th>
						</tr>
					  </thead>
					  <tbody>
					  <?php
					  if(!empty($users_data)){
						foreach($users_data as $key => $data){
							$values=getdate(strtotime($data['CreatedOn']));
							$monthNum  = $values['mon'];
							$dateObj   = DateTime::createFromFormat('!m', $monthNum);
							$monthName = $dateObj->format('F'); 
					  ?>
						<tr>
						  <td class="text-center"><?php echo $data['User_UniqueId']; ?></td>
						  <td><?php echo $data['FirstName'].' '.$data['LastName']; ?></td>
						  <td><?php echo $data['EmailAddress']; ?></td>
						  <td><?php echo $data['MobileNumber']; ?></td>
						  <td class="text-right"><?php echo $data['BatchName']; ?></td>
						  <td class="text-right"><?php echo $values['mday']." ".$monthName.", ".$values['year']; ?></td>
						  <td>
							<div class="onoffswitch">
								<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="<?php echo $data['UserId'];?>" checked>
								<label class="onoffswitch-label" for="<?php echo $data['UserId'];?>">
									<span class="onoffswitch-inner"></span>
									<span class="onoffswitch-switch"></span>
								</label>
							</div>
						  </td>
						  <td class="td-actions text-right">
							<div class="actions-container">
								<a href="<?php echo base_url('ind_user_info/'.$data['UserId']);?>" class="btn btn-round btn-info" title="View User Detail Info">
								  <i class="fa fa-eye" aria-hidden="true"></i>
								</a>
								<a href="<?php echo base_url('edit_ind_user_info/'.$data['UserId']);?>" class="btn btn-round btn-success"  title="Edit User Detail">
								  <i class="material-icons">edit</i>
								</a>
								<a href="<?php echo base_url('delete_ind_user_info/'.$data['UserId']);?>" class="btn btn-round btn-danger" data-toggle="confirmation" data-placement="left" data-singleton="true" title="Delete User">
								  <i class="material-icons">close</i>
								</a>
							</div>
						  </td>
						</tr>
						<?php
						}
					  }
					  ?>
					  </tbody>
					</table>
				  </div>
				</div>
		  </div>
		</div>
	</div>
</div>
<?php $this->load->view('footer'); ?>
<script>
$(document).ready(function(){
	$('.sidebar-wrapper').find('.nav li').removeClass('active');
	$('.sidebar-wrapper').find('.nav li.IndUserManagement').addClass('active');
});
// $(document).ready(function(){
	// $('#indUserList').DataTable({
		// "pagelength" : 7
		// "fnDrawCallback" : function(Settings){
			// if($('#indUserList tr').length < 7){
				// $('div.dataTables_paginate.paging_full_numbers').hide();
			// } else{
				// $('div.dataTables_paginate.paging_full_numbers').hide();
			// }
		// }
	// });
// });
</script>
