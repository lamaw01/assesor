<html>
<head>
    <title>Report</title>
    
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap.min.css" />
	<script src="<?php echo base_url(); ?>asset/jquery.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Mono|Roboto+Slab&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e372c84a64.js" crossorigin="anonymous"></script>

	<style>
		td, th {
			text-align: center;
		}
		p {
			font-size: 14px;
		}

		input {
  			border: 0;
        	outline: 0;
        	background: transparent;
        	border-bottom: 1px solid black;
      	}
	</style>

</head>

<body>

	<nav class="noPrintpg">
        <ul>
            <li>
                <a href="<?php echo base_url();?>">Home</a>
            </li>
            <li>
                <a class="active" href="<?php echo base_url();?>sheet/report">Report</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>sheet/sheet1">Sheet 1</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>sheet/sheet2">Sheet 2</a>
            </li>
        </ul>
	</nav>
	<div class="container-fluid">
		<a class="btn-readmore noPrintpg" href="<?php echo base_url();?>search">Search here</a>
		<div class="flex-container">
			<div>
				<div>
					<label>CITY OF CAGAYAN DE ORO</label>
				</div>
				
				<div>
					<label>BARANGAY OF  </label>
					<input type="text">
				</div>
				<form>
					<div class="form-group">
						<select name="dropdown_val" id="dropdown_val" class="form-control input-sm noPrintpg">
							<option selected hidden>--Select No--</option>
							<?php 
							foreach($sorter as $row)
							{ 
							echo '<option value="'.$row->old_pin.'">'.$row->old_pin.'</option>';
							}
							?>
						</select>
					</div>
				</form>
			</div>

			<div>
				<p id="title-form">TAX MAPPING CONTROL</p>
			</div>

			<div id="header"></div>
		</div>
		<div class="table-responsive" id="report_table"></div>
		<div align="center" class="pagination_link noPrintpg"></div>
	</div>
</body>
</html>	
<script>
$(document).ready(function(){

function report_table(page)
{	
	$("#dropdown_val").change(function () {
	//var action = 'pagination_report';
	var id = $('#dropdown_val').val();

		$.ajax({
			url:"<?php echo base_url(); ?>excel_import/pagination_report/"+page,
			method:"POST",
			dataType:"JSON",
			data:{id:id},
			success:function(data)
			{
				$('#report_table').html(data.report_table);
				$('.pagination_link').html(data.pagination_link);
				$('#header').html(data.header);
				//alert(id)
			}
		});
	});
}

// function report_table(page)
// {	
// 	$('#dropdown_val').change(function(){ 

// 		var action = 'pagination_report';
// 		var sort_val = $('#dropdown_val :selected').text();

// 		$.ajax({
// 			url:"<?php echo base_url(); ?>excel_import/pagination_report/"+page,
// 			method:"POST",
// 			dataType:"JSON",
// 			data:{action:action, sort_val:sort_val},
// 			success:function(data)
// 			{
// 				$('#report_table').html(data.report_table);
// 				$('.pagination_link').html(data.pagination_link);
// 				$('#header').html(data.header);
// 			}
// 		});
// 	}
// }

 
report_table(1);

$(document).on("click", ".pagination li a", function(event)
{
	event.preventDefault();
	var page = $(this).data("ci-pagination-page");
	report_table(page);

});

// 	$('#dropdown_val').change(function()
// 	{ 	
// 		var id=$(this).val();
// 		$.ajax({
// 			url:"<?php echo base_url(); ?>excel_import/pagination_report/"+page,
// 			method : "POST",
// 			data : {id: id},
// 			//async : true,
// 			dataType : 'json',
// 			success: function(data)
// 			{  
// 				$('#report_table').html(data.report_table);
// 				$('.pagination_link').html(data.pagination_link);
// 				$('#header').html(data.header);
//             }
// 		});
// 		//return false;
// 	});


});
</script>
