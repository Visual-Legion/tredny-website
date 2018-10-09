<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch" />
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon" />
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed" />
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />

		<meta name="google-site-verification" content="9S2eGcJQ3Y5xMydVhFZkSGeboqbwmwfb1rrua6aghqI" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- <meta name="description" content="<?php //bloginfo('description'); ?>"> -->

		<!-- <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,700" rel="stylesheet"> -->
		<!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">
			<?php $header = get_field('header','options'); ?>
			<!-- header -->
			<header class="header clear" role="banner">
				<div class="header_wrapper">
					<!-- logo -->
					<div class="logo link">
						<a href="<?php echo home_url(); ?>"></a>
						<!-- <img src="<?php //echo $header['image'] ?>"> -->

						<svg xmlns="http://www.w3.org/2000/svg" style="position:absolute;"><defs><linearGradient id="vl_gradient" x1="100%" y1="100%" x2="200%" y2="200%" gradientUnits="userSpaceOnUse"><stop offset="0%"  stop-color="#7c28fb"/><stop offset="100%" stop-color="#7f9efd"/></linearGradient></defs></svg><svg class="svg_logo" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 1028.3 338.5" style="enable-background:new 0 0 1028.3 338.5;" xml:space="preserve"><style type="text/css">.st0{stroke:#1A1A1A;stroke-miterlimit:10;}</style><g><path class="st0" d="M321.1,0"/></g><path d="M35.1,117.9l-6.9,1.2l16,54.2l1.1,5h0.4l1.1-4.8l16.1-54.3l-6.8-1.2V107h33v10.9l-7.6,1l-26.6,78.4H36.2L9.6,118.9l-7.4-1V107h33V117.9z"/><path d="M94.5,117.9V107h37.4v10.9l-9.7,1.9v64.8l9.7,1.9v10.9H94.5v-10.9l9.7-1.9v-64.8L94.5,117.9z"/><path d="M207.4,135.9h-13.6l-2.4-12.4c-1.6-1-3.9-1.9-6.9-2.6c-3-0.7-6.2-1.1-9.6-1.1c-5,0-8.8,1-11.5,3.1c-2.7,2.1-4.1,4.8-4.1,8.1c0,3.1,1.4,5.6,4.2,7.5c2.8,2,7.7,4,14.7,6.2c10,2.8,17.5,6.4,22.7,11c5.1,4.5,7.7,10.5,7.7,17.9c0,7.7-3.1,13.8-9.2,18.3c-6.1,4.5-14.2,6.7-24.2,6.7c-7.2,0-13.6-1.1-19.4-3.4s-10.6-5.4-14.4-9.4v-18.9h14l1.9,12.8c1.8,1.5,4.3,2.7,7.4,3.7c3.1,1,6.6,1.5,10.5,1.5c5,0,8.7-1,11.3-3c2.6-2,3.9-4.7,3.9-8.1c0-3.5-1.2-6.3-3.7-8.4c-2.5-2.1-6.8-4.1-12.9-6c-10.7-3.1-18.8-6.8-24.3-11c-5.5-4.3-8.3-10.1-8.3-17.5c0-7.3,3.1-13.3,9.3-18s14-7,23.4-7.2c6.9,0,13.3,1.1,19,3.2c5.7,2.1,10.5,4.9,14.4,8.4V135.9z"/><path d="M252.2,107v10.9l-9.7,1.9v47.1c0,6,1.6,10.4,4.8,13.4c3.2,3,7.6,4.4,13.2,4.4c5.7,0,10.1-1.5,13.3-4.4s4.8-7.4,4.8-13.4v-47.1l-9.6-1.9V107h37.4v10.9l-9.7,1.9v47.1c0,10.1-3.3,17.9-10,23.4c-6.7,5.5-15.4,8.3-26.3,8.3c-10.8,0-19.5-2.8-26.1-8.3c-6.6-5.5-10-13.3-10-23.4v-47.1l-9.6-1.9V107h9.6h18.1H252.2z"/><path d="M304.6,186.5l6.5-0.9l27.5-78.5h18.5l27.3,78.5l6.5,0.9v10.9h-30.8v-10.9l6.3-1.1l-4-12.4h-29.3l-4,12.4l6.3,1.1v10.9h-30.8V186.5z M337.4,159.6h20.7l-10.2-31.8h-0.4L337.4,159.6z"/><path d="M682.7,157.6h-30.6v25.8h29.2l0.8-10.8h13.8v24.7h-71.5v-10.9l9.6-1.9v-64.8l-9.6-1.9V107h9.6h61.7v24.8h-13.9L681,121h-28.9v22.7h30.6V157.6z"/><path d="M782.4,187.3c-2.9,2.9-7.2,5.5-12.8,7.8c-5.6,2.3-12.7,3.5-21.3,3.5c-12.2,0-22.1-4.1-29.8-12.3c-7.7-8.2-11.5-18.8-11.5-31.9v-3.1c0-13.5,3.8-24.5,11.3-33c7.5-8.5,17.4-12.7,29.6-12.7c7.1,0,13.5,1.1,19.4,3.4c5.9,2.3,10.7,5.3,14.6,9.1v18.2h-13.4l-2.5-12.1c-1.7-1.4-3.8-2.5-6.5-3.4c-2.7-0.8-5.8-1.3-9.3-1.3c-7.9,0-14,2.9-18.4,8.7c-4.4,5.8-6.6,13.5-6.6,22.9v3.2c0,9.2,2.2,16.5,6.5,22c4.3,5.5,10.5,8.2,18.6,8.2c3.6,0,6.6-0.3,8.8-0.9c2.3-0.6,4-1.3,5.3-2.2v-15.3l-12.9-1v-12.7h31.1V187.3z"/><path d="M793.5,117.9V107h37.4v10.9l-9.7,1.9v64.8l9.7,1.9v10.9h-37.4v-10.9l9.7-1.9v-64.8L793.5,117.9z"/><path d="M922.4,152.9c0,13.2-3.8,24.2-11.4,32.8c-7.6,8.6-17.5,13-29.7,13c-12.2,0-22.1-4.3-29.6-13c-7.5-8.6-11.3-19.6-11.3-32.8v-1.4c0-13.2,3.7-24.1,11.2-32.8c7.5-8.7,17.3-13,29.5-13c12.2,0,22.2,4.3,29.7,13c7.6,8.7,11.4,19.6,11.4,32.8V152.9z M904.3,151.4c0-9.3-1.9-16.9-5.8-22.8c-3.9-5.8-9.6-8.7-17.2-8.7c-7.6,0-13.3,2.9-17,8.7c-3.7,5.8-5.6,13.4-5.6,22.8v1.5c0,9.5,1.9,17.2,5.7,23c3.8,5.8,9.5,8.7,17,8.7c7.7,0,13.4-2.9,17.2-8.7c3.8-5.8,5.8-13.5,5.8-23V151.4z"/><path d="M1024,107v10.9l-9.7,1.9v77.5h-18.1l-36.5-60.8l-0.4,0.1v48l9.7,1.9v10.9h-37.4v-10.9l9.6-1.9v-64.8l-9.6-1.9V107h9.6h18.1l36.5,60.8l0.4-0.1v-48l-9.7-1.9V107h27.7H1024z"/><svg class="logo_ll" fill="url(#vl_gradient) #000"><rect x="503.7" y="5.5" width="1" height="333"/><g><path d="M510,284.2v-27l23.9-4.6v-161L510,87V59.9h23.9h45h24V87l-24,4.6v158.1h63.3l2.2-28.2h34.4v62.7H510z"/></g><g><path d="M329.6,284.2v-62.7H364l2.2,28.2h63.3V91.6l-24-4.6V59.9h24h45h23.9V87l-23.9,4.6v161l23.9,4.6v27H329.6z"/></g><rect x="490.2" y="141.3" width="27.7" height="27.7"/></svg></svg>
					</div>
					<!-- /logo -->

					<!-- nav -->
					<div class="navs_wrapper">
						<nav class="nav" role="navigation">
							<?php html5blank_nav(); ?>
							<!-- /* ADD WHEN ADDING LANGS (DONT FORGER JS) */ -->
							<?php //echo do_shortcode('[wpml_language_switcher type="custom" flags=0 native=1 translated=0]'); ?>
						</nav>
						<a id="hamburger-icon" href="#" title="Menu">
						  <span class="line line-1"></span>
						  <span class="line line-2"></span>
						  <span class="line line-3"></span>
						</a>
					</div>
					
					<!-- /nav -->
				</div>
			</header>
			<!-- /header -->

			<!-- Move to functions.php? -->
			<?php include('loader.php') ?>