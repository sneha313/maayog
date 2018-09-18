<?php $this->load->view('header'); 
$msg = $this->session->flashdata('message');
?>
<!--style>
// #corporateList{
	// word-wrap: break-word;
    // table-layout: fixed;
// }
</style-->
<div class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
			<?php if(!empty($msg)){ ?>
				<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<!--div class="alert alert-success text-center <?php echo ($msg == 'success') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'success') ? 'block':'none' ?>"-->
					<div class="alert alert-success text-center<?php echo ($msg == 'success') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'success')  ? 'block':'none' ?>"><i data-notify="icon" class="material-icons">add_alert</i>
						<span><strong> Corporate! </strong> Added Successfully</span>
					</div>
				
					<div class="alert alert-primary text-center <?php echo ($msg == 'succ') ? 'alert-msg':'' ?>"  style="display:<?php echo ($msg == 'succ') ? 'block':'none' ?>"><i data-notify="icon" class="material-icons">add_alert</i>
						<span><strong> Corporate! </strong> Updated Successfully</span>
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
				<a href="<?php echo base_url('add-corp'); ?>" class="btn btn-sm table-btn btn-round pull-right"><i class="fa fa-users" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i>Add Corporate<div class="ripple-container"></div></a>

				<div class="card-header-text-table bg-rose">
					<h4 class="title">Corporate list</h4>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
					<table id="corporateList" class="table notify">
					  <thead>
						<tr>
						  <th>Corporate Id</th>
						  <th>Company Name</th>
						  <th>Phone Number</th>
						  <th>Email Address</th>
						  <th>Since</th>
						  <th>City</th>
						  <!--th class="text-center">FB Link</th-->
						  <!--th class="text-right">Map Link</th-->
						  <th class="text-right">Actions</th>
						</tr>
					  </thead>
					  <tbody>
						<?php
						  if(!empty($corporates_data)){
							foreach($corporates_data as $key => $data){
								// $values=getdate(strtotime($data['CreatedOn']));
								// $monthNum  = $values['mon'];
								// $dateObj   = DateTime::createFromFormat('!m', $monthNum);
								// $monthName = $dateObj->format('F'); 
								$startDate = strtotime($data['CreatedOn']);
						?>
						<tr>
						  <td><?php echo $data['Corp_UniqueId']; ?></td>
						  <td><?php echo $data['CompanyName']; ?></td>
						  <td><?php echo $data['CompanyPhone']; ?></td>
						  <td><?php echo $data['CompanyEmail']; ?></td>
						  <td><?php echo date('d M Y', $startDate);?></td>
						  <td><?php echo $data['City']; ?></td>
						  <!--td class="text-right"><?php echo $data['FBLink']; ?></td-->
						  <!--td class="text-right"><?php echo $data['MapLink']; ?></td-->
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
					  } 
					  //else {?>
								<!--tr>
									<td colspan="9" class="text-center">No Corporates Available</td>
								</tr-->
					<?php  //} ?>
					  </tbody>
					</table>
				  </div>
				</div>
		  </div>
		</div>
	</div>
</div>
<?php $this->load->view('footer'); ?>
<script src="<?php echo base_url('assets/validation/view_corp_list.js'); ?>"></script>

