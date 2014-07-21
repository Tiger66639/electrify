<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,user-scalable=no">
	<title><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo( 'title' ); ?> &mdash; <?php bloginfo( 'description' ); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header id="h-bbpress">
		<div class="c">
			<nav class="interface-left">
				<ul>
					<li class="bbp-back">
						<a href="<?php bloginfo( 'url' ); ?>">
							<span data-icon="previous"></span>
						</a>
					</li>
					<li class="bbp-title">
						<a href="<?php bbp_forums_url(); ?>">
							<span data-icon="home"></span>
						</a>
					</li>
				</ul>
			</nav>
			<nav class="interface-right">
				<ul>
					<li>
						<a href="<?php bbp_user_profile_url( wp_get_current_user()->ID ); ?>">
							<?php echo wp_get_current_user()->user_firstname; ?>
						</a>
					</li>
					<li class="bbp-search">
						<a href="#">
							<span data-icon="search"></span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
		
		<?php bbp_get_template_part( 'form', 'search' ); ?>
		
	</header>
	
	<main id="m-bbpress">
		
