<?php $this->load->view('header'); ?>
<!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/multiple-select/1.2.0/multiple-select.css"-->
<!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/css/multi-select.css"-->
<!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css"-->
<!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/multiple-select/1.2.0/multiple-select.min.css">
<img src="https://cdnjs.cloudflare.com/ajax/libs/multiple-select/1.2.0/multiple-select.png" /-->
<style>
.btn-group.open>.dropdown-toggle.btn, .btn-group.open>.dropdown-toggle.btn.btn-default {
    background-color: #773a98;
}
  .btn.btn-default{
    background-color: #773a98;
    color: #FFFFFF;
} 
.btn-default:hover{
    background-color: #773a98 !important;
    color: #FFFFFF;
}
.btn-default:focus{
    background-color: #773a98;
    color: #FFFFFF;
}
.checkbox input[type=checkbox] {
    opacity: inherit;
    position: absolute;
    margin: 0;
    z-index: 555555555555555555555;
    width: inherit;
    height: auto;
    overflow: hidden;
    left: 0;
    pointer-events: none;
    color: #333;
}
</style>
<div class="content">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
						<div class="card card-form">
							<div class="card-header card-header-form bg-rose">
								<i class="material-icons">perm_identity</i>
							</div>
							<div class="card-header-text-form bg-rose">
								<h4 class="title">Contact Us -
								<small>Write Your Message</small></h4>
							</div>
							<div class="card-content card-content-form">
								<form id="contactForm" action="" method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-6">
												 
    <!--select id="lstFruits" multiple="multiple">
       <option value="cheese" selected>Cheese</option>
        <option value="tomatoes">Tomatoes</option>
        <option value="mozarella">Mozzarella</option>
        <option value="mushrooms" selected>Mushrooms</option>
        <option value="pepperoni" selected>Pepperoni</option>
        <option value="onions">Onions</option>
    </select-->  

											<div class="form-group label-floating">
												<label class="control-label">FirstName</label>
												<input type="text" name="FirstName" class="form-control FirstName">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group label-floating">
												<label class="control-label">LastName</label>
												<input type="text" name="LastName" class="form-control LastName">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group label-floating">
												<label class="control-label">Email Address</label>
												<input type="email" name="UserEmail" class="form-control UserEmail">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group label-floating">
												<label class="control-label">Phone Number</label>
												<input type="text" name="PhoneNumber" class="form-control PhoneNumber">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group label-floating">
												<label class="control-label">Subject</label>
												<input type="text" name="Subject"class="form-control Subject">
											</div>
										</div>
									</div>
									<div class="row">
										<!--select class="mdb-select colorful-select dropdown-primary" multiple searchable="Search here..">
					<option value="" disabled selected>Choose your country</option>
					<option value="1">USA</option>
					<option value="2">Germany</option>
					<option value="3">France</option>
					<option value="4">Poland</option>
					<option value="5">Japan</option>
				</select>
				<label>Label example</label>
				<button class="btn-save btn btn-primary btn-sm">Save</button-->
				</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group label-floating">
												<label class="control-label">Message</label>
												<textarea name="Message"class="form-control Message"></textarea>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-12">
											<button type="submit" name="Submit" class="btn btn-rose  pull-right">Submit</button>
											<div class="clearfix"></div>
										</div>
									</div>
								</form>
							</div>
						</div>

					</div>
					
				</div>
				
				 <!--div class="places-sweet-alerts">
					<div class="row">
					  <div class="col-md-3">
						<div class="card ">
						  <div class="card-body text-center">
							<h5 class="card-text">Custom HTML description</h5>
							<button class="btn btn-rose btn-fill" onclick=demo.showSwal('custom-html')>Try me!</button>
						  </div>
						</div>
					  </div>
					  <div class="col-md-3">
						<div class="card ">
						  <div class="card-body text-center">
							<h5 class="card-text">A warning message, with a function attached to the "Confirm" Button...</h5>
							<button class="btn btn-rose btn-fill" onclick=demo.showSwal('warning-message-and-confirmation')>Try me!</button>
						  </div>
						</div>
					  </div>
					  <div class="col-md-3">
						<div class="card ">
						  <div class="card-body text-center">
							<h5 class="card-text">A message with auto close timer set to 2 seconds</h5>
							<button class="btn btn-rose btn-fill" onclick=demo.showSwal('auto-close')>Try me!</button>
						  </div>
						</div>
					  </div>
					  <div class="col-md-3">
						<div class="card ">
						  <div class="card-body text-center">
							<h5 class="card-text">Modal window with input field</h5>
							<button class="btn btn-rose btn-fill" onclick=demo.showSwal('input-field')>Try me!</button>
						  </div>
						</div>
					  </div>
					</div>
				  </div-->
</div>
<?php $this->load->view('footer'); ?>
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/multiple-select/1.2.0/multiple-select.js"></script-->
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/multiple-select/1.2.0/multiple-select.min.js"></script-->
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.js"></script-->
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.js
"></script-->
<script>
// $(document).ready(function() {
   // // $('.mdb-select').material_select();
   // $('#filtering').multiselect({
    // nonSelectedText: 'Select a food...',
    // enableFiltering: true,
    // templates: {
        // li: '<li><a href="javascript:void(0);"><label class="pl-2"></label></a></li>',
        // filter: '<li class="multiselect-item filter"><div class="input-group m-0 mb-1"><input class="form-control multiselect-search" type="text"></div></li>',
        // filterClearBtn: '<div class="input-group-append"><button class="btn btn btn-outline-secondary multiselect-clear-filter" type="button"><i class="fa fa-close"></i></button></div>'
    // },
    // selectedClass: 'bg-light',
    // onInitialized: function(select, container) {
        // // hide checkboxes
        // container.find('input[type=checkbox]').addClass('d-none');
    // }
// });
// });

</script>
<!-- type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/css/bootstrap.min.css"
        rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script-->
    <link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
        rel="stylesheet" type="text/css" />
    <script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
        type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $('#lstFruits').multiselect({
                includeSelectAllOption: true,
            });
           
        });
    </script>
<script>
$('document').ready(function(){
$("#modalButton").click(function(){
$('#exampleModal').modal('show');
$('#exampleModal').modal('handleUpdate')
$('#exampleModal').modal({
  keyboard: false
});
});
});
</script>

<script>
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});

$(document).ready(function(){
demo = {
    showSwal: function(type) {
        if (type == 'basic') {
            swal({
                title: "Here's a message!",
                buttonsStyling: false,
                confirmButtonClass: "btn btn-success"
            }).catch(swal.noop)

        } else if (type == 'title-and-text') {
            swal({
                title: "Here's a message!",
                text: "It's pretty, isn't it?",
                buttonsStyling: false,
                confirmButtonClass: "btn btn-info"
            }).catch(swal.noop)

        } else if (type == 'success-message') {
            swal({
                title: "Good job!",
                text: "You clicked the button!",
                buttonsStyling: false,
                confirmButtonClass: "btn btn-success",
                type: "success"
            }).catch(swal.noop)

        } else if (type == 'warning-message-and-confirmation') {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'Yes, delete it!',
                buttonsStyling: false
            }).then(function() {
                swal({
                    title: 'Deleted!',
                    text: 'Your file has been deleted.',
                    type: 'success',
                    confirmButtonClass: "btn btn-success",
                    buttonsStyling: false
                })
            }).catch(swal.noop)
        } else if (type == 'warning-message-and-cancel') {
            swal({
                title: 'Are you sure?',
                text: 'You will not be able to recover this imaginary file!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it',
                confirmButtonClass: "btn btn-success",
                cancelButtonClass: "btn btn-danger",
                buttonsStyling: false
            }).then(function() {
                swal({
                    title: 'Deleted!',
                    text: 'Your imaginary file has been deleted.',
                    type: 'success',
                    confirmButtonClass: "btn btn-success",
                    buttonsStyling: false
                }).catch(swal.noop)
            }, function(dismiss) {
                // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                if (dismiss === 'cancel') {
                    swal({
                        title: 'Cancelled',
                        text: 'Your imaginary file is safe :)',
                        type: 'error',
                        confirmButtonClass: "btn btn-info",
                        buttonsStyling: false
                    }).catch(swal.noop)
                }
            })

        } else if (type == 'custom-html') {
            swal({
                title: 'HTML example',
                buttonsStyling: false,
                confirmButtonClass: "btn btn-success",
                html: 'You can use <b>bold text</b>, ' +
                    '<a href="http://github.com">links</a> ' +
                    'and other HTML tags'
            }).catch(swal.noop)

        } else if (type == 'auto-close') {
            swal({
                title: "Auto close alert!",
                text: "I will close in 2 seconds.",
                timer: 2000,
                showConfirmButton: false
            }).catch(swal.noop)
        } else if (type == 'input-field') {
            swal({
                title: 'Input something',
                html: '<div class="form-group">' +
                    '<input id="input-field" type="text" class="form-control" value="asfaAa"/>' +
                    '</div>', 
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function(result) {
                swal({
                    type: 'success',
                    html: 'You entered: <strong>' +
                        $('#input-field').val() +
                        '</strong>',
                    confirmButtonClass: 'btn btn-success',
                    buttonsStyling: false

                })
            }).catch(swal.noop)
        }
    },

}
	
});
</script>
