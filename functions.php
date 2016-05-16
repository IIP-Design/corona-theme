<?php
/**
	* Initialize Corona
	*
  * @package Wordpress
	* @subpackage corona
	* @since 2.0
  */




/**
	* Get the theme version from version.json
	* Has to happen before Corona is initialized
	*
	* @param string - path to file
	* @return string - version number
	*
	* @package Wordpress
	* @subpackage corona
	* @since Corona 2.0
	*/

function corona_get_theme_version( $file ) {
	if ( $file == '') {
		return;
	}

	$contents = file_get_contents( $file );

	$json = json_decode($contents, true);
	$version = $json['version'];

	// remove the extra quote around the version number required by sass
	$version = substr($version, 1, -1);

	return $version;
}

add_action( 'corona_pre_init', 'corona_get_theme_version', 1, 1 );




/**
	* Initialize Corona
	*/

require_once( dirname( __FILE__ ) . '/lib/init.php' );
