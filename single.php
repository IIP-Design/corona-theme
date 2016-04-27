<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package corona
 */

get_header(); ?>

	<div class="content-sidebar-wrap">
		<main id="main" class="content" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', get_post_format() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

		<?php
		// @todo: This should be expanded to look more like the advanced loop option
		// on this page: https://www.advancedcustomfields.com/resources/repeater/

		// Check if the Flexible Sidebar flexible content field has rows of data
		if ( class_exists('acf') && have_rows('america_sidebar') ) {
			echo('<aside class="sidebar sidebar-primary">');
				while ( have_rows('america_sidebar') ) : the_row();
					echo('<section class="flexible-sidebar">');
						the_sub_field('america_markup');
					echo('</section>');
				endwhile;
			echo('</aside>');
			echo('</div><!-- .content-sidebar-wrap -->');

		// If it doesn't, show the global sidebars that have widgets assigned to them
		} else {

			// only show if widgets are assigned to it
			if( is_active_sidebar( 'sidebar-primary') ) {
				echo('<aside class="sidebar sidebar-primary">');
					dynamic_sidebar( 'sidebar-primary' );
				echo('</aside>');
			} //end primary sidebar ?>

	</div><!-- .content-sidebar-wrap -->

			<?php // only show if widgets are assigned to it
			if( is_active_sidebar('sidebar-secondary') ) {
				echo('<aside class="sidebar sidebar-secondary">');
					dynamic_sidebar( 'sidebar-secondary' );
				echo('</aside>');
			} // end secondary sidebar
	  }

get_sidebar();
get_footer();
