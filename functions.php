<?php
/**
 * Resolution Athens functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Resolution_Athens
 */

if ( ! function_exists( 'resolutionathens_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function resolutionathens_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Resolution Athens, use a find and replace
	 * to change 'resolutionathens' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'resolutionathens', get_template_directory() . '/languages' );

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

	// Custom image sizes
	add_image_size( 'two-column-thumb', 360, 360, true ); // 360px X 360px cropped
	add_image_size( 'three-column-thumb', 220, 220, true ); // 220px X 220px cropped
	add_image_size( 'sidebar-promo', 280, 280 ); // max width 280px, max height 280px
	add_image_size( 'store-item', 320, 320, true ); // 320px X 320px cropped

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'resolutionathens' ),
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
}
endif;
add_action( 'after_setup_theme', 'resolutionathens_setup' );

// Cleanup Header
function resolutionathens_cleanup_header(){
	remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
	remove_action('wp_head', 'wp_generator'); // remove wordpress version
	add_filter('the_generator', '__return_false');
	remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links
	remove_action('wp_head', 'index_rel_link'); // remove link to index page
	remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml
	remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
	remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 ); // remove shortlink
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );  // remove emoji support
	remove_action( 'wp_print_styles', 'print_emoji_styles' ); // remove emoji support
}
add_action('init', 'resolutionathens_cleanup_header');

// Disable Emoji
function resolutionathens_disable_emoji() {
    wp_dequeue_script( 'emoji' );
}
add_action( 'wp_print_scripts', 'resolutionathens_disable_emoji', 100 );

// Make custom image size selectable in backend
function resolutionathens_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'two-column-thumb' => __( 'Two Column Thumbnail' ),
        'three-column-thumb' => __( 'Three Column Thumbnail' ),
        'sidebar-promo' => __( 'Sidebar Promo' ),
        'store-item' => __( 'Store Item' ),
    ) );
}
add_filter( 'image_size_names_choose', 'resolutionathens_sizes' );

//  Default image attachment settings
function resolutionathens_media_attach() {
	$image_align = get_option( 'image_default_align' );
	$image_link_type = get_option('image_default_link_type');
	$image_size = get_option('image_default_size');
	if ($image_align !== 'center') {
		update_option('image_default_align', 'center');
	}
	if ($image_link_type !== 'none') {
		update_option('image_default_link_type', 'none');
	}
	if ($image_size !== 'medium') {
		update_option('image_default_size', 'medium');
	}
}
add_action('admin_init', 'resolutionathens_media_attach', 10);

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function resolutionathens_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'resolutionathens_content_width', 640 );
}
add_action( 'after_setup_theme', 'resolutionathens_content_width', 0 );

// Change excerpt length
function resolutionathens_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'resolutionathens_excerpt_length', 999 );

// Custom Read More link for excerpt
function resolutionathens_excerpt_more( $more ) {
	if(is_front_page()){
		return '... <a href="'.get_the_permalink().'" class="read-more">More &gt;</a>';
	}
	else{
		return '... <span class="read-more">More &gt;</span>';
	}
}
add_filter( 'excerpt_more', 'resolutionathens_excerpt_more' );

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();

}

/**
 * Enqueue scripts and styles.
 */
function resolutionathens_scripts() {
	wp_enqueue_style( 'resolutionathens-style', get_stylesheet_uri() );

	wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Roboto:400,500|Merriweather:300,400');

	wp_enqueue_script('custom-head', get_template_directory_uri() . '/js/custom-head.min.js', array(), false, false);
	wp_enqueue_script('custom-body', get_template_directory_uri() . '/js/custom-body.min.js', array('jquery'), false, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'resolutionathens_scripts' );

/**
 * Shortcodes
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
