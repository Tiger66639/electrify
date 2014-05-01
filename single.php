<?php get_header(); ?>

<article id="main" class="aside">
	<div class="c f">
		<article id="article">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<h1><?php the_title(); ?></h1>
				<div class="post-breadcrumbs">
					<span class="icon home"><a href="<?php bloginfo( 'url' ); ?>/blog/">Return to Blog</a></span>
					<div class="post-meta">
						<span class="icon author"><?php the_author_posts_link(); ?></span> | 
						<span class="icon date"><a href="#"><?php the_date(); ?></a></span> | 
						<span class="icon comments"><a href="#"><?php comments_number( '0 comments', '1 comments', '% comments' ) ?></a></span>
					</div>
				</div>
				
				<div class="post-body">
					<?php the_content(); ?>
				</div>
				
				<div class="author-bio cf">
					
					<?php if ( $author_link = get_the_author_link() ) : ?>
						<a href="<?php get_the_author_link(); ?>" class="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
						</a>
					<?php endif; ?>
					
					<div class="author-bio-text">
						<h4><?php the_author(); ?></h4>
						<p><?php the_author_meta( 'description' ); ?></p>
						<p>More posts by <?php the_author_posts_link(); ?>
					</div>
					
				</div>
				<div class="post-end">
					<p class="icon home"><a href="<?php bloginfo( 'url' ); ?>/blog/">Return to Blog</a></p>
					<?php if ( get_the_category() ) : ?>
						<p class="icon category"><?php the_category( ', ' ); ?></p>
					<?php endif; ?>
					<?php if ( get_the_tags() ) : ?>
						<p class="icon tag"><?php the_tags( '', ', ', '' ); ?></p>
					<?php endif; ?>
				</div>

				<?php get_template_part( 'content', 'comments' ); ?>

				<?php get_template_part( 'input', 'commentform' ); ?>

			<?php endwhile; endif; ?>

		</article>
		<aside id="aside">
			<?php get_sidebar( 'post' ); ?>
			<?php get_sidebar(); ?>
		</aside>
	</div>
</article>

<?php get_footer(); ?>