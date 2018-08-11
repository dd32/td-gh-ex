<?php
/**
 * The template part that shows the services on the front page.
 *
 * @package Bayn Lite
 */

?>
<section class="services section" tabindex="-1">

	<div class="section__content grid grid--4 grid--collapse">
		<?php
		for ( $index = 1; $index <= 4; $index ++ ) :
			$page_id = get_theme_mod( "front_page_service_page_$index" );
			if ( ! $page_id ) {
				continue;
			}
			$post = get_post( $page_id );
			setup_postdata( $post );
			$thumbnail = get_the_post_thumbnail_url( null, 'full' );
			?>
			<div class="service" style="background-image: url(<?php echo esc_url( $thumbnail ); ?>)">
				<div class="service__content">
					<?php the_title( '<h3 class="service__title">', '</h3>' ); ?>
					<?php the_content( esc_html__( 'Continue Reading &rarr;', 'bayn-lite' ) ); ?>
				</div>
			</div>
		<?php endfor; ?>
		<?php wp_reset_postdata(); ?>
	</div>

</section>
