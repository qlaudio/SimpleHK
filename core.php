<?php
$db = mysqli_connect('localhost', 'root', 'pass', 'hebbo');
error_reporting(0);
ob_start();
session_start();
$w = MD5(time());
if (isset($_SESSION['id2'])) {
$user_a = $db->query("SELECT * FROM users WHERE id='$_SESSION[id2]'");
$user_q = mysqli_fetch_assoc($user_a);
}
$db->query("SET NAMES 'utf8'");
$db->query('SET character_set_connection=utf8');
$db->query('SET character_set_client=utf8');
$db->query('SET character_set_results=utf8');
setlocale(LC_ALL, NULL);
setlocale(LC_ALL, 'es');  

?>