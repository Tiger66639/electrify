<?php get_header(); ?>

<article id="main" class="aside">
	<div class="c f">
		<article id="article">
	
			<h1>Author: <?php the_author(); ?></h1>
			<div class="listing-start cf">
				<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
				<p><?php the_author_meta( 'description' ); ?></p>
			</div>

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