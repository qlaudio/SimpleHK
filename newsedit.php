<?php
require_once('core.php');
require_once('session.php');
$news_id = $_GET['id'];

$stmtnewsid = $dbConnection->prepare('SELECT COUNT(*) FROM chocolatey_articles WHERE id= :id');
$stmtnewsid->execute(array('id' => "$news_id"));
$newsid = $stmtnewsid->fetchColumn();

if ($newsid == 0) {
header ("Location: news.php?error=$w");
}

$stmtnewsinfo = $dbConnection->prepare('SELECT * FROM chocolatey_articles WHERE id= :id');
$stmtnewsinfo->execute(array('id' => "$news_id"));
$news_edit_q = $stmtnewsinfo->fetch();

if (isset($_POST['save'])) {
$title = $_POST['title'];
$category = $_POST['category'];
$image_url = $_POST['image_url'];
$stext = $_POST['stext'];
$btext = $_POST['btext'];
$author = $user_q['username'];
$roomid = $_POST['roomid'];
$image_url_thumb = $_POST['image_url_thumb'];
$timestamp = date('Y-m-d H:i:s');

mysqli_query($db,"UPDATE chocolatey_articles SET title='$title', categories='$category', description='$stext', content='$btext', imageUrl='$image_url', author='$author', roomId='$roomid', updated_at='$timestamp', thumbnailUrl='$image_url_thumb' WHERE id=$news_edit_q[id]");
$stmtsave = $dbConnection->prepare("UPDATE chocolatey_articles SET title=:title, categories=:categories, description=:description, content=:content, imageUrl=:imageUrl, author=:author, roomId=:roomId, updated_at=:updated_at, thumbnailUrl=:thumbnailUrl WHERE id=:id");
$stmtsave->bindParam(":title", $title);
$stmtsave->bindParam(":categories", $category);
$stmtsave->bindParam(":description", $stext);
$stmtsave->bindParam(":content", $btext);
$stmtsave->bindParam(":imageUrl", $image_url);
$stmtsave->bindParam(":author", $author);
$stmtsave->bindParam(":roomId", $roomid);
$stmtsave->bindParam(":updated_at", $timestamp);
$stmtsave->bindParam(":thumbnailUrl", $image_url_thumb);
$stmtsave->bindParam(":id", $news_edit_q[id]);
$stmtsave->execute();


header ("Location: news.php?saved=$w");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Housekeeping - Editar Noticia</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link href="assets/css/fontawesome-all.css" rel="stylesheet">
		<link href="assets/css/hebbo.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<script src="assets/js/ace-extra.min.js"></script>
		<script src="assets/js/tinymce/tinymce.min.js"></script>
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
							<a href="news.php">Noticias</a>
							<li class="active">Editar Noticia</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">

						<div class="page-header">
							<h1>
								<i class="ace-icon fa fa-angle-double-right"></i> Editar Noticia<br>
								<small>
									Modifica una noticia existente. Recuerda usar buena ortografía, acentuación y coherencia.
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-14">
								<!-- PAGE CONTENT BEGINS -->
								
									<form method="post" class="form-horizontal">
                                    <div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="title"> Título: </label>
										<div class="col-sm-9">
											<input value="<?php echo $news_edit_q['title']; ?>" type="text" name="title" id="title" class="col-xs-10 col-sm-5" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="stext"> Descripción: </label>
										<div class="col-sm-9">
											<input value="<?php echo $news_edit_q['description']; ?>" type="text" id="stext" name="stext" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="btext"> Contenido: </label>
										<div class="col-sm-9">
											<textarea id="btext" name="btext" style="height:300px;width:100%;" required><?php echo $news_edit_q['content']; ?></textarea>
										</div>
									</div>
                                    <div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="category">Categoría:</label>
										<div class="col-sm-9">
															<select class="form-control" name="category" id="category">
																<option <?php if ($news_edit_q['categories'] == 'technical.updates') { ?>selected<?php } ?> value="technical.updates">Actualizaciones de Hebbo</option>
																<option <?php if ($news_edit_q['categories'] == 'campaign.activities') { ?>selected<?php } ?> value="campaign.activities">Campañas y Actividades</option>
																<option <?php if ($news_edit_q['categories'] == 'ambassadors') { ?>selected<?php } ?> value="ambassadors">Embajadores</option>
																<option <?php if ($news_edit_q['categories'] == 'fansites') { ?>selected<?php } ?> value="fansites">Fansites</option>
																<option <?php if ($news_edit_q['categories'] == 'credit.promos') { ?>selected<?php } ?> value="credit.promo">Ofertas Especiales</option>
															</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="roomid"> Id de Sala (Sólo Números): </label>
										<div class="col-sm-9">
											<input type="text" id="roomid" name="roomid" value="<?php echo $news_edit_q['roomId']; ?>" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="image_url"> Imagen Grande (759x300): </label>
										<div class="col-sm-9">
											<input type="text" value="<?php echo $news_edit_q['imageUrl']; ?>" id="image_url" name="image_url" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="image_url_thumb"> Imagen Pequeña (120x120): </label>
										<div class="col-sm-9">
											<input value="<?php echo $news_edit_q['thumbnailUrl']; ?>" type="text" id="image_url_thumb" name="image_url_thumb" class="form-control" required>
										</div>
									</div>
									
                                            <div class="col-md-offset-2 col-md-9">
											<button name="save" class="boton2 botonazul" type="submit">
												<p style="margin:1px;"><i class="fa fa-check"></i> Guardar Cambios</p>
											</button>
										</div>
									</form>
									

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
			
			tinymce.init({
  selector: 'textarea',  // note the comma at the end of the line!
  plugins: 'code print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | image link code | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
	language: 'es'
});
			
		</script>
	</body>
	
</html>
