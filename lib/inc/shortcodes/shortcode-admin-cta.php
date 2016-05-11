<?php

// Populate the shortcode form
add_filter('corona_shortcode_form', 'corona_add_cta_form', 10, 1 );
function corona_add_cta_form( $shortcode_form ) {

	$shortcode_form['cta'] = corona_shortcode_form_add_text( 'image_id', 'Image attachment id' );
	//$shortcode_form['cta']  = corona_shortcode_form_add_select('image_size', 'Image size', 'corona_load_media_lib' );
	$shortcode_form['cta'] .= corona_shortcode_form_add_text( 'text', 'Text');
	$shortcode_form['cta'] .= corona_shortcode_form_add_checkbox( 'button', 'Show button');
	$shortcode_form['cta'] .= corona_shortcode_form_add_text( 'button_link', 'Button link');
	$shortcode_form['cta'] .= corona_shortcode_form_add_text( 'button_label', 'Button label');

    return $shortcode_form;
}

function corona_load_media_lib() {
}
