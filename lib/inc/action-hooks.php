<?php

/**
  * Corona Action Hooks
  *
  * @package WordPress
  * @subpackage corona
  * @since Corona 2.0
  */




/**
  * Posted on - Change or remove the byline, a.k.a. "Posted on"
  *
  * @package WordPress
  * @subpackage corona
  * @since Corona 1.1
  * @see lib/inc/template-tags.php
  */

function corona_posted_on() {
  do_action( 'corona_posted_on' );
}




/**
  * Insert Menu
  *
  * @package Wordpress
  * @subpackage corona
  * @since Corona 2.0
  */

function corona_get_menu( $menu ) {
  $menus = get_registered_nav_menus();

  if ( in_array( $menu, $menus ) === 0 ):
    return;
  endif;

  foreach ( $menus as $location => $description ) :

    if ( $menu == $location ) :
      do_action( 'corona_get_menu', $menu );
    endif;

  endforeach;
}




/**
  * Hook before Corona's Secondary Sidebar
  *
  * @package Wordpress
  * @subpackage corona
  * @since Corona 2.0
  */

function corona_sidebar_secondary_top() {
  do_action( 'corona_sidebar_secondary_top' );
}




/**
  * Hook after Corona's Secondary Sidebar
  *
  * @package Wordpress
  * @subpackage corona
  * @since Corona 2.0
  */

function corona_sidebar_secondary_bottom() {
  do_action( 'corona_sidebar_secondary_bottom' );
}




/**
  * Hook before Corona's top menus
  *
  * @package Wordpress
  * @subpackage corona
  * @since Corona 2.0
  */

function corona_menu_before() {
  do_action( 'corona_menu_before' );
}




/**
  * Hook after Corona's top menus
  *
  * @package Wordpress
  * @subpackage corona
  * @since Corona 2.0
  */

function corona_menu_after() {
  do_action( 'corona_menu_after' );
}




/**
  * Hook at the top of a Corona menu
  *
  * @param string - Name of the menu
  *
  * @package Wordpress
  * @subpackage corona
  * @since Corona 2.0
  */

function corona_menu_top( $menu ) {
  $menus = get_registered_nav_menus();

  if ( in_array( $menu, $menus ) === 0 ):
    return;
  endif;

  foreach ( $menus as $location => $description ) :

    if ( $menu == $location ) :
      do_action( 'corona_menu_top', $menu );
    endif;

  endforeach;
}




/**
  * Hook at the bottom of a Corona menu
  *
  * @param string - Name of the menu
  *
  * @package Wordpress
  * @subpackage corona
  * @since Corona 2.0
  */

function corona_menu_bottom( $menu ) {
  $menus = get_registered_nav_menus();

  if ( in_array( $menu, $menus ) === 0 ):
    return;
  endif;

  foreach ( $menus as $location => $description ) :

    if ( $menu == $location ) :
      do_action( 'corona_menu_bottom', $menu );
    endif;

  endforeach;
}
