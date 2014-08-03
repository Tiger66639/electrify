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
					<?php if ( bbp_is_single_forum() ): ?>
						<li class="bbp-single-forum-subscribe">
							<?php bbp_forum_subscription_link(); ?>
						</li>
					<?php endif; ?>
					<?php if ( bbp_is_single_topic() ): ?>
						<li class="bbp-single-topic-subscribe">
							<?php bbp_topic_subscription_link(); ?>
						</li>
						<li class="bbp-single-topic-favorite">
							<?php bbp_topic_favorite_link( ); ?>
						</li>
						
						<?php bbp_topic_admin_links(); ?>
						
					<?php endif; ?>
					<?php if ( bbp_is_single_user() ): ?>
						
						<li>
							<a href="<?php bbp_user_profile_url(); ?>"
								class="<?php if ( bbp_is_single_user_profile() ) echo 'active'; ?>">
								<span data-icon="hierarchy"></span>
							</a>
						</li>
						
						<li>
							<a href="<?php bbp_user_topics_created_url(); ?>"
								class="<?php if ( bbp_is_single_user_topics() ) echo 'active'; ?>">
								<span data-icon="standard"></span>
							</a>
						</li>
						
						<li>
							<a href="<?php bbp_user_replies_created_url(); ?>"
								class="<?php if ( bbp_is_single_user_replies() ) echo 'active'; ?>">
								<span data-icon="comment"></span>
							</a>
						</li>
						
						<?php if ( bbp_is_favorites_active() ): ?>
							
							<li>
								<a href="<?php bbp_favorites_permalink(); ?>"
									class="<?php if ( bbp_is_favorites() ) echo 'active'; ?>">
									<span data-icon="heart"></span>
								</a>
							</li>
							
						<?php endif; ?>
						
						<?php if ( bbp_is_user_home() || current_user_can( 'edit_users' ) ): ?>
							
							<?php if ( bbp_is_subscriptions_active() ): ?>
								
								<li>
									<a href="<?php bbp_subscriptions_permalink(); ?>"
										class="<?php if ( bbp_is_subscriptions() ) echo 'active'; ?>">
										<span data-icon="subscribed"></span>
									</a>
								</li>
								
								<li>
									<a href="<?php bbp_user_profile_edit_url(); ?>"
										class="<?php if ( bbp_is_single_user_edit() ) echo 'active'; ?>">
										<span data-icon="edit"></span>
									</a>
								</li>
								
							<?php endif; ?>
							
						<?php endif; ?>
						
					<?php endif; ?>
				</ul>
			</nav>
			<nav class="interface-right">
				<ul>
					<li class="bbp-home">
						<a href="<?php bloginfo( 'url' ); ?>">
							<span data-icon="home"></span>
						</a>
					</li>
					<li class="bbp-forums">
						<a href="<?php bbp_forums_url(); ?>">
							<span data-icon="chat"></span>
						</a>
					</li>
					<li>
						<a href="<?php bbp_user_profile_url( wp_get_current_user()->ID ); ?>">
							<span data-icon="user"></span>
						</a>
						<!-- <?php //echo wp_get_current_user()->user_firstname; ?> -->
					</li>
					<?php if ( bbp_allow_search() ): ?>
						<li class="bbp-search">
							<a href="#">
								<span data-icon="search"></span>
							</a>
						</li>
					<?php endif; ?>
				</ul>
			</nav>
		</div>
		
		<?php if ( bbp_allow_search() ): ?>
			<?php bbp_get_template_part( 'form', 'search' ); ?>
		<?php endif; ?>
		
	</header>
	
	<main id="m-bbpress">
		
