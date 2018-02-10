<?php
require_once('core.php');
require_once('session.php');
if ($_GET['added'] == $w) {
$message = '<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i> Se ha agregado una nueva placa a la tienda.</div>';
}
if ($_GET['error'] == $w) {
$message = '<div class="alert alert-block alert-info"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-times blue"></i> Esta placa no existe.</div>';
}
if ($_GET['deleted'] == $w) {
$message = '<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check red"></i> Placa eliminada correctamente de la tienda.</div>';
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Housekeeping - Tienda de Raros LTD</title>
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
							<li class="active">Tienda</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">

						<div class="page-header">
							<h1>
								<i class="ace-icon fa fa-angle-double-right"></i> Tienda de Raros LTD
								<small>
									<br>
									Lista de Raros de Edición Limitada disponible en la Tienda de Hebbo Hotel.
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<?php echo $message; ?>

								<div class="row">
									<div class="col-xs-12">
									
										
										<a href="catalog_ltd_add.php"><button  class="boton3 botonazul">
											<p style="margin:1px;"><i class="fa fa-plus"></i> Agregar</p>
										</button></a>
										<a href="catalog_refresh.php"><button  class="boton3 botonazul" style="margin-bottom:14px;">
											<p style="margin:1px;"><i class="fa fa-sync-alt"></i> Actualizar Tienda</p>
										</button></a>
										<div class="rwd">
										<table id="simple-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
												<th>ID</th>
													<th>Imagen</th>
													<th>Nombre</th>
													<th>Costo</th>
													<th>Placa</th>
													<th>Opciones</th>
												</tr>
											</thead>
											<tbody>
											<?php
											$config=mysqli_query($db,"SELECT * from hk_config LIMIT 1");
											$config_q=mysqli_fetch_assoc($config);
											$pageid=$config_q['catalog_page_ltd'];
											$galleryfurnis=$config_q['gallery_furni'];
											$gallerybadges=$config_q['gallery_badges'];
											
											$furnis_a = mysqli_query($db,"SELECT * from catalog_items WHERE page_id='$pageid'");
											while($furnis_q = mysqli_fetch_assoc($furnis_a)){
											
											$valor = explode(';',$furnis_q['item_ids']); 


											$item_id=$valor[0];
											$badge_id=$valor[1];
											$item_base_name_a=mysqli_query($db,"SELECT * from items_base WHERE id='$item_id'");
											$item_base_name_q=mysqli_fetch_assoc($item_base_name_a);
											$badge_name_a=mysqli_query($db,"SELECT * from items_base WHERE id='$badge_id'");
											$badge_name_q=mysqli_fetch_assoc($badge_name_a);
											$pageid=$config_q['item_name'];
											
											if (isset($_POST['delete_'.$furnis_q['id'].''])) {
											mysqli_query($db,"DELETE FROM catalog_items WHERE id=$furnis_q[id]");
											header ("Location: catalog_ltd.php?deleted=$w");
											}
											
											$itemimage = $galleryfurnis.$item_base_name_q['item_name'].'_icon.png';
											$badgeimage = $gallerybadges.$badge_name_q['item_name'].'.gif';
											?>
												<tr>
												<td><?php  echo $furnis_q['id']; ?></td>
												<td><center><img src="<?php echo $itemimage; ?>"></center> </td>
													<td><?php echo $item_base_name_q['item_name']; ?></td>
													<td><?php echo $furnis_q['cost_credits']; ?> Créditos<br>
													<?php echo $furnis_q['cost_points'];
													
													if ($furnis_q['points_type']==102){
														echo " Cacahuates";
													}else{
														if ($furnis_q['points_type']==5){
														echo " Diamantes";
													}else{
													if ($furnis_q['points_type']==0){
														echo " Duckets";
													}else{
														echo " ¿Otros?";
													}}}
													?></td>
													<td><center><img src="<?php echo $badgeimage; ?>"><br><?php echo $badge_name_q['item_name']; ?></center></td>
													
													<td>
													<form method="post">
															<center><button style="width:50px;" formaction="roomedit.php?id=<?php echo $rooms_q['id']; ?>" class="boton botonazul">
																<i class="iconogrande menu-icon fa fa-pencil-alt"></i>
															</button>
															<button name="delete_<?php echo $furnis_q['id']; ?>" style="margin-top:4px; width:50px;" class="boton botonrojo">
																<i class="iconogrande menu-icon fa fa-trash-alt"></i>
															</button>
															</center>
													</form>
														</div>
													</td>
												</tr>
											<?php } ?>
											</tbody>
										</table>
										</div>
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
