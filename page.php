<?php get_header(); ?>

<article id="main" class="aside cf">
	<div class="c f">
		<article id="article">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<h1><?php the_title(); ?></h1>
				
				<?php the_content(); ?>

			<?php endwhile; endif; ?>

		</article>
		<aside id="aside">
			<?php get_sidebar( 'page' ); ?>
			<?php get_sidebar(); ?>
		</aside>
	</div>
</article>

<?php get_footer(); ?>