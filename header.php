<?php
/**
 * Template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package corona
 */
?>

<?php tha_html_before(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php tha_head_top(); ?>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php tha_head_bottom();?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php tha_body_top(); ?>

	<div class="site-container">
		<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'corona' ); ?></a>

		<?php tha_header_before(); ?>
		<?php get_template_part( 'template-parts/site', 'header' ); ?>
		<?php tha_header_after(); ?>

		<?php corona_menu_before(); ?>
		<?php get_template_part( 'template-parts/site', 'menu' ); ?>
		<?php corona_menu_after(); ?>

		<div id="content" class="site-inner">
