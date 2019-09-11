<?php
/**
 * The template part that shows the intro section on the front page.
 *
 * @package Bayn Lite
 */

$intro_page = get_theme_mod( 'front_page_intro_page' );
if ( ! $intro_page ) {
	return;
}

$post = get_post( $intro_page );
setup_postdata( $post );

?>
<section class="section intro u-text-center">
	<div class="container">
		<h2 class="section section__title u-text-uppercase"><?php the_title(); ?></h2>
		<div class="section__content"><?php the_content(); ?></div>
	</div>
</section>
