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
