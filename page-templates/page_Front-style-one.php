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

  <div class="cta-container">
    <img class="cta-image" src="https://ylai.edit.america.gov/wp-content/uploads/sites/2/2016/04/banner2-1.jpg" alt="President Obama shaking hands with honorees" />
    <div class="cta-gradient"></div>
    <div class="cta-text">
      <p>Develop as a leader, connect with peers across the region, and be the change you're looking for</p>
      <a href="/the-fellowship/" class="button cta-button">apply now</a>
    </div>
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
