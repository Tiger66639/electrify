<?php

if ( !class_exists( 'Electrify' ) && function_exists( 'add_action' ) ):

/**
 * Wraps the Electrify theme functionality.
 *
 * @since 0.7
 */
class Electrify
{
	
	/**
	 * The Electrify assets manager
	 *
	 * @var Electrify_Assets_Manager
	 **/
	private $a;
	
	/**
	 * An array of PHP dependencies
	 *
	 * @var Array (string)
	 **/
	private $deps = array(
		'dependencies/tgm-dependencies/class-tgm-plugin-activation',
		'dependencies/advanced-custom-fields/acf',
		'classes/assets-manager',
	);
	
	/**
	 * Home directory of Electrify.
	 *
	 * @var string
	 **/
	public static $dir;
	
	function __construct()
	{
		
		//	Manage imports
		//
		foreach ( $this->deps as $inc )
		{
			require_once $inc . '.php';
		}
		
		$this::$dir = get_template_directory_uri();
		
		//	Initialize assets manager
		//
		$this->a = new Electrify_Assets_Manager();
		
		add_action( 'after_setup_theme',		array( $this, 'setup'			) );
		add_action( 'tgmpa_register',			array( $this, 'plugins'			) );
		add_action( 'excerpt_length',			array( $this, 'excerpt'			) );
		add_action( 'widgets_init',			array( $this, 'sidebars'		) );
		add_action( 'init',						array( $this, 'menus'			) );
		add_action( 'wp_enqueue_script',		array( $this, 'assets'			) );
		
		//$this->a->style( 'master', $this::$dir . '/_css/master.css' );
		
	}
	
	public function setup()
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
	
	/**
	 * Registers required plugins with TGMPA library.
	 *
	 **/
	public function plugins()
	{
		
		//	Set plugins
		//
		$plugins = array(
			
			// bbPress
			//
			array(
				'name' => 'bbPress',
				'slug' => 'bbpress',
				'required' => false,
				'version' => '2.5.4',
			),
			
			// Advanced Automatic Updates
			//
			array(
				'name' => 'Advanced Automatic Updates',
				'slug' => 'automatic-updater',
				'required' => false,
				'version' => '1.0.0',
			),
			
			// BackUpWordPress
			//
			array(
				'name' => 'BackUpWordPress',
				'slug' => 'backupwordpress',
				'required' => false,
				'version' => '2.6.0',
			),
			
			//	Google Analyticator
			//
			array(
				'name' => 'Google Analyticator',
				'slug' => 'google-analyticator',
				'required' => false,
				'version' => '6.4.0',
			),
			
			//	Yoast's WordPress SEO
			//
			array(
				'name' => 'WordPress SEO',
				'slug' => 'wordpress-seo',
				'required' => false,
				'version' => '1.5.0'
			),
			
		);
		
		// Configuration options
		//
		$config = array(
			
			'has_notices' => true,
			'is_automatic' => true,
			'dismissable' => false,
			
		);
		
		tgmpa( $plugins, $config );
		
	}
	
	/**
	 * Register theme sidebars with WordPress.
	 *
	 **/
	public function sidebars()
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
	
	/**
	 * Register theme menus with WordPress
	 *
	 **/
	public function menus()
	{
		
		register_nav_menus( array(
			'nav_primary' => __( 'Primary Navigation' ),
			'nav_mobile' => __( 'Mobile Navigation' ),
			'nav_admin' => __( 'Admin Navigation' ),
		) );
		
	}
	
	/**
	 * Registers and enqueues Electrify assets
	 *
	 **/
	public function assets()
	{
		//	Modernizr (dependency - JavaScript)
		//	Adds classes to <html> based on the features that a browser supports.
		//
		wp_register_script( 'modernizr', $this::$dir . '/dependencies/modernizr-2.8.2.min.js', array(), '2.8.3', false );
		
		//	GSAP (dependency - JavaScript)
		//	Animation library that's a whole lot more efficient than jQuery.
		//
		wp_register_script( 'gsap', '//cdnjs.cloudflare.com/ajax/libs/gsap/1.12.1/TweenMax.min.js', array(), '1.12.1', true );
		wp_register_script( 'jquery_gsap', $this::$dir . '/dependencies/jquery.gsap.min.js', array( 'jquery', 'gsap' ), '1.12.1', true );
		
		//	SlidesJS (dependency - JavaScript)
		//	A small, hackable slider library.
		//
		wp_register_script( 'slidesjs', $this::$dir . '/dependencies/jquery.slidesjs.min.js', array( 'jquery' ), '3.0.4', true );
		
		
		
		//	Navigation (JavaScript)
		//	Progressively enhances the navigation components.
		//
		wp_register_script( 'navigation', $this::$dir . '/_js/nav.js', array( 'jquery' ), '', true );
		
		//	Slider (JavaScript)
		//	Runs the slider for the homepage and showcase pages.
		//
		wp_register_script( 'slider', $this::$dir . '/_js/slider.js', array( 'jquery', 'slidesjs', 'gsap', 'jquery_gsap' ), '', true );
		
		//	Comments reveal (JavaScript)
		//	Progressively enhances the commenting experience.
		//
		wp_register_script( 'comments_reveal', $this::$dir . '/_js/comments-reveal.js', array( 'jquery' ), '', true );
		
		
		
		//	Master Stylesheet (CSS)
		//	Applies general styling, as well as styling for elements that appear on all pages.
		//
		wp_register_style( 'master', $this::$dir . '/_css/style.css', array() );
		
		//	Listing (CSS)
		//	Styles blog landing page, archives, and search results.
		//
		wp_register_style( 'listing', $this::$dir . '/_css/components/listing.css', array( 'master' ) );
		
		//	Singular (CSS)
		//	Styles single pages/posts and the 404 page.
		//
		wp_register_style( 'singular', $this::$dir . '/_css/components/singular.css', array( 'master' ) );
		
		// Single (CSS)
		//	Styles single posts.
		//
		wp_register_style( 'single', $this::$dir . '/_css/components/single.css', array( 'master' ) );
		
		//	Blocks (CSS)
		// Styles blocks on the homepage and showcase pages.
		//
		wp_register_style( 'blocks', $this::$dir . '/_css/components/blocks.css', array( 'master' ) );
		
		//	Showcase (CSS)
		//	Styles showcase pages.
		//
		wp_register_style( 'showcase', $this::$dir . '/_css/components/showcase.css', array( 'master' ) );
		
		
		//	bbPress navigation (JS)
		//	Adds JavaScript for navigation interactivity.
		//
		wp_register_script( 'bbp_navigation', $this::$dir . '/_js/_bbpress/nav.js', array( 'jquery' ), '', true );
		
		//	bbPress Master (CSS)
		//
		wp_register_style( 'bbp_master', $this::$dir . '/_css/_bbpress/bbpress.css', array( 'master' ) );
		
		
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
			wp_enqueue_script( 'slider' );
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
		
		if ( function_exists( 'is_bbpress' ) )
		{
			if ( is_bbpress() )
			{
				//	Because I don't want bbPress messing with my style.
				//
				wp_dequeue_style( 'bbp-default' );
				
				//	Because the Ajax in bbPress 2.5.4 is buggy as heck.
				//
				wp_dequeue_script( 'bbpress-topic' );
				wp_dequeue_script( 'bbpress-reply' );
				wp_dequeue_script( 'bbpress-user' );
				
				//	At last, my stuff.
				//
				wp_dequeue_script( 'navigation' ); // bbPress pages and regular pages use different scripts
				wp_enqueue_style( 'bbp_master' );
				wp_enqueue_script( 'bbp_navigation' );
			}
		}
		
		wp_enqueue_style( 'shame' );
	}
	
	/**
	 * Changes excerpt length for posts.
	 *
	 * @param type var Description
	 **/
	public function excerpt()
	{
		
		if ( is_front_page() )
			return 60;
		else
			return 120;
			
	}
	
}

endif; // class check

new Electrify();

/**
 * Includes manager
 */
$includes = array(
	'post-types',
	'post-meta',
	'bbpress',
	'assets',
);

foreach ( $includes as $include )
{
	require_once dirname( __FILE__ ) . '/includes/' . $include . '.php';
}
