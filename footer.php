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

	<footer class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'corona' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'corona' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'corona' ), 'corona', '<a href="https://github.com/IIP-Design/corona" rel="designer">Office of Design</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->
</div><!-- .site-container -->

<?php wp_footer(); ?>

</body>
</html>
