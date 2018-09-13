<div class="sidebar" data-color="rose" data-background-color="black" data-image="<?php echo base_url('assets/img/sidebar-1.jpg'); ?>">
            <div class="logo">
                <a href="<?php echo base_url('dashboard');?>" class="simple-text">
				
                    <img src="<?php echo  base_url('assets/img/maayoglogo.png')?>" />
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="dashboard">
                        <a class="nav-link" href="<?php echo base_url('dashboard');?>">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
					
					<li class="ClassCalendar">
                        <a class="nav-link" href="<?php echo base_url('class-calendar'); ?>">
                            <i class="material-icons">calendar_today</i>
                            <!--i class="fa fa-calendar"></i-->
                            <p>Class Calendar</p>
                        </a>
                    </li>
					
                    <!--li class="PayForYoga">
                        <a class="nav-link" href="<?php echo base_url('pay-for-yoga'); ?>">
                            <i class="material-icons">payment</i>
                            <p>Make Payment</p>
                        </a>
                    </li--> 
                    <li class="PaymentHistory" >
                        <a class="nav-link" href="<?php echo base_url('payment-history');?>">
                            <i class="material-icons">history</i>
                            <p>My Payments</p>
                        </a>
                    </li>
                    <li class="Notifications" >
                        <a class="nav-link" href="<?php echo base_url('notification');?>">
                            <i class="material-icons text-gray">notifications</i>
                            <p>Notifications</p>
                        </a>
                    </li>
					
					<li class="FeedbackForm" >
                        <a class="nav-link" href="<?php echo base_url('contact');?>">
                            <i class="material-icons">feedback</i>
                            <p>Feedback or Inquiry</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>