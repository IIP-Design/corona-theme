<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package corona
 */

get_header(); ?>

	<div class="content-sidebar-wrap">
		<main id="main" class="content" role="main"><!-- post loop -->

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

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

get_footer();
