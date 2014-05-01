<?php

//	Template name: Database

?>

<?php get_header(); ?>

<article id="main" class="aside cf">
	<div class="c f">
		<article id="article">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<?php
				
				$args = array(
					
				);
				
				wp_list_authors( $args );
				
				?>
				
			<?php endwhile; endif; ?>
			
		</article>
		<aside id="aside">
			<?php get_sidebar(); ?>
			<?php get_sidebar( 'page' ); ?>
		</aside>
	</div>
</article>

<?php get_footer(); ?>