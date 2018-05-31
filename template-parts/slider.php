<?php
/**
 * Template part to display slider on the front page.
 *
 * @package Bayn Lite
 */

$featured_posts = bayn_lite_get_featured_posts();
if ( empty( $featured_posts ) ) {
	return;
}
$speed = get_theme_mod( 'slider_speed', 500 );
?>
<div id="slider" data-speed="<?php echo esc_attr( $speed ); ?>" class="slider">
	<?php foreach ( $featured_posts as $post ) : ?>
		<?php setup_postdata( $post ); ?>
		<div class="slide">
			<?php
			the_post_thumbnail( 'full', array(
				'class' => 'slide__image',
			) );
			?>
			<div class="slide__content">
				<div class="slide__content__inner">
					<?php the_title( '<h2 class="slide__title">', '</h2>' ); ?>
					<div class="slide__text">
						<?php add_filter( 'the_content_more_link', '__return_empty_string' ); ?>
						<?php the_content(); ?>
						<?php remove_filter( 'the_content_more_link', '__return_empty_string' ); ?>
					</div>
					<div class="slide__more">
						<a class="button" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Continue Reading &rarr;', 'bayn-lite' ); ?></a>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	<?php wp_reset_postdata(); ?>
</div>
