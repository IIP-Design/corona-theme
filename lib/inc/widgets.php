<?php

/**
 * Register widget areas.
 *
 * @package Wordpress
 * @subpackage corona
 * @since 2.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function corona_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Header Right', 'corona' ),
		'id'            => 'header-right',
		'description'   => esc_html__( 'This is the header widget area. It typically appears next to the site title or logo.', 'corona' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'corona' ),
		'id'            => 'sidebar-primary',
		'description'   => esc_html__( 'Add widgets here.', 'corona' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Secondary Sidebar', 'corona' ),
		'id'            => 'sidebar-secondary',
		'description'   => esc_html__( 'Add widgets here.', 'corona' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'corona' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'corona' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'corona' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'corona' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );
}
add_action( 'widgets_init', 'corona_widgets_init' );

// Enable the use of shortcodes in text widgets.
add_filter( 'widget_text', 'do_shortcode' );
