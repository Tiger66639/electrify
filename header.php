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
			<?php
			
			wp_nav_menu( array(
				'theme_location' => 'nav_primary',
				'container' => false,
				'container_class' => false,
				'container_id' => false,
				'menu_id' => 'n',
				'depth' => 2,
			) );
			
			?>
		</div>
		<?php
		
		wp_nav_menu( array(
			'theme_location' => 'nav_mobile',
			'container' => false,
			'container_class' => false,
			'container_id' => false,
			'menu_id' => 'n-mobile',
			'depth' => 1,
		) );
		
		?>
		<a href="#" id="n-reveal">&equiv;</a>
	</header>
	<main id="m">
