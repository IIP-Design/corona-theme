<?php
/**
  * Template partial that displays the site header
  *
  * @package Wordpress
  * @subpackage corona
  * @since Corona 2.0
  */
?>

<header id="masthead" class="site-header" role="banner">


  <?php if ( get_header_image() ) : ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
      <?php the_header_image_tag(); ?>
    </a>
  <?php endif; // End header image check. ?>



  <div class="title-area">


    <?php if ( is_front_page() && is_home() ) : ?>
      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    <?php else : ?>
      <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
    <?php endif; ?>

    <?php
    $description = get_bloginfo( 'description', 'display' );

    if ( $description || is_customize_preview() ) : ?>
      <h2 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h2>
    <?php endif; ?>


  </div><!-- .title-area -->



  <?php if( is_active_sidebar( 'header-right') ) : ?>
      <aside class="header-widget-area">
        <?php dynamic_sidebar( 'header-right' ); ?>
      </aside>
  <?php endif; ?>


</header><!-- #masthead -->
