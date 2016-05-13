<?php

/**
  * Corona Filter Hooks
  *
  * @since Corona 2.0
  * @package WordPress
  * @subpackage corona
  */




/**
  * Filters the output of the_header_image_tag output to make it a relative path.
  *
  * Enables the display of the header image regardless of the mapped domain.
  *
  * @package Wordpress
  * @subpackage corona
  * @since Corona 2.0
  */

function corona_get_header_image_tag($html, $header, $attr) {
	$header = get_custom_header();

	if ( empty( $header->url ) ) {
		return '';
	}

	// Get relative path
	$path = corona_get_relative_url( $header->url );
	$width = absint( $header->width );
	$height = absint( $header->height );

	// Set src to relative path since domain mapper doesn't work here
	$attr = array(
		'src' => $path,
	);

	$attr = wp_parse_args(
		$attr,
		array(
			'src' => $header->src,
			'width' => $width,
			'height' => $height,
			'alt' => get_bloginfo( 'name' ),
		)
	);

	// Generate 'srcset' and 'sizes' if not already present. NOTE: Domain mapper maps srcset correctly, so we leave it as is
	if ( empty( $attr['srcset'] ) && ! empty( $header->attachment_id ) ) {
		$image_meta = get_post_meta( $header->attachment_id, '_wp_attachment_metadata', true );
		$size_array = array( $width, $height );

		if ( is_array( $image_meta ) ) {
			$srcset = wp_calculate_image_srcset( $size_array, $header->url, $image_meta, $header->attachment_id );
			$sizes = ! empty( $attr['sizes'] ) ? $attr['sizes'] : wp_calculate_image_sizes( $size_array, $header->url, $image_meta, $header->attachment_id );

			if ( $srcset && $sizes ) {
				$attr['srcset'] = $srcset;
				$attr['sizes'] = $sizes;
			}
		}
	}

	$attr = array_map( 'esc_attr', $attr );
	$html = '<img';

	foreach ( $attr as $name => $value ) {
		$html .= ' ' . $name . '="' . $value . '"';
	}

	$html .= ' />';

	return $html;
}

add_filter( 'get_header_image_tag', 'corona_get_header_image_tag', 10, 3 );




/**
  * Filters the output of the_excerpt() 'Read More'
  *
  * @package Wordpress
  * @subpackage corona
  * @since Corona 2.0
  */

function corona_excerpt_read_more( $more ) {
	global $post;

	return ' &hellip; <a class="read-more" href="">Read More&nbsp;&raquo; </a>';
}

add_filter( 'excerpt_more', 'corona_excerpt_read_more' );
