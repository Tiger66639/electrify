<?php get_header(); ?>

<div class="c">
	<h1>&rdquo;<?php single_cat_title(); ?>&ldquo;</h1>
	<?php if ( have_posts() ): ?>
		
		<?php while ( have_posts() ): the_post(); ?>
			
			<section <?php post_class( 'post' ); ?>>
				<h2><?php the_title(); ?></h2>
				<div class="post-content">
					<div class="post-excerpt">
						<?php the_excerpt(); ?>
					</div>
					<ul class="post-meta">
						<li>
							<?php the_author_posts_link(); ?>
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
						<li>
							<a href="<?php the_permalink(); ?>">Continue reading</a>
						</li>
					</ul>
				</div>
			</section>
			
		<?php endwhile; ?>
		
	<?php endif; ?>
</div>

<?php get_footer(); ?>
