<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost:3306","root", "", "todo");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
  }


$sqlQuery = " SELECT * FROM fitness_week WHERE USERNAME = 'sherin' ";

$result =mysqli_query($conn,$sqlQuery);
if ($result->num_rows > 0) {
// output data of each row
$data = array();
$row = $result->fetch_assoc();
	$data[0] = $row["MONDAY"];
	$data[1] = $row["TUESDAY"];
	$data[2] = $row["WEDNESDAY"];
	$data[3] = $row["THURSDAY"];
	$data[4] = $row["FRIDAY"];
	$data[5] = $row["SATURDAY"];
	$data[6] = $row["SUNDAY"];
	
}


else { echo "0 results"; }

echo json_encode($data);
$conn->close();
?>