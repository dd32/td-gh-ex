<?php

/**************** content-single.php *********************/

/**
 *
 * HTML context: before '<article>'
 */
function beam_before_article() {
	do_action( 'beam_before_article' );
}

/**
 *
 * HTML context: after '<article>'
 */
function beam_after_article() {
	do_action( 'beam_after_article' );
}

/**************** footer.php *********************/

/**
 *
 * HTML context: before '<footer>'
 */
function beam_before_footer() {
	do_action( 'beam_before_footer' );
}

/**
 *
 * HTML context: before '<footer> widgets area'
 */
function beam_before_footer_widget() {
	do_action( 'beam_before_footer_widget' );
}

/**
 *
 * HTML context: after '<footer> widgets area'
 */
function beam_after_footer_widget() {
	do_action( 'beam_after_footer_widget' );
}

/**
 *
 * HTML context: before 'footer nav area'
 */
function beam_before_footer_nav() {
	do_action( 'beam_before_footer_nav' );
}

/**
 *
 * HTML context: after 'footer nav area'
 */
function beam_after_footer_nav() {
	do_action( 'beam_after_footer_nav' );
}

/**
 *
 * HTML context: after '<footer>'
 */
function beam_after_footer() {
	do_action( 'beam_after_footer' );
}

/**************** header.php *********************/

/**
 *
 * HTML context: before '<header>'
 */
function beam_before_header() {
	do_action( 'beam_before_header' );
}
/* EXAMPLE - Uncomment the following code to see it in action */
/*
add_action( 'beam_before_header', 'beam_example' );

function beam_example() {
  echo '<div></div><!-- beam_before_header action example -->
';
}
*/

/**
 *
 * HTML context: before 'branding' (logo or site name)
 */
function beam_before_branding() {
	do_action( 'beam_before_branding' );
}

/**
 *
 * HTML context: after 'branding' (logo or site name)
 */
function beam_after_branding() {
	do_action( 'beam_after_branding' );
}

/**
 *
 * HTML context: after '<nav>'
 */
function beam_after_nav() {
	do_action( 'beam_after_nav' );
}

/**
 *
 * HTML context: after '<header>'
 */
function beam_after_header() {
	do_action( 'beam_after_header' );
}


/**************** sidebar.php *********************/

/**
 *
 * HTML context: before '<aside>' inside id=secondary
 */
function before_sidebar() {
	do_action( 'before_sidebar' );
}

/**
 *
 * HTML context: before '<aside>' in the second sidebar
 */
function before_sidebar_ter() {
	do_action( 'before_sidebar_ter' );
}

/**************** single.php *********************/

/**
 *
 * HTML context: before 'single' template part
 */
function beam_before_content_single() {
	do_action( 'beam_before_content_single' );
}

/**
 *
 * HTML context: after 'single' template part
 */
function beam_after_content_single() {
	do_action( 'beam_after_content_single' );
}

/**
 *
 * HTML context: before content navigational links
 */
function beam_before_content_nav() {
	do_action( 'beam_before_content_nav' );
}

/**
 *
 * HTML context: after content navigational links
 */
function beam_after_content_nav() {
	do_action( 'beam_after_content_nav' );
}