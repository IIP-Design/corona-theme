<?php

/**
	* A set of utility functions for use in Corona
	*
	* @package Wordpress
	* @subpackage corona
	* @since Corona 2.0
	*/




/**
	* A simple function that returns a relative url
	*
	* @return relative url
	* @since Corona 2.0
	*/

function corona_get_relative_url($url) {
	$parsed = parse_url( $url );
	return $parsed['path'];
}




/**
	* A simple function that generates an action hook related to menus
	*
	* @since Corona 2.0
	*/

function corona_generate_menu_hook( $menu, $hook ) {
  $menus = get_registered_nav_menus();

  if ( in_array( $menu, $menus ) === 0 ):
    return;
  endif;

  foreach ( $menus as $location => $description ) :

    if ( $menu == $location ) :
      do_action( $hook, $menu );
    endif;

  endforeach;
}
