<html>
<head>
    <title>Search</title>

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

    <div class="container-fluid">
        <h2 align="center">Search</h2><br />
    <div class="form-group">
        <div class="input-group">
        <span class="input-group-addon">Search</span>
        <input type="text" name="search_text" id="search_text" placeholder="Search keyword..." class="form-control" />
        </div>
    </div>
        <div class="table-responsive" id="result"></div>
        </div>
    <div style="clear:both"></div>

</body>
</html>


<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>search/fetch",
   method:"POST",
   data:{query:query},
   success:function(data){
    $('#result').html(data);
   }
  })
 }

 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>