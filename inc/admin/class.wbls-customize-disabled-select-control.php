<?php 
/**
 * Customizer Custom Control Class for Disabled Dropdown
 */
if( ! class_exists('Wbls_Customize_Disabled_Select_Control')) {
	class Wbls_Customize_Disabled_Select_Control extends WP_Customize_Control {
		public $type = 'disabled-select';

		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <?php printf('<span class="dinozoom-premium"><i class="fa fa-star"></i> <a href="%1$s">%2$s</a></span>',
				esc_url( 'http://dinozoom.com/themes/bakery-wordpress-theme-for-bakeries-food-bloggers-coffee-shops-and-cupcakes/bakery-pro/' ),
				__( 'Premium', 'bakery' )
				);?>
				<select <?php $this->link(); ?>>
					<?php //printf( '<option value="0">%1$s</option>', __( 'Select Color Scheme', 'stronghold' ) );
						foreach ( $this->choices as $value => $label )
							printf( '<option disabled="disabled" value="%1$s" %2$s>%3$s</option>', esc_attr( $value ), selected( $this->value(), $value, false ), $label );
					?>
				</select>
			</label>
		<?php
		}
	}
}

/**
 * Customizer Custom Control Class for Separator Title
 */
if( ! class_exists('Wbls_Customize_sep_title')) {
	class Wbls_Customize_sep_title extends WP_Customize_Control {
		public $type = 'title_sep';

		public function render_content() {
			?>
			<div class="customize-sep-title"><?php echo esc_html($this->label); ?></div>
			<?php
		}
	}
}
/**
 * Customizer Custom Control Class for Info
 */
if( ! class_exists('Wbls_Customize_Info')) {
	class Wbls_Customize_Info extends WP_Customize_Control {
		public $type = 'info';

		public function render_content() {
			?>
			<div class="dinozoom-info"><?php echo $this->label; ?></div>
			<?php
		}
	}
}