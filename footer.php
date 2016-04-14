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
			if( is_active_sidebar( 'footer') ) {
				dynamic_sidebar( 'footer' );
			}
		?><!-- .footer -->
		
	</footer><!-- .site-footer -->
</div><!-- .site-container -->

<?php wp_footer(); ?>

</body>
</html>