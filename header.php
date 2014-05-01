<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,user-scalable=no">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header id="h">
		<div class="c">
			<a href="<?php bloginfo( 'url' ); ?>" id="logo">
				<h1><?php bloginfo( 'name' ); ?></h1>
				<h2><?php bloginfo( 'description' ); ?></h2>
			</a>
			<ul id="n">
				
			</ul>
		</div>
		<ul id="n-mobile">
			
		</ul>
		<a href="#" id="n-reveal">&equiv;</a>
	</header>
	<main id="m">
