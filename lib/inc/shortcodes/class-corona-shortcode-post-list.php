<?php
/**************************************************************************

**************************************************************************/

//* Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

class Corona_Shortcode_Post_List {

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

		add_shortcode( 'post-list', array($this, 'corona_shortcode_post_list') );
	}

	public function corona_shortcode_post_list( $atts ) {

		$defaults = array(
			'title'  					=> '',
			'posts_cat' 				=> '',
			'posts_num' 				=> 1,
			'show_image'				=> 0,
			'image_size'           		=> '',
			'image_alignment' 			=> 'center',
			'post_format'				=> '',
			'show_title' 				=> 0,
			'show_byline'          		=> 0,
			'post_info' 				=> '[post_date]',
			'show_content' 				=> 'excerpt',
			'content_limit' 			=> 20,
			'more_text_from_post'      	=> 0,
			'more_text' 		   		=> __( 'Read More...', 'corona' ),
			'after'  					=> '',
			'before' 					=> '',
			'label'  					=> ''
		);

		$merged_atts = shortcode_atts( $defaults, $atts );

		$output = $this->render( $merged_atts );

		return apply_filters( 'corona_shortcode_post_list', $output, $atts );
	}


	/**
	 * Returns the taxonomy query
	 * Since there is not a formal 'standard' post format, we need to toggle the operator
	 * If the selected post format is 'standard', return an array of all other formats and use 'NOT IN' to exclude
	 * If post format is something other than 'standard', retrun array of selected formats and use the 'IN' operator to exclude the standard post format
	 * @todo  Handle multiple selected post formats
	 * 
	 * @param  string $post_format Selected post format
	 * @return array               Tax query array
	 */
	private function get_tax_query ( $post_format ) {
 		$formats = get_theme_support( 'post-formats' );
 		$tax_args = array();
 		$operator = $this->get_tax_operator( $post_format );

		 foreach ( $formats[0] as $format ) {
			if( $operator == 'NOT IN') {
				if( $format != $post_format  ) {
					$tax_args[] = 'post-format-' . $format;
				}
			} else {
				if( $format == $post_format  ) {
					$tax_args[] = 'post-format-' . $format;
				}
			}
		}

 		return $tax_args;
	}

	/**
	 * Return the taxonomy operator based on selected post format 
	 * @param  string $post_format Selected post format
	 * @return string              Taxonomy query operator
	 */
	private function get_tax_operator ( $post_format ) {
		return ( $post_format == 'standard' ) ?  'NOT IN' : 'IN';
	}

	/**
	 * Render the shortcode to the page
	 * 
	 * @param  array $atts 	shortcode configuration attributes
	 * @return string $html html to render   
	 */
	private function render( $atts ) {
		global $wp_query;

		extract( $atts );

		$html = '<div class="post-list-container">';

		$html .= $before;

		// @todo: this needs to be made more flexible/configurable
		$query_args = array(
			'post_type' => 'post',
			'tax_query' => array(
				array(
					'taxonomy' 	=> 'post_format',
					'field' 	=> 'slug',
					'terms' 	=> $this->get_tax_query( $post_format ),
					'operator' 	=> $this->get_tax_operator( $post_format )
				)
			),
			'cat'       		=> $posts_cat,
			'showposts'         => $posts_num
		);


		$wp_query = new WP_Query( $query_args );

		if ( have_posts() ) : while ( have_posts() ) : the_post();

		    $html .= '<article id="post-' . get_the_ID() . '" class="' . implode(' ', get_post_class( 'entry')) . '">';

			if ( $show_image ) {
				if ( has_post_thumbnail() ) {
					$role = empty( $show_title) ? '' : 'aria-hidden="true"';
					$image = get_the_post_thumbnail( $post, $image_size );
				    $html .= '<a class="post-image-anchor" href="' .  get_permalink() . '" class="' . esc_attr( $image_alignment ) . '" ' . $role . '"">'. $image . '</a>';
				}
			}

			if ( $show_title ) {
				$html .= '<header class="entry-header">';
				if ( ! empty( $show_title) ) {
					$title = get_the_title() ? get_the_title() : __( '(no title)', 'corona' );
					$heading = 'h2';
					$html .= '<' . $heading . ' class="entry-title"><a href="' . get_permalink() . '">' . $title . '</a></' . $heading  . '>';
				}

				if ( ! empty( $show_byline ) && ! empty( $post_info ) )
					$html .= '<p class="entry-meta">' . do_shortcode( $post_info) . '</p>';

				$html .= '</header>';
			}

			if ( ! empty( $show_content ) ) {
				$html .= '<div class="entry-content">';
				if (  $show_content  == 'excerpt' ) {
					$html .= get_the_excerpt();
				}
				else if ( $show_content == 'content-limit' ) {
					$link = '';
					if( $more_text_from_post ) {
						$link = ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . esc_html( $more_text ) . '</a>';
					}
    				$text = strip_shortcodes( get_the_content() );
					//wp_trim_words will remove all tags -- should fix at some point
					$html .= wp_trim_words( $text, (int) $content_limit, $link );
				}
				else {

					global $more;

					$orig_more = $more;
					$more = 0;

					$html .= get_the_content( esc_html( $more_text ) );

					$more = $orig_more;

				}
		 		$html .= '</article>';
			}

		endwhile; endif;

		$html .= '</div>';

		//* Restore original query
		wp_reset_query();

		$html .= $after;

		return $html;
	}

} // end Corona_Shortcode_Post_List class


/**
 * Inititalize the shortcode 
 * 
 * @return Corona_Shortcode_Post_List class instance
 */
function corona_shortcode_post_list () {
	$instance = Corona_Shortcode_Post_List::instance( __FILE__ );
	return $instance;
}

corona_shortcode_post_list();
