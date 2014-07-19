<?php

/**
* Registers required/recommended plugins via the TGM Acitvation library.
*
* @return void
* @author Ryan
*/
require_once dirname( __FILE__ ) . '/../dependencies/tgm-dependencies/class-tgm-plugin-activation.php';

function electrify_plugins()
{
	$plugins = array(
		
		// bbPress
		array(
			'name' => 'bbPress',
			'slug' => 'bbpress',
			'required' => false,
			'version' => '2.5.4',
		),
		
		// Advanced Automatic Updates
		array(
			'name' => 'Advanced Automatic Updates',
			'slug' => 'automatic-updater',
			'required' => false,
			'version' => '1.0.0',
		),
		
	);
	
	$config = array(
		
		'has_notices' => true,
		'is_automatic' => true,
		
	);
	
	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'electrify_plugins' );
