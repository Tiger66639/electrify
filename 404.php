<?php get_header(); ?>

<article id="main" class="aside">
	<div class="c f">
		<article id="article">
				
				<h1>404 Not Found</h1>
				
				<p>We're sorry, but we can't seem to find what you're looking for. We sure hope we didn't break anything!</p>
				<p>How about you give the search engine a try?</p>
				<?php get_template_part( 'input', 'search' ); ?>

		</article>
		<aside id="aside">
			<?php get_sidebar( 'page' ); ?>
			<?php get_sidebar(); ?>
		</aside>
	</div>
</article>

<?php get_footer(); ?>