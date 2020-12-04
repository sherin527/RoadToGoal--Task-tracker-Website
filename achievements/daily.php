<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost:3306","root", "", "todo");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
  }

date_default_timezone_set("Asia/Kolkata");
date('w'); 
if(date('w') == 1){
    $day = "MONDAY";
    }
    else if(date('w') == 2){
        $day = "Tuesday";
    }
    else if(date('w') == 3){
        $day = "Wednesday";
    }
    else if(date('w') == 4){
        $day = "Thursday";
    }
    else if(date('w') == 5){
        $day = "Friday";
    }
    else if(date('w') == 6){
        $day = "Saturday";
    }

    else if(date('w') == 0){
        $day = 'SUNDAY' ;
    }
    
else { echo "0 results"; }
$username = 'sherin';
    $stmt = $conn->prepare("SELECT $day FROM leisure_week WHERE username = ? ");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result1 = $stmt->get_result();
    $row1 = $result1->fetch_assoc();

    $stmt1 = $conn->prepare("SELECT $day FROM work_week WHERE username= ? ");
    $stmt1->bind_param("s", $username);
    $stmt1 ->execute();
    $result2 = $stmt1->get_result();
    $row2 = $result2->fetch_assoc();

    $stmt1 = $conn->prepare("SELECT $day FROM fitness_week WHERE username= ? ");
    $stmt1->bind_param("s", $username);
    $stmt1 ->execute();
    $result3 = $stmt1->get_result();
    $row3 = $result3->fetch_assoc();

$row = array($row3[$day], $row1[$day], $row2[$day]);

echo json_encode($row);
$conn->close();
?>
