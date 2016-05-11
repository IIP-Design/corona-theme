<?php
/**
	* Initialize Corona
	*
  * @package Wordpress
	* @subpackage corona
	* @since 2.0
  */

require_once( dirname( __FILE__ ) . '/lib/init.php' );



/**
  * Replace Customizer header image with a relative path since domain mapper doesn't map it to production
  */
function relative_header_image() {
	$url = get_header_image();
	$parsed = parse_url( $url );
	$path = $parsed['path'];
	echo esc_url( $path );
}
