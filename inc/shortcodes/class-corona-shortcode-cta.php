<?php
/**************************************************************************

**************************************************************************/

//* Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

class Corona_Shortcode_CTA {

	const VERSION = '0.0.0';

	private static $_instance = null;

	public $file; // may not need

	/**
	 * Main Instance
	 *
	 * Ensures only one instance of Corona_Shortcode_CTA is loaded or can be loaded
	 * Needs to be a static class for the shortcodes to display
	 *
	 * @static
	 * @return Main Corona_Shortcode_Post_List instance
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
		add_shortcode( 'cta', array($this, 'corona_shortcode_cta') );
	}

	public function corona_enqueue_scripts () {
	}

	public function corona_shortcode_cta( $atts ) { 

		$defaults = array(
			'image_id'  	=> '',
			'image_size'	=> '',
			'text'			=> '',
			'button' 		=> 0,
			'button_link' 	=> 0,
			'button_label'  => '',
			'after'  		=> '',
			'before' 		=> '',
			'label'  		=> ''
		);

		$merged_atts = shortcode_atts( $defaults, $atts );

		// echo '<pre>';
		// var_dump($merged_atts);
		// echo '</pre>';
		// die();

		$output = $this->render( $merged_atts );

		return apply_filters( 'corona_shortcode_cta', $output, $atts );
	}

	private function render( $atts ) {
		global $wp_query;

		extract( $atts );

		$html = $before;
		$html .= '<div class="cta-container">';
		
		if( $image_id ) {
			$html .= wp_get_attachment_image ( $image_id, $size = '', $icon = false, $attr = '' );
		}
		
		$html .= '<div class="cta-gradient"></div>';
		$html .= '<div class="cta-text">' . $text;

		if( $button ) {
			$html .= '<a class="button cta-button" href="' . $button_link . '">' .$button_label . '</a>';
		}

		$html .= '</div>';
		$html .= '</div>';

		$html .= $after;

		return $html;
	}

} // end Corona_Shortcode_CTA class


// Initialize and register shortcode
function corona_shortcode_cta () {
	$instance = Corona_Shortcode_CTA::instance( __FILE__ );
	return $instance;
}

corona_shortcode_cta();

// <div class="cta-container">
// 	<img class="cta-image" src="https://ylai.edit.america.gov/wp-content/uploads/sites/2/2016/04/banner2-1.jpg" alt="President Obama shaking hands with honorees" />
// 	<div class="cta-gradient"></div>
// 	<div class="cta-text">

// 	Develop as a leader, connect with peers across the region, and be the change you're looking for

// 	<a class="button cta-button" href="https://ylai.edit.america.gov/fellowship/">apply now</a>

// 	</div>
// </div>


