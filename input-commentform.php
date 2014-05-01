<?php 

$fields = array(

	'author' => '
		<p class="group comment-form-author">
			<label for="comment-author" class="required">' . __( 'Name', 'domainreference' ) . '</label>' .
			'<input id="comment-author" class="control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />
		</p>',

	'email' => '
		<p class="group comment-form-email">
			<label for="comment-email" class="required">' . __( 'Email', 'domainreference' ) . '</label>' .
			'<input id="comment-email" class="control" name="email" type="text" value="' . esc_attr( $commenter['comment_name'] ) . '" ' . $aria_req . ' />
		</p>',

	'url' => '
		<p class="group comment-form-url">
			<label for="comment-url">' . __( 'Website', 'domainreference' ) . '</label>' .
			'<input id="comment-url" class="control" name="url" type="text" value="' . esc_attr( $commenter['comment_url'] ) . '" ' . $aria_req . ' />
		</p>'

	);

$args = array(

	'fields' => apply_filters( 'comment_form_default_fields', $fields ),

	'comment_field' => '
		<p class="commentC group large">
			<label class="required" for="comment">' . _x( 'Comment', 'noun' ) . '</label>
			<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
		</p>',

	'comment_notes_before' => '<p class="comment-notes">We promise not to give away your email. Required fields are marked in red.</p>',
	'comment_notes_after' => '',


	'id_form' => 'comment-form',
	'id_submit' => 'comment-submit',
	'title_reply' => __( 'Leave a Comment' ),
	'title_reply_to' => __( 'Leave a Reply for %s' ),
	'cancel_reply_link' => __( 'Cancel Reply' ),
	'label_submit' => __( 'Post Comment' )


	);

comment_form( $args );



?>