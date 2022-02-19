<?php
/**
 * _s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

if ( ! defined( 'redesigned_giggle_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'redesigned_giggle_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function redesigned_giggle_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on _s, use a find and replace
		* to change 'redesigned-giggle' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'redesigned-giggle', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'redesigned-giggle' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'redesigned_giggle_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'redesigned_giggle_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function redesigned_giggle_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'redesigned_giggle_content_width', 640 );
}
add_action( 'after_setup_theme', 'redesigned_giggle_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function redesigned_giggle_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'redesigned-giggle' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'redesigned-giggle' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'redesigned_giggle_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function redesigned_giggle_scripts() {
	wp_enqueue_style( '_s-style', get_stylesheet_uri(), array(), redesigned_giggle_VERSION );
	wp_style_add_data( '_s-style', 'rtl', 'replace' );

	wp_enqueue_script( '_s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), redesigned_giggle_VERSION, true );
	// wp_enqueue_style( 'ionicons', get_stylesheet_directory_uri() . '/ionicons/ionicons.min.css');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'redesigned_giggle_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Load Options Pages file.
 */
require get_template_directory() . '/inc/options-pages/options-pages.php';

// Choose which forms to support
require_once get_template_directory() . '/inc/theme-functions/form-select.php';

/**
 * Load Active gutenburg blocks file.
 */
require get_template_directory() . '/inc/active-blocks.php';

/**
 * Load custom acf blocks file.
 */
require get_template_directory() . '/inc/blocks.php';

/**
 * Load custom gutenberg block categories file.
 */
require get_template_directory() . '/inc/block-categories.php';

/**
 * Load custom post types.
 */
require get_template_directory() . '/inc/post-types.php';

//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

// Update search button classes in form
function as_adapt_search_form( $form ) {
    $form = str_replace(
        'search-submit',
        'search-submit action action--primary',
        $form
    );

    return $form;
}

add_filter( 'get_search_form', 'as_adapt_search_form' );

add_action( 'enqueue_block_assets', 'myplugin_enqueue_if_block_is_present' ); // Can only be loaded in the footer

function myplugin_enqueue_if_block_is_present(){

    if ( has_block( 'acf/banner' ) ) {
        wp_enqueue_script( 'swiperjs', get_stylesheet_directory_uri() . '/js/swiper-bundle.min.js', array( 'jquery' ) );
		wp_enqueue_style( 'swipercss', get_stylesheet_directory_uri() . '/js/swiper-bundle.min.css');
    }
}
function wpdocs_scripts_method() {
    wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/js/scripts.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_scripts_method' );

// block editor styles
add_action( 'enqueue_block_editor_assets', function() {
	wp_enqueue_script( 'swiperjs', get_stylesheet_directory_uri() . '/js/swiper-bundle.min.js', array( 'jquery' ) );
	wp_enqueue_style( 'swipercss', get_stylesheet_directory_uri() . '/js/swiper-bundle.min.css');
    wp_enqueue_style( 'editor-styles', get_stylesheet_directory_uri() . "/style.css", false, '1.0', 'all' );
    wp_enqueue_style( 'editor-styles-vars', get_stylesheet_directory_uri() . "/editor.css", false, '1.0', 'all' );
} );
add_action('wp_enqueue_scripts','enqueue_if_block_is_present_accordion');

/**
 * Handle image sizes.
 */
require get_template_directory() . '/inc/image-sizes.php';

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function redesigned_giggle_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'redesigned_giggle_custom_excerpt_length', 999 );

function redesigned_giggle_new_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'redesigned_giggle_new_excerpt_more');

// Max tags to show
add_filter('term_links-post_tag','limit_to_five_tags');
function limit_to_five_tags($terms) {
	$totalTerms = count($terms);
	$termsArray = array_slice($terms,0,4,true);
	return $termsArray;
}

function my_acf_init() {
	acf_update_setting('google_api_key', get_field('maps_api_key', 'option'));
}

add_action('acf/init', 'my_acf_init');

// Remove archives title prefix
add_filter('get_the_archive_title_prefix','__return_false');

require_once dirname(__FILE__).'/vendor/autoload.php';

