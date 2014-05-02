<?php get_header(); ?>

<div class="c">
	<h1>&rdquo;<?php single_cat_title(); ?>&ldquo;</h1>
	<?php if ( have_posts() ): ?>
		
		<?php while ( have_posts() ): the_post(); ?>
			
			<?php get_template_part( 'content', 'listing' ); ?>
			
		<?php endwhile; ?>
		
	<?php endif; ?>
</div>

<?php get_footer(); ?>
