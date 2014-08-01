<?php

/**
 * User Roles Profile Edit Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div class="form-group">
	<label for="role"><?php _e( 'Blog Role', 'bbpress' ) ?></label>
	<?php bbp_edit_user_blog_role(); ?>
</div>

<div class="form-group">
	<label for="forum-role"><?php _e( 'Forum Role', 'bbpress' ) ?></label>
	<?php bbp_edit_user_forums_role(); ?>
</div>
