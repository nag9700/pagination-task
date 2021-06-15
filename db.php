<?php
$db_host = "localhost";
$db_username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($db_host, $db_username, $password) or die('Could not connect the database : Username or password incorrect');
mysqli_select_db($conn,"mock_test_db") or die ('No database found');

// Check connection
?>