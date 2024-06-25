/*DataTable Init*/

"use strict";

$(document).ready(function() {
	$('#datable_1').DataTable({
		responsive: true,
		autoWidth: false,
        deferRender:true,
		language: { search: "",
		searchPlaceholder: "Search",
		sLengthMenu: "_MENU_items",


		}
	});
	$('#datable_8').DataTable({
		responsive: true,
		autoWidth: false,
        deferRender:true,
		language: { search: "",
		searchPlaceholder: "Search",
		sLengthMenu: "_MENU_items",


		}
	});
	

    $('#datable_2').DataTable({
		autoWidth: false,
		lengthChange: false,
		"bPaginate": false,
		language: { search: "",searchPlaceholder: "Search" }
	});

	/*Export DataTable*/
	$('#datable_3').DataTable( {
		dom: 'Bfrtip',
		responsive: true,
		language: { search: "",searchPlaceholder: "Search" },
		"bPaginate": false,
		"info":     false,
		"bFilter":     false,
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		],
		"drawCallback": function () {
			$('.dt-buttons > .btn').addClass('btn-outline-light btn-sm');
		}
	} );
$('#datable_6').DataTable( {
		dom: 'Bfrtip',
		responsive: true,
		language: { search: "",searchPlaceholder: "Search" },
		"bPaginate": false,
		"info":     false,
		"bFilter":     false,
		buttons: [{
			//       extend:['copy', 'csv', 'excel', 'pdf', 'print'],
            // exportOptions: {
            //     columns: ':visible:not(.exclude)' // exclude columns with the class 'exclude'
            // }

            extend: 'print',
            exportOptions: {
                columns: ':visible:not(:contains("Action")):not(:contains("pdf")):not(:contains("Submit"))'
            }
        },
        {
            extend: 'excel',
            exportOptions: {
                columns: ':visible:not(:contains("Action")):not(:contains("pdf")):not(:contains("Submit"))'
            }
        },
        {
            extend: 'copy',
            exportOptions: {
                columns: ':visible:not(:contains("Action")):not(:contains("pdf")):not(:contains("Submit"))'
            }
        }
        ],
		"drawCallback": function () {
			$('.dt-buttons > .btn').addClass('btn-outline-light btn-sm');
		}
	} );
	$('#datable_7').DataTable( {
		dom: 'Bfrtip',
		responsive: true,
		language: { search: "",searchPlaceholder: "Search" },
		"bPaginate": false,
		"info":     false,
		"bFilter":     false,
		buttons: [{
			//       extend:['copy', 'csv', 'excel', 'pdf', 'print'],
            // exportOptions: {
            //     columns: ':visible:not(.exclude)' // exclude columns with the class 'exclude'
            // }

            extend: 'print',
            exportOptions: {
                columns: ':visible:not(:contains("Action")):not(:contains("pdf")):not(:contains("Submit"))'
            }
        },
        {
            extend: 'excel',
            exportOptions: {
                columns: ':visible:not(:contains("Action")):not(:contains("pdf")):not(:contains("Submit"))'
            }
        },
        {
            extend: 'copy',
            exportOptions: {
                columns: ':visible:not(:contains("Action")):not(:contains("pdf")):not(:contains("Submit"))'
            }
        }
        ],
		"drawCallback": function () {
			$('.dt-buttons > .btn').addClass('btn-outline-light btn-sm');
		}
	} );
	$('#datable_9').DataTable( {
		dom: 'Bfrtip',
		responsive: true,
		language: { search: "",searchPlaceholder: "Search" },
		"bPaginate": false,
		"info":     false,
		"bFilter":     false,
		buttons: [{
			//       extend:['copy', 'csv', 'excel', 'pdf', 'print'],
            // exportOptions: {
            //     columns: ':visible:not(.exclude)' // exclude columns with the class 'exclude'
            // }

            extend: 'print',
            exportOptions: {
                columns: ':visible:not(:contains("Action")):not(:contains("pdf")):not(:contains("Submit"))'
            }
        },
        {
            extend: 'excel',
            exportOptions: {
                columns: ':visible:not(:contains("Action")):not(:contains("pdf")):not(:contains("Submit"))'
            }
        },
        {
            extend: 'copy',
            exportOptions: {
                columns: ':visible:not(:contains("Action")):not(:contains("pdf")):not(:contains("Submit"))'
            }
        }
        ],
		"drawCallback": function () {
			$('.dt-buttons > .btn').addClass('btn-outline-light btn-sm');
		}
	} );


	var table = $('#datable_5').DataTable({
		responsive: true,
		language: {
		search: "" ,
		sLengthMenu: "_MENU_Items",
		},
		"bPaginate": false,
		"info":     false,
		"bFilter":     false,
		});
	$('#datable_5 tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );

    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );
} );
