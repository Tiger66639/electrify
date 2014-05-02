<?php

/**
 * Registers navigation menus.
 *
 * @return void
 * @author Ryan
 **/
function electrify_nav_menus() {

	$menus = array(
		'nav_primary' => __( 'Primary Navigation' ),
		'nav_mobile' => __( 'Mobile Navigation' ),
	);

	register_nav_menus( $menus );

}

add_action( 'init', 'electrify_nav_menus' );


/**
 * Registers sidebars
 *
 * @return void
 * @author Ryan
 **/
function electrify_register_sidebar( $name, $id, $description ) {
	$args = array(
		'name'			=> __( $name ),
		'id'            => $id,
		'description'   => $description,
		'before_widget' => '<section class="widget">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	);

	register_sidebar( $args );
}

function electrify_create_sidebars() {

	electrify_register_sidebar( 'Footer - left column', 'footer_left', 'Displays in the footer, in the left column.' );
	electrify_register_sidebar( 'Footer - center column', 'footer_center', 'Displays in the footer, in the center column.' );
	electrify_register_sidebar( 'Footer - right column', 'footer_right', 'Displays in the footer, in the right column.' );
	
	electrify_register_sidebar( 'Showcase Footer - left column', 'footer_showcase_left', 'Displays in the showcase footer only, in the left column.' );
	electrify_register_sidebar( 'Showcase Footer - center column', 'footer_showcase_center', 'Displays in the showcase footer only, in the center column.' );
	electrify_register_sidebar( 'Showcase Footer - right column', 'footer_showcase_right', 'Displays in the showcase footer only, in the right column.' );
	
	electrify_register_sidebar( 'Sidebar', 'sidebar', 'Displays in the sidebar on every page that has a sidebar.' );
	
}

add_action( 'widgets_init', 'electrify_create_sidebars' );

/**
 * Registers and enqueues theme dependencies.
 *
 * @return void
 * @author Ryan
 **/
function electrify_lib()
{
	wp_enqueue_style( 'reset', get_template_directory_uri() . '/_lib/reset.css' );
	wp_enqueue_style( 'font', 'http://fonts.googleapis.com/css?family=Raleway:200' );
	
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/_lib/modernizr-2.8.0.min.js', array(), '', false );
}

add_action( 'wp_enqueue_scripts', 'electrify_lib' );


/**
 * Registers and enqueues theme styling.
 *
 * @return void
 * @author Ryan
 **/
function electrify_css()
{
	wp_enqueue_style( 'master', get_template_directory_uri() . '/_scss/style.css' );
}

add_action( 'wp_enqueue_scripts', 'electrify_css' );

/**
 * Registers and enqueues theme scripts.
 *
 * @return void
 * @author Ryan
 **/
function electrify_js()
{
	wp_enqueue_script( 'navigation', get_template_directory_uri() . '/_coffee/nav.js', array( 'jquery' ), '', true );
}

add_action( 'wp_enqueue_scripts', 'electrify_js' );


/**
 * Lengthens the excerpt.
 *
 * @return void
 * @author Ryan
 **/
function excerpt_lengthen() {
	
	return 100;
	
}

add_action( 'excerpt_length', 'excerpt_lengthen' );
