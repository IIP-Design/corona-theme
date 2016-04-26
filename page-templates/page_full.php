<?php

/**
  * Template Name: Full Width (no sidebar)
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

  get_header(); ?>
  <main id="main" class="content full-width" role="main">

    <?php
    while ( have_posts() ) : the_post();

      get_template_part( 'template-parts/content', 'page' );

      // If comments are open or we have at least one comment, load up the comment template.
      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;

    endwhile; // End of the loop.
    ?>

  </main><!-- #main -->

  <?php
  get_footer();
