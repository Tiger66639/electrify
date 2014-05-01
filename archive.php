<?php get_header(); ?>

<article id="main" class="aside">
	<div class="c f">
		<article id="article">
	
			<h1>&ldquo;<?php single_cat_title(); ?>&rdquo;</h1>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'listing' ); ?>

			<?php endwhile; endif; ?>
		
		</article>
	</div>
</article>

<?php get_footer(); ?>