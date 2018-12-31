<?php
/**
 * The template file to display the contact bar
 *
 * @package agncy
 */

// Assamble the array for the contact header.
$contact_information = array();
if ( get_theme_mod( 'contact_phone' ) ) {
	$contact_information[] = '<a href="tel:' . esc_attr( get_theme_mod( 'contact_phone' ) ) . '"><i class="fa fa-phone"></i> ' . esc_html( get_theme_mod( 'contact_phone' ) ) . '</a>';
}

if ( get_theme_mod( 'contact_mail' ) ) {
	$email                 = sanitize_email( get_theme_mod( 'contact_mail' ) );
	$contact_information[] = '<a href="mailto:' . antispambot( $email, 1 ) . '"><i class="fa fa-envelope"></i> ' . antispambot( $email ) . '</a>';
}

if ( get_theme_mod( 'contact_fb' ) ) {
	$contact_information[] = '<a href="' . esc_url( get_theme_mod( 'contact_fb' ) ) . '" target="_blank"><i class="fa fa-facebook-square"></i></a>';
}

if ( get_theme_mod( 'contact_twitter' ) ) {
	$contact_information[] = '<a href="' . esc_url( get_theme_mod( 'contact_twitter' ) ) . '" target="_blank"><i class="fa fa-twitter-square"></i></a>';
}

if ( get_theme_mod( 'contact_instagram' ) ) {
	$contact_information[] = '<a href="' . esc_url( get_theme_mod( 'contact_instagram' ) ) . '" target="_blank"><i class="fa fa-instagram"></i></a>';
}

if ( get_theme_mod( 'contact_youtube' ) ) {
	$contact_information[] = '<a href="' . esc_url( get_theme_mod( 'contact_youtube' ) ) . '" target="_blank"><i class="fa fa-youtube"></i></a>';
}

if ( ( is_array( $contact_information ) && count( $contact_information ) > 0 ) || has_action( 'agncy_contact_bar' ) ) : ?>
<div class="header-contact-wrapper">
	<div class="container header-contact-container hidden-xs hidden-sm">
		<div class="row">
			<div class="col-md-12 color-primary--a-hover">
				<span class="contact-item">
					<?php echo wp_kses_post( implode( '</span><span class="contact-item">', $contact_information ) ); ?>
				</span>
				<?php
					do_action( 'agncy_contact_bar' )
				?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
