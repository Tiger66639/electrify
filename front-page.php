<?php get_header(); ?>

<section id="slider" data-ui-scheme="dark" data-img-background="true">
	
	<?php
	
	$args = array(
		'post_type' => 'slide',
		'order' => 'ASC',
		'orderby' => 'title'
	);
	$blocks_query = new WP_Query( $args );
	
	?>
	
	<?php if ( have_posts() ) : while ( $blocks_query->have_posts() ) : $blocks_query->the_post(); ?>
		
		<?php if ( get_field( 'display' ) == 'slider' ) : ?>
			
			<?php get_template_part( 'content', 'block' ); ?>
		
		<?php endif; ?>
	
	<?php endwhile; endif; ?>
	
</section>

<?php if ( have_posts() ) : while ( $blocks_query->have_posts() ) : $blocks_query->the_post(); ?>
	
	<?php if ( get_field( 'display' ) != 'slider' ) : ?>
		
		<?php get_template_part( 'content', 'block' ); ?>
		
	<?php endif; ?>
	
<?php endwhile; endif; ?>

<?php get_footer(); ?>