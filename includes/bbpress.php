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
		'links' => array(
			// 'edit' => electrify_bbp_topic_admin_edit(),
			// 'merge' => electrify_bbp_topic_admin_merge(),
			// 'sticky' => electrify_bbp_topic_admin_sticky(),
			// 'close' => electrify_bbp_topic_admin_close(),
			// 'trash' => electrify_bbp_topic_admin_trash(),
			// 'spam' => electrify_bbp_topic_admin_spam(),
			// 'reply' => electrify_bbp_topic_admin_reply(),
		)
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


//	REPLY ADMIN LINKS
//

function electrify_bbp_reply_edit()
{
	return array(
		'link_before' => '<li class="reply-toolbar-edit">',
		'link_after' => '</li>',
		'edit_text' => '<span data-icon="edit"></span>',
	);
}
add_filter( 'bbp_before_get_reply_edit_link_parse_args', 'electrify_bbp_reply_edit' );

function electrify_bbp_reply_move()
{
	return array(
		'link_before' => '<li class="reply-toolbar-move">',
		'link_after' => '</li>',
		'split_text' => '<span data-icon="reply"></span>',
	);
}
add_filter( 'bbp_before_get_reply_move_link_parse_args', 'electrify_bbp_reply_move' );

function electrify_bbp_reply_split()
{
	return array(
		'link_before' => '<li class="reply-toolbar-split">',
		'link_after' => '</li>',
		'split_text' => '<span data-icon="xpost"></span>',
	);
}
add_filter( 'bbp_before_get_topic_split_link_parse_args', 'electrify_bbp_reply_split' );

function electrify_bbp_reply_trash()
{
	return array(
		'link_before' => '<li class="reply-toolbar-trash">',
		'link_after' => '</li>',
		'sep' => '',
		'trash_text' => '<span data-icon="trash"></span>',
		'delete_text' => '<span data-icon="unapprove"></span>',
		'restore_text' => '<span data-icon="refresh"></span>',
	);
}
add_filter( 'bbp_before_get_reply_trash_link_parse_args', 'electrify_bbp_reply_trash' );

function electrify_bbp_reply_spam()
{
	return array(
		'link_before' => '<li class="reply-toolbar-spam">',
		'link_after' => '</li>',
		'spam_text' => '<span data-icon="flag"></span>',
		'unspam_text' => '<span data-icon="close-alt"></span>',
	);
}
add_filter( 'bbp_before_get_reply_spam_link_parse_args', 'electrify_bbp_reply_spam' );


function electrify_bbp_reply_to()
{
	return array(
		'link_before' => '<li class="reply-toolbar-reply-to">',
		'link_after' => '</li>',
		'reply_text' => __( 'Reply', 'bbpress' ),
	);
}
add_filter( 'bbp_before_get_reply_to_link_parse_args', 'electrify_bbp_reply_to' );


function electrify_bbp_reply_admin()
{
	return array(
		'before' => '<ul class="reply-toolbar">',
		'after' => '</ul>',
		'sep' => '',
	);
}
add_filter( 'bbp_before_get_reply_admin_links_parse_args', 'electrify_bbp_reply_admin' );

//	WALKER REPLY GENERATION
//
function electrify_bbp_reply_walker()
{
	return array(
		'style' => 'div',
	);
}
add_filter( 'bbp_before_list_replies_parse_args', 'electrify_bbp_reply_walker' );
