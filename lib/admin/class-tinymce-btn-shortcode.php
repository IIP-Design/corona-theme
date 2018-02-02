<?php

/**
 * Class that handles the requests coming from the client side js code
 */
class TinyMce_Btn_Shortcode {

    private static $_instance = null;

    public $file; // may not need

    /**
     * Class contructor
     */
    public function __construct() {
        $this->load_dependencies();
        $this->define_hooks_and_filters ();
    }

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

    public function load_dependencies() {
        require_once TEMPLATE_DIR . '/lib/admin/class-tinymce-btn-shortcode-request.php';
    }

     public function define_hooks_and_filters() {
        add_filter( "mce_buttons",              array ( $this, 'corona_register_buttons' ) );
        add_filter( "mce_external_plugins",     array ( $this, 'corona_add_js_to_load' ) );
        add_filter( "corona_add_menu_item",     array ( $this, 'add_shortcode_to_menu' ), 10, 1  );

        add_action( "admin_head",               array ( $this, 'corona_localize_vars' ) );
        add_action( "admin_footer",             array ( $this, 'corona_get_shortcodes' ) );

    }

    public function corona_register_buttons ( $buttons ) {
        array_push( $buttons, 'separator', 'corona_shortcode_btns' );
        return $buttons;
    }

    public function corona_add_js_to_load ( $plugin_array ) {
        $plugin_array['corona_shortcode_btns'] = get_template_directory_uri() . '/lib/admin/js/src/tinymce/tinymce.plugins.min.js';
        return $plugin_array;
    }

    public function add_shortcode_to_menu (  $menu ) {
        $menu['post_list'] = 'Post List';    // need to use underbars as opposed to dashed fto ensure js works properly
        $menu['cta'] = 'Call To Action';
        $menu['custom_button'] = 'Custom Button';

        return $menu;
    }
    

    public function corona_get_shortcodes () {
        $menu = array();
        $menu = apply_filters( 'corona_add_menu_item', $menu );

        if( !empty($menu) ) {

            echo '<script type="text/javascript">
            var menu = new Object();';

            foreach( $menu as $sc => $name )  {
                echo "menu['{$sc}'] = '{$name}';";
            }

            echo '</script>';
        }

    }

    public function corona_localize_vars () {
        ?>
        <script>
            var ajaxVars = {
                url: '<?php echo admin_url( 'admin-ajax.php' ) ?>',
                tinymceNonce: '<?php  echo wp_create_nonce( 'tinymce-nonce' ) ?>'
            };
        </script>

        <?php
    }



} // end of  TinyMce_Btn_Shortcode


// Initialize and register shortcode
function corona_tinymce_btn_shortcode () {
    $instance = TinyMce_Btn_Shortcode::instance( __FILE__ );
    return $instance;
}

corona_tinymce_btn_shortcode();
