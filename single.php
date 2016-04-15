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

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
		<?php
			// only show if widgets are assigned to it
			if( is_active_sidebar( 'sidebar-primary') ) {
				echo('<aside class="sidebar sidebar-primary">');
					dynamic_sidebar( 'sidebar-primary' );
				echo('</aside>');
			}
		?><!-- primary sidebar -->
	</div><!-- .content-sidebar-wrap -->
	<?php
	// only show if widgets are assigned to it
	if( is_active_sidebar('sidebar-secondary') ) {
		echo('<aside class="sidebar sidebar-secondary">');
			dynamic_sidebar( 'sidebar-secondary' );
		echo('</aside>');
	}
	?><!-- secondary sidebar -->

<?php
get_sidebar();
get_footer();
