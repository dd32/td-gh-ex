<?php // phpcs:ignore
/**
 * Backdrop Core ( ImageRadio.php )
 *
 * @package     Backdrop Core
 * @copyright   Copyright (C) 2019. Benjamin Lu
 * @license     GNU General PUblic License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */
/**
 * Define namespace
 */
namespace SilverQuantum\Control;
use WP_Customize_Control;
/**
 * Regiser ImageRadio class
 */
class ImageRadio extends WP_Customize_Control {
	/**
	 * The version
	 *
	 * @since 1.0.0
	 * @access public
	 * @var string
	 */
	public static $version = '1.0.0';
	/**
	 * The type of customize control being rendered.
	 *
	 * @access public
	 * @since  1.0.0
	 * @var    string
	 */
	public $type = 'radio-image';
	/**
	 * The path to the backdrop directory.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $backdrop_path = '/vendor/benlumia007/backdrop-core/';
	/**
	 * Add our JavaScript and CSS to the Customizer.
	 *
	 * @access public
	 * @since  1.0.0
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_style( 'backdrop-image-radio-css', get_theme_file_uri( 'assets/css/image-radio.css' ), array(), $this::$version );
		wp_enqueue_script( 'backdrop-image-radio-js', get_theme_file_uri( 'assets/js/image-radio.js' ), array( 'jquery' ), $this::$version, true );
	}
	/**
	 * Loads the template
	 *
	 * @return void
	 */
	public function render_content() {
		if ( empty( $this->choices ) ) {
			return;
		}
		$name = '_customize-radio-' . $this->id;
		?>
		<span class="customize-control-title">
			<?php echo esc_attr( $this->label ); ?>
		</span>
		<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		<?php endif; ?>

		<div id="input_<?php echo esc_attr( $this->id ); ?>" class="image">
			<?php foreach ( $this->choices as $value => $label ) : ?>
					<label for="<?php echo esc_attr( $this->id . $value ); ?>">
						<input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_attr( $this->id . $value ); ?>" name="<?php echo esc_attr( $name ); ?>"
							<?php
								esc_attr( $this->link() );
								checked( $this->value(), esc_attr( $value ) );
							?>
						>
						<img src="<?php echo esc_url( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" title="<?php echo esc_attr( $value ); ?>">
					</label>
				</input>
			<?php endforeach; ?>
		</div>
		<?php
	}
}