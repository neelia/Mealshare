<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	wp_title( '|', true, 'right' );
	// Add the blog name.
	bloginfo( 'name' );
	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	?></title>
	<meta name="description" content="GLFtv - Gute Laune Furtwangen TV ist dein Hochschulfernsehen für den Campus Furtwangen. Sieh Dir interessante Beiträge rund um das Hochschulleben an, entdecke Neues aus Kultur und Wissenschaft oder stöbere in unserem Sendungsarchiv.">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'/>
	<meta name="HandheldFriendly" content="true" />
	<meta name="msapplication-TileColor" content="#70ea46" />
	<meta name="msapplication-TileImage" content="<?php bloginfo ('template_directory'); ?>/mstile-144x144.png" />
	<?php wp_head(); ?>
	<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo ('template_directory'); ?>/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo ('template_directory'); ?>/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo ('template_directory'); ?>/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo ('template_directory'); ?>/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo ('template_directory'); ?>/apple-touch-icon-60x60.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo ('template_directory'); ?>/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo ('template_directory'); ?>/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo ('template_directory'); ?>/apple-touch-icon-152x152.png" />
	<link rel="icon" type="image/png" href="<?php bloginfo ('template_directory'); ?>/favicon-16x16.png" sizes="16x16" />
	<link rel="icon" type="image/png" href="<?php bloginfo ('template_directory'); ?>/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="<?php bloginfo ('template_directory'); ?>/favicon-96x96.png" sizes="96x96" />
	<link rel="icon" type="image/png" href="<?php bloginfo ('template_directory'); ?>/favicon-160x160.png" sizes="160x160" />
	<link rel="icon" type="image/png" href="<?php bloginfo ('template_directory'); ?>/favicon-196x196.png" sizes="196x196" />
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo ('template_directory'); ?>/css/normalize.css">
	<link rel="stylesheet" href="<?php bloginfo ('template_directory'); ?>/plugins/flexslider/flexslider.css" type="text/css" />
	<link href="<?php bloginfo ('template_directory'); ?>/plugins/nouislider/jquery.nouislider.min.css" rel="stylesheet">
	<link href="<?php bloginfo ('template_directory'); ?>/plugins/bxslider-4-master/jquery.bxslider.css" rel="stylesheet">
	<link href="<?php bloginfo ('template_directory'); ?>/plugins/css-modal/download/modal.css" rel="stylesheet">
	<link href="<?php bloginfo ('template_directory'); ?>/plugins/pushy-master/css/pushy.css" rel="stylesheet">
	<link rel="stylesheet" href="//releases.flowplayer.org/5.4.6/skin/minimalist.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="stylesheet" href="<?php bloginfo ('template_directory'); ?>/home.css">
	<script src="<?php bloginfo ('template_directory'); ?>/vendor/modernizr-2.6.2.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script>
		window.jQuery || document.write('<script src="vendor/jquery-2.0.3.min.js"><\/script>')
	</script>
	<script src="<?php bloginfo ('template_directory'); ?>/plugins/flexslider/jquery.flexslider-min.js" type="text/javascript"></script>
	<script src="<?php bloginfo ('template_directory'); ?>/plugins/nouislider/jquery.nouislider.min.js" type="text/javascript"></script>
	<script src="<?php bloginfo ('template_directory'); ?>/plugins/JSpicture/jquery-picture-min.js" type="text/javascript"></script>
	<script src="<?php bloginfo ('template_directory'); ?>/plugins/fastClick/fastclick.js" type="application/javascript"></script>
	<script type="text/javascript" src="http://www.streaming.uni-freiburg.de/jwplayer6/jwplayer.js"></script>
	<script type="text/javascript" src="http://releases.flowplayer.org/5.4.6/flowplayer.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo ('template_directory'); ?>/plugins/bxslider-4-master/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo ('template_directory'); ?>/js/custom_ajax.js"></script>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-45105950-1', 'glftv.de');
		ga('send', 'pageview');

	</script>
</head>
<body <?php body_class(); ?>>
		<!--[if lt IE 7]>
		<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
		<nav id="navMobileMain" class="nav-main no-active-btn mobile-nav pushy pushy-left clearfix">
			<div id="nav_btn_search_mobile" class="menu-item search-btn mobile-search-btn">
				<form class="search-input-form clearfix" role="search" method="get" action="http://glftv.de/" autocomplete="off">
					<input class="search-input" name="s" type="text" value="<?php the_search_query() ?>" placeholder="Mediathek durchsuchen..." required="">
					<button class="search-icon" type="submit" > </button>
				</form>
			</div>
			<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
			<?php wp_nav_menu( array( 'container_class' => 'menu-header-mobile', 'theme_location' => 'second' ) ); ?>
		</nav>
		
		<header class="push">
			<div class="header-content clearfix">
				<div class="nav-home-btn-wrapper">
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="nav-home-btn" rel="home"></a>
				</div>
				<div id="nav_menu_btn" class="nav-menu-btn menu-btn small-screen-data">
					<span class="nav-menu-icon"></span>
				</div>
				<nav id="navDeskMain" class="nav-main no-active-btn desktop-nav clearfix">
					<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
					<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'first' ) ); ?>
					<div id="nav_btn_search_desk" class="menu-item menu-item-has-children search-btn" >
						<form class="search-input-form clearfix" role="search" method="get" action="http://glftv.de/" autocomplete="off">
							<div class="nav-header nav-accordion-header">
								<span class="search-icon"></span>
							</div>
							<div class="sub-menu">
								<input class="search-input" name="s" type="text" value="<?php the_search_query() ?>" placeholder="Mediathek durchsuchen..." required="">
								<button type="submit" > </button>
							</div>
						</form>
					</div>	
				</nav>
			</div>
		</header>
		<div class="site-overlay"></div>