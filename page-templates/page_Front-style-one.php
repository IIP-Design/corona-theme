<?php

/**
  * Template Name: Front, Style 1
  *
  *
  * @see /docs/templates
  *
  * @package WordPress
  * @subpackage corona
  * @since Corona 1.0
  *
  * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/page-templates/
  */

  get_header();

  if ( class_exists('acf') && get_field('cta_markup') ) {
    the_field('cta_markup');
  } ?>

  <div class="content-sidebar-wrap">
		<main id="main" class="content" role="main">
    		<?php
  			while ( have_posts() ) : the_post();

  				the_content();

  			endwhile; // End of the loop.
  			?>
    </main>
  </div>

  <?php
  get_footer();
