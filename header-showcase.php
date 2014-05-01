<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="shortcut icon" href="<?php bloginfo( 'url' ); ?>/favicon.ico" type="image/x-icon" />
	<title><?php wp_title( ' |', true, 'right' ); ?> <?php bloginfo( 'name' ); ?>: <?php bloginfo( 'description' ); ?></title>
	<?php wp_head(); ?>
</head>
<?php
$add_body_class;
global $add_body_class; ?>

<body class="<?php echo $add_body_class; ?>">
	
	<header id="header" class="w f cf showcase" data-ui-scheme="dark" data-img-background="true">
		<div id="headerC" class="c f">
			<!-- <hgroup id="logo"><a href="<?php bloginfo( 'url' ); ?>">
				<h1><?php bloginfo( 'name' ); ?></h1>
				<h2><?php bloginfo( 'description' ); ?></h2>
			</a></hgroup> -->
			<?php
			
			$args = array(
				'theme_location'	=> 'nav_showcase',
				'container'			=> 'div',
				'container_id'		=> 'nav-showcase-c',
				'menu_id'			=> 'nav',
				'menu_class'		=> 'showcase'
				
			);
			
			wp_nav_menu( $args );
			
			$args = array(
				'theme_location'	=> 'nav_showcase',
				'container'			=> 'div',
				'container_id'		=> 'nav-mobile-c',
				'menu_id'			=> 'nav-mobile',
				'menu_class'		=> 'showcase'
				
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