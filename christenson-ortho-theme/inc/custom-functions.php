<?php
/**
* Custom Theme Functions are to be placed here
TO DO: audit extras.php
*/

// Table of Contents:
//------------------------------------------------
// Disable WordPress from reducing quality of jpegs when uploaded to media library
// Enable Shortcodes in Widgets
// News index page custom excerpt string [...] removal
// Custom Password Protected Page Message
// Filter to remove "Protected:" from pw protected page titles
// Filter to hide protected posts from search and blog index pages
// Disable WP from adding garbage HTML to markup
// Enable SVG filetype to be uploaded to media library
// Remove thumbnail width and height dimensions that prevent responsive images for the_thumbnail
// Stop images from being wrapped in <p> tags
// Add more buttons to the html (text) editor
// Add page slug to body class
// Add single post category to body class
// enable excerpts for pages (useful for subtitles on pages)
// Shortcode to cloak mailto:email address links
// CUSTOM LOGIN PAGE FILTERS - Needs to be updated with appropiate logo img file path per site
// USE the WordPress SITE DESCRIPTION for the site's home page PAGE TITLE ----- NEEDS WORK!
// Make a new default gravatar available on the dashboard -- commented out
// Add Custom Class to Prev/Next Post Links
// Breadcrumbs Nav
// Remove WP Generated Shit from <head>
// Disable stupid ass wp-emoji code from being inserted into <head>
// Remove generated classes and ids from wp_nav_menu <li>'s but keep current-menu-item class for current page
//------------------------------------------------





// Disable WordPress from reducing quality of jpegs when uploaded to media library
//------------------------------------------------
add_filter( 'jpeg_quality', 'better_jpeg_quality' );
function better_jpeg_quality() {
    return 100;
}
//------------------------------------------------


// Enable Shortcodes in Widgets
//------------------------------------------------
add_filter( 'widget_text', 'do_shortcode' );
//------------------------------------------------


// News index page custom excerpt string [...] removal
//------------------------------------------------
// function new_excerpt_more( $excerpt ) {
//     return str_replace( '[...]', '...', $excerpt );
// }
// add_filter( 'wp_trim_excerpt', 'new_excerpt_more' );

//create a permalink after the excerpt
function new_excerpt_more($content) {
    return str_replace('[...]',
        '<a class="readmore" href="'. get_permalink() .'">Continue Reading</a>',
        $content
    );
}
add_filter('the_excerpt', 'new_excerpt_more');
//------------------------------------------------



// Custom Password Protected Page Message
//------------------------------------------------
function my_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<div class="row collapse"><div class="large-5 large-centered medium-12 small-12 columns"><div class="panel"><form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    ' . __( "<h4 class='text-center'>To view this page, enter the password below:</h4>" ) . '
    <label class="text-center" for="' . $label . '">' . __( "Password:" ) . ' </label><input placeholder="enter password here" name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" /><p class="text-center"><input type="submit" class="button secondary" name="Submit" value="' . esc_attr__( "Access Page" ) . '" /></p>
    </form></div></div></div>
    ';
    return $o;
}
add_filter( 'the_password_form', 'my_password_form' );

//------------------------------------------------

// Filter to remove "Protected:" from pw protected page titles
//------------------------------------------------
add_filter('protected_title_format', 'blank');
function blank($title) {
       return '%s';
}
add_filter( 'private_title_format', 'our_private_title_format' );
function our_private_title_format( $format ) {
    return 'Dashboard only';
}
//------------------------------------------------






// Filter to hide protected posts from search and archive pages
//------------------------------------------------
function exclude_protected($where) {
    global $wpdb;
    return $where .= " AND {$wpdb->posts}.post_password = '' ";
}

// Decide where to display them
function exclude_protected_action($query) {
    if( !is_single() && !is_page() && !is_admin() ) {
        add_filter( 'posts_where', 'exclude_protected' );
    }
}

// Action to queue the filter at the right time
add_action('pre_get_posts', 'exclude_protected_action');

//------------------------------------------------




// Disable WP from adding garbage to html
//------------------------------------------------
//remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether
remove_filter('the_content', 'wpautop'); // Remove content HTML auto formatting
remove_filter('comment_text', 'wpautop'); // Remove comment text auto formatting
remove_filter('the_title', 'wpautop'); // Remove h1 auto formatting
//------------------------------------------------








// Enable SVG filetype to be uploaded to media library
//------------------------------------------------
add_filter('upload_mimes', 'my_upload_mimes');

function my_upload_mimes($mimes = array()) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
//------------------------------------------------








// Remove thumbnail width and height dimensions that prevent responsive images for the_thumbnail
//------------------------------------------------
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
//------------------------------------------------



// Stop images from being wrapped in <p> tags
//------------------------------------------------
function filter_ptags_on_images($content){
 return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');
//------------------------------------------------






// add more buttons to the html (text) editor
//------------------------------------------------
function vroom_add_quicktags() {
    if (wp_script_is('quicktags')){
?>
    <script type="text/javascript">
    QTags.addButton( 'eg_paragraph', 'p', '<p>', '</p>', 'p', 'Paragraph tag', 1 );
    QTags.addButton( 'eg_hr', 'hr', '<hr />', '', 'h', 'Horizontal rule line', 201 );
    QTags.addButton( 'eg_pre', 'pre', '<pre lang="php">', '</pre>', 'q', 'Preformatted text tag', 111 );
    </script>
<?php
    }
}
add_action( 'admin_print_footer_scripts', 'vroom_add_quicktags' );
//------------------------------------------------







// Add page slug to body class
//------------------------------------------------
function add_slug_body_class( $classes ) {
  global $post;
  if ( isset( $post ) ) {
  $classes[] = $post->post_type . '-' . $post->post_name;
  }
  return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' ); // Add slug to body class (Starkers build)
//------------------------------------------------





// Add single post category to body class
//------------------------------------------------
add_filter('body_class','add_category_to_single');
function add_category_to_single($classes) {
        if (is_single() ) {
                global $post;
                foreach((get_the_category($post->ID)) as $category) {
                        $classes[] = 'category-'.$category->category_nicename;
                }
        }
        return $classes;
}
//------------------------------------------------


// enable page excerpts for pages
//------------------------------------------------
add_action('init', 'my_custom_init');
function my_custom_init() {
    add_post_type_support( 'page', 'excerpt' );
}
//------------------------------------------------




// Shortcode to cloak mailto:email address links
//------------------------------------------------
function antispambot_sc( $atts ) {
    extract( shortcode_atts( array(
        'email' => ''
    ), $atts ) );
    return antispambot( $email );
}
add_shortcode( 'antispambot', 'antispambot_sc' );
// Usage: [antispambot email="my.cloaked.email.address@gmail.com"]
//------------------------------------------------




// CUSTOM LOGIN PAGE FILTERS
//------------------------------------------------
function the_login_message( $message ) {
    if ( empty($message) ){
        return "<p style='text-align:center; color: #000;'><small>Handcrafted by Vroom</small></p>";
    } else {
        return $message;
    }
}
add_filter( 'login_message', 'the_login_message' );


function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background:url('.get_bloginfo('template_directory').'/img/vroomLogotype.svg) center no-repeat !important; min-width:280px; width:100%; max-height: 104px !important;}
    </style>';
}
add_action('login_head', 'my_custom_login_logo');


function the_url( $url ) {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'the_url' );

function my_login_stylesheet() { ?>
    <link rel="stylesheet" id="custom_wp_admin_css"  href="<?php echo get_bloginfo( 'template_directory' ) . '/css/style-login.css'; ?>" type="text/css" media="all" />
<?php }
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );


//------------------------------------------------
// END CUSTOM LOGIN PAGE FILTERS





// Add Custom Class to Prev/Next Post Links
//------------------------------------------------
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="button"';
}
//------------------------------------------------
// END Add Custom Class to Prev/Next Post Links





// Make a new default gravatar available on the dashboard
//------------------------------------------------
/*
function newgravatar ($avatar_defaults) {
    $myavatar = get_bloginfo('template_directory') . '/img/vroomAvatar.png';
    $avatar_defaults[$myavatar] = "Vroom Default";
return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'newgravatar' );
*/
//------------------------------------------------





// Breadcrumbs Nav
//------------------------------------------------
function write_breadcrumb() {
    $pid = $post->ID;
    $trail = '<a href="/">'. __('Home', 'textdomain') .'</a>';

    if (is_front_page()) {
        // do nothing
    }
    elseif (is_page()) {
        $bcarray = array();
        $pdata = get_post($pid);
        $bcarray[] = ' &raquo; '.$pdata->post_title."\n";
    while ($pdata->post_parent) {
        $pdata = get_post($pdata->post_parent);
        $bcarray[] = ' &raquo; <a href="'.get_permalink($pdata->ID).'">'.$pdata->post_title.'</a>';
    }
    $bcarray = array_reverse($bcarray);
        foreach ($bcarray AS $listitem) {
            $trail .= $listitem;
        }
    }
    elseif (is_single()) {
        $pdata = get_the_category($pid);
        $adata = get_post($pid);
        if(!empty($pdata)){
            $data = get_category_parents($pdata[0]->cat_ID, TRUE, ' &raquo; ');
            $trail .= " &raquo; ".substr($data,0,-8);
        }
        $trail.= ' &raquo; '.$adata->post_title."\n";
    }
    elseif (is_category()) {
        $pdata = get_the_category($pid);
        $data = get_category_parents($pdata[0]->cat_ID, TRUE, ' &raquo; ');
        if(!empty($pdata)){
            $trail .= " &raquo; ".substr($data,0,-8);
        }
   }
    $trail.="";
    return $trail;
}
/*=============================================
=            USE IN THEME WITH                =
=============================================*/

/*
<?php if (function_exists('write_breadcrumb')) {
echo '<div class="breadcrumb">';
echo write_breadcrumb();
echo '</div><!-- .breadcrumb -->';
} ?>

//------------------------------------------------*/





// Remove WP Generated Shit from <head>
//------------------------------------------------
function vroom_remove_version() {
return '';
}
add_filter('the_generator', 'vroom_remove_version');

// remove RSD LINK
remove_action ('wp_head', 'rsd_link');
// remove WLWMANIFEST LINK
remove_action( 'wp_head', 'wlwmanifest_link');

// Remove auto generated feed links
function vroom_remove_feeds() {
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    remove_action( 'wp_head', 'feed_links', 2 );
}
add_action( 'after_setup_theme', 'vroom_remove_feeds' );
//------------------------------------------------
// END Remove WP Generated Shit from <head>



// Disable stupid ass wp-emoji code from being inserted into <head>
//------------------------------------------------
function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis - Uncomment if using TinyMCE for custom editor interface
  // add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );
//------------------------------------------------*/
// END Disable stupid ass wp-emoji code from being inserted into <head>




// Remove generated classes and ids from wp_nav_menu <li>'s but keep current-menu-item class for current page
//------------------------------------------------
add_filter('nav_menu_css_class', 'vroom_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'vroom_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'vroom_css_attributes_filter', 100, 1);
function vroom_css_attributes_filter($var) {
  return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}
//------------------------------------------------*/
// END Remove generated classes and ids from wp_nav_menu <li>'s but keep current-menu-item class for current page


    









/**
 *
 * Vroom Theme Customizations BELOW
 *
 */


// Create range slider field for project budget field of RFP form
//------------------------------------------------
add_filter('frm_field_type', 'change_my_field_type', 10, 2);
function change_my_field_type($type, $field){
  if ( in_array ( $field->id, array(92) ) ) { //change 25 and 26 to the ids of the fields to change
    if(!is_admin() and $field->type != 'hidden')
      $type = 'range'; //convert to a slider
  }
  return $type;
}





?>