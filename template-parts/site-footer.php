<?php
/**
 * The template partial for displaying the footer widgets.
 *
 * @package Wordpress
 * @subpackage corona
 * @since Corona 2.0
 */
?>

<?php if( is_active_sidebar( 'footer-1') ) : ?>
	<div class="footer-1">
		<?php dynamic_sidebar( 'footer-1' ); ?>
	</div>
<?php endif; ?>


<?php if( is_active_sidebar( 'footer-2') ) : ?>
	<div class="footer-2">
		<?php dynamic_sidebar( 'footer-2' ); ?>
	</div>
<?php endif; ?>
