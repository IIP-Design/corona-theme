<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package corona
 */

?>

	</div><!-- .site-inner -->

	<footer class="site-footer">

	<?php
			// only show if widgets are assigned to it
			if( is_active_sidebar( 'footer-1') ) {
				echo ('<div class="footer-1">');
					dynamic_sidebar( 'footer-1' );
				echo ('</div>');
			}

			if( is_active_sidebar( 'footer-2') ) {
				echo ('<div class="footer-2">');
					dynamic_sidebar( 'footer-2' );
				echo ('</div>');
			}
		?><!-- .footer -->

	</footer><!-- .site-footer -->
</div><!-- .site-container -->

<?php wp_footer(); ?>

</body>
</html>
