<?php get_header(); ?>

<div class="c">
	<article id="a">
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</article>
	<aside id="s">
		<?php get_sidebar(); ?>
	</aside>
</div>

<?php get_footer(); ?>
