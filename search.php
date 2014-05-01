<?php get_header(); ?>

<article id="main" class="aside">
	<div class="c f">
		<article id="article">
			<h1>Search: &ldquo;<?php the_search_query(); ?>&rdquo;</h1>
			
			<?php get_template_part( 'input', 'search' ); ?>
			
			<?php if ( have_posts() ) : ?>
				
				<?php while ( have_posts() ) : the_post(); ?>
				
					<?php get_template_part( 'content', 'listing' ); ?>
				
				<?php endwhile; ?>
				
					
			<?php else : ?>
				
				<p>We're sorry, but we couldn't find anything that matches your search. Want to try again?</p>
				
			<?php endif; ?>
			
			<?php get_template_part( 'input', 'search' ); ?>

		</article>
	</div>
</article>

<?php get_footer(); ?>