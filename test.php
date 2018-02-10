<?php
require_once('core.php');
require_once('session.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Housekeeping - Rcon Test</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link href="assets/css/fontawesome-all.css" rel="stylesheet">
		<link href="assets/css/hebbo.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<script src="assets/js/ace-extra.min.js"></script>
	</head>

	<body class="no-skin">
	
		<?php
			include_once('include/menu.php');
		?>
	
	
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Inicio</a>
							</li>
							<li class="active">Rcon Test</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">

						<div class="page-header">
							<h1>
								<i class="ace-icon fa fa-angle-double-right"></i> Test de RCON<br>
								<small>
									</i>
									Envío y ejecución de comandos instantaneamente al cliente.
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								
	<?php
	error_reporting(E_ALL);
	$service_port = 3001;
	$address = "127.0.0.1";
	$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
	if ($socket === false) {
		echo "socket_create() fallido. Motivo: " . socket_strerror(socket_last_error()) . "<br>";
	} else {
		echo "Creación de Socket correcta.<br>";
	}
	echo "Intentando conectar al servidor RCON...<br>";
	$result = socket_connect($socket, $address, $service_port);
	if ($result === false) {
		echo "socket_connect() fallido.<br>Motivo: ($result) " . socket_strerror(socket_last_error($socket)) . "<br>";
	} else {
		echo "OK.<br>";
	}
 
	$in =
'	{
	"key": "GiveBadge",
	"data": {
		"badge":"HPUB",
		"user_id": "1"
	}
	}';
 
	if(socket_write($socket, $in, strlen($in)) === false)
	{
		echo socket_strerror( socket_last_error($socket) );
	}
	$out = socket_read($socket, 2048);
    echo "Respuesta:" . $out;
 
	?> 
								
								
								
								
								
								
								
								
								
								
								
								
								
								Ejecutado 

								<div class="hr hr32 hr-dotted"></div>
								</div><!-- /.row -->

								<div class="hr hr32 hr-dotted"></div>
									</div><!-- /.col -->
								</div><!-- /.row -->
						
						<?php
							include_once('include/inferior.php');
						?>
								
	</body>
</html>
