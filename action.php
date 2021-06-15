<?php
	include "db.php";
	$output = "";
	if (isset($_POST['query'])) {
		$search = mysqli_real_escape_string($conn, $_POST['query']);
		$sql = "SELECT * FROM mock_test_tbl WHERE Name LIKE '%$search%' || Email LIKE '%$search%' || 
				Phone LIKE '%$search%' || Gender LIKE '%$search%'";
	}else{
		$sql = "SELECT * FROM mock_test_tbl ORDER BY id DESC";
	}
	$query = mysqli_query($conn, $sql);
	if (mysqli_num_rows($query) > 0) {
		$output .= "<table table table-striped'>
		<thead>
			<tr>
				<th>Id</th>
				<th>email</th>
				<th>phone</th>
				<th>gender</th>
			</tr>
		</thead>";
		while ($row = mysqli_fetch_assoc($query)) {
		$output .= "<tbody>
			<tr>
				<td>{$row['Id']}</td>    
				<td>{$row['Email']}</td>
				<td>{$row['Phone']}</td>
				<td>{$row['Gender']}</td>
			</tr>
			</tbody>";
		}
	$output .="</table>";
		echo $output;
	}else{
		echo "<h5>No record found</h5>";
	}
	
?>