<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package corona
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="site-container">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'corona' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<?php if ( get_header_image() ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
			</a>
		<?php endif; // End header image check. ?>
		<div class="title-area">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<h2 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h2>
			<?php
			endif; ?>
		</div><!-- .title-area -->

		<?php
			// only show if widgets are assigned to it
			if( is_active_sidebar( 'header-right') ) {
				dynamic_sidebar( 'header-right' );
			}
		?><!-- .header right widget area -->

	</header><!-- #masthead -->

	<nav id="site-navigation" class="nav-primary" role="navigation">
		<button class="menu-toggle" aria-controls="menu-primary" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'corona' ); ?></button>
		<?php
 			$args = array(
 				'theme_location' => 'primary',
 				'menu_id'=> 'menu-primary',
 				'menu_class'=> 'menu nav-menu menu-primary',
 				'container_class' => 'wrap'
 			);
			wp_nav_menu( $args );
		?>
  </nav><!-- .nav-primary-->
  <nav class="nav-secondary" role="navigation">
  	<?php
			$args = array(
				'theme_location' => 'secondary',
				'menu_id'=> 'menu-secondary',
				'menu_class'=> 'menu nav-menu menu-secondary',
				'container_class' => 'wrap'
			);
		wp_nav_menu( $args );
		?>
  </nav><!-- .nav-secondary-->

	<div id="content" class="site-inner">
