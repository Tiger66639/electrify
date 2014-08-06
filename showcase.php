<?php //Template Name: Showcase ?>

<?php get_header( 'showcase' ); ?>

<?php

$blocks_query = new WP_Query( array(
	'post_type' => 'showcase_block',
	'meta_key' => 'page',
	'meta_value' => get_field( 'showcase_slug' ),
	'orderby' => 'menu_order',
	'order' => 'ASC',
) );

?>

<section id="slider">
	
	<?php if ( $blocks_query->have_posts() ): ?>
	
		<?php while ( $blocks_query->have_posts() ): $blocks_query->the_post(); ?>
		
			<?php if ( get_field( 'display' ) === 'slider' ): ?>
		
				<?php get_template_part( 'display', 'block' ); ?>
			
			<?php endif; ?>
		
		<?php endwhile; ?>
	
	<?php endif; ?>

</section>

<?php $blocks_query->rewind_posts(); ?>

<?php if ( $blocks_query->have_posts() ): ?>
	
	<?php while ( $blocks_query->have_posts() ): $blocks_query->the_post(); ?>
		
		<?php if ( get_field( 'display' ) !== 'slider' ): ?>
		
			<?php get_template_part( 'display', 'block' ); ?>
			
		<?php endif; ?>
		
	<?php endwhile; ?>
	
<?php endif; ?>

<?php get_footer( 'showcase' ); ?>
