<form action="<?php bloginfo( 'url' ); ?>" method="GET" class="searchform" role="search">
	<div class="group">
		<input class="control" type="text" value="<?php the_search_query(); ?>" name="s">
		<button type="submit" class="icon-search">go</button>
	</div>
</form>