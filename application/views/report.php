<!DOCTYPE html>
<html>
<head>
	<title>Joined Data</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap.min.css" />
	<script src="<?php echo base_url(); ?>asset/jquery.min.js"></script>
	<style>
		td, th {
			text-align: center;
		}
	</style>
</head>

<body>
	<div class="container-fluid">
		<div class="table-responsive" id="join_data">
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
			url:"<?php echo base_url(); ?>excel_import/fetch_join",
			method:"POST",
			beforeSend: function() {    
				$("#join_data").html('Please wait...');
				},
			success:function(data){
				$('#join_data').html(data);
			}
		})
	}

});
</script>
