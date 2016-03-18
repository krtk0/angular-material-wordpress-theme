<?php
/**
 * angular-material-theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package angular-material-theme
 */

require_once get_template_directory().'/class/class_theme_customizer.php';
require_once get_template_directory().'/class/class_utility.php';

$utility = new \angular\theme\utility();

if ( ! function_exists( 'angular_material_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function angular_material_setup() {

	/*
	 * Add Redux Framework
	 */
	require get_template_directory() . '/admin/admin-init.php';

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on angular-material-theme, use a find and replace
	 * to change 'angular-material' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'angular-material', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'angular-material' ),
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
	add_theme_support( 'custom-background', apply_filters( 'angular_material_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	new \angular\theme\themeCustomizer();
}
endif; // angular_material_setup
add_action( 'after_setup_theme', 'angular_material_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function angular_material_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'angular_material_content_width', 640 );
}
add_action( 'after_setup_theme', 'angular_material_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function angular_material_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'angular-material' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'angular_material_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function angular_material_scripts() {
	wp_enqueue_style( 'angular-material-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'angular_material_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 *
 */
register_nav_menus( array(
	'primary' => 'Primary Header Menu',
	'footer_menu' => 'My Custom Footer Menu',
) );