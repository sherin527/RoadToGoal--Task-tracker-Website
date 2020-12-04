<?php

session_start();
header('location:home.php');
$con = mysqli_connect('localhost','root');
if($con){
	echo "connection done";
}else{
	echo "no";
}

mysqli_select_db($con, 'todo');

$data = $_POST;

$name = $_POST['user'];

$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

$hashpass = password_hash($password, PASSWORD_BCRYPT);
$chashpass = password_hash($cpassword, PASSWORD_BCRYPT);

/*$pass = password_hash($password, PASSWORD_BCRYPT);
$cpass = password_hash($cpassword, PASSWORD_BCRYPT);*/

$q = "select * from users where user_login = '$name' && user_password = '$password' && user_cpassword = '$cpassword' ";
$result =mysqli_query($con, $q);
$num = mysqli_num_rows($result);

if($num == 1){
	echo "duplicate data";
}else{
	$qy = "insert into users (user_login,user_password,user_cpassword) values('$name','$password','$cpassword')";
	
	mysqli_query($con,$qy);
	
}

/*$qy = "insert into signin (fname,password,cpassword) values('$name','$password','$cpassword')";
	mysqli_query($con,$qy);*/




?>




















