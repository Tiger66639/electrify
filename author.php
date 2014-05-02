<?php get_header(); ?>

<div class="c">
	<h1><?php the_author(); ?></h1>
	<p class="archive-description"><?php the_author_meta( 'description' ); ?></p>
	<?php if ( have_posts() ): ?>
		
		<?php while ( have_posts() ): the_post(); ?>
			
			<?php get_template_part( 'content', 'listing' ); ?>
			
		<?php endwhile; ?>
		
	<?php endif; ?>
</div>

<?php get_footer(); ?>
