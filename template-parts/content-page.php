<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package corona
 */
?>

<?php tha_entry_before(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php tha_entry_top(); ?>

	<?php if ( ! is_front_page() ) : ?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<?php endif; ?>

	<?php tha_entry_content_before(); ?>

	<div class="entry-content">
    <?php
      if ( has_post_thumbnail() ) {
        $html = '<figure>';
          $role = empty( $instance['show_title'] ) ? '' : 'aria-hidden="true"';
          $image = get_the_post_thumbnail( $post, 'medium_large' );
          $html .= $image;

          $html .= '<figcaption>';
            $html .= get_post( get_post_thumbnail_id() ) -> post_excerpt;
          $html .= '</figcaption>';
        $html .= '</figure>';

        echo $html;
      }
    ?>
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'corona' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php tha_entry_content_after(); ?>

	<footer class="entry-footer"></footer><!-- .entry-footer -->

	<?php tha_entry_bottom(); ?>

</article><!-- #post-## -->

<?php tha_entry_after(); ?>
