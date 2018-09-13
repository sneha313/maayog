<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>MaaYog</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!---link href="https://demos.creative-tim.com/material-dashboard-pro/assets/css/material-dashboard.min.css?v=2.0.2"  rel="stylesheet" /--->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap core CSS     -->
	<!-- Latest compiled and minified CSS -->
	<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"-->
    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url(); ?>assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/switch.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/Material_Icons.css" rel='stylesheet' type='text/css'>
	<!--link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css.map" rel="stylesheet"-->
	<link rel ="stylesheet" href="<?php echo base_url(); ?>assets/css/material.indigo-pink.min.css">
	<link rel ="stylesheet" href="<?php echo base_url(); ?>assets/css/mdl-selectfield.min.css">
	<link rel ="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrapValidator.css">
	<link rel ="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-timepicker.min.css">
	<link rel ="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert2.css">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap-multiselect.css" rel="stylesheet">
	<link href='<?php echo base_url('assets/fullcalendar/fullcalendar.css'); ?>' rel='stylesheet' />
	<link href='<?php echo base_url('assets/fullcalendar/fullcalendar.print.css'); ?>' rel='stylesheet' media='print' />
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" media="screen and (max-width: 1024px)" href="<?php echo base_url('assets/css/media-max-width-1024px.css');?>">
	<link rel="stylesheet" type="text/css" media="screen and (max-width: 768px)" href="<?php echo base_url('assets/css/media-max-width-768px.css'); ?>">
	<link rel="stylesheet" type="text/css" media="screen and (max-width: 425px)" href="<?php echo base_url('assets/css/media-max-width-425px.css'); ?>">
	<link rel="stylesheet" type="text/css" media="screen and (max-width: 320px)" href="<?php echo base_url('assets/css/media-max-width-320px.css'); ?>">
</head>
<body>
    <div class="wrapper">
        <?php $this->load->view('sidebar'); ?>
		
        <div class="main-panel">
			<div id="loader"> <?php $this->load->view('loader'); ?> </div>
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo base_url('user-profile');?>">Welcome,&nbsp;<span class="NavName"><?php echo (empty($this->session->userdata('FullName')))? 'User': $this->session->userdata('FullName');?></span></a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown NotificationIcon">
                                <a href="javascript:void(0);" class="dropdown-toggle NotificationDetail" id="notificationDetail" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="material-icons BellIcon">notifications</i>
                                    <span class="notification NumIcon" data-id='' style="display:none;"></span>
                                    <p class="hidden-lg hidden-md">Notifications</p>
                                </a>
                                <ul class="dropdown-menu">
								<?php $notification=$this->User_Model->get_latest_notification();
								if(!empty($notification)){
								foreach($notification as $notify){?>
                                    <li>
                                        <a href="javascript:void(0);" class="count" data-id="<?php echo $notify['NotificationId']; ?>"><?php echo $notify['ShortMessage']; ?></a>
                                    </li>
								<?php }  ?>
									<li>
                                        <a href="<?php echo base_url('notification');?>">More Notification</a>
									</li>
								<?php } else { ?>
									<li>
                                        <a href="<?php echo base_url('notification');?>">No Notification Available</a>
									</li>
								<?php } ?>
                                </ul>
                            </li>
							<?php 
								$title = '';
								$Role = $this->session->userdata('Role');
								if(!empty($Role)){
									
									switch($Role){
										case 1 : 
											$title = '(user)';
										break;
										case 2 : 
											$title = '';
										break;
										case 3 : 
											$title = '(admin)';
										break;
										default : 
											$title = '(Unknown';
										break;
									}
								}
							?>
                            <li>
								<?php $res = $this->User_Model->get_user(); ?>
								<div class="dropdown" style="float:right;">
								  <img onclick="myFunction()" class="img-responsive user-profile dropbtn" src="<?php echo (!empty($res['ProfilePhoto'])) ? base_url($res['ProfilePhoto']) : base_url('assets/img/faces/placeholder.jpg'); ?>">
								  <div id="myDropdown" class="dropdown-content">
										<div class="row ProfileHeader">
											<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" style="float:left;">
												<img class="img-responsive img-circle profile-picture" src="<?php echo (!empty($res['ProfilePhoto'])) ? base_url($res['ProfilePhoto']) : base_url('assets/img/faces/placeholder.jpg'); ?>">
											</div>
											<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 text-center">
												<strong class="text-user-name"><?php echo (empty($this->session->userdata('FullName')))? '': $this->session->userdata('FullName');?></strong>
												<p class="text-user-ind"><small><?php echo $title; ?></small><br/><span class="text-purple"><?php echo (empty($this->session->userdata('EmailAddress')))? 'User': $this->session->userdata('EmailAddress');?></span></p>
											</div>	
										</div>
										<div class="row text-center DropRow">
											<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 DropBtn">
												<a href="<?php echo base_url('user-profile'); ?>"class="btn btn-sm btn-rose btn-block"><i class="fa fa-user icon">&nbsp;&nbsp;&nbsp;</i>Profile</a>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 DropBtn">
												<a href="<?php echo base_url('logout'); ?>" class="btn btn-sm btn-primary btn-block"><i class="fa fa-power-off icon">&nbsp;&nbsp;&nbsp;</i>Logout</a>
											</div>
										</div>
								    </div>
								</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>