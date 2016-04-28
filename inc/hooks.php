<?php

/**
  * Corona Hooks
  *
  * @since Corona 1.1
  * @package WordPress
  * @subpackage corona
  */


/**
  * Google Tag Manager - Allows for the easy insertion of the GTM code
  *
  * @since Corona 1.0
  * @package WordPress
  * @subpackage corona
  * @example https://github.com/USStateDept/ylai-theme/blob/master/functions.php#L24
  * @see header.php
  */

function google_tag_manager() {
  do_action( 'google_tag_manager' );
}


/**
  * Posted on - Change or remove the byline, a.k.a. "Posted on"
  *
  * @since Corona 1.1
  * @package WordPress
  * @subpackage corona
  * @see inc/template-tags.php
  */

function corona_posted_on() {
  do_action( 'corona_posted_on' );
}
