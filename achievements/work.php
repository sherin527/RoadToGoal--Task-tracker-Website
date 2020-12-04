<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost:3306","root", "", "todo");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
  }


$sqlQuery_1 = " SELECT * FROM work_week WHERE USERNAME = 'sherin' ";

$result =mysqli_query($conn,$sqlQuery_1);

if ($result->num_rows > 0) {
// output data of each row
$data_1 = array();
$row = $result->fetch_assoc();
	$data_1[0] = $row["MONDAY"];
	$data_1[1] = $row["TUESDAY"];
	$data_1[2] = $row["WEDNESDAY"];
	$data_1[3] = $row["THURSDAY"];
	$data_1[4] = $row["FRIDAY"];
	$data_1[5] = $row["SATURDAY"];
	$data_1[6] = $row["SUNDAY"];
	
}


else { echo "0 results"; }


echo json_encode($data_1);
$conn->close();
?>
