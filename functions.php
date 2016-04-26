<?php
/**
 * corona functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package corona
 */

define( 'TEMPLATE_DIR', get_template_directory() );
/**
 * Implement the Custom Header feature.
 */
require TEMPLATE_DIR . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require TEMPLATE_DIR . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require TEMPLATE_DIR . '/inc/extras.php';

/**
 * Customizer additions.
 */
require TEMPLATE_DIR . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require TEMPLATE_DIR . '/inc/jetpack.php';

/**
 * Load base widgets.
 */
//require TEMPLATE_DIR . '/inc/widgets/class-corona-widget-post-list.php';

/**
 * Load base shortcodes.
 */
require TEMPLATE_DIR . '/inc/shortcodes/shortcode-admin.php';
require TEMPLATE_DIR . '/inc/shortcodes/class-corona-shortcode-post.php';
require TEMPLATE_DIR . '/inc/shortcodes/class-corona-shortcode-post-list.php';
require TEMPLATE_DIR . '/inc/shortcodes/class-corona-shortcode-cta.php';

/**
 * Initialization
 */
if ( ! function_exists( 'corona_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function corona_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on corona, use a find and replace
	 * to change 'corona' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'corona', get_template_directory() . '/languages' );

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

	add_theme_support( 'menus' );

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
	add_theme_support( 'custom-background', apply_filters( 'corona_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

		// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'Primary navigation' ),
		'secondary' => esc_html__( 'Secondary', 'Secondary navigation' )
	) );

}
endif;
add_action( 'after_setup_theme', 'corona_setup' );

set_post_thumbnail_size( 300, 225, true );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function corona_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'corona_content_width', 640 );
}
add_action( 'after_setup_theme', 'corona_content_width', 0 );

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function corona_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Header Right', 'corona' ),
		'id'            => 'header-right',
		'description'   => esc_html__( 'This is the header widget area. It typically appears next to the site title or logo.', 'corona' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'corona' ),
		'id'            => 'sidebar-primary',
		'description'   => esc_html__( 'Add widgets here.', 'corona' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Secondary Sidebar', 'corona' ),
		'id'            => 'sidebar-secondary',
		'description'   => esc_html__( 'Add widgets here.', 'corona' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'corona' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'corona' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'corona' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'corona' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );
}
add_action( 'widgets_init', 'corona_widgets_init' );


/**
 * Register widgets.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function corona_register_widgets() {
	register_widget( 'Corona_Post_List' );
}
//add_action( 'widgets_init', 'corona_register_widgets' );

// Enable the use of shortcodes in text widgets.
add_filter( 'widget_text', 'do_shortcode' );

/**
 * Enqueue scripts and styles.
 */
function corona_scripts() {
	wp_enqueue_style( 'corona-style', get_stylesheet_uri() );
	wp_enqueue_script( 'corona-js', get_template_directory_uri() . '/js/dist/script.js', array(), '20160414', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'corona_scripts' );


