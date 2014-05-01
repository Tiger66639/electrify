<?php

$args = array(
	'post_id' => get_the_ID(),
	'status' => 'approve'
	);

?>
<ol class="commentlist" id="comments">
	<h3 class="icon comments">Comments</h3>
	<?php if ( $comments = get_comments( $args ) ) : // Yes, I know, there's a single = there. It's supposed to be like that. ?> 
	
			<?php

			$args = array(
				'per_page' => 10,
				'reverse_top_level' => false
				);

			wp_list_comments( $args, $comments );

			?>
	
	<?php else: ?>
		<p>We haven't received any comments on this post yet. Be the first!</p>
	<?php endif; ?>
</ol>