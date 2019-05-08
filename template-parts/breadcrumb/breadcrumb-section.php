<?php
/**
 * Shows breadcrumb
 *
 * @package Academic Hub
 */

// If we are front page or blog page, return.
if ( is_front_page() || is_home() ) {
	return;
}
$title = get_the_title(get_the_ID()); 
?>
<!-- Academic Hub Breadcrumb  -->
<nav id="academic-breadcrumb" class="breadcrumb-trail breadcrumbs">
	<?php
	breadcrumb_trail( array(
		'container'   => 'div',
		'before'      => '<div class="academic-hub-breadcrumb">',
		'after'       => '</div>',
		'show_browse' => false,
	) );
	?>
</nav>
