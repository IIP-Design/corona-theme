<?php

/**
  * Enqueue theme CSS files
  * 
  * @package Wordpress
  * @subpackage corona
  * @since Corona 2.0
  */

function corona_styles() {
	wp_enqueue_style( 'corona-style', get_stylesheet_uri(), array(), THEME_VERSION, 'all' );
}

add_action( 'wp_enqueue_scripts', 'corona_styles' );
