<?php // Template Name: Showcase ?>

<?php

// Get the page slug
$permalink_exploded = explode( '/', get_permalink() );
end( $permalink_exploded );
$the_slug = prev( $permalink_exploded );

$args = array(
	'post_type'		=> 'block_showcase',
	'order'			=> 'ASC',
	'orderby'		=> 'title',
	'category_name'	=> 'showcase_' . $the_slug
);

$blocks_query = new WP_Query( $args );

?>

<?php get_header( 'showcase' ); ?>

<?php if ( have_posts() ) : while ( $blocks_query->have_posts() ) : $blocks_query->the_post(); ?>

	<?php get_template_part( 'content', 'block' ); ?>

<?php endwhile; endif; ?>

<?php get_footer( 'showcase' ); ?>