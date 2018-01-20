<?php
/**
 * Class to display upsells.
 *
 * @package atoz
 */
if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

/**
 * Class atoz_info
 */
class atoz_info extends WP_Customize_Control {

	/**
	 * The type of customize section being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'info';

	/**
	 * Control label
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $label = '';


	/**
	 * The render function for the controler
	 */
	public function render_content() {
		$links = array(
			array(
				'name' => __( 'Documentation','atoz' ),
				'link' => esc_url( 'https://dcrazed.com/docs/atoz/' ),
			),
			array(
				'name' => __( 'Demo','atoz' ),
				'link' => esc_url( 'http://atozdemo.dcrazed.com/' ),
			),
		); ?>


		<div class="atoz-theme-info">
			<?php
			foreach ( $links as $item ) {  ?>
				<a href="<?php echo esc_url( $item['link'] ); ?>" target="_blank"><?php echo esc_html( $item['name'] ); ?></a>
				<?php
			} ?>
		</div>
		<?php
	}
}
