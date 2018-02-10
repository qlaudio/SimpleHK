/*
SQLyog Ultimate v12.4.1 (64 bit)
MySQL - 10.1.25-MariaDB : Database - hebbo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `hk_articles_backup` */

DROP TABLE IF EXISTS `hk_articles_backup`;

CREATE TABLE `hk_articles_backup` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `categories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imageUrl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnailUrl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roomId` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `hk_articles_backup` */

insert  into `hk_articles_backup`(`id`,`title`,`description`,`content`,`author`,`categories`,`imageUrl`,`thumbnailUrl`,`roomId`,`created_at`,`updated_at`) values 
(1,'Bienvenido a Hebbo Hotel','¿Preparad@ para la diversión?','<p>&iexcl;Y bien! Es bueno volvernos a encontrar.<br /> Descubre el nuevo y renovado Hebbo Hotel. Explora las salas, invita a tus amigos, construye el mejor juego y recibe el reconocimiento que mereces.<br /> Pr&oacute;ximamente tendremos nuevas caracter&iacute;sticas y funciones, adem&aacute;s de eventos y competiciones tem&aacute;ticas.<br /><br /><em>- Claudio</em></p>','Claudio','technical.updates','https://hebbo.cl/swf/c_images/img/hola.png','https://hebbo.cl/swf/c_images/img/hola_2.png',0,'2017-07-25 00:00:00','2018-01-14 23:56:30'),
(2,'Saluda a la Cámara','Captura esos grandes momentos con la nueva función de Hebbo Hotel','Presentando la Hebbo Cámara...<br>\r\nCaptura momentos, toma selfies en tus salas o en las de tus amigos. Agrega estilos y personaliza tus fotos.<br>\r\nPuedes comprar las fotos, las cuales llegarán a tu inventario y podrás ponerlas directamente en las paredes de tus habitaciones. Además, puedes publicar la foto en la web, la cual será visible en tu perfil de Hebbo y en la página de Comunidad.\r\n<br><br>\r\nAdemás, puedes ver las fotos de otros Hebbos, darle me gusta, o si encuentras alguna foto que no respete la Manera Hebbo puedes reportarla directamente.\r\n<br>\r\nLas fotos que no respeten la Manera Hebbo serán retiradas.\r\n<br><br>\r\nTen en cuenta que la Hebbo Cámara aún se encuentra en desarrollo, por lo que será común encontrarse con algún bug ocasionalmente.\r\n<br><br>\r\nAtte.<br>\r\n<i>- Claudio</i>\r\n','Claudio','technical.updates','https://hebbo.cl/swf/c_images/img/camara.png','https://hebbo.cl/swf/c_images/img/camara_2.png',0,'2017-08-01 16:47:59',NULL),
(3,'¡Participa y crea el mejor Battle Banzai!','¡Demuestra tu ingenio construyendo el mejor Juego de Battle Banzai de todo Hebbo Hotel! Podrás ganar sorprendentes premios...','¡Necesitamos nuevas Salas Públicas, necesitamos de tu ayuda!<br>\r\nHebbo Hotel recién comienza, necesitamos los mejores constructores para nuestros Juegos Oficiales.<br>\r\nEsta vez es el turno de <b>Battle Banzai</b><br><br>\r\nPrepara las casillas, posiciona las Puertas, pon barras para determinar el área de juego, prepara el contador... ¡Y que comience la partida!<br><br>\r\n\r\n<b>Requisitos y Condiciones:</b><br>\r\n-Agregar YoVoy: #BanzaiOficial<br>\r\n-Puedes poner cualquier nombre de sala.<br>\r\n-Puedes agregar Wireds, fondos y cualquier otro furni.<br>\r\n-La sala debe ser superior a 200 baldosas.<br>\r\n-<b>El evento termina el día Sábado 28 de Octubre del presente. Los ganadores serán anunciados el día Lunes 11 de Septiembre.\r\n</b><br><br>\r\n\r\n<b>Premios:</b><br>\r\n<b>Primer Lugar:</b><br>\r\n-Tu sala será una sala Pública Oficial.<br>\r\n-1500 Diamantes.<br>\r\n-Placa conmemorativa.<br>\r\n-3 Raros Descatalogados.<br><br>\r\n\r\n<b>Segundo Lugar:</b><br>\r\n-1000 Diamantes.<br>\r\n-Placa conmemorativa.<br>\r\n-2 Raros Descatalogados.<br><br>\r\n\r\n<b>Tercer Lugar:</b><br>\r\n-500 Diamantes.<br>\r\n-Placa conmemorativa.<br>\r\n-1 Raro Descatalogado.<br><br>\r\n\r\n¡Así que pon manos a la obra y a construir!<br>\r\n¡¡Mucha suerte a todos los participantes!!<br><br>\r\n\r\nAtte.<br>\r\n<i>- Claudio</i>\r\n','Claudio','campaign.activities','https://hebbo.cl/swf/c_images/img/banzai.png','https://hebbo.cl/swf/c_images/img/banzai_2.png',0,'2017-08-01 22:22:41',NULL),
(4,'¡Vive la Fiesta! ¡Vive la Música!','¡Está de regreso la Jukebox, totalmente funcional, con cientos de canciones, de todos los tipos!','Ya esta aquí la Jukebox, ingresa a Tienda de Música en el Catálogo del Hotel.<br>\r\nDescubre todas las canciones; tenemos Pop, House, Punk, Rock, Metal, Electronica, Disco, Romántica, Reggaetón, Latinas, y... ¡Muchas más!<br>\r\n<br>\r\nRecuerda que puedes pedir tus canciones en la Central de Ayuda o en la sala Oficial de Peticiones de Discos: <a href=\"https://hebbo.cl/hotel?room=403\">Ir a la Sala</a>.\r\n<br><br>\r\nNota: Al cargar una nueva canción, al momento de reproducir, puede haber un pequeño desfase(Lag). Recomendamos utilizar una buena conexión si deseas crear una lista de reproducción extensa.\r\n<br><br>\r\n\r\nAtte.<br>\r\n<i>- Claudio</i>','Claudio','technical.updates','https://hebbo.cl/swf/c_images/img/jukebox.png','https://hebbo.cl/swf/c_images/img/jukebox_2.png',0,'2017-10-16 22:22:41',NULL),
(5,'¡Demuestra tu Creatividad en esta Tenebrosa Competencia!','Halloween está aquí, y para dejarlo claro... ¡Necesitamos el juego y la sala temática más horripilantes que hayan existido!','Participa ahora en el evento de construcción del mes:<br>\r\nEl objetivo es contruir un <b>juego</b> o <b>sala tematica</b> utilizando furnis de la línea Hebboween (Todos las líneas por año son válidas).\r\nHabran 6 ganadores, 3 lugares por las salas de juego y 3 lugares por las salas temáticas.<br>\r\nPara participar sólo debes agregar los siguientes <i>YoVoy</i>: #<i>Hebboween</i> y #<i>Octubre2017</i>.<br>\r\nEl plazo para participar es hasta el 31 de Octubre de 2017. Los premios se entregarán el mismo día, a las 23:00 (Chile continental).<br><br>\r\n\r\nLos premios son los siguientes, para ambas categorías:<br>\r\n<b>1° Lugar:</b><br>\r\n-La sala aparecerá como Oficial del Hotel. (Salas Públicas).<br>\r\n-5 Mega Raros + 2 Raros.<br>\r\n-5.000 Diamantes + 500 Cacahuates.<br>\r\n-Placa conmemorativa.<br><br>\r\n\r\n<b>2° Lugar:</b><br>\r\n-5.000 Créditos.<br>\r\n-3 Mega Raros + 1 Raro.<br>\r\n-3.000 Diamantes + 300 Cacahuates.<br>\r\n-Placa conmemorativa.<br><br>\r\n\r\n<b>3° Lugar:</b><br>\r\n-3.000 Créditos.<br>\r\n-1 Mega Raro + 1 Raro.<br>\r\n-1.000 Diamantes + 100 Cacahuates.<br>\r\n-Placa conmemorativa.<br><br>\r\n\r\n¡Mucha suerte a todos!<br><br>\r\n\r\nAtte:<br>\r\n<i>- Claudio</i>','Claudio','campaign.activities','https://hebbo.cl/swf/c_images/img/hebboween17.png','https://hebbo.cl/swf/c_images/img/hebboween_3.png',0,'2017-10-18 14:22:41',NULL),
(6,'¡Prepárate! ¡Estas fiestas vienen cargadas de sorpresas!','Próximamente podrás descubrir nuevas características, además de los nuevos furnis \"Navidad Victoriana\", ambientados en las calles de Londres.','En unos días tendremos novedades exclusivas.<br>\r\nPrepara tus animos, deja fluir la navidad por tu cuerpo, en Hebbo podrás disfrutar de nuevas características, nuevos furnis de temporada, música navideña para tu jukebox, vestimenta para la ocasión... <b>¡Y regalos cada día!</b>.<br>\r\n<br><br>\r\nEl Calendario de Adviento comenzará a partir del 10 de Diciembre, se regalarán diariamente 10.000 Créditos, 10 Cacahuates y un furni sorpresa.\r\n<br><br>\r\nAdemás de la inclusión de un nuevo comando que estará disponible desde ese día: <b>:Calendario</b>.\r\n<br><br>\r\nRecuerda que cada regalo del Calendario estará disponible sólo por 24 horas.<br>\r\n¡Estas fiestas comienzan a vivirse en grande en Hebbo Hotel!\r\n<br><br>\r\nAtte:<br>\r\n<i>-Claudio</i>','Claudio','technical.updates','https://hebbo.cl/swf/c_images/img/xmas17.png','https://hebbo.cl/swf/c_images/img/xmas17_2.png',0,'2017-12-06 12:22:41',NULL),
(7,'¡La Navidad Victoriana Comienza Aquí!','Y así comienza, una de nuestras festividades favoritas del año. Este Diciembre, vuelve atrás en el tiempo... ¡A un nevado Londres de antaño!','Ya están aquí los nuevos furnis y caracteristicas correspondientes a la fiestas de Navidad de este año 2017: <b>Navidad Victoriana</b>.\r\n<br>Con un estilo clásico, provenientes del antiguo Londres. Encuentra los furnis especiales de la temporada en la Tienda.\r\n<br><br>\r\n\r\n<h1>Navidad Victoriana:</h1>\r\nEncuentra esta línea de furnis en la página principal de la Tienda de Hebbo. ¡Son hermosos! Con diseños clásicos ambientados en las calles de Inglaterra.\r\n<br><br>\r\n\r\n<h1>Diseña tu Propia Ropa Victoriana:</h1>\r\n¡Esta vez podrás conseguir la ropa exclusiva de la temporada diseñandola tu mismo!\r\n<br>Utiliza la <b>Máquina Cosedora</b> y los diversos materiales (hilos y telas) para conseguir las vestimentas victorianas. Esta vestimenta sólo se puede conseguir de esta manera, no está disponible su venta en la Tienda.\r\n<br><br>Aquí te dejamos una guia básica de creación, pero recuerda que también puedes hacer tus propias formulas para conseguir ropas raras; ¡Hay 3 vestimenta raras para descubrir!\r\n<br>\r\n<br><img src=\"https://hebbo.cl/swf/c_images/img/xmas17_ropas.png\" alt=\"Guia de diseño - vestimentas victorianas\">\r\n<br><br>\r\n\r\n<h1>Raros LTD:</h1>\r\nConsigue Raros de Edición Limitada correspondientes a la ocasión.<br>\r\nPróximamente nuevos Raros que sólo estarán disponibles en pocas cantidades (25 unidades). Estos Raros incluirán una Placa exclusiva correspondiente a la ocasión. ¡Presta atención y no dejes pasar esta oportunidad - Los Raros serán vendidos desde el 13 de Diciembre!\r\n<br><br>\r\n¡Felices fiestas! - ¡Nos vemos en las frias calles victorianas de Londres!\r\n<br><br>\r\n\r\nAtentamente,\r\n<br>\r\n-<i>Claudio</i>','Claudio','campaign.activities','https://hebbo.cl/swf/c_images/img/xmas17_02.png','https://hebbo.cl/swf/c_images/img/xmas17_02_2.png',0,'2017-12-11 12:00:41',NULL),
(12,'¡El Mes de Los Lotes Clásicos!','Este mes traemos de regreso una selección con los mejores Lotes Clásicos. ¡Presta Atención a la Tienda!','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<h1>LOS GRANDES CL&Aacute;SICOS SIEMPRE VUELVEN:</h1>\r\n<p><a class=\"remove-link\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; background-color: transparent; color: #ffffff; cursor: pointer; outline: 0px; text-decoration-line: none;\" href=\"https://images.habbo.com/web_images/habbo-web-articles/spromo_jan18_gen.png\" target=\"_blank\" rel=\"noopener noreferrer\"><img class=\"align-right\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: 0px; image-rendering: pixelated; vertical-align: middle; display: inline-block; margin: 12px 0px 12px 24px; float: right;\" src=\"https://images.habbo.com/web_images/habbo-web-articles/spromo_jan18_gen.png\" alt=\"spromo_jan18_gen\" width=\"150\" height=\"150\" /></a>Hemos echado la vista atr&aacute;s y hemos seleccionados los lotes cl&aacute;sicos m&aacute;s populares. Adem&aacute;s, algunos furnis solo estar&aacute;n disponibles en la compra de ciertos lotes, es decir, actualmente no se vender&aacute;n por separado. Echa un vistazo a la lista de lotes que estar&aacute;n disponibles a lo largo del mes:</p>\r\n<ul>\r\n<li>Lote Cl&aacute;sico Star Lounge</li>\r\n<li>Lote Cl&aacute;sico Habburgers&nbsp;</li>\r\n<li>Lote Cl&aacute;sico Club HC (con 2 exclusivos furnis Elefante HC)</li>\r\n<li>Lote Biblioteca Antigua (con el furni exclusivo Busto de Frank El Bibliotecario)</li>\r\n<li>Lote Sal&oacute;n Cl&aacute;sico</li>\r\n<li>Lote Sal&oacute;n del T&eacute;&nbsp;</li>\r\n<li>Lote Battle Ball Cl&aacute;sico (versi&oacute;n p&uacute;rpura)</li>\r\n<li>Lote Cl&aacute;sico Ice Caf&eacute;&nbsp;</li>\r\n</ul>\r\n<p>&nbsp;Presta atenci&oacute;n, los Lotes aparecer&aacute;n en la Tienda paulatinamente, y s&oacute;lo estar&aacute;n disponibles hasta finalizar el mes.<br />&iexcl;Cons&iacute;guelos ahora!</p>\r\n<p>Atentamente,<br /><em>-Claudio</em></p>\r\n</body>\r\n</html>','Claudio','campaign.activities','https://hebbo.cl/swf/c_images/img/lotes_clasicos.png','https://hebbo.cl/swf/c_images/img/lotes_clasicos_2.png',0,'2018-01-15 00:08:40','2018-01-15 00:42:06'),
(13,'Lote Clásico Star Lounge','¿Necesitas de un helado vaso de Jugo de Bobba después de un difícil día? Este es el lugar donde podrás encontrarlo, además, ¡donde podrás hacer que todos recuerden tu nombre!','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>&iquest;Necesitas de un helado vaso de Jugo de Bobba despu&eacute;s de un dif&iacute;cil d&iacute;a? Este es el lugar donde podr&aacute;s encontrarlo, adem&aacute;s, &iexcl;donde podr&aacute;s hacer que todos recuerden tu nombre!</p>\r\n</body>\r\n</html>','Claudio','credit.promo','https://hebbo.cl/swf/c_images/img/lpromo_starbundlejan2018.png','https://hebbo.cl/swf/c_images/img/lpromo_starbundlejan2018_thumb.png',1463,'2018-01-16 01:34:12',NULL),
(14,'Bienvenido a Hebbo Hotel','¿Preparad@ para la diversión?','<p>&iexcl;Y bien! Es bueno volvernos a encontrar.<br /> Descubre el nuevo y renovado Hebbo Hotel. Explora las salas, invita a tus amigos, construye el mejor juego y recibe el reconocimiento que mereces.<br /> Pr&oacute;ximamente tendremos nuevas caracter&iacute;sticas y funciones, adem&aacute;s de eventos y competiciones tem&aacute;ticas.<br /><br /><em>- Claudio</em></p>','Claudio','technical.updates','https://hebbo.cl/swf/c_images/img/hola.png','https://hebbo.cl/swf/c_images/img/hola_2.png',0,'2017-07-25 00:00:00','2018-01-14 23:56:30');

/*Table structure for table `hk_config` */

DROP TABLE IF EXISTS `hk_config`;

CREATE TABLE `hk_config` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `login_minrank` varchar(255) NOT NULL DEFAULT '4',
  `catalog_page_ltd` int(25) NOT NULL DEFAULT '0',
  `catalog_page_badgeshop` int(25) NOT NULL DEFAULT '0',
  `gallery_badges` varchar(255) NOT NULL DEFAULT 'https://hebbo.cl/swf/c_images/album1584/',
  `gallery_furni` varchar(255) NOT NULL DEFAULT 'https://hebbo.cl/swf/dcr/hof_furni/icons/',
  `gallery_catalog` varchar(255) NOT NULL DEFAULT 'https://hebbo.cl/swf/c_images/catalogue/',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `hk_config` */

insert  into `hk_config`(`id`,`login_minrank`,`catalog_page_ltd`,`catalog_page_badgeshop`,`gallery_badges`,`gallery_furni`,`gallery_catalog`) values 
(1,'6',160035,305,'https://hebbo.cl/swf/c_images/album1584/','https://hebbo.cl/swf/dcr/hof_furni/icons/','https://hebbo.cl/swf/c_images/catalogue/');

/*Table structure for table `hk_logs` */

DROP TABLE IF EXISTS `hk_logs`;

CREATE TABLE `hk_logs` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user` varchar(500) DEFAULT NULL,
  `log` varchar(900) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `hk_logs` */

insert  into `hk_logs`(`id`,`user`,`log`) values 
(1,'Claudio','Edita texto de ES3'),
(2,'Claudio','Ha subido la placaCF100003.gif'),
(3,'Claudio','Ha subido la placaCF100004.gif'),
(4,'Sauron','Ha subido la placaUl4QjL9.gif'),
(5,'Claudio','Edita texto de Es'),
(6,'Claudio','Edita texto de Es'),
(7,'Claudio','Edita texto de Es0'),
(8,'Claudio','Edita texto de Es'),
(9,'Camus','Ha subido la placaPro.gif'),
(10,'Camus','Edita texto de Pro'),
(11,'Camus','Edita texto de Pro'),
(12,'Sauron','Ha subido la placaScreenshot_13.gif'),
(13,'Sauron','Ha subido la placaSauron.gif'),
(14,'TheHail','Edita texto de JLA');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
