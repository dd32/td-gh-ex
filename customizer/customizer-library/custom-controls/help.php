<?php
/**
 * Customize for upsell button, extend the WP customizer
 *
 * @package 	Customizer_Library
 * @author		Devin Price, The Theme Foundry
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return NULL;
}

class Customizer_Library_Help extends WP_Customize_Control {

	/**
	 * Render the control's content.
	 *
	 * Allows the content to be overriden without having to rewrite the wrapper.
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	public function render_content() {
		$theme = wp_get_theme();
		$theme_name = $theme->get( 'TextDomain' ); ?>
		<div class="kaira-notes <?php echo ( is_child_theme() ) ? 'hide ' . sanitize_html_class( 'conica-note-' . $theme_name ) : ''; ?>">
            <div class="kaira-upsell-desc"><?php echo wp_kses_post( $this->description ); ?></div>
		</div>
		<?php
	}

}