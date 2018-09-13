<?php $this->load->view('header'); 
$msg = $this->session->flashdata('message');
?>

<div class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
			<?php if(!empty($msg)){ ?>
				<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<!--div class="alert alert-success text-center <?php echo ($msg == 'success') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'success') ? 'block':'none' ?>"-->
					<div class="alert alert-success text-center <?php echo ($msg == 'success') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'success')  ? 'block':'none' ?>"><i data-notify="icon" class="material-icons">add_alert</i>
						<span><strong> Instructor! </strong> Added Successfully</span>
					</div>
				
					<div class="alert alert-primary text-center <?php echo ($msg == 'succ') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'succ') ? 'block':'none' ?>"><i data-notify="icon" class="material-icons">add_alert</i>
						<span><strong> Instructor! </strong> Updated Successfully</span>
					</div>
					<?php echo ($msg == 'error') ? 'alert-msg':'' ?>
					<div class="alert alert-rose text-center <?php echo ($msg == 'error') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'error') ? 'block':'none' ?>"><i data-notify="icon" class="material-icons">add_alert</i>
						<span><strong> Oops! </strong>  something went wrong </span>
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
					<table class="table" id="instructorList">
					  <thead>
						<tr>
						  <th class="text-center">No.</th>
						  <th class="text-center">Instructor Id</th>
						  <th>Instructor Name</th>
						  <th>Phone Number</th>
						  <th>Email Address</th>
						  <th>Gender</th>
						  <th>Since</th>
						  <th class="text-right">Actions</th>
						</tr>
					  </thead>
					  <tbody>
						<?php
							if(!empty($instructors_data)){
								$i=1;
								foreach($instructors_data as $key => $data){
									// $values=getdate(strtotime($data['CreatedOn']));
									// $monthNum  = $values['mon'];
									// $dateObj   = DateTime::createFromFormat('!m', $monthNum);
									// $monthName = $dateObj->format('F'); 
									$startDate = strtotime($data['CreatedOn']);
						?>
						<tr>
						  <td class="text-center"><?php echo $i; ?></td>
						  <td class="text-center"><?php echo $data['Instruc_UniqueId']; ?></td>
						  <td><?php echo $data['InstrucFName'].' '.$data['InstrucLName']; ?></td>
						  <td><?php echo $data['InstrucMobile']; ?></td>
						  <td><?php echo $data['InstrucEmail']; ?></td>
						  <td><?php echo $data['InstrucGender']; ?></td>
						  <td><?php echo date('d M Y', $startDate);?></td>
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
						
					  } 
					  //else {?>
								<!--tr>
									<td colspan="8" class="text-center">No Instructor Available</td>
								</tr-->
					<?php // } ?>
					  </tbody>
					</table>
				  </div>
				</div>
		  </div>
		</div>
	</div>
</div>
<?php $this->load->view('footer'); ?>
<script src="<?php echo base_url('assets/validation/view_instructor_list.js'); ?>"></script>

