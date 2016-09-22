<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Yo-kay</title>
		<!-- Sets initial viewport load and disables zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- SEO -->
		<meta name="keywords" content="">
		<meta name="description" content="">
		<!-- Compatibility -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta http-equiv="cleartype" content="on">
		<!-- Favicon - generated with http://www.favicomatic.com/ -->
		<link rel="apple-touch-icon-precomposed" sizes="57x57" href="favicon/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="favicon/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="favicon/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="favicon/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon-precomposed" sizes="60x60" href="favicon/apple-touch-icon-60x60.png" />
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="favicon/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon-precomposed" sizes="76x76" href="favicon/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="favicon/apple-touch-icon-152x152.png" />
		<link rel="icon" type="image/png" href="favicon/favicon-196x196.png" sizes="196x196" />
		<link rel="icon" type="image/png" href="favicon/favicon-96x96.png" sizes="96x96" />
		<link rel="icon" type="image/png" href="favicon/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="favicon/favicon-16x16.png" sizes="16x16" />
		<link rel="icon" type="image/png" href="favicon/favicon-128.png" sizes="128x128" />
		<meta name="application-name" content="Little Crow"/>
		<meta name="msapplication-TileColor" content="#009C9F" />
		<meta name="msapplication-TileImage" content="favicon/mstile-144x144.png" />
		<meta name="msapplication-square70x70logo" content="favicon/mstile-70x70.png" />
		<meta name="msapplication-square150x150logo" content="favicon/mstile-150x150.png" />
		<meta name="msapplication-wide310x150logo" content="favicon/mstile-310x150.png" />
		<meta name="msapplication-square310x310logo" content="favicon/mstile-310x310.png" />
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



	<?php if ( is_front_page() || is_page('registro', 'recuperar-contrasena', 'terminos-y-condiciones', 'aviso-de-privacidad' )) { ?>
		<body>
	<?php } else { ?>
		<body class="bg-image--primary">
	<?php } ?>

		<header class="[ js-header ]">
			<a href="<?php echo site_url('/'); ?>">
				<img class="[ width--100 ]" src="<?php echo THEMEPATH; ?>images/header.png" alt="logo yo-kai">
			</a>
		</header>
		<div class="[ main ]">