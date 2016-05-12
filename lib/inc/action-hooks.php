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
  * Insert Primary Menu
  *
  * @package Wordpress
  * @subpackage corona
  * @since Corona 2.0
  */

function corona_get_nav_primary() {
  do_action( 'corona_get_nav_primary' );
}




/**
  * Insert Secondary Menu
  *
  * @package Wordpress
  * @subpackage corona
  * @since Corona 2.0
  */

function corona_get_nav_secondary() {
  do_action( 'corona_get_nav_secondary' );
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
