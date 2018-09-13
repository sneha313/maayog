$('#payment').DataTable( {
   dom: 'Bfrtip',
    "order": [ 0, 'desc' ],
	buttons: [
		'excel', 'pdf', 'print'
	],
    "oLanguage": { 
		// "sSearch": '<span class="icon"><i class="fa fa-search"></i></span>',
		"sSearch": "",
		"oPaginate": {
			"sPrevious": '<i class="fa fa-angle-double-left " aria-hidden="true"></i>',
			"sNext": '<i class="fa fa-angle-double-right " aria-hidden="true"></i>',
			}
		},
		
		"pageLength": 10,
		"bInfo" : false,
		"drawCallback": function(settings) {
			var pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
			pagination.toggle(this.api().page.info().pages > 1);
		}
});
$(document).ready(function(){
	$('.sidebar-wrapper').find('.nav li').removeClass('active');
	$('.sidebar-wrapper').find('.nav li.PaymentHistory').addClass('active');
});
$(document).ready(function(){
	$('.dataTables_filter').addClass('pull-left');
	$('.dataTables_filter input').attr("placeholder", "seach here");
});