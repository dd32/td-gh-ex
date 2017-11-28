
<?php 
class backyard_Custom_Radio_Image_Control extends WP_Customize_Control {
		
		/**
		 * Declare the control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'radio-image';
		
		/**
		 * Enqueue scripts and styles for the custom control.
		 * 
		 * Scripts are hooked at {@see 'customize_controls_enqueue_scripts'}.
		 * 
		 * Note, you can also enqueue stylesheets here as well. Stylesheets are hooked
		 * at 'customize_controls_print_styles'.
		 *
		 * @access public
		 */
		public function enqueue() {
			wp_enqueue_script( 'jquery-ui-button' );
		}
		
		/**
		 * Render the control to be displayed in the Customizer.
		 */
		public function render_content() {
			if ( empty( $this->choices ) ) {
				return;
			}			
			
			$name = '_customize-radio-' . $this->id;
			?>
			<span class="customize-control-title">
				<?php echo esc_attr( $this->label ); ?>
				<?php if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php endif; ?>
			</span>
			<div id="input_<?php echo $this->id; ?>" class="image">
				<?php 				
				foreach ( $this->choices as $value => $label ) :
				//echo'<pre>';print_r($label);
				
				 ?>
					<input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo $this->id . $value; ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
						<label for="<?php echo $this->id . $value; ?>">
							<a class="tooltip" data-tooltip="<?php echo esc_html( $label['label'] ); ?>"><img src="<?php echo esc_html( $label['url'] ); ?>"></a>
						</label>
					</input>
				<?php endforeach; ?>
			</div>
			<script>jQuery(document).ready(function($) { $( '[id="input_<?php echo $this->id; ?>"]' ).buttonset(); });</script>
			<?php
		}
}
/**
 * Multiple select customize control class.
 */
function backyard_customizer_custom_control_css() { 
wp_enqueue_style('custom-backyard-customizer-css', get_template_directory_uri().'/assets/css/backyard-customizer.css');
}
add_action( 'customize_controls_print_styles', 'backyard_customizer_custom_control_css' );
