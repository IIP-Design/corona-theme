<?php

/**
  * Initialize everything, and keep the functions.php file clean.
  *
  * @package Wordpress
  * @subpackage corona
  * @since Corona 2.0
  */


/**
  * Provide a hook for child themes to run before theme initialization
  */

do_action( 'corona_pre_init' );




/**
  * Define Corona's constants
  */

function corona_set_constants() {
  $constants = array(
    'TEMPLATE_DIR' => get_template_directory(),
    'CORONA_THEME_VERSION' => corona_get_theme_version( get_template_directory() . '/version.json' ),
  );

  if ( has_filter( 'corona_add_constants' ) ) {
    $constants = apply_filters( 'corona_add_constants', $constants );
  }

  foreach ( $constants as $key => $value ) {
    define ( $key, $value );
  }
}

add_action( 'corona_init', 'corona_set_constants' );




/**
  * Define Corona textdomain
  */

function corona_textdomain() {
	load_theme_textdomain( 'corona', TEMPLATE_DIR . '/lib/languages' );
}

add_action( 'corona_init', 'corona_textdomain' );




/**
  * Activate theme support for Wordpress features
  */

function corona_theme_support() {
	add_theme_support( 'menus' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5',
    array(
  		'search-form',
  		'comment-form',
  		'comment-list',
  		'gallery',
  		'caption',
  	)
  );
	add_theme_support( 'post-formats',
    array(
  		'aside',
  		'image',
  		'video',
      'audio',
  	)
  );
	add_theme_support( 'custom-background',
    apply_filters( 'corona_custom_background_args',
      array(
    		'default-color' => 'ffffff',
    		'default-image' => '',
    	)
    )
  );
}

add_action( 'corona_init', 'corona_theme_support' );




/**
  * Corona require statements
  */

function corona_require() {
  require_once TEMPLATE_DIR . '/lib/inc/utilities.php';
  require_once TEMPLATE_DIR . '/lib/inc/loop.php';
  require_once TEMPLATE_DIR . '/lib/inc/action-hooks.php';
  require_once TEMPLATE_DIR . '/lib/inc/filter-hooks.php';
  require_once TEMPLATE_DIR . '/lib/inc/theme-hook-alliance/tha-theme-hooks.php';
  require_once TEMPLATE_DIR . '/lib/inc/enqueue-scripts.php';
  require_once TEMPLATE_DIR . '/lib/inc/enqueue-styles.php';
  require_once TEMPLATE_DIR . '/lib/inc/widgets.php';
  require_once TEMPLATE_DIR . '/lib/inc/customizer.php';
  require_once TEMPLATE_DIR . '/lib/inc/custom-header.php';
  require_once TEMPLATE_DIR . '/lib/inc/shortcodes/class-corona-shortcode-post.php';
  require_once TEMPLATE_DIR . '/lib/inc/shortcodes/class-corona-shortcode-post-list.php';
  require_once TEMPLATE_DIR . '/lib/inc/shortcodes/class-corona-shortcode-cta.php';
  require_once TEMPLATE_DIR . '/lib/inc/template-tags.php';
  require_once TEMPLATE_DIR . '/lib/inc/menus.php';

  if( is_admin() ) {
     require_once TEMPLATE_DIR . '/lib/admin/class-tinymce-btn-shortcode.php';
  }
}

add_action( 'corona_init', 'corona_require' );


/**
  * Corona nav menus
  */

function corona_init_menus() {
	register_nav_menus(
    array(
  		'primary' => esc_html__( 'Primary', 'Primary navigation' ),
  		'secondary' => esc_html__( 'Secondary', 'Secondary navigation' )
  	)
  );
}

add_action( 'corona_init', 'corona_init_menus' );




/**
  * Set the maximum allowed width for content within posts e.g. oEmbeds and images.
  *
  * This can override widths specified via add_image_sizes(). See the
  * link below for more information.
  *
  * @global int $content_width
  * @link https://codex.wordpress.org/Content_Width
  */

function corona_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'corona_content_width', 640 );
}

add_action( 'corona_init', 'corona_content_width' );



/**
  * Finally, run corona_init
  */

do_action( 'corona_init' );
