<?php get_header(); ?>

<?php if ( have_posts() ): ?>
	
	<?php while ( have_posts() ): the_post(); ?>

			<div class="c">
				<article id="a">
				
					<h1><?php the_title(); ?></h1>
		
					<?php the_content(); ?>
					
					<hr class="end-content">
					
					<button id="reveal-comments-a"><?php comments_number( '0 comments...', '1 comment...', '% comments...' ); ?></button>
					
					<section id="reveal-comments">
					
						<?php comments_template(); ?>
					
						<?php
					
						$commenter = wp_get_current_commenter();
						$req = get_option( 'require_name_email' );
						$aria_req = ( $req ? " aria-required='true'" : '' );
						$required_text = ' Required fields are marked with yellow text.';
					
						comment_form(
					
						// $args
						array(
							// $fields
							'fields' => array(
								'author' =>
									'<div class="form-group commentform-author">
										<label for="commentform-author"' . ( $req ? ' class="required"' : '' ) . '>' . __( 'Name' ) . '</label>' .
										'<input id="commentform-author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . '>
									</div>',

								  'email' =>
									'<div class="form-group commentform-email">
										<label for="commentform-email"' . ( $req ? ' class="required"' : '' ) . '>' . __( 'Email' ) . '</label> ' .
										'<input id="commentform-email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '"' . $aria_req . '>
									</div>',

								  'url' =>
									'<div class="form-group commentform-url">
										<label for="commentform-url">' . __( 'Website' ) . '</label>
										<input id="commentform-url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '">
									</div>',
							),
						
							'comment_field' =>
								'<div class="form-group form-group-lg commentform-comment">
									<label for="commentform-comment" class="required">' . _x( 'Comment', 'noun' ) . '</label>
									<textarea id="commentform-comment" name="comment" aria-required="true"></textarea>
								</div>',
						
							'must_log_in' =>
								'<p class="commentform-must-log-in">' .
									sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) .
								'</p>',
						
							'logged_in_as' =>
								'<p class="commentform-logged-in-as">' .
									sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) .
								'</p>',
						
							'comment_notes_before' =>
								'<p class="commentform-notes">' .
									__( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
								'</p>',
						
							'comment_notes_after' =>	'',
							'id_form' =>				'commentform-reply',
							'id_submit' =>				'commentform-submit',
							'title_reply' =>			__( 'Leave a Comment' ),
							'title_reply_to' =>			__( 'Reply to<br>%s' ),
							'cancel_reply_link' =>		__( 'Cancel' ),
							'label_submit' =>			__( 'Post Comment' ),
						
						)
						
						);
					
						?>
						
					</section>
				
				</article>
				<aside id="s">
					<ul class="widget post-meta">
						<li>
							<span data-icon="user"></span><?php the_author_posts_link(); ?>
						</li>
						<li>
							<span data-icon="month"></span><?php the_time( get_option( 'date_format' ) ); ?>
						</li>
						<li>
							<span data-icon="category"></span><?php the_category( ', ' ); ?>
						</li>
						<?php if ( get_the_tags() ): ?>
							<li>
								<span data-icon="tag"></span><?php the_tags( '', ', ', '' ); ?>
							</li>
						<?php endif; ?>
						<li>
							<span data-icon="comment"></span><a href="<?php comments_link(); ?>"><?php comments_number( '0 comments', '1 comments', '% comments' ); ?></a>
						</li>
					</ul>
					<?php if ( $author_desc = get_the_author_meta( 'description' ) ): ?>
						<section class="widget author-meta">
							<h3>About <?php the_author(); ?></h3>
							<p><?php echo $author_desc; ?></p>
						</section>
					<?php endif; unset( $author_desc ); ?>
					<?php get_sidebar(); ?>
				</aside>
			</div>

		<?php endwhile; ?>
	
<?php endif; ?>

<?php get_footer(); ?>
