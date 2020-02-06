<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Mono|Roboto+Slab&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e372c84a64.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>asset/jquery.min.js"></script>

    <title>Home</title>
</head>

<nav>
        <ul>
            <li>
                <a class="active" href="<?php echo base_url();?>">Home</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>sheet/report">Report</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>sheet/sheet1">Sheet 1</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>sheet/sheet2">Sheet 2</a>
            </li>
        </ul>
    </nav>

<body>
    <main>

        <h2 class="section-heading">Import Excel file</h2>

        <section>
            <div class="card">
                <div class="card-description">
                    <p>
                        Sheet 1 Excel
                    </p>

                    <form method="post" id="import_sheet1" enctype="multipart/form-data">
                        <input type="file" name="file" id="file" required accept=".xls, .xlsx" />
                        <br />
                        <input type="submit" name="import" value="Import" class="btn-readmore" />
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-description">
                    <p>
                        Sheet 2 Excel
                    </p>
                    
                    <form method="post" id="import_sheet2" enctype="multipart/form-data">
                        <input type="file" name="file" id="file" required accept=".xls, .xlsx" />
                        <br />
                        <input type="submit" name="import" value="Import" class="btn-readmore" />
                    </form>
                </div>
            </div>
        </section>
                
    </main>

    <script src="<?php echo base_url(); ?>asset/main.js"></script>
</body>
</html>

<script>
$(document).ready(function(){
    
    $('#import_sheet1').on('submit', function(event){
		event.preventDefault();
		$.ajax({
			url:"<?php echo base_url(); ?>excel_import/import_sheet1",
			method:"POST",
			data:new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
			success:function(data){
				$('#file').val('');
				alert(data);
			}
		})
	});

	$('#import_sheet2').on('submit', function(event){
		event.preventDefault();
		$.ajax({
			url:"<?php echo base_url(); ?>excel_import/import_sheet2",
			method:"POST",
			data:new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
			success:function(data){
				$('#file').val('');
				alert(data);
			}
		})
	});

});
</script>