<?php

/**
 * Search Loop
 *
 * @package bbPress
 * @subpackage Theme
*/

?>

<?php do_action( 'bbp_template_before_search_results_loop' ); ?>

<div id="bbp-search-results" class="forums bbp-search-results">

	<section class="bbp-body">

		<?php while ( bbp_search_results() ) : bbp_the_search_result(); ?>

			<?php bbp_get_template_part( 'loop', 'single-' . get_post_type() ); ?>

		<?php endwhile; ?>

	</section><!-- .bbp-body -->

</div><!-- #bbp-search-results -->

<?php do_action( 'bbp_template_after_search_results_loop' ); ?>
