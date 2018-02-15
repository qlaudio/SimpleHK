<?php
require_once('core.php');
require_once('session.php');

if (isset($_GET['saved'])){
$message = '<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i> Usuario baneado exitosamente.</div>';
$usuario = $_GET['usuario'];
}
if (isset($_POST['ban'])) {

$username = $_POST['username'];
$reason = $_POST['reason'];
$expire = $_POST['expire'];
 

$fecha = date('Y-m-d H:i:s',(strtotime("$expire")));
$timestamp = strtotime($fecha);

$fechaactual = date('Y-m-d H:i:s',(strtotime("+0 Hours")));
$timestampactual = strtotime($fechaactual);

$stmtusuarioinfo = $dbConnection->prepare('SELECT * FROM users WHERE username= :id');
$stmtusuarioinfo->execute(array('id' => "$username"));
$usuarioinfo = $stmtusuarioinfo->fetch();

$usercount = $dbConnection->prepare('SELECT COUNT(*) FROM users WHERE username= :id');
$usercount->bindParam(":id", $username);
$usercount->execute();
$usercount_count = $usercount->fetchColumn();

if ($usercount_count == '0') {
$message = '<div class="alert alert-block alert-info"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-times blue"></i> Este usuario no existe.</div>';
}else{
$stmtusuarioinfo2 = $dbConnection->prepare('SELECT * FROM users WHERE mail= :mail');
$stmtusuarioinfo2->execute(array('mail' => "$usuarioinfo[mail]"));
while($ban_q = $stmtusuarioinfo2->fetch(PDO::FETCH_ASSOC)){
	$stmtsave = $dbConnection->prepare("INSERT INTO  bans (user_id,ban_reason,ban_expire,user_staff_id,timestamp) VALUES (:id,:reason,:expire,:staff,:time)");
	$stmtsave->bindParam(":id", $ban_q['id']);
	$stmtsave->bindParam(":reason", $reason);
	$stmtsave->bindParam(":expire", $timestamp);
	$stmtsave->bindParam(":staff", $user_q['id']);
	$stmtsave->bindValue(":time", $timestampactual);
	$stmtsave->execute();
header ("Location: ban.php?saved=$w&usuario=$usuarioinfo[id]");
}}}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Housekeeping - Banear Usuario</title>
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
								<a href="home.php">Inicio</a>
							</li>
							<li>
							<a href="users.php">Usuarios</a>
							<li class="active">Banear Usuario</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">

						<div class="page-header">
							<h1>
								<i class="ace-icon fa fa-angle-double-right"></i> Banear Usuario
								<small>
									<br>
									Expulsa a un usuario de Hebbo Hotel. El usuario puede iniciar sesión pero se impide su entrada al Cliente.
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<?php 
									echo $message;
								
									if (isset($_GET['usuario'])){
										echo "<div class=".'"RCONtext"'.">";
									
									//EJECUTAR RCON ALERT
									
										error_reporting(E_ALL);
										echo "<b>DESCONECTAR USUARIO BANEADO:</b><br>";
										$service_port = 3001;
										$address = "127.0.0.1";
										$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
										if ($socket === false) {
											echo "> socket_create() fallido. Motivo: " . socket_strerror(socket_last_error()) . "<br>";
										} else {
											echo "> Creación de Socket correcta.<br>";
										}
										echo "> Intentando conectar al servidor RCON...<br>";
										$result = socket_connect($socket, $address, $service_port);
										if ($result === false) {
											echo "> socket_connect() fallido.<br>Motivo: ($result) " . socket_strerror(socket_last_error($socket)) . "<br>";
										} else {
											echo "> OK.<br>";
										}
										$in =
'										{
										"key": "Disconnect",
										"data": {
											"user_id": "'."$usuario".'"
										} }';
										if(socket_write($socket, $in, strlen($in)) === false)
										{ echo socket_strerror( socket_last_error($socket) ); }
										$out = socket_read($socket, 2048);
										echo "> Respuesta:" . $out;
									
									
										echo "<br></div><br>";
									}
								?>


<div class="row">
									<div class="col-xs-12">
									<form method="post" class="form-horizontal">
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="username"> Nombre de Usuario: </label>
										<div class="col-sm-9">
											<input type="text" name="username" id="username" class="col-xs-10 col-sm-5" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="reason"> Motivo: </label>
										<div class="col-sm-9">
											<input type="text" name="reason" id="reason" class="col-xs-10 col-sm-5" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="expire">Duración:</label>
										<div class="col-sm-9">
															<select class="col-xs-10 col-sm-5" name="expire" id="expire">
																<option value="+1 Hours">1 Hora</option>
																<option value="+4 Hours" selected>4 Horas</option>
																<option value="+24 Hours">1 Día</option>
																<option value="+48 Hours">2 Dias</option>
																<option value="+7 Days">1 Semana</option>
																<option value="+31 Days">1 Mes</option>
																<option value="+1 Years">1 Año</option>
																<option value="+10 Years">Permanente</option>
															</select>
															
										</div>
									</div>
<div class="col-md-offset-3 col-md-9">
											<button name="ban" class="boton2 botonazul" type="submit">
												<p style="margin:1px;"><i class="fa fa-times"></i> Banear</p>
											</button>
										</div>
									</form>
									</div><!-- /.span -->
								</div>

								<div class="hr hr32 hr-dotted"></div>
								</div><!-- /.row -->

								<div class="hr hr32 hr-dotted"></div>
									</div><!-- /.col -->
								</div><!-- /.row -->

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery.2.1.1.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
		
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});
			
			
			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					$tooltip.remove();
				});
			
			
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').ace_scroll({
					size: 300
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				});
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
			
			
				//show the dropdowns on top or bottom depending on window height and menu position
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
					var offset = $(this).offset();
			
					var $w = $(window)
					if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
						$(this).addClass('dropup');
					else $(this).removeClass('dropup');
				});
			
			})
		</script>
	</body>
</html>
