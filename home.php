<?php
require_once('core.php');
require_once('session.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Housekeeping - Panel de Administración</title>
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
							<li class="active">Panel de Inicio</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">

						<div class="page-header">
							<h1>
								<i class="ace-icon fa fa-angle-double-right"></i> Panel de Inicio<br>
								<small>
									</i>
									Resumen de las estadísticas de Hebbo Hotel.
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="space-6"></div>
<a href="users.php">
									<div class="col-sm-7 infobox-container">
										<div class="infobox infobox-green">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-address-card" style="padding-top:2px"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php $users = mysqli_query($db,"SELECT * from users"); echo mysqli_num_rows($users); ?></span>
												<div class="infobox-content">Usuarios Registrados</div>
											</div>

										</div>
										</a>
<a href="news.php">
										<div class="infobox infobox-blue">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-newspaper" style="padding-top:2px"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php $news = mysqli_query($db,"SELECT * from chocolatey_articles"); echo mysqli_num_rows($news); ?></span>
												<div class="infobox-content">Noticias Creadas</div>
											</div>
										</div>
										</a>
<a href="rooms.php">
										<div class="infobox infobox-pink">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-key" style="padding-top:2px"></i>
											</div>
											<div class="infobox-data">
												<span class="infobox-data-number"><?php $rooms = mysqli_query($db,"SELECT * from rooms"); echo mysqli_num_rows($rooms); ?></span>
												<div class="infobox-content">Salas Creadas</div>
											</div>
										</div>
										</a>


										<div class="infobox infobox-red">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-globe" style="padding-top:2px"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php $online = mysqli_query($db,"SELECT * FROM users WHERE online = '1'"); echo mysqli_num_rows($online); ?></span>
												<div class="infobox-content">Usuarios Online</div>
											</div>
										</div>
<a href="tienda.php">		
										<div class="infobox infobox-orange" >
											<div class="infobox-icon">
												<i class="ace-icon fa fa-shopping-cart" style="padding-top:4px"></i>
											</div>
											<div class="infobox-data" >
												<span class="infobox-data-number"><?php $catalogo = mysqli_query($db,"SELECT * FROM catalog_pages WHERE min_rank = '1' AND enabled='1' AND visible='1'");  echo mysqli_num_rows($catalogo); ?></span>
												<div class="infobox-content">Páginas en la Tienda</div>
											</div>
										</div>
										</a>		
										<div class="infobox infobox-purple">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-users"></i>
											</div>
											<div class="infobox-data">
												<span class="infobox-data-number"><?php $groups = mysqli_query($db,"SELECT * from guilds"); echo mysqli_num_rows($groups); ?></span>
												<div class="infobox-content">Grupos Creados</div>
											</div>
										</div>

										<div class="space-6"></div>
									</div>

									<div class="vspace-12-sm"></div>
								</div><!-- /.row -->

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
