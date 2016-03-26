<?php
/**
 * vroom theme framework functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package vroom_theme_framework
 */

if ( ! function_exists( 'vroom_theme_framework_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function vroom_theme_framework_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on vroom theme framework, use a find and replace
	 * to change 'vroom-theme-framework' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'vroom-theme-framework', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'vroom-theme-framework' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'vroom_theme_framework_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // vroom_theme_framework_setup
add_action( 'after_setup_theme', 'vroom_theme_framework_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vroom_theme_framework_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vroom_theme_framework_content_width', 1140 );
}
add_action( 'after_setup_theme', 'vroom_theme_framework_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vroom_theme_framework_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'vroom-theme-framework' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'vroom_theme_framework_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
// loading modernizr and jquery, and reply script
function vroom_scripts_and_styles() {
  if (!is_admin()) {

    // Deregister WordPress jQuery
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'http://code.jquery.com/jquery-1.10.2.js', array(), '1.10.2'); // Load jQuery using CDN jQuery

    // modernizr (without media query polyfill)
    wp_register_script( 'vroom-modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.8.3.js', array(), '2.7.1', false );

    // ie-only style sheet
    wp_register_style( 'vroom-ie-only', get_template_directory_uri() . '/css/ie.css', array(), '' );

    // comment reply script for threaded comments
    if( get_option( 'thread_comments' ) )  { wp_enqueue_script( 'comment-reply' ); }

    // adding Foundation scripts file in the footer
    wp_register_script( 'vroom-vendor-js', get_template_directory_uri() . '/js/vendor/min/vendor.min.js', array( 'jquery' ), '', true );
    wp_register_script( 'vroom-app-js', get_template_directory_uri() . '/js/custom/min/app.min.js', array( 'jquery' ), '', true );

    global $is_IE;
    if ($is_IE) {
       wp_register_script ( 'html5shiv', "http://html5shiv.googlecode.com/svn/trunk/html5.js" , false, true);
    }

    // enqueue styles and scripts
    wp_enqueue_script( 'vroom-modernizr' );
    wp_enqueue_style('vroom-ie-only');

    wp_enqueue_script( 'jquery' ); // deregistered and loaded by Google CDN

    wp_enqueue_script( 'vroom-vendor-js' );
    wp_enqueue_script( 'vroom-app-js' );
    wp_enqueue_script( 'html5shiv' );

  }
}

// adding the conditional wrapper around ie stylesheet
// source: http://code.garyjones.co.uk/ie-conditional-style-sheets-wordpress/
function vroom_ie_conditional( $tag, $handle ) {
	if ( 'vroom-ie-only' == $handle )
		$tag = '<!--[if lt IE 9]>' . "\n" . $tag . '<![endif]-->' . "\n";
	return $tag;
}

// enqueue base scripts and styles
add_action('wp_enqueue_scripts', 'vroom_scripts_and_styles', 999);
// ie conditional wrapper
add_filter( 'style_loader_tag', 'vroom_ie_conditional', 10, 2 );






/**
 * Enqueue styles.
 */
function vroom_css()
{
	// Register the main style
	wp_register_style( 'vroom-main-style', get_template_directory_uri() . '/css/app.css', array(), '', 'all' );
	// Register the "shame" style (this should only be used for after thoughts and updates)
	wp_register_style( 'vroom-shame', get_template_directory_uri() . '/css/shame.css', array(), '', 'all' );

	// enqueue the stylesheets
	wp_enqueue_style( 'vroom-main-style' );
	wp_enqueue_style( 'vroom-shame' );
}
add_action( 'wp_enqueue_scripts', 'vroom_css' );








/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Custom functions for this theme.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Custom functions that act independently of the theme templates.
 */
// require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
// require get_template_directory() . '/inc/jetpack.php';
