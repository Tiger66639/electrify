<?php

/**
 * User Profile
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

	<?php do_action( 'bbp_template_before_user_profile' ); ?>

	<div id="bbp-user-profile" class="bbp-user-profile">
		<div class="bbp-user-section">
			
			<table class="bbp-user-profile-details">
				<tr class="bbp-user-forum-role">
					<td>
						<?php _e( 'Role', 'bbpress' ); ?>
					</td>
					<td>
						<?php bbp_user_display_role(); ?>
					</td>
				</tr>
				<tr class="bbp-user-topic-count">
					<td>
						<?php _e( 'Topics', 'bbpress' ); ?>
					</td>
					<td>
						<?php echo bbp_get_user_topic_count_raw(); ?>
					</td>
				</tr>
				<tr class="bbp-user-reply-count">
					<td>
						<?php _e( 'Replies', 'bbpress' ); ?>
					</td>
					<td>
						<?php echo bbp_get_user_reply_count_raw(); ?>
					</td>
				</tr>
			</table>

			<?php if ( false ): ?>
				<p class="bbp-user-forum-role"><?php  printf( __( 'Forum Role: %s',      'bbpress' ), bbp_get_user_display_role()    ); ?></p>
				<p class="bbp-user-topic-count"><?php printf( __( 'Topics Started: %s',  'bbpress' ), bbp_get_user_topic_count_raw() ); ?></p>
				<p class="bbp-user-reply-count"><?php printf( __( 'Replies Created: %s', 'bbpress' ), bbp_get_user_reply_count_raw() ); ?></p>
			<?php endif; ?>
			
			<?php if ( bbp_get_displayed_user_field( 'description' ) ) : ?>
				<p class="bbp-user-description">
					<?php bbp_displayed_user_field( 'description' ); ?>
				</p>
			<?php endif; ?>
			
		</div>
	</div><!-- #bbp-author-topics-started -->

	<?php do_action( 'bbp_template_after_user_profile' ); ?>
