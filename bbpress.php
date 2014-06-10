<?php get_header( 'bbpress' ); ?>

<?php the_post(); ?>

<div class="c">
	<article id="a-forums" <?php post_class(); ?>>
		
		<h1><?php the_title(); ?></h1>
		
		<?php the_content(); ?>
		
	</article>
</div>

<?php get_footer( 'bbpress' ); ?>

