<?php
/**
 * Archive Template
 *
 * @package Bexley
 */


	get_header();

	if ( have_posts() ) {
?>
	<div class="title-container">
<?php

		if ( is_category() ) {
?>
		<h1 class="title"><?php printf( __( 'Category Archive for &#8216;%s&#8217;', 'bexley' ), single_cat_title( '', false ) ); ?></h1>
<?php
		} else if( is_tag() ) {
?>
		<h1 class="title"><?php printf( __( 'Tag Archive for &#8216;%s&#8217;', 'bexley' ), single_tag_title( '', false ) ); ?></h1>
<?php
		} else if ( is_day() ) {
?>
		<h1 class="title"><?php printf( __( 'Archive for %s', 'bexley' ), get_the_date( 'F jS, Y' ) ); ?></h1>
<?php
		} else if ( is_month() ) {
?>
		<h1 class="title"><?php printf( __( 'Archive for %s', 'bexley' ), get_the_date( 'F Y' ) ); ?></h1>
<?php
		} else if (is_year()) {
?>
		<h1 class="title"><?php printf( __( 'Archive for %s', 'bexley' ), get_the_date( 'Y' ) ); ?></h1>
<?php
		} else {
?>
		<h1 class="title"><?php _e( 'Blog Archives', 'bexley' ); ?></h1>
<?php
		}

		the_archive_description( '<div class="category_description">', '</div>' );

?>
	</div>
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
