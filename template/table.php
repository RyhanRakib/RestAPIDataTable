<?php

// Disable direct file access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>

 
<script>

$(document).ready( function () {
    $('#filterTable').DataTable();

     var table = $('#filterTable').DataTable();

      //Take the category filter drop down and append it to the datatables_filter div. 
      //You can use this same idea to move the filter anywhere withing the datatable that you want.
      $("#filterTable_filter.dataTables_filter").append($("#categoryFilter"));
      
      //Get the column index for the Category column to be used in the method below ($.fn.dataTable.ext.search.push)
      //This tells datatables what column to filter on when a user selects a value from the dropdown.
      //It's important that the text used here (Category) is the same for used in the header of the column to filter
      var categoryIndex = 0;
      $("#filterTable th").each(function (i) {
        if ($($(this)).html() == "Title") {
          categoryIndex = i; return false;
        }
      });
      //Use the built in datatables API to filter the existing rows by the Category column
      $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
          var selectedItem = $('#categoryFilter').val()
          //console.log(selectedItem);
          //console.log(typeof 'selectedItem');
          var category = data[categoryIndex];
          console.log(category);
          if (selectedItem === "" || category.includes(selectedItem)) {
            return true;
          }
          return false;
        }
      );
      //Set the change event for the Category Filter dropdown to redraw the datatable each time
      //a user selects a new filter.
      $("#categoryFilter").change(function (e) {
        table.draw();
      });
      table.draw();
} );

</script>


   <div class="category-filter">
      <select id="categoryFilter" class="form-control">
        <option value="">Show All</option>
        <option value="BLACK">BLACK</option>
        <option value="Blue">Blue</option>
        <option value="White">White</option>
      </select>
    </div>


    <!-- Set up the datatable -->
    <table class="table" id="filterTable">
	   	<thead>
	       	<th>ID</th>
	        <th>Title</th>
	        <th></th>
	        <th></th>
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
				Make\Model\Colour: N/A \ N/A \ White
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
		<tfoot>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
</table>