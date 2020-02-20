<html>
<head>
    <title>Excel Sheet 2</title>
    
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
	</style>
    
</head>

<body>

	<nav class="noPrintpg">
        <ul>
            <li>
                <a href="<?php echo base_url();?>">Home</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>report">Report</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>sheet/sheet1">Sheet 1</a>
            </li>
            <li>
                <a class="active" href="<?php echo base_url();?>sheet/sheet2">Sheet 2</a>
            </li>
        </ul>
    </nav>

	<div class="container-fluid">
		<div align="right" class="pagination_link noPrintpg"></div>
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
			$('.pagination_link').html(data.pagination_link);
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