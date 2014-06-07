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
	
	wp_register_script( 'slidesjs', get_template_directory_uri() . '/_lib/jquery.slidesjs.min.js', array( 'jquery' ), '', true );
	wp_register_script( 'gsap', '//cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js', array(), '', true );
	wp_register_script( 'jquery_gsap', get_template_directory_uri() . '/_lib/jquery.gsap.min.js', array( 'jquery', 'gsap' ), '', true );
	if ( is_front_page() || is_page_template( 'showcase.php' ) )
	{
		wp_enqueue_script( 'slidesjs' );
		wp_enqueue_script( 'gsap' );
	}
	
}

/**
 * Registers and enqueues theme styling.
 *
 * @return void
 * @author Ryan
 **/
function electrify_css()
{
	wp_enqueue_style( 'master', get_template_directory_uri() . '/_scss/style.css' );
	
	wp_register_style( 'listing', get_template_directory_uri() . '/_scss/components/listing.css' );
	if ( is_home() || is_archive() )
	{
		wp_enqueue_style( 'listing' );
	}
	
	wp_register_style( 'single', get_template_directory_uri() . '/_scss/components/single.css' );
	if ( ( is_singular() && ! is_page_template( 'showcase.php' ) ) || is_404() )
	{
		wp_enqueue_style( 'single' );
	}
	
	wp_register_style( 'blocks', get_template_directory_uri() . '/_scss/components/blocks.css' );
	if ( is_front_page() || is_page_template( 'showcase.php' ) )
	{
		wp_enqueue_style( 'blocks' );
	}
	
	wp_register_style( 'showcase', get_template_directory_uri() . '/_scss/components/showcase.css' );
	if ( is_page_template( 'showcase.php' ) )
	{
		wp_enqueue_style( 'showcase' );
	}
}

/**
 * Registers and enqueues theme scripts.
 *
 * @return void
 * @author Ryan
 **/
function electrify_js()
{
	
	wp_enqueue_script( 'navigation', get_template_directory_uri() . '/_coffee/nav.js', array( 'jquery' ), '', true );
	
	wp_register_script( 'slider', get_template_directory_uri() . '/_coffee/slider.js', array( 'jquery' ), '', true );
	wp_register_script( 'blocks_fade', get_template_directory_uri() . '/_coffee/blocks-fade.js', array( 'jquery', 'gsap', 'jquery_gsap' ), '', true );
	if ( is_front_page() || is_page_template( 'showcase.php' ) )
	{
		wp_enqueue_script( 'slider' );
	}
	
	wp_register_script( 'comments_reveal', get_template_directory_uri() . '/_coffee/comments-reveal.js', array( 'jquery' ), '', true );
	if ( is_single() )
	{
		wp_enqueue_script( 'comments_reveal' );
	}
	
}

add_action( 'wp_enqueue_scripts', 'electrify_lib' );
add_action( 'wp_enqueue_scripts', 'electrify_css' );
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

