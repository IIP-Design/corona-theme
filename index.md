---
layout: default
---

<section>
# Documentation

Corona doesn't really provide much in terms of visual styling; it primarily provides structure and some common, repeated functionality. Create a child theme for site-specific styles.
</section>

<section>
## Development Setup

### Build Tools

Corona uses NPM scripts to run its build process. Checkout the [`package.json`](https://github.com/IIP-Design/corona/blob/master/package.json) file to see what's included and version numbers. Here are the highlights:

* [SASS](http://sass-lang.com/)
* [PostCSS](https://github.com/postcss/postcss) + [autoprefixer](https://github.com/postcss/autoprefixer).
* [ESLint](http://eslint.org/) + AirBnb's [JavaScript style guide](https://github.com/airbnb/javascript).
* [UglifyJS](https://github.com/mishoo/UglifyJS)
* [Imagemin](https://github.com/imagemin/imagemin)
* [BrowserSync](https://www.browsersync.io/)

In development, you should be able to watch for changes and recompile your assets by running:

```bash
$ npm run watch
```

#### Modernizr

If you need to compile Modernizr for *development only*, you can run:

```bash
$ npm run modernizr:dev
```

It will generate `js/src/modernizr.dev.js` with all the options available in `node_modules/modernizr/lib/config-all.json`. which is why it's only suitable for in development. You'll have to run the following to add it to `js/dist/script.js`, which is already enqueued.

```bash
$ npm run js
```

</section>

<section>
## Production

### Asset compilation

To compile the theme's assets for production, run:

```bash
$ npm run prod
```

### Bump version

See npm's [version documentation](https://docs.npmjs.com/cli/version) for additional details

```bash
$npm version patch
```

</section>

<section>

<section>
## Theme Hooks

Corona has 100% support for the [Theme Hook Alliance's](https://github.com/zamoose/themehookalliance) suite of action hooks. We've also added a few other actions and filters, documented below.

### Visual Action Hook Guide

The <a href="{{ site.github.url }}/hooks/">Visual Action Hook Guide</a> outlines some of Corona's layout-related action hooks. These hooks provide easy access to key area's of the theme for plugin and child-theme development.

### Corona Action Hooks

`corona_pre_init`
: Do something before Corona initializes
: [View in source](https://github.com/IIP-Design/corona/blob/0d7d8f883943929bb3f14453b141f17396ec1c87/lib/init.php#L16)

`corona_init`
: Do something at initialization
: ```php
    // Example: Register new menu

    function me_init_menus() {
      register_nav_menus(
        array(
          'third' => esc_html__( 'Third', 'Third navigation' ),
        )
      );
    }
```
: [View in source](https://github.com/IIP-Design/corona/blob/0d7d8f883943929bb3f14453b141f17396ec1c87/lib/init.php#L168)

`corona_loop`
: The WP loop action hook for DRY-er templates and easier loop customization
: ```php
    // Template Example:

    // This will search the 'template-parts' directory, looking for a 'content-video.php' template, and include any comments
    <?php corona_loop( 'template-parts/content', 'video', $comments = true ); ?>
```

: To override corona's default loop, you simply need to add a function to the function.php file in your child theme and remove the hook
: ```php
    // Example:

    function me_remove_loop() {
      remove_action ( 'corona_loop', 'corona_post_loop', 10 );
    }

    add_action( 'init', 'me_remove_loop' );
```

: Then you need to add your custom loop function
: ```php
    // Example:

    function me_custom_loop ( $slug, $name, $comments=false ) {
      if ( have_posts() ) : while ( have_posts() ) : the_post();
        // Do stuff
      endwhile;
      endif;
    }

    add_action( 'corona_loop', 'me_custom_loop', 10, 3 );
```
: [View in source](https://github.com/IIP-Design/corona/blob/44a41355ad0e02ba81e090564c4281ec311310ee/lib/inc/action-hooks.php#L157)

`corona_get_menu`
: Insert a specified menu into a template.
: ```php
    // You can add additional menus like so:

    function me_menus( $menu ) {
      if ( $menu === 'third' ) :
        $args = array(
          'theme_location'  => 'third',
          'menu_id'         => 'menu-third',
          'menu_class'      => 'menu nav-menu menu-third',
          'container_class' => 'wrap',
        );

        wp_nav_menu( $args );
      endif;
    }

    add_action( 'corona_get_menu', 'me_menus', 10, 1 );
```
: ```php
    // You can output the previous menu in a template like so:

    <?php corona_get_menu( 'third' ); ?>
```
: [View in source](https://github.com/IIP-Design/corona/blob/44a41355ad0e02ba81e090564c4281ec311310ee/lib/inc/action-hooks.php#L45)

`corona_sidebar_secondary_top`
: Do something just after the opening `<aside>` of Corona's secondary sidebar
: [View in source](https://github.com/IIP-Design/corona/blob/44a41355ad0e02ba81e090564c4281ec311310ee/lib/inc/action-hooks.php#L61)

`corona_sidebar_secondary_bottom`
: Do something just before the closing `</aside>` of Corona's secondary sidebar
: [View in source](https://github.com/IIP-Design/corona/blob/44a41355ad0e02ba81e090564c4281ec311310ee/lib/inc/action-hooks.php#L76)

`corona_menu_before`
: Do something before Corona's primary and secondary menus
: [View in source](https://github.com/IIP-Design/corona/blob/44a41355ad0e02ba81e090564c4281ec311310ee/lib/inc/action-hooks.php#L91)

`corona_menu_after`
: Do something after Corona's primary and secondary menus
: [View in source](https://github.com/IIP-Design/corona/blob/44a41355ad0e02ba81e090564c4281ec311310ee/lib/inc/action-hooks.php#L106)

`corona_menu_top`
: Do something just after the opening `<nav>` of the specified menu
: ```php
    function me_primary_menu_top_test( $menu ) {
    	if ( $menu === 'primary' ) :
    		echo 'hello from primary top';
    	endif;
    }

    add_action( 'corona_menu_top', 'me_primary_menu_top_test', 10, 1 );
```
: [View in source](https://github.com/IIP-Design/corona/blob/44a41355ad0e02ba81e090564c4281ec311310ee/lib/inc/action-hooks.php#L122)

`corona_menu_bottom`
: Do something just before the closing `</nav>` of the specified menu
: ```php
    function me_secondary_menu_bottom_test( $menu ) {
    	if ( $menu === 'secondary' ) :
    		echo 'hello from secondary bottom';
    	endif;
    }

    add_action( 'corona_menu_bottom', 'me_secondary_menu_bottom_test', 10, 1 );
```
: [View in source](https://github.com/IIP-Design/corona/blob/44a41355ad0e02ba81e090564c4281ec311310ee/lib/inc/action-hooks.php#L139)

`corona_posted_on`
: Change or remove 'Posted on \{\{date\}\} by \{\{author\}\}' output.
: [View in source](https://github.com/IIP-Design/corona/blob/44a41355ad0e02ba81e090564c4281ec311310ee/lib/inc/action-hooks.php#L24)


### Corona Filter Hooks

`corona_add_constants`
: Augment Corona's global constants
: ```php
  // Example:

  function me_add_constant( $constants ) {
      $me_constants = array(
        'CHILD_THEME_VERSION' => '1.1.1',
      );

      $constants = array_merge( $me_constants, $constants );

      return $constants;
  }

  add_filter( 'corona_add_constants', 'me_add_constant' );
```
: [View in source](https://github.com/IIP-Design/corona/blob/0d7d8f883943929bb3f14453b141f17396ec1c87/lib/init.php#L32)

`corona_loop_template`
: Allows you to hook into Corona's custom template loader, `corona_template_loader`. Useful for loading templates from custom locations, like from a plugin

: ```php
  // Example:

  function me_add_custom_template_location( $templates ) {

    // Put your template at the front of the $templates array
    array_unshift( $templates, 'path/to/template.php' );

    return $templates;
  }

  add_filter( 'corona_loop_template', 'me_add_custom_template_location' );
```
: [View in source](https://github.com/IIP-Design/corona/blob/0d7d8f883943929bb3f14453b141f17396ec1c87/lib/inc/utilities.php#L88)

`corona_content_width`
: Augment the maximum allowed width for any content in the theme. Default is `640px`
: [View in source](https://github.com/IIP-Design/corona/blob/0d7d8f883943929bb3f14453b141f17396ec1c87/lib/init.php#L157)

`corona_custom_background_args`
: Augment the background defaults for Wordpress's Customizer
: [View in source](https://github.com/IIP-Design/corona/blob/0d7d8f883943929bb3f14453b141f17396ec1c87/lib/init.php#L85)

`corona_shortcode_cta`
: @todo
: [View in source](https://github.com/IIP-Design/corona/blob/0d7d8f883943929bb3f14453b141f17396ec1c87/lib/inc/shortcodes/class-corona-shortcode-cta.php#L60)

`corona_shortcode_post_list`
: @todo
: [View in source](https://github.com/IIP-Design/corona/blob/0d7d8f883943929bb3f14453b141f17396ec1c87/lib/inc/shortcodes/class-corona-shortcode-post-list.php#L67)

`corona_post_date_shortcode`
: @todo
: [View in source](https://github.com/IIP-Design/corona/blob/8760b3a286a903c347376bd0481b657a2e222948/lib/inc/shortcodes/class-corona-shortcode-post.php#L19)

`corona_shortcode_button`
: @todo

`corona_shortcode_form`
: @todo

</section>

<section>
## Shortcodes

@todo
</section>

<section>
## Templates and Markup

### Visual Markup Guide

Generally speaking, The <a href="{{ site.github.url }}/markup/">Visual Markup Guide</a> explains how Corona's markup is structured.

The markup was heavily influenced by the [Genesis Framework](http://my.studiopress.com/themes/genesis/). The guide is forked from [Nathan Rice](http://www.nathanrice.net/)'s invaluable [Genesis Visual Markup Guide](http://www.genesisframework.com/markup.php). It has been updated to reflect Corona's structure.

### Responsive Columns

Corona has markup that allows for easily adding columns to pages and posts that work across different viewports. Here are <a href="{{ site.github.url }}/responsive-columns/">some examples</a>.

### Page Templates

`page_full.php`
: A full-width page template that doesn't include the primary and secondary sidebars.

</section>

<section>
## Media Queries

Corona is a mobile-first theme. Here are the SASS variables. The `em`s are calculated at the browser default font-size of 16px.

`$big-mobile`
: ```25em;  // 400px```

`$tablet`
: ```48em;  // 768px```

`$laptop`
: ```64em;  // 1024px```

`$desktop`
: ```75em;  // 1200px```

</section>
