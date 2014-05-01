<?php get_header(); ?>

<article id="main" class="no-sidebar">
	<div class="c f">
		<article id="article">
			<h1>Blog</h1>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'listing' ); ?>
			
			<?php endwhile; endif; ?>
			<div class="listing-end cf">
				<?php get_template_part( 'ui', 'posts-scroll' ); ?>
			</div>
		</article>
	</div>
</article>

<?php get_footer(); ?>