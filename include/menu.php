<?php
require_once('core.php');
require_once('session.php');
$url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>
	
		
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Navegación</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="home.php" class="navbar-brand"><i class="fa fa-suitcase"></i><small> Hebbo Housekeeping</small></a>
				</div>

				<!-- 
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
							

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" value="<i class='fa fa-star'></i>" class="dropdown-toggle">
								<span class="user-info">
									<small>Bienvenido </small>
									<?php echo $user_q['username']; ?>
								</span>
							</a>
						</li>
					</ul>
				</div>
				--->
			</div>
			<!-- /.navbar-container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<ul class="nav nav-list">
					<li <?php if (strpos($url,'home.php') !== false) {echo 'class="active"';}?> >
						<a href="home.php">
							<i class="menu-icon"><i class="fa fa-tachometer-alt"></i></i>
							<span class="menu-text">Panel de Inicio</span>
						</a>

						<b class="arrow"></b>
					</li>
					
					
					<li <?php
					if (strpos($url,'users') !== false) {echo 'class="active"';}
					if (strpos($url,'ban') !== false) {echo 'class="active"';}
					if (strpos($url,'banlist.php') !== false) {echo 'class="active"';}
					if (strpos($url,'forgotten') !== false) {echo 'class="active"';}
					if (strpos($url,'badge.php') !== false) {echo 'class="active"';}
					?>
					>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon"><i class="fa fa-users"></i></i>
							<span class="menu-text">Usuarios</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li <?php if (strpos($url,'users.php') !== false) {echo 'class="active"';}?>><a href="users.php"><i class="menu-icon"></i><i class="fa fa-caret-right"></i> Modificar Usuarios</a>

								<b class="arrow"></b>
							</li>

							<li <?php if (strpos($url,'ban.php') !== false) {echo 'class="active"';}?>><a href="ban.php"><i class="menu-icon"></i><i class="fa fa-caret-right"></i> Banear Usuarios</a>

								<b class="arrow"></b>
							</li>
							<li <?php if (strpos($url,'banlist.php') !== false) {echo 'class="active"';}?>><a href="banlist.php"><i class="menu-icon"></i><i class="fa fa-caret-right"></i> Manejar Baneos</a>

								<b class="arrow"></b>
							</li>
							<!--<li <?php if (strpos($url,'forgotten.php') !== false) {echo 'class="active"';}?>><a href="forgotten.php"><i class="menu-icon"></i><i class="fa fa-caret-right"></i>Recuperación de Contraseñas</a>

								<b class="arrow"></b>
							</li>-->
							<li <?php if (strpos($url,'badge.php') !== false) {echo 'class="active"';}?>><a href="badge.php"><i class="menu-icon"></i><i class="fa fa-caret-right"></i> Enviar Placa</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					
					
					<li <?php if (strpos($url,'news') !== false) {echo 'class="active"';}?>>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon"><i class="fa fa-newspaper"></i></i>
							<span class="menu-text"> Noticias </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li <?php if (strpos($url,'newsadd.php') !== false) {echo 'class="active"';}?>>
								<a href="newsadd.php">
									<i class="menu-icon"></i><i class="fa fa-caret-right"></i>
									Redactar Noticia
								</a>

								<b class="arrow"></b>
							</li>

							<li <?php if (strpos($url,'news.php') !== false) {echo 'class="active"';} if (strpos($url,'newsedit.php') !== false) {echo 'class="active"';}?> >
								<a href="news.php">
									<i class="menu-icon"></i><i class="fa fa-caret-right"></i>
									Editar Noticias
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
															
					<li <?php if (strpos($url,'catalog_refresh.php') !== false) {echo 'class="active"';} if (strpos($url,'catalog_badges') !== false) {echo 'class="active"';}?>>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon"><i class="fa fa-shopping-cart"></i></i>
							<span class="menu-text"> Tienda </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li <?php  if (strpos($url,'catalog_badges') !== false) {echo 'class="active"';}?>>
								<a href="catalog_badges.php">
									<i class="menu-icon"></i><i class="fa fa-caret-right"></i>
									Tienda de Placas
								</a>

								<b class="arrow"></b>
							</li>
							<li <?php  if (strpos($url,'catalog_refresh.php') !== false) {echo 'class="active"';}?>>
								<a href="catalog_refresh.php">
									<i class="menu-icon"></i><i class="fa fa-caret-right"></i>
									Actualizar Tienda
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
						
						
					<li <?php if (strpos($url,'roomedit.php') !== false) {echo 'class="active"';} if (strpos($url,'rooms.php') !== false) {echo 'class="active"';}?>>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon"><i class="fa fa-key"></i></i>
							<span class="menu-text"> Salas </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li <?php if (strpos($url,'roomedit.php') !== false) {echo 'class="active"';} if (strpos($url,'rooms.php') !== false) {echo 'class="active"';}?>>
								<a href="rooms.php">
									<i class="menu-icon"></i><i class="fa fa-caret-right"></i>
									Editar Salas
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li <?php if (strpos($url,'badge_texts.php') !== false) {echo 'class="active"';} if (strpos($url,'badge_texts_search.php') !== false) {echo 'class="active"';} if (strpos($url,'badge_upload.php') !== false) {echo 'class="active"';} if (strpos($url,'badge_texts_add.php') !== false) {echo 'class="active"';}?>>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon"><i class="fa fa-asterisk"></i></i>
							<span class="menu-text"> Herramientas </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li <?php if (strpos($url,'badge_upload.php') !== false) {echo 'class="active"';} if (strpos($url,'badge_texts_add.php') !== false) {echo 'class="active"';}?>>
								<a href="badge_upload.php">
									<i class="menu-icon"></i><i class="fa fa-caret-right"></i>
									Subir Nueva Placa
								</a>

								<b class="arrow"></b>
							</li>
								<li <?php if (strpos($url,'badge_texts_search.php') !== false) {echo 'class="active"';} if (strpos($url,'badge_texts.php') !== false) {echo 'class="active"';}?>>
								<a href="badge_texts_search.php">
									<i class="menu-icon"></i><i class="fa fa-caret-right"></i>
									Editar Textos de Placa
								</a>

								<b class="arrow"></b>							
								</li>
						</ul>
					</li>
					
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon"><i class="fa fa-star"></i></i>
							<span class="menu-text"> <?php echo $user_q['username']; ?> </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a style="color:#DF0101;" href="desconectar.php">
									<i class="menu-icon"></i><i class="fa fa-arrow-alt-circle-left"></i>
									Desconectar
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>
			
			
			
			
			
			

			<div class="main-content">
				<div class="main-content-inner">
				
				
				
					
