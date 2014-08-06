<?php

/**
 * The Electrify assets manager
 */
class Electrify_Assets_Manager
{
	
	/**
	 * A mutlidimensional array containing references to styles
	 *
	 * @since 0.7
	 * @var Array (Array (mixed))
	 **/
	private $styles = array();
	
	/**
	* A mutlidimensional array containing references to scripts
	*
	* @since 0.7
	* @var Array (Array (mixed))
	**/
	private $scripts = array();
	
	
	function __construct()
	{
		add_action( 'wp_enqueue_scripts', array( $this, 'init' ) );
	}
	
	/**
	 * Register a style with WordPress.
	 *
	 * @param $slug
	 * @param $uri
	 **/
	public function style( $slug, $uri, $deps = array(), $vers = '3.8.1', $media = 'all' )
	{
		$this->styles[] = array(
			'slug' => $slug,
			'uri' => Electrify::$dir . $uri,
			'deps' => $deps,
			'vers' => $vers,
			'media' => $media,
		);
	}
	
	/**
	 * Register a script with WordPress.
	 *
	 */
	public function script( $slug, $uri, $deps = array(), $vers = '3.8.1', $footer = true )
	{
		$this->scripts[] = array(
			'slug' => $slug,
			'uri' => Electrify::$dir . $uri,
			'deps' => $deps,
			'vers' => $vers,
			'footer' => $footer,
		);
	}
	
	public function on( $condition, $do )
	{
		if ( $condition )
		{
			$do();
		}
	}
	
	private function init()
	{
		
		foreach ( $this->styles as $style )
		{
			wp_enqueue_style( $style['slug'], $style['uri'], $style['deps'], $style['vers'], $style['media'] );
		}
		unset( $style );
		
		foreach ( $this->scripts as $script )
		{
			wp_enqueue_script( $script['slug'], $script['uri'], $script['deps'], $script['vers'], $script['footer'] );
		}
		unset( $script );
		
	}
	
}
