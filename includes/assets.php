<?php

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
	
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/_lib/modernizr-2.8.2.min.js', array(), '', false );
	
	wp_register_script( 'gsap', '//cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js', array(), '', true );
	wp_register_script( 'slidesjs', get_template_directory_uri() . '/_lib/jquery.slidesjs.min.js', array( 'jquery', 'gsap' ), '', true );
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
	if ( is_home() || is_archive() || is_search() )
	{
		wp_enqueue_style( 'listing' );
	}
	
	wp_register_style( 'singular', get_template_directory_uri() . '/_scss/components/singular.css' );
	if ( ( is_singular() && ! is_page_template( 'showcase.php' ) ) || is_404() )
	{
		wp_enqueue_style( 'singular' );
	}
	
	wp_register_style( 'single', get_template_directory_uri() . '/_scss/components/single.css' );
	if ( is_single() )
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
	
	wp_register_script( 'slider', get_template_directory_uri() . '/_coffee/slider.js', array( 'jquery', 'gsap', 'jquery_gsap', 'modernizr', 'slidesjs' ), '', true );
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
