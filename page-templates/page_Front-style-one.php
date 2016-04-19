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

  get_header(); ?>

  <div class="cta">
		<a href="https://ylai.edit.america.gov/application/">
      <img class="cta-image" src="http://ylai.dev/wp-content/uploads/2016/04/banner2.jpg" alt="President Obama shaking hands with honorees" />
    </a>
	</div>

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
