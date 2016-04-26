<?php

/**
 * Load shortcode forms.
 */
require TEMPLATE_DIR . '/inc/shortcodes/shortcode-admin-post-list.php'; 
require TEMPLATE_DIR . '/inc/shortcodes/shortcode-admin-cta.php'; 

add_action('admin_enqueue_scripts', 'corona_add_dialog_box_scripts');
function corona_add_dialog_box_scripts() {
	// use wp_localize_script() to send js data
    wp_enqueue_script( 'jquery-ui-dialog', false, array('jquery') );
    wp_enqueue_style( 'jquery-style', '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css' );
    wp_enqueue_style( 'shortcode-style', get_template_directory_uri() . '/inc/shortcodes/shortcodes.css' );
}

// register to add a button to TinyMCE meni
add_filter( 'mce_buttons', 'corona_register_buttons' );
function corona_register_buttons( $buttons ) {
    array_push( $buttons, 'separator', 'coronashortcodes' );
    return $buttons;
}

// Add js plugin script to plugin array
add_filter( 'mce_external_plugins', 'corona_add_buttons' );
function corona_add_buttons( $plugin_array ) {
	$plugin_array['coronashortcodes'] = get_template_directory_uri() . '/inc/shortcodes/shortcode-tinymce-button.js';
    return $plugin_array;
}

// Add js object to hold shortcode dropdown menu on tinymce menu
add_action('admin_footer', 'corona_get_shortcodes');
function corona_get_shortcodes() {
    echo '<script type="text/javascript">
    var shortcodes_button = new Object();';

    $shortcode_button_tags = array();
    $shortcode_button_tags = apply_filters( 'corona_shortcode_button', $shortcode_button_tags );

    if( !empty($shortcode_button_tags) ) {
        foreach( $shortcode_button_tags as $tag => $code )  {
            echo "shortcodes_button['{$tag}'] = '{$code}';";
        }
    }
	echo '</script>';
}

// Add the div to hold dialogue form and apply filters to fetch form content
// and attach to js object via script tag
add_action('admin_footer', 'corona_shortcode_dialog');
function corona_shortcode_dialog() {
    echo '<div id="shortcode-dialog" title="Shortcode Form">
            <form class="shortcode-dialog-form"></form></div>';

    echo '<script type="text/javascript">
    var shortcodes_form = new Object();';
	
	$shortcode_form = array();
    $shortcode_form = apply_filters( 'corona_shortcode_form', $shortcode_form );

    if( !empty($shortcode_form) ) {
        foreach( $shortcode_form as $tag => $form ) {
            echo "shortcodes_form['{$tag}'] = '{$form}';";
        }
    }
    echo '</script>';
}

// Add shortcodes to drop down menu
add_filter( 'corona_shortcode_button', 'add_custom_shortcodes', 10, 1 );
function add_custom_shortcodes( $shortcode_button_tags ) {
    $shortcode_button_tags['post-list'] = 'Post List';   // this is generating a PHP Notice:  Undefined index: post-list in $shortcode_tags
    $shortcode_button_tags['cta'] = 'Call To Action';
        
    return $shortcode_button_tags;
}

function write_table_row( $label, $input ) {
	$html  = '<div class="tbl-row">';
	$html .= '<div class="tbl-column">' . $label . '</div>';
	$html .= '<div class="tbl-column">' . $input . '</div>';
	$html .= '</div>';

	return $html;
}

function corona_shortcode_form_add_select( $name, $label, $func ) {
	$options = call_user_func( $func );

	$input  = '<select id="' . $name . '" name="' . $name . '">';
	foreach ( $options as $option ) {
		foreach( $option as $key => $value ) {
			$input .= '<option value="' . $key  . '">' . $value . '</option>';
		}
	}
	$input .= '</select>';

	return write_table_row( $label, $input );
}

function corona_shortcode_form_add_text( $name, $label, $default_text = '' ) {
	$input = '<input type="text" id="' . $name . '" name="' . $name . '" value="' . $default_text . '"/>';
	return write_table_row( $label, $input );
}

function corona_shortcode_form_add_number( $name, $label ) {
	$input = '<input type="number" id="' . $name . '" name="' . $name . '" min="1"/>';
	return write_table_row( $label, $input );
}

function corona_shortcode_form_add_checkbox( $name, $label ) {
	$input = '<input type="checkbox" id="' . $name . '" name="' . $name . '" />';
	$label = '<label for="'. $name . '">' . $label . '</label>';
	return write_table_row( $label, $input );
}
