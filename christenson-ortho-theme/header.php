<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vroom_theme_framework
 */

?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">


	<!-- Favicon and Feed -->
	<link rel="shortcut icon" type="image/png" href="<?php echo esc_url (get_template_directory_uri()); ?>/favicon.png">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">

	<!-- Open graph meta-tags -->
	<meta property="og:title" content="<?php the_title(); ?>">
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
	<meta property="og:url" content="<?php the_permalink() ?>">
	<!-- Add img meta-tag for production -->

	<!--  iPhone Web App Home Screen Icon -->
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url (get_template_directory_uri()); ?>/img/devices/reverie-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url (get_template_directory_uri()); ?>/img/devices/reverie-icon-retina.png" />
	<link rel="apple-touch-icon" href="<?php echo esc_url (get_template_directory_uri()); ?>/img/devices/reverie-icon.png" />
	
	<script type="application/ld+json">
	{
	  "@context" : "http://schema.org",
	  "@type" : "LocalBusiness",
	  "name" : "Vroom Digital Agency",
	  "telephone" : "(678) 837-6425",
	  "email" : "hello@vroom-agency.com",
	  "address" : {
	    "@type" : "PostalAddress",
	    "streetAddress" : "1215 Hightower Trail, Bldg C",
	    "addressLocality" : "Atlanta",
	    "addressRegion" : "GA",
	    "postalCode" : "30350"
	  },
	  "url" : "http://vroom-agency.com/"
	}
	</script>



<?php wp_head(); ?>


<!--[if lt IE 9]>
  <script type="text/javascript" src="<?php echo esc_url (get_template_directory_uri()); ?>/js/vendor/respond.min.js"></script>
<![endif]-->




</head>

<body <?php body_class(); ?>>


<div id="page" class="hfeed site">

 <!--[if lt IE 9]>
        <div class="chromeframe-container">
            <div class="chromeframe-wrapper">
                <div class="chromeframe-inner">
                    <img class="aligncenter" alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url (get_template_directory_uri()); ?>/img/vroomLogotype.svg"/>
                    <h1 class="text-center">You're using an outdated browser!</h1>
                    <p class="text-center">Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
                </div>
            </div>
        </div>
 <![endif]-->

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'vroom-theme-framework' ); ?></a>
 
	<header id="masthead" class="site-header" role="banner">
		<div class="row collapse">
			<div class="large-4 medium-4 small-12 columns">
				<div class="site-branding">
			    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/img/vroomLogotype.svg" alt="<?php bloginfo( 'name' ); ?>"></a>
				</div><!-- .site-branding -->
			</div> <!-- /.cols -->
			<div class="large-8 medium-8 small-12 columns">
				<nav id="site-navigation" class="main-navigation okayNav" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'vroom-theme-framework' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation -->
			</div> <!-- /.cols -->
		</div> <!-- /.row -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
