<?php

/**
 * Search Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>



<?php bbp_set_query_name( bbp_get_search_rewrite_id() ); ?>

<?php do_action( 'bbp_template_before_search' ); ?>

<?php if ( bbp_has_search_results() ) : ?>

	<?php bbp_get_template_part( 'pagination', 'search' ); ?>
		
		<div id="bbpress-forums">
			<?php bbp_get_template_part( 'loop', 'search' ); ?>
		</div>

	<?php bbp_get_template_part( 'pagination', 'search' ); ?>

<?php elseif ( bbp_get_search_terms() ) : ?>
	
	<div id="bbpress-forums">
		<?php bbp_get_template_part( 'feedback', 'no-search' ); ?>
	</div>

<?php endif; ?>

<?php do_action( 'bbp_template_after_search_results' ); ?>
