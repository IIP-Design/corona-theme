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



/**
	* Corona's modified version of Wordpress Core's `get_template_part`. The main
	* difference being that it returns the `templates` array instead of loading the
	* template.
	*
	* @param string $slug - The slug name for the generic template.
	* @param string $name - The name of the specialized template.
	*
	* @return array $templates - Returns the array of template partials
	*
	* @since 2.5.0
	*/

function corona_get_template_part( $slug, $name ) {
	$templates = array();
  $name = (string) $name;

  if ( '' !== $name )
      $templates[] = "{$slug}-{$name}.php";

  $templates[] = "{$slug}.php";

	return $templates;
}




/**
	* Loop through an array of templates. Try to load a custom location first.
	* If found, break out of the loop. Otherwise, use Wordpress's core
	* `locate_template` function.
	*
	* @param array $templates - An array of absolute template paths
	*
	* @see https://developer.wordpress.org/reference/functions/locate_template/
	*
	* @return array $templates - An unmutated copy of the passed $template array
	*
	* @since 2.5.0
	*/

function corona_load_template( $templates ) {
	foreach ( $templates as $template ) {
		if ( is_readable( $template ) ) {
			load_template( $template, false );
			break;
		} else {
			locate_template( $templates, true, false );
			break;
		}
	}

	return $templates;
}




/**
	* A flexible template loader.
	*
	* @param array $templates - A list of templates to load
	* @param string $post_type - Useful if you want to do something, like load a
	*                            template, coniditonally for a post_type
	*
	* @since 2.5.0
	*/

function corona_template_loader( $templates, $post_type ) {
  if ( has_filter( 'corona_loop_template' ) ) {
    $templates = apply_filters( 'corona_loop_template', $templates, $post_type );
	}

	corona_load_template( $templates );
}
