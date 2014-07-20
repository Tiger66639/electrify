<?php

/**
 * Builds the asset pipeline for Electrify, enqueuing CSS and JS files as needed.
 *
 **/
function electrify_assets()
{
	
	global $el_dir;
	
	//	Modernizr (dependency - JavaScript)
	//	Adds classes to <html> based on the features that a browser supports.
	//
	wp_register_script( 'modernizr', $el_dir . '/dependencies/modernizr-2.8.2.min.js', array(), '2.8.3', false );
	
	//	GSAP (dependency - JavaScript)
	//	Animation library that's a whole lot more efficient than jQuery.
	//
	wp_register_script( 'gsap', '//cdnjs.cloudflare.com/ajax/libs/gsap/1.12.1/TweenMax.min.js', array(), '1.12.1', true );
	wp_register_script( 'jquery_gsap', $el_dir . '/dependencies/jquery.gsap.min.js', array( 'jquery', 'gsap' ), '1.12.1', true );
	
	//	SlidesJS (dependency - JavaScript)
	//	A small, hackable slider library.
	//
	wp_register_script( 'slidesjs', $el_dir . '/dependencies/jquery.slidesjs.min.js', array( 'jquery' ), '3.0.4', true );
	
	
	
	//	Navigation (JavaScript)
	//	Progressively enhances the navigation components.
	//
	wp_register_script( 'navigation', $el_dir . '/_js/nav.js', array( 'jquery' ), '', true );
	
	//	Slider (JavaScript)
	//	Runs the slider for the homepage and showcase pages.
	//
	wp_register_script( 'slider', $el_dir . '/_js/slider.js', array( 'jquery', 'slidesjs', 'gsap', 'jquery_gsap' ), '', true );
	
	//	Comments reveal (JavaScript)
	//	Progressively enhances the commenting experience.
	//
	wp_register_script( 'comments_reveal', $el_dir . '/_js/comments-reveal.js', array( 'jquery' ), '', true );
	
	
	
	//	Master Stylesheet (CSS)
	//	Applies general styling, as well as styling for elements that appear on all pages.
	//
	wp_register_style( 'master', $el_dir . '/_css/style.css', array() );
	
	//	Listing (CSS)
	//	Styles blog landing page, archives, and search results.
	//
	wp_register_style( 'listing', $el_dir . '/_css/components/listing.css', array( 'master' ) );
	
	//	Singular (CSS)
	//	Styles single pages/posts and the 404 page.
	//
	wp_register_style( 'singular', $el_dir . '/_css/components/singular.css', array( 'master' ) );
	
	// Single (CSS)
	//	Styles single posts.
	//
	wp_register_style( 'single', $el_dir . '/_css/components/single.css', array( 'master' ) );
	
	//	Blocks (CSS)
	// Styles blocks on the homepage and showcase pages.
	//
	wp_register_style( 'blocks', $el_dir . '/_css/components/blocks.css', array( 'master' ) );
	
	//	Showcase (CSS)
	//	Styles showcase pages.
	//
	wp_register_style( 'showcase', $el_dir . '/_css/components/showcase.css', array( 'master' ) );
	
	//	Shame (CSS)
	//	A file for any changes developers want to make to the theme. Also for my own hacks.
	//	Acts like the theme's normal stylesheet, so it can be edited inside of WordPress.
	//
	wp_register_style( 'shame', get_stylesheet_uri(), array( 'master' ) );
	
	
	
	wp_enqueue_script( 'modernizr' );
	wp_enqueue_style( 'master' );
	wp_enqueue_script( 'navigation' );
	
	if ( is_home() || is_archive() || is_search() )
	{
		wp_enqueue_style( 'listing' );
	}
	
	if ( is_front_page() || is_page_template( 'showcase.php' ) )
	{
		wp_enqueue_style( 'blocks' );
		//wp_enqueue_script( 'slider' );
	}
	
	if ( is_page_template( 'showcase.php' ) )
	{
		wp_enqueue_style( 'showcase' );
	}
	
	if ( ( is_singular() && ! is_page_template( 'showcase' ) && ! is_front_page() ) || is_404() )
	{
		wp_enqueue_style( 'singular' );
	}
	
	if ( is_single() )
	{
		wp_enqueue_style( 'single' );
		wp_enqueue_script( 'comments_reveal' );
	}
	
	if ( is_bbpress() )
	{
		wp_dequeue_style( 'bbp-default' );
	}
	
	wp_enqueue_style( 'shame' );
	
}

add_action( 'wp_enqueue_scripts', 'electrify_assets' );
