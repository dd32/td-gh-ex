<?php
/**
 * Homepage Template
 *
 * @package Bexley
 */

	get_header();

	if ( have_posts() ) {
?>
	<div id="main-content">
<?php
		while ( have_posts() ) {
			the_post();
			get_template_part( 'content' );
		}

		bexley_numeric_pagination();
?>
	</div>
<?php
	} else {
		get_template_part( 'content-empty' );
	}

	get_footer();
