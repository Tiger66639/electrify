<?php

//	FAVORITE LINKS
//
function electrify_bbp_favorite()
{
	return array(
		'favorite' => '<span data-icon="heart"></span>',
		'favorited' => '<span data-icon="checkmark"></span>',
	);
}
add_filter( 'bbp_before_get_forum_favorite_link_parse_args', 'electrify_bbp_favorite' );

//	SUBSCRIBE LINKS
//
function electrify_bbp_forum_subscribe()
{
	return array(
		'before' => '',
		'subscribe' => '<span data-icon="subscribe"></span>',
		'unsubscribe' => '<span data-icon="unsubscribe"></span>',
	);
}
add_filter( 'bbp_before_get_forum_subscribe_link_parse_args', 'electrify_bbp_forum_subscribe' );

//	ADMIN TOOLBAR
//

function electrify_bbp_topic_admin()
{
	return array(
		'before' => '',
		'after' => '',
		'sep' => '',
	);
}
add_filter( 'bbp_before_get_topic_admin_links_parse_args', 'electrify_bbp_topic_admin' );

function electrify_bbp_topic_admin_edit()
{
	return array(
		'before' => '<li class="bbp-topic-admin-edit">',
		'after' => '</li>',
		'edit_text' => '<span data-icon="edit"></span>',
	);
}
add_filter( 'bbp_before_get_topic_edit_link_parse_args', 'electrify_bbp_topic_admin_edit' );

function electrify_bbp_topic_admin_merge()
{
	return array(
		'before' => '<li class="bbp-topic-admin-merge">',
		'after' => '</li>',
		'merge_text' => '<span data-icon="xpost"></span>',
	);
}
add_filter( 'bbp_before_get_topic_merge_link_parse_args', 'electrify_bbp_topic_admin_merge' );

function electrify_bbp_topic_admin_sticky()
{
	return array(
		'before' => '<li class="bbp-topic-admin-sticky">',
		'after' => '</li>',
		'stick_text' => '<span data-icon="pinned"></span>',
		'unstick_text' => '<span data-icon="checkmark"></span>',
		'super_text' => '<span data-icon="attachment"></span>',
	);
}
add_filter( 'bbp_before_get_topic_stick_link_parse_args', 'electrify_bbp_topic_admin_sticky' );

function electrify_bbp_topic_admin_close()
{
	return array(
		'before' => '<li class="bbp-topic-admin-close">',
		'after' => '</li>',
		'close_text' => '<span data-icon="close"></span>',
		'open_text' => '<span data-icon="document"></span>',
	);
}
add_filter( 'bbp_before_get_topic_close_link_parse_args', 'electrify_bbp_topic_admin_close' );



function electrify_bbp_topic_admin_trash()
{
	return array(
		'before' => '<li class="bbp-topic-admin-trash">',
		'after' => '</li>',
		'sep' => '',
		'trash_text' => '<span data-icon="trash"></span>',
		'delete_text' => '<span data-icon="unapprove"></span>',
		'restore_text' => '<span data-icon="refresh"></span>',
	);
}
add_filter( 'bbp_before_get_topic_trash_link_parse_args', 'electrify_bbp_topic_admin_trash' );

function electrify_bbp_topic_admin_spam()
{
	return array(
		'before' => '<li class="bbp-topic-admin-spam">',
		'after' => '</li>',
		'sep' => '',
		'spam_text' => '<span data-icon="flag"></span>',
		'unspam_text' => '<span data-icon="close-alt"></span>',
	);
}
add_filter( 'bbp_before_get_topic_spam_link_parse_args', 'electrify_bbp_topic_admin_spam' );


function electrify_bbp_topic_admin_reply()
{
	return array(
		'before' => '<li class="bbp-topic-admin-reply">',
		'after' => '</li>',
		'reply_text' => '<span data-icon="reply-single"></span>',
	);
}
add_filter( 'bbp_before_get_topic_reply_link_parse_args', 'electrify_bbp_topic_admin_reply' );
