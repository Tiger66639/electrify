<?php

/**
 * Replies Loop - Single Reply
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<section id="post-<?php bbp_reply_id(); ?>" class="bbp-reply">
	<?php if ( ! bbp_is_topic( bbp_get_reply_id() ) ): ?>
		<header class="bbp-reply-header">
			<div>
				<hgroup class="bbp-reply-meta">
					<ul>
						<li class="bbp-reply-author">
							<?php do_action( 'bbp_theme_before_reply_author_details' ); ?>
							<?php bbp_reply_author_link( array( 'size' => 16, 'show_role' => true, ) ); ?>
							<?php do_action( 'bbp_theme_after_reply_author_details' ); ?>
						</li>
						<?php if ( bbp_is_user_keymaster() ) : ?>
							<?php do_action( 'bbp_theme_before_reply_author_admin_details' ); ?>
							<li class="bbp-reply-ip">
								<?php bbp_author_ip( bbp_get_reply_id() ); ?>
							</li>
							<?php do_action( 'bbp_theme_after_reply_author_admin_details' ); ?>
						<?php endif; ?>
						<li class="bp-reply-age">
							<a href="<?php bbp_reply_url(); ?>" class="bbp-reply-permalink">
								<?php bbp_reply_post_date( 0, true ); ?>
							</a>
						</li>
					</ul>
				</hgroup>
				<div class="bbp-reply-interface">
					<div class="bbp-reply-interface-c">
						<?php do_action( 'bbp_theme_before_reply_admin_links' ); ?>
						<?php bbp_reply_admin_links(); ?>
						<?php do_action( 'bbp_theme_after_reply_admin_links' ); ?>
					</div>
				</div>
			</div>
		</header>
	<?php else: ?>
		<header class="bbp-topic-header">
			<ul class="bbp-topic-header-c">
				<li class="bbp-topic-title">
					<?php bbp_reply_title(); ?>
				</li>
				<li class="bbp-topic-author">
					<?php do_action( 'bbp_theme_before_reply_author_details' ); ?>
					<?php bbp_reply_author_link( array( 'size' => 24, 'show_role' => true, ) ); ?>
					<?php do_action( 'bbp_theme_after_reply_author_details' ); ?>
				</li>
				<?php if ( bbp_is_user_keymaster() ) : ?>
					<?php do_action( 'bbp_theme_before_reply_author_admin_details' ); ?>
					<li class="bbp-topic-ip">
						<?php bbp_author_ip( bbp_get_reply_id() ); ?>
					</li>
					<?php do_action( 'bbp_theme_after_reply_author_admin_details' ); ?>
				<?php endif; ?>
				<li class="bp-topic-age">
					<a href="<?php bbp_reply_url(); ?>" class="bbp-reply-permalink">
						<?php bbp_reply_post_date( 0, true ); ?>
					</a>
				</li>
			</ul>
		</header>
	<?php endif; ?>
	
	<article <?php bbp_reply_class( 'bbp-reply-content' ); ?>>
		<?php do_action( 'bbp_theme_before_reply_content' ); ?>
		<?php bbp_reply_content(); ?>
		<?php do_action( 'bbp_theme_after_reply_content' ); ?>
	</article>
	
</section>

<?php if ( false ): ?>

<div id="post-<?php bbp_reply_id(); ?>" class="bbp-reply-header">

	<div class="bbp-meta">

		<span class="bbp-reply-post-date"><?php bbp_reply_post_date(); ?></span>

		<?php if ( false && bbp_is_single_user_replies() ) : ?>

			<span class="bbp-header">
				<?php _e( 'in reply to: ', 'bbpress' ); ?>
				<a class="bbp-topic-permalink" href="<?php bbp_topic_permalink( bbp_get_reply_topic_id() ); ?>"><?php bbp_topic_title( bbp_get_reply_topic_id() ); ?></a>
			</span>

		<?php endif; ?>

		<a href="<?php bbp_reply_url(); ?>" class="bbp-reply-permalink">#<?php bbp_reply_id(); ?></a>

		<?php do_action( 'bbp_theme_before_reply_admin_links' ); ?>

		<?php bbp_reply_admin_links(); ?>

		<?php do_action( 'bbp_theme_after_reply_admin_links' ); ?>

	</div><!-- .bbp-meta -->
	
	<div class="bbp-reply-author">

		<?php do_action( 'bbp_theme_before_reply_author_details' ); ?>

		<?php bbp_reply_author_link( array( 'show_role' => true, 'size' => 14, ) ); ?>

		<?php if ( bbp_is_user_keymaster() ) : ?>

			<?php do_action( 'bbp_theme_before_reply_author_admin_details' ); ?>

			<div class="bbp-reply-ip"><?php bbp_author_ip( bbp_get_reply_id() ); ?></div>

			<?php do_action( 'bbp_theme_after_reply_author_admin_details' ); ?>

		<?php endif; ?>

		<?php do_action( 'bbp_theme_after_reply_author_details' ); ?>

	</div><!-- .bbp-reply-author -->

</div><!-- #post-<?php bbp_reply_id(); ?> -->

<div <?php bbp_reply_class(); ?>>

	<div class="bbp-reply-content">

		<?php do_action( 'bbp_theme_before_reply_content' ); ?>

		<?php bbp_reply_content(); ?>

		<?php do_action( 'bbp_theme_after_reply_content' ); ?>

	</div><!-- .bbp-reply-content -->

</div><!-- .reply -->

<?php endif; ?>
