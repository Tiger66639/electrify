<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="shortcut icon" href="<?php bloginfo( 'url' ); ?>/favicon.ico" type="image/x-icon" />
	<title><?php wp_title( ' |', true, 'right' ); ?> <?php bloginfo( 'name' ); ?>: <?php bloginfo( 'description' ); ?></title>
	<?php wp_head(); ?>
</head>

<?php global $add_body_class; ?>

<body class="<?php echo $add_body_class; ?>">
	
	<header id="header" class="w" data-ui-scheme="dark" data-img-background="true">
		<div id="header-c" class="c">
			<hgroup id="logo"><a href="<?php bloginfo( 'url' ); ?>">
				<h1><?php bloginfo( 'name' ); ?></h1>
				<h2><?php bloginfo( 'description' ); ?></h2>
			</a></hgroup>
			<?php
			
			$args = array(
				'theme_location'	=> 'nav_primary',
				'container'			=> false,
				'container_class'	=> false,
				'container_id'		=> 'nav-c',
				'menu_id'			=> 'nav'
				);
			
			wp_nav_menu( $args );
			
			?>
			<?php
			
			$args = array(
				'theme_location'	=> 'nav_mobile',
				'container'			=> 'div',
				'container_class'	=> false,
				'container_id'		=> 'nav-mobile-c',
				'menu_id'			=> 'nav-mobile'
			);
			
			wp_nav_menu( $args );
			
			?>
		</div>
		<!-- <form action="<?php bloginfo( 'url' ); ?>" method="GET" class="searchform collapsed" role="search" id="search-from-nav">
			<div class="group">
				<input class="control" type="text" value="<?php the_search_query(); ?>" placeholder="search" name="s">
				<button type="submit" class="icon-search">go</button>
			</div>
		</form> -->
	</header>
	<button id="nav-mobile-reveal">&equiv;</button>