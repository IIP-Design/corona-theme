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

			<aside class="sidebar sidebar-secondary">
				<?php corona_sidebar_secondary_top(); ?>
				<?php dynamic_sidebar( 'sidebar-secondary' ); ?>
				<?php corona_sidebar_secondary_bottom(); ?>
			</aside>

		<?php endif; // end secondary sidebar ?>

	<?php tha_sidebars_after(); ?>
