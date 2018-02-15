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

											<?php
											$stmtusercount = $dbConnection->prepare('SELECT COUNT(*) FROM users');
											$stmtusercount->execute();
											$usercount_count = $stmtusercount->fetchColumn();
											?>
											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $usercount_count; ?></span>
												<div class="infobox-content">Usuarios Registrados</div>
											</div>

										</div>
										</a>
										
										<?php
											$stmtnewscount = $dbConnection->prepare('SELECT COUNT(*) FROM chocolatey_articles');
											$stmtnewscount->execute();
											$newscount_count = $stmtnewscount->fetchColumn();
										?>
										<a href="news.php">
										<div class="infobox infobox-blue">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-newspaper" style="padding-top:2px"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $newscount_count; ?></span>
												<div class="infobox-content">Noticias Creadas</div>
											</div>
										</div>
										</a>
										
										<?php
											$stmtroomscount = $dbConnection->prepare('SELECT COUNT(*) FROM rooms');
											$stmtroomscount->execute();
											$roomscount_count = $stmtroomscount->fetchColumn();
										?>
									<a href="rooms.php">
										<div class="infobox infobox-pink">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-key" style="padding-top:2px"></i>
											</div>
											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $roomscount_count; ?></span>
												<div class="infobox-content">Salas Creadas</div>
											</div>
										</div>
										</a>

										<?php
											$stmtonlinecount = $dbConnection->prepare('SELECT COUNT(*) FROM users WHERE online = :online');
											$stmtonlinecount->execute(array('online' => 1 ));
											$onlinecount_count = $stmtonlinecount->fetchColumn();
										?>
										<div class="infobox infobox-red">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-globe" style="padding-top:2px"></i>
											</div>
										
											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $onlinecount_count; ?></span>
												<div class="infobox-content">Usuarios Online</div>
											</div>
										</div>
										
										<?php
											$stmtcatacount = $dbConnection->prepare('SELECT  COUNT(*) FROM catalog_pages WHERE min_rank = :minrank AND enabled = :enabled AND visible = :visible');
											$stmtcatacount->execute(array('minrank' => 1,
																			'enabled' => 1,
																			'visible' => 1));
											$catacount_count = $stmtcatacount->fetchColumn();
											
										?>
									<a href="tienda.php">		
										<div class="infobox infobox-orange" >
											<div class="infobox-icon">
												<i class="ace-icon fa fa-shopping-cart" style="padding-top:4px"></i>
											</div>
											<div class="infobox-data" >
												<span class="infobox-data-number"><?php echo $catacount_count; ?></span>
												<div class="infobox-content">Páginas en la Tienda</div>
											</div>
										</div>
										</a>		
																
										<?php
											$stmtguildcount = $dbConnection->prepare('SELECT COUNT(*) FROM guilds');
											$stmtguildcount->execute();
											$guildscount_count = $stmtguildcount->fetchColumn();
										?>
										<div class="infobox infobox-purple">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-users"></i>
											</div>
											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $guildscount_count; ?></span>
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
