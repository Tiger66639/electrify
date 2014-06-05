<?php get_header(); ?>

<?php if ( have_posts() ): ?>
	
	<?php while ( have_posts() ): the_post(); ?>

			<div class="c">
				<article id="a">
				
					<h1><?php the_title(); ?></h1>
		
					<?php the_content(); ?>
				
				</article>
				<aside id="s">
					<ul class="widget post-meta">
						<li>
							<span data-icon="user"></span><?php the_author_posts_link(); ?>
						</li>
						<li>
							<span data-icon="month"></span><?php the_time( get_option( 'date_format' ) ); ?>
						</li>
						<li>
							<span data-icon="category"></span><?php the_category( ', ' ); ?>
						</li>
						<?php if ( get_the_tags() ): ?>
							<li>
								<span data-icon="tag"></span><?php the_tags( '', ', ', '' ); ?>
							</li>
						<?php endif; ?>
					</ul>
					<?php get_sidebar(); ?>
				</aside>
			</div>

		<?php endwhile; ?>
	
<?php endif; ?>

<?php get_footer(); ?>
