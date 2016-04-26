<?php
/**************************************************************************

**************************************************************************/

//* Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

class Corona_Shortcode_Post_List {

	const VERSION = '0.0.0';

	private static $_instance = null;

	public $file; // may not need

	/**
	 * Main Instance
	 *
	 * Ensures only one instance of Corona_Shortcode_Post_List is loaded or can be loaded
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
		add_shortcode( 'post-list', array($this, 'corona_shortcode_post_list') );
	}

	public function corona_enqueue_scripts () {
	}

	public function corona_shortcode_post_list( $atts ) { 
		$defaults = array(
			'after'  => '',
			'before' => '',
			'label'  => '',
		);

		$merged_atts = shortcode_atts( $defaults, $atts );

		$output = $this->render( $merged_atts );
		echo $output;
	}

	private function render( $atts ) {
		$html = '';	

		return apply_filters( 'corona_shortcode_post_list', $html, $atts );
	}

} // end Corona_Shortcode_Post_List class


// Initialize and register shortcode
function corona_shortcode_post_list () {
	$instance = Corona_Shortcode_Post_List::instance( __FILE__ );
	return $instance;
}

corona_shortcode_post_list();


