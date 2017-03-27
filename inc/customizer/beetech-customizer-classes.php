<?php
/**
 * @package beetech
 */

if ( class_exists( 'WP_Customize_Control' ) ) {
    
    /** Switch Button **/
    class beetech_Customize_Switch_Control extends WP_Customize_Control {

		public $type = 'switch';

		public function render_content() {
	?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<div class="description customize-control-description"><?php echo esc_html( $this->description ); ?></div>
		        <div class="switch_button">
		        	<?php 
		        		$show_choices = $this->choices;
		        		foreach ( $show_choices as $key => $value ) {
		        			echo '<span class="switch_part '.esc_attr($key).'" data-switch="'.esc_attr($key).'">'. esc_attr($value).'</span>';
		        		}
		        	?>
                  	<input type="hidden" id="switch_button" <?php $this->link(); ?> value="<?php echo $this->value(); ?>" />
                </div>
            </label>
	<?php
		}
	}
    
    /** Custom Category Control **/
	class beetech_Customize_Category_Control extends WP_Customize_Control {
		
		public function render_content() {
			$dropdown = wp_dropdown_categories(
					array(
						'name'              => '_customize-dropdown-categories-' . $this->id,
						'echo'              => 0,
						'show_option_none'  => esc_html__( '&mdash; Select Category &mdash;', 'beetech' ),
						'option_none_value' => '0',
						'selected'          => $this->value(),
					)
			);

			// Hackily add in the data link parameter.
			$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

			printf(
				'<label class="customize-control-select"><span class="customize-control-title">%s</span><span class="description customize-control-description">%s</span> %s </label>',
				$this->label,
				$this->description,
				$dropdown
			);
		}
	}
    
    /** Fa Icons List **/
	class beetech_Customize_Icons_Control extends WP_Customize_Control {

		public $type = 'beetech_icons';

		public function render_content() {

			$saved_icon_value = $this->value();
	?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<div class="fa-icons-list">
					<div class="selected-icon-preview"><?php if( !empty( $saved_icon_value ) ) { echo '<i class="fa '. esc_attr($saved_icon_value) .'"></i>'; } ?></div>
					<ul class="icons-list-wrapper">
						<?php 
							$beetech_icons_list = beetech_icons_array();
							foreach ( $beetech_icons_list as $key => $icon_value ) {
								if( $saved_icon_value == $icon_value ) {
									echo '<li class="selected"><i class="fa '. esc_attr($icon_value) .'"></i></li>';
								} else {
									echo '<li><i class="fa '. esc_attr($icon_value) .'"></i></li>';
								}
							}
						?>
					</ul>
					<input type="hidden" class="ap-icon-value" value="" <?php $this->link(); ?>>
				</div>

			</label>
	<?php
		}
	}

    /** Separator Class **/
	class beetech_Customize_Section_Separator extends WP_Customize_Control {
		
		public $type = 'beetech_separator';

		public function render_content() {
	?>
		<div class="customize-section-wrap">
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			</label>
		</div>
	<?php
		}
	}
    
}