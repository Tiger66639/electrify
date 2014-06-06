<?php get_header(); ?>

<?php

$slides_query = new WP_Query( array(
	'post_type' => 'slide',
	'orderby' => 'menu_order',
	'order' => 'ASC'
) );

?>

<section id="slider">
	<?php if ( $slides_query->have_posts() ): ?>
	
		<?php while ( $slides_query->have_posts() ): $slides_query->the_post(); ?>
		
			<?php if ( get_field( 'display' ) === 'slider' ): ?>
			
				<?php get_template_part( 'display', 'block' ); ?>
			
			<?php endif; ?>
		
		<?php endwhile; ?>
	
	<?php endif; ?>
</section>

<?php $slides_query->rewind_posts(); ?>

<?php if ( $slides_query->have_posts() ): ?>

	<?php while ( $slides_query->have_posts() ): $slides_query->the_post(); ?>
	
		<?php if ( get_field( 'display' ) !== 'slider' ): ?>
		
			<?php get_template_part( 'display', 'block' ); ?>
		
		<?php endif; ?>
	
	<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>
