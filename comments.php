<?php

/**
 * Electrify_Comment
 * Extends WordPress's Walker_Comment class
 * Generates HTML for comments
 *
 * 
 * @package default
 * @author Ryan
 */
class Electrify_Comment extends Walker_Comment
{
	
	// init classwide variables
	var $tree_type = 'comment';
	var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

	/** CONSTRUCTOR
	 * You'll have to use this if you plan to get to the top of the comments list, as
	 * start_lvl() only goes as high as 1 deep nested comments */
	function __construct() { ?>
		
		<h1 class="section-header"><?php comments_number( '0 comments', '1 comment', '% comments' ); ?> on <br>&ldquo;<?php the_title(); ?>&rdquo;</h1>
		<ul id="comments">
		
	<?php }
	
	/** START_LVL 
	 * Starts the list before the CHILD elements are added. Unlike most of the walkers,
	 * the start_lvl function means the start of a nested comment. It applies to the first
	 * new level under the comments that are not replies. Also, it appear that, by default,
	 * WordPress just echos the walk instead of passing it to &$output properly. Go figure.  */
	function start_lvl( &$output, $depth = 0, $args = array() ) {		
		$GLOBALS['comment_depth'] = $depth + 1; ?>

				<ul class="comments-replies">
	<?php }

	/** END_LVL 
	 * Ends the children list of after the elements are added. */
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 1; ?>

		</ul>
		
	<?php }
	
	/** START_EL */
	function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
		$depth++;
		$GLOBALS['comment_depth'] = $depth;
		$GLOBALS['comment'] = $comment; 
		$parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); ?>
		
		<li <?php comment_class( $parent_class ); ?> id="comment-<?php comment_ID(); ?>">
			
			<div class="comment-c">
				
				<ul class="comment-meta">
					<li class="comment-author">
						<?php echo get_comment_author_link(); ?>
						<?php //echo ( $args['avatar_size'] != 0 ? get_avatar( $comment, $args['avatar_size'] ) : '' ); ?>
					</li>
					<li class="comment-date">
						<?php comment_date(); ?>
					</li>
					<li class="comment-time">
						 <?php comment_time(); ?>
					</li>
					<?php if ( get_edit_comment_link() ): ?>
						<li class="comment-edit">
							<?php edit_comment_link( '<span data-icon="edit"></span>' ); ?>
						</li>
					<?php endif; ?>
					<li class="comment-reply">
						<?php
					
						$reply_args = array(
							'depth' => $depth,
							'max_depth' => $args['max_depth'],
							'reply_text' => '<span data-icon="reply-single"></span>'
						);
	
						comment_reply_link( array_merge( $args, $reply_args ) );
					
						?>
					</li>
					<li class="comment-permalink">
						<a href="<?php echo htmlspecialchars( get_comment_link( get_comment_ID() ) ); ?>"><span data-icon="link"></span></a>
					</li>
				</ul>

				<div class="comment-content">
					
					<?php if ( ! $comment->comment_approved ) : ?>
						<em class="comment-awaiting-moderation">Your comment is awaiting moderation.</em>
					
					<?php else: ?>
						<?php comment_text(); ?>
						
					<?php endif; ?>
				</div>
				
			</div>

	<?php }

	function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>
		
		</li>
		
	<?php }
	
	/** DESTRUCTOR
	 * I just using this since we needed to use the constructor to reach the top 
	 * of the comments list, just seems to balance out :) */
	function __destruct() { ?>
	
	</ul>

	<?php }
}

wp_list_comments( array(
	'walker' => new Electrify_Comment(),
) );
