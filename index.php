<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="container-fluid">
        <div class="block-header" style="text-align:center;position: relative;">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12" style="text-align:center;position: relative; ">
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4">
							     <div id="searchWrapper" >
								 <input type="text" name="searchBar"   id="searchBar"  placeholder="search here..." />
								 </div>
                            </div>
                     
                            
                        </div>
                    </div>
                </div>           
            
            </div>
        </div>
		       <div class="col-lg-8 col-md-8 col-sm-8" id="main_div" style="text-align:center;position: relative;">
		<div class="container">
            <h1>mock test pagination</h1>
			
            <table class="table table-striped" id = "table_data">
				<tr  class="bg-info">
					<th  class="bg-info" data-colname="name" data-order="desc">Name &#9650</th>
					<th  data-colname="age" data-order="desc">email &#9650</th>
					<th  data-colname="birthdate" data-order="desc">phone &#9650</th>
				    <th  data-colname="birthdate" data-order="desc">gender &#9650</th>

				</tr>
							
    <tbody>
	<!-- php code for dynamic data display purose -->
	<?php
			include 'db.php';
		$mobile = mysqli_query($conn, "select * from mock_test_tbl");
         $rowcount=mysqli_num_rows($mobile);
	               for($i=1;$i<=$rowcount;$i++)
				 {		
			              $row=mysqli_fetch_assoc($mobile);
			?>
         <tr>
				<td><?php echo $row['Id'] ?></td>
				<td><?php echo $row['Name'] ?></td>
				<td><?php echo $row['Email'] ?></td>
				<td><?php echo $row['Phone'] ?></td>
				<td><?php echo $row['Gender'] ?></td>
			  </tr>
			  <?php
			  }
			  ?>
    </tbody>
</table>
         
        </div>
                            </div>
    </div>

<script type="text/javascript">
    $(document).ready(function(){
        loadData();
        function loadData(query){
          $.ajax({
            url : "action.php",
            type: "POST",
            chache :false,
            data:{query:query},
            success:function(response){
              $("#table_data").html(response);
            }
          });  
        }

        $("#searchBar").keyup(function(){
          var search = $(this).val();
          if (search !="") {
            loadData(search);
          }else{
            loadData();
          }
        });
    });
</script>

</body>
</html>
