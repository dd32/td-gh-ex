<?php
/**
 * The template part for displaying site contact information
 *
 * @package Aamla
 * @since 1.0.1
 */

$aamla_telephone = aamla_get_mod( 'aamla_tel_number' );
$aamla_email     = aamla_get_mod( 'aamla_email_id', 'email' );
?>
<div<?php aamla_attr( 'contact-wrapper' ); ?>>
	<div class="contact-container">
	<?php if ( $aamla_telephone ) : ?>
		<span<?php aamla_attr( 'contact-phone' ); ?>>
			<?php aamla_icon( [ 'icon' => 'phone' ] ); ?>
			<span<?php aamla_attr( 'phone-number' ); ?>>
				<?php echo $aamla_telephone; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</span>
		</span>
	<?php endif; ?>

	<?php if ( $aamla_email ) : ?>
		<span<?php aamla_attr( 'contact-email' ); ?>>
			<?php aamla_icon( [ 'icon' => 'email' ] ); ?>
			<span<?php aamla_attr( 'email-id' ); ?>>
				<?php echo $aamla_email; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</span>
		</span>
	<?php endif; ?>

	<?php
	if ( has_nav_menu( 'social' ) && ! aamla_get_mod( 'aamla_hide_social_icons_on_contact_bar', 'none' ) ) :
		aamla_nav_menu(
			'social-navigation',
			esc_html__( 'Social Navigation', 'aamla' ),
			[
				'menu_id'        => 'social-menu',
				'menu_class'     => 'nav-menu nav-menu--social',
				'theme_location' => 'social',
				'depth'          => 1,
				'link_before'    => '<span class="screen-reader-text">',
				'link_after'     => '</span>' . aamla_get_icon( [ 'icon' => 'chain' ] ),
			]
		);
	endif;
	printf( '<button class="contact-bar-scroll" type="button" aria-hidden="true"></button>' );
	?>
	</div>
</div>
<button aria-expanded="false" class="contact-toggle">
	<span class="contact-toggle-text"><?php esc_html_e( 'Contact Us', 'aamla' ); ?></span>
</button>
