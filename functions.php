<?php

// ERROR HANDLING

define( 'LIVE', true ); // Switch to true when site is live

if ( !LIVE ) {
	ini_set( 'display_errors', 1 );
	error_reporting( E_ALL );
}

// STABILITY
//
// (switch to true on stable versions, will usually load more advanced features such as compressed resources)

define( 'STABLE', false );


// MENUS
//
// --Add theme support

function enqueue_nav_menus() {

	$menus = array(
		'nav_primary' => __( 'Primary Navigation' ),
		'nav_mobile' => __( 'Mobile Navigation' ),
		'nav_showcase' => __( 'Showcase Navigation' )
	);

	register_nav_menus( $menus );

}

add_action( 'init', 'enqueue_nav_menus' );


// WIDGETS
//
// --Setup

function enqueue_widget( $name, $id, $description ) {
	$args = array(
		'name'			=> __( $name ),
		'id'            => $id,
		'description'   => $description,
		'before_widget' => '<section class="widget">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>'
	);

	register_sidebar( $args );
}

// --Creation

function create_widgets() {

	enqueue_widget( 'Footer - left column', 'footer_left', 'Displays in the footer, in the left column.' );
	enqueue_widget( 'Footer - center column', 'footer_center', 'Displays in the footer, in the center column.' );
	enqueue_widget( 'Footer - right column', 'footer_right', 'Displays in the footer, in the right column.' );
	
	enqueue_widget( 'Showcase Footer - left column', 'footer_showcase_left', 'Displays in the showcase footer only, in the left column.' );
	enqueue_widget( 'Showcase Footer - center column', 'footer_showcase_center', 'Displays in the showcase footer only, in the center column.' );
	enqueue_widget( 'Showcase Footer - right column', 'footer_showcase_right', 'Displays in the showcase footer only, in the right column.' );
	
	
	enqueue_widget( 'Sidebar', 'sidebar', 'Displays in the sidebar on every page that has a sidebar.' );
	enqueue_widget( 'Sidebar - pages', 'sidebar_page', 'Displays in the sidebar, but only on pages.' );
	enqueue_widget( 'Sidebar - posts', 'sidebar_post', 'Displays in the sidebar, but only on blog posts.' );
	
}

add_action( 'widgets_init', 'create_widgets' );



// COMPONENTS
//
// --Styles
function theme_css() {

	// General styles
	
	wp_enqueue_style( 'font', 'http://fonts.googleapis.com/css?family=Raleway:100' );
	
	wp_register_style( 'master', get_template_directory_uri() . '/_scss/master.css' );
	wp_register_style( 'master_compressed', get_template_directory_uri() . '/_res/master.css' );
	
	if ( STABLE ) {
		wp_enqueue_style( 'master_compressed' );
	} else {
		wp_enqueue_style( 'master' );
	}

	// Blocks styles
	
	wp_register_style( 'blocks', get_template_directory_uri() . '/_scss/extras/blocks.css' );
	wp_register_style( 'blocks_compressed', get_template_directory_uri() . '/_res/blocks.css' );
	
	if ( is_page( 'home' ) || is_page_template( 'showcase.php' ) ) {
		if ( STABLE ) {
			wp_enqueue_style( 'blocks_compressed' );
		} else {
			wp_enqueue_style( 'blocks' );
		}
	}

	// Listing styles (for search results, archives, blog)
	
	wp_register_style( 'listing', get_template_directory_uri() . '/_scss/extras/listing.css' );
	wp_register_style( 'listing_compressed', get_template_directory_uri() . '/_res/listing.css' );
	
	if ( is_home() || is_archive() || is_search() ) {
		if ( STABLE ) {
			wp_enqueue_style( 'listing_compressed' );
		} else {
			wp_enqueue_style( 'listing' );
		}
	}

	// Singular styles (for singular pages and the 404)
	
	wp_register_style( 'singular', get_template_directory_uri() . '/_scss/extras/single.css' );
	wp_register_style( 'singular_compressed', get_template_directory_uri() . '/_res/single.css' );
	
	if ( ( is_singular() && ! is_page( 'home' ) && ! is_page_template( 'showcase.php' ) ) || is_404() ) {
		if ( STABLE ) {
			wp_enqueue_style( 'singular_compressed' );
		} else {
			wp_enqueue_style( 'singular' );
		}
	}
	
	// Showcases
	
	wp_register_style( 'showcase', get_template_directory_uri() . '/_scss/extras/showcase.css' );
	wp_register_style( 'showcase_compressed', get_template_directory_uri() . '/_res/showcase.css' );
	
	if ( is_page_template( 'showcase.php' ) ) {
		if ( STABLE ) {
			wp_enqueue_style( 'showcase_compressed' );
		} else {
			wp_enqueue_style( 'showcase' );
		}
	}
	
}

add_action( 'wp_enqueue_scripts', 'theme_css' );

// --Scripts

function theme_js() {

	// General scripts
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/_js/modernizr-2.7.1.min.js', array(), '', true );
	
	// Social plugins
	wp_enqueue_script( 'gplus', 'https://apis.google.com/js/platform.js', array(), '', false );
	
	// Responsive navigation
	
	wp_register_script( 'navigation', get_template_directory_uri() . '/_js/nav.js', array( 'jquery' ), '', true );
	wp_register_script( 'navigation_compressed', get_template_directory_uri() . '/_res/nav.js', array( 'jquery' ), '', true );
	
	if ( STABLE ) {
		wp_enqueue_script( 'navigation_compressed' );
	} else {
		wp_enqueue_script( 'navigation' );
	}
	
	//	Blocks fade-in script (for homepage and showcase)
	
	wp_register_script( 'slidesjs', get_template_directory_uri() . '/_jquery/jquery.slidesjs.min.js', array( 'jquery' ), '', true );
	wp_register_script( 'blocks', get_template_directory_uri() . '/_js/blocks.js', array( 'jquery', 'slidesjs' ), '', true );
	wp_register_script( 'blocks_compressed', get_template_directory_uri(). '/_res/blocks.js', array( 'jquery', 'slidesjs' ), '', true );
	
	if ( is_page( 'home' ) || is_page_template( 'showcase.php' ) ) {
		wp_enqueue_script( 'slidesjs' );
		
		if ( STABLE ) {
			wp_enqueue_script( 'blocks_compressed' );
			
		} else {
			wp_enqueue_script( 'blocks' );
			
		}
		
	}
	
}

add_action( 'wp_enqueue_scripts', 'theme_js' );


// OTHER SETTINGS
// --Lengthen excerpt

function excerpt_lengthen() {
	
	return 100;
	
}

add_action( 'excerpt_length', 'excerpt_lengthen' );

// HELPERS
//