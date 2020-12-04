<?php
global $connection;

if ( isset( $connection ) )
    return;

$connection = new mysqli("localhost", "root", "", "todo");

if (mysqli_connect_errno()) {        
    die(sprintf("Connect failed: %s\n", mysqli_connect_error()));
}
session_start();
$session_key = session_id();

#require_once('database.php');

$query = $connection->prepare("SELECT `session_id`, `user_id` FROM `sessions` WHERE `session_key` = ? AND `session_address` = ? AND `session_useragent` = ? AND `session_expires` > NOW();");
$query->bind_param("sss", $session_key, $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']);
$query->execute();
$query->bind_result($session_id, $user_id);
$query->fetch();
$query->close();

if(empty($session_id)) {
    header('Location: login.php');
}

$query = $connection->prepare("UPDATE `sessions` SET `session_expires` = DATE_ADD(NOW(),INTERVAL 1 HOUR) WHERE `session_id` = ?;");
$query->bind_param("i", $session_id );
$query->execute();
$query->close();

?>