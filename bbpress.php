<?php

//	If the user is not logged in, redirect to the homepage.
//	In a later update, I may call into the Settings API to add
//	an option to change this from the admin area.
//
if ( ! is_user_logged_in() )
{
	wp_redirect( home_url(), 302 );
	exit;
}

?>

<?php get_header( 'bbpress' ); ?>

<?php the_post(); ?>

<div class="c">
	
	<?php the_content(); ?>
	
</div>

<?php get_footer( 'bbpress' ); ?>
