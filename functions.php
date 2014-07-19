<?php

if ( ! function_exists( 'electrify_setup' ) )
{
	/**
	* Setup for the Electrify theme.
	*
	**/
	function electrify_setup()
	{
		
		//	Automatic support for adding feeds.
		//
		add_theme_support( 'automatic-feed-links' );
		
		//	HTML5 generation for elements.
		//
		add_theme_support( 'html5', array(
			'comment-list', 'comment-form', 'search-form', 'gallery', 'caption'
		) );
		
	}
}
add_action( 'after_setup_theme', 'electrify_setup' );

/**
 * Includes manager
 */
$includes = array(
	'plugins',
	'post-types',
	'post-meta',
	'sidebars',
	'assets',
);

foreach ( $includes as $include )
{
	require_once dirname( __FILE__ ) . '/' . $include . '.php';
}

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
