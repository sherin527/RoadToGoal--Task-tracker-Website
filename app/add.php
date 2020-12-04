<?php

  $username = $_GET["userid"];
  $conn = mysqli_connect("localhost:3306","root", "", "todo");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    
$stmt = $conn->prepare("SELECT user_login FROM users WHERE user_id = ?  ");
    $stmt->bind_param("s", $_GET["userid"]);
    $stmt->execute();
    $result1 = $stmt->get_result();
    $row1 = $result1->fetch_assoc();
   
?>



<?php



if(isset($_POST['title'] ) &&  isset($_POST['category'] ) && isset($_POST['due_date'] )){
    require '../db_conn.php';

   $title = $_POST['title'];
    $category = $_POST['category'];
    $due_date = date('Y-m-d H:i', strtotime($_POST['due_date']));
    
   /* $title = (!empty($_POST['title']) ? $_POST['title'] : '');
    $category = (!empty($_POST['category']) ? $_POST['category'] : '');*/
    

    if(empty($title)){
        header("Location: ../index.php?mess=error");
    }else {
        $sql = 'INSERT INTO todos (title,category,due_date) VALUES (:title, :category,:due_date)';
        $query = $conn->prepare($sql);
        $query->execute(array(':title' => $title, ':category' => $category, ':due_date' => $due_date));
       /* $stmt = $conn->prepare("INSERT INTO todos('title','category') VALUES (?,?)");
        $res = $stmt->execute([$title,$category]);
        */
        if($query){
            header("Location: ../index.php?userid=$username&mess=success"); 
        }else {
            header("Location: ../index.php?userid=$username");
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../index.php?userid=$username&mess=error");
}