<?php

/**
 * Class that handles the requests coming from the client side js code
 */
class TinyMce_Btn_Shortcode_Request {

    /**
     * Class contructor
     */
    public function __construct() {

        add_action( "wp_ajax_nopriv_fetch_data_post_list",  array ( $this, 'fetch_data_post_list' ) );
        add_action( "wp_ajax_fetch_data_post_list",         array( $this,'fetch_data_post_list' ));
    }

    /**
     * Create query based on POST vars and echo to the screen
     * @return void
     */
    public function fetch_data_post_list () {
        $nonce =  $_POST['security'];
        check_ajax_referer( 'tinymce-nonce', 'security' );
       
        $data = array (
            'categories'    => get_categories(),
            'post_formats'  => get_theme_support( 'post-formats' ),
            'image_sizes'   => $this->get_image_sizes()
        );

        echo json_encode( $data );
        die();
    }

    /**
     * Get size information for all currently-registered image sizes.
     *
     * @global $_wp_additional_image_sizes
     * @uses   get_intermediate_image_sizes()
     * @return array $sizes Data for all currently-registered image sizes.
     */
    public function get_image_sizes() {
        global $_wp_additional_image_sizes;

        $sizes = array();

        foreach ( get_intermediate_image_sizes() as $_size ) {
            if ( in_array( $_size, array('thumbnail', 'medium', 'medium_large', 'large') ) ) {
                $sizes[ $_size ]['width']  = get_option( "{$_size}_size_w" );
                $sizes[ $_size ]['height'] = get_option( "{$_size}_size_h" );
                $sizes[ $_size ]['crop']   = (bool) get_option( "{$_size}_crop" );
            } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
                $sizes[ $_size ] = array(
                    'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
                    'height' => $_wp_additional_image_sizes[ $_size ]['height'],
                    'crop'   => $_wp_additional_image_sizes[ $_size ]['crop'],
                );
            }
        }

        return $sizes;
    }

   
} // end of  TinyMce_Btn_Shortcode_Request

/**
 * Create and and intialize class
 * @var TinyMce_Btn_Shortcode_Request
 */
$corona_tinymce_request = new TinyMce_Btn_Shortcode_Request ();
