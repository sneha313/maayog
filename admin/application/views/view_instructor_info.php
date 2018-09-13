<?php $this->load->view('header');
$this->uri->segment(2);
 ?>
  <link href='<?php echo base_url('assets/css/rotating-card.css'); ?>' rel="stylesheet" />
  <style>
	.card .header {
		padding: 25px 10px;
		height: 20px;
		align-content: left;
		align-items: left;
	}
	.card .content {
		background-color: rgba(0, 0, 0, 0);
		box-shadow: none;
		padding: 11px 11px 20px;
	}
	default.btn-simple {
		background-color: transparent;
		color: #999999;
		box-shadow: none;
		position: absolute !important;
		bottom: 0;
	}
	.main-panel>.content {
		margin-top: 0px;
		padding: 21px !important;
		margin-bottom: 30px;
	}
  </style>
  <div class="content">
	<!--div class="row">
	<div class="col-md-3">
      <div class="card card-profile">
          <img class="img-responsive" src="<?php echo (!empty($instructor_info_byId['ProfilePhoto'])) ? base_url($instructor_info_byId['ProfilePhoto']) : base_url('assets/img/faces/placeholder.jpg'); ?>">
       <div class="myCard">
			<h6 class="card-category text-gray ContentStyle">
			<?php echo (!empty($instructor_info_byId['InstrucFName'])) ? $instructor_info_byId['InstrucFName'].' '.$instructor_info_byId['InstrucLName'] : ''; ?></h6>
		</div>
      </div>
    </div>
		<div class="col-md-9">
			<div class="card card-table">
				<div class="card-header card-header-table bg-rose">
					<i class="material-icons">perm_identity</i>
				</div>
				<div class="card-header-text-table bg-rose">
					<h4 class="title">Instructor Detail</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table text-gray">
							<tbody  class="TableContentPad">
							<tr></tr>
							<tr>
								<th>Name</th>
								<td><?php echo (!empty($instructor_info_byId['InstrucFName'])) ? $instructor_info_byId['InstrucFName'].' '. $instructor_info_byId['InstrucLName']: ''; ?></td>
							</tr>
							<tr>
								<th>Phone Number</th>
								<td><?php echo (!empty($instructor_info_byId['InstrucMobile'])) ? $instructor_info_byId['InstrucMobile'] : ''; ?></td>
							</tr>
							<tr>
								<th>Email Address</th>
								<td><?php echo (!empty($instructor_info_byId['InstrucEmail'])) ? $instructor_info_byId['InstrucEmail'] : ''; ?></td>
							</tr>
							
							<tr>
								<th>Gender</th>
								<td><?php echo (!empty($instructor_info_byId['InstrucGender'])) ? $instructor_info_byId['InstrucGender'] : ''; ?></td>
							</tr>
							<tr>
								<th>Date Of Birth</th>
								<td><?php echo (!empty($instructor_info_byId['DateOfBirth'])) ? $instructor_info_byId['DateOfBirth'] : ''; ?></td>
							</tr>
							<tr>
								<th>Assigned Class</th>
								<td><?php echo (!empty($instructor_info_byId['DateOfBirth'])) ? $instructor_info_byId['DateOfBirth'] : ''; ?></td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div-->
	<div class="row">
		<!--div class="col-md-7">
		  <div class="card card-table">
			<div class="card-header card-header-table bg-rose">
				<i class="material-icons">receipt</i>
			</div>
			<div class="card-header-text-table bg-rose">
				<h4 class="title">Assigned Class</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table text-gray">
						<tbody class="TableContentPad">
							<tr></tr>
							<tr>
								<th>Class Name</th>
								<th>Class Type</th>
								<th>Batch Duration</th>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>	
		</div-->
		<div class="col-md-5">
		   <div class="card-container">
         <div class="card">
             <div class="front">
                 <div class="cover">
                     <img src="<?php echo base_url('assets/images/rotating_card_thumb3.png'); ?>"/>
                 </div>
                 <div class="user">
                     <!--img class="img-circle" src="images/rotating_card_profile.png"/-->
					 <img class="img-circle" src="<?php echo (!empty($instructor_info_byId['ProfilePhoto'])) ? base_url($instructor_info_byId['ProfilePhoto']) : base_url('assets/img/faces/placeholder.jpg'); ?>">
                 </div>
                 <div class="content">
                    <div class="main">
                         <h3 class="name"><?php echo (!empty($instructor_info_byId['InstrucFName'])) ? $instructor_info_byId['InstrucFName'].' '.$instructor_info_byId['InstrucLName'] : ''; ?></h3>
                         <p class="profession">Instructor</p>

                         <!--p>"I'm the new Sinatra, and since I made it here I can make it anywhere, yeah, they love me everywhere"</p-->
						 <div class="table-responsive">
							<table class="table text-gray">
								<tbody class="TableContentPad">
								<tr></tr>
								<tr>
									<th>Phone Number</th>
										<td><?php echo (!empty($instructor_info_byId['InstrucMobile'])) ? $instructor_info_byId['InstrucMobile'] : ''; ?></td>
								</tr>
								<tr>
									<th>Email Address</th>
									<td><?php echo (!empty($instructor_info_byId['InstrucEmail'])) ? $instructor_info_byId['InstrucEmail'] : ''; ?></td>
								</tr>
								<tr>
									<th>Gender</th>
									<td><?php echo (!empty($instructor_info_byId['InstrucGender'])) ? $instructor_info_byId['InstrucGender'] : ''; ?></td>
								</tr>
								</tbody>
							</table>
						</div>
                    </div>
					<!--div class="footer">
						<div class="rating">
							<i class="fa fa-mail-forward"></i> Auto Rotation for emergency detail
						</div>
					</div-->
                </div>
            </div> <!-- end front panel -->
            <div class="back">
                 
			<div class="card-header card-header-table bg-rose">
				<i class="material-icons">receipt</i>
			</div>
			<div class="card-header-text-table bg-rose">
				<h5>Address Detail</h5>
			</div>
			
            <div class="content">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table text-gray">
						<tbody class="TableContentPad">
						<tr></tr>
						<tr>
							<th>City</th>
							<td><?php echo (!empty($instructor_info_byId['City'])) ? $instructor_info_byId['City'] : ''; ?></td>
						</tr>
						<tr>
							<th>State</th>
							<td><?php echo (!empty($instructor_info_byId['State'])) ? $instructor_info_byId['State'] : ''; ?></td>
						</tr>
						<tr>
							<th>Pin Code</th>
							<td><?php echo (!empty($instructor_info_byId['PinCode'])) ? $instructor_info_byId['PinCode'] : ''; ?></td>
						</tr>
						<tr>
							<th>Country</th>
							<td><?php echo (!empty($instructor_info_byId['Country'])) ? $instructor_info_byId['Country'] : ''; ?></td>
						</tr>
						<tr>
							<th>Address Detail</th>
							<td><?php echo (!empty($instructor_info_byId['AddressLine1'])) ? $instructor_info_byId['AddressLine1'] .' '.$instructor_info_byId['AddressLine2']: ''; ?></td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
			</div>
            <div class="footer">
				<div class="rating">
					<i class="fa fa-mail-forward"></i> Hover mouse for personal detail
				</div>
			</div>

             </div> <!-- end back panel -->
         </div> <!-- end card -->
     </div> <!-- end card-container -->
		</div>
		<div class="col-md-7">
		<div class="card-container manual-flip">
        <div class="card">
            <div class="front">
			<div class="card-header card-header-table bg-rose">
				<i class="material-icons">receipt</i>
			</div>
			<div class="card-header-text-table bg-rose">
				<h5>Assigned Class Detail</h5>
			</div>   
                 <div class="content">
                     <div class="main">
                         <!--p class="text-center">Web design, Adobe Photoshop, HTML5, CSS3, Corel and many others...</p-->

                         <!--div class="stats-container"-->

						<div class="table-responsive">
							<table class="table text-gray">
								<thead>
									<tr>
										<th>Class Name</th>
										<th>Class Type</th>
										<th>Batch Duration</th>
										<th>Recurrence</th>
									</tr>
								</thead>
								<tbody>
								<?php 
									$instructorId = $instructor_info_byId['InstrucId'];
									$res = $this->Admin_Model->getAssign_Instructor($instructorId);
									if(!empty($res)){
										foreach($res as $result){
											$classId=$result['ClassName'];
											$classDetail = $this->Admin_Model->getClass_byId($classId);
											$startdate= strtotime($classDetail['StartDate']);
											$enddate= strtotime($classDetail['EndDate']);
								?>
								<tr>
									<td><?php echo $classDetail['ClassName'];?></td>
									<td><?php echo ($classDetail['ClassType'] == 1) ? 'Individual' :'Corporate';?></td>
									<td><?php echo date('d M Y', $startdate).' - '.date('d M Y', $enddate);?></td>
									<td><?php echo $classDetail['RecurrenceType'];?></td>
								</tr>
								<?php  }}?>
								</tbody>
							</table>
						</div>
                     </div>
                 </div>
				<div class="footer">
					<!--div class="rating">
						<i class="fa fa-mail-forward"></i> Hover mouse for emergency detail
					</div-->
					<button class="btn btn-simple" onclick="rotateCard(this)">
						<i class="fa fa-mail-forward"></i> Click here to see Emergency Detail
					</button>
				</div>
             </div> <!-- end back panel -->
            <div class="back">
				<div class="card-header card-header-table bg-rose">
					<i class="material-icons">receipt</i>
				</div>
				<div class="card-header-text-table bg-rose">
					<h5>Emergency Detail</h5>
				</div>
				<div class="content">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table text-gray">
							<tbody class="TableContentPad">
								<tr></tr>
								<tr>
									<th>Name</th>
									<td><?php  echo (!empty($instructor_info_byId['ContactPersonFName'])) ? $instructor_info_byId['ContactPersonFName'].' '.$instructor_info_byId['ContactPersonLName'] : '';?></td>
								</tr>
								<tr>
									<th>Mobile Number</th>
									<td><?php echo (!empty($instructor_info_byId['ContactPersonMobile'])) ? $instructor_info_byId['ContactPersonMobile'] : ''; ?></td>
								</tr>
								<tr>
									<th>Land Line Number</th>
									<td><?php echo (!empty($instructor_info_byId['ContactPersonMobile'])) ? $instructor_info_byId['ContactPersonMobile'] : ''; ?></td>
								</tr>
								<tr>
									<th>Email Address</th>
									<td><?php echo (!empty($instructor_info_byId['ContactPersonEmail'])) ? $instructor_info_byId['ContactPersonEmail'] : ''; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				</div>
				<div class="footer">
					<!--div class="rating">
						<i class="fa fa-mail-forward"></i> Hover mouse for class detail
					</div-->
					<button class="btn btn-simple" rel="tooltip" title="" onclick="rotateCard(this)" data-original-title="Flip Card">
						<i class="fa fa-reply"></i> Click here to see Assigned Class Detail
					</button>
				</div>
            </div> <!-- end back panel -->
         </div> <!-- end card -->
     </div> <!-- end card-container -->
		</div>
		<!--div class="col-md-4">
		  <div class="card card-table">
			<div class="card-header card-header-table bg-rose">
				<i class="material-icons">receipt</i>
			</div>
			<div class="card-header-text-table bg-rose">
				<h4 class="title">Address Detail</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table text-gray">
						<tbody class="TableContentPad">
						<tr></tr>
						<tr>
							<th>City</th>
							<td><?php echo (!empty($instructor_info_byId['City'])) ? $instructor_info_byId['City'] : ''; ?></td>
						</tr>
						<tr>
							<th>State</th>
							<td><?php echo (!empty($instructor_info_byId['State'])) ? $instructor_info_byId['State'] : ''; ?></td>
						</tr>
						<tr>
							<th>Pin Code</th>
							<td><?php echo (!empty($instructor_info_byId['PinCode'])) ? $instructor_info_byId['PinCode'] : ''; ?></td>
						</tr>
						<tr>
							<th>Country</th>
							<td><?php echo (!empty($instructor_info_byId['Country'])) ? $instructor_info_byId['Country'] : ''; ?></td>
						</tr>
						<tr>
							<th>Address Detail</th>
							<td><?php echo (!empty($instructor_info_byId['AddressLine1'])) ? $instructor_info_byId['AddressLine1'] .' '.$instructor_info_byId['AddressLine2']: ''; ?></td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>	
		</div>
		<div class="col-md-4">
			<div class="card card-table">
				<div class="card-header card-header-table bg-rose">
					<i class="material-icons">receipt</i>
				</div>
				<div class="card-header-text-table bg-rose">
					<h4 class="title">Emergency Detail</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table text-gray">
							<tbody  class="TableContentPad">
							<tr></tr>
							<tr>
								<th>Name</th>
								<td><?php  echo (!empty($instructor_info_byId['ContactPersonFName'])) ? $instructor_info_byId['ContactPersonFName'].' '.$instructor_info_byId['ContactPersonLName'] : '';?></td>
							</tr>
							<tr>
								<th>Mobile Number</th>
								<td><?php echo (!empty($instructor_info_byId['ContactPersonMobile'])) ? $instructor_info_byId['ContactPersonMobile'] : ''; ?></td>
							</tr>
							<tr>
								<th>Land Line Number</th>
								<td><?php echo (!empty($instructor_info_byId['ContactPersonMobile'])) ? $instructor_info_byId['ContactPersonMobile'] : ''; ?></td>
							</tr>
							<tr>
								<th>Email Address</th>
								<td><?php echo (!empty($instructor_info_byId['ContactPersonEmail'])) ? $instructor_info_byId['ContactPersonEmail'] : ''; ?></td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div-->
	</div>
	
	</div>

<?php $this->load->view('footer'); ?>
<script type="text/javascript">
    $().ready(function(){
        $('[rel="tooltip"]').tooltip();

        $('a.scroll-down').click(function(e){
            e.preventDefault();
            scroll_target = $(this).data('href');
             $('html, body').animate({
                 scrollTop: $(scroll_target).offset().top - 60
             }, 1000);
        });

    });

    function rotateCard(btn){
        var $card = $(btn).closest('.card-container');
        console.log($card);
        if($card.hasClass('hover')){
            $card.removeClass('hover');
        } else {
            $card.addClass('hover');
        }
    }


</script>
<script>
$(document).ready(function(){
	$('.sidebar-wrapper').find('.nav li').removeClass('active');
	$('.sidebar-wrapper').find('.nav li.InstructorManagement').addClass('active');
});
</script>