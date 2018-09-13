$(document).ready(function(){
	$('.sidebar-wrapper').find('.nav li').removeClass('active');
	$('.sidebar-wrapper').find('.nav li.InstructorManagement').addClass('active');
});
$('#instructorList').DataTable( {
    "oLanguage": { 
		"sSearch": '',
		// "sSearch": '<span class="icon"><i class="fa fa-search"></i></span>',
		"oPaginate": {
			"sPrevious": '<i class="fa fa-angle-double-left " aria-hidden="true"></i>',
			"sNext": '<i class="fa fa-angle-double-right " aria-hidden="true"></i>',
			}
		},
		pageLength: 10,
			"sDom":"<'row am-datatable-header'<'pull-right'f>><'top'>t<'bottom'p><'clear'>", // Add l before p for Length
			"drawCallback": function(settings) {
			var pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
			pagination.toggle(this.api().page.info().pages > 1);
		}
});
$(document).ready(function(){
	$('.dataTables_filter').addClass('pull-left');
	$('.dataTables_filter input').attr("placeholder", "seach here");
});