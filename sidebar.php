<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wordpress
 * @subpackage corona
 * @since Corona 2.0
 */
?>

	<?php tha_sidebars_before(); ?>

	<?php
	// @todo: This should be expanded to look more like the advanced loop option
	// on this page: https://www.advancedcustomfields.com/resources/repeater/

	// Check if the Flexible Sidebar flexible content field has rows of data
	if ( class_exists('acf') && have_rows('america_sidebar') ) { ?>
		<aside class="sidebar sidebar-primary">
			<?php tha_sidebar_top(); ?>

			<?php while ( have_rows('america_sidebar') ) : the_row(); ?>

				<section class="flexible-sidebar">
					<?php the_sub_field('america_markup'); ?>
				</section>

			<?php endwhile; ?>

			<?php tha_sidebar_bottom(); ?>
		</aside>
	</div><!-- .content-sidebar-wrap -->


	<?php
	// If it doesn't, show the global sidebars that have widgets assigned to them
	} else {

		// only show if widgets are assigned to it
		if( is_active_sidebar( 'sidebar-primary') ) : ?>

			<aside class="sidebar sidebar-primary">
				<?php tha_sidebar_top(); ?>
				<?php dynamic_sidebar( 'sidebar-primary' ); ?>
				<?php tha_sidebar_bottom(); ?>
			</aside>

		<?php endif; //end primary sidebar ?>

		</div><!-- .content-sidebar-wrap -->

		<?php // only show if widgets are assigned to it
		if( is_active_sidebar('sidebar-secondary') ) : ?>

			<?php corona_sidebar_secondary_top(); ?>

			<aside class="sidebar sidebar-secondary">
				<?php dynamic_sidebar( 'sidebar-secondary' ); ?>
			</aside>

			<?php corona_sidebar_secondary_bottom(); ?>

		<?php endif; // end secondary sidebar
	} // end check for america_sidebar ?>

	<?php tha_sidebars_after(); ?>
