<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the .site-inner and .site-container content divs.
 *
 * @package Wordpress
 * @subpackage corona
 * @since Corona 2.0
 */
?>

	</div><!-- .site-inner -->

	<?php tha_footer_before(); ?>

	<footer class="site-footer">

		<?php
			tha_footer_top();
			get_template_part( 'template-parts/site', 'footer' );
			tha_footer_bottom();
		?>

	</footer><!-- .site-footer -->

	<?php tha_footer_after(); ?>

</div><!-- .site-container -->

<?php
	tha_body_bottom();
	wp_footer();
?>

</body>
</html>
