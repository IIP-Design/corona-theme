<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package corona
 */

get_header(); ?>

	<div class="content-sidebar-wrap">

		<?php tha_content_before(); ?>
		<main id="main" class="content" role="main"><!-- post loop -->
		<?php tha_content_top(); ?>

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="entry-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			tha_content_while_before();

			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search_archive' );

			endwhile;

			tha_content_while_after();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		<?php tha_content_bottom(); ?>
		</main><!-- #main -->
		<?php tha_content_after(); ?>

<?php
get_sidebar();
get_footer();
