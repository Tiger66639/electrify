<?php get_header(); ?>

<div class="c">
	<article id="a">
		<?php // if ( have_posts() ): ?>
			
			<?php // while ( have_posts() ): the_post(); ?>
				
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
				
				<?php // endwhile; ?>
			
		<?php // endif; ?>
	</article>
	<aside id="s">
		<ul class="widget post-meta">
			<li>
				<?php the_author(); ?>
			</li>
			<li>
				<?php the_time( get_option( 'date_format' ) ); ?>
			</li>
			<li>
				<?php the_category( ', ' ); ?>
			</li>
			<?php if ( get_the_tags() ): ?>
				<li>
					<?php the_tags( '', ', ', '' ); ?>
				</li>
			<?php endif; ?>
		</ul>
		<?php get_sidebar(); ?>
	</aside>
</div>

<?php get_footer(); ?>
