<?php
/**
  * Template partial that displays the site menu(s) at the top of the page
  *
  * @package Wordpress
  * @subpackage corona
  * @since Corona 2.0
  */
?>

<div class="menu-toggle" aria-controls="menu-primary" aria-expanded="false">
  <div class="hamburger">
    <span class="line"></span>
    <span class="line"></span>
    <span class="line"></span>
  </div>
</div>


<?php if ( has_nav_menu( 'primary' ) ) : ?>
  <nav id="nav-primary" class="nav-primary" role="navigation">
    <?php corona_get_nav_primary(); ?>
  </nav><!-- .nav-primary -->
<?php endif; ?>


<?php if ( has_nav_menu( 'secondary' ) ) : ?>
  <nav class="nav-secondary" role="navigation">
    <?php corona_get_nav_secondary(); ?>
  </nav><!-- .nav-secondary -->
<?php endif; ?>
