<?php
/**
 * The template part that shows the contact_form on the front page.
 *
 * @package Bayn Lite
 */

$title = get_theme_mod( 'front_page_contact_title' );
$info  = get_theme_mod( 'front_page_contact_info' );
$post  = get_theme_mod( 'front_page_contact_page' );

if ( ! $title && ! $info && ! $post ) {
	return;
}

$background = '';
if ( $post ) {
	$post = get_post( $post );
	setup_postdata( $post );
	$background = get_the_post_thumbnail_url( null, 'full' );
}
?>
<div class="section contact"<?php echo $background ? ' style="background-image: url(' . esc_url( $background ) . ');"' : ''; ?>>
	<div class="container">
		<div class="grid grid--2">
			<?php if ( $title || $info ) : ?>
				<div class="contact-info">
					<h3 class="contact-info__title"><?php echo esc_html( $title ); ?></h3>
					<div class="contact-info__details">
						<?php echo wp_kses_post( wpautop( do_shortcode( $info ) ) ); ?>
					</div>
				</div>
			<?php endif; ?>
			<?php if ( $post ) : ?>
				<div class="contact-form-wrapper">
					<?php the_content( esc_html__( 'Continue Reading &rarr;', 'bayn-lite' ) ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php wp_reset_postdata();
