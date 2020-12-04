<?php

session_start();

$con = mysqli_connect('localhost','root');
if($con){
	echo "connection done";
}else{
	echo "no";
}

mysqli_select_db($con, 'miniproject');

$name = $_POST['user'];

$password = $_POST['password'];

$hashpassword = password_hash($password, PASSWORD_BCRYPT);



$q = "select * from signin where fname = '$name' ";

$result =mysqli_query($con, $q);
$num = mysqli_num_rows($result);

if($num >0){
	$_SESSION['username']=$name;
	header('location:profile.php');
}else{
	header('location:login.php');
}

?>