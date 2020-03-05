<!DOCTYPE html>
<html lang="en">
<head>
    
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap.min.css" />
	<script src="<?php echo base_url(); ?>asset/jquery.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Mono|Roboto+Slab&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e372c84a64.js" crossorigin="anonymous"></script>

	<title>Report</title>

	<style>
		td, th {
			text-align: center;
		}

		input {
  			border: 0;
        	outline: 0;
        	background: transparent;
        	border-bottom: 1px solid black;
      	}
		.search {
			margin-right: 16px;
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
                <a class="active" href="<?php echo base_url();?>report">Report</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>sheet/sheet1">Sheet 1</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>sheet/sheet2">Sheet 2</a>
            </li>
        </ul>
		<ul class="nav navbar-nav navbar-right search">
			<li>
				<a href="<?php echo base_url();?>search">Search here</a>
            </li>
		</ul>
	</nav>

	<div class="container-fluid" id="form_select">
		<form>
			<div class="row">
				<div class="col">
					<div class="form-group col-md-3">
						<select name="dropdown_val" id="dropdown_val" class="form-control noPrintpg">
							<option selected hidden>--Select No--</option>
							<?php 
								foreach($sorter as $row)
								{ 
									echo '<option value="'.$row->old_pin.'">'.$row->old_pin.'</option>';
								}
							?>
						</select>
					</div>
				</div>
			</div>
		</form>
	</div>
	
	<div class="container-fluid">
		<div class="flex-container" id="header">
			<div>
				<div>
					<label>CITY OF CAGAYAN DE ORO</label>
				</div>
				
				<div>
					<label>BARANGAY OF  </label>
					<input type="text">
				</div>
				
			</div>

			<div>
				<p id="title-form">TAX MAPPING CONTROL</p>
			</div>

			<div>
				<div>
					<label>BARANGAY NO.  </label>
					<input type="text">
				</div>
				<div>
					<label>DISTRICT NO.  </label>
					<input type="text">
				</div>
				<div>
					<label>BLOCK/SECTION NO.  </label>
					<input type="text">
				</div>
			</div>
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
	$("#dropdown_val").change(function () 
	{
	//var action = 'pagination_report';
		event.preventDefault();
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
 
report_table(1);

$(document).on("click", ".pagination li a", function(event)
{
	event.preventDefault();
	var page = $(this).data("ci-pagination-page");
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
	//report_table(page);
});

});
</script>
