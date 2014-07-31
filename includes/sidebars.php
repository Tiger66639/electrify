<?php

/**
* Registers navigation menus.
*
* @return void
* @author Ryan
**/
function electrify_nav_menus()
{

	register_nav_menus( array(
		'nav_primary' => __( 'Primary Navigation' ),
		'nav_mobile' => __( 'Mobile Navigation' ),
		'nav_admin' => __( 'Admin Navigation' ),
	) );

}

add_action( 'init', 'electrify_nav_menus' );

/**
* Adds sidebar locations.
*
*/
function electrify_sidebars()
{
	$sidebars = array(
		
		array(
			'footer_left',
			'Footer - left column',
			'Displays in the footer, in the left column.',
		),
		
		array(
			'footer_center',
			'Footer - center column',
			'Displays in the footer, in the center column.',
		),
		
		array(
			'footer_right',
			'Footer - right column',
			'Displays in the footer, in the right column.',
		),
		
		array(
			'footer_showcase_left',
			'Showcase footer - left column',
			'Displays in the showcase footer, in the left column.',
		),
		
		array(
			'footer_showcase_center',
			'Showcase footer - center column',
			'Displays in the showcase footer, in the center column.',
		),
		
		array(
			'footer_showcase_right',
			'Showcase footer - right column',
			'Displays in the showcase footer, in the right column.',
		),
		
		array(
			'footer_bbp_left',
			'Forums footer - left column',
			'Displays in the forums footer, in the left column.',
		),
		
		array(
			'footer_bbp_center',
			'Forums footer - center column',
			'Displays in the forums footer, in the center column.',
		),
		
		array(
			'footer_bbp_right',
			'Forums footer - right column',
			'Displays in the forums footer, in the right column.',
		),
		
		array(
			'sidebar',
			'Main Sidebar',
			'Displays in the sidebar on most posts.',
		),
		
	);
	
	foreach ( $sidebars as $sidebar )
	{
		register_sidebar( array(
			'id'            => $sidebar[0],
			'name'			 => __( $sidebar[1], 'electrify' ),
			'description'   => $sidebar[2],
			'before_widget' => '<section class="widget">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		) );
	}
	
}

add_action( 'widgets_init', 'electrify_sidebars' );
