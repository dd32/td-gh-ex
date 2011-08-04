<?php
/** Chip Life Comments Template */

/** Prevent Direct Access */
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'Please do not load this page directly. Thanks!' );
}

/** Password Protected */
if ( post_password_required() ) {
	printf( '<p class="nopassword">%s</p>', 'This post is password protected. Enter the password to view comments.' );
	return;
}

/** Comments Template */
do_action( 'chip_life_comments_before' );
do_action( 'chip_life_comments' );
do_action( 'chip_life_comments_after' );

do_action( 'chip_life_pings_before' );
do_action( 'chip_life_pings' );
do_action( 'chip_life_pings_after' );

do_action( 'chip_life_comment_form_before' );
do_action( 'chip_life_comment_form' );
do_action( 'chip_life_comment_form_after' );
?>