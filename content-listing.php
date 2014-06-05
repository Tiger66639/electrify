<section <?php post_class( 'post' ); ?>>
	<h2><?php the_title(); ?></h2>
	<div class="post-content">
		<div class="post-excerpt">
			<?php the_excerpt(); ?>
		</div>
		<ul class="post-meta">
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
			<li>
				<span data-icon="document"></span><a href="<?php the_permalink(); ?>">Continue reading</a>
			</li>
		</ul>
	</div>
</section>
