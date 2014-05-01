<section class="post">
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<div class="post-content">
		<div class="post-text">
			<?php the_excerpt(); ?>
		</div>
		<ul class="post-links">
			<li class="icon author"><?php the_author_posts_link(); ?></li>
			<li class="icon date"><?php the_date(); ?></li>
			<?php if ( get_categories() ): ?>
				<li class="icon category"><?php the_category( ', ' ); ?>
			<?php endif; ?>
			<?php if ( get_the_tags() ) : ?>
				<li class="icon tag"><?php the_tags( '', ', ', '' ); ?></li>
			<?php endif; ?>
			<li class="icon comments"><a href="<?php comments_link(); ?>"><?php comments_number( '0 comments', '1 comment', '% comments' ) ?></a></li>
			<li class="icon article"><a href="<?php the_permalink(); ?>">Continue reading</a></li>
		</ul>
	</div>
</section>