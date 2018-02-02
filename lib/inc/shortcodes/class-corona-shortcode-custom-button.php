<?php

//* Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

class Corona_Shortcode_Custom_Button {

	private static $_instance = null;

	public $file; // may not need

	/**
	 * Main Instance
	 *
	 * Ensures only one instance of Corona_Shortcode_Custom_Button is loaded or can be loaded
	 * Needs to be a static class for the shortcodes to display
	 *
	 * @static
	 * @return Main Corona_Shortcode_Custom_Button instance
	 */
	public static function instance( $file = '') {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self( $file );
		}
		return self::$_instance;
	}

	public function __construct( $file ) {
		$this->file = $file;

		add_action( 'wp_enqueue_scripts', array( $this , 'corona_enqueue_scripts' ) );
		add_shortcode( 'custom-button', array($this, 'corona_shortcode_custom_button') );
	}

	public function corona_enqueue_scripts () {
	}

	public function corona_shortcode_custom_button( $atts ) {

		$defaults = array(
			'btn_label'           => '',
      'btn_link'            => '',
      'btn_tab'             => '',
      'btn_color'           => '',
      'btn_align'           => '',
      'btn_size'            => ''
		);

		$merged_atts = shortcode_atts( $defaults, $atts );

		$output = $this->render( $merged_atts );

		return apply_filters( 'corona_shortcode_custom_button', $output, $atts );
	}

	private function render( $atts ) {
		global $wp_query;

		extract( $atts );

		$html = $before;
		$html .= '<div class="button_container" style="text-align: ' . $btn_align . '">';
		$html .= '<a class="custom_btn';

		if( $btn_size == 'small' ) {
			$html .=' small';
		}

		$html .= '" href="' . $btn_link . '" ';

		if( $btn_tab ) {
			$html .= 'target="_blank"';
		}

		$html .= $btn_target . 'style="background-color: ' . $btn_color . $btn_width . '" tabindex="0">';

		$html .= '<div style="color: ';

		if( $btn_color == '#ffcc00' ) {
      $html .= '#192856';
    } elseif ( $btn_color == '#cccccc') {
      $html .= '#192856';
    } else {
      $html .= '#ffffff';
    };

		$html .= '"> ' . $btn_label . '</div>';

		$html .= '</a>';
		$html .= '</div>';

		$html .= $after;

		return $html;
	}

} // end Corona_Shortcode_Custom_Button class


// Initialize and register shortcode
function corona_shortcode_custom_button () {
	$instance = Corona_Shortcode_Custom_Button::instance( __FILE__ );
	return $instance;
}

corona_shortcode_custom_button();
