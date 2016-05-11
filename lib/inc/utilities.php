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
