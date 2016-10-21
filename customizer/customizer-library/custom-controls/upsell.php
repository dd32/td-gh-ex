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

class Customizer_Library_Upsell extends WP_Customize_Control {

	/**
	 * Render the control's content.
	 *
	 * Allows the content to be overriden without having to rewrite the wrapper.
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	public function render_content() {
		?>
		<div class="kaira-upsell">
			<a href="<?php echo admin_url( 'themes.php?page=theme_info' ); ?>" target="_blank" class="kaira-upsell-btn"><?php echo __( 'Get TopShop Premium', 'topshop' ); ?></a>
            <div class="kaira-upsell-desc"><?php echo __( 'View the <a href="https://kairaweb.com/theme/topshop/#premium-features" target="_blank">TopShop Premium features</a>', 'topshop' ); ?></div>
		</div>
		<?php
	}

}