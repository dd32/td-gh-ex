<?php
/**
 * Site Identity
 *
 * Template part for rendering site name, tagline and logo
 *
 * @package ariel
 */
?>
<div class="logo">
	
		<?php
			/**
			 * Make sure we see the change between image and text in customizer preview
			 * on selective refresh
			 */
			if ( function_exists( 'get_theme_mod' ) || is_customize_preview() ) :
				/**
				 * Check if we want to show the logo
				 */
				if ( ariel_get_option( 'ariel_image_logo_show' ) ) :
					/**
					 * If we do, in fact, have an image
					 * show it
					 */
					if ( has_custom_logo() ) :
						if ( function_exists( 'the_custom_logo' ) ) :
							the_custom_logo();
						endif;
					/**
					 * If no image is selected and options
					 * are set to show logo, show text logo instead
					 */
					else :
						ariel_site_identity_text();
					endif;
				/**
				 * If logo should be hidden
				 */
				else :
					ariel_site_identity_text();
				endif; // ariel_get_option( 'ariel_image_logo_show' )
			endif; //  function_exists( 'get_theme_mod' ) || is_customize_preview()
		?>
	

	<?php if ( display_header_text() ) : ?>
		<p class="header-logo-tagline">
			<?php if ( get_bloginfo( 'description' ) ) :
					echo esc_html( get_bloginfo( 'description' ) );
				endif; ?>
		</p>
	<?php endif; ?>
</div><!-- logo -->