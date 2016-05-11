<?php

/**
  * Enqueue theme JS files
  *
  * @package Wordpress
  * @subpackage corona
  * @since Corona 2.0
  */

function corona_scripts() {
	wp_enqueue_script( 'corona-js', get_template_directory_uri() . '/js/dist/script.js', array(), CORONA_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'corona_scripts' );
