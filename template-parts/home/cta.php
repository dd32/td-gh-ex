<?php
/**
 * The template part for displaying cta section on front page
 *
 * @package Bayn Lite
 */

$front_page_cta_text_default = '<h3>BECOME AN INSTRUCTION?</h3>
								Lorem Ipsum is simply dummy text of the printing and typesetting industry.';

$cta_text = get_theme_mod( 'cta_text', $front_page_cta_text_default );
$cta_link_url = get_theme_mod( 'cta_link_url' );
$cta_link_text = get_theme_mod( 'cta_link_text', __( 'Get Started Now', 'bayn-lite' ) )
?>

<?php if ( ! empty( $cta_text ) ) : ?>
<section class="section section--cta">
	<div class="container">
		<div class="section--cta__text">
			<?php echo wp_kses_post( wpautop( $cta_text ) ); ?>
		</div>
		<div class="section--cta__link">
			<a class="button" href="<?php echo esc_url( $cta_link_url ); ?>" alt="<?php echo esc_html( $cta_link_text ); ?>"  class="button-minimal">
				<?php echo esc_html( $cta_link_text ); ?>
			</a>
		</div>
	</div>
</section>
<?php endif; ?>
