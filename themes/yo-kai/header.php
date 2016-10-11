<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Yo-Kai Watch México</title>
		<!-- Sets initial viewport load and disables zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- SEO -->
		<meta name="keywords" content="yo-kai, yo kai, yokai, medallas yo-kai, colecciona, nintendo, nintendo 2ds, las medallas yo-kai, colecciona las medallas, yo-kai watch, yo-kai watch mexico, méxico, yokai watch, yokai mexico, yo-kai méxico, album digital, álbum, ">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<!-- Compatibility -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta http-equiv="cleartype" content="on">
		<!-- Favicon - generated with http://www.favicomatic.com/ -->
		<link rel="icon" type="image/png" href="<?php echo THEMEPATH; ?>favicon/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="<?php echo THEMEPATH; ?>favicon/favicon-16x16.png" sizes="16x16" />
		<!-- CSS -->
		<link rel="stylesheet" href="<?php echo THEMEPATH; ?>style.css">
		<!-- Google font(s) -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
		<!-- Font awesome -->
		<!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> -->

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->

		<!-- Typekit -->
		<!-- <script src="//use.typekit.net/xxxxxx.js"></script> -->
		<!-- <script>try{Typekit.load();}catch(e){}</script> -->

	</head>

	<?php if ( is_front_page() || is_page( array ('registro', 'recuperar-contrasena', 'terminos-y-condiciones', 'aviso-de-privacidad') )) { ?>
		<body>
	<?php } else { ?>
		<body class="bg-image--primary">
	<?php } ?>
		<header class="[ js-header ]">
			<h1></h1>
			<?php if ( is_front_page() || is_page( array ('registro', 'recuperar-contrasena', 'terminos-y-condiciones', 'aviso-de-privacidad') )) { ?>
				<a class="[ block ][ text-center ]" href="<?php echo site_url('/'); ?>">
					<img class="[ width--100 ]" src="<?php echo THEMEPATH; ?>images/header.png" alt="logo yo-kai"> <!--  max-width--1024p -->
				</a>
			<?php } else { ?>
				<div class="[ nav-header ]">
					<div>
						<div>
							<a class="<?php if(is_page('album')) echo 'active'; ?>" href="<?php echo site_url('/album'); ?>">Álbum</a>
							<a class="<?php if(is_page('cargar')) echo 'active'; ?>" href="<?php echo site_url('/cargar'); ?>">Cargar</a>
							<a class="<?php if(is_page('ranking')) echo 'active'; ?>" href="<?php echo site_url('/ranking'); ?>">Ranking</a>
							<div>
								<a href="<?php echo site_url('/'); ?>">
									<img src="<?php echo THEMEPATH; ?>images/logo.png" alt="logo yo-kai">
								</a>
							</div>
							<a class="<?php if(is_page('descargables')) echo 'active'; ?>" href="<?php echo site_url('/descargables'); ?>">Descargables</a>
							<a class="<?php if(is_page('videos')) echo 'active'; ?>" href="<?php echo site_url('/videos-yokai'); ?>">Videos</a>
							<a class="<?php if(is_page('ayuda')) echo 'active'; ?>" href="<?php echo site_url('/ayuda'); ?>">Ayuda</a>
						</div>
					</div>

				</div>
			<?php } ?>
		</header>
		<div class="[ main ]">