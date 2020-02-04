<!DOCTYPE html>
<html>
<head>
	<title>Excel Sheet 1</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap.min.css" />
	<script src="<?php echo base_url(); ?>asset/jquery.min.js"></script>
</head>

<body>
	<div class="container">
		<br />
		<h3 align="center">Excel Sheet 1</h3>
		<div class="table-responsive" id="excel_data1">
		</div>
	</div>
</body>
</html>

<script>
$(document).ready(function(){

	load_data();

	function load_data()
	{
		$.ajax({
			url:"<?php echo base_url(); ?>excel_import/fetch_sheet1",
			method:"POST",
			success:function(data){
				$('#excel_data1').html(data);
			}
		})
	}

});
</script>
