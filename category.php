<?php get_header(); ?>

<div class="c">
	<h1>&ldquo;<?php single_cat_title(); ?>&rdquo;</h1>
	<p class="archive-description"><?php echo get_the_category()[0]->description; ?></p>
	<?php if ( have_posts() ): ?>
		
		<?php while ( have_posts() ): the_post(); ?>
			
			<?php get_template_part( 'content', 'listing' ); ?>
			
		<?php endwhile; ?>
		
	<?php endif; ?>
</div>

<?php get_footer(); ?>
