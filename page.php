<?php get_header(); ?>

<?php the_post(); ?>

<div class="c">
	<article id="a" <?php post_class(); ?>>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</article>
	<aside id="s">
		<?php get_sidebar(); ?>
	</aside>
</div>

<?php get_footer(); ?>
