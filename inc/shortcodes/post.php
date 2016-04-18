<?php

add_shortcode( 'post_date', 'corona_post_date_shortcode' );
function corona_post_date_shortcode( $atts ) {

	$defaults = array(
		'after'  => '',
		'before' => '',
		'format' => get_option( 'date_format' ),
		'label'  => '',
	);

	$atts = shortcode_atts( $defaults, $atts, 'post_date' );

	$display = get_the_time( $atts['format'] );

	$output = sprintf( '<time %s>', 'class="entry-time"' ) . $atts['before'] . $atts['label'] . $display . $atts['after'] . '</time>';
	
	return apply_filters( 'corona_post_date_shortcode', $output, $atts );
}
