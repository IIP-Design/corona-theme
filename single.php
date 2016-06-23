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

		<?php tha_content_before(); ?>
		<main id="main" class="content" role="main"><!-- post loop -->
		<?php tha_content_top(); ?>
		<?php dynamic_sidebar( 'before-entry' ); ?>

			<?php
			tha_content_while_before();

			corona_loop( 'template-parts/content', get_post_format(), $comments = true );

			tha_content_while_after();
			?>

		<?php dynamic_sidebar( 'after-entry' ); ?>
		<?php tha_content_bottom(); ?>
		</main><!-- #main -->
		<?php tha_content_after(); ?>

<?php
get_sidebar();
get_footer();
