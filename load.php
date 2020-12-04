<?php
/****************************************************************************/
// Database Connection
/****************************************************************************/
$connectionPDO= new PDO('mysql:host=localhost;dbname=todo', 'root', '');

/****************************************************************************/
// FullCalender.io Load Function
/****************************************************************************/
$data = array();
$query = "SELECT * FROM todos ORDER BY id";
$statement = $connectionPDO->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row) {
$data[] = array(
'id' => $row["id"],
'title' => $row["title"],
'start' => $row["due_date"],
'end' => $row["due_date"]
);
}
echo json_encode($data);

/****************************************************************************/
// Database Connection Close
/****************************************************************************/
$connectionPDO = null;
?>