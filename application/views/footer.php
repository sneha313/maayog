		<footer class="footer">
			<div class="container-fluid">
				<nav class="pull-left">
					<ul>
						<li class="Home" href="javascript:void(0);">
							<a href="<?php echo base_url('dashboard');?>">
								Home
							</a>
						</li>
						<li class="AboutUs" href="javascript:void(0);">
							<a href="#">
								About Us
							</a>
						</li>
						<li class="ContactUs" href="javascript:void(0);">
							<a href="<?php echo base_url('contact'); ?>">
								Contact Us
							</a>
						</li>
					</ul>
				</nav>
					<p class="copyright pull-right">Copyright
					&copy;
					<script>
						document.write(new Date().getFullYear())
					</script>
					All rights reserved.Powered by
					<a href="http://purpledot.in/" target="_blank"> &nbsp;<img class="companyLogo" src="<?php echo  base_url('assets/images/Purpledot-logo.png'); ?>"></a>
				</p>
			</div>
		</footer>
	</div>
</div>
</body>
<input type="hidden" id="base_url" value="<?php echo  base_url(); ?>">
<input type="hidden" id="custom_base_url" value="<?php echo  $this->config->item('custom_base_url'); ?>">
<input type="hidden" id="userId" value="<?php echo $this->session->userdata('UserId'); ?>">
<input type="hidden" id="role" value="<?php echo $this->session->userdata('Role'); ?>" >



<!--   Core JS Files   -->
<script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<!-- Latest compiled and minified JavaScript -->

<script src="<?php echo base_url(); ?>assets/js/popper.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-material-design.min.js" type="text/javascript"></script>
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/multiple-select/1.2.0/multiple-select.js"></script-->

<!--  PerfectScrollbar Library -->
<script src="<?php echo base_url(); ?>assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.bootstrap-wizard.js"></script>

<!--script src="<?php echo base_url(); ?>assets/js/bootstrap-selectpicker.js"></script-->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-validator.min.js" type="text/javascript"></script>
<!--script src="<?php echo base_url(); ?>assets/js/fullcalendar.min.js" type="text/javascript"></script-->
<script src="<?php echo base_url(); ?>assets/js/jquery-jvectormap.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/nouislider.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/core.js" type="text/javascript"></script>
<!--  Dynamic Elements plugin -->
<script src="<?php echo base_url(); ?>assets/js/arrive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="<?php echo base_url(); ?>assets/js/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-tagsinput.js"></script>
<!--  Google Maps Plugin    -->
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
<!-- Material Dashboard javascript methods -->
<script src="<?php echo base_url(); ?>assets/js/material-dashboard.js?v=1.2.0"></script>
<script src="<?php echo base_url(); ?>assets/js/material-dashboard.min.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.sharrre.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-tagsinput.js"></script>
<script src="<?php echo base_url(); ?>assets/confirm-dialog/bootstrap-confirmation.js"></script>
<!--script src="https://maps.google.com/maps/api/js?key=YOUR_API_KEY"></script-->
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script-->
<script src="<?php echo base_url(); ?>assets/js/sweetalert2.js"></script>

<!--script src="<?php echo base_url(); ?>assets/js/sweetalert2.js"></script-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.uploadPreview.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-multiselect.js"></script>
<script src='<?php echo base_url(); ?>assets/fullcalendar/jquery/jquery-ui.custom.min.js'></script>
<script src='<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.js'></script>
<script src="<?php echo base_url('assets/js/combodate.js'); ?>"></script>

<script>
 $(document).ready(function() {
		var base_url = $('#base_url').val();
		var custom_base_url = $('#custom_base_url').val();
		var userId = $('#userId').val();
		var role = $('#role').val();
		// console.log(role);
		if( (role == 1)  && (base_url == custom_base_url) ){

		}else{
			location.href= base_url;

		}
 }); 
 $(document).ready(function() {
		$('li.PersonProfile').click(function(){
			
			$('.PersonProfile').toggleClass(".ProfileClass");
		});
 });
 
 // $("body").on("click",".alert .close", function() {
	// //$(this).closest('div').hide();
// });
 $('.alert-msg').fadeIn('slow', function(){
   $('.alert').delay(5000).fadeOut(); 
});


$('body').on('mouseenter','.dropdown.NotificationIcon',function(){
	$(this).addClass('open');
	var values = [];
	var Ids = $('span.notification').attr('data-id');
		values.push(Ids);
	// $('.dropdown > .dropdown-menu > li >a.count').each(function(){
		// values.push( $(this).attr('data-id') );
	// });
	if(Ids != ''){
		 $.ajax({
			'type': 'POST',
			'url': 'User/update_notification_count',
			'data':{NotificationId : values}, 
			'success': function (data) {
				$('.notification').hide();
				$('span.notification').attr('data-id','');
			}
	  });
	}
});
$(document).ready(function(){
	var base_url = $('#base_url').val();
	// $('.notification').hide();
	 $.ajax({
		'type': 'POST',
		'url': base_url+'User/get_notification_count',
		'dataType': 'json',
		'async': false,
		'success': function (data) {
			// console.log(data);
			// console.log(data.count);
			if(data.count > 0){
				$('.notification').show();
				$('.notification').html(data.count);
				$('span.notification').attr('data-id',data.Ids);
			} else{
				 $('.notification').hide();
			}
		}
	});
});

$(document).ready(function() {

    $('input.datepicker').datepicker();
});
$(document).ready(function() {

    $('input.TimePicker').timepicker();
});
$(document).ready(function(){
	$('[data-toggle=confirmation]').confirmation({
		rootSelector: '[data-toggle=confirmation]',
	});
 });

</script>
<script type="text/javascript">
$(document).ready(function() {
  $.uploadPreview({
    input_field: "#image-upload",   // Default: .image-upload
    preview_box: "#image-preview",  // Default: .image-preview
    label_field: "#image-label",    // Default: .image-label
    label_default: "Choose File",   // Default: Choose File
    label_selected: "Change File",  // Default: Change File
    // no_label: false                 // Default: false
    success_callback : function(i){
		
	}                 // Default: false
  });
});
</script>
<script>
window.onload = function () {
	setTimeout(function(){ 
		$('#loader').remove(); 
	}, 1000);
}

/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<!--noscript>
  <img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1"
/>

</noscript--->
</html>