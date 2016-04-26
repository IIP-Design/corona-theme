<?php


// Populate the shortcode form
add_filter('corona_shortcode_form', 'corona_add_post_list_form', 10, 1 );
function corona_add_post_list_form( $shortcode_form ) {

	$shortcode_form['post-list']  = corona_shortcode_form_add_select('posts_cat', 'Category', 'corona_get_categories' );
    $shortcode_form['post-list'] .= corona_shortcode_form_add_number( 'posts_num', 'Number of posts');
    $shortcode_form['post-list'] .= corona_shortcode_form_add_checkbox( 'show_image', 'Show image');
    //$shortcode_form['post-list'] .= corona_shortcode_form_add_select('image_size', 'Image size', 'corona_get_image_sizes' );
    //$shortcode_form['post-list'] .= corona_shortcode_form_add_select('image_alignment', 'Image alignment', 'corona_get_image_alignment' );
    $shortcode_form['post-list'] .= corona_shortcode_form_add_checkbox( 'show_title', 'Show post title');
    $shortcode_form['post-list'] .= corona_shortcode_form_add_checkbox( 'show_byline', 'Show byline');
    //$shortcode_form['post-list'] .= corona_shortcode_form_add_text( 'post_info', 'Show post info');
    $shortcode_form['post-list'] .= corona_shortcode_form_add_select('show_content', 'Content to show', 'corona_get_content_format' );
    $shortcode_form['post-list'] .= corona_shortcode_form_add_number( 'content_limit', 'Number of words');
    $shortcode_form['post-list'] .= corona_shortcode_form_add_checkbox( 'more_text_from_post', 'Show more text link');
    $shortcode_form['post-list'] .= corona_shortcode_form_add_text( 'more_text', 'More text', 'Read More...');

    return $shortcode_form;
}

function corona_get_categories() {
	$args = array(
		'orderby' => 'name',
		'order' => 'ASC',
		'hide_empty' => 0
 	);
	
	$cats = get_categories();
	$arr = [];
	$arr[] = array( '' => 'All categories' );
	foreach( $cats as $cat ) {
		$arr[] = array( $cat->slug => $cat->name );
	}
 	return $arr;
}

function corona_get_image_sizes() {
	$arr = [];
	$arr[] = array (
		'' => '',
		'thumbnail' => 'Featured image'
	);
	return $arr;
}

function corona_get_image_alignment() {
	$arr = [];
	$arr[] = array (
		'' => '',
		'left' => 'Left',
		'center' => 'Center',
		'right' => 'Right'
	);
	return $arr;
}

function corona_get_content_format() {
	$arr = [];
	$arr[] = array (
		'' => '',
		'excerpt' => 'Excerpt',
		'content' => 'Content',
		'content-limit' => 'Content limit'
	);
	return $arr;
}