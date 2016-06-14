<?php
/**
  * Corona Menus
  *
  * @package WordPress
  * @subpackage corona
  * @since Corona 2.0
  */




/**
  * Corona's primary and secondary menus
  *
  * @package WordPress
  * @subpackage corona
  * @since Corona 2.0
  */

function corona_menus( $menu ) {
  if ( $menu === 'primary' ) :
    $args = array(
      'theme_location'	=> 'primary',
      'menu_id'			=> 'menu-primary',
      'menu_class'		=> 'menu nav-menu menu-primary',
      'container_class' 	=> 'wrap',
    );

    wp_nav_menu( $args );
  endif;

  if ($menu === 'secondary' ) :
    $args = array(
      'theme_location'	=> 'secondary',
      'menu_id'			=> 'menu-secondary',
      'menu_class'		=> 'menu nav-menu menu-secondary',
      'container_class' 	=> 'wrap',
      'fallback_cb'    	=> ''
    );

    wp_nav_menu( $args );
  endif;
}

add_action( 'corona_get_menu', 'corona_menus', 10, 1 );
