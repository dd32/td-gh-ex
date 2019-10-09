<?php
/* 	D5 Creation Theme's Extra Sub Functions
	Copyright: 2012-2019, D5 Creation, www.d5creation.com
*/

// bbPress
if ( class_exists( 'bbPress' ) ) {
//	Increase the bbPress Avatar Size
	function associationx_bbp_change_avatar_size($author_avatar, $topic_id, $size) {
    	$author_avatar = '';
    	if ($size == 14) {
        	$size = 30;
    	}
    	if ($size == 80) {
        	$size = 110;
    	}
    	$topic_id = bbp_get_topic_id( $topic_id );
    	if ( !empty( $topic_id ) ) {
        	if ( !bbp_is_topic_anonymous( $topic_id ) ) {
            	$author_avatar = get_avatar( bbp_get_topic_author_id( $topic_id ), $size );
        	} else {
            	$author_avatar = get_avatar( get_post_meta( $topic_id, '_bbp_anonymous_email', true ), $size );
        	}
    	}
    	return $author_avatar;
	}

	/* Add priority (default=10) and number of arguments */
	add_filter('bbp_get_topic_author_avatar', 'associationx_bbp_change_avatar_size', 20, 3);
	add_filter('bbp_get_reply_author_avatar', 'associationx_bbp_change_avatar_size', 20, 3);
	add_filter('bbp_get_current_user_avatar', 'associationx_bbp_change_avatar_size', 20, 3);
}