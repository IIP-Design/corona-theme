<?php
/**
  * Corona Menus
  *
  * @package WordPress
  * @subpackage corona
  * @since Corona 2.0
  */




/**
  * Corona Primary Menu
  *
  * @package WordPress
  * @subpackage corona
  * @since Corona 2.0
  */

function corona_nav_primary() {
  $args = array(
    'theme_location'	=> 'primary',
    'menu_id'			=> 'menu-primary',
    'menu_class'		=> 'menu nav-menu menu-primary',
    'container_class' 	=> 'wrap',
  );

  wp_nav_menu( $args );
}

add_action( 'corona_get_nav_primary', 'corona_nav_primary' );




/**
  * Corona Secondary Menu
  *
  * @package WordPress
  * @subpackage corona
  * @since Corona 2.0
  */

function corona_nav_secondary() {
  $args = array(
    'theme_location'	=> 'secondary',
    'menu_id'			=> 'menu-secondary',
    'menu_class'		=> 'menu nav-menu menu-secondary',
    'container_class' 	=> 'wrap',
    'fallback_cb'    	=> ''
  );

  wp_nav_menu( $args );
}

add_action( 'corona_get_nav_secondary', 'corona_nav_secondary' );
