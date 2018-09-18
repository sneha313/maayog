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
					<span><strong> <i class="material-icons">checkbox-marked-circle-outline</i> </strong> Instructor Added Successfully</span>
				</div>
				<div class="alert alert-info text-center <?php echo ($msg == 'succ') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'succ') ? 'block':'none' ?>">
					<!--button type="button" name="close" aria-hidden="true" class="close">×</button-->
					<span><strong> <i class="material-icons">info_outline</i> </strong> Instructor Edited Successfully</span>
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
				<a href="<?php echo base_url('add-instruc'); ?>" class="btn btn-sm table-btn btn-round pull-right"><i class="fa fa-users" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i>Add Instructor<div class="ripple-container"></div></a>

				<div class="card-header-text-table bg-rose">
					<h4 class="title">Instructor list</h4>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
					<table class="table">
					  <thead>
						<tr>
						  <th class="text-center">No.</th>
						  <th class="text-center">Instructor Id</th>
						  <th>Instructor Name</th>
						  <th>Gender</th>
						  <th>Phone Number</th>
						  <th>Email Address</th>
						  <th>Since</th>
						  <th class="text-right">Actions</th>
						</tr>
					  </thead>
					  <tbody>
						<?php
						  if(!empty($instructors_data)){
							  $i=1;
							foreach($instructors_data as $key => $data){
								$values=getdate(strtotime($data['CreatedOn']));
								$monthNum  = $values['mon'];
								$dateObj   = DateTime::createFromFormat('!m', $monthNum);
								$monthName = $dateObj->format('F'); 
						?>
						<tr>
						  <td class="text-center"><?php echo $i; ?></td>
						  <td><?php echo $data['Instruc_UniqueId']; ?></td>
						  <td><?php echo $data['InstrucFName'].' '.$data['InstrucLName']; ?></td>
						  <td><?php echo $data['InstrucLName']; ?></td>
						  <td><?php echo $data['InstrucMobile']; ?></td>
						  <td><?php echo $data['InstrucEmail']; ?></td>
						  <td><?php echo $values['mday']." ".$monthName.", ".$values['year'];?></td>
						  <td class="td-actions text-right">
							<div class="actions-container">
								<a href="<?php echo base_url('instruc_info/'.$data['InstrucId']);?>" class="btn btn-round btn-info" title="View Instructor Detail Info">
								  <i class="fa fa-eye" aria-hidden="true"></i>
								</a>
								<a href="<?php echo base_url('edit_instruc_info/'.$data['InstrucId']);?>" class="btn btn-round btn-success"  title="Edit Instructor Info">
								  <i class="material-icons">edit</i>
								</a>
								<a href="<?php echo base_url('delete_instruc_info/'.$data['InstrucId']);?>" class="btn btn-round btn-danger" title="Delete Instructor" data-toggle="confirmation" data-singleton="true" data-placement="left" >
								  <i class="material-icons">close</i>
								</a>
							</div>
						  </td>
						</tr>
						<?php
						$i++;
						}
						
					  } else {?>
								<tr>
									<td colspan="8" class="text-center">No Instructor Available</td>
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
	$('.sidebar-wrapper').find('.nav li.InstructorManagement').addClass('active');
});
</script>
