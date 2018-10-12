<?php
/**
 * This file provides the AGNCY custom layout control
 *
 * @package agncy
 */

if ( class_exists( 'WP_Customize_Control' ) ) {
	/**
	 * Class to create a custom layout control
	 */
	class Agncy_Layout_Control extends WP_Customize_Control {

		/**
		 * The type of control we need
		 *
		 * @var string
		 */
		public $type = 'agncy-layout';

		/**
		 * Render the content on the theme customizer page
		 */
		public function render_content() {
			$name = $this->id;
			?>
			<?php if ( ! empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php endif; ?>
			<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
		<?php endif; ?>
		<ul class="layout-list">
			<?php
			foreach ( $this->input_attrs as $id => $layout ) :
				$class = null;
				if ( isset( $layout['class'] ) ) {
					$class = $layout['class'];
				}
				?>
			<li class="layout-item <?php echo esc_attr( $class ); ?>">
				<label for="<?php echo esc_attr( $this->id . '-' . $id ); ?>">
					<input
						type="radio"
						name="<?php echo esc_attr( $name ); ?>"
						id="<?php echo esc_attr( $this->id . '-' . $id ); ?>"
						class="layout-radio"
						value="<?php echo esc_attr( $id ); ?>"
						<?php
							$this->link();
							checked( $this->value(), $id );
						?>
					/>

					<img
						src="<?php echo esc_url( $layout['icon'] ); ?>"
						alt="<?php echo esc_attr( $layout['name'] ); ?>"
					/>
					<span class="layout-name">
						<?php echo esc_attr( $layout['name'] ); ?>
					</span>
				</label>
			</li>
			<?php endforeach; ?>
		</ul>
			<?php
		}
	}
}
?>
