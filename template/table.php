<?php

// Disable direct file access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>

 
<script>
$(document).ready( function () {
    $('#example').DataTable();
} );

$(document).ready(function() {
    $('#example').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );

</script>
<table id="example">
	   	<thead>
	       	<th>ID</th>
	        <th>Title</th>
	        <th>ID</th>
	        <th>Title</th>
	   	</thead>
	<tbody>
		<tr>
			<td>
				Found Item BLACK LEATHER WALLET
				Days Left: 91
				Date Reported: 27/07/2021
				Type: Wallet/Purse/Money
				Arrival Airport: STN London Stansted
			</td>
			<td>
				Make\Model\Colour: N/A \ N/A \ BLACK
				Place: 
				Reference: FF/271525/21
				Departure Airport: Unknown
			</td>
			<td>
				<button>View Comment</button>
			</td>
			<td>
				<button>Claim</button>
			</td>
		</tr>
		<tr>
			<td>
				Found Item BLACK LEATHER WALLET
				Days Left: 91
				Date Reported: 27/07/2021
				Type: Wallet/Purse/Money
				Arrival Airport: STN London Stansted
			</td>
			<td>
				Make\Model\Colour: N/A \ N/A \ BLACK
				Place: 
				Reference: FF/271525/21
				Departure Airport: Unknown
			</td>
			<td>
				<button>View Comment</button>
			</td>
			<td>
				<button>Claim</button>
			</td>
		</tr>
		<tr>
			<td>
				Found Item BLACK LEATHER WALLET
				Days Left: 91
				Date Reported: 27/07/2021
				Type: Wallet/Purse/Money
				Arrival Airport: STN London Stansted
			</td>
			<td>
				Make\Model\Colour: N/A \ N/A \ BLACK
				Place: 
				Reference: FF/271525/21
				Departure Airport: Unknown
			</td>
			<td>
				<button>View Comment</button>
			</td>
			<td>
				<button>Claim</button>
			</td>
		</tr>
		<tr>
			<td>
				Found Item BLACK LEATHER WALLET
				Days Left: 91
				Date Reported: 27/07/2021
				Type: Wallet/Purse/Money
				Arrival Airport: STN London Stansted
			</td>
			<td>
				Make\Model\Colour: N/A \ N/A \ Blue
				Place: 
				Reference: FF/271525/21
				Departure Airport: Unknown
			</td>
			<td>
				<button>View Comment</button>
			</td>
			<td>
				<button>Claim</button>
			</td>
		</tr>
	</tbody>
</table>