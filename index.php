<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article id="main" class="aside">
		<div class="c f">
			<article id="article">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</article>
			<aside id="aside">
				<?php get_sidebar( 'page' ); ?>
			</aside>
		</div>
	</article>

<?php endwhile; endif; ?>

<?php get_footer(); ?>