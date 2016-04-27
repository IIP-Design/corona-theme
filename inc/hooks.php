<?php

/**
  * Corona Hooks
  *
  * @since Corona 1.1
  * @package WordPress
  * @subpackage corona
  */

// See 'header.php'
function google_tag_manager() {
  do_action( 'google_tag_manager' );
}


// See 'inc/template-tags.php'
function corona_posted_on() {
  do_action( 'corona_posted_on' );
}
