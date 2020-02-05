<html>
<head>
    <title>Excel Sheet 2</title>
    
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap.min.css" />
	<script src="<?php echo base_url(); ?>asset/jquery.min.js"></script>

	<style>
		td, th {
			text-align: center;
		}
		p {
			font-size: 14px;
		}
	</style>
    
</head>
<body>
	<div class="container-fluid">
		<h3 align="center">Excel Sheet 2</h3>
		<div align="right" id="pagination_link"></div>
		<div class="table-responsive" id="sheet2_table"></div>
	</div>
</body>
</html>
<script>
$(document).ready(function(){

function load_sheet2_data(page)
{
	$.ajax({
		url:"<?php echo base_url(); ?>excel_import/pagination_sheet2/"+page,
		method:"GET",
		dataType:"json",
		success:function(data)
		{
			$('#sheet2_table').html(data.sheet2_table);
			$('#pagination_link').html(data.pagination_link);
		}
	});
}
 
load_sheet2_data(1);

$(document).on("click", ".pagination li a", function(event)
{
	event.preventDefault();
	var page = $(this).data("ci-pagination-page");
	load_sheet2_data(page);
});

});
</script>