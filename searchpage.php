<?php // Template Name: Search ?>

<?php get_header(); ?>

<div class="c">
	<article id="a-search">
		<h1 class="section-header">Search</h1>
		<form role="search" method="get" class="form-group" action="<?php echo home_url( '/' ); ?>">
			<input type="text" value="" name="s">
		</form>
	</article>
</div>

<?php get_footer(); ?>
