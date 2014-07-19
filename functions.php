<?php

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
