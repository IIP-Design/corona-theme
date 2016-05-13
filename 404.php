<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package corona
 */

get_header(); ?>

	<div class="content-sidebar-wrap">

		<?php tha_content_before(); ?>
		<main id="main" class="content" role="main"><!-- post loop -->
		<?php tha_content_top(); ?>

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Not found, error 404', 'corona' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Try searching below.', 'corona' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		<?php tha_content_bottom(); ?>
		</main><!-- #main -->
		<?php tha_content_after(); ?>

<?php
get_sidebar();
get_footer();
