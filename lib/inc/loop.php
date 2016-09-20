<?php

/**
  * The post loop that hooks into `corona_loop` action hook. By adding it here,
	* we can more easily override it.
  *
  * @param string $slug - The slug name for the generic template.
  * @param string $name - The name of the specialized template.
  * @param bool $comments - Include the comments block.
  *
  * @since 2.5.0
  */

function corona_post_loop( $slug, $name, $comments = false ) {
	while ( have_posts() ) : the_post();

    corona_template_loader( $slug, $name );

    if ( $comments === true ) {
      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;
    }

	endwhile;
}

add_action( 'corona_loop', 'corona_post_loop', 10, 3 );
