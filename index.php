<?php
$message =' ';
require_once('core.php');
if (isset($_POST['login'])) {
$username = $_POST['username'];

$config=mysqli_query($db,"SELECT * from hk_config LIMIT 1");
$config_q=mysqli_fetch_assoc($config);
$minrank=$config_q['login_minrank'];

$password = hash('sha256',$_POST['password']);

$user_verify = $db->query("SELECT * FROM chocolatey_users_id WHERE mail='$username' && password='$password' LIMIT 1");
$user_verify2 = $db->query("SELECT * FROM users WHERE mail='$username' && rank>=$minrank LIMIT 1");
$user_fetch = mysqli_fetch_assoc($user_verify2);

if (mysqli_num_rows($user_verify) == 0) {
	$error='1';
$message = 'Email o contraseña incorrectos.';
}else{
if ($user_fetch['rank'] < $minrank) {
	$error='1';
$message = 'No tienes permiso para acceder.';
}else{
$_SESSION['id2'] = $user_fetch['id'];
header ("Location: home.php");
}}}
if (isset($_SESSION['id2'])) {
header ("Location: home.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Hebbo Hotel - Housekeeping</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
	<link href="assets/css/hebbo.css" rel="stylesheet">
	<link href="assets/css/fontawesome-all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrapper">
	
		<center>
		
			<form method="post" style="max-width: 500px;" class="form-signin box">
				<h2 style="color:#444444;"><i style="font-size:40px; margin-bottom:5px;" class="fa fa-suitcase"></i><br>Hebbo Housekeeping</h2>
				
				<p style="color:#545454; font-size:16px;">Ingresa a la Administración de Hebbo Hotel</p>
				<?php
				if ($error==1) { ?>
					<p class='loginerror'><i class="fa fa-exclamation-circle"></i> <?php echo $message ?></p>
				<?php } ?>
				<hr class="hrsimple"></hr>
				
				
				<p><i class="fa fa-user gris"></i><input  type="text" class="campoform" name="username" placeholder="Email" required="" autofocus="" style="padding:5px;" /></p>
				<p><i class="fa fa-key gris"></i><input  type="password" class="campoform" name="password" placeholder="Contraseña" required="" style="padding:5px;"/></p>
				<button name="login" style="font-size:16px;" class="botonsemicuadrado botonverde"  type="submit"><i class="fa fa-sign-in-alt"></i> Ingresar</button>
			</form>
		</center>
    </div>
</body>
</html>