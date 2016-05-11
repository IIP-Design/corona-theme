<?php

function corona_get_relative_url($path) {
	$parsed = parse_url( $url );
	return $parsed['path'];
}
