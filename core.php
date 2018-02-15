<?php
error_reporting(0);
ob_start();
session_start();
$w = MD5(time());
/*if (isset($_SESSION['id2'])) {
$user_a = $db->query("SELECT id,username,rank FROM users WHERE id='$_SESSION[id2]'");
$user_q = mysqli_fetch_assoc($user_a);
}
$db->query("SET NAMES 'utf8'");
$db->query('SET character_set_connection=utf8');
$db->query('SET character_set_client=utf8');
$db->query('SET character_set_results=utf8');*/

$dbConnection = new PDO('mysql:dbname=hebbo;host=127.0.0.1;charset=utf8', 'root', 'password');
$dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_SESSION['id2'])) {
$stmt = $dbConnection->prepare('SELECT id,username,rank FROM users WHERE id = :id');
$stmt->execute(array('id' => $_SESSION['id2']));
$user_q = $stmt->fetch();
}


setlocale(LC_ALL, NULL);
setlocale(LC_ALL, 'es');  

?>