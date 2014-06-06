<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,user-scalable=no">
	<title><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo( 'title' ); ?> &mdash; <?php bloginfo( 'description' ); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header id="h-showcase">
		<div class="c">
			<?php
			
			wp_nav_menu( array(
				'menu' => get_field( 'menu' ),
				'container' => false,
				'container_class' => false,
				'container_id' => false,
				'menu_id' => 'n-showcase',
				'depth' => 1,
			) );
			
			?>
		</div>
		<a href="#" id="n-reveal">&equiv;</a>
	</header>
	<main id="m">
		