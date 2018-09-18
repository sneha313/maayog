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
						<span><strong> <i class="material-icons">check_circle</i> </strong> Corporate Added Successfully</span>
					</div>
					<div class="alert alert-info text-center <?php echo ($msg == 'succ') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'succ') ? 'block':'none' ?>">
						<!--button type="button" name="close" aria-hidden="true" class="close">×</button-->
						<span><strong> <i class="material-icons">circle-edit-outline</i> </strong> Corporate Edited Successfully</span>
					</div>
					
					<div class="alert alert-danger text-center <?php echo ($msg == 'error') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'error') ? 'block':'none' ?>">
						<!--button type="button" name="close" aria-hidden="true" class="close">×</button-->
						<span><strong> <i class="material-icons">error</i> </strong>  something went wrong</span>
					</div>
				</div>
			</div>
			<?php } ?>
			<div class="card card-table">
				<div class="card-header card-header-table bg-rose">
					<i class="material-icons">assignment</i>
				</div>
				<a href="<?php echo base_url('add-corp'); ?>" class="btn btn-sm table-btn btn-round pull-right"><i class="fa fa-users" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i>Add Corporate<div class="ripple-container"></div></a>

				<div class="card-header-text-table bg-rose">
					<h4 class="title">Corporate list</h4>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
					<table class="table">
					  <thead>
						<tr>
						  <th class="text-center">Corporate Id</th>
						  <th>Company Name</th>
						  <th>Phone Number</th>
						  <th>Email Address</th>
						  <th>Since</th>
						  <th>City</th>
						  <th class="text-right">FB Link</th>
						  <th class="text-right">Map Link</th>
						  <th class="text-right">Actions</th>
						</tr>
					  </thead>
					  <tbody>
						<?php
						  if(!empty($corporates_data)){
							foreach($corporates_data as $key => $data){
								$values=getdate(strtotime($data['CreatedOn']));
								$monthNum  = $values['mon'];
								$dateObj   = DateTime::createFromFormat('!m', $monthNum);
								$monthName = $dateObj->format('F'); 
						?>
						<tr>
						  <td class="text-center"><?php echo $data['Corp_UniqueId']; ?></td>
						  <td><?php echo $data['CompanyName']; ?></td>
						  <td><?php echo $data['CompanyPhone']; ?></td>
						  <td><?php echo $data['CompanyEmail']; ?></td>
						  <td class="text-right"><?php echo $values['mday']." ".$monthName.", ".$values['year'];?></td>
						  <td><?php echo $data['City']; ?></td>
						  <td class="text-right"><?php echo $data['FBLink']; ?></td>
						  <td class="text-right"><?php echo $data['MapLink']; ?></td>
						  <td class="td-actions text-right">
							<div class="actions-container">
								<a href="<?php echo base_url('corp_info/'.$data['CorpId']);?>" class="btn btn-round btn-info" title="View Corporate Detail Info">
								  <i class="fa fa-eye" aria-hidden="true"></i>
								</a>
								<a href="<?php echo base_url('edit_corp_info/'.$data['CorpId']);?>" class="btn btn-round btn-success"  title="Edit Corporate Detail">
								  <i class="material-icons">edit</i>
								</a>
								<a href="<?php echo base_url('delete_corp_info/'.$data['CorpId']);?>" class="btn btn-round btn-danger" title="Delete Corporate"  data-toggle="confirmation" data-placement="left" data-singleton="true">
								  <i class="material-icons">close</i>
								</a>
							</div>
						  </td>
						</tr>
						<?php
						}
					  } else {?>
								<tr>
									<td colspan="9" class="text-center">No Corporates Available</td>
								</tr>
					<?php  } ?>
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
	$('.sidebar-wrapper').find('.nav li.CorpUserManagement').addClass('active');
});
</script>
