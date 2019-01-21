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
?>
<!-- Academic Hub Breadcrumb  -->
<nav id="breadcrumb" class="academic-hub-breadcrumb academic-hub-breadcrumb--light">
	<?php
	breadcrumb_trail( array(
		'container'   => 'div',
		'before'      => '<div class="academic-hub-breadcrumb">',
		'after'       => '</div>',
		'show_browse' => false,
	) );
	?>
</nav>